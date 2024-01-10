<!--Content-->
<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-wrapper-before"></div>
		<div class="content-header row">
		</div>
		<div class="content-body">
			<div class="row">
		        <div class="col">
		            <div class="card">
		                <div class="card-header">
		                    <h4 class="card-title">Grades Evaluation Results</h4>
		                    <!-- <span class="text-medium-1 danger line-height-2 text-uppercase">Android</span>   -->
		                        <div class="heading-elements">
		                            <ul class="list-inline mb-0 display-block">
		                                <li>
		                                    <!-- <a class="btn btn-md btn-danger box-shadow-2 round btn-min-width pull-right" href="#" target="_blank">In Progress</a> -->
		                                </li>
		                            </ul>
		                        </div>    
		                </div>
		                <div class="card-content collapse show">
		                    <div class="card-body pt-0 pb-1">

		                        <div class="row mb-1">
		                            
		                            <div class="col-6 col-sm-3 col-md-6 col-lg-3 border-right-blue-grey border-right-lighten-5 text-center">
		                                <p class="blue-grey lighten-2 mb-0">Examination Score</p>
		                                <p class="font-medium-5 text-bold-400"><?php echo $data['Student']['examination_score']; ?></p>
		                            </div>
		                            <div class="col-6 col-sm-3 col-md-6 col-lg-3 border-right-blue-grey border-right-lighten-5 text-center">
		                                <p class="blue-grey lighten-2 mb-0">Interview Score</p>
		                                <p class="font-medium-5 text-bold-400"><?php echo $data['Student']['interviewScore']; ?></p>
		                            </div>
                                    <div class="col-6 col-sm-3 col-md-6 col-lg-3 border-right-blue-grey border-right-lighten-5 text-center">
		                                <p class="blue-grey lighten-2 mb-0">GPA</p>
		                                <p class="font-medium-5 text-bold-400"><?php echo $data['Student']['gpa']; ?></p>
		                            </div>
		                            <div class="col-6 col-sm-3 col-md-6 col-lg-3 text-center">
		                                <p class="blue-grey lighten-2 mb-0">Overall Score</p>
		                                <p class="font-medium-5 text-bold-400"><?php echo $data['Student']['overallGrade']; ?></p>
		                            </div>
		                        </div>

		                        <!-- <h6 class="text-bold-600"> Task Completed:
		                            <span>4/10</span>
		                        </h6> -->
		                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
		                            <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: <?php echo $data['Student']['overallGrade']; ?>%" aria-valuenow="<?php echo $data['Student']['overallGrade']; ?>" aria-valuemin="0" aria-valuemax="100"></div>
		                        </div>
		                        <div class="media d-flex">
		                            <!-- <div class="align-self-center">
		                                <h6 class="text-bold-600 mt-2"> Client:
		                                    <span class="info">Xeon Inc.</span>
		                                </h6>
		                                <h6 class="text-bold-600 mt-1"> Deadline:
		                                    <span class="blue-grey">5th June, 2018</span>
		                                </h6>
		                            </div> -->
		                            <!-- <div class="media-body text-right mt-2 d-md-block">
		                                <span class="text-bold-600 mt-1"> Chameleon Team </span>
		                                <ul class="list-unstyled users-list">
		                                    <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="John Doe" class="avatar avatar-sm pull-up">
		                                        <img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-19.png" alt="Avatar">
		                                    </li>
		                                    <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Katherine Nichols" class="avatar avatar-sm pull-up">
		                                        <img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-18.png" alt="Avatar">
		                                    </li>
		                                    <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Joseph Weaver" class="avatar avatar-sm pull-up">
		                                        <img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-17.png" alt="Avatar">
		                                    </li>
		                                </ul>
		                            </div> -->
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		        
		    </div>
		</div>
	</div>
</div>