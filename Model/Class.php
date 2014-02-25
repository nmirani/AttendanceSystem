<?php
App::uses('AppModel', 'Model');
/**
 * Class Model
 *
 * @property Course $Course
 */
class Class extends AppModel {

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
}
