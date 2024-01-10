<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<?php  
$subject = $subjectData['Subject'];
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
											<i class="ft-layers"></i> Subject Detail</h4>
											<!-- alert -->
											<?php echo $this->Session->flash('save'); ?>
											
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<label for="companyinput1">Subject Title *</label>
														<input 
															type="text"  
															class="form-control" 
															placeholder="Subject Title" 
															name="data[Subject][name_of_subject]"
															required
															value="<?php echo isset($subject['name_of_subject']) && $subject['name_of_subject']? $subject['name_of_subject'] : '' ?>"
														>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="companyinput1">Unit *</label>
														<input 
															type="number"  
															class="form-control" 
															placeholder="Unit" 
															name="data[Subject][unit]"
															required
															value="<?php echo isset($subject['unit']) && $subject['unit']? $subject['unit'] : '' ?>"
														>
													</div>
												</div>
											</div>
											
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="id_label_single">Pre Requesit</label>
														<select 
															class="select2 js-states form-control" 
															name="data[Subject][pre_requesit]"
														>
															<option 
																value="0"
																<?php echo !$subject['id'] ? 'selected disabled' : ''?>
															>
																Select Pre Requesit
															</option>
															
															<?php  
															foreach ($subjectList as $key => $value) {
																$subjectListData = $value['Subject'];
																
																if ($subjectListData['id'] != $subject['id']) {
																	?>
																	<option 
																		value="<?php echo $subjectListData['id'] ?>" 
																		<?php echo isset($subject['pre_requesit']) && $subject['pre_requesit'] == $subjectListData['id']? 'selected' : ''?>
																	>
																		<?php echo $subjectListData['name_of_subject'] ?>
																	</option>
																	<?php
																}
															}
															?>
														</select>
													</div>
												</div>
												
												<div class="col-md-3">
													<div class="form-group">
														<label for="id_label_single">Year Level</label>
														<select 
															class="select2 js-states form-control" 
															name="data[Subject][year_level]"
														>
															<option 
																value="First Year"
																<?php echo isset($subject['year_level']) && $subject['year_level'] == 'First Year'? 'selected' : ''?>
															>
																First Year
															</option>
															<option 
																value="Second Year"
																<?php echo isset($subject['year_level']) && $subject['year_level'] == 'Second Year'? 'selected' : ''?>
															>
																Second Year
															</option>
															<option 
																value="Third Year"
																<?php echo isset($subject['year_level']) && $subject['year_level'] == 'Third Year'? 'selected' : ''?>
															>
																Third Year
															</option>
															<option 
																value="Fourth Year"
																<?php echo isset($subject['year_level']) && $subject['year_level'] == 'Fourth Year'? 'selected' : ''?>
															>
																Fourth Year
															</option>
														</select>
													</div>
												</div>
												
												<div class="col-md-3">
													<div class="form-group">
														<label for="id_label_single">Semester</label>
														<select 
															class="select2 js-states form-control" 
															name="data[Subject][semester]"
														>
															<option 
																value="First Semester"
																<?php echo isset($subject['year_level']) && $subject['year_level'] == 'First Semester'? 'selected' : ''?>
															>
																First Semester
															</option>
															<option 
																value="Second Semester"
																<?php echo isset($subject['year_level']) && $subject['year_level'] == 'Second Semester'? 'selected' : ''?>
															>
																Second Semester
															</option>
														</select>
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