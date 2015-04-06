<?php

class Category extends AppModel {

    public $validate = array(
       'area_id' => array(
	   		'on'=> 'create',
            'rule' => 'notEmpty', 
            'required' => true,
            'allowEmpty' => false,
            'message' => 'Please select area'
        ),
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
		  'required' => true,
          'allowEmpty' => false,
		  'rule' => array(
			 'extension', array('jpeg', 'jpg','png')
		   ),
		  'message' => 'You must supply a image.'
	   )
    );
}


?>