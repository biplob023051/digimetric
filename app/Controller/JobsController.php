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
class JobsController extends AppController {

    /**
     * 
     *
     * @var array
     */
    var $name = 'Jobs';
    //$uses are the models that this controller will use
    public $uses = array('Job', 'JobCategory', 'JobTest', 'Test', 'JobCandidate', 'CandidateTest', 'Area', 'Category', 'SubCategory');
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
        // job layout is default layout for all functions
        $this->layout = 'job_layout';
    }

    public function index() {

        /*
         * redirect to home if access direct
         */
//        $this->layout = false;
        $user_id = $this->Session->read('User');
//        debug($user_id);
//        if (empty($user_id)) {
//            $this->redirect(BASEURL);
//        }
        // job has many tests added to it :: associate them too
        $this->Job->recursive = 2;
        $this->Job->bindModel(
                array('hasMany' => array(
                        'JobTest' => array(
                            'className' => 'JobTest'
                        ),
//                        'JobCandidate' => array(
//                            'className' => 'JobCandidate'
//                        )
                    )
                )
        );

        $all_jobs = $this->Job->find('all', array('conditions' => array('Job.user_id' => $user_id['User']['id'],
                'Job.status' => 1
        )));
//        $this->Job->recursive = 2;
//        $options['joins'] = array(
//            array('table' => 'job_tests',
//                'alias' => 'JobTest',
//                'type' => 'inner',
//                'conditions' => array(
//                    'Job.id = JobTest.job_id'
//                )
//            ),
//            array('table' => 'tests',
//                'alias' => 'Test',
//                'type' => 'inner',
//                'conditions' => array(
//                    'JobTest.test_id = Test.id'
//                )
//            )
//        );
//
//        $options['fields'] = array('Job.title,Job.id', 'JobTest.test_id','Test.title');
//
//        $all_jobs = $this->Job->find('all', $options);
        /*
         * with set the variable is available at view 
         */
        $this->set('all_jobs', $all_jobs);


        $all_tests = $this->Test->find('all', array('conditions' => array('Test.status' => 1), 'fields' => array('Test.id,Test.title')));
        $this->set('all_tests', $all_tests);

        $all_areas = $this->Area->find('all', array('conditions' => array('Area.status' => 1), 'fields' => array('Area.id,Area.title,Area.image'), 'order' => 'Area.id ASC'));
        $this->set('all_areas', $all_areas);



//        $this->set('jobs');
    }

    public function add() {
        // show create job page   user must be logged in and also he must have previliges as per his job plan selected while sign up
        // get job categories to display here 
        //1) check for user previlige to add job here
//        echo Configure::version();
        $user_id = $this->Session->read('User');
//        debug($user_id);
        if ($this->request->is('post')) {
            $this->Job->set($this->request->data);

            if ($this->Job->validates()) {
                // it validated logic

                $this->Job->create();
                $this->request->data['Job']['status'] = 1;
                $this->request->data['Job']['user_id'] = $user_id['User']['id'];
                $this->request->data['Job']['created_on'] = date('Y-m-d H:i:s');
                if ($this->Job->save($this->request->data)) {
                    $this->Session->setFlash(__('Your job has been saved.Start adding some tests to this job'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to add your job.'));
            } else {
                // didn't validate logic
//            $errors = $this->Job->validationErrors;
                $this->Session->setFlash(__('Unable to add your job.Please correct errors'));

//            die();
            }
        }


        $all_job_cats = $this->JobCategory->find('all', array('conditions' => array('JobCategory.status' => 1)));
        $this->set('all_cats', $all_job_cats);
    }

    public function detail($id) {
        // show create job page   user must be logged in and also he must have previliges as per his job plan selected while sign up
        // get job categories to display here 
        //1) check for user previlige to add job here

        if (!empty($id)) {

//            return $this->redirect(array('action' => 'index'));
        } else {
            return $this->redirect(array('action' => 'index'));
        }
    }

    public function add_user_to_job() {
        $this->autoRender = false;
        $job_id = $this->request->data['job_id'];
        $user_emails = array_values($this->request->data['candidate_email']);
//        unset($this->request->data);
        $inv_em = array();
        $all_ems = array();
        $err = array();
        $error_count = 0;
        foreach ($user_emails as $uek => $uev) {
            $all_ems[] = $uev;
//            if (!empty($uev)) {
            if (!filter_var($uev, FILTER_VALIDATE_EMAIL)) {
                $inv_em[] = $uev;
                $err[] = $error_count;
                $error_count++;
            }
//            }  else {
////                $empty_array[]
//            }
        }
//        print_r($error_count);
//        print_r($inv_em);
////        print_r($ok);
//        die;
//        if (!empty($all_ems)) {
        if ($error_count < 1) {

//            $users = array_combine($user_names, $user_emails);

            if (!empty($user_emails)) {
                $already_invited_users = array();
                foreach ($user_emails as $key => $value) {

                    $already_added = $this->JobCandidate->find('first', array('conditions' => array(
                            'email' => $value,
                            'job_id' => $job_id
                    )));
                    if (empty($already_added)) {
                        $new_pass_plain = $this->random_generator(6);
                        //add them and send them email with confirmation code
                        $this->JobCandidate->create();
                        $this->request->data['JobCandidate']['confirmation_code'] = $new_pass_plain;
//                    $this->request->data['JobCandidate']['name'] = $key;
                        $this->request->data['JobCandidate']['email'] = $value;
                        $this->request->data['JobCandidate']['job_id'] = $job_id;
                        if ($this->JobCandidate->save($this->request->data)) {
                            
                        }


                        App::uses('CakeEmail', 'Network/Email');
                        $Email = new CakeEmail();
                        $Email->from(array('noreply.digimetrik@gmail.com' => 'Digimetrik'));
                        $Email->to($value);
                        $Email->subject('Confirmation Code');
                        $Email->send("Please use this confirmation code $new_pass_plain to appear for the test");
                    } else {
                        $already_invited_users[] = $value;
                    }



                    $res['status'] = 1;
                    $res['message'] = "Users are successfully invited and sent confirmation code";
                    $res['data'] = $user_emails;
                    $res['invited_before'] = $already_invited_users;
                }
            } else {
                //throw error 
                $res['status'] = 3;
                $res['message'] = "Please correct or input all emails";
                $res['data'] = $inv_em;
            }
        } else {

            $res['status'] = 2;
            $res['message'] = "Please correct or input all emails";
            $res['data'] = $inv_em;
        }
//        } else {
//            $res['status'] = 2;
//            $res['message'] = "Please correct or input all emails";
//            $res['data'] = $inv_em;
//        }


        echo json_encode($res);



//        debug($this->request->data);
    }

    public function delete_job() {
        $this->autoRender = false;
        $jobid = $this->request->data['job_id'];
        if (!empty($jobid)) {
            $this->Job->delete($jobid);
        }

        $res['status'] = 1;
        $res['message'] = 'Job deleted';
        echo json_encode($res);
    }

    public function searchtest() {
        $this->autoRender = false;
        $jobid = $this->request->data['job_id'];
        $query = $this->request->data['query'];
        $all_tests = array();
        if (!empty($query)) {
            $all_tests = $this->Test->find('all', array(
                'conditions' => array('Test.status' => 1, 'Test.title like' => "%$query%"),
                'fields' => array('Test.id,Test.title')
            ));
        } else {
            $all_tests = $this->Test->find('all', array('conditions' => array('Test.status' => 1),
                'fields' => array('Test.id,Test.title')));
        }
        if (!empty($all_tests)) {
            $t_counter = 0;
            foreach ($all_tests as $key => $value) {
                //check here if this test is aleady added to this job or not 
                $added_tests = $this->JobTest->find('first', array(
                    'conditions' => array('JobTest.job_id' => $jobid, 'JobTest.test_id' => $value['Test']['id']),
//                        'fields' => array('Test.id,Test.title')
                ));
                if (!empty($added_tests)) {
                    $ret_data[$t_counter]['id'] = $value['Test']['id'];
                    $ret_data[$t_counter]['title'] = $value['Test']['title'];
                    $ret_data[$t_counter]['is_added_before'] = 1;
                } else {
                    $ret_data[$t_counter]['id'] = $value['Test']['id'];
                    $ret_data[$t_counter]['title'] = $value['Test']['title'];
                    $ret_data[$t_counter]['is_added_before'] = 0;
                }
                $t_counter++;
            }


            $res['status'] = 1;
            $res['message'] = 'Test found';
            $res['tests'] = $ret_data;
            $res['job'] = $jobid;
            echo json_encode($res);
        } else {
            $res['status'] = 0;
            $res['message'] = 'No test found';
            $res['job'] = $jobid;
            echo json_encode($res);
        }
    }

    function random_generator($digits) {
        // function starts
        srand((double) microtime() * 10000000);
        $input = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
        $random_generator = "";
        // Initialize the string to store random numbers
        for ($i = 1; $i <= $digits; $i++) {
            // Loop the number of times of required digits
            if (rand(1, 2) == 1) {
                // to decide the digit should be numeric or alphabet
                // Add one random alphabet
                $rand_index = array_rand($input);
                $random_generator .=$input[$rand_index];
                // One char is added
            } else {
                // Add one numeric digit between 1 and 9
                $random_generator .=rand(1, 9);
                // one number is added
            }
            // end of if else
        }
        // end of for loop
        return $random_generator;
    }

    public function add_test_to_job() {
        $all_tests = $this->Test->find('all', array('conditions' => array('Test.status' => 1),
            'fields' => array('Test.id,Test.title')));

        $this->autoRender = false;
        $job_id = $this->request->data['job_id'];
        if (isset($this->request->data['tests'])) {
            //delete previous and add new
//            if(!empty($already_added)){
            $this->JobTest->deleteAll(array('JobTest.job_id' => $job_id), false);
//                }
            $already_added = array();
            $user_tests = array_values($this->request->data['tests']);
            foreach ($user_tests as $key => $value) {

//                $already_added = $this->JobTest->find('first', array('conditions' => array(
//                        'JobTest.test_id' => $value,
//                        'JobTest.job_id' => $job_id
//                )));
//                if (empty($already_added)) {

                $this->JobTest->create();

                $this->request->data['JobTest']['test_id'] = $value;
                $this->request->data['JobTest']['job_id'] = $job_id;
                if ($this->JobTest->save($this->request->data)) {
                    
                }
//                }
                //find tests for this job and return 
            }

            $res['status'] = 1;
            $res['message'] = "Test(s) updated for this job";
            //find job tests 
            $job_tests = $this->JobTest->find('all', array('conditions' => array(
                    'JobTest.job_id' => $job_id
            )));
            $haystack = array();
            if (!empty($job_tests)) {
                foreach ($job_tests as $key => $value) {
                    $haystack[] = $value['JobTest']['test_id'];
                }
            }


            $t_counter = 0;
            foreach ($all_tests as $key => $value) {
                if (in_array($value['Test']['id'], $haystack)) {
                    $ret_data[$t_counter]['id'] = $value['Test']['id'];
                    $ret_data[$t_counter]['title'] = $value['Test']['title'];
                    $ret_data[$t_counter]['is_added_before'] = 1;
                } else {
                    $ret_data[$t_counter]['id'] = $value['Test']['id'];
                    $ret_data[$t_counter]['title'] = $value['Test']['title'];
                    $ret_data[$t_counter]['is_added_before'] = 0;
                }

                $t_counter++;
            }
            $res['tests'] = $ret_data;
            $res['job'] = $job_id;
        } else {
            //delete all 
            $this->JobTest->deleteAll(array('JobTest.job_id' => $job_id), false);
            $res['status'] = 1;
            $res['message'] = "No test for this job";
            //find all tests and return 

            $t_counter = 0;
            $ret_data = array();
            foreach ($all_tests as $key => $value) {
                $ret_data[$t_counter]['id'] = $value['Test']['id'];
                $ret_data[$t_counter]['title'] = $value['Test']['title'];
                $ret_data[$t_counter]['is_added_before'] = 0;
                $t_counter++;
            }
            $res['tests'] = $ret_data;
            $res['job'] = $job_id;
        }

        echo json_encode($res);
    }

    // called for making modal dynamic 
    public function get_test_job($job_id) {
        $this->layout = false;

        $this->JobTest->recursive = 2;
        $this->JobTest->bindModel(
                array('belongsTo' => array(
                        'Test' => array(
                            'className' => 'Test',
                            'fields' => array('id', 'title'),
                        )
                    )
                )
        );
        $job_tests = $this->JobTest->find('all', array('conditions' => array(
                'JobTest.job_id' => $job_id
        )));
        $job_candidates = $this->JobCandidate->find('all', array('conditions' => array(
                'JobCandidate.job_id' => $job_id
            ), 'fields' => array('id', 'email')));
        $this->set('all_tests', $job_tests);
        $this->set('all_candidates', $job_candidates);
        $this->set('job_id', $job_id);
//        debug($job_tests);
//        debug($job_candidates);
//        echo "This is dynamic content";
//        $this->autoRender = false;
    }

    public function update_test_candidate() {
//        echo "<pre>";
//        print_r($this->request->data);
//        echo "</pre>";
//        debug($this->request->data);
        $data = $this->request->data;
        if (!empty($data)) {

            if (isset($data['jt'])) {
                $jt = $data['jt'];
                foreach ($jt as $key => $value) {

                    $this->JobTest->delete($value);
                }
            }

            if (isset($data['jc'])) {
                $jc = $data['jc'];
                foreach ($jc as $key => $value) {
                    $this->JobCandidate->delete($value);
                }
            }
            $res['status'] = 1;
            $res['message'] = "Data updated";
        } else {
            $res['status'] = 0;
            $res['message'] = "No data to update";
        }
        echo json_encode($res);
        $this->autoRender = false;
    }

    public function admin_delete_job($user_id) {
        $this->Job->id = $user_id;
        if ($this->Job->saveField('status', 4)) {
            $this->Session->setFlash(__('Job deleted'));
        } else {
            $this->Session->setFlash(__('Could not delete'));
        }
        return $this->redirect(array('action' => 'manage_job/'));
    }

    public function admin_manage_job() {
        $this->layout = "admin_layout";

        if ($this->request->is('post')) {
            $search_key = $this->request->data['search'];
            $this->paginate = array(
                'conditions' => array('Job.status !=' => '4',
                    "OR" => array(
                        "User.first_name LIKE" => "%$search_key%",
                        "User.last_name LIKE" => "%$search_key%",
                        "User.company LIKE" => "%$search_key%",
                        "Job.title LIKE" => "%$search_key%",
                    )),
                'joins' => array(
                    array(
                        'table' => 'job_categories',
                        'alias' => 'JobCategory',
                        'type' => 'inner',
                        'conditions' => array(
                            'JobCategory.id = Job.job_category_id'
                        )
                    ),
                    array('table' => 'users',
                        'alias' => 'User',
                        'type' => 'inner',
                        'conditions' => array(
                            'Job.user_id = User.id'
                        )
                    )
                ),
                'limit' => 20,
                'order' => array('Job.id' => 'desc'),
                'fields' => array('Job.*,JobCategory.*,User.*'),
            );
        } else {

            $this->paginate = array(
                'conditions' => array('Job.status !=' => '4'),
                'joins' => array(
                    array(
                        'table' => 'job_categories',
                        'alias' => 'JobCategory',
                        'type' => 'inner',
                        'conditions' => array(
                            'JobCategory.id = Job.job_category_id'
                        )
                    ),
                    array('table' => 'users',
                        'alias' => 'User',
                        'type' => 'inner',
                        'conditions' => array(
                            'Job.user_id = User.id'
                        )
                    )
                ),
                'limit' => 20,
                'order' => array('Job.id' => 'desc'),
                'fields' => array('Job.*,JobCategory.*,User.*'),
            );
        }


        $User = $this->paginate('Job');
//        debug($this->request->data);
//        debug($User);

        if (!$User) {
//            throw new NotFoundException(__('No Job found'));
        }
        $this->set('title_for_layout', 'Manage Job');
        $this->set('resultset', $User);
    }

    public function admin_enable_disable_job($user_id, $status) {

        $this->Job->id = $user_id;
        if ($this->Job->saveField('status', $status)) {
            $this->Session->setFlash(__('Job status has been changed'));
        } else {
            $this->Session->setFlash(__('Could not update Job status'));
        }
        return $this->redirect(array('action' => 'manage_job/'));
    }

    public function admin_edit_job($id) {

        $this->layout = "admin_layout";
        $this->set('job_categories', $this->getJobCategories());
        $this->set('form_data', array('controller' => 'jobs', 'action' => 'edit_job', 'id' => $id, 'display_text' => 'Edit'));

        $User = $this->Job->findById($id);
        if (!$User) {
//            throw new NotFoundException(__('Job not found'));
        }
        if ($this->request->is('post')) {

            /*
             * update  here
             */

            $this->Job->id = $id;
            if ($this->Job->save($this->request->data)) {

                $this->Session->setFlash(__('Job updated'));
                return $this->redirect(array('action' => 'edit_job/' . $id));
            }
            $this->set('resultset', $this->request->data["Job"]);
        } else {
            $this->set('resultset', $User["Job"]);
        }
        $this->render('admin_add_job');
    }

    /*
     * jobs area ->category
     */

    public function get_category_from_area() {
//        $this->layout=false;
        $area_id = $this->request->data['area'];
        if (!empty($area_id)) {

            $categories = $this->Category->find('all', array('conditions' => array('status' => 1, 'area_id' => $area_id)));
            if (!empty($categories)) {
                $response['status'] = 1;
                $response['data'] = $categories;
                $response['message'] = 'success';
            } else {
                $response['status'] = 0;
//                $response['data'] = $categories;
                $response['message'] = 'No record found';
            }
        } else {
            $response['status'] = 0;
//            $response['data'] = $area_id;
            $response['message'] = 'Category deleted or deactivated';
        }

        echo json_encode($response);
        $this->autoRender = false;
    }

    public function get_sub_category_from_category() {

        $category_id = $this->request->data['category'];
        if (!empty($category_id)) {

            $subcategories = $this->SubCategory->find('all', array('conditions' => array('status' => 1, 'category_id' => $category_id)));
            if (!empty($subcategories)) {
                $response['status'] = 1;
                $response['data'] = $subcategories;
                $response['message'] = 'success';
            } else {
                $response['status'] = 0;
//                $response['data'] = $categories;
                $response['message'] = 'No record found';
            }
        } else {
            $response['status'] = 0;
//            $response['data'] = $area_id;
            $response['message'] = 'Sub Category deleted or deactivated';
        }

        echo json_encode($response);
        $this->autoRender = false;
    }

    public function get_tests_from_sub_category() {

        $sub_category_id = $this->request->data['sub_category'];
        if (!empty($sub_category_id)) {

            $tests = $this->Test->find('all', array('conditions' => array('status' => 1, 'sub_category_id' => $sub_category_id)));
            if (!empty($tests)) {
                $response['status'] = 1;
                $response['data'] = $tests;
                $response['message'] = 'success';
            } else {
                $response['status'] = 0;
//                $response['data'] = $categories;
                $response['message'] = 'No record found';
            }
        } else {
            $response['status'] = 0;
//            $response['data'] = $area_id;
            $response['message'] = 'Tests deleted or deactivated';
        }

        echo json_encode($response);
        $this->autoRender = false;
    }

    //statistics page data
    // this function can be called later if pages need to be made slide/in that case user id b used to get
    //data further
    public function statistics() {




        $user_data = $this->Session->read('User');
//        debug($user_data);


        if (!empty($user_data)) {
            $user_id = $user_data['User']['id'];

            $jobs_posted = $this->Job->find('count', array(
                'fields' => 'Job.id',
                'conditions' => array('Job.status' => 1, 'Job.user_id' => $user_id)
            ));
//            debug($jobs_posted);
            /*
             * candidate statistics data
             */
            $jobs_test_data = array();
            //this will get all jobs of a user
            $this->Job->bindModel(
                    array('hasMany' => array(
                            'JobTest' => array(
                                'className' => 'JobTest'
                            )
                        )
                    )
            );
            $all_jobs = $this->Job->find('all', array('conditions' => array('status' => 1, 'user_id' => $user_id),
                'fields' => array('id', 'title')));
//            debug($all_jobs);
            $test_taken_count = 0;
            if (!empty($all_jobs)) {
                foreach ($all_jobs as $key => $value) {
                    $main_id = $key;
                    /*
                     * cal no of test taken from id of job in candidate test table
                     */

                    $test_taken_count += $this->CandidateTest->find('count', array(
                        'fields' => 'DISTINCT CandidateTest.test_id',
                        'conditions' => array('CandidateTest.job_id' => $value['Job']['id'])
                    ));


                    if (!empty($value['JobTest'])) {
//                        debug($value[])
                        foreach ($value['JobTest'] as $keyT => $valueT) {
//                            debug($valueT);
                            $test_data = $this->Test->find('first', array(
                                'conditions' => array('status' => 1, 'id' => $valueT['test_id']),
                                'fields' => array('title')
                            ));
//                            debug($test_data);
                            $all_jobs[$main_id]['JobTest'][$keyT]['title'] = $test_data['Test']['title'];
                        }
                    }
                }
            }
        } else {
            // throw user on home page
        }
        $this->set('posted_jobs', $all_jobs);
        $this->set('no_jobs_posted', $jobs_posted);
        $this->set('test_taken_count', $test_taken_count);
//        debug($all_jobs);
        //get user data 
        //jobs->tests
    }

    /*
     * no of tests total applied to this
     * highest scoren on any test for this job
     * lowest score
     * average score
     * total no of candidates for this job
     */

    public function get_job_stats_info($job_id) {
        $this->layout = false;
    }

    // stats page :when user clicks on test information of candidates given test for that job
    // email,name,score/duration/date
    public function get_candidate_info_on_test($test) {
        $this->layout = false;
    }

    public function general_job_modal() {
        $this->layout = false;
        $user_data = $this->Session->read('User');
//        debug($user_data);

        $all_jobs = array();
        if (!empty($user_data)) {
            $user_id = $user_data['User']['id'];
            $all_jobs = $this->Job->find('all', array('conditions' => array('status' => 1, 'user_id' => $user_id),
                'fields' => array('id', 'title', 'created_on')));
        }
        $this->set('posted_jobs', $all_jobs);
    }

    public function general_test_modal() {
        $this->layout = false;
        $user_data = $this->Session->read('User');
        $user_id = $user_data['User']['id'];
        $all_jobs = $this->Job->find('all', array('conditions' => array('status' => 1, 'user_id' => $user_id),
            'fields' => array('id')));
        $tests = array();
        if (!empty($all_jobs)) {
            foreach ($all_jobs as $key => $value) {

                $tests_id_array_data = $this->CandidateTest->find('all', array(
                    'fields' => 'DISTINCT CandidateTest.test_id',
                    'conditions' => array('CandidateTest.job_id' => $value['Job']['id'])
                ));
//                debug($tests_id_array_data);
                if (!empty($tests_id_array_data)) {
                    $test_id = $tests_id_array_data[0]['CandidateTest']['test_id'];
                    
                    $test_data = $this->Test->find('all', array(
                        'fields' => 'Test.title,Test.created_on',
                        'conditions' => array('Test.id' => $test_id)
                    ));
                    $tests[] = $test_data[0];
                }
            }
        } else {
            
        }
//        $this->set('posted_jobs', $all_jobs);
        $this->set('tests', $tests);
    }

}

