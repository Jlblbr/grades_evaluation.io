<?php
App::uses('CakeEmail', 'Network/Email');
class AdminController extends AppController {
	
	public $components = array('Paginator');

	public $uses = array(
		'User',
		'Student',
		'Instructor',
		'Staff',
		'Subject',
		'InstructorAssignedSubject'
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
		
		$allUser = $this->User->find('all', array(
			'conditions' => array(
				'role NOT' => 'Admin'
			)
		));
		
		$studentCount = 0;
		$instructorCount = 0;
		$staffCount = 0;
		foreach ($allUser as $key => $value) {
			if ($value['User']['role'] == "Student") {
				$studentCount ++;
			} elseif ($value['User']['role'] == "Instructor") {
				$instructorCount ++;
			} elseif ($value['User']['role'] == "Staff") {
				$staffCount ++;
			}
		}
		
		$this->set('studentCount', $studentCount);
		$this->set('instructorCount', $instructorCount);
		$this->set('staffCount', $staffCount);
		$this->set('pageName', 'dashboard');
	}
	
	public function addStudent() {
		
		if ($this->request->is('post')) {
			$data = $this->request->data;
			
			$userData['User'] = array(
				'first_name' => $data['StudentInfo']['firstName'],
				'middle_name' => $data['StudentInfo']['middleName'],
				'last_name' => $data['StudentInfo']['lastName'],
				'contact_number' => $data['StudentInfo']['contactNumber'],
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
					'sex' => $data['StudentInfo']['sex'],
					'address' => $data['StudentInfo']['address'],
					'school_id' => $data['User']['schoolId'],
					'date_of_birth' => $data['StudentInfo']['dateOfBirth'],
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
					
					$this->Session->setFlash( $alert, 'default', array(), 'save');
					
					$this->redirect(array('controller' => 'admin', 'action' => 'studentList'));
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
		
		$this->set('pageName', 'dashboard');
	}
	
	public function studentList(){
		
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
			'Student.address'
		);
		$joins = array(
			array(
				'table' => 'students',
				'alias' => 'Student',
				'type' => 'INNER',
				'conditions' => array(
					'User.id = Student.user_id',
				),
			),
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
			'limit' => 10,
			'fields' => $fields,
			'conditions' => $conditions,
			'joins' => $joins,
			'order' => array('User.id DESC')
		);
		
		$data = $this->Paginator->paginate('User');
		
		$this->set('data', $data);
		
		$this->set('pageName', 'dashboard');
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
		$this->redirect(array('action' => 'instructorList'));
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
				
				$this->redirect(array('controller' => 'admin', 'action' => 'studentList'));
			} 
			
		}
		
