<?php
App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel {
	
	public $avatarUploadDir = 'img/avatars';
    
	public $validate = array(
        'username' => array(
            
			'between' => array( 
				'rule' => array('between', 5, 15), 
				'required' => true, 
				'message' => 'Usernames must be between 5 to 15 characters'
			),
			 'unique' => array(
				'rule'    => array('isUniqueUsername'),
				'message' => 'This username is already in use'
			),
			'unique_username' => array(
				'rule' => array('isUnique', 'username'),
				'message' => 'This username is already in use.'
			),
			'alphaNumericDashUnderscore' => array(
				'rule'    => array('alphaNumericDashUnderscore'),
				'message' => 'Username can only be letters, numbers and underscores'
			),
        ),
		
		'contact_number' => array(
			'unique' => array(
				'rule'    => array('isUniqueContactNumber'),
				'message' => 'This Contact Number is already in use'
			)
		),
		
        'password' => array(
			'min_length' => array(
				'rule' => array('minLength', '6'),  
				'message' => 'Password must have a mimimum of 6 characters'
			)
        ),
		
		'password_confirm' => array(
			 'equaltofield' => array(
				'rule' => array('equaltofield','password'),
				'message' => 'Both passwords must match.'
			)
        ),
		
		// 'email' => array(
		// 	'required' => array(
		// 		'rule' => array('email', true),    
		// 		'message' => 'Please provide a valid email address.'    
		// 	),
		// 	 'unique' => array(
		// 		'rule'    => array('isUniqueEmail'),
		// 		'message' => 'This email is already in use',
		// 	),
		// 	'between' => array( 
		// 		'rule' => array('between', 6, 60), 
		// 		'message' => 'Usernames must be between 6 to 60 characters'
		// 	)
		// ),
		
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('Admin', 'Staff', 'Student', 'Instructor')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        ),
		
		
		'password_update' => array(
			'min_length' => array(
				'rule' => array('minLength', '6'),   
				'message' => 'Password must have a mimimum of 6 characters',
				'allowEmpty' => true,
				'required' => false
			)
        ),
		'password_confirm_update' => array(
			 'equaltofield' => array(
				'rule' => array('equaltofield','password_update'),
				'message' => 'Both passwords must match.',
				'required' => false,
			)
        )

		
    );
	
		/**
	 * Before isUniqueUsername
	 * @param array $options
	 * @return boolean
	 */
	function isUniqueUsername($check) {

		$username = $this->find(
			'first',
			array(
				'fields' => array(
					'User.id',
					'User.username'
				),
				'conditions' => array(
					'User.username' => $check['username']
				)
			)
		);

		if(!empty($username)){
			if(isset($this->data[$this->alias]['id']) && $this->data[$this->alias]['id'] == $username['User']['id']){
				return true; 
			}else{
				return false; 
			}
		}else{
			return true; 
		}
    }
	
	function isUniqueContactNumber($check) {

		$contactNumber = $this->find(
			'first',
			array(
				'fields' => array(
					'User.id',
					'User.contact_number'
				),
				'conditions' => array(
					'User.contact_number' => $check['contact_number']
				)
			)
		);

		if(!empty($contactNumber)){
			if(isset($this->data[$this->alias]['id']) && $this->data[$this->alias]['id'] == $contactNumber['User']['id']){
				return true; 
			}else{
				return false; 
			}
		}else{
			return true; 
		}
    }

	/**
	 * Before isUniqueEmail
	 * @param array $options
	 * @return boolean
	 */
	function isUniqueEmail($check) {

		$email = $this->find(
			'first',
			array(
				'fields' => array(
					'User.id'
				),
				'conditions' => array(
					'User.email' => $check['email']
				)
			)
		);

		if(!empty($email)){
			if(isset($this->data[$this->alias]['id']) && $this->data[$this->alias]['id'] == $email['User']['id']){
				return true; 
			}else{
				return false; 
			}
		}else{
			return true; 
		}
    }
	
	public function alphaNumericDashUnderscore($check) {
        // $data array is passed using the form field name as the key
        // have to extract the value to make the function generic
        $value = array_values($check);
        $value = $value[0];

        return preg_match('/^[a-zA-Z0-9_ \-]*$/', $value);
    }
	
	public function equaltofield($check,$otherfield) 
    { 
        //get name of field 
        $fname = ''; 
        foreach ($check as $key => $value){ 
            $fname = $key; 
            break; 
        } 
        return $this->data[$this->name][$otherfield] === $this->data[$this->name][$fname]; 
    } 

	/**
	 * Before Save
	 * @param array $options
	 * @return boolean
	 */
	 public function beforeSave($options = array()) {
		// hash our password
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		
		// if we get a new password, hash it
		if (isset($this->data[$this->alias]['password_update'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password_update']);
		}
	
		// fallback to our parent
		return parent::beforeSave($options);
	}
	
	
	public function getInstructorData($userID = null){
		$conditions = array(
			'User.id' => $userID
		);
		$fields = array(
			'User.id',
			'User.first_name',
			'User.middle_name',
			'User.last_name',
			'User.email',
			'User.username',
			'User.contact_number',
			'Instructor.id',
			'Instructor.date_of_birth',
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
		
		$userData = $this->find('first', array(
			'fields' => $fields,
			'conditions' => $conditions,
			'joins' => $joins
		));
		
		return $userData;
	}
	
	public function getAllInstructorData(){
		$fields = array(
			'User.id',
			'User.first_name',
			'User.middle_name',
			'User.last_name',
			'User.email',
			'User.username',
			'User.contact_number',
			'Instructor.id',
			'Instructor.date_of_birth',
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
		
		$userData = $this->find('all', array(
			'fields' => $fields,
			'joins' => $joins
		));
		
		return $userData;
	}
	
	public function getStaffData($userID = null){
		$conditions = array(
			'User.id' => $userID
		);
		$fields = array(
			'User.id',
			'User.first_name',
			'User.middle_name',
			'User.last_name',
			'User.email',
			'User.username',
			'User.contact_number',
			'Staff.id',
			'Staff.date_of_birth',
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
		
		$userData = $this->find('first', array(
			'fields' => $fields,
			'conditions' => $conditions,
			'joins' => $joins
		));
		
		return $userData;
	}
	
	public function getStudentData($userID = null){
		$conditions = array(
			'User.id' => $userID
		);
		$fields = array(
			'User.id',
			'User.first_name',
			'User.middle_name',
			'User.last_name',
			'User.email',
			'User.username',
			'User.contact_number',
			'Student.id',
			'Student.school_id',
			'Student.date_of_birth',
			'Student.sex',
			'Student.profile_image_name',
			'Student.address',
			'Student.course'
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
		
		$userData = $this->find('first', array(
			'fields' => $fields,
			'conditions' => $conditions,
			'joins' => $joins
		));
		
		return $userData;
	}
}

?>