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
class ContactUsController extends AppController {

    /**
     * 
     *
     * @var array
     */
    var $name = 'ContactUs';
    //$uses are the models that this controller will use
    public $uses = array('User');
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
        $this->layout = 'blog_layout';
    }

    public function index() {
        $this->set('all_locations', $this->getCountrys());
    }

    public function ajax_submit_contact_info() {
        $this->autoRender = false;
//       echo "<pre>";
//       print_r($this->request->data);
//       echo "</pre>";   
//        $this->request->data['User']['first_name'] = $this->request->data['fname_contact'];
//        $this->request->data['User']['last_name'] = $this->request->data['lname_contact'];
//        $this->request->data['User']['email'] = $this->request->data['email_contact'];
//        $this->request->data['User']['company'] = $this->request->data['company_contact'];
        $this->request->data['User']['status'] = 1;
        $this->request->data['User']['user_type'] = 1;
        $chk_email_exits = $this->User->find('first', array('conditions' => array('User.email' => $this->request->data['User']['email'],'status !='=>4)));
        if (empty($chk_email_exits)) {
//            echo "<pre>";
//       print_r($this->request->data);
//       echo "</pre>";   
//       die;
            $this->User->create();
//            $this->User->save($this->request->data,FALSE);
//            $log = $this->User->getDataSource()->getLog(false, false);
//            print_r($log);
//            die;
            if ($this->User->save($this->request->data,FALSE)) {
                
//                $db = ConnectionManager::getDataSource('default');
//                debug($db->getLog());
                $newUserId = $this->User->id;

                $user_arr = $this->User->findById($newUserId);

//                $this->Session->write('User', $user_arr);
                $res['status'] = 1;
                $res['message'] = 'Thank you for contacting us.We will get back to you shortly';
//                $res['exists'] = $chk_email_exits;
            } else {
                $res['status'] = 0;
                $res['message'] = 'Your account cannot be saved at the moment.Please try again.';
//                $res['exists'] = $chk_email_exits;
            }
        } else {
            $res['status'] = 0;
            $res['message'] = 'We have already received information with this email.';
        }
        echo json_encode($res);
    }

}

