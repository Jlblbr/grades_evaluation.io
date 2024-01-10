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
							<h4 class="card-title">Staff List</h4>
							<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
							<div class="heading-elements">
								<ul class="list-inline mb-0">
									<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="card-content collapse show">
							<div class="card-body">
								<p class="card-text">
									<?php
									echo $this->Html->link(
										'Add Staff',
										array(
											'controller' => 'admin',
											'action' => 'addStaff'
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
												<th>Name</th>
												<th>Email</th>
												<th>Contact Number</th>
												<th>Sex</th>
												<th>Address</th>
											</tr>
										</thead>
										<tbody>
										<?php foreach ($data as $record): ?>
											<tr 
												class="table-row" 
												id="user-<?php echo $record['User']['id']; ?>" 
												user-id="<?php echo $record['User']['id']; ?>"
												data-toggle="modal" 
												data-keyboard="false" 
												data-target="#user-modal-<?php echo $record['User']['id']; ?>"
												style="cursor: pointer"
											>
												<td><?php echo $record['User']['id']; ?></td>
												<td><?php echo $record['User']['first_name'] . ' ' . $record['User']['middle_name'] . ' ' . $record['User']['last_name']; ?></td>
												<td><?php echo $record['User']['email']; ?></td>
												<td><?php echo $record['User']['contact_number']; ?></td>
												<td><?php echo $record['Staff']['sex']; ?></td>
												<td><?php echo $record['Staff']['address']; ?></td>
											</tr>
											
											<div class="modal fade text-left" id="user-modal-<?php echo $record['User']['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel3" style="display: none;" aria-hidden="true">
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
																	'action' => 'updateStaff', $record['User']['id']
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
																data-target="#user-delete-modal-<?php echo $record['User']['id']; ?>"
																
															>Delete</button>
															
															<button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
														</div>
													</div>
												</div>
											</div>
											
											<div class="modal fade text-left" id="user-delete-modal-<?php echo $record['User']['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel3" style="display: none;" aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h4 class="modal-title" id="basicModalLabel3">Warning</h4>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">×</span>
															</button>
														</div>
														<div class="modal-body">
															<h4>Do you want to delete the staff data?</h4>
														</div>
														<div class="modal-footer">
															
															<?php 
															echo $this->Html->link(
																'Yes',
																array(
																	'controller' => 'admin',
																	'action' => 'deleteStaff', $record['User']['id']
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
		var userID = $(this).attr('user-id');
	});
</script>