<?php
App::uses('AppController', 'Controller');
/**
 * Courses Controller
 *
 * @property Course $Course
 * @property PaginatorComponent $Paginator
 */
class CoursesController extends AppController {

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
		$this->Course->recursive = 1;
		$this->set('courses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Course->exists($id)) {
			throw new NotFoundException(__('Invalid course'));
			$this->redirect(array('action' => 'index'));
		}
		$options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
		$this->set('course', $this->Course->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if (!empty($this->request->data)) {
			$this->Course->create($this->request->data);
			if ($this->Course->save($this->request->data)) {return;
				$this->Session->setFlash(__('The course has been saved.'), true);
				$this->redirect(array('action' => 'index'));
			}else {
				$this->Session->setFlash(__('The Course could not be saved. Please, try again.', true));
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
	public function admin_edit($id = null) {
		if (!$this->Course->exists($id)) {
			throw new NotFoundException(__('Invalid course'));
		}
		if (!empty($this->request->data)) {
			$this->Course->id = $id;
			if ($this->Course->save($this->request->data)) {
				$this->flash(__('The course has been saved.'), array('action' => 'index'));
				$this->redirect(array('action' => 'index'));
			}else {
				$this->Session->setFlash(__('The Course could not be saved. Please, try again.', true));
			}
			
			
		} else {
			$options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
			$this->request->data = $this->Course->find('first', $options);
		}
		
	}
        // The feed action is called from "webroot/js/ready.js" to get the list of events (JSON)
	//{"Course":{"course_id":"COMP33812","course_name":"Software Evolution","created":"0000-00-00 00:00:00","modified":"0000-00-00 00:00:00"},
	//"Attendance":[],"StudentClass":[{"class_id":"33812","course_id":"COMP33812","room":"1.1","start_date_time":"2014-02-18 13:00:00","end_time":"2014-02-18 14:00:00",
	//"repeat":"7","group":null,"created":"0000-00-00 00:00:00","modified":"0000-00-00 00:00:00"}]
	//,"CoursesTeacher":[]}

	public function feed($id=null) {
		$this->layout = "ajax";
		$vars = $this->params['url'];
		$conditions = array('conditions' => array('UNIX_TIMESTAMP(StudentClass.start_date_time) >=' => $vars['start'], 'UNIX_TIMESTAMP(StudentClass.end_time) <=' => $vars['end']));
		//$this->Course->recursive = 2; // or higher
		//$courses = $this->Course->find('all', $conditions);
		$courses = $this->Course->find('all', array(
		    'joins' => array(
		        array(
		            'table' => 'student_classes',
		            'alias' => 'class',
		            'type' => 'INNER',
		            'conditions' => array(
		                'UNIX_TIMESTAMP(class.start_date_time) >= ' + $vars['start'],
		                'UNIX_TIMESTAMP(class.end_time) <= ' + $vars['end']
		            )
		        )
		    )
		));	
		foreach($courses as $course) {
			debug($course);
			foreach($course['StudentClass'] as $class){
				debug($class);
				$data[] = array(
						'id' => $course['Course']['course_id'], 
						'title'=>$course['Course']['course_name'] +  " "+ $class['room'],
						'start'=>$class['start_date_time'],	
						'end' => $class['end_time'],
						'url' => Router::url('/') . 'courses/view/'.$course['Course']['course_name']
				);
			}
		}
		$this->set("json", json_encode($courses));
	}
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Course->id = $id;
		if (!$this->Course->exists()) {
			throw new NotFoundException(__('Invalid course'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Course->delete()) {
			$this->flash(__('The course has been deleted.'), array('action' => 'index'));
		} else {
			$this->flash(__('The course could not be deleted. Please, try again.'), array('action' => 'index'));
		}
		
		$this->redirect(array('action' => 'index'));
		
	}}
