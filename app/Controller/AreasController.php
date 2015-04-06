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
class AreasController extends AppController {
    var $name = 'Areas';
    public $components = array('Email', 'Cookie', 'Session');
    public $uses = array('Area');
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

	 public function admin_manage_area() {
        $this->paginate = array(
            'conditions' => array('status !=' => '4'),
            'limit' => 10,
            'order' => array('id' => 'desc')
        );

        // we are using the 'User' model
        $Area = $this->paginate('Area');
		//debug($Area);
        if (!$Area) {
            throw new NotFoundException(__('No area found'));
        }
        $this->set('title_for_layout', 'Manage area');
        $this->set('resultset', $Area);
    }

    public function admin_add_area() {
        $arr = array();
		$this->set('form_data', array('controller' => 'areas', 'action' => 'add_area', 'id' => '', 'display_text' => 'Add'));
        if ($this->request->is('post')) {
            $this->set('title_for_layout', 'Add area');
           $img_name = $this->request->data['Area']['image']["name"];
		   $arr["Area"]["title"] = $this->request->data['Area']['title'];
		   $arr["Area"]["image"] = $img_name;
		   $arr["Area"]["status"] = 1;
		   
		   $this->Area->create();
            if ($this->Area->save($arr)){
                    $path = WWW_ROOT . 'uploads/areas/' .$img_name ;
                    if (move_uploaded_file($this->request->data['Area']['image']['tmp_name'], $path)) {
						//success
                    }
                $this->Session->setFlash(__('New area added'));
                return $this->redirect(array('action' => 'add_area'));
            } /*//else {
                $this->Session->setFlash(__('Could not add area'));
            }*/
			$this->set('resultset', $arr["Area"]);
        }
    }

    public function admin_edit_area($id = NULL) {
        $arr = array();
		$this->set('form_data', array('controller' => 'areas', 'action' => 'edit_area', 'id' => $id, 'display_text' => 'Edit'));
        $User = $this->Area->findById($id);
	    if (!$User) {
            throw new NotFoundException(__('area not found'));
        }
        if ($this->request->is('post')) {
			//debug($this->request->data);die;
			$file = $this->request->data['Area']['image'];
			!empty($file["name"]) ? (list($image_name) = array($file["name"])) : (list($image_name) = '');
			!empty($this->request->data['Area']['hidden_image']) ? (list($hidden_image) = array($this->request->data['Area']['hidden_image'])) : (list($hidden_image) = '');


			if($image_name <> ""){$img_name = $image_name;}
			else{$img_name = $hidden_image;}
			
			$arr['Area']["id"] = $id;
			$arr['Area']['image'] = $img_name;
			$arr['Area']['title'] = $this->request->data['Area']['title'];
			//debug($arr);die;
			if ($this->Area->Save($arr)){
			if(!empty($image_name) && !empty($hidden_image)){
					//unlink prevoius file
					unlink(WWW_ROOT.'uploads/areas/'.$hidden_image);
                    $path = WWW_ROOT.'uploads/areas/'.$img_name;
                    $arr['file'] = $img_name;
                    if (move_uploaded_file($this->request->data['Area']['image']['tmp_name'], $path)) {}
				}
                $this->Session->setFlash(__('area has been updated'));
                return $this->redirect(array('action' => 'edit_area/' . $id));
            }
            $this->set('resultset', $arr['Area']);
        } else {
            $this->set('resultset', $User["Area"]);
        }
        $this->render('admin_add_area');
    }

    public function admin_delete_area($user_id) {
        $this->Area->id = $user_id;
        if ($this->Area->saveField('status', 4)) {
            $this->Session->setFlash(__('area deleted'));
        } else {
            $this->Session->setFlash(__('Could not delete'));
        }
        return $this->redirect(array('action' => 'manage_area/'));
    }

    public function admin_view_area($areaid) {
        $User = $this->Area->find('first', array('conditions' => array('id' => $areaid)));
		//debug($User);die;
        $this->set('resultset', $User["Area"]);
    }

    public function admin_enable_disable_area($user_id, $status) {

        $this->Area->id = $user_id;
        if ($this->Area->saveField('status', $status)) {
            $this->Session->setFlash(__('area status has been changed'));
        } else {
            $this->Session->setFlash(__('Could not update area status'));
        }
        return $this->redirect(array('action' => 'manage_area/'));
    }
}
