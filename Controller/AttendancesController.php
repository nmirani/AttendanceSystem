<?php
App::uses('AppController', 'Controller');
/**
 * Attendances Controller
 *
 */
class AttendancesController extends AppController {


	public $uses = array('Attendance', 'User', 'StudentClass', 'TeacherClass', 'UserTag');
	
	public $components = array('Paginator');

	public function beforeFilter(){
		
		$this->Auth->allow('add');
		parent::beforeFilter();
		
	}
	
	
	function add(){
		
		$this->layout = null;
		$data = array('timestamp' => date('d.M Y H:i l') );
		
		$tag_id = $this->params['url']['tag_id'];
		//$tag = $this->params['url']['tag'];
		$tag_type = $this->params['url']['tag_type'];
		$room = $this->params['url']['room'];
		
		$UserTag = $this->UserTag->find('first', array('conditions' => array('UserTag.tag_id' => $tag_id), 'contain' => array('User') ) );
		if(!$UserTag){
			$data['status'] = false;
			$data['message'] = "student not found";
			$this->set('data', $data);
			return;
		}
		$user_id = $UserTag['User']['id'];
		
		/*$user = $this->User->find('first', array('conditions' => array('User.username' => $username), 'contain' => false ) );
		if(!$user){
			$data['status'] = false;
			$data['message'] = 'student not found';
			$this->set('data', $data);
			return;
		}
		
		$user_tag = $this->UserTag->find('first', array('conditions' => array('UserTag.tag' => $tag), 'contain' => false ) );
		if(!$user_tag){
			$data['status'] = false;
			$data['message'] = "Tag not in use";
			$this->set('data', $data);
			return;
		}*/
		
		$user_tag = $this->UserTag->find('first', array('conditions' => array('UserTag.tag_type' => $tag_type, 'UserTag.user_id' => $user_id), 'contain' => false ) );
		if(!$user_tag){
			$data['status'] = false;
			$data['message'] = 'Tag not in use';
			$this->set('data', $data);
			return;
		}
		
		//courses of the student
		$courses = $this->User->UserCourse->find('all', array('conditions' => array('UserCourse.user_id' => $user_id), 'contain' => false ) );
		$course_ids = Set::extract('/UserCourse/course_id', $courses);
		
		$student_class = $this->StudentClass->find('first', array('conditions' => 
																		array('StudentClass.room' => $room, 
																			  'StudentClass.course_id' => $course_ids,
																			  'StudentClass.day_of_week' => date('l'),
																			  'StudentClass.start_time <=' => date('H:i'),
																			  'StudentClass.end_time >=' => date('H:i'),
																			  )
																	, 'contain' => false ) );
		if(!$student_class){
			$data['status'] = false;
			$data['message'] = 'wrong room';
			$this->set('data', $data);
			return;
		}
		
			$attendance_data['Attendance']['user_id'] = $user_id;
			$attendance_data['Attendance']['course_id'] = $student_class['StudentClass']['course_id'];
			$attendance_data['Attendance']['class_id'] = $student_class['StudentClass']['class_id'];
			$attendance_data['Attendance']['status'] = 1;
			$attendance_data['Attendance']['hardware_used'] = $tag_type;
			$attendance_data['Attendance']['date'] = date('Y-m-d');
			$attendance_data['Attendance']['time'] = date('H:i');
			
			if($this->Attendance->save($attendance_data)){
				$data['status'] = true;
				$data['message'] = 'Attendance saved successfully';
			}else{
				$data['status'] = false;
				$data['message'] = $this->Attendance->validationErrors;
			}
			
		$this->set('data', $data);
		
	}




	

	public function student_for_course($course_id) {
		
		$this->set('course_id', $course_id);
		
		
		$Course = $this->Attendance->Course->find('first', 
						array('conditions' => array('Course.id' => $course_id), 
							 'contain' => array('StudentClass') )
						);
		
		$Attendances = $this->Attendance->find('all', 
						array('conditions' => array('Attendance.course_id' => $course_id, 'Attendance.user_id' => $this->Session->read('Auth.User.id') ), 
							 'contain' => false )
						);
		

		$this->set('Course', $Course);
		$this->set('Attendances', $Attendances);
	}
	
	


