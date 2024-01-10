<?php
App::uses('CakeEmail', 'Network/Email');
class StaffController extends AppController {
	
	public $components = array('Paginator');

	public $uses = array(
		'User',
		'Student',
		'Instructor',
		'Staff',
		'Subject',
		'InstructorAssignedSubject',
		'InterviewScore'
    );

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(
			'login',
			'add',
			'edit',
			'addErmergencyTrackingData',
			'safe',
			'updateMachineLocation',
			'checkNewLocation',
			'getUserRequestStatus',
			'index',
			'getNotification',
			'clearNotificationNew',
			'newVissitFlagSet',
			'getEmergencyLocationTrackerId',
			'resetPassword',
			'contactEmail',
			'accountActivate'
		);

		if ($_SERVER['HTTP_HOST'] && $_SERVER['HTTP_HOST'] != 'localhost'){
			// Force to SSL
			$this->request->addDetector('ssl', array(
			    'env' => 'HTTP_X_FORWARDED_PROTO',
			    'value' => 'https'
			));
			if($_SERVER['HTTP_X_FORWARDED_PROTO'] == "http") {
				return $this->redirect('https://' . env('SERVER_NAME') . $this->here);
			}
		}
		
		$userData = $this->User->find('first', array(
			'conditions' => array(
				'id' => $this->Auth->user('id')
			)
		));
		$this->set('userData', $userData['User']);
    }
	
	public function updateProfile(){
		if (!empty($this->request->data)) {
			$data = $this->request->data;
			
			$userUpdateData = array(
				'id' => $this->Auth->user('id'),
				'first_name' => $data['User']['firstName'],
				'middle_name' => $data['User']['middleName'],
				'last_name' => $data['User']['lastName'],
				'contact_number' => $data['User']['contactNumber'],
				'email' => $data['User']['email'],
				'username' => $data['User']['username'],
			);
			
			if ($this->User->save($userUpdateData)) {
				$alert = '
					<div class="alert alert-success alert-dismissible mb-2" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<strong>Profile updated</strong> 
					</div>
				';
			} else {
				$alert = '
					<div class="alert alert-danger alert-dismissible mb-2" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<strong>Profile not updated</strong> 
					</div>
				';
			}
			
			$this->Session->setFlash( $alert, 'default', array(), 'save');
		}
		
		$userCurrentData = $this->User->find('first', array(
			'conditions' => array(
				'id' => $this->Auth->user('id')
			)
		));
		$this->set('userCurrentData', $userCurrentData['User']);
	}
	
	public function updatePassword(){
		
		if (!empty($this->request->data)) {
			$data = $this->request->data;
			
			$userUpdateData = array(
				'id' => $this->Auth->user('id'),
				'username' => $data['User']['username'],
				'password' => $data['User']['password'],
				'password_confirm' => $data['User']['confirmPassword']
			);
			
			// echo "<pre>";
			// print_r($userUpdateData);
			// die;
			
			if ($this->User->save($userUpdateData)) {
				$alert = '
					<div class="alert alert-success alert-dismissible mb-2" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<strong>Profile updated</strong> 
					</div>
				';
			} else {
				$alert = '
					<div class="alert alert-danger alert-dismissible mb-2" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<strong>Profile not updated</strong> 
					</div>
				';
			}
			
			$this->Session->setFlash( $alert, 'default', array(), 'save');
		}
		
		$userCurrentData = $this->User->find('first', array(
			'conditions' => array(
				'id' => $this->Auth->user('id')
			)
		));
		$this->set('userCurrentData', $userCurrentData['User']);
	}

	public function dashboard() {
		
		// Build your conditions array
		$conditions = array();
		$fields = array(
			'User.id',
			'User.first_name',
			'User.middle_name',
			'User.last_name',
			'User.email',
			'User.contact_number',
			'Student.school_id',
			'Student.date_of_birth',
			'Student.sex',
			'Student.profile_image_name',
			'Student.address',
			'Student.gpa',
			'Student.examination_score'
		);
		$joins = array(
			array(
				'table' => 'students',
				'alias' => 'Student',
				'type' => 'INNER',
				'conditions' => array(
					'User.id = Student.user_id',
				),
			)
		);
		
		// Check if any search criteria are present in the request
		if ($this->request->is('get')) {
			$searchTerm = $this->request->query('searchTerm');
			if (!empty($searchTerm)) {
				$conditions['OR'] = array(
					'User.id LIKE' => '%' . $searchTerm . '%',
					'User.first_name LIKE' => '%' . $searchTerm . '%',
					'User.middle_name LIKE' => '%' . $searchTerm . '%',
					'User.last_name LIKE' => '%' . $searchTerm . '%',
					'User.contact_number LIKE' => '%' . $searchTerm . '%',
					'Student.school_id LIKE' => '%' . $searchTerm . '%'
				);
			}
		}
		
		$this->Paginator->settings = array(
			'limit' => 2147483647,
			'fields' => $fields,
			'conditions' => $conditions,
			'joins' => $joins,
			'order' => array('User.id DESC')
		);
		
		$data = $this->Paginator->paginate('User');
		$cumLaudeCandidates = array();
		if (!empty($data)) {
			foreach ($data as $key => $value) {
				$interviewScore = $this->InterviewScore->getInterviewScoreData($value['User']['id']);
				
				$data[$key]['staff']['first_name'] = isset($interviewScore['User']['staff_first_name']) ? $interviewScore['User']['staff_first_name'] : '';
				$data[$key]['staff']['middle_name'] = isset($interviewScore['User']['staff_middle_name']) ? $interviewScore['User']['staff_middle_name'] : '';
				$data[$key]['staff']['last_name'] = isset($interviewScore['User']['staff_last_name']) ? $interviewScore['User']['staff_last_name'] : '';
				$data[$key]['Student']['interviewScore'] = isset($interviewScore[0]['interviewScore']) ? $interviewScore[0]['interviewScore'] : '';
				
				// Replace these values with the actual GPA, EXAM score, and INTERVIEW score
				$gpa = $value['Student']['gpa'];       // GPA on a scale of 4.0
				$examScore = $value['Student']['examination_score'];  // Out of 100
				$interviewScore = isset($data[$key]['Student']['interviewScore']) && $data[$key]['Student']['interviewScore']? $data[$key]['Student']['interviewScore']: 0; // Out of 100
				$calculateCumLaude = $this->calculateCumLaude($gpa, $examScore, $interviewScore);
				
				$data[$key]['Student']['overallGrade'] = $calculateCumLaude;
				
				if ($calculateCumLaude >= 74) {
					$cumLaudeCandidates[] = $data[$key];
					unset($data[$key]);
				}
			}
			
			$data = array_values($data); // Reindex the array
		}
		
		// echo "<pre>";
		// print_r($calculateCumLaude);
		// die;
		$this->set('data', $data);
		$this->set('cumLaudeCandidates', $cumLaudeCandidates);
		
		$this->set('pageName', 'dashboard');
	}
	
	public function addStudent() {
		
		if ($this->request->is('post')) {
			$data = $this->request->data;
			
			$userData['User'] = array(
				'first_name' => $data['StudentInfo']['firstName'],
				'middle_name' => $data['StudentInfo']['middleName'],
				'last_name' => $data['StudentInfo']['lastName'],
				
				'username' => $data['User']['schoolId'],
				'password' => $data['User']['password'],
				'password_confirm' => $data['User']['confirmPassword'],
				'email' => $data['User']['email'],
				'role' => 'Student'
			);
			
			$this->User->create();
			if ($this->User->save($userData)) {
				
				$lastInsertedId = $this->User->getLastInsertID();
				$studentData = array(
					'user_id' => $lastInsertedId,
					
					
					'school_id' => $data['User']['schoolId'],
					
					'course' => $data['StudentInfo']['course']
				);
				
				$this->Student->create();
				if ($this->Student->save($studentData)) {
					$alert = '
						<div class="alert alert-success alert-dismissible mb-2" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
							<strong>Student data save</strong> 
						</div>
					';
					
					$emailTo = $data['User']['email'];
					$emailSubject = "EVSU-OCC Grades Evaluation";
					
					$studentFullName =  $data['StudentInfo']['firstName'].' '.$data['StudentInfo']['middleName'].' '.$data['StudentInfo']['lastName'];
					
					$emailMessage = "Hi " . $studentFullName . ",
					\n\nYou are registered on the EVSU-OCC Grades Evaluation System.
					
					\n\n Your Credential : \n
					Username : ".$data['User']['schoolId']."
					Password : ".$data['User']['password']."
					
					\n\nBest regards,
					\nEVSU-OCC Grades Evaluation
					\n";

					
					$this->sendEmail($emailTo, $emailSubject, $emailMessage);
					
					$this->redirect(array('controller' => 'staff', 'action' => 'dashboard'));
				} else {
					$alert = '
						<div class="alert alert-danger alert-dismissible mb-2" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
							<strong>Student data not save</strong> 
						</div>
					';

					// - delete the user data when the student not save
					$this->User->delete($lastInsertedId);
				}
				$this->Session->setFlash( $alert, 'default', array(), 'save');
			} 
			
			// echo "<pre>";
			// print_r($userData);
			// die;
		}
		
		$this->set('pageName', 'addStudent');
	}
	
	public function deleteStudent($userID = null){
		if ($this->User->delete($userID)) {
			if ($this->Student->deleteAll(array('Student.user_id' => $userID))) {
				$alert = '
					<div class="alert alert-success alert-dismissible mb-2" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<strong>Student data deleted</strong> 
					</div>
				';
			}
		} else {
			$alert = '
				<div class="alert alert-warning alert-dismissible mb-2" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
					<strong>Student data not deleted</strong> 
				</div>
			';
		}
		
		$this->Session->setFlash( $alert, 'default', array(), 'save');
		$this->redirect(array('action' => 'dashboard'));
	}
	
	public function updateStudent($userID = null){
		
		if (!empty($this->request->data)) {
			$data = $this->request->data;
			
			$userData['User'] = array(
				'id' => $userID,
				'first_name' => isset($data['StudentInfo']['firstName']) && $data['StudentInfo']['firstName']? $data['StudentInfo']['firstName'] : '',
				'middle_name' => isset($data['StudentInfo']['middleName']) && $data['StudentInfo']['middleName']? $data['StudentInfo']['middleName']: '' ,
				'last_name' => isset($data['StudentInfo']['lastName']) && $data['StudentInfo']['lastName']? $data['StudentInfo']['lastName'] : '',
				'contact_number' => isset($data['StudentInfo']['contactNumber']) && $data['StudentInfo']['contactNumber']? $data['StudentInfo']['contactNumber'] : '',
				'username' => $data['User']['schoolId'],
				'email' => isset($data['User']['email']) && $data['User']['email']? $data['User']['email'] : '',
				'role' => 'Student'
			);
			
			if ($this->User->save($userData)) {
				
				$studentData = array(
					'id' => isset($data['StudentInfo']['id']) && $data['StudentInfo']['id']? $data['StudentInfo']['id']: '',
					'sex' => isset($data['StudentInfo']['sex']) && $data['StudentInfo']['sex']? $data['StudentInfo']['sex'] : '',
					'address' => isset($data['StudentInfo']['address']) && $data['StudentInfo']['address']? $data['StudentInfo']['address']: '',
					'school_id' => isset($data['User']['schoolId']) && $data['User']['schoolId']? $data['User']['schoolId'] : '',
					'date_of_birth' => isset($data['StudentInfo']['dateOfBirth']) && $data['StudentInfo']['dateOfBirth']? $data['StudentInfo']['dateOfBirth'] : '',
					'course' => isset($data['StudentInfo']['course']) && $data['StudentInfo']['course']? $data['StudentInfo']['course'] : ''
				);
				
				if ($this->Student->save($studentData)) {
					$alert = '
						<div class="alert alert-success alert-dismissible mb-2" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
							<strong>Student data save</strong> 
						</div>
					';
					$this->Session->setFlash( $alert, 'default', array(), 'save');
				}
				
				$this->redirect(array('action' => 'dashboard'));
			} 
			
		}
		
		$userData = $this->User->getStudentData($userID);
		// echo "<pre>";
		// print_r($userData);
		// die;
		$this->set('userData', $userData);
		$this->set('pageName', 'dashboard');
	}
	
	public function interviewRubric($user_id = null){
		if (!empty($this->request->data)) {
			$data 		= $this->request->data;
			$staff_id 	= $this->Auth->user('id');
			
			$hasInterviewScore = $this->InterviewScore->find('first', array(
				'conditions' => array(
					'student_id' => $user_id
				)
			));
			
			if (!empty($hasInterviewScore)) {
				try {
					
					$updateResult = $this->InterviewScore->query("
						UPDATE `interview_scores` SET
							`student_id` 				= '{$user_id}',
							`staff_id` 					= '{$staff_id}',
							`academic_excellence` 		= '{$data['academic_excellence']}',
							`intellectual_curiosity` 	= '{$data['intellectual_curiosity']}',
							`communication_skills` 		= '{$data['communication_skills']}',
							`leadership_and_service` 	= '{$data['leadership_and_service']}',
							`overall_impression` 		= '{$data['overall_impression']}'
						WHERE 
							`id` = '{$hasInterviewScore['InterviewScore']['id']}' 
					");
						
					$alert = '
						<div class="alert alert-success alert-dismissible mb-2" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
							<strong>data save</strong> 
						</div>
					';
					$this->Session->setFlash( $alert, 'default', array(), 'save');
					$this->redirect(array('action' => 'dashboard'));
				} catch (Exception $e) {
					$alert = '
						<div class="alert alert-danger alert-dismissible mb-2" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
							<strong>data not save</strong> 
						</div>
					';
					$this->Session->setFlash( $alert, 'default', array(), 'save');
				}
			} else {
				$dataToSave = array(
					'student_id' => $user_id,
					'staff_id' => $staff_id,
					'academic_excellence' => $data['academic_excellence'],
					'intellectual_curiosity' => $data['intellectual_curiosity'],
					'communication_skills' => $data['communication_skills'],
					'leadership_and_service' => $data['leadership_and_service'],
					'overall_impression' => $data['overall_impression']
				);
				
				if ($this->InterviewScore->save($dataToSave)) {
					$alert = '
						<div class="alert alert-success alert-dismissible mb-2" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
							<strong>data save</strong> 
						</div>
					';
					$this->Session->setFlash( $alert, 'default', array(), 'save');
					$this->redirect(array('action' => 'dashboard'));
				} else {
					$alert = '
						<div class="alert alert-danger alert-dismissible mb-2" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
							<strong>data not save</strong> 
						</div>
					';
					$this->Session->setFlash( $alert, 'default', array(), 'save');
				}
			}
			
		}
		
		$interviewScore = $this->InterviewScore->find('first', array(
			'conditions' => array(
				'student_id' => $user_id
			)
		));
		
		// echo "<pre>";
		// print_r($interviewScore);
		// die;
		
		$this->set('interviewScore', $interviewScore);
		$this->set('pageName', 'dashboard');
	}
	
	public function gpa($user_id = null){
		if (!empty($this->request->data)) {
			$data = $this->request->data;
			
			try {
				$updateResult = $this->Student->query("
					UPDATE `students` SET
						`gpa` = '{$data['score']}'
					WHERE 
						`user_id` = '{$user_id}'
				");
					
				$alert = '
					<div class="alert alert-success alert-dismissible mb-2" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<strong>data save</strong> 
					</div>
				';
				$this->Session->setFlash( $alert, 'default', array(), 'save');
				$this->redirect(array('action' => 'dashboard'));
			} catch (Exception $e) {
				$alert = '
					<div class="alert alert-danger alert-dismissible mb-2" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<strong>data not save</strong> 
					</div>
				';
				$this->Session->setFlash( $alert, 'default', array(), 'save');
			}
		}
		
		$stuentData = $this->Student->find('first', array(
			'conditions' => array(
				'user_id' => $user_id
			)
		));
		
		// echo "<pre>";
		// print_r($stuentData);
		// die;
		
		$this->set('stuentData', $stuentData);
		$this->set('pageName', 'dashboard');
	}
	
	public function examination($user_id = null){
		if (!empty($this->request->data)) {
			$data = $this->request->data;
			
			try {
				$updateResult = $this->Student->query("
					UPDATE `students` SET
						`examination_score` = '{$data['score']}'
					WHERE 
						`user_id` = '{$user_id}'
				");
					
				$alert = '
					<div class="alert alert-success alert-dismissible mb-2" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<strong>data save</strong> 
					</div>
				';
				$this->Session->setFlash( $alert, 'default', array(), 'save');
				$this->redirect(array('action' => 'dashboard'));
			} catch (Exception $e) {
				$alert = '
					<div class="alert alert-danger alert-dismissible mb-2" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<strong>data not save</strong> 
					</div>
				';
				$this->Session->setFlash( $alert, 'default', array(), 'save');
			}
			
		}
		
		$stuentData = $this->Student->find('first', array(
			'conditions' => array(
				'user_id' => $user_id
			)
		));
		// echo "<pre>";
		// print_r($stuentData);
		// die;
		
		$this->set('stuentData', $stuentData);
		$this->set('pageName', 'dashboard');
	}
	
	public function calculateCumLaude($gpa = 0, $examScore = 0, $interviewScore = 0){
		// Replace these values with the actual GPA, EXAM score, and INTERVIEW score
		// $gpa = 1.2;       // GPA on a scale of 4.0
		// $examScore = 85;  // Out of 100
		// $interviewScore = 90; // Out of 100
		
		$scaledScore = $this->scaleGpaTo100($gpa);
		
		// Calculate the cumulative grade
		$cumulativeGrade = (($scaledScore + 5) * 0.8) + ($examScore * 0.1) + ($interviewScore * 0.1);

		// You can round the cumulati͏ve grade to a specific number of decimal͏ places if needed
		$cumulativeGrade = round($cumulativeGrade, 2);
		
		return $cumulativeGrade;
		// echo͏ "Cumulative Grade: " . $cumulativeGrade;
	}
	
	public function scaleGpaTo100($gpa) {
		if ($gpa >= 1.0 && $gpa <= 5.0) {
			// Map the GPA to the specified ranges
			if ($gpa <= 3.0) {
				$mappedValue = 95 - (($gpa - 1.0) / 2.0) * 20.0;
			} else {
				$mappedValue = 75 - (($gpa - 3.0) / 2.0) * 10.0;
			}
	
			return $mappedValue;
		} else {
			return 65; // Default value for GPA outside the specified range
		}
	}

	



	
	
	public function studentProfile($user_id = null){		
		// Build your conditions array
		$conditions = array(
			'User.id' => $user_id
		);
		$fields = array(
			'User.id',
			'User.first_name',
			'User.middle_name',
			'User.last_name',
			'User.email',
			'User.contact_number',
			'Student.school_id',
			'Student.date_of_birth',
			'Student.sex',
			'Student.profile_image_name',
			'Student.address',
			'Student.gpa',
			'Student.examination_score'
		);
		$joins = array(
			array(
				'table' => 'students',
				'alias' => 'Student',
				'type' => 'INNER',
				'conditions' => array(
					'User.id = Student.user_id',
				),
			)
		);
		
		$data = $this->User->find('first', array(
			'fields' => $fields,
			'conditions' => $conditions,
			'joins' => $joins
		));
		
		if (!empty($data)) {
			$interviewScore = $this->InterviewScore->getInterviewScoreData($data['User']['id']);
			$calculateCumLaude = $this->calculateCumLaude();
			
			$data['Staff']['first_name'] = isset($interviewScore['User']['staff_first_name']) ? $interviewScore['User']['staff_first_name'] : '';
			$data['Staff']['middle_name'] = isset($interviewScore['User']['staff_middle_name']) ? $interviewScore['User']['staff_middle_name'] : '';
			$data['Staff']['last_name'] = isset($interviewScore['User']['staff_last_name']) ? $interviewScore['User']['staff_last_name'] : '';
			$data['Student']['interviewScore'] = isset($interviewScore[0]['interviewScore']) ? $interviewScore[0]['interviewScore'] : 0;
			
			// Replace these values with the actual GPA, EXAM score, and INTERVIEW score
			$gpa = $data['Student']['gpa'];       // GPA on a scale of 4.0
			$examScore = $data['Student']['examination_score'];  // Out of 100
			$interviewScore = isset($data['Student']['interviewScore']) && $data['Student']['interviewScore']? $data['Student']['interviewScore']: 0; // Out of 100
			$calculateCumLaude = $this->calculateCumLaude($gpa, $examScore, $interviewScore);
			
			$data['Student']['overallGrade'] = $calculateCumLaude;
			
		}
		
		$studentInterviewScore = $this->InterviewScore->find('first', array(
			'conditions' => array(
				'student_id' => $user_id
			)
		));
		
		// echo "<pre>";
		// print_r($data);
		// die;
		$this->set('data', $data);
		$this->set('studentInterviewScore', $studentInterviewScore);
		
		$this->set('pageName', 'dashboard');
		$this->set('functionName', 'studentProfile');
	}
	
	public function sendEmail($emailTo = null, $emailSubject = null, $emailMessage = null) {
		// Load the CakeEmail component
		App::uses('CakeEmail', 'Network/Email');

		// Create a new instance of CakeEmail with the 'gmail' configuration
		$email = new CakeEmail('gmail');

		// Set email parameters
		$email->to($emailTo); // The recipient's email address
		$email->subject($emailSubject);
		$email->send($emailMessage);

		// Send the email
		$email->send();
	}
}

?>
