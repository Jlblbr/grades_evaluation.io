<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="app-assets/images/backgrounds/02.jpg">
	<div class="navbar-header">
		<ul class="nav navbar-nav flex-row">
			<li class="nav-item mr-auto">
				<?php 
				$active = isset($pageName) && $pageName == "createEvent" ? 'active' : '';
				$imageUrl = $this->Html->url('/img/'); 
				
				echo $this->Html->link(
					'<img class="brand-logo" alt="Chameleon admin logo" src="'.$imageUrl.'images/logo/logo.png"/>
					<h3 class="brand-text">Student</h3>',
					array(
						'controller' => 'admin',
						'action' => 'dashboard'
					),
					array(
						'escape' => false,
						'class' => 'navbar-brand'
					)
				); 
				?>
			</li>
			<li class="nav-item d-md-none">
				<a class="nav-link close-navbar">
					<i class="ft-x"></i>
				</a>
			</li>
		</ul>
	</div>
	<div class="navigation-background"></div>
	<div class="main-menu-content">
		<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
			
			<?php $active = isset($pageName) && $pageName == "dashboard" ? 'active' : ''; ?>
			<li class="nav-item <?php echo $active ?>">
				<?php
				echo $this->Html->link(
					'
					<i class="ft-home"></i>
					<span class="menu-title" data-i18n="">Dashboard</span>
					',
					array(
						'controller' => 'student',
						'action' => 'dashboard'
					),
					array(
						'escape' => false,
						'class' => 'nav-item'
					)
				); 
				?>
			</li>
			
			
		</ul>
	</div>
</div>