<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	//public $helpers = array('Ck');

    public function beforeFilter() {
        // get the global settings
        $site_settings = $this->_getSettings();
        $this->set(compact('site_settings'));
    }

    function is_admin_loggedin() {
        // if the admin session hasn't been set
        if (!$this->Session->check('Admin')) {
            // set flash message and redirect
            $this->Session->setFlash('Unauthorized to access this area');
            //$this->Session->setFlash('You need to be logged in to access this area');
            $this->redirect('/admin'); 
            exit();
        }
    }

    public function debug($param) {
        echo "<pre>";
        print_r($param);
        echo "</pre>";
    }

    public function getCountrys($limit = null) {
        $userlimit = '';
        if (!empty($limit)) {
            $userlimit = $limit;
        }
        $this->loadModel('Country');
        $options = array('conditions' => array('status' => 1), 'limit' => $userlimit);
        $all = $this->Country->find('all', $options);
		//debug($all);die;
        return $all;
    }
    public function getCategories($limit = null) {
        $userlimit = '';
        if (!empty($limit)) {
            $userlimit = $limit;
        }
        $this->loadModel('Category');
        $options = array('conditions' => array('status' => 1), 'limit' => $userlimit);
        $all = $this->Category->find('all', $options);
		//debug($all);die;
        return $all;
    }
    public function getSubCategories($limit = null) {
        $userlimit = '';
        if (!empty($limit)) {
            $userlimit = $limit;
        }
        $this->loadModel('SubCategory');
        $options = array('conditions' => array('status' => 1), 'limit' => $userlimit);
        $all = $this->SubCategory->find('all', $options);
        
		//debug($all);die;
        return $all;
    }
    
    public function getDifficulties($limit = null) {
        $userlimit = '';
        if (!empty($limit)) {
            $userlimit = $limit;
        }
        $this->loadModel('Difficulty');
        $options = array('conditions' => array('status' => 1), 'limit' => $userlimit);
        $all = $this->Difficulty->find('all', $options);
        
		//debug($all);die;
        return $all;
    }
    
    public function getAreas($limit = null) {
        $userlimit = '';
        if (!empty($limit)) {
            $userlimit = $limit;
        }
        $this->loadModel('Area');
        $options = array('conditions' => array('status' => 1), 'limit' => $userlimit);
        $all = $this->Area->find('all', $options);
        
		//debug($all);die;
        return $all;
    }
    
    public function getJobCategories() {
        
        $this->loadModel('JobCategory');
        $options = array('conditions' => array('status' => 1));
        $all = $this->JobCategory->find('all', $options);
        
		//debug($all);die;
        return $all;
        
    }

    /**
     * Get global site settings
     * @return array
     */
    public function _getSettings() {
        $this->loadModel('Setting');
        $settings = $this->Setting->find('list', array('fields' => array('field', 'value')));
        return $settings;
    }
}
