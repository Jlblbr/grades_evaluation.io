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

$cakeDescription = __d('cake_dev', 'Women Safety System with Real-Time GPS Location2');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	
	<style media="screen">
	#debug-kit-toolbar{
		display: none !important;
	}
	</style>
	
	<!-- meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
	<meta name="description" content="Suha - Multipurpose Ecommerce Mobile HTML Template">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="theme-color" content="#100DD1">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">

	<!-- font -->
	<!-- <link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"> -->

	<!-- Favicon-->
	<!-- <link rel="icon" href="img/icons/icon-72x72.png"> -->

	<!-- Apple Touch Icon-->
   <!--  <link rel="apple-touch-icon" href="img/icons/icon-96x96.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/icons/icon-152x152.png">
    <link rel="apple-touch-icon" sizes="167x167" href="img/icons/icon-167x167.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/icons/icon-180x180.png"> -->

    <!-- css libraries -->
    <?php  
    echo $this->Html->css(array(
		'fonts/icomoon/style.css',
		'fullcalendar/packages/core/main.css',
		'fullcalendar/packages/daygrid/main.css',
		'bootstrap.min.css',
        'style.css'
    ));
	
	echo $this->Html->script(array(
		'jquery-3.3.1.min.js',
		'popper.min.js',
		'bootstrap.min.js',
		'fullcalendar/packages/core/main.js',
		'fullcalendar/packages/interaction/main.js',
		'fullcalendar/packages/daygrid/main.js',
		'fullcalendar/packages/timegrid/main.js',
		'fullcalendar/packages/list/main.js',
		'main.js'
	));
	
    ?>
	
    <!-- All JavaScript Files-->
    

    <?php
    echo $this->Html->meta('icon');

    echo $this->fetch('meta');
    echo $this->fetch('css');

    ?>
	<script type="text/javascript">
	$('#menu-hider').removeClass('menu-active');
	$('.menu-hider').removeClass('menu-active');
	</script>
</head>
<body>
	<div id="page">
		<?php echo $this->fetch('content'); ?>
	</div>
</body>
</html>
<?php  


echo $this->fetch('script');
?>


