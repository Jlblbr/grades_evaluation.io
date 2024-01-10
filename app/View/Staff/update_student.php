<?php 
$user = isset($userData['User'])? $userData['User']: '';
$student = isset($userData['Student'])? $userData['Student']: '';
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
										'class' => 'form',
										'id' => 'form'
									));
									?>
										<div class="form-body">
											<h4 class="form-section">
											<i class="ft-user"></i> Student Detail</h4>
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
															name="data[StudentInfo][firstName]"
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
															name="data[StudentInfo][middleName]"
															value="<?php echo isset($user['middle_name']) && $user['middle_name']? $user['middle_name']: ""; ?>"
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
															name="data[StudentInfo][lastName]"
															value="<?php echo isset($user['last_name']) && $user['last_name']? $user['last_name']: ""; ?>"
														>
													</div>
												</div>
											</div>
											
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="companyinput1">Date of Registration *</label>
														<input 
															type="date" 
															class="form-control" 
															name="data[StudentInfo][dateOfBirth]"
															value="<?php echo isset($student['date_of_birth']) && $student['date_of_birth']? $student['date_of_birth']: ""; ?>"
														>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="companyinput5">Department *</label>
														<select 
															name="data[StudentInfo][sex]" 
															class="form-control"
														>
															<option 
																value="none" 
																disabled=""
																<?php echo !$student['sex']? "selected": ""; ?>
															>Select Department</option>
															<option 
																value="Education"
																<?php echo isset($student['sex']) && $student['sex']=="Education"? "selected": ""; ?>
															>Education</option>
															<option 
																value="Engineering"
																<?php echo isset($student['sex']) && $student['sex']=="Engineering"? "selected": ""; ?>
															>Engineering</option>
															<option 
value="Technology"
<?php echo isset($student['sex']) && $student['sex']=="Technology"? "selected": ""; ?>
>Technology</option>
<option 
value="Business Management"
<?php echo isset($student['sex']) && $student['sex']=="Business Management"? "selected": ""; ?>
>Business Management</option>
															<option 
																value="Computer Science"
																<?php echo isset($student['sex']) && $student['sex']=="Computer Science"? "selected": ""; ?>
															>Computer Science</option>
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
															name="data[StudentInfo][contactNumber]"
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
													name="data[StudentInfo][address]" 
													placeholder="Address"
												><?php echo isset($student['address']) && $student['address']? $student['address']: ""; ?></textarea>
											</div>
											
											<hr>
											
											<div class="row">
												<div class="col-md-4">
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
												
												<div class="col-md-4">
													<div class="form-group">
														<label for="companyinput1">School ID *</label>
														<input 
															type="text" 
															class="form-control" 
															name="data[User][schoolId]"
															placeholder="School ID"
															value="<?php echo isset($student['school_id']) && $student['school_id']? $student['school_id']: ""; ?>"
														>
													</div>
												</div>
												
												<div class="col-md-4">
													<div class="form-group">
														<label for="companyinput5">Course</label>
														<select 
															id="companyinput5" 
															name="data[StudentInfo][course]" 
															class="form-control"
														>
															<option 
																value="none" 
																disabled=""
																<?php echo !$student['course']? "selected": ""; ?>
															>Select Course</option>
															<option value="EDUCATION" disabled="">EDUCATION</option>
<option value="BEED" <?php echo isset($student['course']) && $student['course']=="BEED"? "selected": ""; ?>>Bachelor of Elementary Education (BEED)</option>
<option value="BSEd-Science" <?php echo isset($student['course']) && $student['course']=="BSEd-Science"? "selected": ""; ?>>Bachelor of Secondary Education Major in Science (BSEd-Science)</option>
<option value="BSEd-Math" <?php echo isset($student['course']) && $student['course']=="BSEd-Math"? "selected": ""; ?>>Bachelor of Secondary Education Major in Math (BSEd-Math)</option>
<option value="BPEd" <?php echo isset($student['course']) && $student['course']=="BPEd"? "selected": ""; ?>>Bachelor of Physical Education (BPEd)</option>
<option value="BTVTEd" <?php echo isset($student['course']) && $student['course']=="BTVTEd"? "selected": ""; ?>>Bachelor of Technical-Vocational Teacher Education (BTVTEd)</option>

<!-- ENGINEERING -->
<option value="Engineering" disabled="">ENGINEERING</option>
<option value="BSCE" <?php echo isset($student['course']) && $student['course']=="BSCE"? "selected": ""; ?>>Bachelor of Science in Civil Engineering (BSCE)</option>
<option value="BSEE" <?php echo isset($student['course']) && $student['course']=="BSEE"? "selected": ""; ?>>Bachelor of Science in Electrical Engineering (BSEE)</option>
<option value="BSME" <?php echo isset($student['course']) && $student['course']=="BSME"? "selected": ""; ?>>Bachelor of Science in Mechanical Engineering (BSME)</option>

<!-- TECHNOLOGY -->
<option value="Technology" disabled="">TECHNOLOGY</option>
<option value="BSIT-CUL" <?php echo isset($student['course']) && $student['course']=="BSIT-CUL"? "selected": ""; ?>>Bachelor of Science in Industrial Technology Major in Culinary Arts (BSIT-CUL)</option>
<option value="BSIT-ET" <?php echo isset($student['course']) && $student['course']=="BSIT-ET"? "selected": ""; ?>>Bachelor of Science in Industrial Technology Major in Electronics (BSIT-ET)</option>

<!-- BUSINESS MANAGEMENT -->
<option value="Business Management" disabled="">BUSINESS MANAGEMENT</option>
<option value="BSHM" <?php echo isset($student['course']) && $student['course']=="BSIT-CUL"? "selected": ""; ?>>Bachelor of Science in Hospitality Management (BSHM)</option>

<!-- COMPUTER SCIENCE -->
<option value="Computer Science" disabled="">COMPUTER SCIENCE</option>
<option value="BSIT" <?php echo isset($student['course']) && $student['course']=="BSIT"? "selected": ""; ?>>Bachelor of Science in Information Technology (BSIT)</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										
										<input 
											type="hidden" 
											name="data[StudentInfo][id]" 
											value="<?php echo isset($student['id']) && $student['id']? $student['id']: ""; ?>"
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
													'action' => 'studentList'
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