<?php
App::uses('AppController', 'Controller');
/**
 * TeacherClasses Controller
 *
 * @property TeacherClass $TeacherClass
 * @property PaginatorComponent $Paginator
 */
class TeacherClassesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function admin_index($teacher_id) {
		
		$this->set('teacher_id', $teacher_id);
		
		$this->paginate = array('conditions' => array('TeacherClass.user_id' => $teacher_id), 'contain' => array('StudentClass.Course') );
		
		$this->TeacherClass->recursive = 0;
		$this->set('TeacherClasses', $this->Paginator->paginate());
	}


	public function admin_for_course($course_id) {
		
		$this->set('course_id', $course_id);
		
		$this->paginate = array('conditions' => array('TeacherClass.course_id' => $course_id), 'contain' => 'Course' );
		
		$this->TeacherClass->recursive = 0;
		$this->set('TeacherClasses', $this->Paginator->paginate());
	}



/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->TeacherClass->exists($id)) {
			throw new NotFoundException(__('Invalid Teacher class'));
		}
		$options = array('conditions' => array('TeacherClass.' . $this->TeacherClass->primaryKey => $id));
		$this->set('TeacherClass', $this->TeacherClass->find('first', $options));
	}
	
	
	
/**
 * add method
 *
 * @return void
 */
	public function admin_add($teacher_id) {
		
		
		if ($this->request->is('post')) {
			$this->TeacherClass->create();
			if ($this->TeacherClass->save($this->request->data)) {
				$this->Session->setFlash(__('The Teacher class has been saved.'));
				return $this->redirect(array('action' => 'index', $this->request->data['TeacherClass']['user_id']));
			} else {
				$this->Session->setFlash(__('The Teacher class could not be saved. Please, try again.'));
			}
		}else{
			if(isset($this->params['named']['course_id'])) $this->request->data['TeacherClass']['course_id'] = $this->params['named']['course_id'];
		}
		
		$course_id = $this->TeacherClass->User->UserCourse->find('all', array('conditions'=> array('UserCourse.user_id' => $teacher_id)));
		$course_id = Set::extract('/UserCourse/course_id', $course_id);
		
		$StudentClasses = $this->TeacherClass->StudentClass->find('all', array('conditions' => array('StudentClass.course_id' => $course_id), 'contain'=> array('Course')));
		$StudentClasses = Set::combine($StudentClasses, '{n}.StudentClass.class_id', array('%1$s - %2$s | %3$s | (%4$s %5$s - %6$s)', 
																							'{n}.Course.course_id', '{n}.Course.course_name', '{n}.StudentClass.room', '{n}.StudentClass.day_of_week', '{n}.StudentClass.start_time', '{n}.StudentClass.end_time'));
		$this->set(compact('teacher_id', 'StudentClasses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->TeacherClass->exists($id)) {
			throw new NotFoundException(__('Invalid Teacher class'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TeacherClass->save($this->request->data)) {
				$this->Session->setFlash(__('The Teacher class has been saved.'));
				return $this->redirect(array('action' => 'index', $this->request->data['TeacherClass']['user_id']));
			} else {
				$this->Session->setFlash(__('The Teacher class could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TeacherClass.' . $this->TeacherClass->primaryKey => $id));
			$this->request->data = $this->TeacherClass->find('first', $options);
		}
		
		$teacher_id = $this->request->data['TeacherClass']['user_id'];
		
		$course_id = $this->TeacherClass->User->UserCourse->find('all', array('conditions'=> array('UserCourse.user_id' => $teacher_id)));
		$course_id = Set::extract('/UserCourse/course_id', $course_id);
		
		$StudentClasses = $this->TeacherClass->StudentClass->find('all', array('conditions' => array('StudentClass.course_id' => $course_id), 'contain'=> array('Course')));
		$StudentClasses = Set::combine($StudentClasses, '{n}.StudentClass.class_id', array('%1$s - %2$s | %3$s | (%4$s %5$s - %6$s)', 
																							'{n}.Course.course_id', '{n}.Course.course_name', '{n}.StudentClass.room', '{n}.StudentClass.day_of_week', '{n}.StudentClass.start_time', '{n}.StudentClass.end_time'));
		$this->set(compact('teacher_id', 'StudentClasses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->TeacherClass->id = $id;
		if (!$this->TeacherClass->exists()) {
			throw new NotFoundException(__('Invalid Teacher class'));
		}
		 
		 $this->TeacherClass->id = $id;
		 $TeacherClass = $this->TeacherClass->read(null, $id);
		 
		$this->request->onlyAllow('post', 'delete');
		if ($this->TeacherClass->delete()) {
			$this->Session->setFlash(__('The Teacher class has been deleted.'));
		} else {
			$this->Session->setFlash(__('The Teacher class could not be deleted. Please, try again.'));
		}
		
		 
		
		
		return $this->redirect(array('action' => 'index', $TeacherClass['TeacherClass']['user_id']));
	}}
