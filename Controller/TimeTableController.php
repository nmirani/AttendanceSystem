<?php


class TimeTableController extends AppController {


    public $name = 'TimeTable';
	
	public $uses = array('TeacherClass', 'StudentClass', 'UserCourse');

	public function beforeFilter(){

		parent::beforeFilter();

	}





    public function teacher_index() {
       
	   $time_tables = $this->TeacherClass->find('all', array('conditions' => array('TeacherClass.user_id' => $this->Session->read('Auth.User.id') ),
	   														'contain' => array('StudentClass.Course', ) ) );
	   
	   
	   $this->set('time_tables', $time_tables);
       
    }
	
	
	
	public function student_index() {
       
	   
	   $courses = $this->UserCourse->find('all', array('conditions' => array('UserCourse.user_id' => $this->Session->read('Auth.User.id') ),
	   														'contain' => false ) );
	   
	   $courses_ids = Set::extract('/UserCourse/course_id', $courses);
	   $time_tables = $this->StudentClass->find('all', array('conditions' => array('StudentClass.course_id' => $courses_ids ),
	   														'contain' => array('Course', 'TeacherClass.User') ) );
	   
	   
	   $this->set('time_tables', $time_tables);
       
    }
	
	
	public function admin_index() {
       
	   $time_tables = $this->StudentClass->find('all', array('conditions' => array(),
	   														'contain' => array('Course', 'TeacherClass.User') ) );
	   
	   
	   $this->set('time_tables', $time_tables);
       
    }
	
}
