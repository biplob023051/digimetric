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
class SubCategoriesController extends AppController {
    var $name = 'SubCategories';
    public $components = array('Email', 'Cookie', 'Session');
    public $uses = array('Area','Category','SubCategory');
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
        $this->layout = 'admin_layout';
    }

	 public function admin_manage_subcategory() {
        $this->paginate = array(
            'conditions' => array('status !=' => '4'),
            'limit' => 10,
            'order' => array('id' => 'desc')
        );

        // we are using the 'User' model
        $Area = $this->paginate('SubCategory');
		//debug($Area);
        if (!$Area) {
            throw new NotFoundException(__('No subfield found'));
        }
        $this->set('title_for_layout', 'Manage category');
        $this->set('resultset', $Area);
    }
	
    public function admin_add_subcategory() {
        $arr = array();
		$this->set('categories',$this->getCategories());
		$this->set('form_data', array('controller' => 'sub_categories', 'action' => 'add_subcategory', 'id' => '', 'display_text' => 'Add'));
        if ($this->request->is('post')) {
           $this->set('title_for_layout', 'Add subfield');
           //$img_name = $this->request->data['SubCategory']['image']["name"];
		   $arr["SubCategory"]["title"] = $this->request->data['SubCategory']['title'];
		   //$arr["Category"]["image"] = $img_name;
		   $arr["SubCategory"]["status"] = 1;
		   $arr["SubCategory"]["category_id"] = $this->request->data['SubCategory']["category_id"];
		   //debug($arr);die;
		   $this->SubCategory->create();
            if ($this->SubCategory->save($arr)){
                    /*$path = WWW_ROOT . 'uploads/categories/' .$img_name ;
                    if (move_uploaded_file($this->request->data['Category']['image']['tmp_name'], $path)) {
						//success
                    }*/
                $this->Session->setFlash(__('New subfield added'));
                return $this->redirect(array('action' => 'add_subcategory'));
            } /*else {
                $this->Session->setFlash(__('Could not add sub field'));
            }*/
			$this->set('resultset', $arr["SubCategory"]);
        }
    }

    public function admin_edit_subcategory($id = NULL) {
		$this->set('categories',$this->getCategories());
        $arr = array();
		$this->set('form_data', array('controller' => 'sub_categories', 'action' => 'edit_subcategory', 'id' => $id, 'display_text' => 'Edit'));
        $User = $this->SubCategory->findById($id);
	    if (!$User) {
            throw new NotFoundException(__('subfield not found'));
        }
        if ($this->request->is('post')) {
			//debug($this->request->data);die;
			//$file = $this->request->data['SubCategory']['image'];
			//!empty($file["name"]) ? (list($image_name) = array($file["name"])) : (list($image_name) = '');
			//!empty($this->request->data['SubCategory']['hidden_image']) ? (list($hidden_image) = array($this->request->data['Category']['hidden_image'])) : (list($hidden_image) = '');


			/*if($image_name <> ""){$img_name = $image_name;}
			else{$img_name = $hidden_image;}*/
			
			$arr['SubCategory']["id"] = $id;
			//$arr['SubCategory']['image'] = $img_name;
			$arr['SubCategory']['title'] = $this->request->data['SubCategory']['title'];
			$arr["SubCategory"]["category_id"] = $this->request->data['SubCategory']["category_id"];

			//debug($arr);die;
			if ($this->SubCategory->Save($arr)){
			/*if(!empty($image_name) && !empty($hidden_image)){
					//unlink prevoius file
					unlink(WWW_ROOT.'uploads/categories/'.$hidden_image);
                    $path = WWW_ROOT.'uploads/categories/'.$img_name;
                    $arr['file'] = $img_name;
                    if (move_uploaded_file($this->request->data['Category']['image']['tmp_name'], $path)) {}
				}*/
                $this->Session->setFlash(__('subfield has been updated'));
                return $this->redirect(array('action' => 'edit_subcategory/' . $id));
            }
            $this->set('resultset', $arr['SubCategory']);
        } else {
            $this->set('resultset', $User["SubCategory"]);
        }
        $this->render('admin_add_subcategory');
    }

    public function admin_delete_subcategory($user_id) {
        $this->SubCategory->id = $user_id;
        if ($this->SubCategory->saveField('status', 4)) {
            $this->Session->setFlash(__('subfield deleted'));
        } else {
            $this->Session->setFlash(__('Could not delete'));
        }
        return $this->redirect(array('action' => 'manage_subcategory/'));
    }

    public function admin_view_subcategory($areaid) {
        $User = $this->SubCategory->find('first', array('conditions' => array('id' => $areaid)));
		//debug($User);die;
        $this->set('resultset', $User["SubCategory"]);
    }

    public function admin_enable_disable_subcategory($user_id, $status) {

        $this->SubCategory->id = $user_id;
        if ($this->SubCategory->saveField('status', $status)) {
            $this->Session->setFlash(__('subfield status has been changed'));
        } else {
            $this->Session->setFlash(__('Could not update subfield status'));
        }
        return $this->redirect(array('action' => 'manage_subcategory/'));
    }
}
