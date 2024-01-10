<?php
App::uses('CakeEmail', 'Network/Email');
class InstructorController extends AppController {
	
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
}

?>
