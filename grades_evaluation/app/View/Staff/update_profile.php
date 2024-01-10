<!--Content-->
<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-wrapper-before"></div>
		<div class="content-header row">
		</div>
		<div class="content-body">
			<section id="basic-form-layouts">
				<div class="row match-height">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<!-- <h4 class="card-title" id="basic-layout-form">Simple Form</h4> -->
								<a class="heading-elements-toggle">
									<i class="la la-ellipsis-v font-medium-3"></i>
								</a>
								<div class="heading-elements">
									<ul class="list-inline mb-0">
										<!-- <li>
											<a data-action="collapse">
												<i class="ft-minus"></i>
											</a>
										</li>
										<li>
											<a data-action="reload">
												<i class="ft-rotate-cw"></i>
											</a>
										</li> -->
										<li>
											<a data-action="expand">
												<i class="ft-maximize"></i>
											</a>
										</li>
										<!-- <li>
											<a data-action="close">
												<i class="ft-x"></i>
											</a>
										</li> -->
									</ul>
								</div>
							</div>
							<div class="card-content collapse show">
								<div class="card-body">
									<?php
									echo $this->Form->create('User', array(
										'class' => 'form',
										'id' => 'form'
									));
									?>
										<div class="form-body">
											<h4 class="form-section">
											<i class="ft-user"></i>Edit Profile</h4>
											<!-- alert -->
											<?php echo $this->Session->flash('save'); ?>
											
											<?php if (isset($this->validationErrors['User']['email'][0]) && $this->validationErrors['User']['email'][0]): ?>
												<div class="alert alert-danger alert-dismissible mb-2" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">×</span>
													</button>
													<strong><?php echo isset($this->validationErrors['User']['email'][0])? $this->validationErrors['User']['email'][0]: ''; ?></strong> 
												</div>
											<?php endif; ?>
											<?php if (isset($this->validationErrors['User']['username'][0]) && $this->validationErrors['User']['username'][0]): ?>
												<div class="alert alert-danger alert-dismissible mb-2" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">×</span>
													</button>
													<strong><?php echo isset($this->validationErrors['User']['username'][0])? $this->validationErrors['User']['username'][0]: ''; ?></strong> 
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
											
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="companyinput1">First Name *</label>
														<input 
															type="text"  
															class="form-control" 
															placeholder="First Name" 
															name="data[User][firstName]"
															required
															value="<?php echo isset($userCurrentData['first_name']) && $userCurrentData['first_name']? $userCurrentData['first_name']: ""; ?>"
														>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="companyinput1">Middle Name</label>
														<input 
															type="text"  
															class="form-control" 
															placeholder="Middle Name" 
															name="data[User][middleName]"
															value="<?php echo isset($userCurrentData['middle_name']) && $userCurrentData['middle_name']? $userCurrentData['middle_name']: ""; ?>"
														>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="companyinput1">Last Name *</label>
														<input 
															type="text"  
															class="form-control" 
															placeholder="Last Name" 
															name="data[User][lastName]"
															required
															value="<?php echo isset($userCurrentData['last_name']) && $userCurrentData['last_name']? $userCurrentData['last_name']: ""; ?>"
														>
													</div>
												</div>
											</div>
											
											<hr>
											
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="companyinput1">Contact Number *</label>
														<input 
															type="number" 
															class="form-control"
															placeholder="Contact Number" 
															name="data[User][contactNumber]"
															id="contactNumber"
															value="<?php echo isset($userCurrentData['contact_number']) && $userCurrentData['contact_number']? $userCurrentData['contact_number']: ""; ?>"
														>
													</div>
												</div>
												
												<div class="col-md-4">
													<div class="form-group">
														<label for="companyinput1">Email *</label>
														<input 
															type="email"  
															class="form-control" 
															placeholder="Last Name" 
															name="data[User][email]"
															required
															value="<?php echo isset($userCurrentData['email']) && $userCurrentData['email']? $userCurrentData['email']: ""; ?>"
														>
													</div>
												</div>
												
												<div class="col-md-4">
													<div class="form-group">
														<label for="companyinput1">Username *</label>
														<input 
															type="text" 
															class="form-control" 
															name="data[User][username]"
															placeholder="School ID"
															required
															value="<?php echo isset($userCurrentData['username']) && $userCurrentData['username']? $userCurrentData['username']: ""; ?>"
														>
													</div>
												</div>
											</div>
										</div>
										
										<div class="form-actions right">
											<?php  
											echo $this->Html->link(
												'
												<i class="ft-x"></i> Cancel
												',
												array(
													'controller' => 'admin',
													'action' => 'staffList'
												),
												array(
													'escape' => false,
													'class' => 'btn btn-danger mr-1',
													'id' => 'btn-cancel'
												)
											); 
											?>
											
											<button type="submit" id="btn-submit" class="btn btn-primary">
												<i class="la la-check-square-o"></i> Save
											</button>
											<button class="btn btn-primary btn-hide" id="btn-loader" type="button" disabled="">
												<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
												Loading...
											</div>
										</div>
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
<script type="text/javascript">
$(document).ready(function () {
	$('#form').submit(function (e) {
		e.preventDefault(); // Prevent the form from submitting normally
		
		$('#btn-cancel').addClass('btn-hide');
		$('#btn-submit').addClass('btn-hide');
		$('#btn-loader').removeClass('btn-hide');
		
		this.submit();
	});
});
</script>