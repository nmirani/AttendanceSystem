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

/**
 * index method
 *
 * @return void
 */
	public function index() {
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
	public function add() {
		if ($this->request->is('post')) {
			$this->UserCourse->create();
			if ($this->UserCourse->save($this->request->data)) {
				$this->Session->setFlash(__('The user course has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user course could not be saved. Please, try again.'));
			}
		}
		$users = $this->UserCourse->User->find('list');
		$courses = $this->UserCourse->Course->find('list');
		$this->set(compact('users', 'courses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->UserCourse->exists($id)) {
			throw new NotFoundException(__('Invalid user course'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UserCourse->save($this->request->data)) {
				$this->Session->setFlash(__('The user course has been saved.'));
				return $this->redirect(array('action' => 'index'));
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
	public function delete($id = null) {
		$this->UserCourse->id = $id;
		if (!$this->UserCourse->exists()) {
			throw new NotFoundException(__('Invalid user course'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UserCourse->delete()) {
			$this->Session->setFlash(__('The user course has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user course could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
