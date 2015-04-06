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
     * This controller does not use a model
     *
     * @var array
     */
    var $name = 'Jobs';
    public $uses = array('Job', 'JobCategory','JobTest');
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
        $this->layout = 'job_layout';
    }

    public function index() {

        /*
         * redirect to home if access direct
         */
//        $this->layout = false;
        $user_id = $this->Session->read('User');
        debug($user_id);
//        if (empty($user_id)) {
//            $this->redirect(BASEURL);
//        }
        // job has many tests added to it :: associate them too

        $this->JobTest->recursive = -1;

        $this->Job->bindModel(
                array('hasMany' => array(
                        'JobTest' => array(
                            'className' => 'JobTest'
                        )
                    )
                )
        );

        $all_jobs = $this->Job->find('all', array('conditions' => array('Job.user_id' => $user_id['User']['id'],
                'Job.status' => 1
        )));
        $this->set('all_jobs', $all_jobs);

//        $this->set('jobs');
    }

    public function add() {
        // show create job page   user must be logged in and also he must have previliges as per his job plan selected while sign up
        // get job categories to display here 
        //1) check for user previlige to add job here



        $user_id = $this->Session->read('User');
//        debug($user_id);

        if ($this->request->is('post')) {
            $this->Job->create();
            if ($this->Job->save($this->request->data)) {
                $this->Session->setFlash(__('Your job has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your job.'));
        }

        $all_job_cats = $this->JobCategory->find('all', array('conditions' => array('JobCategory.status' => 1)));
        $this->set('all_cats', $all_job_cats);
    }

}
