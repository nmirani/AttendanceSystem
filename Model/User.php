<?php

App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');


class User extends AppModel {

public $primaryKey = 'id';
public $name = 'User';
public $displayField = 'first_name';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Attendance' => array(
			'className' => 'Attendance',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'CoursesTeacher' => array(
			'className' => 'CoursesTeacher',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'UserTag' => array(
			'className' => 'user_tags',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'UserCourse' => array(
			'className' => 'user_courses',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


   public $validate = array(
        'username' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required',
            ),
			'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Invalid username',
            ),

            'between' => array( 
                'rule' => array('between', 5, 15), 
                'required' => true, 
                'message' => 'Usernames must be between 5 to 15 characters'
            ),

             'That username has already been taken'=>array(
                'rule'=>'isUnique',
                'message'=>'That username has already been taken.'
            )  
        ),

        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            ),

            'min_length' => array(
                'rule' => array('minLength', '5'),  
                'message' => 'Password must have a mimimum of 5 characters'
            ),

            'Match passwords'=>array(
                'rule'=>'matchPasswords',
                'message'=>'Your passwords do not match'
            ),

        	
        ),
		
		'password_confirmation'=>array(
				'notEmpty'=>array(
					'rule'=>'notEmpty',
					'message'=>'Please confirm your password'
				)
          	),
			
    
        'email'=>array(
            'Valid email'=>array(
                'rule'=>array('email'),
                'message'=>'Please enter a valid email address'
            ),
            'between' => array( 
                'rule' => array('between', 6, 60), 
                'message' => 'Usernames must be between 6 to 60 characters'
            )
        ),

        'user_type' => array(
                'required' => array(
                    'rule' => array('inList',array('Admin','Student','Teacher')),
                    'message' => 'Please enter which kind of user you are.')
         )
    );


 	public function matchPasswords($data) {
	 	if(!isset($data['password']) && !isset($this->data['User']['password_confirmation']))
			return true;

        if ($data['password'] == $this->data['User']['password_confirmation']) {
            return true;
        }
        $this->invalidate('password_confirmation', 'Your passwords do not match');
        return false;
    }

     public function beforeSave($options = array()) {
        if (isset($this->data['User']['password'] )) {
            
            $this->data['User']['password'] = Security::hash($this->data['User']['password'], 'md5', false);
			
        }
        return true;
    }

   /* public function beforeSave($options = array()) {
        
 
    if (isset($this->data[$this->alias]['password'])) {
        $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
    }
    return true;
} */


}
?>
