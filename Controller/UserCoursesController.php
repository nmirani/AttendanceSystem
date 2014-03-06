<?php
App::uses('AppController', 'Controller');
/**
 * UserCourses Controller
 *
 * @property UserCourse $UserCourse
 * @property PaginatorComponent $Paginator
 */
class UserCoursesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');



	public function admin_user_enrolled($user_id) {
		
		$this->set('user_id', $user_id);
		$this->Paginator->paginate = array('conditions' => array('user_id' => $user_id),
											'contain' => array('Course') );
		
		$this->UserCourse->recursive = 0;
		$this->set('userCourses', $this->Paginator->paginate(array('user_id' => $user_id)));
	}



	public function teacher_user_enrolled($user_id) {
		
		$this->set('user_id', $user_id);
		$this->Paginator->paginate = array('conditions' => array('user_id' => $user_id),
											'contain' => array('Course') );
		
		$this->UserCourse->recursive = 0;
		$this->set('userCourses', $this->Paginator->paginate(array('user_id' => $user_id)));
	}
	
	
	public function student_index() {
		$user_id = $this->Session->read('Auth.User.id');
		$this->set('user_id', $user_id);
		$this->Paginator->paginate = array('conditions' => array('user_id' => $user_id),
											'contain' => array('Course') );
		
		$this->UserCourse->recursive = 0;
		$this->set('userCourses', $this->Paginator->paginate(array('user_id' => $user_id)));
	}



	public function admin_students($course_id) {
		
		$this->set('course_id', $course_id);
		
		$this->paginate = array('conditions' => array('course_id' => $course_id, 'User.user_type' => 'Student'),
											'contain' => array('User') );
		
		$this->UserCourse->recursive = 0;
		$this->set('userCourses', $this->Paginator->paginate());
		$this->set('user_type', 'Student');
	}
	
	
	
	public function teacher_students($course_id) {
		
		$this->set('course_id', $course_id);
		
		$this->paginate = array('conditions' => array('course_id' => $course_id, 'User.user_type' => 'Student'),
											'contain' => array('User') );
		
		$this->UserCourse->recursive = 0;
		$this->set('userCourses', $this->Paginator->paginate());
		$this->set('user_type', 'Student');
	}


	public function admin_teachers($course_id) {
		
		$this->set('course_id', $course_id);
		
		$this->paginate = array('conditions' => array('course_id' => $course_id, 'User.user_type' => 'Teacher'),
											'contain' => array('User') );
		
		$this->UserCourse->recursive = 0;
		$this->set('userCourses', $this->Paginator->paginate());
		
		$this->set('user_type', 'Teacher');
		$this->render('admin_students');
	}




/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->UserCourse->recursive = 0;
		$this->set('userCourses', $this->Paginator->paginate());
	}
	
	public function teacher_index() {
		
		$teacher_id = $this->Session->read('Auth.User.id');
		$this->paginate = array('conditions' => array('user_id' => $teacher_id) );
		
		$this->UserCourse->recursive = 0;
		$this->set('userCourses', $this->Paginator->paginate());
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UserCourse->exists($id)) {
			throw new NotFoundException(__('Invalid user course'));
		}
		$options = array('conditions' => array('UserCourse.' . $this->UserCourse->primaryKey => $id));
		$this->set('userCourse', $this->UserCourse->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->UserCourse->create();
			if ($this->UserCourse->save($this->request->data)) {
				$this->Session->setFlash(__('The user course has been saved.'));
				return $this->redirect(array('action' => 'user_enrolled', $this->request->data['UserCourse']['user_id']));
			} else {
				$this->Session->setFlash(__('The user course could not be saved. Please, try again.'));
			}
		}
		
		$user = $this->UserCourse->User->find('first', array('conditions' => array('id' =>  $this->params['named']['user_id']) , 'contain' => false) );
		
		$users = $this->UserCourse->User->find('list', array('conditions' => array('user_type' => $user['User']['user_type']) ) );
		$courses = $this->UserCourse->Course->find('all', array('contain' => false) );
		$courses = Set::combine($courses, '{n}.Course.id', array('%1$s - %2$s (ID: %3$s)', '{n}.Course.course_id', '{n}.Course.course_name', '{n}.Course.id'));
		
		
		$this->set('user_id', $this->params['named']['user_id']);
		$this->set(compact('users', 'courses'));
	}
	
	
	
	public function admin_add_user() {
		
		$user_type = $this->params['named']['user_type'];
		$this->set('user_type', $this->params['named']['user_type']);
		
		if ($this->request->is('post')) {
			$this->UserCourse->create();
			if ($this->UserCourse->save($this->request->data)) {
				$this->Session->setFlash(__('The user course has been saved.'));
				return $this->redirect(array('action' => 'user_enrolled', $this->request->data['UserCourse']['user_id']));
			} else {
				$this->Session->setFlash(__('The user course could not be saved. Please, try again.'));
			}
		}else{
			$this->request->data['UserCourse']['course_id'] = 	$this->params['named']['course_id'];
		}
		
		$users = $this->UserCourse->User->find('list', array('conditions' => array('user_type' => $user_type) ) );
		
		$courses = $this->UserCourse->Course->find('all', array('contain' => false) );
		$courses = Set::combine($courses, '{n}.Course.id', array('%1$s - %2$s (ID: %3$s)', '{n}.Course.course_id', '{n}.Course.course_name', '{n}.Course.id'));
		
		$this->set('course_id', $this->params['named']['course_id']);
		$this->set(compact('users', 'courses'));
	}
	

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->UserCourse->exists($id)) {
			throw new NotFoundException(__('Invalid user course'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UserCourse->save($this->request->data)) {
				$this->Session->setFlash(__('The user course has been saved.'));
				return $this->redirect(array('action' => 'user_enrolled', $this->request->data['UserCourse']['user_id']));
			} else {
				$this->Session->setFlash(__('The user course could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UserCourse.' . $this->UserCourse->primaryKey => $id));
			$this->request->data = $this->UserCourse->find('first', $options);
		}
		$users = $this->UserCourse->User->find('list');
		$courses = $this->UserCourse->Course->find('list');
		$this->set(compact('users', 'courses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->UserCourse->id = $id;
		if (!$this->UserCourse->exists()) {
			throw new NotFoundException(__('Invalid user course'));
		}
		
		 $this->UserCourse->id = $id;
		 $UserCourse = $this->UserCourse->read(null, $id);
		
		$this->request->onlyAllow('post', 'delete');
		if ($this->UserCourse->delete()) {
			$this->Session->setFlash(__('The user course has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user course could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'user_enrolled', $UserCourse['UserCourse']['user_id']));
	}}
