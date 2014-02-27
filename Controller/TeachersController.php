<?php


class TeachersController extends AppController {

/**
 * Components
 *
 * @var array
 */

    public $name = 'Teachers';

	public function beforeFilter(){

		parent::beforeFilter();

	}





    public function admin_index() {
        $this->Teacher->recursive = 0;
        $this->set('Teachers', $this->paginate());
    }
}
