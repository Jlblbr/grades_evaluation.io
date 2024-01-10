<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-wrapper-before"></div>
		<div class="content-header row">
		</div>
		<div class="content-body">
			
			<section class="flexbox-container">
				<div class="col-12 d-flex align-items-center justify-content-center">
					<div class="col-lg-4 col-md-6 col-10 box-shadow-2 p-0">
						<div class="card border-grey border-lighten-3 px-2 py-2 m-0">
							<div class="card-header border-0 text-center">
								<!-- <img src="../../../app-assets/images/portrait/small/avatar-s-1.png" alt="unlock-user" class="rounded-circle img-fluid center-block"> -->
								<h5 class="card-title mt-1">John Doe</h5>
							</div>
							<p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2">
								<span>Unlock your account</span>
							</p>
							<div class="card-content">
								
								<!-- alert -->
								<?php echo $this->Session->flash('login'); ?>
								
								<?php if (isset($this->validationErrors['User']['username'][0]) && $this->validationErrors['User']['username'][0]): ?>
									<div class="alert alert-danger alert-dismissible mb-2" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
										<strong><?php echo isset($this->validationErrors['User']['username'][0])? $this->validationErrors['User']['username'][0]: ''; ?></strong> 
									</div>
								<?php endif; ?>
								<?php if (isset($this->validationErrors['User']['password_confirm'][0]) && $this->validationErrors['User']['password_confirm'][0]): ?>
									<div class="alert alert-danger alert-dismissible mb-2" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
										<strong><?php echo isset($this->validationErrors['User']['password_confirm'][0])? $this->validationErrors['User']['password_confirm'][0]: ''; ?></strong> 
									</div>
								<?php endif; ?>

								<?php if (isset($this->validationErrors['User']['contact_number'][0]) && $this->validationErrors['User']['contact_number'][0]): ?>
									<div class="alert alert-danger alert-dismissible mb-2" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
										<strong><?php echo isset($this->validationErrors['User']['contact_number'][0])? $this->validationErrors['User']['contact_number'][0]: ''; ?></strong> 
									</div>
								<?php endif; ?>
								
								<div class="card-body">
									<?php
									echo $this->Form->create('User', array(
										'class' => 'form-horizontal'
									));
									?>
										<input 
											type="hidden" 
											class="form-control" 
											name="data[User][username]"
											placeholder="School ID"
											required
											value="<?php echo isset($userCurrentData['username']) && $userCurrentData['username']? $userCurrentData['username']: ""; ?>"
										>
										
										<input 
											type="hidden" 
											class="form-control" 
											name="data[User][id]"
											placeholder="School ID"
											required
											value="<?php echo isset($userCurrentData['id']) && $userCurrentData['id']? $userCurrentData['id']: ""; ?>"
										>
									
										<fieldset class="form-group position-relative has-icon-left">
											<input 
												type="password" 
												class="form-control round" 
												id="password" 
												placeholder="Enter Password"
												name="data[User][password]"
												required
												 >
											<div class="form-control-position">
												<i class="la la-key"></i>
											</div>
										</fieldset>
										
										<fieldset class="form-group position-relative has-icon-left">
											<input 
												type="password" 
												class="form-control round" 
												id="password" 
												placeholder="Enter Confirm Password" 
												name="data[User][confirmPassword]"
												required
											>
											<div class="form-control-position">
												<i class="la la-key"></i>
											</div>
										</fieldset>
										
										<div class="form-group row">
											<div class="col-12 float-sm-left text-center text-sm-right">
												<!-- <a href="recover-password.html" class="card-link">
												<i class="ft-unlock"></i> Forgot Password?</a> -->
											</div>
										</div>
										
										<div class="form-group text-center">
											<button type="submit" class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1">Reset</button>
										</div>
										<!-- <div class="col-12 float-sm-left text-center text-sm-center mt-2">Or
											<a href="login.html" class="card-link"> Logout</a> from this system
										</div> -->
									<?php
									echo $this->Form->end();
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>