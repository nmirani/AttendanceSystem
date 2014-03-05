<?php
App::uses('AppModel', 'Model');
/**
 * TeacherClass Model
 *
 * @property Course $Course
 */
class TeacherClass extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'StudentClass' => array(
			'className' => 'StudentClass',
			'foreignKey' => 'class_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
