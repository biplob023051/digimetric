<?php

class SubCategory extends AppModel {

    public $validate = array(
       'category_id' => array(
	   		'on'=> 'create',
            'rule' => 'notEmpty', 
            'required' => true,
            'allowEmpty' => false,
            'message' => 'Please select field'
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
        )/*,
		'image' => array(
		  'required' => true,
          'allowEmpty' => false,
		  'rule' => array(
			 'extension', array('jpeg', 'jpg','png')
		   ),
		  'message' => 'You must supply a image.'
	   )*/
    );
}


?>