<?php

class AdminsController extends AppController {
    var $name = 'Admins';
    public $components = array('Email', 'Cookie', 'Session');
    public $uses = array('Admin','User');
    public $helpers = array('Form', 'Html', 'Js', 'Time', 'Session');
		
    public function beforeFilter() {
        parent::beforeFilter();
    }

   public function admin_login() {
        $this->set('title_for_layout', 'Admin login');
        $this->layout = "admin_login_layout";
		
        if (!empty($this->request->data)) {
            $admin_arr = $this->Admin->find('first', array('conditions' => array('username' => $this->request->data['Admin']['username'], 'password' => ($this->request->data['Admin']['password']))));
            if (!empty($admin_arr)) {
                $this->Session->write('Admin', $admin_arr['Admin']);
                $this->redirect('dashboard');
            } else {
                $this->Session->setFlash(__('Please Enter Username/Password', true));
            }
        }
    }

    public function admin_dashboard() {
        $this->is_admin_loggedin();
        $this->layout = "admin_layout";
    }

  /*  public function admin_hours_edit() {
        $hours_arr = $this->Content->find('first', array('conditions' => array('id' => 3)));
        $this->set('hours_array', $hours_arr);
        if (!empty($this->request->data)) {
            $hours_arr_array = $this->Content->save($this->request->data);
            if ($hours_arr_array) {
                $this->set('hours_array', $hours_arr_array);
                $this->Session->setFlash('hours has been updated');
            }
        }
        $this->layout = "admin_inner_layout";
    }*/

    function admin_logout() {
        $this->Session->delete('Admin');
        $this->redirect('/admin');
    }

    function admin_profile() {
        $this->is_admin_loggedin();
        $this->layout = "admin_inner_layout";
        $admin_id = $this->Session->read('Admin.id');
        $admin_arr = $this->Admin->find('first', array('conditions' => array('Admin.id' => $admin_id)));
        $this->set('admin', $admin_arr);
    }

    /*function admin_edit() {
        $this->is_admin_loggedin();
        $this->layout = "admin_inner_layout";
        if (!empty($this->request->data)) {
            if ($this->Admin->save($this->request->data)) {
                $this->Session->setFlash('Admin profile has been updated');
                $this->redirect('profile');
            }
        }
        if (empty($this->request->data)) {
            $admin_id = $this->Session->read('Admin.id');
            $this->request->data = $this->Admin->findById($admin_id);
        }
    }*/

    function admin_setting() {
        $this->is_admin_loggedin();
        $this->layout = "admin_inner_layout";
        if (!empty($this->request->data)) {
            $old_password = $this->request->data['old_password'];
            $old_md5_password = md5($old_password);
            $admin_arr = $this->Admin->find('first', array('conditions' => array('Admin.password' => $old_md5_password)));
            if (!empty($admin_arr)) {
                $new_password = $this->request->data['new_password'];
                $new_md5_password = md5($new_password);
                $admin['Admin']['id'] = $admin_arr['Admin']['id'];
                ;
                $admin['Admin']['password'] = $new_md5_password;
                if ($this->Admin->save($admin)) {
                    $message = "<p>Hello " . $admin_arr['Admin']['username'] . ",</p>
					<p>Your New Password : " . $new_password . "</p>
					<P><b>" . SITENAME . "</b></P>					
					<p>Thanks,</p>
					";
                    $to = $admin_arr['Admin']['email'];
                    App::uses('CakeEmail', 'Network/Email');
                    $email = new CakeEmail('gmail');
                    $email->emailFormat('html');
                    $email->from('testing.slinfy02@gmail.com');
                    $email->to($to);
                    $email->subject('Resset Password');
                    $email->send($message);
                    $this->Session->setFlash('Password has been successfully reset.');
                    $this->redirect('dashboard');
                }
            } else {
                $this->Session->setFlash('Your old password is not matched.');
                $this->redirect('setting');
            }
        }
    }

    function admin_forgot_password() {
        $this->layout = "admin_login_layout";
        if (!empty($this->request->data)) {
            $admin_arr = $this->Admin->find('first', array('conditions' => array('Admin.email' => $this->request->data['Admin']['email'])));
            if (!empty($admin_arr)) {
                $password = $this->random_generator(8);
                $admin['Admin']['id'] = $admin_arr['Admin']['id'];
                $admin['Admin']['password'] = md5($password);
                if ($this->Admin->save($admin)) {
                    $message = "<p>Hello " . $admin_arr['Admin']['username'] . ",</p>
					<p>Your New Password : " . $password . "</p>
					<P><b>" . SITENAME . "</b></P>					
					<p>Thanks,</p>
					";
                    $to = $admin_arr['Admin']['email'];
                    App::uses('CakeEmail', 'Network/Email');
                    $email = new CakeEmail('gmail');
                    $email->emailFormat('html');
                    $email->from('testing.slinfy02@gmail.com');
                    $email->to($to);
                    $email->subject('Forgot Password');
                    $email->send($message);
                    $this->Session->setFlash('Password has successfully forgot. Please check your mail');
                    $this->redirect('login');
                }
            } else {

                $this->Session->setFlash('Wrong Email id');
                $this->redirect('forgot_password');
            }
        }
    }

    /*     * ***************************Random number********************************************* */

    function random_generator($digits) {
        srand((double) microtime() * 10000000);
        //Array of alphabets
        $input = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
        $random_generator = ""; // Initialize the string to store random numbers
        for ($i = 1; $i < $digits + 1; $i++) { // Loop the number of times of required digits
            if (rand(1, 2) == 1) {// to decide the digit should be numeric or alphabet
                // Add one random alphabet
                $rand_index = array_rand($input);
                $random_generator .=$input[$rand_index]; // One char is added
            } else {
                // Add one numeric digit between 1 and 10
                $random_generator .=rand(1, 10); // one number is added
            } // end of if else
        } // end of for loop
        return $random_generator;
    }

// end of function
    /*     * *************************************************************************************** */
}
