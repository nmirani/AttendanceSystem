<?php
/**
 * CoursesTeacherFixture
 *
 */
class CoursesTeacherFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'course_teacher_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'course_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 11, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'comment' => 'Teacher\'s ID'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'course_teacher_id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'course_teacher_id' => 1,
			'course_id' => 'Lorem ips',
			'user_id' => 1
		),
	);

}
