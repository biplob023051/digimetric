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
class TestsController extends AppController {

    /**
     * This controller does not use a model
     *
     * @var array
     */
    var $name = 'Tests';
    public $uses = array('Test', 'TestQuestions');
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
    }

    public function admin_manage_test() {
        $this->layout = "admin_layout";

        $this->Test->bindModel(
                array('belongsTo' => array(
                        'Area' => array(
                            'className' => 'Area',
                            'conditions' => array('Area.status' => 1),
                        ), 'Category' => array(
                            'className' => 'Category',
                            'conditions' => array('Category.status' => 1),
                        ),
                        'SubCategory' => array(
                            'className' => 'SubCategory',
                            'conditions' => array('SubCategory.status' => 1),
                        ),
                        'Difficulty' => array(
                            'className' => 'Difficulty',
                            'conditions' => array('Difficulty.status' => 1),
                        )
                    )
                )
        );


        $this->paginate = array(
            'conditions' => array('Test.status !=' => '4'),
            'limit' => 10,
            'order' => array('Test.id' => 'desc')
        );
        $User = $this->paginate('Test');

//        debug($User);
        if (!$User) {
            throw new NotFoundException(__('No test found'));
        }
        $this->set('title_for_layout', 'Manage test');
        $this->set('resultset', $User);
    }

    public function admin_add_test() {
        $this->layout = "admin_layout";
        $this->set('areas', $this->getAreas());
        $this->set('difficulties', $this->getDifficulties());

        $this->set('categories', $this->getCategories());
        $this->set('subcategories', $this->getSubCategories());

        $this->set('form_data', array('controller' => 'tests', 'action' => 'add_test', 'id' => '', 'display_text' => 'Add'));

        if ($this->request->is('post')) {
//            debug($this->request->data);
//            die;
            $this->set('title_for_layout', 'Add Test');

            if ($this->Test->atleast_one_selected($this->request->data)) {
                $this->Test->set($this->request->data);
                $this->Test->create();
                $path = WWW_ROOT . 'uploads/test_logo/' . $this->request->data["Test"]["logo"]['name'];
                move_uploaded_file($this->request->data["Test"]["logo"]['tmp_name'], $path);
                $this->request->data["Test"]["logo"] = $this->request->data["Test"]["logo"]['name'];
                if ($this->Test->save($this->request->data)) {

                    $arr['test_id'] = $this->Test->getLastInsertId();

                    $this->Session->setFlash(__('New Test added'));
                    return $this->redirect(array('action' => 'add_test'));
                } else {
                    $this->set('resultset', $this->request->data["Test"]);
                    $this->Session->setFlash(__('Could not add test'));
                }
            } else {

//                $this->set('categories', array());
//                $this->set('subcategories', array());
                $this->set('resultset', $this->request->data["Test"]);

                $this->Test->validationErrors['custom'] = "Please make atleast one selection out of hour,min,secs";
                $this->Session->setFlash(__('Could not add test'));
            }
        }
    }

    public function admin_edit_test($id = NULL) {
        $this->layout = "admin_layout";
        $this->set('areas', $this->getAreas());
        $this->set('categories', $this->getCategories());
        $this->set('subcategories', $this->getSubCategories());
        $this->set('difficulties', $this->getDifficulties());

        $this->set('form_data', array('controller' => 'tests', 'action' => 'edit_test', 'id' => $id, 'display_text' => 'Edit'));

        $User = $this->Test->findById($id);
        $this->set('current_logo', $User['Test']['logo']);

        if (!$User) {
            throw new NotFoundException(__('Test not found'));
        }
        if ($this->request->is('post')) {
            if ($this->Test->atleast_one_selected($this->request->data)) {

                if (empty($this->request->data["Test"]["logo"]['name'])) {
                    unset($this->request->data["Test"]["logo"]);
                } else {
                    //unlink previous file pending here
                    $path = WWW_ROOT . 'uploads/test_logo/' . $this->request->data["Test"]["logo"]['name'];
                    move_uploaded_file($this->request->data["Test"]["logo"]['tmp_name'], $path);
                    $this->request->data["Test"]["logo"] = $this->request->data["Test"]["logo"]['name'];
                }
//                    debug($this->request->data);
//                die;
                $this->Test->id = $id;


                if ($this->Test->save($this->request->data)) {
                    $this->Session->setFlash(__('Test updated'));
                    return $this->redirect(array('action' => 'edit_test/' . $id));
                } else {
                    $this->set('resultset', $this->request->data["Test"]);
                }
            } else {
                $this->set('resultset', $this->request->data["Test"]);

                $this->Test->validationErrors['custom'] = "Please make atleast one selection out of hour,min,secs";
                $this->Session->setFlash(__('Could not add test'));
            }
        } else {
            /*
             * also associate blog tags and files
             */

            $this->set('resultset', $User["Test"]);
        }
        $this->render('admin_add_test');
    }

    public function admin_delete_test($user_id) {
        $this->Test->id = $user_id;
        if ($this->Test->saveField('status', 4)) {
            $this->Session->setFlash(__('Test deleted'));
        } else {
            $this->Session->setFlash(__('Could not delete'));
        }
        return $this->redirect(array('action' => 'manage_test/'));
    }

    public function admin_view_test($blogid) {
        $this->layout = "admin_layout";
        $User = $this->Test->find('first', array('conditions' => array('id' => $blogid)));
        $User["Blog"]["BlogFile"] = $this->BlogFile->find('all', array('conditions' => array('blog_id' => $blogid)));
        $tag_array = $this->BlogTag->find('all', array('conditions' => array('blog_id' => $blogid)));
//        debug($tag_array);
        $all_tags = array();
        if (!empty($tag_array)) {
            foreach ($tag_array as $key => $value) {
//                                                debug($value);
                $all_tags[] = $value['BlogTag']['tag'];
            }
            $User["Blog"]['tags_input'] = implode(",", $all_tags);
        } else {
            $User["Blog"]['tags_input'] = '';
        }
        $this->set('resultset', $User["Blog"]);
//        $this->set('blog_file', $blog_file);
    }

    public function admin_enable_disable_test($user_id, $status) {

        $this->Test->id = $user_id;
        if ($this->Test->saveField('status', $status)) {
            $this->Session->setFlash(__('Test status has been changed'));
        } else {
            $this->Session->setFlash(__('Could not update test status'));
        }
        return $this->redirect(array('action' => 'manage_test/'));
    }

}
