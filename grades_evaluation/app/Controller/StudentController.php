<?php
App::uses('CakeEmail', 'Network/Email');
class StudentController extends AppController {
	
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
		$user_id = $this->Auth->User('id');
		
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
	
	public function sendEmail($emailTo = null, $emailSubject = null, $emailMessage = null) {
		// Load the CakeEmail component
		App::uses('CakeEmail', 'Network/Email');

		// Create a new instance of CakeEmail with the 'gmail' configuration
		$email = new CakeEmail('gmail');

		// Set email parameters
		$email->to('evsuocc123@gmail.com'); // The recipient's email address
		$email->subject('Test Email');
		$email->send('This is a test email.');

		// Send the email
		$email->send();
	}
}

?>
