<?php
/**
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
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'EVSU');
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
	<head>
		<?php echo $this->Html->charset(); ?>
		<title>
			<?php echo $cakeDescription ?>:
			<?php echo $title_for_layout; ?>
		</title>
		
		<!-- meta -->
		<meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <title>Dashboard - Analytics | Materio - Bootstrap Material Design Admin Template</title>
        <meta name="description" content="" />

		<!-- font -->
		<!-- <link rel="preconnect" href="https://fonts.gstatic.com">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"> -->

		<!-- Favicon-->
		<!-- <link rel="icon" href="img/icons/icon-72x72.png"> -->

		<!-- Apple Touch Icon-->
		<!-- <link rel="apple-touch-icon" href="img/icons/icon-96x96.png">
		<link rel="apple-touch-icon" sizes="152x152" href="img/icons/icon-152x152.png">
		<link rel="apple-touch-icon" sizes="167x167" href="img/icons/icon-167x167.png">
		<link rel="apple-touch-icon" sizes="180x180" href="img/icons/icon-180x180.png"> -->
		
		<link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
		  
		<!-- css libraries -->
		<?php
		if (isset($functionName) && $functionName == 'login') {
			echo $this->Html->css(array(
				'app-assets/vendors/css/vendors.min.css',
				'app-assets/vendors/css/forms/toggle/switchery.min.css',
				'app-assets/css/plugins/forms/switch.min.css',
				'app-assets/css/core/colors/palette-switch.min.css',
				'app-assets/css/bootstrap.min.css',
				'app-assets/css/bootstrap-extended.min.css',
				'app-assets/css/colors.min.css',
				'app-assets/css/components.min.css',
				'app-assets/css/core/menu/menu-types/horizontal-menu.min.css',
				'app-assets/css/core/colors/palette-gradient.min.css',
				'app-assets/css/pages/login-register.min.css',
				'assets/css/style.css'
			));
			
			echo $this->Html->script(array(
				'app-assets/vendors/js/vendors.min.js',
				'app-assets/vendors/js/forms/toggle/switchery.min.js',
				'app-assets/js/scripts/forms/switch.min.js',
				'app-assets/vendors/js/ui/jquery.sticky.js',
				'app-assets/vendors/js/forms/validation/jqBootstrapValidation.js',
				'app-assets/js/core/app-menu.min.js',
				'app-assets/js/core/app.min.js',
				'app-assets/js/scripts/forms/form-login-register.min.js',
			));
			
		} elseif (isset($functionName) && $functionName == 'forgotPaassword-index') {
			// code...
		} else {
			echo $this->Html->css(array(
				'app-assets/vendors/css/vendors.min.css',
				'app-assets/vendors/css/forms/toggle/switchery.min.css',
				'app-assets/css/plugins/forms/switch.min.css',
				'app-assets/css/core/colors/palette-switch.min.css',
				'app-assets/vendors/css/timeline/vertical-timeline.css',
				
				'app-assets/vendors/css/forms/selects/select2.min.css',
				'app-assets/vendors/css/charts/chartist.css',
				'app-assets/vendors/css/charts/chartist-plugin-tooltip.css',
				'app-assets/css/bootstrap.min.css',
				'app-assets/css/bootstrap-extended.min.css',
				'app-assets/css/colors.min.css',
				'app-assets/css/components.min.css',
				
				'app-assets/css/core/menu/menu-types/vertical-menu.min.css',
				'app-assets/css/core/colors/palette-gradient.min.css',
				'app-assets/css/pages/chat-application.css',
				'app-assets/css/pages/dashboard-analytics.min.css',
				'app-assets/css/pages/users.min.css',
				'app-assets/css/pages/timeline.min.css',
				'assets/css/style.css'
			));
			
			echo $this->Html->script(array(
				'jquery.min.js',
				'app-assets/vendors/js/forms/select/select2.full.min.js',
				'app-assets/js/scripts/forms/select/form-select2.min.js'
			));
		}
		
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		?>
		
		<style media="screen">
		.btn-hide {
			display: none;
		}
		</style>
	</head>
	<?php if (isset($functionName) && $functionName == 'login'): ?>
		<body class="horizontal-layout horizontal-menu 1-column  bg-full-screen-image blank-page blank-page" data-open="hover" data-menu="horizontal-menu" data-color="bg-gradient-x-purple-blue" data-col="1-column">
			<?php echo $this->fetch('content'); ?>
	<?php else: ?>
		<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">
		
			<!--Header-->
			<?php echo $this->element($this->request->params['controller'].'/navBar');?>
			
			<!--Main Menu-->
			<?php echo $this->element($this->request->params['controller'].'/sideBar');?>
			
			<!--Content-->
			<?php echo $this->fetch('content'); ?>
			
			<!--Footer-->
			<?php echo $this->element($this->request->params['controller'].'/footer');?>
	<?php endif; ?>
		
	</body>
</html>

<?php
if (isset($functionName) && $functionName == 'login') {
	// - do nothing
} else {
	echo $this->Html->script(array(
		'app-assets/vendors/js/vendors.min.js',
		'app-assets/vendors/js/forms/toggle/switchery.min.js',
		'app-assets/js/scripts/forms/switch.min.js',
		'app-assets/vendors/js/charts/chartist.min.js',
		'app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js',
		'app-assets/js/core/app-menu.min.js',
		'app-assets/js/core/app.min.js',
		'app-assets/js/scripts/customizer.min.js',
		'app-assets/vendors/js/jquery.sharrre.js',
		'app-assets/js/scripts/pages/dashboard-analytics.min.js'
	));
}
?>
