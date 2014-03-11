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

	public function beforeFilter(){
		
		$this->Auth->allow('add');
		parent::beforeFilter();
		
	}
	


	public function add() {
		
		$this->layout = false;
		
		$username = $this->params['url']['username'];
		$tag = $this->params['url']['tag'];
		$tag_type = $this->params['url']['tag_type'];	
		
		$user = $this->UserTag->User->find('first', array('conditions' => array('username' => $username), 'contain' => false)) ;

		if(!$user){
			$data1['status'] = false;
			$data1['message'] = 'User not found';
			$this->set('data', $data1);
			return;	
		}
		
		
		$data['user_id'] = $user['User']['id'];
		$data['tag'] = $tag;
		$data['tag_type'] = $tag_type;

		
			$this->UserTag->create($data);
			
			if ($this->UserTag->save($data)) {
				$data1['status'] = true;
				$data1['message'] = 'Tag has been registered successfully';
			} else {
				$data1['status'] = false;
				$data1['message'] = $this->UserTag->validationErrors;//'Tag is in use or could not register the tag';
			}
		
			
			$this->set('data', $data1);	
	}
/**
 * index method
 *
 * @return void
 */
	public function admin_index($user_id) {
		
		$this->set('user_id', $user_id);
		$this->set('user', $this->UserTag->User->find('first', array('conditions' => array('id' => $user_id), 'contain' => false)) );
		
		$this->paginate = array('conditions' => array('user_id' => $user_id), 'contain' => false );
		
		$this->UserTag->recursive = 0;
		$this->set('userTags', $this->Paginator->paginate());
	}
	
	
	public function teacher_index($user_id) {
		
		$this->set('user_id', $user_id);
		$this->set('user', $this->UserTag->User->find('first', array('conditions' => array('id' => $user_id), 'contain' => false)) );
		
		$this->paginate = array('conditions' => array('user_id' => $user_id), 'contain' => false );
		
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
	public function admin_add($user_id) {
		
		$this->set('user_id', $user_id);
		$this->set('user', $this->UserTag->User->find('first', array('conditions' => array('id' => $user_id), 'contain' => false)) );
		
		
		if ($this->request->is('post')) {
			$this->UserTag->create();
			
			if ($this->UserTag->save($this->request->data)) {
				$this->Session->setFlash(__('The user tag has been saved.'));
				return $this->redirect(array('action' => 'index', $user_id));
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
	public function admin_edit($id = null) {
		
		
		
		if (!$this->UserTag->exists($id)) {
			throw new NotFoundException(__('Invalid user tag'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UserTag->save($this->request->data)) {
				$this->Session->setFlash(__('The user tag has been saved.'));
				return $this->redirect(array('action' => 'index', $this->request->data['UserTag']['user_id']));
			} else {
				$this->Session->setFlash(__('The user tag could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UserTag.' . $this->UserTag->primaryKey => $id));
			$this->request->data = $this->UserTag->find('first', $options);
		}
		
		
		$this->set('user_id', $this->request->data['UserTag']['user_id']);
		$this->set('user', $this->UserTag->User->find('first', array('conditions' => array('id' => $this->request->data['UserTag']['user_id']), 'contain' => false)) );
		
		
		
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
	public function admin_delete($id = null) {
		$this->UserTag->id = $id;
		if (!$this->UserTag->exists()) {
			throw new NotFoundException(__('Invalid user tag'));
		}
		$this->request->onlyAllow('post', 'delete');
		
		$this->UserTag->recursive = 0;
		$user_tag = $this->UserTag->read(null, $id);
		
		if ($this->UserTag->delete()) {
			$this->Session->setFlash(__('The user tag has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user tag could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index', $user_tag['UserTag']['user_id']));
	}}
