<?php
App::uses('AuthComponent', 'Controller/Component');

class InstructorAssignedSubject extends AppModel {
	public function getAssignSubject($userID = null){
		return $this->find('list', array(
			'fields' => array('subject_id'),
			'conditions' => array('user_id' => $userID)
		));
	}
	
	public function getAssignSubjectData($userID = null){
		$joins = array(
			array(
				'table' => 'subjects',
				'alias' => 'Subject',
				'type' => 'INNER',
				'conditions' => array(
					'Subject.id = InstructorAssignedSubject.subject_id'
				),
			),
		);
		
		return $this->find('all', array(
			'fields' => array(
				'Subject.name_of_subject'
			),
			'conditions' => array('user_id' => $userID),
			'joins' => $joins
		));
	}
}

?>