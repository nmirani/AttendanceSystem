<?php
App::uses('AppModel', 'Model');
/**
 * CoursesTeacher Model
 *
 * @property Course $Course
 * @property User $User
 */
class CoursesTeacher extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'course_teacher_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'course_id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Course' => array(
			'className' => 'Course',
			'foreignKey' => 'course_id',
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
