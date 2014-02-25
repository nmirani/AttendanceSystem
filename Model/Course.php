<?php
App::uses('AppModel', 'Model');
/**
 * Course Model
 *
 * @property Attendance $Attendance
 * @property Class $Class
 * @property CoursesTeacher $CoursesTeacher
 */
class Course extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'course';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'course_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'course_id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Attendance' => array(
			'className' => 'Attendance',
			'foreignKey' => 'course_id',
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
		'StudentClass' => array(
			'className' => 'StudentClass',
			'foreignKey' => 'course_id',
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
			'foreignKey' => 'course_id',
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

}