		$userData = $this->User->getStudentData($userID);
		// echo "<pre>";
		// print_r($userData);
		// die;
		$this->set('userData', $userData);
		$this->set('pageName', 'dashboard');
	}
	
	public function instructorList(){
		// Build your conditions array
		$conditions = array();
		$fields = array(
			'User.id',
			'User.first_name',
			'User.middle_name',
			'User.last_name',
			'User.email',
			'User.contact_number',
			'Instructor.sex',
			'Instructor.profile_image_name',
			'Instructor.address'
		);
		$joins = array(
			array(
				'table' => 'instructors',
				'alias' => 'Instructor',
				'type' => 'INNER',
				'conditions' => array(
					'User.id = Instructor.user_id',
				),
			),
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
					'Instructor.address LIKE' => '%' . $searchTerm . '%'
				);
			}
		}
		
		$this->Paginator->settings = array(
			'limit' => 10,
			'fields' => $fields,
			'conditions' => $conditions,
			'joins' => $joins,
			'order' => array('User.id DESC')
		);
		
		$data = $this->Paginator->paginate('User');
		
		$assignSubjects = array();
		foreach ($data as $key => $value) {
			$userID = $value['User']['id'];
			$instructorAssignedSubjectData = $this->InstructorAssignedSubject->getAssignSubjectData($userID);
			
			foreach ($instructorAssignedSubjectData as $IASDkey => $IASDvalue) {
				$data[$key]['User']['assigned_subjects'][$IASDkey] = $IASDvalue['Subject'];
			}
		}
		
		// echo "<pre>";
		// print_r($data);
		// die;
		$this->set('data', $data);
		$this->set('assignSubjects', $assignSubjects);
		$this->set('pageName', 'dashboard');
	}
	
	public function addInstructor() {
		
		if ($this->request->is('post')) {
			$data = $this->request->data;
			
			$userData['User'] = array(
				'first_name' => $data['User']['firstName'],
				'middle_name' => $data['User']['middleName'],
				'last_name' => $data['User']['lastName'],
				'contact_number' => $data['User']['contactNumber'],
				'username' => $data['User']['username'],
				'password' => $data['User']['password'],
				'password_confirm' => $data['User']['confirmPassword'],
				'email' => $data['User']['email'],
				'role' => 'Instructor'
			);
			
			$this->User->create();
			if ($this->User->save($userData)) {
				
				$lastInsertedId = $this->User->getLastInsertID();
				$studentData = array(
					'user_id' => $lastInsertedId,
					'sex' => $data['User']['sex'],
					'address' => $data['User']['address'],
					'date_of_birth' => $data['User']['dateOfBirth']
				);
				
				$this->Instructor->create();
				if ($this->Instructor->save($studentData)) {
					$alert = '
						<div class="alert alert-success alert-dismissible mb-2" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
							<strong>Instructor data save</strong> 
						</div>
					';
					
					$this->redirect(array('controller' => 'admin', 'action' => 'instructorList'));
				} else {
					$alert = '
						<div class="alert alert-danger alert-dismissible mb-2" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
							<strong>Instructor data not save</strong> 
						</div>
					';
					
					// - delete the user data when the student not save
					$this->User->delete($lastInsertedId);
				}
				
				$this->Session->setFlash( $alert, 'default', array(), 'save');
			}
		}
		
		$this->set('pageName', 'dashboard');
	}
	
	public function updateInstructor($userID = null){
		if (!empty($this->request->data)) {
			$data = $this->request->data;
			
			$userData['User'] = array(
				'id' => $userID,
				'first_name' => isset($data['User']['firstName']) && $data['User']['firstName']? $data['User']['firstName'] : '',
				'middle_name' => isset($data['User']['middleName']) && $data['User']['middleName']? $data['User']['middleName']: '' ,
				'last_name' => isset($data['User']['lastName']) && $data['User']['lastName']? $data['User']['lastName'] : '',
				'contact_number' => isset($data['User']['contactNumber']) && $data['User']['contactNumber']? $data['User']['contactNumber'] : '',
				'username' => $data['User']['username'],
				'email' => isset($data['User']['email']) && $data['User']['email']? $data['User']['email'] : '',
				'role' => 'Instructor'
			);
			
			if ($this->User->save($userData)) {
				
				$instructorData = array(
					'id' => isset($data['User']['instructorID']) && $data['User']['instructorID']? $data['User']['instructorID']: '',
					'sex' => isset($data['User']['sex']) && $data['User']['sex']? $data['User']['sex'] : '',
					'address' => isset($data['User']['address']) && $data['User']['address']? $data['User']['address']: '',
					'school_id' => isset($data['User']['schoolId']) && $data['User']['schoolId']? $data['User']['schoolId'] : '',
					'date_of_birth' => isset($data['User']['dateOfBirth']) && $data['User']['dateOfBirth']? $data['User']['dateOfBirth'] : '',
				);
				
				if ($this->Instructor->save($instructorData)) {
					$alert = '
						<div class="alert alert-success alert-dismissible mb-2" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
							<strong>Instructor data save</strong> 
						</div>
					';
					$this->Session->setFlash( $alert, 'default', array(), 'save');
				}
				
				$this->redirect(array('controller' => 'admin', 'action' => 'instructorList'));
			} 
			
		}
		
		$userData = $this->User->getInstructorData($userID);
		
		// echo "<pre>";
		// print_r($userData);
		// die;
		
		$this->set('userData', $userData);
		$this->set('pageName', 'dashboard');
	}
	
	public function deleteInstructor($userID = null){
		if ($this->User->delete($userID)) {
			if ($this->Instructor->deleteAll(array('Instructor.user_id' => $userID))) {
				$alert = '
					<div class="alert alert-success alert-dismissible mb-2" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<strong>Instructor data deleted</strong> 
					</div>
				';
			}
		} else {
			$alert = '
				<div class="alert alert-warning alert-dismissible mb-2" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
					<strong>Instructor data not deleted</strong> 
				</div>
			';
		}
		
		$this->Session->setFlash( $alert, 'default', array(), 'save');
		$this->redirect(array('action' => 'instructorList'));
	}
	
	public function staffList(){
		// Build your conditions array
		$conditions = array();
		$fields = array(
			'User.id',
			'User.first_name',
			'User.middle_name',
			'User.last_name',
			'User.email',
			'User.contact_number',
			'Staff.sex',
			'Staff.profile_image_name',
			'Staff.address'
		);
		$joins = array(
			array(
				'table' => 'staffs',
				'alias' => 'Staff',
				'type' => 'INNER',
				'conditions' => array(
					'User.id = Staff.user_id',
				),
			),
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
					'Staff.address LIKE' => '%' . $searchTerm . '%'
				);
			}
		}
		
		$this->Paginator->settings = array(
			'limit' => 10,
			'fields' => $fields,
			'conditions' => $conditions,
			'joins' => $joins,
			'order' => array('User.id DESC')
		);
		
		$data = $this->Paginator->paginate('User');
		
		$this->set('data', $data);
		
		$this->set('pageName', 'dashboard');
	}
	
	public function addStaff() {
		
		if ($this->request->is('post')) {
			$data = $this->request->data;
			
			$userData['User'] = array(
				'first_name' => $data['User']['firstName'],
				'middle_name' => $data['User']['middleName'],
				'last_name' => $data['User']['lastName'],
				'username' => $data['User']['username'],
				'password' => $data['User']['password'],
				'password_confirm' => $data['User']['confirmPassword'],
				'email' => $data['User']['email'],
				'role' => 'Staff'
			);
			
			$this->User->create();
			if ($this->User->save($userData)) {
				
				$lastInsertedId = $this->User->getLastInsertID();
				$studentData = array(
					'user_id' => $lastInsertedId,
				);
				
				$this->Staff->create();
				if ($this->Staff->save($studentData)) {
					$alert = '
						<div class="alert alert-success alert-dismissible mb-2" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
							<strong>Staff data save</strong> 
						</div>
					';

					$emailTo = $data['User']['email'];
					$emailSubject = "EVSU-OCC Grades Evaluation";
					
					$staffFullName =  $data['User']['firstName'].' '.$data['User']['middleName'].' '.$data['User']['lastName'];
					
					$emailMessage = "Hi " . $staffFullName . ",
					\n\nYou are registered on the EVSU-OCC Grades Evaluation System.
					
					\n\n Your Credential : \n
					Username : ".$data['User']['username']."
					Password : ".$data['User']['password']."
					
					\n\nBest regards,
					\nEVSU-OCC Grades Evaluation
					\n";
					
					$this->sendEmail($emailTo, $emailSubject, $emailMessage);
					
					$this->Session->setFlash( $alert, 'default', array(), 'save');
					
					$this->redirect(array('controller' => 'admin', 'action' => 'staffList'));
				} else {
					$alert = '
						<div class="alert alert-danger alert-dismissible mb-2" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
							<strong>Staff data not save</strong> 
						</div>
					';
					
					// - delete the user data when the student not save
					$this->User->delete($lastInsertedId);
				}
				
				$this->Session->setFlash( $alert, 'default', array(), 'save');
			}
		}
		
		$this->set('pageName', 'dashboard');
	}
	
	public function updateStaff($userID = null){
		if (!empty($this->request->data)) {
			$data = $this->request->data;
			
			$userData['User'] = array(
				'id' => $userID,
				'first_name' => isset($data['User']['firstName']) && $data['User']['firstName']? $data['User']['firstName'] : '',
				'middle_name' => isset($data['User']['middleName']) && $data['User']['middleName']? $data['User']['middleName']: '' ,
				'last_name' => isset($data['User']['lastName']) && $data['User']['lastName']? $data['User']['lastName'] : '',
				'contact_number' => isset($data['User']['contactNumber']) && $data['User']['contactNumber']? $data['User']['contactNumber'] : '',
				'username' => $data['User']['username'],
				'email' => isset($data['User']['email']) && $data['User']['email']? $data['User']['email'] : '',
				'role' => 'Staff'
			);
			
			if ($this->User->save($userData)) {
				
				$staffData = array(
					'id' => isset($data['User']['staffID']) && $data['User']['staffID']? $data['User']['staffID']: '',
					'sex' => isset($data['User']['sex']) && $data['User']['sex']? $data['User']['sex'] : '',
					'address' => isset($data['User']['address']) && $data['User']['address']? $data['User']['address']: '',
					'school_id' => isset($data['User']['schoolId']) && $data['User']['schoolId']? $data['User']['schoolId'] : '',
					'date_of_birth' => isset($data['User']['dateOfBirth']) && $data['User']['dateOfBirth']? $data['User']['dateOfBirth'] : '',
				);
				
				if ($this->Staff->save($staffData)) {
					$alert = '
						<div class="alert alert-success alert-dismissible mb-2" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
							<strong>Staff data save</strong> 
						</div>
					';
					$this->Session->setFlash( $alert, 'default', array(), 'save');
				}
				
				$this->redirect(array('controller' => 'admin', 'action' => 'staffList'));
			} 
			
		}
		
		$userData = $this->User->getStaffData($userID);
		
		// echo "<pre>";
		// print_r($userData);
		// die;
		
		$this->set('userData', $userData);
		$this->set('pageName', 'dashboard');
	}
	
	public function deleteStaff($userID = null){
		if ($this->User->delete($userID)) {
			if ($this->Staff->deleteAll(array('Staff.user_id' => $userID))) {
				$alert = '
					<div class="alert alert-success alert-dismissible mb-2" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<strong>Staff data deleted</strong> 
					</div>
				';
			}
		} else {
			$alert = '
				<div class="alert alert-warning alert-dismissible mb-2" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
					<strong>Staff data not deleted</strong> 
				</div>
			';
		}
		
		$this->Session->setFlash( $alert, 'default', array(), 'save');
		$this->redirect(array('action' => 'staffList'));
	}
	
	public function subjectList(){
		// Build your conditions array
		$conditions = array();
		$fields = array(
			'Subject.id',
			'Subject.name_of_subject',
			'Subject.unit',
			'Subject.year_level',
			'Subject.pre_requesit',
			'Subject.semester',
			'Subject.date_created'
		);
		$joins = array(
			array(
				'table' => 'staffs',
				'alias' => 'Staff',
				'type' => 'INNER',
				'conditions' => array(
					'User.id = Staff.user_id',
				),
			),
		);
		
		// Check if any search criteria are present in the request
		if ($this->request->is('get')) {
			$searchTerm = $this->request->query('searchTerm');
			if (!empty($searchTerm)) {
				$conditions['OR'] = array(
					'Subject.id LIKE' => '%' . $searchTerm . '%',
					'Subject.name_of_subject LIKE' => '%' . $searchTerm . '%',
					'Subject.unit LIKE' => '%' . $searchTerm . '%',
					'Subject.year_level LIKE' => '%' . $searchTerm . '%',
					'Subject.pre_requesit LIKE' => '%' . $searchTerm . '%',
					'Subject.semester LIKE' => '%' . $searchTerm . '%'
				);
			}
		}
		
		$this->Paginator->settings = array(
			'limit' => 10,
			'fields' => $fields,
			'conditions' => $conditions
			// 'order' => array('User.id DESC')
		);
		
		$data = $this->Paginator->paginate('Subject');
		
		$this->set('data', $data);
		
		$this->set('pageName', 'subject');
		$this->set('subPageName', 'subjectList');
	}
	
	public function addSubject() {
		
		if ($this->request->is('post')) {
			$data = $this->request->data;
			
			$userData['Subject'] = array(
				'name_of_subject' => $data['Subject']['name_of_subject'],
				'unit' => $data['Subject']['unit'],
				'pre_requesit' => $data['Subject']['pre_requesit'],
				'year_level' => $data['Subject']['year_level'],
				'semester' => $data['Subject']['semester']
			);
			
			$this->Subject->create();
			if ($this->Subject->save($userData)) {
				
				$alert = '
					<div class="alert alert-success alert-dismissible mb-2" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<strong>Subject data save</strong> 
					</div>
				';
				$this->redirect(array('controller' => 'admin', 'action' => 'subjectList'));
			} else {
				$alert = '
					<div class="alert alert-danger alert-dismissible mb-2" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<strong>Subject data not save</strong> 
					</div>
				';
			}
			$this->Session->setFlash( $alert, 'default', array(), 'save');
		}
		
		$subjectList = $this->Subject->find('all');
		
		$this->set('subjectList', $subjectList);
		$this->set('pageName', 'subject');
		$this->set('subPageName', 'addSubject');
	}
	
	public function updateSubject($subjectID = null) {
		
		if ($this->request->is('post')) {
			$data = $this->request->data;
			
			$userData['Subject'] = array(
				'id' => $subjectID,
				'name_of_subject' => $data['Subject']['name_of_subject'],
				'unit' => $data['Subject']['unit'],
				'pre_requesit' => $data['Subject']['pre_requesit'],
				'year_level' => $data['Subject']['year_level'],
				'semester' => $data['Subject']['semester']
			);
			
			$this->Subject->create();
			if ($this->Subject->save($userData)) {
				$alert = '
					<div class="alert alert-success alert-dismissible mb-2" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<strong>Subject data save</strong> 
					</div>
				';
				$this->Session->setFlash( $alert, 'default', array(), 'save');
				$this->redirect(array('controller' => 'admin', 'action' => 'subjectList'));
			} else {
				$alert = '
					<div class="alert alert-danger alert-dismissible mb-2" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<strong>Subject data not save</strong> 
					</div>
				';
				$this->Session->setFlash( $alert, 'default', array(), 'save');
			}
		}
		
		$subjectData = $this->Subject->find('first', array(
			'conditions' => array(
				'id' => $subjectID
			)
		));
		
		$subjectList = $this->Subject->find('all');
		
		$this->set('subjectData', $subjectData);
		$this->set('subjectList', $subjectList);
		$this->set('pageName', 'subject');
		$this->set('subPageName', 'subjectList');
	}
	
	public function deleteSubject($subjectID = null){
		// - check if have pre requesit
		$preRequesitSubjectId = $this->Subject->find('all', array(
			'fields' => array('id'),
			'conditions' => array(
				'pre_requesit' => $subjectID
			)
		));
		
		if (!empty($preRequesitSubjectId)) {
			foreach ($preRequesitSubjectId as $key => $value) {
				$this->Subject->clear();
				$this->Subject->read(array('id'), $value['Subject']['id']);
				$this->Subject->set(array('pre_requesit' => null));
				$this->Subject->save();
			}
		}
		
		// echo "<pre>";
		// print_r($preRequesitSubjectId);
		// die;
		
		if ($this->Subject->delete($subjectID)) {
			$alert = '
				<div class="alert alert-success alert-dismissible mb-2" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
					<strong>Staff data deleted</strong> 
				</div>
			';
		} else {
			$alert = '
				<div class="alert alert-warning alert-dismissible mb-2" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
					<strong>Staff data not deleted</strong> 
				</div>
			';
		}
		
		$this->Session->setFlash( $alert, 'default', array(), 'save');
		$this->redirect(array('action' => 'subjectList'));
	}
	
	public function assignSubject($userID = null){
		
		if ($this->request->is('post')) {
			$subjectsData = $this->request->data;
			
			// - delete all assign subject
			$this->InstructorAssignedSubject->deleteAll(array('user_id' => $userID));
			
			$assignSubjects = array();
			if (isset($subjectsData['subjects']) && !empty($subjectsData['subjects'])) {
				foreach ($subjectsData['subjects'] as $key => $value) {
					$assignSubjects[$key]['subject_id'] = $value;
					$assignSubjects[$key]['user_id'] = $userID;
				}
			}
			
			if ($this->InstructorAssignedSubject->saveAll($assignSubjects)) {
				
			}
		}
		
		$assignSubjects = $this->InstructorAssignedSubject->getAssignSubject($userID);
		$instructorData = $this->User->getInstructorData($userID);
		$subjects = $this->Subject->getAllSubjectData();
		
		// echo "<pre>";
		// print_r($subjects);
		// die;
		
		$this->set('instructorData', $instructorData);
		$this->set('subjects', $subjects);
		$this->set('assignSubjects', $assignSubjects);
		$this->set('pageName', 'dashboard');
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
