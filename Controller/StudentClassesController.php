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
	public function index() {
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
	public function view($id = null) {
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
	public function add() {
		if ($this->request->is('post')) {
			$this->StudentClass->create();
			if ($this->StudentClass->save($this->request->data)) {
				$this->Session->setFlash(__('The student class has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The student class could not be saved. Please, try again.'));
			}
		}
		$courses = $this->StudentClass->Course->find('list');
		$this->set(compact('courses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->StudentClass->exists($id)) {
			throw new NotFoundException(__('Invalid student class'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->StudentClass->save($this->request->data)) {
				$this->Session->setFlash(__('The student class has been saved.'));
				return $this->redirect(array('action' => 'index'));
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
