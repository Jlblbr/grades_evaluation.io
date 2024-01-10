<?php
App::uses('CakeEmail', 'Network/Email');
class ForgotPasswordController extends AppController {

	public $paginate = array(
		'limit' => 25,
		'conditions' => array('status' => '1'),
		'order' => array('User.username' => 'asc' )
	);

	public $uses = array(
		'User',
		'EmergencyLocationTracker',
		'PastLocation',
		'EmergencyContact',
		'Notification'
    );

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(
			'index',
			'resetPassword'
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
		
		$this->role = $this->Auth->User('role');
		$this->set('role', $this->role);
    }

	public function index() {
		
		if ($this->request->is('post')) {
			$data = $this->request->data;
			
			
			$userData = $this->User->find('first', array(
				'conditions' => array(
					'email' => $data['email'],
					'username' => $data['username']
				)
			));
			
			
			
			if (!empty($userData)) {
				$resetPasswordUrl = "";
				$whitelist = array( '127.0.0.1', '::1', 'localhost' );
				if ( in_array( $_SERVER['SERVER_NAME'], $whitelist ) ) {
					$baseUrl = $_SERVER['SERVER_NAME'];
					$resetPasswordUrl = "http://".$baseUrl;
					$resetPasswordUrl .= Router::url(array('controller' => 'forgotPassword', 'action' => 'resetPassword'));
					$resetPasswordUrl .= "?user_id=".$userData['User']['id'];
				} else {
					$baseUrl = $_SERVER['SERVER_NAME'];
					$resetPasswordUrl = "https://".$baseUrl;
					$resetPasswordUrl .= Router::url(array('controller' => 'forgotPassword', 'action' => 'resetPassword'));
					$resetPasswordUrl .= "?user_id=".$userData['User']['id'];
				}
				
				$emailTo = $data['email'];
				$emailSubject = "Reset Password";
				
				$emailMessage = "Hi ,
				\n\n To reset you password
				\n\n Click here : ".$resetPasswordUrl."
				\n\nBest regards,
				\nEVSU-OCC Grades Evaluation
				\n";
				
				$this->sendEmail($emailTo, $emailSubject, $emailMessage);
				
				$alert = '
					<div class="alert alert-success alert-dismissible mb-2" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<strong>Reset password request sent</strong> 
					</div>
				';
				$this->Session->setFlash( $alert, 'default', array(), 'login');
				$this->redirect(array('controller' => 'users', 'action' => 'login'));
			} else {
				$alert = '
					<div class="alert alert-danger alert-dismissible mb-2" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<strong>Email or Username is not valid</strong> 
					</div>
				';
				$this->Session->setFlash( $alert, 'default', array(), 'login');
			}
		}
		
		$this->set('functionName', 'login');
	}
	
	public function resetPassword() {
		$userId = $this->request->query('user_id');
		
		if (!empty($this->request->data)) {
			$data = $this->request->data;
			
			$userUpdateData = array(
				'id' => $userId,
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
			
			$this->Session->setFlash( $alert, 'default', array(), 'login');
			$this->redirect(array('controller' => 'users', 'action' => 'logout'));
		}
		
		if ($userId) {
			$userCurrentData = $this->User->find('first', array(
				'conditions' => array(
					'id' => $userId
				)
			));
			
			$this->set('userCurrentData', $userCurrentData['User']);
		} else {
			
			$alert = '
				<div class="alert alert-danger alert-dismissible mb-2" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
					<strong>Link is Invalid</strong> 
				</div>
			';
			$this->Session->setFlash( $alert, 'default', array(), 'login');
			
			$this->redirect(array('controller' => 'users', 'action' => 'login'));
		}

		$this->set('functionName', 'login');
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
