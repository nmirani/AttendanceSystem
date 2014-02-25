<?php
App::uses('AppController', 'Controller');
/**
 * Classes Controller
 *
 * @property Class $Class
 * @property PaginatorComponent $Paginator
 */
class ClassesController extends AppController {

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
		$this->Class->recursive = 0;
		$this->set('classes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Class->exists($id)) {
			throw new NotFoundException(__('Invalid Class'));
		}
		$options = array('conditions' => array('Class.' . $this->Class->primaryKey => $id));
		$this->set('Class', $this->Class->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Class->create();
			if ($this->Class->save($this->request->data)) {
				$this->Session->setFlash(__('The Class has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Class could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Class->exists($id)) {
			throw new NotFoundException(__('Invalid Class'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Class->save($this->request->data)) {
				$this->Session->setFlash(__('The Class has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Class could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Class.' . $this->Class->primaryKey => $id));
			$this->request->data = $this->Class->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Class->id = $id;
		if (!$this->Class->exists()) {
			throw new NotFoundException(__('Invalid Class'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Class->delete()) {
			$this->Session->setFlash(__('The Class has been deleted.'));
		} else {
			$this->Session->setFlash(__('The Class could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

}

