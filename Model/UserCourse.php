<?php
App::uses('AppModel', 'Model');
/**
 * UserCourse Model
 *
 * @property User $User
 * @property Course $Course
 */
class UserCourse extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'user_courses_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'user_courses_id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Course' => array(
			'className' => 'Course',
			'foreignKey' => 'course_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
