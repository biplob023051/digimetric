<?php

class Area extends AppModel {

    public $validate = array(
      /* 'title' => array(
	   		'on'=> 'create',
            'rule' => 'notEmpty', 
            'required' => true,
            'allowEmpty' => false,
            'message' => 'Please enter title'
        )*/
		'title' => array(
            'title' => array(
                'rule' => 'notEmpty',
				'required' => true,
				'allowEmpty' => false,
				'message' => 'Please enter title'
            ),
            'uniq' => array(
                'rule' => 'isUnique',
                'message' => 'This title is already exists'
            )
        ),
		'image' => array(
		  'rule' => array(
			 'extension', array('jpeg', 'jpg','png')
		   ),
		  'message' => 'You must supply a image.'
	   )
    );
}


?>