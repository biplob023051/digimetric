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
App::uses('CakeEmail', 'Network/Email');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class UsersController extends AppController {

    /**
     * This controller does not use a model
     *
     * @var array
     */
    var $name = 'Users';
    public $uses = array('User', 'JobCandidate');
    public $helpers = array('Form', 'Html', 'Js', 'Time', 'Session');
    public $components = array('Hybridauth');

    public function beforeFilter() {
        parent::beforeFilter();
		
	//	debug($this->Session->read("User"));
    }

    /**
     * Displays a view
     *
     * @param mixed What page to display
     * @return void
     * @throws NotFoundException When the view file could not be found
     * 	or MissingViewException in debug mode.
     */
    public function social_login($provider) {
        $this->autoRender = false;
        if ($this->Hybridauth->connect($provider)) {
            $this->_successfulHybridauth($provider, $this->Hybridauth->user_profile);
        } else {
            // error
            $this->Session->setFlash($this->Hybridauth->error);
//            $this->redirect($this->Auth->loginAction);
        }
    }

    public function social_endpoint($provider) {
        $this->Hybridauth->processEndpoint();
    }

    private function _successfulHybridauth($provider, $incomingProfile) {
        debug($incomingProfile);
//        // #1 - check if user already authenticated using this provider before
//        $this->SocialProfile->recursive = -1;
//        $existingProfile = $this->SocialProfile->find('first', array(
//            'conditions' => array('social_network_id' => $incomingProfile['SocialProfile']['social_network_id'], 'social_network_name' => $provider)
//        ));
//
//        if ($existingProfile) {
//            // #2 - if an existing profile is available, then we set the user as connected and log them in
//            $user = $this->User->find('first', array(
//                'conditions' => array('id' => $existingProfile['SocialProfile']['user_id'])
//            ));
//
//            $this->_doSocialLogin($user, true);
//        } else {
//
//            // New profile.
//            if ($this->Auth->loggedIn()) {
//                // user is already logged-in , attach profile to logged in user.
//                // create social profile linked to current user
//                $incomingProfile['SocialProfile']['user_id'] = $this->Auth->user('id');
//                $this->SocialProfile->save($incomingProfile);
//
//                $this->Session->setFlash('Your ' . $incomingProfile['SocialProfile']['social_network_name'] . ' account is now linked to your account.');
//                $this->redirect($this->Auth->redirectUrl());
//            } else {
//                // no-one logged and no profile, must be a registration.
//                $user = $this->User->createFromSocialProfile($incomingProfile);
//                $incomingProfile['SocialProfile']['user_id'] = $user['User']['id'];
//                $this->SocialProfile->save($incomingProfile);
//
//                // log in with the newly created user
//                $this->_doSocialLogin($user);
//            }
//        }
    }

    private function _doSocialLogin($user, $returning = false) {

        if ($this->Auth->login($user['User'])) {
            if ($returning) {
                $this->Session->setFlash(__('Welcome back, ' . $this->Auth->user('username')));
            } else {
                $this->Session->setFlash(__('Welcome to our community, ' . $this->Auth->user('username')));
            }
            $this->redirect($this->Auth->loginRedirect);
        } else {
            $this->Session->setFlash(__('Unknown Error could not verify the user: ' . $this->Auth->user('username')));
        }
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
        $this->request->data['User']['user_type'] = 2;

        /*
         * check if already exists throw exception in such case
         */
        $chk_email_exits = $this->User->find('first', array('conditions' => array('User.email' => $email,'User.status !=' => 4)));
        if (empty($chk_email_exits)) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
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
        $this->request->data['User']['user_type'] = 1;
        $save = array('first_name'=>$first,'email'=>$email,'company'=>$comp,'status'=>1,'user_type'=>1);
		//sdebug($this->request->data['User']);die;
		/*
         * check if already exists throw exception in such case
         */
        $chk_email_exits = $this->User->find('first', array('conditions' => array('User.email' => $email,'User.status !='=>4)));
        if (empty($chk_email_exits)) {
            $this->User->create();
            if ($this->User->save($save,FALSE)) {
                $newUserId = $this->User->id;

                $user_arr = $this->User->findById($newUserId);

//                $this->Session->write('User', $user_arr);
                $res['status'] = 1;
                $res['message'] = 'Thank you for contacting us.We will get back to you shortly';
//                $res['exists'] = $chk_email_exits;
            } else {
                $res['status'] = 0;
                $res['message'] = 'Information cannot be saved at the moment.Please try again.';
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
//        debug($user_arr);
//        print_r($user_arr);

        if (!empty($user_arr)) {

            if ($user_arr['User']['status'] == 4 || $user_arr['User']['status'] == 0) {
                $res['status'] = 0;
                $res['message'] = 'This account is either deleted or suspended.Please contact Digimetrik';
            } else {
                $this->Session->write('User', $user_arr);
                $res['status'] = 1;
                $res['message'] = 'Login success';
            }



//            $this->Session->setFlash('Login success');
        } else {
            $res['status'] = 0;
            $res['message'] = 'Sorry ! We are not able to recognize that combination';
//            $this->Session->setFlash('Sorry ! We are not able to recognize that combination');
        }


        echo json_encode($res);
    }

    public function ajax_signin_candidate() {


        $this->autoRender = false;

        if ($this->Session->check('Candidate'))
        $this->Session->delete('Candidate');

        $email = $this->request->data['email'];
        $confirmation_code = $this->request->data['confirmation_code'];
        $phone_no = $this->request->data['phone_no'];

        $user_arr = $this->JobCandidate->find('first', array('conditions' => array('JobCandidate.email' => $email, 'JobCandidate.confirmation_code' => $confirmation_code)));
//        debug($user_arr);
//        print_r($user_arr);
//        die;
        if (!empty($user_arr)) {

            if ($user_arr['JobCandidate']['logins'] > 10) {
                $res['status'] = 0;
                $res['message'] = 'You have exceeded limit to appear for this job.Code was valid for 10 different tries.Better luck next time.';
            } else {
//                $this->Session->write('User', $user_arr);

                /*
                 * update no of this user if logins =0 and also update logins 
                 */
                if ($user_arr['JobCandidate']['logins'] == 0) {
                    $data = array('id' => $user_arr['JobCandidate']['id'], 'phone_no' => $phone_no, 'logins' => $user_arr['JobCandidate']['logins'] + 1);
                } else {
                    $data = array('id' => $user_arr['JobCandidate']['id'], 'logins' => $user_arr['JobCandidate']['logins'] + 1);
                }

                if ($this->JobCandidate->save($data)) {
                    $updated_user_arr = $this->JobCandidate->find('first', array('conditions' => array('JobCandidate.email' => $email, 'JobCandidate.confirmation_code' => $confirmation_code)));
                    $this->Session->write('Candidate', $updated_user_arr);
                    $res['status'] = 1;
                    $res['message'] = 'Login success';
                } else {
                    $res['status'] = 0;
                    $res['message'] = 'Some error occured.Please try after some time.';
                }
            }



//            $this->Session->setFlash('Login success');
        } else {
            // special secret for event candite test - biplob
            $site_settings = $this->_getSettings();
            if (!empty($site_settings['confirmation_code']) && !empty($site_settings['business_user_name']) && 
                ($confirmation_code == $site_settings['confirmation_code'])) {
                $job = $this->User->find('first', array(
                    'joins' => array( 
                        array( 
                            'table' => 'jobs', 
                            'alias' => 'Job', 
                            'type' => 'inner',  
                            'conditions'=> array(
                                'Job.user_id = User.id'
                            ) 
                        )
                    ),
                    'conditions' => array(
                        'User.company' => $site_settings['business_user_name']
                        ),
                    'fields' => array('Job.id')
                    )
                );
                
                if (!empty($job)) {
                    $data = array('job_id' => $job['Job']['id'], 'email' => $email, 'confirmation_code' => $confirmation_code, 'phone_no' => $phone_no, 'logins' => 1);
                    if ($this->JobCandidate->save($data)) {
                        $updated_user_arr = $this->JobCandidate->find('first', array('conditions' => array('JobCandidate.email' => $email, 'JobCandidate.confirmation_code' => $confirmation_code)));
                        $this->Session->write('Candidate', $updated_user_arr);
                        $res['status'] = 1;
                        $res['message'] = 'Login success';
                    } else {
                        $res['status'] = 0;
                        $res['message'] = 'Some error occured.Please try after some time.';
                    }
                } else {
                    $res['status'] = 0;
                    $res['message'] = 'Some error occured.Please try after some time.';
                }
            } else {
                $res['status'] = 0;
                $res['message'] = 'Sorry ! We are not able to recognize that combination';
            }
//            $this->Session->setFlash('Sorry ! We are not able to recognize that combination');
        }


        echo json_encode($res);
    }

    public function loginwith($provider) {
//        session_start();
        $this->autoRender = false;
        require_once( WWW_ROOT . 'hybridauth/Hybrid/Auth.php' );

        $hybridauth_config = array(
            "base_url" => 'http://' . $_SERVER['HTTP_HOST'] . $this->base . "/hybridauth/", // set hybridauth path
            "providers" => array(
                "Facebook" => array(
                    "enabled" => true,
                    "keys" => array("id" => "your_fb_api_key", "secret" => "fb_api_secret"),
                    "scope" => 'email',
                ),
                "Twitter" => array(
                    "enabled" => true,
                    "keys" => array("key" => "GuBKWrHv9T0z8G9ZUGiN7Hbij", "secret" => "CzBcOlf2DcJlcvIkSCsoaMoob0KXKZIvaIvRjNvG37ieZ98Qud")
                ),
                "Google" => array(
                    "enabled" => true,
                    "keys" => array("id" => "844622847743-la503u7s1avusc1f0uq114etdaiv0k87.apps.googleusercontent.com", "secret" => "4CzK8z0q42wYuqcmZBPXGE9x"),
//                    "scope" => "https://www.googleapis.com/auth/userinfo.profile" . // optional
//                    "https://www.googleapis.com/auth/userinfo.email", // optional
                    "access_type" => "offline", // optional
                    "approval_prompt" => "auto", // optional
//                    "hd" => "google.com" // optional
                )
// for another provider refer to hybridauth documentation
            )
        );

        try {
            // create an instance for Hybridauth with the configuration file path as parameter
            $hybridauth = new Hybrid_Auth($hybridauth_config);

            // try to authenticate the selected $provider
            $adapter = $hybridauth->authenticate($provider);

            // grab the user profile
            $user_profile = $adapter->getUserProfile();
			
            //debug($user_profile);die; //uncomment this to print the object
			//exit();
            //$this->set( 'user_profile',  $user_profile );
            //login user using auth component
            //if (!empty($user_profile)) {
//                $user_arr = $this->User->find('first', array('conditions' => array('User.email' => $email, 'User.password' => md5($password))));
//                if (!empty($user_arr)) {
//                    debug(array($user_profile));
//                    $this->Session->write('User', $user_profile);

				$result = $this->User->find('first', array('conditions' => array('User.twitter_id' => $user_profile->identifier)));
                if (empty($result)) {
					//$this->Session->write('User', $user_profile);
					$this->User->query("INSERT INTO users (twitter_id,first_name,status,user_type) VALUES ('$user_profile->identifier','$user_profile->firstName','1','1')");
					return $this->redirect('/?gm=exists');
				}
				else if($result["User"]["user_type"]==2){
					 //login the user
					 $this->Session->write('User', $result);
					 //debug($this->Session->read('User'));die;
					 $this->redirect('http://digimetrik.com/jobs');
				} 
				else if($result["User"]["user_type"]==1){
					 return $this->redirect('/?gm=already');
				}
				else{
					return $this->redirect('/?gm=notexists');
				}
				
//                    $res['status'] = 1;
//                    $res['message'] = 'Login success';
//            $this->Session->setFlash('Login success');
//                } else {
//                    $res['status'] = 0;
//                    $res['message'] = 'Sorry ! We are not able to recognize that combination';
////            $this->Session->setFlash('Sorry ! We are not able to recognize that combination');
//                }
           


//            if (!empty($user_profile)) {
//                $user = $this->_findOrCreateUser($user_profile, $provider); // optional function if you combine with Auth component
//                unset($user['password']);
//                $this->request->data['User'] = $user;
//                if ($this->Auth->login($this->request->data['User'])) {
//                    $this->redirect($this->Auth->redirect());
//                    $this->Session->setFlash('You are successfully logged in');
//                } else {
//                    $this->Session->setFlash('Failed to login');
//                }
//            }
        } catch (Exception $e) {
            // Display the recived error
//            switch ($e->getCode()) {
//                case 0 : $error = "Unspecified error.";
//                    break;
//                case 1 : $error = "Hybriauth configuration error.";
//                    break;
//                case 2 : $error = "Provider not properly configured.";
//                    break;
//                case 3 : $error = "Unknown or disabled provider.";
//                    break;
//                case 4 : $error = "Missing provider application credentials.";
//                    break;
//                case 5 : $error = "Authentification failed. The user has canceled the authentication or the provider refused the connection.";
//                    break;
//                case 6 : $error = "User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.";
//                    $adapter->logout();
//                    break;
//                case 7 : $error = "User not connected to the provider.";
//                    $adapter->logout();
//                    break;
//            }
            debug($e->getCode());
            debug($e->getMessage());
            // well, basically you should not display this to the end user, just give him a hint and move on..
            $error .= "Original error message: " . $e->getMessage();
            $error .= "Trace: " . $e->getTraceAsString();
            $this->set('error', $error);
        }
    }

    public function logout() {
        $this->Session->destroy();
        $this->redirect('http://digimetrik.com');
    }

// this is optional function to create user if not already in database. you can do anything with your hybridauth object
    private function _findOrCreateUser($user_profile = array(), $provider = null) {


        debug($user_profile);
        if (!empty($user_profile)) {
            $user = $this->User->find('first', array('conditions' => array(
                    'OR' => array('User.username' => $user_profile->identifier, 'User.email' => $user_profile->email))));
            if (!$user) {
                $this->User->create();
                $this->User->set(array(
                    'group_id' => 2,
                    'first_name' => $user_profile->firstName,
                    'last_name' => $user_profile->lastName,
                    'email' => $user_profile->email,
                    'username' => $user_profile->identifier,
                    'password' => AuthComponent::password($user_profile->identifier), //in case you need to save password to database
                    'country' => $user_profile->country,
                    'city' => $user_profile->city,
                    'address' => $user_profile->address,
                        //add another fields you want
                ));
                if ($this->User->save()) {
                    $this->User->recursive = -1;
                    $user = $this->User->read(null, $this->User->getLastInsertId());
                    return $user['User'];
                }
            } else {
                return $user['User'];
            }
        }
    }

    public function admin_manage_user() {


//        debug($this->request->data);
        //die;
        $this->layout = "admin_layout";
        // $User = $this->User->find('all');
        // we prepare our query, the cakephp way!

        if ($this->request->is('post')) {
            $search_key = $this->request->data['search'];
            $this->paginate = array(
                'limit' => 10,
                'order' => array('id' => 'desc'),
                'conditions' => array('status !=' => '4','user_type' => 2,
                    "OR" => array(
                        "User.first_name LIKE" => "%$search_key%",
                        "User.last_name LIKE" => "%$search_key%"
                    ))
            );
        } else {
            $this->paginate = array(
                'limit' => 10,
                'order' => array('id' => 'desc'),
                'conditions' => array('status !=' => '4','user_type' => 2),
            );
        }



        // we are using the 'User' model
        $User = $this->paginate('User');

        if (!$User) {
//            throw new NotFoundException(__('No user found'));
        }
        $this->set('title_for_layout', 'Manage user');
        $this->set('resultset', $User);
    }
	
	public function admin_manage_euser() {
        $this->layout = "admin_layout";
        if ($this->request->is('post')) {
            $search_key = $this->request->data['search'];
            $this->paginate = array(
                'limit' => 10,
                'order' => array('id' => 'desc'),
                'conditions' => array('user_type'=>1,'status !=' => '4',
                    "OR" => array(
                        "User.first_name LIKE" => "%$search_key%",
                        "User.last_name LIKE" => "%$search_key%"
                    ))
            );
        } else {
            $this->paginate = array(
                'limit' => 10,
                'order' => array('id' => 'desc'),
                'conditions' => array('user_type'=>1,'status !=' => '4'),
            );
        }
        $User = $this->paginate('User');
        if (!$User) {}
        $this->set('title_for_layout', 'Manage early signup user');
        $this->set('resultset', $User);
    }
	
	
    public function test_email() {

//        $Email = new CakeEmail('gmail');

        $Email = new CakeEmail();
        $Email->from(array('noreply.digimetrik@gmail.com' => 'Digimetrik'));
        $Email->to('prateiik@gmail.com');
        $Email->subject('Confirmation Code');
        $Email->send("Congratulations! Your account is created at Digimetrik.Please use this password $new_pass_plain to login.");
    }

    public function admin_add_user() {
        $this->layout = "admin_layout";
        $this->set('country', $this->getCountrys());
        $this->set('form_data', array('controller' => 'users', 'action' => 'add_user', 'id' => '', 'display_text' => 'Add'));

        if ($this->request->is('post')) {
            $this->set('title_for_layout', 'Add user');
            $this->User->set($this->request->data);
            if ($this->User->validates()) {
                $this->request->data["User"]["status"] = 1;
                $this->request->data["User"]["user_type"] = 2;
                $new_pass_plain = $this->request->data["User"]["password"];
                $this->request->data["User"]["password"] = md5($new_pass_plain);
                $this->User->create();
                if ($this->User->save($this->request->data)) {
                    /*
                     * send email to new user here with new password
                     */

                    $Email = new CakeEmail();
                    $Email->from(array('noreply.digimetrik@gmail.com' => 'Digimetrik'));
                    $Email->to('prateiik@gmail.com');
                    $Email->subject('Confirmation Code');
                    $Email->send("Congratulations! Your account is created at Digimetrik.Login with your email and password $new_pass_plain to access your account.");


                    /*
                     * send email to new user here
                     */

                    $this->Session->setFlash(__('New user created'));
                    return $this->redirect(array('action' => 'add_user'));
                } else {
                    $this->Session->setFlash(__('Could not create user'));
                }
            } else {
                $errors = $this->User->validationErrors;
                $this->set('errors', $errors);
                $this->request->data["User"]["do"] = "add";
                $this->set('resultset', $this->request->data["User"]);
                //$this->Session->setFlash(__('Error'));
            }
        }
    }

    public function admin_edit_user($id = NULL) {
        $this->layout = "admin_layout";
        $this->set('country', $this->getCountrys());
        $this->set('form_data', array('controller' => 'users', 'action' => 'edit_user', 'id' => $id, 'display_text' => 'Edit'));

        $User = $this->User->findById($id);
        if (!$User) {
//            throw new NotFoundException(__('User not found'));
        }
        if ($this->request->is('post')) {

            /*
             * match post pwd and md5 pwd saved in db
             * if same then no change in pwd 
             * if not same then update and send email to user
             */
            $new_pwd = $this->request->data["User"]["password"];
            $old_pwd = $User['User']['password'];

            if ($old_pwd == $new_pwd) {
                //echo "same";
                $this->request->data["User"]["password"] = $new_pwd;
                $send_email = 0;
            } else { //new password
                //not same ::md5 new pwd and send email
                if (!empty($new_pwd)) {
                    $this->request->data["User"]["password"] = md5($new_pwd);
                    $send_email = 1;
                }
            }

//            debug($User);
//            die;
//            

            $this->User->id = $id;
            if ($this->User->save($this->request->data)) {
                /*
                 * send email to new user here with new password
                 */
                if ($send_email == 1) {
                    $Email = new CakeEmail();
                    $Email->from(array('noreply.digimetrik@gmail.com' => 'Digimetrik'));
                    $Email->to('prateiik@gmail.com');
                    $Email->subject('Confirmation Code');
                    $Email->send("Your password for Digimetrik account has been changed.Please login with your new password - $new_pwd to access your account.");
                }



                /*
                 * send email to new user here
                 */
                $this->Session->setFlash(__('User updated'));
                return $this->redirect(array('action' => 'edit_user/' . $id));
            }
            $this->set('resultset', $this->request->data["User"]);
            // $this->redirect(array('action' => 'add_user/' . $id));
        } else {
            $this->set('resultset', $User["User"]);
        }
        $this->render('admin_add_user');
    }

    public function admin_edit_euser($id = NULL) {
        $this->layout = "admin_layout";
        $this->set('country', $this->getCountrys());
        $this->set('form_data', array('controller' => 'users', 'action' => 'edit_euser', 'id' => $id, 'display_text' => 'Edit'));

        $User = $this->User->findById($id);
        if (!$User) {}
        if ($this->request->is('post')) {
            /*
             * match post pwd and md5 pwd saved in db
             * if same then no change in pwd 
             * if not same then update and send email to user
             */
            $new_pwd = $this->request->data["User"]["password"];
            $old_pwd = $User['User']['password'];

            if ($old_pwd == $new_pwd) {
                //echo "same";
                $this->request->data["User"]["password"] = $new_pwd;
                $send_email = 0;
            } else { //new password
                //not same ::md5 new pwd and send email
                if (!empty($new_pwd)) {
                    $this->request->data["User"]["password"] = md5($new_pwd);
                    $send_email = 1;
                }
            }
            $this->User->id = $id;
            if ($this->User->save($this->request->data)) {
                /*
                 * send email to new user here with new password
                 */
                if ($send_email == 1) {
                    $Email = new CakeEmail();
                    $Email->from(array('noreply.digimetrik@gmail.com' => 'Digimetrik'));
                    $Email->to('prateiik@gmail.com');
                    $Email->subject('Confirmation Code');
                    $Email->send("Your password for Digimetrik account has been changed.Please login with your new password - $new_pwd to access your account.");
                }
                /*
                 * send email to new user here
                 */
                $this->Session->setFlash(__('User updated'));
                return $this->redirect(array('action' => 'edit_euser/' . $id));
            }
            $this->set('resultset', $this->request->data["User"]);
            // $this->redirect(array('action' => 'add_user/' . $id));
        } else {
            $this->set('resultset', $User["User"]);
        }
        $this->render('admin_add_euser');
    }
    public function admin_enable_disable_user($user_id, $status) {

        $this->User->id = $user_id;
        if ($this->User->saveField('status', $status)) {
            $this->Session->setFlash(__('User status has been changed'));
        } else {
            $this->Session->setFlash(__('Could not update user status'));
        }
        return $this->redirect(array('action' => 'manage_user/'));
    }
     
	 public function admin_enable_disable_euser($user_id, $status) {

        $this->User->id = $user_id;
        if ($this->User->saveField('status', $status)) {
            $this->Session->setFlash(__('User status has been changed'));
        } else {
            $this->Session->setFlash(__('Could not update user status'));
        }
        return $this->redirect(array('action' => 'manage_euser/'));
    }
	
     public function admin_delete_user($user_id) {
        $this->User->id = $user_id;

        if ($this->User->saveField('status', '4')) {
            $this->Session->setFlash(__('User deleted'));
        } else {
            $this->Session->setFlash(__('Could not delete user'));
        }
        return $this->redirect(array('action' => 'manage_user/'));
    }
	public function admin_delete_euser($user_id) {
        $this->User->id = $user_id;

        if ($this->User->saveField('status', '4')) {
            $this->Session->setFlash(__('User deleted'));
        } else {
            $this->Session->setFlash(__('Could not delete user'));
        }
        return $this->redirect(array('action' => 'manage_euser/'));
    }
    public function admin_view_user($userid) {
        $this->layout = "admin_layout";
        $User = $this->User->find('first', array('conditions' => array('id' => $userid)));

        $this->set('resultset', $User["User"]);
    }

	public function login(){
		
		$this->autoRender = false;
		
		
		
		########## Google Settings.. Client ID, Client Secret #############
		//include google api files
		session_start();
		
		$google_client_id = '516719797095-8doc2ulrfnfacv0ppkf72lgevqvf7881.apps.googleusercontent.com';
		$google_client_secret = 'aaHc09ZmvBgG_XmxAwpd8dA3';
		$google_redirect_url = 'http://digimetrik.com/users/login/';
		$google_developer_key = '';
		
		App::import('Vendor', 'src/Google_Client');
		App::import('Vendor', 'src/contrib/Google_Oauth2Service');
		
		$gClient = new Google_Client();
		//debug($gClient);
		$gClient->setApplicationName('Login to digimetrik');
		$gClient->setClientId($google_client_id);
		$gClient->setClientSecret($google_client_secret);
		$gClient->setRedirectUri($google_redirect_url);
		$gClient->setDeveloperKey($google_developer_key);
		
		$google_oauthV2 = new Google_Oauth2Service($gClient);
		
		//debug($google_oauthV2);
		//If user wish to log out, we just unset Session variable
		if (isset($_REQUEST['reset']))
		{
			$this->set('msg', 'Logout');
			//unset($_SESSION['token']);
			$this->Session->delete('token');
			$gClient->revokeToken();
			header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL));
		}
		
		//Redirect user to google authentication page for code, if code is empty.
		//Code is required to aquire Access Token from google
		//Once we have access token, assign token to session variable
		//and we can redirect user back to page and login.
		if (isset($_REQUEST['code']))
		{
			$gClient->authenticate($_REQUEST['code']);
			$this->Session->write('token', $gClient->getAccessToken());
			$this->redirect(filter_var($google_redirect_url, FILTER_SANITIZE_URL), null, false);
			header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL));
			return;
		}
		
		if ($this->Session->read('token'))
		{
			$gClient->setAccessToken($this->Session->read('token'));
		}
		
		if ($gClient->getAccessToken())
		{
			//Get user details if user is logged in
			$user = $google_oauthV2->userinfo->get();
			$user_id = $user['id'];
			$user_name = filter_var($user['name'], FILTER_SANITIZE_SPECIAL_CHARS);
			$email = filter_var($user['email'], FILTER_SANITIZE_EMAIL);
			$profile_url = filter_var($user['link'], FILTER_VALIDATE_URL);
			$profile_image_url = filter_var($user['picture'], FILTER_VALIDATE_URL);
			$personMarkup = "$email<div><img src='$profile_image_url?sz=50'></div>";
			$this->Session->write('token', $gClient->getAccessToken());
		}
		else
		{
			//get google login url
			$authUrl = $gClient->createAuthUrl();
		}
		//debug($user);
		/*if(isset($authUrl)) //user is not logged in, show login button
		{
			$this->set('authUrl', $authUrl);
		}
		else // user logged in
		{*/
            $result = array();
			$result = $this->User->find('first', array('conditions' => array('email' => $email)));
			//debug($result);die;
			if(empty($result))//means new users
			{
				/*$msg1 = 'Hi '.$user_name.', Thanks for Registering!';
				$msg1 .= '<br />';
				$msg1 .= '<img src="'.$profile_image_url.'" width="100" align="left" hspace="10" vspace="10" />';
				$msg1 .= '<br />';
				$msg1 .= '&nbsp;Name: '.$user_name.'<br />';
				$msg1 .= '&nbsp;Email: '.$email.'<br />';
				$msg1 .= '<br />';
				$this->set('msg', $msg1);*/
				$this->User->query("INSERT INTO users (google_id,first_name,email,status,user_type) VALUES ($user_id,'$user_name','$email','1','1')");
				return $this->redirect('/?gm=exists');
			}
			else if($result["User"]["user_type"]==2){
				 //login the user
				 $this->Session->write('User', $result);
				 $this->redirect('http://digimetrik.com/jobs');
			} 
			else if($result["User"]["user_type"]==1){
				 return $this->redirect('/?gm=already');
			}
			else
			{
				return $this->redirect('/?gm=notexists');
				/*$msg = 'Welcome back '.$user_name.'!<br />';
				$msg .= '<br />';
				$msg .= '<img src="'.$profile_image_url.'" width="100" align="left" hspace="10" vspace="10" />';
				$msg .= '<br />';
				$msg .= '&nbsp;Name: '.$user_name.'<br />';
				$msg .= '&nbsp;Email: '.$email.'<br />';
				$msg .= '<br />';
				$this->set('msg', $msg);*/

			}
		 //}
		}
	}