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
class BlogsController extends AppController {

    /**
     * This controller does not use a model
     *
     * @var array
     */
    var $name = 'Blogs';
    public $uses = array('Blog', 'BlogFile', 'BlogTag');
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
        $this->layout = 'blog_layout';
    }

    public function index($tag = null) {
//        echo $tag;
        $this->set('all_locations', $this->getCountrys());

        // list blogs order descending
        $this->Blog->bindModel(
                array('hasMany' => array(
                        'BlogFile' => array(
                            'className' => 'BlogFile'
                        ), 'BlogTag' => array(
                            'className' => 'BlogTag'
                        )
                    )
                )
        );
        if ($this->request->is('post')) {
            $month = $this->request->data('archive');
            if ($month == 0) {
                $all_blogs = $this->Blog->find('all', array('order' => array('id' => 'DESC'), 'conditions' => array('status' => 1,)));
            } else {
                $all_blogs = $this->Blog->find('all', array(
                    'order' => array('id' => 'DESC'),
                    'conditions' => array('MONTH(Blog.published_on)' => $month, 'status' => 1)
                        )
                );
//                , array()
            }
//            $month = 
            $this->set('month', $month);
        } else {
//            debug($this->request->data);
            if (!empty($tag)) {
                $options['joins'] = array(
                    array('table' => 'blog_tags',
                        'alias' => 'BlogTag',
                        'type' => 'Inner',
                        'conditions' => array(
                            'Blog.id= BlogTag.blog_id',
                        )
                    )
                );
                $options['conditions'] = array(
                    'BlogTag.tag like' => "%$tag%",
                    'Blog.status' => 1
                );
                $options['order'] = array(
//                'BlogTag.tag like' => "%$tag%",
                    'Blog.id' => 'DESC'
                );
            } else {
                $options['conditions'] = array(
//                    'BlogTag.tag' => $tag,
                    'Blog.status' => 1
                );
                $options['order'] = array(
//                'BlogTag.tag like' => "%$tag%",
                    'Blog.id' => 'DESC'
                );
            }

            $all_blogs = $this->Blog->find('all', $options);

//            $all_blogs = $this->Blog->find('all', array('conditions' => array('Blog.status' => 1), 'order' => array('Blog.id' => 'DESC')));
        }
        //get all distinct tags and send to view page here
        $tags = array();
        $tags = $this->BlogTag->find('all', array(
            'fields' => array('DISTINCT BlogTag.tag'),
        ));

        //  debug($all_blogs);
        $this->set('all_tagss', $tags);
        // all blogs
        if (!empty($tag)) {
            $this->set('selectedtag', $tag);
        }
        $this->set('all_blogs', $all_blogs);
    }

    public function blog_detail($blogid) {
        $this->set('all_locations', $this->getCountrys());
        if (!empty($blogid)) {

            $blog = $this->Blog->find('first', array('conditions' => array('slug' => $blogid)));
            //debug($blog);die;
            $blog_file = $this->BlogFile->find('all', array('conditions' => array('blog_id' => $blog['Blog']['id'])));
            $blog_tags = $this->BlogTag->find('all', array('conditions' => array('blog_id' => $blog['Blog']['id'])));
            $this->set('blog_detail', $blog);
            $this->set('blog_file', $blog_file);
            $this->set('blog_tag', $blog_tags);
        } else {
            $this->redirect('index');
        }
    }

    public function admin_manage_blog() {
        $this->layout = "admin_layout";
        $this->Blog->bindModel(
                array('hasMany' => array(
                        'BlogTag' => array(
                            'className' => 'BlogTag'
                        )
                    )
                )
        );
        $this->paginate = array(
            'conditions' => array('status !=' => '4'),
            'limit' => 10,
            'order' => array('id' => 'desc')
        );

        // we are using the 'User' model
        $User = $this->paginate('Blog');
//        debug($User);
        if (!$User) {
            throw new NotFoundException(__('No blog found'));
        }
        $this->set('title_for_layout', 'Manage blog');
        $this->set('resultset', $User);
    }

    /* public	function stringToSlug($str) {
      // turn into slug
      $str = Inflector::slug($str);
      // to lowercase
      $str = strtolower($str);
      return $str;
      } */

    // CakePHP code in the slug function uses a regular expression:
    //$string = preg_replace(array('/[^\w\s]/', '/\\s+/') , array(' ', $replacement), $string);

    public function admin_add_blog() {
        $this->layout = "admin_layout";
        $this->set('country', $this->getCountrys());
        $this->set('form_data', array('controller' => 'blogs', 'action' => 'add_blog', 'id' => '', 'display_text' => 'Add'));



        if ($this->request->is('post')) {

//            $tags_comma_seperated = $this->request->data['tags_input'];
//            debug($this->request->data);
//            die;
            $this->set('title_for_layout', 'Add blog');
            $this->Blog->set($this->request->data);
//            if ($this->User->validates()) {
//                $this->request->data["User"]["status"] = 1;
            if (empty($this->request->data["Blog"]["publish_by"])) {
                $this->request->data["Blog"]["publish_by"] = 'Admin';
            }
            $this->request->data["Blog"]["slug"] = $this->Blog->createSlug($this->request->data["Blog"]["title"]);
            $this->request->data["Blog"]["published_on"] = date("Y-m-d");

//			debug($this->request->data["Blog"]);die;
            $this->Blog->create();
            if ($this->Blog->save($this->request->data)) {
                /*
                 * add blog files here
                 */
//                echo WWW_ROOT . DS;
                $arr['blog_id'] = $this->Blog->getLastInsertId();
                $files = $this->request->data['BlogFile']['file'];
                foreach ($files as $key => $value) {
//                    debug($value);
//                    $this->data['BlogFile']['file'] = WWW_ROOT . DS . $value['name'];
//                    $this->data['BlogFile']['file_type'] = 'image';
                    $path = WWW_ROOT . 'uploads/' . $value['name'];
                    $arr['file'] = $value['name'];
                    $arr['file_type'] = 'image';
                    if (move_uploaded_file($value['tmp_name'], $path)) {
                        $this->BlogFile->create();
                        $this->BlogFile->save($arr);
                    }
                }
                /*
                 * add blog tags here 
                 */
                if ($this->request->data['tags_input']) {

                    $tags_comma_seperated = $this->request->data['tags_input'];
                    if (!empty($tags_comma_seperated)) {

                        $tags = explode(',', $tags_comma_seperated);
                        foreach ($tags as $key => $value) {

                            $this->BlogTag->create();
                            $this->BlogTag->save(array('blog_id' => $arr['blog_id'],'tag'=>strtolower(trim($value))));
                        }
                    }
                }




                $this->Session->setFlash(__('New Blog added'));
                return $this->redirect(array('action' => 'add_blog'));
            } else {
                $this->Session->setFlash(__('Could not add blog'));
            }
//            } else {
//                $errors = $this->User->validationErrors;
//                $this->set('errors', $errors);
//                $this->request->data["User"]["do"] = "add";
//                $this->set('resultset', $this->request->data["User"]);
//                //$this->Session->setFlash(__('Error'));
//            }
        }
    }

    public function admin_edit_blog($id = NULL) {
        $this->layout = "admin_layout";
//        $this->set('country', $this->getCountrys());
        $this->set('form_data', array('controller' => 'blogs', 'action' => 'edit_blog', 'id' => $id, 'display_text' => 'Edit'));
        $this->Blog->bindModel(
                array('hasMany' => array(
                        'BlogTag' => array(
                            'className' => 'BlogTag'
                        )
                    )
                )
        );
        $User = $this->Blog->findById($id);

        if (!$User) {
            throw new NotFoundException(__('Blog not found'));
        }
        if ($this->request->is('post')) {
            $this->Blog->id = $id;
            if ($this->Blog->save($this->request->data)) {

                /*
                 * blog files update too
                 */
                /*
                 * delete files selected to remove 
                 */




                $arr['blog_id'] = $id;
                $files = $this->request->data['BlogFile']['file'];
                foreach ($files as $key => $value) {
//                    debug($value);
//                    $this->data['BlogFile']['file'] = WWW_ROOT . DS . $value['name'];
//                    $this->data['BlogFile']['file_type'] = 'image';
                    $path = WWW_ROOT . 'uploads/' . $value['name'];
                    $arr['file'] = $value['name'];
                    $arr['file_type'] = 'image';
                    if (move_uploaded_file($value['tmp_name'], $path)) {
                        $this->BlogFile->deleteAll(array('BlogFile.blog_id' => $id), false);
                        $this->BlogFile->create();
                        $this->BlogFile->save($arr);
                    }
                }


                /*
                 * blog files 
                 */

                /* if blog updated then update tags too 
                 * delete all tags before saving 
                 * add blog tags here 
                 */
                if ($this->request->data['tags_input']) {
                    $this->BlogTag->deleteAll(array('BlogTag.blog_id' => $id), false);
                    $tags_comma_seperated = $this->request->data['tags_input'];
                    if (!empty($tags_comma_seperated)) {

                        $tags = explode(',', $tags_comma_seperated);
                        foreach ($tags as $key => $value) {

                            $this->BlogTag->create();
                            $this->BlogTag->save(array('blog_id' => $id, 'tag' => strtolower(trim($value))));
                        }
                    }
                }



                /*
                 * tags 
                 */

                $this->Session->setFlash(__('Blog updated'));
                return $this->redirect(array('action' => 'edit_blog/' . $id));
            }
            $this->set('resultset', $this->request->data["Blog"]);
        } else {
            /*
             * also associate blog tags and files
             */


            $tag_array = $User['BlogTag'];
            $all_tags = array();
            if (!empty($tag_array)) {
                foreach ($tag_array as $key => $value) {
//                                                debug($value);
                    $all_tags[] = trim($value['tag']);
                }
                $User["Blog"]['tags_input'] = implode(",", $all_tags);
            } else {
                $User["Blog"]['tags_input'] = '';
            }

            $this->set('resultset', $User["Blog"]);
        }
        $this->render('admin_add_blog');
    }

    public function admin_delete_blog($user_id) {
        $this->Blog->id = $user_id;
        if ($this->Blog->saveField('status', 4)) {
            $this->BlogTag->deleteAll(array('BlogTag.blog_id' => $user_id), false);
            $this->Session->setFlash(__('Blog deleted'));
        } else {
            $this->Session->setFlash(__('Could not delete'));
        }
        return $this->redirect(array('action' => 'manage_blog/'));
    }

    public function admin_view_blog($blogid) {
        $this->layout = "admin_layout";
        $User = $this->Blog->find('first', array('conditions' => array('id' => $blogid)));
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

    public function admin_enable_disable_blog($user_id, $status) {

        $this->Blog->id = $user_id;
        if ($this->Blog->saveField('status', $status)) {
            $this->Session->setFlash(__('Blog status has been changed'));
        } else {
            $this->Session->setFlash(__('Could not update blog status'));
        }
        return $this->redirect(array('action' => 'manage_blog/'));
    }

    public function ajax_signup($first = NULL, $last = NULL, $email = NULL, $pwd = NULL, $r_pwd = NULL, $comp = NULL, $country = NULL) {
        $this->autoRender = false;
//        echo $first;
//        echo $last;
//        echo $email;
//        echo $pwd;
//        echo $r_pwd;
//        echo $comp;
//        echo $country;


        $this->request->data['User']['first_name'] = $first;
        $this->request->data['User']['last_name'] = $last;
        $this->request->data['User']['email'] = $email;
        $this->request->data['User']['password'] = md5($pwd);
        $this->request->data['User']['company'] = $comp;
        $this->request->data['User']['country'] = $country;
        $this->request->data['User']['status'] = 1;

        /*
         * check if already exists throw exception in such case
         */
        $chk_email_exits = $this->User->find('first', array('conditions' => array('User.email' => $email)));
        if (empty($chk_email_exits)) {
            $this->User->create();
            if ($this->User->save($this->request->data, FALSE)) {
                $newUserId = $this->User->id;

                $user_arr = $this->User->findById($newUserId);

                $this->Session->write('User', $user_arr);
                $res['status'] = 1;
                $res['message'] = 'Your account has been created successfully';
//                $res['exists'] = $chk_email_exits;
            } else {
                $res['status'] = 0;
                $res['message'] = 'Your account cannot be saved at the moment.Please try again.';
//                $res['exists'] = $chk_email_exits;
            }
        } else {
            $res['status'] = 0;
            $res['message'] = 'This email id is already registered with our database';
        }




        echo json_encode($res);




//        debug($data);
    }

    public function ajax_signup_footer($first = NULL, $email, $comp = NULL) {
        $this->autoRender = false;
        $this->request->data['User']['first_name'] = $first;
//        $this->request->data['User']['last_name'] = $last;
        $this->request->data['User']['email'] = $email;
//        $this->request->data['User']['password'] = md5($pwd);
        $this->request->data['User']['company'] = $comp;
//        $this->request->data['User']['country'] = $country;
        $this->request->data['User']['status'] = 1;

        /*
         * check if already exists throw exception in such case
         */
        $chk_email_exits = $this->User->find('first', array('conditions' => array('User.email' => $email)));
        if (empty($chk_email_exits)) {
            $this->User->create();
            if ($this->User->save($this->request->data, FALSE)) {
                $newUserId = $this->User->id;

                $user_arr = $this->User->findById($newUserId);

                $this->Session->write('User', $user_arr);
                $res['status'] = 1;
                $res['message'] = 'Your account has been created successfully';
//                $res['exists'] = $chk_email_exits;
            } else {
                $res['status'] = 0;
                $res['message'] = 'Your account cannot be saved at the moment.Please try again.';
//                $res['exists'] = $chk_email_exits;
            }
        } else {
            $res['status'] = 0;
            $res['message'] = 'This email id is already registered with our database';
        }




        echo json_encode($res);




//        debug($data);
    }

    public function ajax_signin($email = NULL, $pwd = NULL) {

//        Debugger::dump($param);


        $this->autoRender = false;

        $email = $email;
        $password = $pwd;

        $user_arr = $this->User->find('first', array('conditions' => array('User.email' => $email, 'User.password' => md5($password))));

        if (!empty($user_arr)) {




            $this->Session->write('User', $user_arr);
            $res['status'] = 1;
            $res['message'] = 'Login success';
//            $this->Session->setFlash('Login success');
        } else {
            $res['status'] = 0;
            $res['message'] = 'Sorry ! We are not able to recognize that combination';
//            $this->Session->setFlash('Sorry ! We are not able to recognize that combination');
        }
        echo json_encode($res);
    }

}
