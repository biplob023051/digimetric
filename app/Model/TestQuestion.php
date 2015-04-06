<?php

class TestQuestion extends AppModel {

    public $validate = array(
        'question' => array(
            'rule' => 'notEmpty', // or: array('ruleName', 'param1', 'param2' ...)
            'required' => true,
            'allowEmpty' => false,
            'message' => 'Please enter question'
        ),
        
    );
    
    public function atleast_one_selected($data) {
        if(empty($data['Test']['duration_hour']) && empty($data['Test']['duration_mins']) && empty($data['Test']['duration_secs'])){
            return FALSE;
        }
        return TRUE;
        
    }

}

?>