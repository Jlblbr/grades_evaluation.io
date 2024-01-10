<?php
App::uses('CakeEmail', 'Network/Email');
class ApiController extends AppController {

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
			'login',
			'logout'
		);
		
		$this->role = $this->Auth->User('role');
		$this->set('role', $this->role);
    }

	public function login() {
		$this->autoRender = false;
		$response = array();
		
		// if we get the post information, try to authenticate
		if ($this->request->is('post')) {
			// Retrieve the JSON data from the request
			$requestData = $this->request->input('json_decode', true);
			
			if ($requestData) {
				$username = $requestData['username'];
				$password = $requestData['password'];
				
				$loginCredential = array(
					'username' => $username,
					'password' => $password
				);
				
				$this->request->data('User', $loginCredential);
				
				if ($this->Auth->login()) {
					
					$response = array(
						'status' => 'success',
						'result' => 'OK',
						"user_data" => array(
							'id' => $this->Auth->user('id'),
							'first_name' => $this->Auth->user('first_name'),
							'middle_name' => $this->Auth->user('middle_name'),
							'last_name' => $this->Auth->user('last_name'),
							'username' => $this->Auth->user('username'),
							'email' => $this->Auth->user('email'),
							'role' => $this->Auth->user('role'),
							'contact_number' => $this->Auth->user('contact_number')
						)
					);
				
				} else {
					// Invalid JSON or missing data
					$response = array('error' => 'Invalid usernam and password');
					$this->response->type('json');
					$this->response->statusCode(400); // Set the appropriate status code
					$this->response->body(json_encode($response));
				}
			} else {
				// Invalid JSON or missing data
				$response = array('error' => 'Invalid JSON data');
				$this->response->type('json');
				$this->response->statusCode(400); // Set the appropriate status code
				$this->response->body(json_encode($response));
			}
			
			
		} else {
			// Not a POST request
			$response = array('error' => 'Invalid request method');
			$this->response->type('json');
			$this->response->statusCode(405); // Set the appropriate status code for method not allowed
			$this->response->body(json_encode($response));
		}
		
		return json_encode($response);
	}
	
	public function logout() {
		$this->autoRender = false;
		$this->Auth->logout();
	}
}

?>
