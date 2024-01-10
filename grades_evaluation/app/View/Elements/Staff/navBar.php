<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
	<div class="navbar-wrapper">
		<div class="navbar-container content">
			<div class="collapse navbar-collapse show" id="navbar-mobile">
				<ul class="nav navbar-nav mr-auto float-left">
					<li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
					<li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
					<li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
					<li class="nav-item dropdown navbar-search">
						<a class="nav-link dropdown-toggle hide" data-toggle="dropdown" href="#"><i class="ficon ft-search"></i></a>
						<ul class="dropdown-menu">
							<li class="arrow_box">
								<form>
									<div class="input-group search-box">
										<div class="position-relative has-icon-right full-width">
											<input class="form-control" id="search" type="text" placeholder="Search here...">
											<div class="form-control-position navbar-search-close"><i class="ft-x"></i></div>
										</div>
									</div>
								</form>
							</li>
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav float-right">
					<li class="dropdown dropdown-user nav-item">
						<a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
							<span class="avatar avatar-online">
								<?php 
								$imageUrl = $this->Html->url('/img/'); 
								?>
								<img src="<?php echo $imageUrl; ?>default_student.png" alt="avatar">
							</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<div class="arrow_box_right">
								<a class="dropdown-item" href="#">
									<span class="avatar avatar-online">
										<img src="<?php echo $imageUrl; ?>default_user.png" alt="avatar">
									</span>
									<?php 
									$fullName = "";
									$fullName .= isset($userData['first_name']) && $userData['first_name']? $userData['first_name']: '';
									$fullName .= " ";
									$fullName .= isset($userData['middle_name']) && $userData['middle_name']? $userData['middle_name']: '';
									$fullName .= " ";
									$fullName .= isset($userData['last_name']) && $userData['last_name']? $userData['last_name']: '';
									
									?>
									<span class="user-name text-bold-700 ml-1"><?php echo $fullName; ?></span>
								</a>
								<div class="dropdown-divider"></div>  
								<?php 
								echo $this->Html->link(
									'<i class="ft-user"></i> 
									Edit Profile',
									array(
										'controller' => 'staff',
										'action' => 'updateProfile',
									),
									array(
										'escape' => false,
										'class' => 'dropdown-item'
									)
								);
								
								echo $this->Html->link(
									'<i class="ft-shield"></i> 
									Change Password',
									array(
										'controller' => 'staff',
										'action' => 'updatePassword',
									),
									array(
										'escape' => false,
										'class' => 'dropdown-item'
									)
								);
								
								?>
								
								<div class="dropdown-divider"></div>
								<?php 
								echo $this->Html->link(
									'<i class="ft-log-out"></i> 
									Logout',
									array(
										'controller' => 'users',
										'action' => 'logout'
									),
									array(
										'escape' => false,
										'class' => 'dropdown-item'
									)
								);
								?>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>