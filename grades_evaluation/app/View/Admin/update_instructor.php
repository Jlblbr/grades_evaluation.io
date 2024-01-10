<?php 
$user = isset($userData['User'])? $userData['User']: '';
$instructor = isset($userData['Instructor'])? $userData['Instructor']: '';
?>
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
										'class' => 'form'
									));
									?>
										<div class="form-body">
											<h4 class="form-section">
											<i class="ft-user"></i> Instructor Detail</h4>
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
														<label for="companyinput1">First Name</label>
														<input 
															type="text"  
															class="form-control" 
															placeholder="First Name" 
															name="data[User][firstName]"
															value="<?php echo isset($user['first_name']) && $user['first_name']? $user['first_name']: ""; ?>"
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
															value="<?php echo isset($user['middle_name']) && $user['middle_name']? $user['middle_name']: ""; ?>"
														>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="companyinput1">Last Name</label>
														<input 
															type="text"  
															class="form-control" 
															placeholder="Last Name" 
															name="data[User][lastName]"
															value="<?php echo isset($user['last_name']) && $user['last_name']? $user['last_name']: ""; ?>"
														>
													</div>
												</div>
											</div>
											
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="companyinput1">Date of Birth </label>
														<input 
															type="date" 
															class="form-control" 
															name="data[User][dateOfBirth]"
															value="<?php echo isset($instructor['date_of_birth']) && $instructor['date_of_birth']? $instructor['date_of_birth']: ""; ?>"
														>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="companyinput5">Sex</label>
														<select 
															name="data[User][sex]" 
															class="form-control"
														>
															<option 
																value="none" 
																disabled=""
																<?php echo !$instructor['sex']? "selected": ""; ?>
															>Select Sex</option>
															<option 
																value="Male"
																<?php echo isset($instructor['sex']) && $instructor['sex']=="Male"? "selected": ""; ?>
															>Male</option>
															<option 
																value="Female"
																<?php echo isset($instructor['sex']) && $instructor['sex']=="Female"? "selected": ""; ?>
															>Female</option>
														</select>
													</div>
												</div>
												
												<div class="col-md-4">
													<div class="form-group">
														<label for="companyinput1">Contact Number</label>
														<input 
															type="number" 
															class="form-control"
															placeholder="Contact Number" 
															name="data[User][contactNumber]"
															id="contactNumber"
															value="<?php echo isset($user['contact_number']) && $user['contact_number']? $user['contact_number']: ""; ?>"
														>
													</div>
												</div>
											</div>
											
											
											<div class="form-group">
												<label for="companyinput8">Address</label>
												<textarea 
													id="companyinput8" 
													rows="5" 
													class="form-control" 
													name="data[User][address]" 
													placeholder="Address"
												><?php echo isset($instructor['address']) && $instructor['address']? $instructor['address']: ""; ?></textarea>
											</div>
											
											<hr>
											
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="companyinput1">Email *</label>
														<input 
															type="email" 
															class="form-control" 
															name="data[User][email]"
															placeholder="Email"
															value="<?php echo isset($user['email']) && $user['email']? $user['email']: ""; ?>"
														>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="companyinput1">Username</label>
														<input 
															type="text" 
															class="form-control" 
															name="data[User][username]"
															placeholder="School ID"
															value="<?php echo isset($user['username']) && $user['username']? $user['username']: ""; ?>"
														>
													</div>
												</div>
											</div>
										</div>
										
										<input 
											type="hidden" 
											name="data[User][instructorID]" 
											value="<?php echo isset($instructor['id']) && $instructor['id']? $instructor['id']: ""; ?>"
										>
										<input 
											type="hidden" 
											name="data[User][id]" 
											value="<?php echo isset($user['id']) && $user['id']? $user['id']: ""; ?>"
										>
										
										<div class="form-actions right">
											<?php  
											echo $this->Html->link(
												'
												<i class="ft-x"></i> Cancel
												',
												array(
													'controller' => 'admin',
													'action' => 'instructorList'
												),
												array(
													'escape' => false,
													'class' => 'btn btn-danger mr-1'
												)
											); 
											?>
											
											<button type="submit" class="btn btn-primary">
												<i class="la la-check-square-o"></i> Save
											</button>
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