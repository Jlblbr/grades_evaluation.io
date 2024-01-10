<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="app-assets/images/backgrounds/02.jpg">
	<div class="navbar-header">
		<ul class="nav navbar-nav flex-row">
			<li class="nav-item mr-auto">
				<?php 
				$active = isset($pageName) && $pageName == "createEvent" ? 'active' : '';
				$imageUrl = $this->Html->url('/img/'); 
				
				echo $this->Html->link(
					'<img class="brand-logo" alt="Chameleon admin logo" src="'.$imageUrl.'images/logo/logo.png"/>
					<h3 class="brand-text">Chameleon</h3>',
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
						'controller' => 'admin',
						'action' => 'dashboard'
					),
					array(
						'escape' => false,
						'class' => 'nav-item'
					)
				); 
				?>
			</li>
			
			<li class=" nav-item <?php echo isset($pageName) && $pageName == "subject" ? 'has-sub open' : ''; ?>">
				<a href="#">
					<i class="ft-layers"></i>
					<span class="menu-title" data-i18n="">Subject</span>
				</a>
				<ul class="menu-content">
					<li class="<?php echo isset($subPageName) && $subPageName == "subjectList" ? 'active' : ''; ?>">
						<?php 
						echo $this->Html->link(
							'Subject List',
							array(
								'controller' => 'admin',
								'action' => 'subjectList',
							),
							array(
								'escape' => false,
								'class' => 'menu-item'
							)
						);
						?>
					</li>
					<li class="<?php echo isset($subPageName) && $subPageName == "addSubject" ? 'active' : ''; ?>">
						<?php 
						echo $this->Html->link(
							'Add Subject',
							array(
								'controller' => 'admin',
								'action' => 'addSubject',
							),
							array(
								'escape' => false,
								'class' => 'menu-item'
							)
						);
						?>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</div>