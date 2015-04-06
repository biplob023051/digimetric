<?php

class Blog extends AppModel {

    public $validate = array(
        'title' => array(
            'rule' => 'notEmpty', // or: array('ruleName', 'param1', 'param2' ...)
            'required' => true,
            'allowEmpty' => false,
            'message' => 'Please enter title'
        ),
        'description' => array(
            'rule' => 'notEmpty', // or: array('ruleName', 'param1', 'param2' ...)
            'required' => true,
            'allowEmpty' => false,
            'message' => 'Please enter description'
        ),
        
    );

}

?>