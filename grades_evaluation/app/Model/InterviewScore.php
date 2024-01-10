<?php
App::uses('AuthComponent', 'Controller/Component');

class InterviewScore extends AppModel {
	public function getInterviewScoreData($student_id = null){
		
		$fields = array(
			'User.first_name AS staff_first_name',
			'User.middle_name AS staff_middle_name',
			'User.last_name AS staff_last_name',
			'SUM(InterviewScore.academic_excellence + InterviewScore.intellectual_curiosity + InterviewScore.communication_skills + InterviewScore.leadership_and_service + InterviewScore.overall_impression) AS interviewScore'
		);
		
		$joins = array(
			array(
				'table' => 'users',
				'alias' => 'User',
				'type' => 'INNER',
				'conditions' => array(
					'InterviewScore.staff_id = User.id',
				),
			)
		);
		return $this->find('first', array(
			'fields' => $fields,
			'conditions' => array('student_id' => $student_id),
			'joins' => $joins
		));
	}
}

?>