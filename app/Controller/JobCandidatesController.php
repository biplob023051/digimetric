<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class JobCandidatesController extends AppController {

    /**
     * This controller does not use a model
     *
     * @var array
     */
    var $name = 'JobCandidates';
    public $uses = array('JobCandidate', 'JobTest', 'Test', 'TestQuestion', 'TestQuestionAnswers', 'CandidateTest','CandidateTestAnswer', 'Difficulty');
    public $helpers = array('Form', 'Html', 'Js', 'Time', 'Session');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'candidate_layout';
    }

    public function index() {

        /*
         * check for session first and then proceed
         * ##skipping it for now
         */
        $candidate = $this->Session->read('Candidate');
        //get tests related to job 
        $this->JobTest->bindModel(
                array('belongsTo' => array(
                        'Test' => array(
                            'className' => 'Test'
                        ),
                        'Job' => array(
                            'className' => 'Job'
                        )
                    )
                )
        );
        $tests_for_this_job = $this->JobTest->find('all', array('conditions' => array('JobTest.job_id' => $candidate['JobCandidate']['job_id'])));
        $this->set('tests', $tests_for_this_job);
        //debug($candidate);
    }

    public function test_description($test) {

        /*
         * check for session first and then proceed
         * ##skipping it for now
         */

        $candidate = $this->Session->read('Candidate');
        //get tests related to job 
        $this->JobTest->bindModel(
                array('belongsTo' => array(
                        'Test' => array(
                            'className' => 'Test'
                        ),
                        'Job' => array(
                            'className' => 'Job'
                        )
                    )
                )
        );
	    
        $tests_for_this_job = $this->JobTest->find('all',
			 array('conditions' => array(
			 	'JobTest.job_id' => $candidate['JobCandidate']['job_id'],
			 	'JobTest.test_id' => $test
			 )
		   )
		);
        $this->set('tests', $tests_for_this_job);

        //debug($tests_for_this_job); 
        $v = $this->get_unique_test_version($test);
        $this->set('test_versions', $v[0]["TestQuestion"]["version"]);
    }

    public function get_unique_test_version($test_id) {
        return $version_for_this_job =
                $this->TestQuestion->find('all', array('fields' => array('DISTINCT version'),
            'conditions' => array('TestQuestion.test_id' => $test_id),
            'order' => 'rand()', 'limit' => 1));
    }

    public function get_start_time($id) {
        return $version_for_this_job =
                $this->CandidateTest->find('all', array('fields' => array('start_time'),
            'conditions' => array('CandidateTest.id' => $id)
        ));
    }

    public function start_test() {
        $JobTest = array();
        $test_info = array();
        $start_timer = array();
        $test_questions = array();

        $candidate = $this->Session->read('Candidate');
        //get version number 
        $JobTest["CandidateTest"]["job_id"] = $this->params['url']["job_id"]; //get job id from url;
        $JobTest["CandidateTest"]["test_id"] = $this->params['url']["test_id"]; //get test id from url
        $JobTest["CandidateTest"]["user_id"] = $candidate['JobCandidate']["id"];
        $JobTest["CandidateTest"]["version"] = $this->params['url']["version"];

        $is_candidate_test_exists = $this->CandidateTest->find('all', array('conditions' => array(
                'CandidateTest.job_id' => $JobTest["CandidateTest"]["job_id"],
                'CandidateTest.test_id' => $JobTest["CandidateTest"]["test_id"],
                'CandidateTest.version' => $JobTest["CandidateTest"]["version"],
                'CandidateTest.user_id' => $JobTest["CandidateTest"]["user_id"],
            )
           )
        );
		//debug($is_candidate_test_exists);
        $options = array(
            'joins' =>
            array(
                array(
                    'table' => 'difficulties',
                    'alias' => 'Difficulty',
                    'type' => 'left',
                    'conditions' => array(
                        'Difficulty.id = Test.difficulty_id'
                    )
                )
            ),
            'fields' => array('Test.*,Difficulty.*'),
            'conditions' => array('Test.id' => $JobTest["CandidateTest"]["test_id"])
        );
        //get test info.
		$test_info = $this->Test->find('all', $options);
        $this->set('test_info', $test_info);


        $this->TestQuestion->bindModel(
                array('hasMany' => array(
                        'TestQuestionAnswer' => array(
                            'className' => 'TestQuestionAnswer',
                            'conditions' => array('status' => 1)
                        )
                    )
                )
        );
        $test_questions = $this->TestQuestion->find('all', array(
            'conditions' => array('TestQuestion.test_id' => $JobTest["CandidateTest"]["test_id"],
                'TestQuestion.version' => $JobTest["CandidateTest"]["version"],
            ),
            'order' => 'sort_order asc'
        ));

		//debug($test_questions);
        $this->set('test_questions', $test_questions);

        if (empty($is_candidate_test_exists)) {
            $JobTest['CandidateTest']['start_time'] = mktime(date("H") + $test_info[0]["Test"]["duration_hour"], date("i") + $test_info[0]["Test"]["duration_mins"], date("s") + $test_info[0]["Test"]["duration_secs"], date("m"), date("d"), date("Y"));
            $this->CandidateTest->create();
            if ($this->CandidateTest->save($JobTest)) {

                //get time from databse and paas it to view
                $start_timer = $this->get_start_time($this->CandidateTest->getLastInsertId());
				$this->set('candidate_test_id', $this->CandidateTest->getLastInsertId()); //put start time to view
                $this->set('start_timer', $start_timer[0]["CandidateTest"]["start_time"]); //put start time to view
            } else {
                $this->Session->setFlash(__('Could not created'));
            }
        } else {
			$this->set('candidate_test_id', $is_candidate_test_exists[0]["CandidateTest"]["id"]); //put start time to view
            $this->set('start_timer', $is_candidate_test_exists[0]["CandidateTest"]["start_time"]); //put start time to view
        }
    }
	
	//SAVE ANSWERS FILLED BY THE USERS//RESULT 
	public function save_test(){
		$test_questions=array();
		$test_question_answers=array();
		$arr=array();
		$candidate_test_id=''; $CandidateTestAnswer='';
		$CandidateTestAnswer = $this->request->data['CandidateTestAnswer']; 
		$candidate_test_id = $CandidateTestAnswer["candidate_test_id"];
		$test_questions = $CandidateTestAnswer["test_questions"];
		$test_question_answers = $CandidateTestAnswer["test_question_answers"];
		
		foreach($test_questions as $k =>$v)
		{
			foreach($test_question_answers[$v] as $k1 => $v1){
				$arr["CandidateTestAnswer"]["candidate_test_id"] = $candidate_test_id;
				$arr["CandidateTestAnswer"]["test_question_id"] = $v;
				$arr["CandidateTestAnswer"]["test_question_answer_id"] = $v1;
				$arr["CandidateTestAnswer"]["created_time"] = time();
				//debug($arr);
				$this->CandidateTestAnswer->create();
            	if ($this->CandidateTestAnswer->save($arr)) {
					$this->Session->setFlash(__('Result has been saved'));
                    return $this->redirect(array('action' => 'result_success'));
				}
				else{
					 $this->Session->setFlash(__('Result not saved'));
				}
			}
		}
	}

	public function result_success() {
        $this->set('title_for_layout', 'Result success');
    }
	public function update_test_expire_time() {
		$this->autoRender = false;
		$id = $this->request->data['id'];
		$expire_time = $this->request->data['expire_time'];
		$this->CandidateTest->id = $id;
        if ($this->CandidateTest->saveField('expire_time', $expire_time)) {
			return true;
		}
		else{
			return false;
		}
	}
	
    public function test_email() {

//        $Email = new CakeEmail('gmail');

        $Email = new CakeEmail();
        $Email->from(array('noreply.digimetrik@gmail.com' => 'Digimetrik'));
        $Email->to('prateiik@gmail.com');
        $Email->subject('Confirmation Code');
        $Email->send("Congratulations! Your account is created at Digimetrik.Please use this password $new_pass_plain to login.");
    }

    public function logout() {
        $this->Session->destroy();
        $this->redirect('http://digimetrik.com');
    }

}
