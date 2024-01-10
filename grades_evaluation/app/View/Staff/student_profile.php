<?php 
$studentFullName = '';
$studentFullName .= $data['User']['first_name'];
$studentFullName .= ' ';
$studentFullName .= $data['User']['middle_name'];
$studentFullName .= ' ';
$studentFullName .= $data['User']['last_name'];

$address = $data['Student']['address'];

$gpa = $data['Student']['gpa'];
$examination_score = $data['Student']['examination_score'];
$interviewScore = $data['Student']['interviewScore'];

?>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div id="user-profile">
                <div class="row">
                    <div class="col-sm-12 col-xl-8">
                        <div class="media d-flex m-1 ">
                            <div class="align-left p-1">
                                <a href="#" class="profile-image">
									<?php 
									$imageUrl = $this->Html->url('/img/'); 
									?>
									<img class="rounded-circle img-border height-100" src="<?php echo $imageUrl; ?>default_student.png" alt="avatar">
                                </a>
                            </div>
                            <div class="media-body text-left  mt-1">
                                <h3 class="font-large-1 white"><?php echo $studentFullName; ?>
                                    <!-- <span class="font-medium-1 white">(Project manager)</span> -->
                                </h3>
                                <p class="white">
                                    <i class="ft-map-pin white"> </i> <?php echo $address; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-5 col-md-12">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="card-title-wrap bar-primary">

                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body p-0 pt-0 pb-1">
									<div class="text-center">
										<p class="blue-grey lighten-2 mb-0">GPA</p>
										<hr>
										<p class="font-medium-5 text-bold-400"><?php echo $gpa; ?></p>
									</div>
                                </div>
                            </div>
                        </div>
                        
						<div class="card">
                            <div class="card-header pb-0">
                                <div class="card-title-wrap bar-primary">

                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body p-0 pt-0 pb-1">
									<div class="text-center">
										<p class="blue-grey lighten-2 mb-0">Examination Score</p>
										<hr>
										<p class="font-medium-5 text-bold-400"><?php echo $examination_score ?></p>
									</div>
                                </div>
                            </div>
                        </div>
						
						<div class="card">
                            <div class="card-header pb-0">
                                <div class="card-title-wrap bar-primary">

                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body p-0 pt-0 pb-1">
									<div class="text-center">
										<p class="blue-grey lighten-2 mb-0">Interview Score</p>
										<hr>
										<p class="font-medium-5 text-bold-400"><?php echo $interviewScore ?></p>
									</div>
                                </div>
                            </div>
                        </div>
						
                    </div>
                    <div class="col-xl-9 col-lg-7 col-md-12">
                        <!--Project Timeline div starts-->
                        <div id="timeline">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title-wrap bar-primary">
                                        <!-- <div class="card-title">Latin Honors Interview Rubric</div> -->
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card-block">
                                        <div class="timeline">
                                            <h4>Latin Honors Interview Rubric</h4>
                                            <hr>
                                            <ul class="list-unstyled base-timeline activity-timeline mt-3">
                                                <li>
                                                    <div class="timeline-icon bg-primary">
                                                        <i class="ft-book font-medium-1"></i>
                                                    </div>
                                                    <div class="act-time">Score : <?php echo isset($studentInterviewScore['InterviewScore']['academic_excellence']) && $studentInterviewScore['InterviewScore']['academic_excellence']? $studentInterviewScore['InterviewScore']['academic_excellence']: 0; ?></div>
                                                    <div class="base-timeline-info">
                                                        <a href="#" class="text-primary text-uppercase line-height-2">Academic Excellence (30 points)</a>
                                                        <span class="d-block">Demonstrates a strong academic record with consistently high grades. Shows a depth of understanding in the major subject area. </span>
                                                    </div>
													<br>
													<div class="table-responsive">
														<table class="table mb-0">
															<thead>
																<tr>
																	<th>Points</th>
																	<th>Description</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>10</td>
																	<td>Exceptional academic performance; outstanding depth of knowledge in major subject.</td>
																</tr>
																<tr>
																	<td>7</td>
																	<td>Strong academic performance; evident depth of understanding.</td>
																</tr>
																<tr>
																	<td>4</td>
																	<td>Good academic performance; some depth in major subject.</td>
																</tr>
																<tr>
																	<td>1</td>
																	<td>Adequate academic performance; limited depth shown.</td>
																</tr>
																<tr>
																	<td>0</td>
																	<td>Poor academic performance; lack of depth.</td>
																</tr>
															</tbody>
														</table>
													</div>
                                                </li>
												
                                                <li>
                                                    <div class="timeline-icon bg-info">
                                                        <i class="ft-search font-medium-1"></i>
                                                    </div>
                                                    <div class="act-time">Score : <?php echo $studentInterviewScore['InterviewScore']['intellectual_curiosity'] ?></div>
                                                    <div class="base-timeline-info">
                                                        <a href="#" class="text-info text-uppercase  line-height-2">Intellectual Curiosity (20 points)</a>
                                                        <span class="d-block">Demonstrates a passion for learning beyond coursework. Shows engagement with research, projects, or extracurricular activities.</span>
                                                    </div>
                                                    <br>
													<div class="table-responsive">
														<table class="table mb-0">
															<thead>
																<tr>
																	<th>Points</th>
																	<th>Description</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>10</td>
																	<td>High level of intellectual curiosity; substantial engagement in research/projects beyond requirements.</td>
																</tr>
																<tr>
																	<td>7</td>
																	<td>Demonstrates intellectual curiosity; some engagement beyond coursework. </td>
																</tr>
																<tr>
																	<td>4</td>
																	<td>Limited curiosity beyond coursework; minimal engagement.</td>
																</tr>
																<tr>
																	<td>1</td>
																	<td>Poor academic performance; lack of depth.</td>
																</tr>
																<tr>
																	<td>0</td>
																	<td>No sign of intellectual curiosity; no engagement in additional learning activities.</td>
																</tr>
															</tbody>
														</table>
													</div>
                                                </li>
												
												<li>
                                                    <div class="timeline-icon bg-warning">
                                                        <i class="ft-message-circle font-medium-1"></i>
                                                    </div>
                                                    <div class="act-time">Score : <?php echo isset($studentInterviewScore['InterviewScore']['communication_skills']) && $studentInterviewScore['InterviewScore']['communication_skills']? $studentInterviewScore['InterviewScore']['communication_skills']: 0; ?></div>
                                                    <div class="base-timeline-info">
                                                        <a href="#" class="text-warning text-uppercase  line-height-2">Communication Skills (20 points)</a>
                                                        <span class="d-block">Expresses ideas clearly and articulately. Engages in thoughtful and insightful discussions.</span>
                                                    </div>
                                                    <br>
													<div class="table-responsive">
														<table class="table mb-0">
															<thead>
																<tr>
																	<th>Points</th>
																	<th>Description</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>10</td>
																	<td>Excellent communication; articulates ideas eloquently.</td>
																</tr>
																<tr>
																	<td>7</td>
																	<td>Strong communication; expresses ideas effectively. </td>
																</tr>
																<tr>
																	<td>4</td>
																	<td>Adequate communication; some points could be clearer.</td>
																</tr>
																<tr>
																	<td>1</td>
																	<td>Basic communication skills; struggles to articulate.</td>
																</tr>
																<tr>
																	<td>0</td>
																	<td>Poor communication; unable to convey ideas.</td>
																</tr>
															</tbody>
														</table>
													</div>
                                                </li>
												
												<li>
                                                    <div class="timeline-icon bg-danger">
                                                        <i class="ft-share-2 font-medium-1"></i>
                                                    </div>
                                                    <div class="act-time">Score : <?php echo isset($studentInterviewScore['InterviewScore']['leadership_and_service']) && $studentInterviewScore['InterviewScore']['leadership_and_service']?$studentInterviewScore['InterviewScore']['leadership_and_service'] : 0; ?></div>
                                                    <div class="base-timeline-info">
                                                        <a href="#" class="text-danger text-uppercase  line-height-2">Leadership and Service (15 points)</a>
                                                        <span class="d-block">Demonstrates leadership skills through involvement in campus/community activities. Shows a commitment to service and making a positive impact.</span>
                                                    </div>
                                                    <br>
													<div class="table-responsive">
														<table class="table mb-0">
															<thead>
																<tr>
																	<th>Points</th>
																	<th>Description</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>10</td>
																	<td>Strong leadership and service record; impactful contributions to campus/community.</td>
																</tr>
																<tr>
																	<td>7</td>
																	<td>Demonstrates leadership and service; positive contributions evident.</td>
																</tr>
																<tr>
																	<td>4</td>
																	<td>Some involvement in leadership and service activities, but impact is limited.</td>
																</tr>
																<tr>
																	<td>1</td>
																	<td>Minimal leadership and service involvement; limited impact.</td>
																</tr>
																<tr>
																	<td>0</td>
																	<td>No leadership or service involvement.</td>
																</tr>
															</tbody>
														</table>
													</div>
                                                </li>
												
												<li>
                                                    <div class="timeline-icon bg-secondary">
                                                        <i class="ft-bar-chart-2 font-medium-1"></i>
                                                    </div>
                                                    <div class="act-time">Score : <?php echo isset($studentInterviewScore['InterviewScore']['overall_impression']) && $studentInterviewScore['InterviewScore']['overall_impression']? $studentInterviewScore['InterviewScore']['overall_impression']: 0; ?></div>
                                                    <div class="base-timeline-info">
                                                        <a href="#" class="text-secondary text-uppercase  line-height-2">Overall Impression (15 points)</a>
                                                        <span class="d-block">Overall assessment of the candidate's suitability for Latin Honors.</span>
                                                    </div>
                                                    <br>
													<div class="table-responsive">
														<table class="table mb-0">
															<thead>
																<tr>
																	<th>Points</th>
																	<th>Description</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>10</td>
																	<td>Strongly recommended for Latin Honors.</td>
																</tr>
																<tr>
																	<td>7</td>
																	<td>Recommended for Latin Honors.</td>
																</tr>
																<tr>
																	<td>4</td>
																	<td>Marginally recommended for Latin Honors.</td>
																</tr>
																<tr>
																	<td>1</td>
																	<td>Not strongly recommended for Latin Honors.</td>
																</tr>
																<tr>
																	<td>0</td>
																	<td>Not recommended for Latin Honors.</td>
																</tr>
															</tbody>
														</table>
													</div>
                                                </li>
                                            </ul>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Project Timeline div ends-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>