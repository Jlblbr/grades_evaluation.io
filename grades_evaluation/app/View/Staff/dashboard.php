<link data-require="datatables@1.10.12" data-semver="1.10.12" rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
<link rel="stylesheet" ty<e="text/css" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css"/>

<style>
	   /* CSS rule to hide "Showing X to Y of Z entries" */
	   .dataTables_info {
		   display: none !important;
	   }
	   /* CSS rule to hide sorting icons */
        .dataTables_wrapper .sorting,
        .dataTables_wrapper .sorting_asc,
        .dataTables_wrapper .sorting_desc,
        .dataTables_wrapper .sorting_asc_disabled,
        .dataTables_wrapper .sorting_desc_disabled {
            background-image: none !important;
            background-repeat: no-repeat !important;
            background-position: center right !important;
        }
   </style>
   
<!--Content-->
<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-wrapper-before"></div>
		<div class="content-header row">
		</div>
		<div class="content-body">
			<div class="row">
				<?php 
				foreach ($cumLaudeCandidates as $key => $value):
					$cumLaudeCandidateFullName = $value['User']['first_name'] . ' ' . $value['User']['middle_name'] . ' ' . $value['User']['last_name'];
				?>
					<div class="col" 
						data-toggle="modal" 
						data-keyboard="false" 
						data-target="#user-cumlaude-candidate-modal-<?php echo $value['User']['id']; ?>"
						style="cursor: pointer"
					>
						<div class="card pull-up">
							<div class="card-header">
							<h4 class="card-title">
								<?php
                // Determine the title based on GPA
                $gpa = $value['Student']['gpa'];
                if ($gpa >= 1.00 && $gpa <= 1.20) {
                    echo 'Candidate for Summa Cum Laude';
                } elseif ($gpa >= 1.21 && $gpa <= 1.50) {
                    echo 'Candidate for Magna Cum Laude';
                } elseif ($gpa >= 1.51 && $gpa <= 1.75) {
                    echo 'Candidate for Cum Laude';
                } else {
                    echo 'No Latin Honors';
                }
                ?>

				</h4>
							</div>
							<div class="card-content collapse show">
								<div class="card-body pt-0 pb-1">
									<div class="row mb-1">
										
										<div class="col border-right-blue-grey border-right-lighten-5 text-center">
											<p class="blue-grey lighten-2 mb-0">Examination</p>
											<p class="font-medium-5 text-bold-400"><?php echo $value['Student']['examination_score'] ?></p>
										</div>
										<div class="col text-center">
											<p class="blue-grey lighten-2 mb-0">Interview</p>
											<p class="font-medium-5 text-bold-400"><?php echo $value['Student']['interviewScore'] ?></p>
										</div>
										<div class="col border-right-blue-grey border-right-lighten-5 text-center">
											<p class="blue-grey lighten-2 mb-0">GPA</p>
											<p class="font-medium-5 text-bold-400"><?php echo $value['Student']['gpa'] ?></p>
										</div>
									</div>

									<h6 class="text-bold-600"> Overall Score :
										<span><?php echo $value['Student']['overallGrade'] ?>/100</span>
									</h6>
									<div class="progress progress-sm mt-1 mb-0 box-shadow-2">
										<div 
											class="progress-bar bg-gradient-x-danger" 
											role="progressbar" 
											style="width: <?php echo $value['Student']['overallGrade'] ?>%" 
											aria-valuenow="<?php echo $value['Student']['overallGrade'] ?>" 
											aria-valuemin="0" 
											aria-valuemax="100"
										></div>
									</div>
									<div class="media d-flex">
										<div class="align-self-center">
											<h6 class="text-bold-600 mt-2"> Name : 
												<span class="info"><?php echo $cumLaudeCandidateFullName; ?></span>
											</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="modal fade text-left" id="user-cumlaude-candidate-modal-<?php echo $value['User']['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel3" style="display: none;" aria-hidden="true">
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
									<div class="form-group">
										<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
											
											<?php 
											
											echo $this->Html->link(
												'Examination',
												array(
													'controller' => 'staff',
													'action' => 'examination', $value['User']['id']
												),
												array(
													'escape' => false,
													'class' => 'btn btn-outline-dark'
												)
											);
											echo $this->Html->link(
												'Interview',
												array(
													'controller' => 'staff',
													'action' => 'interviewRubric', $value['User']['id']
												),
												array(
													'escape' => false,
													'class' => 'btn btn-outline-dark'
												)
											);
											echo $this->Html->link(
												'GPA',
												array(
													'controller' => 'staff',
													'action' => 'gpa', $value['User']['id']
												),
												array(
													'escape' => false,
													'class' => 'btn btn-outline-dark'
												)
											);
											?>
											
											<div class="btn-group" role="group">
												<button id="btnGroupDrop3" type="button" class="btn btn-outline-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													Basic Action
												</button>
												<div 
													class="dropdown-menu" 
													aria-labelledby="btnGroupDrop3" 
													x-placement="bottom-start" 
													style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 41px, 0px);"
												>
													
													<?php 
													echo $this->Html->link(
														'<i class="ft-user"></i> | Student Profile',
														array(
															'controller' => 'staff',
															'action' => 'studentProfile', $value['User']['id']
														),
														array(
															'escape' => false,
															'class' => 'dropdown-item'
														)
													);
													
													echo $this->Html->link(
														'<i class="ft-edit-3"></i> | Edit',
														array(
															'controller' => 'staff',
															'action' => 'updateStudent', $value['User']['id']
														),
														array(
															'escape' => false,
															'class' => 'dropdown-item'
														)
													);
													?>
													<a 
														class="dropdown-item" 
														href="#"
														data-toggle="modal" 
														data-keyboard="false" 
														data-target="#user-cumlaude-candidate-delete-modal-<?php echo $value['User']['id']; ?>"
													>
														<i class="ft-trash"></i> | Delete
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div 
						class="modal fade text-left" 
						id="user-cumlaude-candidate-delete-modal-<?php echo $value['User']['id']; ?>" 
						tabindex="-1" 
						role="dialog" 
						aria-labelledby="basicModalLabel3" 
						style="display: none;" aria-hidden="true"
					>
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="basicModalLabel3">Warning</h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<div class="modal-body">
									<h4>Do you want to delete the student data?</h4>
								</div>
								<div class="modal-footer">
									
									<?php 
									echo $this->Html->link(
										'Yes',
										array(
											'controller' => 'staff',
											'action' => 'deleteStudent', $value['User']['id']
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
			</div>
			
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Student List</h4>
							<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
							<div class="heading-elements">
								<ul class="list-inline mb-0">
									<!-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
									<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
									<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
									<li><a data-action="close"><i class="ft-x"></i></a></li> -->
								</ul>
							</div>
						</div>
						<div class="card-content collapse show">
							<div class="card-body">
								<!-- <p class="card-text">
									<?php
									echo $this->Html->link(
										'Add Student',
										array(
											'controller' => 'staff',
											'action' => 'addStudent'
										),
										array(
											'escape' => false,
											'class' => 'btn btn-primary'
										)
									); 
									?>
								</p> -->
								<!-- alert -->
								<?php echo $this->Session->flash('save'); ?>
								
								<div class="table-responsive">
									<table class="table display nowrap" id="myTable" width="100%" cellspacing="0">
										<thead>
											<tr>
												<th></th>
												<th>Name</th>
												<th>Email</th>												
												<th>Examination Score</th>
												<th>Interview Score</th>
												<th>GPA</th>
												<th>Overall Score</th>
												<th>Interviewer</th>
											</tr>
										</thead>
										<tbody>
										<?php 
											foreach ($data as $record): 
												$interviewerFullName = '';
												$interviewerFullName .= isset($record['staff']['first_name']) && $record['staff']['first_name']? $record['staff']['first_name'] : '';
												$interviewerFullName .= isset($record['staff']['middle_name']) && $record['staff']['middle_name']? $record['staff']['middle_name'] : '';
												$interviewerFullName .= isset($record['staff']['last_name']) && $record['staff']['last_name']? $record['staff']['last_name'] : '';
										?>
											<tr 
												class="table-row" 
												id="user-<?php echo $record['User']['id']; ?>" 
												user-id="<?php echo $record['User']['id']; ?>"
												
												style="cursor: pointer"
											>
												<td></td>
												<td
													data-toggle="modal" 
													data-keyboard="false" 
													data-target="#user-modal-<?php echo $record['User']['id']; ?>"
												><?php echo $record['User']['first_name'] . ' ' . $record['User']['middle_name'] . ' ' . $record['User']['last_name']; ?></td>
												<td
													data-toggle="modal" 
													data-keyboard="false" 
													data-target="#user-modal-<?php echo $record['User']['id']; ?>"
												><?php echo $record['User']['email']; ?></td>
												
												<td
													data-toggle="modal" 
													data-keyboard="false" 
													data-target="#user-modal-<?php echo $record['User']['id']; ?>"
												><?php echo $record['Student']['examination_score']; ?></td>
												<td
													data-toggle="modal" 
													data-keyboard="false" 
													data-target="#user-modal-<?php echo $record['User']['id']; ?>"
												><?php echo isset($record['Student']['interviewScore']) && $record['Student']['interviewScore']? $record['Student']['interviewScore'] : 0;?></td>
												<td
													data-toggle="modal" 
													data-keyboard="false" 
													data-target="#user-modal-<?php echo $record['User']['id']; ?>"
												><?php echo $record['Student']['gpa']; ?></td>
												<td
													data-toggle="modal" 
													data-keyboard="false" 
													data-target="#user-modal-<?php echo $record['User']['id']; ?>"
												><?php echo isset($record['Student']['overallGrade']) && $record['Student']['overallGrade']? $record['Student']['overallGrade']: 0 ?></td>
												<td
													data-toggle="modal" 
													data-keyboard="false" 
													data-target="#user-modal-<?php echo $record['User']['id']; ?>"
												><?php echo isset($interviewerFullName) && $interviewerFullName? $interviewerFullName : 'Student not yet interviewed';  ?></td>
												
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
															<div class="form-group">
																<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
																	
																	<?php 
																	
																	echo $this->Html->link(
																		'Examination',
																		array(
																			'controller' => 'staff',
																			'action' => 'examination', $record['User']['id']
																		),
																		array(
																			'escape' => false,
																			'class' => 'btn btn-outline-dark'
																		)
																	);
																	echo $this->Html->link(
																		'Interview',
																		array(
																			'controller' => 'staff',
																			'action' => 'interviewRubric', $record['User']['id']
																		),
																		array(
																			'escape' => false,
																			'class' => 'btn btn-outline-dark'
																		)
																	);
																	echo $this->Html->link(
																		'GPA',
																		array(
																			'controller' => 'staff',
																			'action' => 'gpa', $record['User']['id']
																		),
																		array(
																			'escape' => false,
																			'class' => 'btn btn-outline-dark'
																		)
																	);
																	?>
																	
																	<div class="btn-group" role="group">
																		<button id="btnGroupDrop3" type="button" class="btn btn-outline-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																			Basic Action
																		</button>
																		<div 
																			class="dropdown-menu" 
																			aria-labelledby="btnGroupDrop3" 
																			x-placement="bottom-start" 
																			style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 41px, 0px);"
																		>
																			
																			<?php 
																			echo $this->Html->link(
																				'<i class="ft-user"></i> | Student Profile',
																				array(
																					'controller' => 'staff',
																					'action' => 'studentProfile', $record['User']['id']
																				),
																				array(
																					'escape' => false,
																					'class' => 'dropdown-item'
																				)
																			);
																			
																			echo $this->Html->link(
																				'<i class="ft-edit-3"></i> | Edit',
																				array(
																					'controller' => 'staff',
																					'action' => 'updateStudent', $record['User']['id']
																				),
																				array(
																					'escape' => false,
																					'class' => 'dropdown-item'
																				)
																			);
																			?>
																			<a 
																				class="dropdown-item" 
																				href="#"
																				data-toggle="modal" 
																				data-keyboard="false" 
																				data-target="#user-delete-modal-<?php echo $record['User']['id']; ?>"
																			>
																				<i class="ft-trash"></i> | Delete
																			</a>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											
											<div 
												class="modal fade text-left" 
												id="user-delete-modal-<?php echo $record['User']['id']; ?>" 
												tabindex="-1" 
												role="dialog" 
												aria-labelledby="basicModalLabel3" 
												style="display: none;" aria-hidden="true"
											>
												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h4 class="modal-title" id="basicModalLabel3">Warning</h4>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">×</span>
															</button>
														</div>
														<div class="modal-body">
															<h4>Do you want to delete the student data?</h4>
														</div>
														<div class="modal-footer">
															
															<?php 
															echo $this->Html->link(
																'Yes',
																array(
																	'controller' => 'staff',
																	'action' => 'deleteStudent', $record['User']['id']
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
<script src="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.js"></script>
<!-- <script data-require="datatables@1.10.12" data-semver="1.10.12" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> -->
<script src="//cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>

<script type="text/javascript">
	$(document).ready( function () {
		let table = new DataTable('#myTable', {
			responsive: true,
			paging: true
		});
		
	});
	
</script>