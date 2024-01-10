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
								<h4 class="card-title" id="basic-layout-form">GPA</h4>
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
										<!-- alert -->
										<?php echo $this->Session->flash('save'); ?>
									
										<div class="form-body">
											<h4 class="form-section">
												<i class="ft-book"></i>
												Grade Point Average
											</h4>
											
											<!-- alert -->
											<?php echo $this->Session->flash('save'); ?>
											
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label for="companyinput1">Score</label>
														<input 
															type="text"  
															class="form-control" 
															placeholder="First Name" 
															name="score"
															value="<?php echo isset($stuentData['Student']['gpa']) && $stuentData['Student']['gpa'] ? $stuentData['Student']['gpa'] : ''; ?>"
															required
														>
													</div>
												</div>
											</div>
										</div>
										
										<div class="form-actions right">
											<button type="submit" id="btn-submit" class="btn btn-primary">
												Save
											</button>
											<?php  
											echo $this->Html->link(
												'Back',
												array(
													'controller' => 'staff',
													'action' => 'dashboard'
												),
												array(
													'escape' => false,
													'class' => 'btn btn-danger mr-1',
													'id' => 'btn-cancel'
												)
											); 
											?>
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