<?php
App::uses('AppModel', 'Model');
/**
 * StudentClass Model
 *
 * @property Course $Course
 */
class StudentClass extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'class_id';


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
		)
	);
	
	
	public $hasMany = array(
		'TeacherClass' => array(
			'className' => 'TeacherClass',
			'foreignKey' => 'class_id',
			'dependent' => true,
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
