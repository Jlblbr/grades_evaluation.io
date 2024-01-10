<?php
App::uses('CakeEmail', 'Network/Email');
class UsersController extends AppController {

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
		
		$this->role = $this->Auth->User('role');
		$this->set('role', $this->role);
    }

	public function login() {
		
		//if already logged-in, redirect
		if($this->Session->check('Auth.User')){
			
			if (strtolower($this->Auth->user('role')) == 'admin') {
				$this->redirect(array(
					'controller' => 'admin',
					'action' => 'dashboard'
				));
			} elseif (strtolower($this->Auth->user('role')) == 'staff') {
				$this->redirect(array(
					'controller' => 'admin',
					'action' => 'index'
				));
			} elseif (strtolower($this->Auth->user('role')) == 'teacher') {
				$this->redirect(array(
					'controller' => 'teacher',
					'action' => 'index'
				));
			} elseif (strtolower($this->Auth->user('role')) == 'student') {
				$this->redirect(array(
					'controller' => 'student',
					'action' => 'dashboard'
				));
			} else {
				$this->Auth->logout();
				$alert = '
					<div class="alert alert-danger alert-dismissible" role="alert">
					'.__('You needd to login').'
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				';
				$this->Session->setFlash( $alert, 'default', array(), 'login');
			}
		}

		// if we get the post information, try to authenticate
		if ($this->request->is('post')) {
			$usetLoginData = $this->request->data;
			// echo "<pre>";
			// print_r($this->request->data);
			// die;
			if ($this->Auth->login()) {

				$this->Session->write('User.password', $usetLoginData['User']['password']);

				// $this->Auth->user();
				if (strtolower($this->Auth->user('role')) == 'admin') {
					$alert = '
						<div class="alert alert-success alert-dismissible" role="alert">
						'.__('Welcome, '. $this->Auth->user('username')).'
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					';

					$this->Session->setFlash( $alert, 'default', array(), 'indexContactPerson');

					$this->redirect(array(
						'controller' => 'admin',
						'action' => 'dashboard'
					));
				} elseif (strtolower($this->Auth->user('role')) == 'staff') {
					$alert = '
						<div class="alert alert-success alert-dismissible" role="alert">
						'.__('Welcome, '. $this->Auth->user('username')).'
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					';

					$this->Session->setFlash( $alert, 'default', array(), 'indexContactPerson');

					$this->redirect(array(
						'controller' => 'staff',
						'action' => 'dashboard'
					));
				} elseif (strtolower($this->Auth->user('role')) == 'instructor') {
					$alert = '
						<div class="alert alert-success alert-dismissible" role="alert">
						'.__('Welcome, '. $this->Auth->user('username')).'
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					';

					$this->Session->setFlash( $alert, 'default', array(), 'indexContactPerson');

					$this->redirect(array(
						'controller' => 'instructor',
						'action' => 'dashboard'
					));
				} elseif (strtolower($this->Auth->user('role')) == 'student') {
					$alert = '
						<div class="alert alert-success alert-dismissible" role="alert">
						'.__('Welcome, '. $this->Auth->user('username')).'
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					';

					$this->Session->setFlash( $alert, 'default', array(), 'indexContactPerson');

					$this->redirect(array(
						'controller' => 'student',
						'action' => 'dashboard'
					));
				} else {
					$this->Auth->logout();
					$alert = '
						<div class="alert alert-danger alert-dismissible mb-2" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
							<strong>'.__('Invalid username or password').'</strong> 
						</div>
					';

					$this->Session->setFlash( $alert, 'default', array(), 'login');
				}
			} else {
				$this->Session->setFlash(__('Invalid username or password'));
				$alert = '
					<div class="alert alert-danger alert-dismissible mb-2" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<strong>'.__('Invalid username or password').'</strong> 
					</div>
				';

				$this->Session->setFlash( $alert, 'default', array(), 'login');
			}
		}
		
		$this->set('functionName', 'login');
	}

    public function itexmo($numbers = array(), $message = null){
        // $ch = curl_init();
        //
        // $data = array(
        //     'Email' => 'angelicaadviento9@gmail.com',
        //     'Password' => 'Capstone2022.',
        //     'Recipients' => $numbers,
        //     'Message' => $message,
        //     'ApiCode' => 'ST-MAANG445262_M2RUX',
        //     'SenderId' => 'ITEXMO SMS'
        // );
        //
        // // set URL and other appropriate options
        // curl_setopt($ch, CURLOPT_URL, "https://api.itexmo.com/api/broadcast");
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        //
        // return curl_exec ($ch);
        // curl_close ($ch);
    }

	public function logout() {
        $this->Auth->logout();
        $this->redirect(array(
            'controller' => 'users',
            'action' => 'login'
        ));
	}

    public function index() {
		
    }


    public function add() {
        if ($this->request->is('post')) {

            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been created'));
                $this->redirect(array('action' => 'index'));
            } else {
                // $this->Session->setFlash(__('The user could not be created. Please, try again.'));
            }

            $data = $this->request->data;
            $resquestData = array(
                'username' => $data['User']['username'],
                'email' => $data['User']['email'],
                'password' => $data['User']['password'],
                'password_confirm' => $data['User']['password_confirm'],
                'role' => $data['User']['role']
            );
            $this->set('data', $resquestData);
        }
    }

    public function edit($id = null) {
        if (!$id) {
            $this->Session->setFlash('Please provide a user id');
            $this->redirect(array('action'=>'index'));
        }

        $user = $this->User->findById($id);
        if (!$user) {
            $this->Session->setFlash('Invalid User ID Provided');
            $this->redirect(array('action'=>'index'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->User->id = $id;
            if ($this->User->save($this->request->data)) {
                $alert = '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>
                        	'.__('The user has been updated').'
                        </strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                ';

                $this->Session->setFlash( $alert, 'default', array(), 'login');
                $this->redirect(array('action' => 'login'));
            }else{
                $this->Session->setFlash(__('Unable to update your user.'));
            }
        }

        if (!$this->request->data) {
            $this->request->data = $user;
        }
        $this->set('id', $id);
    }

    public function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Please provide a user id');
			$this->redirect(array('action'=>'index'));
		}

		$this->User->id = $id;
		if (!$this->User->exists()) {
			$this->Session->setFlash('Invalid user id provided');
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->saveField('status', 0)) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
    }

	public function activate($id = null) {

		if (!$id) {
			$this->Session->setFlash('Please provide a user id');
			$this->redirect(array('action'=>'index'));
		}

        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided');
			$this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 1)) {
            $this->Session->setFlash(__('User re-activated'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not re-activated'));
        $this->redirect(array('action' => 'index'));
    }


	public function contactEmail(){
		/* all data is taken from contact.ctp, I debuged all data below and it's correct */

	    $useremail = 'evsuocc123@gmail.com';
	    $usertopic = 'Subject';
	    $usermessage = 'test message';
	    $Email = new CakeEmail();
	    $Email->config('gmail')
	        ->emailFormat('html')
	        ->from($useremail)
	        ->to('evsuocc123@gmail.com')
	        ->subject($usertopic); // all data is correct i checked several times

	    if($Email->send($usermessage)){
	        $this->Session->setFlash('Mail sent','default',array('class'=>'alert alert-success'));
	        echo "success";
	    } else  {
	        $this->Session->setFlash('Problem during sending email','default',array('class'=>'alert alert-warning'));
			echo "error";
	    }
		die;
	}

	public function clearPage(){
		$this->redirect(array('action'=>'logout'));
	}

	public function home(){
		$userData = $this->Auth->user();
        $userId = $this->Auth->user('id');
		$emergencyData = $this->EmergencyLocationTracker->find('first',array(
			'conditions' => array(
				'user_id' => $this->Auth->user('id')
			)
		));

		$newVissitFlag = $this->Session->read('newVissitFlag');

		$this->set('newVissitFlag', $newVissitFlag);
		$this->set('pageName', 'index');
		$this->set('userData', $userData);
		$this->set('emergencyData', !empty($emergencyData['EmergencyLocationTracker'])? $emergencyData['EmergencyLocationTracker'] : false);
	}

	public function contacts(){
		$userData = $this->Auth->user();
        $userId = $this->Auth->user('id');
		$countEmerContactNo = $this->EmergencyContact->find('all',array(
			'conditions' => array(
				'user_id' => $this->Auth->user('id')
			)
		));

		$this->set('countEmerContactNo', $countEmerContactNo);
		$this->set('userData', $userData);
	}

	public function addContact($emergencyContactId = null){

		if ($emergencyContactId) {
			// - update contact person
			if ($this->request->is('post')) {
				$data = $this->request->data('EmergencyContact');

				$dataArr = array(
					'id' =>  $emergencyContactId,
					'user_id' => $this->Auth->user('id'),
					'fullname' => $data['fullname'],
					'contact_number' => $data['contact_number'],
					'status' => isset($data['status']) && $data['status']? 1 : 0,
					'message' => $data['message'],
				);

				$this->EmergencyContact->clear();
				$this->EmergencyContact->set($dataArr);
				if ($this->EmergencyContact->save()) {

					$alert = '
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>
							Data updated
						</strong>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>';

					$this->Session->setFlash( $alert, 'default', array(), 'editContactPerson');
				}else {

					$alert = '
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>
							Unable to updated your user.
						</strong>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>';

					$this->Session->setFlash( $alert, 'default', array(), 'editContactPerson');
				}
			}


			$contactPersonData = $this->EmergencyContact->find('first',array(
				'conditions' => array(
					'id' => $emergencyContactId
				)
			));

			$this->set('contactPersonData', $contactPersonData['EmergencyContact']);
		}else {
			// - add contact person
			if ($this->request->is('post')) {
				$data = $this->request->data('EmergencyContact');

				$dataArr = array(
					'user_id' => $this->Auth->user('id'),
					'fullname' => $data['fullname'],
					'contact_number' => $data['contact_number'],
					'message' => $data['message'],
					'status' => isset($data['status']) && $data['status']? 1 : 0,
					'date_created' => date("Y-m-d H:i:s"),
					'date_modified' => date("Y-m-d H:i:s")
				);

				if ($this->EmergencyContact->save($dataArr)) {

					$alert = '
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>
							Data saved
						</strong>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>';

					$this->Session->setFlash( $alert, 'default', array(), 'addContactPerson');
				}else {

					$alert = '
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>
						   Unable to save your user.
					   	</strong>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>';

					$this->Session->setFlash( $alert, 'default', array(), 'addContactPerson');
				}
			}
		}
	}

	public function profile(){
		$userId = $this->Auth->user('id');

		$userData = $this->User->find('first', array(
			'conditions'=>array(
				'id' => $userId
			)
		));

		$data = $userData['User'];

		if ($this->request->is('post')) {
			if (!$userId) {
				$alert = '
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>
						Please provide a user id
					</strong>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>';

				$this->Session->setFlash( $alert, 'default', array(), 'profile');
				$this->redirect(array('action'=>'index'));
			}

			$user = $this->User->findById($userId);
			if (!$user) {
				$alert = '
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>
						Invalid User ID Provided
					</strong>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>';

				$this->Session->setFlash( $alert, 'default', array(), 'profile');
				$this->redirect(array('action'=>'index'));
			}

			$requestData = $this->request->data;
			$requestData['User']['id'] = $userId;
			$data = $this->request->data('User');

			if ($this->request->is('post') || $this->request->is('put')) {
				$this->User->id = $userId;
				if ($this->User->save($requestData)) {
					$alert = '
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>
							The user has been updated
						</strong>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>';

					$this->Session->setFlash( $alert, 'default', array(), 'profile');
					$this->redirect(array('action' => 'profile'));
					$this->set('data', $data);
				}else{
					$alert = '
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>
							Unable to update your user.
						</strong>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>';

					$this->Session->setFlash( $alert, 'default', array(), 'profile');
				}
			}
		}

		$this->set('pageName', 'profile');
		$this->set('data', $data);
	}

	public function notification(){
		$userData = $this->Auth->user();

		$notifications = $this->Notification->find('all', array(
			'conditions' => array(
				'user_info_to' => $userData['contact_number'],
				'status_read' => 0
			)
		));

		if (!empty($notifications)) {
			foreach ($notifications as $key => $notification) {
				$userInfoFromObj = json_decode($notification['Notification']['user_info_from']);
				$userId = $userInfoFromObj->user_id;

				$emergencyContactUserData = $this->User->find('first', array(
					'conditions' => array(
						'id' => $userId
					)
				));

				if (!empty($emergencyContactUserData)) {
					$notifications[$key]['Notification']['user_data'] = $emergencyContactUserData['User'];
				}
			}
		}

		$this->set('notifications', $notifications);
	}

	public function map($emerUserId = null, $emegencyLocationId = null, $notificationId = null){
		$emeruUserLocation = $this->EmergencyLocationTracker->find('first', array(
			'conditions' => array(
				'user_id' => $emerUserId
			)
		));

		$emerUserData =$this->User->find('first', array(
			'conditions' => array(
				'id' => $emerUserId
			)
		));

		$this->Notification->read(null, $notificationId);
		$this->Notification->set('status_read', 1);
		$this->Notification->save();

		$this->set('pageName', 'map');
		$this->set('emergencyLocationTrackerId', $emegencyLocationId);
		$this->set('emeruUserData', $emerUserData);
		$this->set('emegencyLocationId', $emegencyLocationId);
	}


	public function getEmergencyLocation(){
		$this->autoRender = false;
		$data = $this->request->data;

		$result = $this->EmergencyLocationTracker->find('first', array(
			'conditions' => array(
				'id' => $data['emegencyLocationId']
			)
		));

		$trackingData = array(
			'lat' => $result['EmergencyLocationTracker']['lat'],
			'lng' => $result['EmergencyLocationTracker']['long']
		);

		// echo "<pre>";
		// print_r($data);
		// die;
		echo json_encode($trackingData);
	}

	public function getNotification(){
		$this->autoRender = false;
		$userData = $this->Auth->User();

		$notifications = $this->Notification->find('all', array(
			'conditions' => array(
				'user_info_to' => $userData['contact_number'],
				'status_read' => 0
			)
		));

		$newNotificationFlag = false;
		if (!empty($notifications)) {
			foreach ($notifications as $key => $notification) {
				if ($notification['Notification']['new_flag'] == 1) {
					$newNotificationFlag = true;
				}
			}
		}

		$res = array(
			'notificationsCount' => count($notifications),
			'newNotificationFlag' => $newNotificationFlag
		);
		echo json_encode($res);
	}

	public function clearNotificationNew(){
		$this->autoRender = false;
		$userData = $this->Auth->User();

		$notifications = $this->Notification->find('all', array(
			'conditions' => array(
				'user_info_to' => $userData['contact_number'],
				'new_flag' => 1
			)
		));

		if (!empty($notifications)) {
			foreach ($notifications as $key => $notification) {
				$notificationId = $notification['Notification']['id'];
				$this->Notification->read(null, $notificationId);
				$this->Notification->set('new_flag', 0);

				if ($this->Notification->save()) {
					echo "Notification Clear";
				}else {
					echo "Notification Not Clear";
				}
			}
		}
	}

	public function newVissitFlagSet(){
		$this->autoRender = false;
		$this->Session->write('newVissitFlag', false);

		$this->redirect(array('action' => 'home'));
	}

	public function resetPassword(){

		if ($this->request->is('post')) {
			$this->Session->delete('Message.resetPassword');
			$dataReq =  $this->request->data;
			$contactNumber = $dataReq['contactNumber'];

			$fourDigitRandomNumber = rand(1239,7879);

			if ($contactNumber) {
				$accountData = $this->User->find('first', array(
					'conditions' => array(
						'contact_number' => $contactNumber,
						'role' => 'User'
					)
				));

				if ($accountData) {
					$updateData = array(
						'emergency_contact_number' => $fourDigitRandomNumber
					);
					$this->User->clear();
					$this->User->read(null, $accountData['User']['id']);
					$this->User->set($updateData);

					if ($this->User->save()) {
						$text = "Four digit temporary code".$fourDigitRandomNumber;

						$number = $contactNumber;
						$message = $text;
						// - send text nitification
						$sendSMSFlag = $this->itexmo($number, $message);

						if ($sendSMSFlag) {

						}

						$this->redirect(
							array('controller' => 'Users', 'action' => 'accountActivate', $contactNumber)
						);
					}else {
						$this->set('contactNumber', $contactNumber);
						$alert = '
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>
							   Data not save
							</strong>
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
						';
					}
				}else {
					$this->set('contactNumber', $contactNumber);
					$alert = '
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						<strong>
						   The number you enter is not exist in the database
						</strong>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					';
				}
			}else {
				$this->set('contactNumber', $contactNumber);
				$alert = '
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>
					   Please Enter Number
					</strong>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				';
			}

			$this->Session->setFlash( $alert, 'default', array(), 'resetPassword');

		}
	}

	public function accountActivate($contactNumber = null){

		if ($this->request->is('ajax')) {
			$data = $this->request->data;
			$userInfo = $this->User->find('first', array(
				'conditions' => array(
					'contact_number' => $data['contactNumber'],
					'emergency_contact_number' => $data['temporaryCode']
				)
			));

			if (!empty($userInfo) && $userInfo) {

				echo json_encode(array('id' => $userInfo['User']['id'], 'status' => 'success'));
			}else {

				echo json_encode(array('status' => 'failed'));
			}
			die;
		}
		
		$this->set('newVissitFlag',null);
		$this->set('contactNumber', $contactNumber);
		$this->set('pageName', 'accountActivate');
	}
}

?>
