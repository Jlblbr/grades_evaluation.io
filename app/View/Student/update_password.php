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
											<i class="ft-user"></i>Edit Password</h4>
											<!-- alert -->
											<?php echo $this->Session->flash('save'); ?>
											
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

											
											<div class="row">
												<input 
													type="hidden" 
													class="form-control" 
													name="data[User][username]"
													placeholder="School ID"
													required
													value="<?php echo isset($userCurrentData['username']) && $userCurrentData['username']? $userCurrentData['username']: ""; ?>"
												>
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
											<a href="javascript:history.back()" class="btn btn-danger mr-1">Cancel</a>
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