<?php
App::uses('AuthComponent', 'Controller/Component');

class InterviewScore extends AppModel {
	public function getInterviewScoreData($student_id = null){
		
		$fields = array(
			'User.first_name AS staff_first_name',
			'User.middle_name AS staff_middle_name',
			'User.last_name AS staff_last_name',
			'SUM(
				IF(InterviewScore.academic_excellence IS NOT NULL AND InterviewScore.academic_excellence != "", (InterviewScore.academic_excellence / 25) * 30, 0) +
				IF(InterviewScore.academic_excellence2 IS NOT NULL AND InterviewScore.academic_excellence2 != "", (InterviewScore.academic_excellence2 / 25) * 30, 0) +
				IF(InterviewScore.academic_excellence3 IS NOT NULL AND InterviewScore.academic_excellence3 != "", (InterviewScore.academic_excellence3 / 25) * 30, 0) +
				IF(InterviewScore.academic_excellence4 IS NOT NULL AND InterviewScore.academic_excellence4 != "", (InterviewScore.academic_excellence4 / 25) * 30, 0) +
				IF(InterviewScore.academic_excellence5 IS NOT NULL AND InterviewScore.academic_excellence5 != "", (InterviewScore.academic_excellence5 / 25) * 30, 0) +
				IF(InterviewScore.intellectual_curiosity IS NOT NULL AND InterviewScore.intellectual_curiosity != "", (InterviewScore.intellectual_curiosity / 25) * 20, 0) +
				IF(InterviewScore.intellectual_curiosity2 IS NOT NULL AND InterviewScore.intellectual_curiosity2 != "", (InterviewScore.intellectual_curiosity2 / 25) * 20, 0) +
				IF(InterviewScore.intellectual_curiosity3 IS NOT NULL AND InterviewScore.intellectual_curiosity3 != "", (InterviewScore.intellectual_curiosity3 / 25) * 20, 0) +
				IF(InterviewScore.intellectual_curiosity4 IS NOT NULL AND InterviewScore.intellectual_curiosity4 != "", (InterviewScore.intellectual_curiosity4 / 25) * 20, 0) +
				IF(InterviewScore.intellectual_curiosity5 IS NOT NULL AND InterviewScore.intellectual_curiosity5 != "", (InterviewScore.intellectual_curiosity5 / 25) * 20, 0) +
				IF(InterviewScore.communication_skills IS NOT NULL AND InterviewScore.communication_skills != "", (InterviewScore.communication_skills / 25) * 20, 0) +
				IF(InterviewScore.communication_skills2 IS NOT NULL AND InterviewScore.communication_skills2 != "", (InterviewScore.communication_skills2 / 25) * 20, 0) +
				IF(InterviewScore.communication_skills3 IS NOT NULL AND InterviewScore.communication_skills3 != "", (InterviewScore.communication_skills3 / 25) * 20, 0) +
				IF(InterviewScore.communication_skills4 IS NOT NULL AND InterviewScore.communication_skills4 != "", (InterviewScore.communication_skills4 / 25) * 20, 0) +
				IF(InterviewScore.communication_skills5 IS NOT NULL AND InterviewScore.communication_skills5 != "", (InterviewScore.communication_skills5 / 25) * 20, 0) +
				IF(InterviewScore.leadership_and_service IS NOT NULL AND InterviewScore.leadership_and_service != "", (InterviewScore.leadership_and_service / 25) * 15, 0) +
				IF(InterviewScore.leadership_and_service2 IS NOT NULL AND InterviewScore.leadership_and_service2 != "", (InterviewScore.leadership_and_service2 / 25) * 15, 0) +
				IF(InterviewScore.leadership_and_service3 IS NOT NULL AND InterviewScore.leadership_and_service3 != "", (InterviewScore.leadership_and_service3 / 25) * 15, 0) +
				IF(InterviewScore.leadership_and_service4 IS NOT NULL AND InterviewScore.leadership_and_service4 != "", (InterviewScore.leadership_and_service4 / 25) * 15, 0) +
				IF(InterviewScore.leadership_and_service5 IS NOT NULL AND InterviewScore.leadership_and_service5 != "", (InterviewScore.leadership_and_service5 / 25) * 15, 0) +
				IF(InterviewScore.overall_impression IS NOT NULL AND InterviewScore.overall_impression != "", (InterviewScore.overall_impression / 25) * 15, 0) +
				IF(InterviewScore.overall_impression2 IS NOT NULL AND InterviewScore.overall_impression2 != "", (InterviewScore.overall_impression2 / 25) * 15, 0) +
				IF(InterviewScore.overall_impression3 IS NOT NULL AND InterviewScore.overall_impression3 != "", (InterviewScore.overall_impression3 / 25) * 15, 0) +
				IF(InterviewScore.overall_impression4 IS NOT NULL AND InterviewScore.overall_impression4 != "", (InterviewScore.overall_impression4 / 25) * 15, 0) +
				IF(InterviewScore.overall_impression5 IS NOT NULL AND InterviewScore.overall_impression5 != "", (InterviewScore.overall_impression5 / 25) * 15, 0)
			) AS interviewScore'
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