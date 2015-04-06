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

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class TestQuestionsController extends AppController {

    /**
     * This controller does not use a model
     *
     * @var array
     */
    var $name = 'TestQuestions';
    public $uses = array('Test', 'TestQuestion', 'TestQuestionAnswer');
    public $helpers = array('Form', 'Html', 'Js', 'Time', 'Session');

    /**
     * Displays a view
     *
     * @param mixed What page to display
     * @return void
     * @throws NotFoundException When the view file could not be found
     * 	or MissingViewException in debug mode.
     */
    public function beforeFilter() {
        parent::beforeFilter();
//        $this->layout = 'blog_layout';
    }

    public function admin_manage_test_questions() {
        $this->layout = "admin_layout";
        if (empty($this->request->query['test_id']) || empty($this->request->query['version'])) {
            $this->Session->setFlash(__('Some parameters were missing.Please select some version and revisit page'));
            return $this->redirect(array('controller' => 'tests', 'action' => 'manage_test'));
//            throw new NotFoundException(__('Some parameters are missing.Please go back to manage test section and visit this page again.'));
        }
//        debug($this->request->query);
        //test info
        $test = $this->Test->find('first', array('conditions' => array('Test.id' => $this->request->query['test_id']),
            'fields' => array('Test.id', 'Test.title', 'Test.no_of_questions')));

        $this->set('test', $test);
        $this->TestQuestion->bindModel(
                array('hasMany' => array(
                        'TestQuestionAnswer' => array(
                            'className' => 'TestQuestionAnswer',
                            'conditions' => array('TestQuestionAnswer.status !=' => '4')
                        )
                    )
                )
        );


        $this->paginate = array(
            'conditions' => array('TestQuestion.version' => $this->request->query['version'], 'TestQuestion.status !=' => '4', 'TestQuestion.test_id' => $this->request->query['test_id']),
            'limit' => 1000,
            'order' => array('TestQuestion.sort_order' => 'asc')
        );
        $User = $this->paginate('TestQuestion');
        $this->set('title_for_layout', 'Manage test questions');
        $this->set('resultset', $User);
    }

    public function admin_add_test_question($id = NULL) {
        $this->layout = "admin_layout";
        $test = $this->Test->find('first', array('conditions' => array('Test.id' => $this->request->query['test_id']),
            'fields' => array('Test.id', 'Test.title', 'Test.no_of_questions')));
        $max_questions = $test['Test']['no_of_questions'];
        $this->set('test', $test);
        $this->set('form_data', array('controller' => 'test_questions', 'action' => 'add_test_question', 'id' => '', 'display_text' => 'Add')
        );
        /*
         * get last order here  and add one to it and reorder before saving new record
         */
        
        /*
         * 
         */
        /*
         * main logic goes here 
         */
        if ($this->request->is('post')) {
            $this->set('title_for_layout', 'Add Test');

//            $test_question_added = $this->TestQuestion->find('all', array('conditions' =>
//                array('TestQuestion.test_id' => $this->request->data['TestQuestion']['test_id'],
//                    'TestQuestion.version' => $this->request->data['TestQuestion']['version'],
//                    'TestQuestion.status !=' => 4)
//            ));
//            echo count($test_question_added);
//            if (count($test_question_added) < $max_questions) {
            $test_Question = $this->request->data['TestQuestion'];
             $messages = $this->TestQuestion->find('all', array(
            'conditions' => array('TestQuestion.test_id' => $this->request->query['test_id'],'TestQuestion.version' => $this->request->query['version'],'TestQuestion.status !=' => 4),
            'fields' => array('MAX(TestQuestion.sort_order) AS sort_order'),
            'group by' => 'TestQuestion.id',
            'order' => 'TestQuestion.sort_order'));
//            echo ($messages[0][0]['sort_order']);
            $sort = $messages[0][0]['sort_order'];
//            if($messages[0][0]['sort_order']=='' || empty($messages[0][0]['sort_order'])){
                
//            }else{
                $test_Question['sort_order']=$sort + 1;
                $this->request->data['TestQuestion']['sort_order']=$sort + 1;
//            }
            
//            debug($this->request->data);
//            die;
           
            
            
            $this->TestQuestion->set($test_Question);
            $this->TestQuestion->create();
            if ($this->TestQuestion->save($this->request->data)) {

                $arr['q_id'] = $this->TestQuestion->getLastInsertId();
                /*
                 * adding answers here 
                 */

                $correct_selected = array();
                if (isset($this->request->data['corrects']) && !empty($this->request->data['corrects'])) {
                    $corrects = $this->request->data['corrects'];
                    foreach ($corrects as $key => $value) {
                        $correct_selected[] = $key;
                    }
                }
                $answers = $this->request->data['answers'];
                foreach ($answers as $key => $value) {
                    if (!empty($value)) {

                        if (in_array($key, $correct_selected)) {


                            $this->request->data['TestQuestionAnswer']['is_correct'] = 1;
                        } else {

                            $this->request->data['TestQuestionAnswer']['is_correct'] = 0;
                        }
                        $this->TestQuestionAnswer->create();
                        $this->request->data['TestQuestionAnswer']['answer_text'] = $value;
                        $this->request->data['TestQuestionAnswer']['test_question_id'] = $arr['q_id'];
                        $this->TestQuestionAnswer->save($this->request->data['TestQuestionAnswer']);
                    }
                }

                /*
                 * adding answers here 
                 */
                $this->Session->setFlash(__('New question added'));
            } else {
//                    $this->Session->setFlash(__('New Test added'));
                $this->Session->setFlash(__('Could not add question'));
            }
//            } else {
//                $this->Session->setFlash(__('Sorry! No. of questions limit reached for this version.Edit test to add more questions to this test.'));
//            }
//            die;
        }
        /*
         * main logic goes here
         */

        $this->render('admin_add_test_question');
    }

    public function admin_edit_test_question($id = NULL) {
        $this->layout = "admin_layout";
        $test = $this->Test->find('first', array('conditions' => array('Test.id' => $this->request->query['test_id']),
            'fields' => array('Test.id', 'Test.title', 'Test.no_of_questions')));

        $this->set('test', $test);
        $this->set('form_data', array('controller' => 'test_questions', 'action' => 'edit_test_question', 'id' => $id, 'display_text' => 'Edit')
        );
        $this->TestQuestion->bindModel(
                array('hasMany' => array(
                        'TestQuestionAnswer' => array(
                            'className' => 'TestQuestionAnswer',
                            'conditions' => array('TestQuestionAnswer.status !=' => '4')
                        )
                    )
                )
        );
        $User = $this->TestQuestion->findById($id);
        if ($this->request->is('post')) {
            /*
             * entire logic here
             */
//            debug($this->request->data);
//            die;

            /*
             * entire logic here
             */
            $this->TestQuestion->id = $id;


            if ($this->TestQuestion->save($this->request->data['TestQuestion'])) {

                foreach ($this->request->data['TestQuestionAnswer'] as $key => $value) {
                    $this->TestQuestionAnswer->id = $value['id'];
                    if (isset($value['is_correct'])) {
                        $a['is_correct'] = 1;
                    } else {
                        $a['is_correct'] = 0;
                    }

                    $a['answer_text'] = $value['answer_text'];

                    $this->TestQuestionAnswer->save($a);
                }
                /*
                 * adding new options if added any 
                 */

                /*
                 * adding answers here 
                 */

                $correct_selected = array();
                if (isset($this->request->data['corrects']) && !empty($this->request->data['corrects'])) {
                    $corrects = $this->request->data['corrects'];
                    foreach ($corrects as $key => $value) {
                        $correct_selected[] = $key;
                    }
                }
//                debug($correct_selected);
                if (isset($this->request->data['new_options'])) {
                    $answers = $this->request->data['new_options'];
                    foreach ($answers as $key => $value) {
                        if (!empty($value)) {

                            if (in_array($key, $correct_selected)) {


                                $this->request->data['TestQuestionAnswer']['is_correct'] = 1;
                            } else {

                                $this->request->data['TestQuestionAnswer']['is_correct'] = 0;
                            }
                            $this->TestQuestionAnswer->create();
                            $this->request->data['TestQuestionAnswer']['answer_text'] = $value;
                            $this->request->data['TestQuestionAnswer']['test_question_id'] = $id;
                            $this->TestQuestionAnswer->save($this->request->data['TestQuestionAnswer']);
                        }
                    }
                }

                /*
                 * end of new options addition
                 */
                /*
                 * for showing data on page after update
                 */
                $this->TestQuestion->bindModel(
                        array('hasMany' => array(
                                'TestQuestionAnswer' => array(
                                    'className' => 'TestQuestionAnswer',
                                    'conditions' => array('TestQuestionAnswer.status !=' => '4')
                                )
                            )
                        )
                );
                $this->set('resultset', $this->TestQuestion->findById($id));
                /*
                 * data retrieval ends here
                 */
                $this->Session->setFlash(__('Question updated.'));
            } else {
                $this->set('resultset', $this->request->data);
            }
        } else {
            $this->set('resultset', $User);
        }


//        $this->render('admin_add_test_question');
    }

    public function admin_delete_test_question($user_id) {
        $this->TestQuestion->id = $user_id;
        if ($this->TestQuestion->saveField('status', 4)) {
            $this->Session->setFlash(__('Test question deleted'));
        } else {
            $this->Session->setFlash(__('Could not delete question'));
        }
        return $this->redirect(array('action' => 'admin_manage_test_questions' . '?version=' . $this->request->query["version"] . '&test_id=' . $this->request->query["test_id"]));
    }

    public function admin_delete_test_question_answer($ans_id) {
        $this->TestQuestionAnswer->id = $ans_id;
        if ($this->TestQuestionAnswer->saveField('status', 4)) {
            $this->Session->setFlash(__('Option deleted'));
        } else {
            $this->Session->setFlash(__('Could not delete Option'));
        }
        return $this->redirect(array('action' => 'admin_manage_test_questions' . '?version=' . $this->request->query["version"] . '&test_id=' . $this->request->query["test_id"]));
    }

    public function admin_enable_disable_test_question($user_id, $status) {

        $this->TestQuestion->id = $user_id;
        if ($this->TestQuestion->saveField('status', $status)) {
            $this->Session->setFlash(__('Question status has been changed'));
        } else {
            $this->Session->setFlash(__('Could not update question status'));
        }
        return $this->redirect(array('action' => 'admin_manage_test_questions' . '?version=' . $this->request->query["version"] . '&test_id=' . $this->request->query["test_id"]));
    }

    public function admin_update_sort_order() {
        if ($this->request->is('post')) {
            if (isset($this->request->data['TestQuestion']['id']) && !empty($this->request->data['TestQuestion']['id'])) {
                foreach ($this->request->data['TestQuestion']['id'] as $key => $value) {
                    $this->TestQuestion->id = $value;
                    $this->TestQuestion->saveField('sort_order', $key + 1);
//                    echo $value['TestQuestion']['id'];
                }
            }

//            debug($this->request->data);
//            die;
        }

        return $this->redirect(array('action' => 'admin_manage_test_questions' . '?version=' . $this->request->query["version"] . '&test_id=' . $this->request->query["test_id"]));
    }

}
