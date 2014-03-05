<?php
App::uses('AppController', 'Controller');
/**
 * StudentClasses Controller
 *
 * @property StudentClass $StudentClass
 * @property PaginatorComponent $Paginator
 */
class StudentClassesController extends AppController {

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
	public function admin_index() {
		$this->StudentClass->recursive = 0;
		$this->set('studentClasses', $this->Paginator->paginate());
	}


	public function admin_for_course($course_id) {
		
		$this->set('course_id', $course_id);
		
		$this->paginate = array('conditions' => array('StudentClass.course_id' => $course_id), 'contain' => 'Course' );
		
		$this->StudentClass->recursive = 0;
		$this->set('studentClasses', $this->Paginator->paginate());
	}
	
	
	
	
	public function teacher_for_course($course_id) {
		
		$this->set('course_id', $course_id);
		
		$this->paginate = array('conditions' => array('StudentClass.course_id' => $course_id), 'contain' => 'Course' );
		
		$this->StudentClass->recursive = 0;
		$this->set('studentClasses', $this->Paginator->paginate());
	}



/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->StudentClass->exists($id)) {
			throw new NotFoundException(__('Invalid student class'));
		}
		$options = array('conditions' => array('StudentClass.' . $this->StudentClass->primaryKey => $id));
		$this->set('studentClass', $this->StudentClass->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->StudentClass->create();
			if ($this->StudentClass->save($this->request->data)) {
				$this->Session->setFlash(__('The student class has been saved.'));
				return $this->redirect(array('action' => 'for_course', $this->request->data['StudentClass']['course_id']));
			} else {
				$this->Session->setFlash(__('The student class could not be saved. Please, try again.'));
			}
		}else{
			if(isset($this->params['named']['course_id'])) $this->request->data['StudentClass']['course_id'] = $this->params['named']['course_id'];
		}
		

		$courses = $this->StudentClass->Course->find('all', array('contain' => false) );
		$courses = Set::combine($courses, '{n}.Course.id', array('%1$s - %2$s (ID: %3$s)', '{n}.Course.course_id', '{n}.Course.course_name', '{n}.Course.id'));
		
		$this->set(compact('courses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->StudentClass->exists($id)) {
			throw new NotFoundException(__('Invalid student class'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->StudentClass->save($this->request->data)) {
				$this->Session->setFlash(__('The student class has been saved.'));
				return $this->redirect(array('action' => 'for_course', $this->request->data['StudentClass']['course_id']));
			} else {
				$this->Session->setFlash(__('The student class could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StudentClass.' . $this->StudentClass->primaryKey => $id));
			$this->request->data = $this->StudentClass->find('first', $options);
		}
		$courses = $this->StudentClass->Course->find('list');
		$this->set(compact('courses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->StudentClass->id = $id;
		if (!$this->StudentClass->exists()) {
			throw new NotFoundException(__('Invalid student class'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->StudentClass->delete()) {
			$this->Session->setFlash(__('The student class has been deleted.'));
		} else {
			$this->Session->setFlash(__('The student class could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
