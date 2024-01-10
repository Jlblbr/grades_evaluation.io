<!--Content-->
<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-wrapper-before"></div>
		<div class="content-header row">
		</div>
		<div class="content-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Subject List</h4>
							<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
							<div class="heading-elements">
								<ul class="list-inline mb-0">
									<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
									<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
									<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
									<li><a data-action="close"><i class="ft-x"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="card-content collapse show">
							<div class="card-body">
								<p class="card-text">
									<?php
									echo $this->Html->link(
										'Add Subject',
										array(
											'controller' => 'admin',
											'action' => 'addSubject'
										),
										array(
											'escape' => false,
											'class' => 'btn btn-primary'
										)
									); 
									?>
								</p>
								<!-- alert -->
								<?php echo $this->Session->flash('save'); ?>
								
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>ID</th>
												<th>Subject</th>
												<th>Unit</th>
												<th>Prerequesit</th>
												<th>Year level</th>
												<th>Semester</th>
												<th>Date Created</th>
											</tr>
										</thead>
										<tbody>
										<?php foreach ($data as $record): ?>
											<tr 
												class="table-row" 
												id="subject-<?php echo $record['Subject']['id']; ?>" 
												subject-id="<?php echo $record['Subject']['id']; ?>"
												data-toggle="modal" 
												data-keyboard="false" 
												data-target="#subject-modal-<?php echo $record['Subject']['id']; ?>"
												style="cursor: pointer"
											>
												<td><?php echo $record['Subject']['id']; ?></td>
												<td><?php echo $record['Subject']['name_of_subject']; ?></td>
												<td><?php echo $record['Subject']['unit']; ?></td>
												<td><?php echo isset($record['Subject']['pre_requesit']) && $record['Subject']['pre_requesit']? $record['Subject']['pre_requesit'] : 'No Prerequesit'; ?></td>
												<td><?php echo $record['Subject']['year_level']; ?></td>
												<td><?php echo $record['Subject']['semester']; ?></td>
												<td><?php echo $record['Subject']['date_created']; ?></td>
											</tr>
											
											<div class="modal fade text-left" id="subject-modal-<?php echo $record['Subject']['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel3" style="display: none;" aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h4 class="modal-title" id="basicModalLabel3">Action Modal</h4>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">×</span>
															</button>
														</div>
														<div class="modal-body">
															<p>It means taking into account the potential consequences of one's actions</p>
														</div>
														<div class="modal-footer">
															<?php 
															echo $this->Html->link(
																'Edit',
																array(
																	'controller' => 'admin',
																	'action' => 'updateSubject', $record['Subject']['id']
																),
																array(
																	'escape' => false,
																	'class' => 'btn btn-warning'
																)
															);
															?>
															<button 
																type="button" 
																class="btn btn-danger" 
																data-toggle="modal" 
																data-keyboard="false" 
																data-target="#subject-delete-modal-<?php echo $record['Subject']['id']; ?>"
																
															>Delete</button>
															
															<button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
														</div>
													</div>
												</div>
											</div>
											
											<div class="modal fade text-left" id="subject-delete-modal-<?php echo $record['Subject']['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel3" style="display: none;" aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h4 class="modal-title" id="basicModalLabel3">Warning</h4>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">×</span>
															</button>
														</div>
														<div class="modal-body">
															<h4>Do you want to delete the subject data?</h4>
														</div>
														<div class="modal-footer">
															
															<?php 
															echo $this->Html->link(
																'Yes',
																array(
																	'controller' => 'admin',
																	'action' => 'deleteSubject', $record['Subject']['id']
																),
																array(
																	'escape' => false,
																	'class' => 'btn btn-danger'
																)
															);
															?>
															<button type="button" class="btn grey btn-secondary" data-dismiss="modal">No</button>
														</div>
													</div>
												</div>
											</div>
										<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>					
			<?php 
			echo $this->element('paginate/pagination'); 
			?>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('.table-row').on('click', function(){
		var subjectID = $(this).attr('subject-id');
	});
</script>