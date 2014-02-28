<?php
App::uses('AppController', 'Controller','AuthComponent','Component');
//App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'RequestHandler');
    public $name = 'Users';

	public function beforeFilter(){
		Security::setHash('md5');
		parent::beforeFilter();
		$this->Auth->allow('add');
	}

   /* public function isAuthorized($user) {
        if ($user['user_type'] == 'admin') {
            return true;
        }
        if (in_array($this->action, array('edit', 'delete'))) {
            if ($user['id'] != $this->request->params['pass'][0]) {
                return false;
            }
        }
        return true;
    } */


		
		public function login() {
			if ($this->request->is('post')) {
				$username = $this->request->data['Users']['username'];
				$password = Security::hash($this->data['Users']['password'], 'md5', false);
				$user_type = $this->request->data['Users']['user_type'];
				//debug($username);
				//debug($password);
				$user = $this->User->find('first', array('conditions' => array('username' => $username, 'password' => $password, 'user_type' => $user_type), 'contain' => false));

				if ($user && $this->Auth->login($user['User'])) {
					$this->Session->setFlash(__('Welcome, '. $this->Auth->user('first_name')));
					
					switch($user['User']['user_type']){
						case 'Admin': 	$this->redirect('/admin/pages/home'); break;
						case 'Student': 	$this->redirect('/student/pages/home');
						case 'Teacher': 	$this->redirect('/teacher/pages/home');
					}
					
				}
				else{
					$this->Session->setFlash(__('Invalid username or password,please try again!'));
			}
		 }
		}
	
	
	
	
	
	public function logout() {
		return $this->redirect($this->Auth->logout()); 
	}


    public function admin_index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function admin_view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function admin_add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        }
    }

    public function admin_edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
			$user = $this->User->read(null, $id);
			$this->User->data = $this->request->data;
			$this->User->data['User']['username'] = $user['User']['username'];
			if($this->User->data['User']['password'] == ''){
					 unset($this->User->data['User']['password']);
					 unset($this->User->data['User']['password_confirmation']);
			}else{
				
			}

            if ($this->User->save($this->User->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function admin_delete($id = null) {
        $this->request->onlyAllow('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }

    // The feed action is called from "webroot/js/ready.js" to get the list of events (JSON)
    function admin_find($id=null) {
        $this->layout = "ajax";
        $vars = $this->params['url'];
        
        $user = $this->User->find('all', array('contain' => 'UserTag.Tag = "047d1a02592"'));
        
        $this->set("json", json_encode($user));
    }
}
