<!DOCTYPE html>
<!-- =========================================================
    * Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
    ==============================================================
    
    * Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
    * Created by: ThemeSelection
    * License: You must have a valid license purchased in order to legally use the theme for your project.
    * Copyright ThemeSelection (https://themeselection.com)
    
    =========================================================
     -->
<!-- beautify ignore:start -->
<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="assets/"
    data-template="vertical-menu-template-free"
    >
    <head>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
            />
        <title>Church</title>
        <meta name="description" content="" />
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"/>

		<!-- css libraries -->
	    <?php
	    echo $this->Html->css(array(
	        'assets/vendor/fonts/boxicons.css',
	        'assets/vendor/css/core.css',
	        'assets/vendor/css/theme-default.css',
	    	'assets/css/demo.css',
			'assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css',
			'assets/vendor/libs/apex-charts/apex-charts.css',
            'assets/vendor/css/pages/page-auth.css'
	    ));
        echo $this->Html->script(array(
            'assets/vendor/js/helpers.js',
            'assets/js/config.js',
            'assets/vendor/libs/jquery/jquery.js',
			'assets/vendor/libs/popper/popper.js',
            'assets/vendor/js/bootstrap.js',
            'assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js',
            'assets/vendor/libs/apex-charts/apexcharts.js',
            'assets/vendor/libs/apex-charts/apexcharts.js',
            'assets/js/dashboards-analytics.js',
			'html2canvas.min.js',
			'jspdf.umd.js'
        ));
        echo $this->fetch('script');
        
		echo $this->Html->meta('icon');
	    echo $this->fetch('meta');
	    echo $this->fetch('css');
		?>
        <!-- css libraries -->
        
		<script async defer src="https://buttons.github.io/buttons.js"></script>
    </head>
    <body>
		<!-- content -->
		<div class="layout-wrapper layout-content-navbar <?php echo ($this->params['controller'] == 'admin')? : 'layout-without-menu'; ?>">
		    <div class="layout-container">
				<!-- Menu -->
				<?php if ((isset($role) && $role == 'Admin')): ?>
					<?php echo $this->element('sneat/admin');?>
				<?php elseif ((isset($role) && $role == 'Staff')): ?>
					<?php echo $this->element('sneat/staff');?>
				<?php elseif ((isset($role) && $role == 'Priest')): ?>
					<?php echo $this->element('sneat/priest');?>
				<?php endif; ?>
				<!-- / Menu -->
				
		        <!-- Layout container -->
		        <div class="layout-page">
		           
                    <?php echo $this->fetch('content'); ?>
		        </div>
		        <!-- / Layout page -->
		    </div>
		</div>
    </body>
    
    <?php  
    if ($this->params['controller'] == 'admin') {
        echo $this->Html->script(array(
            'menu.js',
            'assets/js/main.js',
			'assets/js/ui-toasts.js',
        ));
        
        echo $this->fetch('script');
    }
    ?>
</html>
