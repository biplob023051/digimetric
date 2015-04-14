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

        $site_settings = $this->_getSettings();

        $test_questions = $this->TestQuestion->find('all', array(
            'conditions' => array('TestQuestion.test_id' => $JobTest["CandidateTest"]["test_id"],
                'TestQuestion.version' => $JobTest["CandidateTest"]["version"],
            ),
            'order' => 'rand()',
            'limit' => $site_settings['allowed_questions']
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
		$test_question_answers = isset($CandidateTestAnswer["test_question_answers"]) ? $CandidateTestAnswer["test_question_answers"] : array();

        $hours = $this->request->data['Time']['hours'];
        $mins = $this->request->data['Time']['mins'];
        $secs = $this->request->data['Time']['secs'];

        $test_id = $this->request->data['Time']['test_id'];

        if ($mins < 0) {
            $hours = $hours - 1;
            $mins = 60 + $mins; 
        }

        if ($secs < 0) {
            $mins = $mins - 1;
            $secs = 60 + $secs; 
        }

        
        unset($this->request->data['Time']);

		foreach($test_questions as $k =>$v)
		{
            if (isset($test_question_answers[$v])) {
                foreach($test_question_answers[$v] as $k1 => $v1){
                    $arr["CandidateTestAnswer"]["candidate_test_id"] = $candidate_test_id;
                    $arr["CandidateTestAnswer"]["test_question_id"] = $v;
                    $arr["CandidateTestAnswer"]["test_question_answer_id"] = $v1;
                    $arr["CandidateTestAnswer"]["created_time"] = time();
                    //debug($arr);
                    $this->CandidateTestAnswer->create();
                    $this->CandidateTestAnswer->save($arr);
                }
            }

		}
        // redirect after saving all questions - biplob
        $this->Session->setFlash(__('Result has been saved'));
        return $this->redirect(array('action' => 'result_success', $candidate_test_id, $hours, $mins, $secs, $test_id));
	}

	public function result_success($candidate_test_id = null, $hours = null, $mins = null, $secs = null, $test_id = null) {
        $this->set('title_for_layout', 'Result success');        

        // if not logged in candidate and not valide candidate_test_id
        $candidate = $this->Session->read('Candidate');
        if (empty($candidate)) {
            $this->Session->setFlash(__('You are not authorized to view this page'));
            return $this->redirect('/');    
        }


        if (empty($candidate_test_id) || empty($test_id)) {
            $this->Session->setFlash(__('You are not authorized to view this page'));
            return $this->redirect('/');    
        }

        // if trying to re take test then return to home
        $this->loadModel('CandidateRanking');
        $conditions = array(
            'CandidateRanking.job_candidate_id' => $candidate['JobCandidate']['id'],
            'CandidateRanking.job_id' => $candidate['JobCandidate']['job_id']
        );
        if ($this->CandidateRanking->hasAny($conditions)){  
            $this->Session->setFlash(__('You are not authorized to view this page'));
            return $this->redirect('/'); 
        }

        // get the candidate test and anwser
        $testAnswers = $this->CandidateTestAnswer->find('all', array(
                'conditions' => array('CandidateTestAnswer.candidate_test_id' => $candidate_test_id)
            )
        );
        $testAnswers = Hash::combine($testAnswers, '{n}.CandidateTestAnswer.test_question_id', '{n}.CandidateTestAnswer.test_question_answer_id');
        // get actual test and anwser
        $testQuestionAnswers = $this->TestQuestionAnswers->find('all', array(
                'conditions' => array('TestQuestionAnswers.id' => $testAnswers, 'TestQuestionAnswers.is_correct' => 1)
            )
        );
        $testQuestionAnswers = Hash::combine($testQuestionAnswers, '{n}.TestQuestionAnswers.test_question_id', '{n}.TestQuestionAnswers.id');
        // find not correct answer
        $difference = Hash::diff($testAnswers, $testQuestionAnswers);
        // total questions
        $totalQuestions = count($testAnswers);
        // final correct answer
        $correct = $totalQuestions - count($difference);

        $testInfo = $this->Test->findById($test_id);

        // save result in candidate ranking table
        $dataToSave['CandidateRanking']['job_id'] = $candidate['JobCandidate']['job_id'];
        $dataToSave['CandidateRanking']['job_candidate_id'] = $candidate['JobCandidate']['id'];
        $dataToSave['CandidateRanking']['result'] = $correct;
        $dataToSave['CandidateRanking']['total'] = $totalQuestions;
        $dataToSave['CandidateRanking']['time_taken'] = $hours . ':' . $mins . ':' . $secs;
        $dataToSave['CandidateRanking']['time_duration'] = $testInfo['Test']['duration_hour'] . ':' . $testInfo['Test']['duration_mins'] . ':' . $testInfo['Test']['duration_secs'];

        $this->Session->delete('Candidate');

        $this->CandidateRanking->create();
        if ($this->CandidateRanking->save($dataToSave)) {
            // find all result related to this 
            $results = $this->JobCandidate->find('all', array(
                    'joins' => array( 
                        array( 
                            'table' => 'candidate_rankings', 
                            'alias' => 'CandidateRanking', 
                            'type' => 'inner',  
                            'conditions'=> array(
                                'JobCandidate.id = CandidateRanking.job_candidate_id', 
                                'CandidateRanking.job_id' => $candidate['JobCandidate']['job_id']
                            ) 
                        )
                    ),
                    'order' => array('CandidateRanking.result DESC', 'CandidateRanking.created DESC'),
                    'fields' => array('JobCandidate.*', 'CandidateRanking.*')
                )
            );
            $this->set(compact('results'));
        } else {
            $this->Session->setFlash(__('Something went wrong, pleas try again!'));
            return $this->redirect('/');
        }
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

    public function admin_event_test_takers() {
        // check if admin or not
        $this->is_admin_loggedin();
        $this->layout = "admin_layout";
        
        // special secret for event candite test - biplob
        $site_settings = $this->_getSettings();

        if (!empty($site_settings['confirmation_code']) && !empty($site_settings['business_user_name'])) {
            $this->loadModel('User');
            $job = $this->User->find('first', array(
                'joins' => array( 
                    array( 
                        'table' => 'jobs', 
                        'alias' => 'Job', 
                        'type' => 'inner',  
                        'conditions'=> array(
                            'Job.user_id = User.id'
                        ) 
                    )
                ),
                'conditions' => array(
                    'User.company' => $site_settings['business_user_name']
                    ),
                'fields' => array('Job.id')
                )
            );
            
            $job_id = !empty($job) ? $job['Job']['id'] : '';

            $this->JobCandidate->virtualFields = array(
                'result' => 'CandidateRanking.result',
                'time_taken' => 'CandidateRanking.time_taken'
            );

            $this->paginate = array(
                'joins' => array( 
                    array( 
                        'table' => 'candidate_rankings', 
                        'alias' => 'CandidateRanking', 
                        'type' => 'inner',  
                        'conditions'=> array(
                            'CandidateRanking.job_candidate_id = JobCandidate.id',
                            'CandidateRanking.job_id' => $job_id
                        ) 
                    )
                ),
                'conditions' => array('JobCandidate.confirmation_code' => $site_settings['confirmation_code']),
                'limit' => 10,
                'fields' => array('JobCandidate.*', 'CandidateRanking.*'),
                'order' => array('JobCandidate.result' => 'DESC', 'JobCandidate.time_taken' => 'ASC')
            );

            $candidates = $this->paginate('JobCandidate');
            
        } else {
            $candidates = array();
        }

        $this->set('title_for_layout', __('Manage Event Test Takers'));
        $this->set('resultset', $candidates);
    }

    public function admin_delete_event_taker($job_candidate_id) {
        $this->autoRender = false;
        $this->JobCandidate->id = $job_candidate_id;
        $this->loadModel('CandidateRanking');
        $conditions = array('CandidateRanking.job_candidate_id' => $job_candidate_id);
        if ($this->CandidateRanking->deleteAll($conditions)) {
            if ($this->JobCandidate->delete($job_candidate_id)) {
                $this->Session->setFlash(__('Event Test Taker deleted'));
            } else {
                $this->Session->setFlash(__('Could not delete event test taker'));
            }
        }

        $this->redirect($this->request->referer());
    }

}
