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
App::uses('AppModel', 'Model');

class Job extends AppModel {

    public $name = 'Job';
    public $validate = array(
        'title' => array(
            'rule' => array('minLength', 5),
            'message' => 'Title must be at least 5 characters long',
            'on' => 'create',
        ),
        'description' => array(
            'rule' => 'notEmpty',
            'message' => 'Please enter the job description',
            'on' => 'create',
        ),
        'job_category_id' => array(
            'rule' => 'notEmpty',
            'message' => 'Please select some category',
            'on' => 'create',
        ),
        'no_of_applicants' => array(
            'rule' => 'numeric',
            'message' => 'Please supply the no of applicants',
            'on' => 'create',
        ),
        'valid_from' => array(
            'date1' => array(
                'rule' => 'date',
                'required' => true,
                'message' => 'Duration from must be a date only',
                'allowEmpty' => false,
                'on' => 'create',
            ),
        ),
        'valid_to' => array(
            'date2' => array(
                'rule' => 'date',
                'required' => true,
                'message' => 'Duration to must be a date only',
                'allowEmpty' => false,
                'on' => 'create',
            ),
        )
    );

}

