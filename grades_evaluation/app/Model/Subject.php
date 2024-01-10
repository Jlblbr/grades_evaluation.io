<?php
App::uses('AuthComponent', 'Controller/Component');

class Subject extends AppModel {
	public function getAllSubjectData(){
		return $this->find('all');
	}
}

?>