	public function teacher_for_course($course_id) {
		
		$this->set('course_id', $course_id);
		$student_id = $this->params['named']['student_id'];
		
		
		$Student = $this->Attendance->User->find('first', 
						array('conditions' => array('User.id' => $student_id), 
							 'contain' => false )
						);
		
		
		$Course = $this->Attendance->Course->find('first', 
						array('conditions' => array('Course.id' => $course_id), 
							 'contain' => array('StudentClass') )
						);
						
		$Classes = $this->TeacherClass->find('all', 
						array('conditions' => array('TeacherClass.user_id' => $this->Session->read('Auth.User.id') ), 
							 'contain' => array('StudentClass') )
						);
		
		$class_ids = Set::extract('/TeacherClass/class_id', $Classes);
		
		$Attendances = $this->Attendance->find('all', 
						array('conditions' => array('Attendance.class_id' => $class_ids , 'Attendance.user_id' => $student_id), 
							 'contain' => false )
						);

		$this->set('Student', $Student);
		$this->set('Course', $Course);
		$this->set('Class', $Classes);
		$this->set('Attendances', $Attendances);
	}
	
	
	
	
	public function teacher_edit($id = null) {
		if (!$this->Attendance->exists($id)) {
			throw new NotFoundException(__('Invalid course'));
		}
		
		$options = array('conditions' => array('Attendance.id'=> $id));
		$Attendance = $this->Attendance->find('first', $options);
		
		
		
		if (!empty($this->request->data)) {
			
			if($this->request->data['Attendance']['status'] == 0){
				$this->Attendance->id = $id;
				$this->Attendance->delete();
				return $this->redirect(array('action' => 'for_course', $Attendance['Attendance']['course_id'], 'student_id' => $Attendance['Attendance']['user_id']));
			}
			
			$this->Attendance->id = $id;
			if ($this->Attendance->save($this->request->data)) {
				$this->flash(__('The attendance has been saved.'), array('action' => 'index'));
				$this->redirect(array('action' => 'for_course', $Attendance['Attendance']['course_id'], 'student_id' => $Attendance['Attendance']['user_id']));
			}else {
				$this->Session->setFlash(__('The attendance could not be saved. Please, try again.', true));
			}
			
			
		} else {
			$this->request->data = $Attendance;
		}
//		debug($Attendance);
		$this->set(compact('Attendance'));
	}
	
	
	
	public function teacher_add() {

		
		if (!empty($this->request->data)) {
				$Attendance = $this->request->data;
				
				if($this->request->data['Attendance']['status'] == 0)
				$this->redirect(array('action' => 'for_course', $Attendance['Attendance']['course_id'], 'student_id' => $Attendance['Attendance']['user_id']));
				
				$this->Attendance->create();
				if ($this->Attendance->save($this->request->data)) {
					$this->flash(__('The attendance has been saved.'), array('action' => 'index'));
					$this->redirect(array('action' => 'for_course', $Attendance['Attendance']['course_id'], 'student_id' => $Attendance['Attendance']['user_id']));
				}else {
					$this->Session->setFlash(__('The attendance could not be saved. Please, try again.', true));
				}
				
			
		} else {
			$Attendance['Attendance'] = $this->params['named'];
			$this->request->data = $Attendance;
		}

	}
	
	
	
	
	public function teacher_addEdit() {
		
		
		
		if (!empty($this->request->data)) {

			$date = $this->request->data['Attendance']['date']['year'] . '-' . $this->request->data['Attendance']['date']['month'] . '-' . $this->request->data['Attendance']['date']['day'];
			$attendance = $this->Attendance->find('first', array('conditions' => array('user_id' => $this->request->data['Attendance']['user_id'],
																						'course_id' => $this->request->data['Attendance']['course_id'],
																						'class_id' => $this->request->data['Attendance']['class_id'],
																						'date' => $date,
																						),
																'contain' => false )
														);

			if($attendance){
					$this->Attendance->id = $attendance['Attendance']['id'];
			}
			
			if($this->request->data['Attendance']['status'] == 0){
				if($attendance){
					$this->Attendance->delete();
				}
				$this->Session->setFlash(__('The attendance has been saved.'));
				return $this->redirect('/');
			}
			

			if ($this->Attendance->save($this->request->data)) {
				$this->Session->setFlash(__('The attendance has been saved.'));
				$this->redirect('/');
			}else {
				$this->Session->setFlash(__('The attendance could not be saved. Please, try again.'));
			}
			
		} 
		
		$this->set('users', $this->Attendance->User->find('list', array('conditions' => array('User.user_type' => 'Student')) ) );
		
		$teacher_id = $this->Session->read('Auth.User.id');
		$courses = $this->User->UserCourse->find('all', array('conditions' => array('user_id' => $teacher_id), 'contain' => false ));
		$courses_ids = Set::extract('/UserCourse/course_id', $courses);
		$this->set('courses', $this->StudentClass->Course->find('list', array('conditions' => array('Course.id' => $courses_ids)) ) );
		
		
		$classes = $this->TeacherClass->find('all', array('conditions' => array('TeacherClass.user_id' => $teacher_id), 'contain' => false) );
		$class_ids = Set::extract('/TeacherClass/class_id', $classes);
		$StudentClasses = $this->StudentClass->find('all', array('conditions' => array('StudentClass.class_id' => $class_ids)) );
		
		$StudentClasses = Set::combine($StudentClasses, '{n}.StudentClass.class_id', array('%1$s - %2$s | %3$s | (%4$s %5$s - %6$s)', 
																							'{n}.Course.course_id', '{n}.Course.course_name', '{n}.StudentClass.room', '{n}.StudentClass.day_of_week', '{n}.StudentClass.start_time', '{n}.StudentClass.end_time'));
		
		$this->set('classes', $StudentClasses );
	}
	



}
