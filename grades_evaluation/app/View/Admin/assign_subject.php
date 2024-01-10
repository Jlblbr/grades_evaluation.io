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
									echo $this->Form->create('Subject', array(
										'class' => 'form'
									));
									?>
										<div class="form-body">
											<h4 class="form-section">
											<i class="ft-layers"></i>Assign Subject</h4>
											<!-- alert -->
											<?php echo $this->Session->flash('save'); ?>
											
											<div class="row">
												
												<div class="col-md-12">
													<?php  
													$user = $instructorData['User'];
													$instructor = $instructorData['Instructor'];
													$fullName = "";
													$fullName .= isset($user['first_name']) && $user['first_name']? $user['first_name']: '';
													$fullName .= " ";
													$fullName .= isset($user['middle_name']) && $user['middle_name']? $user['middle_name']: '';
													$fullName .= " ";
													$fullName .= isset($user['last_name']) && $user['last_name']? $user['last_name']: '';
													?>
													<h4 class="text-uppercase"><?php echo $fullName; ?></h4>
													
													<hr>
													
													<div class="form-group">
														<label for="id_label_single">Subjects</label>
														<select 
															class="select2 js-states form-control" 
															name="data[subjects][]"
															multiple="multiple"
														>
															<?php  
															foreach ($subjects as $key => $value) {
																$subject = $value['Subject'];
																if (in_array($subject['id'], $assignSubjects)) {
																	?>
																	<option value="<?php echo $subject['id']; ?>" selected>
																		<?php echo $subject['name_of_subject']; ?>
																	</option>
																	<?php
																} else {
																	?>
																	<option value="<?php echo $subject['id']; ?>">
																		<?php echo $subject['name_of_subject']; ?>
																	</option>
																	<?php
																}
																
															}
															?>
														</select>
														<p class="text-left">
															<small class="text-muted">You can select multiple subject</small>
														</p>
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

<script type="text/javascript">
$('.select2').select2({
	placeholder: 'Select an option'
});
</script>