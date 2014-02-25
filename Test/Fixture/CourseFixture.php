<?php
/**
 * CourseFixture
 *
 */
class CourseFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'course';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'course_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'primary', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'course_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'course_id', 'unique' => 1),
			'course_id' => array('column' => 'course_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'course_id' => 'Lorem ipsum dolor ',
			'course_name' => 'Lorem ipsum dolor sit amet'
		),
	);

}
