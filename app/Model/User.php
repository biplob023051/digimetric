<?php

class User extends AppModel {

    public $validate = array(
        'first_name' => array(
            'rule' => 'notEmpty', // or: array('ruleName', 'param1', 'param2' ...)
            'required' => true,
            'allowEmpty' => false,
            'message' => 'Please enter first name'
        ),
        'last_name' => array(
            'rule' => 'notEmpty', // or: array('ruleName', 'param1', 'param2' ...)
            'required' => true,
            'allowEmpty' => false,
            'message' => 'Please enter last name'
        ),
        'country' => array(
            'rule' => 'notEmpty', // or: array('ruleName', 'param1', 'param2' ...)
            'required' => true,
            'allowEmpty' => false,
            'message' => 'Please select country'
        ),
        'email' => array(
            'email' => array(
                'rule' => 'email',
                'message' => 'Email is not valid'
            ),
//            'uniq' => array(
//                'rule' => 'isUnique',
//                'message' => 'This Mail Address is already used'
//            )
        ),
        'company' => array(
            'rule' => 'notEmpty', // or: array('ruleName', 'param1', 'param2' ...)
            'required' => true,
            'allowEmpty' => false,
            'message' => 'Please enter company'
        ),
        'password' => array(
            'rule' => 'notEmpty', // or: array('ruleName', 'param1', 'param2' ...)
            'required' => true,
            'allowEmpty' => false,
            'message' => 'Please enter password'
        )
    );

}

?>