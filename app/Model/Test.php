<?php

class Test extends AppModel {

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
        'logo' => array(
            'image' => array(
                'rule' => array(
                    'extension',
                    array('gif', 'jpeg', 'png', 'jpg','GIF', 'JPEG', 'PNG', 'JPG')
                ),
                'message' => 'Supported formats are jpg,jpeg,gif,png',
                'on' => 'create',
            )
        ),
        'category_id' => array(
            'rule' => 'notEmpty', // or: array('ruleName', 'param1', 'param2' ...)
            'required' => true,
            'allowEmpty' => false,
            'message' => 'Please select some topic'
        ),
        'no_of_questions' => array(
        'rule' => 'numeric',
        'message' => 'Please supply the number of questions.'
    ),
        'versions' => array(
        'rule' => 'numeric',
        'message' => 'Please supply the number of versions.'
    )
    );
    
    public function atleast_one_selected($data) {
        if(empty($data['Test']['duration_hour']) && empty($data['Test']['duration_mins']) && empty($data['Test']['duration_secs'])){
            return FALSE;
        }
        return TRUE;
        
    }

}

?>