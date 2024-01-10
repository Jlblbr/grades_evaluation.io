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
									<div class="card-text">
										<!-- <p>This is the most basic and default form having form section.</p> -->
									</div>
									<?php
									echo $this->Form->create('User', array(
										'class' => 'form',
										'id' => 'form'
									));
									?>
										<div class="form-body">
											<h4 class="form-section">
											<i class="ft-user"></i> Staff Detail</h4>
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
											<?php if (isset($this->validationErrors['User']['password'][0]) &&  $this->validationErrors['User']['password'][0]): ?>
												<div class="alert alert-danger alert-dismissible mb-2" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">×</span>
													</button>
													<strong><?php echo isset($this->validationErrors['User']['password'][0])? $this->validationErrors['User']['password'][0]: ''; ?></strong> 
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

											<?php if (isset($this->validationErrors['User']['role'][0]) && $this->validationErrors['User']['role'][0]): ?>
												<div class="alert alert-danger alert-dismissible mb-2" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">×</span>
													</button>
													<strong><?php echo isset($this->validationErrors['User']['role'][0])? $this->validationErrors['User']['role'][0]: ''; ?></strong> 
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
														>
													</div>
												</div>
											</div>
											
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="companyinput1">Date of Birth *</label>
														<input 
															type="date" 
															class="form-control" 
															name="data[User][dateOfBirth]"
															required
														>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="companyinput5">Sex *</label>
														<select 
															name="data[User][sex]" 
															class="form-control"
														>
															<option value="none" selected="" disabled="">Select Sex</option>
															<option value="Male">Male</option>
															<option value="Female">Female</option>
														</select>
													</div>
												</div>
												
												<div class="col-md-4">
													<div class="form-group">
														<label for="companyinput1">Contact Number *</label>
														<input 
															type="number" 
															class="form-control"
															placeholder="Contact Number" 
															name="data[User][contactNumber]"
															id="contactNumber"
															required
														>
													</div>
												</div>
											</div>
											
											
											<div class="form-group">
												<label for="companyinput8">Address *</label>
												<textarea 
													id="companyinput8" 
													rows="5" 
													class="form-control" 
													name="data[User][address]" 
													placeholder="Address"
													required
												></textarea>
											</div>
											
											<hr>
											
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="companyinput1">Email</label>
														<input 
															type="email" 
															class="form-control" 
															name="data[User][email]"
															placeholder="Email"
															required
														>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="companyinput1">Username *</label>
														<input 
															type="text" 
															class="form-control" 
															name="data[User][username]"
															placeholder="Username"
															required
														>
													</div>
												</div>
											</div>
											
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="companyinput1">Password *</label>
														<input 
															type="password" 
															class="form-control" 
															name="data[User][password]"
															placeholder="Password"
															required
														>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="companyinput1">Confirm Password *</label>
														<input 
															type="password" 
															class="form-control" 
															name="data[User][confirmPassword]"
															placeholder="Confirm Password"
															required
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