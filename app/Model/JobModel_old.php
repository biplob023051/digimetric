<?php

/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class JobModel extends Model {

    //validation for adding a job

    public $validate = array(
        'title' => array(
            // or: array('ruleName', 'param1', 'param2' ...)
            'rule' => array('minLength', '5'),
            'required' => true,
            'allowEmpty' => false,
            // or: 'update'
            'on' => 'create',
            'message' => 'Title required'
        ),
        'job_category_id' => array(
            'required' => true,
            'allowEmpty' => false,
            'on' => 'create',
            'message' => 'Category required'
        ),
        'no_of_applicants' => array(
            'rule' => 'numeric',
            'on' => 'create',
            'message' => 'Please supply the number of applicants.'
        )
    );

}
