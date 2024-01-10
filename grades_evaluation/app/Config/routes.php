<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	//Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
	// Router::connect('/', array('controller' => 'users', 'action' => 'index'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	//Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
	// Router::connect('/dashboard', array('controller' => 'users', 'action' => 'index'));
	Router::connect('/', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));
	
	Router::connect('/admin/dashboard', array('controller' => 'admin', 'action' => 'dashboard'));
	
	// - student
	Router::connect('/admin/student/add', array('controller' => 'admin', 'action' => 'addStudent'));
	Router::connect('/admin/student/update/*', array('controller' => 'admin', 'action' => 'updateStudent'));
	Router::connect('/admin/student/list/*', array('controller' => 'admin', 'action' => 'studentList'));
	Router::connect('/admin/student/delete/*', array('controller' => 'admin', 'action' => 'deleteStudent'));
	
	Router::connect('/admin/instructor/list/*', array('controller' => 'admin', 'action' => 'instructorList'));
	Router::connect('/admin/instructor/add', array('controller' => 'admin', 'action' => 'addInstructor'));
	Router::connect('/admin/instructor/update/*', array('controller' => 'admin', 'action' => 'updateInstructor'));
	Router::connect('/admin/instructor/delete/*', array('controller' => 'admin', 'action' => 'deleteInstructor'));
	Router::connect('/admin/instructor/assign/*', array('controller' => 'admin', 'action' => 'assignSubject'));
	
	Router::connect('/admin/staff/list/*', array('controller' => 'admin', 'action' => 'staffList'));
	Router::connect('/admin/staff/add', array('controller' => 'admin', 'action' => 'addStaff'));
	Router::connect('/admin/staff/update/*', array('controller' => 'admin', 'action' => 'updateStaff'));
	Router::connect('/admin/staff/delete/*', array('controller' => 'admin', 'action' => 'deleteStaff'));
	
	Router::connect('/admin/subject/list/*', array('controller' => 'admin', 'action' => 'subjectList'));
	Router::connect('/admin/subject/add', array('controller' => 'admin', 'action' => 'addSubject'));
	Router::connect('/admin/subject/update/*', array('controller' => 'admin', 'action' => 'updateSubject'));
	Router::connect('/admin/subject/delete/*', array('controller' => 'admin', 'action' => 'deleteSubject'));
	 
	Router::connect('/admin/update/profile', array('controller' => 'admin', 'action' => 'updateProfile'));
	Router::connect('/admin/update/password', array('controller' => 'admin', 'action' => 'updatePassword'));
	
	
	Router::connect('/instructor/dashboard', array('controller' => 'instructor', 'action' => 'dashboard'));
	Router::connect('/instructor/update/profile', array('controller' => 'instructor', 'action' => 'updateProfile'));
	Router::connect('/instructor/update/password', array('controller' => 'instructor', 'action' => 'updatePassword'));
	
	
	Router::connect('/staff/dashboard', array('controller' => 'staff', 'action' => 'dashboard'));
	Router::connect('/staff/update/profile', array('controller' => 'staff', 'action' => 'updateProfile'));
	Router::connect('/staff/update/password', array('controller' => 'staff', 'action' => 'updatePassword'));
	Router::connect('/staff/interviewRubric/*', array('controller' => 'staff', 'action' => 'interviewRubric'));
	Router::connect('/staff/examination/*', array('controller' => 'staff', 'action' => 'examination'));
	Router::connect('/staff/gpa/*', array('controller' => 'staff', 'action' => 'gpa'));
	Router::connect('/staff/student-profile/*', array('controller' => 'staff', 'action' => 'studentProfile'));
	
	Router::connect('/student/dashboard', array('controller' => 'student', 'action' => 'dashboard'));
	Router::connect('/student/update/profile', array('controller' => 'student', 'action' => 'updateProfile'));
	Router::connect('/student/update/password', array('controller' => 'student', 'action' => 'updatePassword'));
	
	
	Router::connect('/forgot-password', array('controller' => 'forgotPassword', 'action' => 'index'));
	Router::connect('/reset-password/*', array('controller' => 'forgotPassword', 'action' => 'resetPassword'));
	
	// - api
	Router::connect('/api/login', array('controller' => 'api', 'action' => 'login'));
	Router::connect('/api/logout', array('controller' => 'api', 'action' => 'logout'));
/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
