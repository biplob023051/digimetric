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
class CategoriesController extends AppController {
    var $name = 'Categories';
    public $components = array('Email', 'Cookie', 'Session');
    public $uses = array('Area','Category');
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

	 public function admin_manage_category() {
        $this->paginate = array(
            'conditions' => array('status !=' => '4'),
            'limit' => 10,
            'order' => array('id' => 'desc')
        );

        // we are using the 'User' model
        $Area = $this->paginate('Category');
		//debug($Area);
        if (!$Area) {
            throw new NotFoundException(__('No field found'));
        }
        $this->set('title_for_layout', 'Manage category');
        $this->set('resultset', $Area);
    }
	public function admin_get_categories(){
		//debug($this->getCategories());die;
		$this->autoRender = false;
		$this->set('categories',$this->getCategories());
	}
    public function admin_add_category() {
		//debug($this->getAreas());die;
        $arr = array();
		$this->set('areas',$this->getAreas());
		
		$this->set('form_data', array('controller' => 'categories', 'action' => 'add_category', 'id' => '', 'display_text' => 'Add'));
        if ($this->request->is('post')) {
           $this->set('title_for_layout', 'Add category');
           $img_name = $this->request->data['Category']['image']["name"];
		   $arr["Category"]["title"] = $this->request->data['Category']['title'];
		   $arr["Category"]["image"] = $img_name;
		   $arr["Category"]["status"] = 1;
		   $arr["Category"]["area_id"] = $this->request->data['Category']["area_id"];
		   //debug($arr);die;
		   $this->Category->create();
            if ($this->Category->save($arr)){
                    $path = WWW_ROOT . 'uploads/categories/' .$img_name ;
                    if (move_uploaded_file($this->request->data['Category']['image']['tmp_name'], $path)) {
						//success
                    }
                $this->Session->setFlash(__('New field added'));
                return $this->redirect(array('action' => 'add_category'));
            } /*else {
                $this->Session->setFlash(__('Could not add category'));
            }*/
			$this->set('resultset', $arr["Category"]);
        }
    }

    public function admin_edit_category($id = NULL) {
		$this->set('areas',$this->getAreas());
        $arr = array();
		$this->set('form_data', array('controller' => 'categories', 'action' => 'edit_category', 'id' => $id, 'display_text' => 'Edit'));
        $User = $this->Category->findById($id);
	    if (!$User) {
            throw new NotFoundException(__('field not found'));
        }
        if ($this->request->is('post')) {
			//debug($this->request->data);die;
			$file = $this->request->data['Category']['image'];
			!empty($file["name"]) ? (list($image_name) = array($file["name"])) : (list($image_name) = '');
			!empty($this->request->data['Category']['hidden_image']) ? (list($hidden_image) = array($this->request->data['Category']['hidden_image'])) : (list($hidden_image) = '');


			if($image_name <> ""){$img_name = $image_name;}
			else{$img_name = $hidden_image;}
			
			$arr['Category']["id"] = $id;
			$arr['Category']['image'] = $img_name;
			$arr['Category']['title'] = $this->request->data['Category']['title'];
			$arr["Category"]["area_id"] = $this->request->data['Category']["area_id"];

			//debug($arr);die;
			if ($this->Category->Save($arr)){
			if(!empty($image_name) && !empty($hidden_image)){
					//unlink prevoius file
					unlink(WWW_ROOT.'uploads/categories/'.$hidden_image);
                    $path = WWW_ROOT.'uploads/categories/'.$img_name;
                    $arr['file'] = $img_name;
                    if (move_uploaded_file($this->request->data['Category']['image']['tmp_name'], $path)) {}
				}
                $this->Session->setFlash(__('field has been updated'));
                return $this->redirect(array('action' => 'edit_category/' . $id));
            }
            $this->set('resultset', $arr['Category']);
        } else {
            $this->set('resultset', $User["Category"]);
        }
        $this->render('admin_add_category');
    }

    public function admin_delete_category($user_id) {
        $this->Category->id = $user_id;
        if ($this->Category->saveField('status', 4)) {
            $this->Session->setFlash(__('field deleted'));
        } else {
            $this->Session->setFlash(__('Could not delete'));
        }
        return $this->redirect(array('action' => 'manage_category/'));
    }

    public function admin_view_category($areaid) {
        $User = $this->Category->find('first', array('conditions' => array('id' => $areaid)));
		//debug($User);die;
        $this->set('resultset', $User["Category"]);
    }

    public function admin_enable_disable_category($user_id, $status) {

        $this->Category->id = $user_id;
        if ($this->Category->saveField('status', $status)) {
            $this->Session->setFlash(__('field status has been changed'));
        } else {
            $this->Session->setFlash(__('Could not update field status'));
        }
        return $this->redirect(array('action' => 'manage_category/'));
    }
}
