<?php
App::uses('AppController', 'Controller');
/**
 * UserTags Controller
 *
 * @property UserTag $UserTag
 * @property PaginatorComponent $Paginator
 */
class UserTagsController extends AppController {

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
		$this->UserTag->recursive = 0;
		$this->set('userTags', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UserTag->exists($id)) {
			throw new NotFoundException(__('Invalid user tag'));
		}
		$options = array('conditions' => array('UserTag.' . $this->UserTag->primaryKey => $id));
		$this->set('userTag', $this->UserTag->find('first', $options));
	}


/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UserTag->create();
			if ($this->UserTag->save($this->request->data)) {
				$this->Session->setFlash(__('The user tag has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user tag could not be saved. Please, try again.'));
			}
		}
		$users = $this->UserTag->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->UserTag->exists($id)) {
			throw new NotFoundException(__('Invalid user tag'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UserTag->save($this->request->data)) {
				$this->Session->setFlash(__('The user tag has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user tag could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UserTag.' . $this->UserTag->primaryKey => $id));
			$this->request->data = $this->UserTag->find('first', $options);
		}
		$users = $this->UserTag->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->UserTag->id = $id;
		if (!$this->UserTag->exists()) {
			throw new NotFoundException(__('Invalid user tag'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UserTag->delete()) {
			$this->Session->setFlash(__('The user tag has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user tag could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
