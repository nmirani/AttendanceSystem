<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');
//App::uses('SimplePasswordHasher', 'Controller/Component/Auth');


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $helpers = array(
		'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
		'Form' => array('className' => 'BoostCake.BoostCakeForm'),
		'Paginator' => array('className' => 'BoostCake.BoostCakePaginator')
	);

    public $components = array(
    	'Session',
    	'Auth' => array(
        'loginRedirect' => array('controller' => 'users', 'action' => 'index'),
        'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
        'authorize' => array('Controller')
        )
    );

    public function beforeFilter() {
		$this->Auth->allow('login', 'home', 'logout'); 
        //$this->Auth->allow('index','view','find','login','display'); //previously allowed login and find
        //$this->set('logged_in', $this->Auth->loggedIn());
        //$this->set('current_user', $this->Auth->user());

    }
	
	
	public function isAuthorized($user = null) {
        //debug($this->request->params);
		
		// Any registered user can access public functions
        if (!empty($this->request->params['admin']) && $user['user_type'] == 'Admin') {
            return true;
        }

        if (!empty($this->request->params['student']) && $user['user_type'] == 'Student') {
            return true;
        }
		
		if (!empty($this->request->params['teacher']) && $user['user_type'] == 'Teacher') {
            return true;
        }

        // Default deny
        return false;
    }

 
 }
