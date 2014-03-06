<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
	
	
		var $actsAs = array('Containable');
		
		function uniqueness($data, $name, $conditions = array()){
			$this->recursive = -1;
	
			$conditionOption = array("{$this->name}.$name" => $data);
			
			if(!empty($conditions)){
				foreach($conditions as $condition){
					if(isset($this->data[$this->name][$condition]))
						$conditionOption = Set::merge($conditionOption, array("{$this->name}.$condition" => $this->data[$this->name][$condition]));
				}
			}
			
		  $found = $this->find('first',array('conditions' => $conditionOption) );
		  $same = isset($this->id) && isset($found[$this->name][$this->primaryKey]) && $found[$this->name][$this->primaryKey] == $this->id;
		  return !$found || $found && $same;
	 }
}
