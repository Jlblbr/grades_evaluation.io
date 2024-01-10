<style media="screen">
	.hide-btn {
		display: none;
	}
</style>
<style>
   .form-group {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
   }

   .form-group input {
      flex: 1; /* Adjust the flex property as needed */
   }

   @media screen and (max-width: 600px) {
      .form-group input {
         flex: 0 0 100%; /* Allow inputs to take 100% width on smaller screens */
      }
   }
</style>
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
								<h4 class="card-title" id="basic-layout-form">Latin Honors Interview Rubric</h4>
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
											
											
											<!-- alert -->
											<?php echo $this->Session->flash('save'); ?>
											
											<!-- Step 1 -->
											<div class="form-step" id="step-1">
												<h4 class="form-section">
													<i class="ft-book"></i>
													Academic Excellence (30 points)
												</h4>
												<div class="card-body">
													<div class="card-text">
														<p>
															Demonstrates a strong academic record with consistently high grades. Shows a depth of understanding in the major subject area.
														</p>
													</div>
												</div>
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
																<td>5</td>
																<td>Exceptional academic performance; outstanding depth of knowledge in major subject.</td>
															</tr>
															<tr>
																<td>4</td>
																<td>Strong academic performance; evident depth of understanding.</td>
															</tr>
															<tr>
																<td>3</td>
																<td>Good academic performance; some depth in major subject.</td>
															</tr>
															<tr>
																<td>2</td>
																<td>Adequate academic performance; limited depth shown.</td>
															</tr>
															<tr>
																<td>1</td>
																<td>Poor academic performance; lack of depth.</td>
															</tr>
														</tbody>
													</table>
												</div>
												
												<br>
												<style>
    /* Add custom styles for larger checkboxes and separation */
    .form-check-input-large {
        width: 20px; /* Adjust the width as needed */
        height: 20px; /* Adjust the height as needed */
    }

    .form-check-label-large {
        font-size: 16px; /* Adjust the font size as needed */
        margin-left: 5px; /* Add margin to the left of the label */
    }
</style>

<label for="name">Score</label>
<div class="form-group" style="display: flex; gap: 10px;">
    <?php
    $scoreValue = isset($interviewScore['InterviewScore']['academic_excellence5']) && $interviewScore['InterviewScore']['academic_excellence5'] > 0
        ? $interviewScore['InterviewScore']['academic_excellence5']
        : '';

    for ($i = 1; $i <= 5; $i++) {
        $isChecked = ($scoreValue == $i) ? 'checked' : '';
        echo '<div class="form-check">';
        echo '<input type="checkbox" class="form-check-input form-check-input-large" name="academic_excellence5" value="' . $i . '" ' . $isChecked . '>';
        echo '<label class="form-check-label form-check-label-large" for="scoreAcademicExcellence5_' . $i . '">' . $i . '</label>';
        echo '</div>';
    }
    ?>
</div>

<script>
    $(document).ready(function () {
        // Ensure only one checkbox is checked at a time
        $('input[name="academic_excellence5"]').click(function () {
            $('input[name="' + $(this).attr('name') + '"]').not(this).prop('checked', false);
        });
    });
</script>



</div>


</div>  <!-- Corrected closing tag -->

											
											<!-- Step 2 -->
											<div class="form-step" id="step-2">
												<h4 class="form-section">
													<i class="ft-search"></i>
													Intellectual Curiosity (20 points)
												</h4>
												<div class="card-body">
													<div class="card-text">
														<p>
															Demonstrates a passion for learning beyond coursework. Shows engagement with research, projects, or extracurricular activities.
														</p>
													</div>
												</div>
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
																<td>5</td>
																<td>High level of intellectual curiosity; substantial engagement in research/projects beyond requirements.</td>
															</tr>
															<tr>
																<td>4</td>
																<td>Demonstrates intellectual curiosity; some engagement beyond coursework. </td>
															</tr>
															<tr>
																<td>3</td>
																<td>Limited curiosity beyond coursework; minimal engagement.</td>
															</tr>
															<tr>
																<td>2</td>
																<td>Poor academic performance; lack of depth.</td>
															</tr>
															<tr>
																<td>1</td>
																<td>No sign of intellectual curiosity; no engagement in additional learning activities.</td>
															</tr>
														</tbody>
													</table>
												</div>
												
												<br>
												<style>
    /* Add custom styles for larger checkboxes and separation */
    .form-check-input-large {
        width: 20px; /* Adjust the width as needed */
        height: 20px; /* Adjust the height as needed */
    }

    .form-check-label-large {
        font-size: 16px; /* Adjust the font size as needed */
        margin-left: 5px; /* Add margin to the left of the label */
    }
</style>

<label for="email">Score</label>
<div class="form-group" style="display: flex; gap: 10px;">
    <?php
    $scoreValue = isset($interviewScore['InterviewScore']['intellectual_curiosity5']) && $interviewScore['InterviewScore']['intellectual_curiosity5'] > 0
        ? $interviewScore['InterviewScore']['intellectual_curiosity5']
        : '';

    for ($i = 1; $i <= 5; $i++) {
        $isChecked = ($scoreValue == $i) ? 'checked' : '';
        echo '<div class="form-check">';
        echo '<input type="checkbox" class="form-check-input form-check-input-large" name="intellectual_curiosity5" value="' . $i . '" ' . $isChecked . '>';
        echo '<label class="form-check-label form-check-label-large" for="scoreIntellectualCuriosity5_' . $i . '">' . $i . '</label>';
        echo '</div>';
    }
    ?>
</div>

<script>
    $(document).ready(function () {
        // Ensure only one checkbox is checked at a time
        $('input[name="intellectual_curiosity5"]').click(function () {
            $('input[name="' + $(this).attr('name') + '"]').not(this).prop('checked', false);
        });
    });
</script>







											</div>
											
											<!-- Step 3 -->
											<div class="form-step" id="step-3">
												<h4 class="form-section">
													<i class="ft-message-circle"></i>
													Communication Skills (20 points)
												</h4>
												<div class="card-body">
													<div class="card-text">
														<p>
															Expresses ideas clearly and articulately. Engages in thoughtful and insightful discussions.
														</p>
													</div>
												</div>
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
																<td>5</td>
																<td>Excellent communication; articulates ideas eloquently.</td>
															</tr>
															<tr>
																<td>4</td>
																<td>Strong communication; expresses ideas effectively. </td>
															</tr>
															<tr>
																<td>3</td>
																<td>Adequate communication; some points could be clearer.</td>
															</tr>
															<tr>
																<td>2</td>
																<td>Basic communication skills; struggles to articulate.</td>
															</tr>
															<tr>
																<td>1</td>
																<td>Poor communication; unable to convey ideas.</td>
															</tr>
														</tbody>
													</table>
												</div>
												
												<br>
												<style>
    /* Add custom styles for larger checkboxes and separation */
    .form-check-input-large {
        width: 20px; /* Adjust the width as needed */
        height: 20px; /* Adjust the height as needed */
    }

    .form-check-label-large {
        font-size: 16px; /* Adjust the font size as needed */
        margin-left: 5px; /* Add margin to the left of the label */
    }
</style>

<label for="email">Score</label>
<div class="form-group" style="display: flex; gap: 10px;">
    <?php
    $scoreValue = isset($interviewScore['InterviewScore']['communication_skills5']) && $interviewScore['InterviewScore']['communication_skills5'] > 0
        ? $interviewScore['InterviewScore']['communication_skills5']
        : '';

    for ($i = 1; $i <= 5; $i++) {
        $isChecked = ($scoreValue == $i) ? 'checked' : '';
        echo '<div class="form-check">';
        echo '<input type="checkbox" class="form-check-input form-check-input-large" name="communication_skills5" value="' . $i . '" ' . $isChecked . '>';
        echo '<label class="form-check-label form-check-label-large" for="scoreCommunicationSkills5_' . $i . '">' . $i . '</label>';
        echo '</div>';
    }
    ?>
</div>

<script>
    $(document).ready(function () {
        // Ensure only one checkbox is checked at a time
        $('input[name="communication_skills5"]').click(function () {
            $('input[name="' + $(this).attr('name') + '"]').not(this).prop('checked', false);
        });
    });
</script>


											</div>
											
											<!-- Step 4 -->
											<div class="form-step" id="step-4">
												<h4 class="form-section">
													<i class="ft-share-2"></i>
													Leadership and Service (15 points)
												</h4>
												<div class="card-body">
													<div class="card-text">
														<p>
															Demonstrates leadership skills through involvement in campus/community activities. Shows a commitment to service and making a positive impact.
														</p>
													</div>
												</div>
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
																<td>5</td>
																<td>Strong leadership and service record; impactful contributions to campus/community.</td>
															</tr>
															<tr>
																<td>4</td>
																<td>Demonstrates leadership and service; positive contributions evident.</td>
															</tr>
															<tr>
																<td>3</td>
																<td>Some involvement in leadership and service activities, but impact is limited.</td>
															</tr>
															<tr>
																<td>2</td>
																<td>Minimal leadership and service involvement; limited impact.</td>
															</tr>
															<tr>
																<td>1</td>
																<td>No leadership or service involvement.</td>
															</tr>
														</tbody>
													</table>
												</div>
												
												<br>
												<style>
    /* Add custom styles for larger checkboxes and separation */
    .form-check-input-large {
        width: 20px; /* Adjust the width as needed */
        height: 20px; /* Adjust the height as needed */
    }

    .form-check-label-large {
        font-size: 16px; /* Adjust the font size as needed */
        margin-left: 5px; /* Add margin to the left of the label */
    }
</style>

<label for="email">Score</label>
<div class="form-group" style="display: flex; gap: 10px;">
    <?php
    $scoreValue = isset($interviewScore['InterviewScore']['leadership_and_service5']) && $interviewScore['InterviewScore']['leadership_and_service5'] > 0
        ? $interviewScore['InterviewScore']['leadership_and_service5']
        : '';

    for ($i = 1; $i <= 5; $i++) {
        $isChecked = ($scoreValue == $i) ? 'checked' : '';
        echo '<div class="form-check">';
        echo '<input type="checkbox" class="form-check-input form-check-input-large" name="leadership_and_service5" value="' . $i . '" ' . $isChecked . '>';
        echo '<label class="form-check-label form-check-label-large" for="scoreLeadershipAndService5_' . $i . '">' . $i . '</label>';
        echo '</div>';
    }
    ?>
</div>

<script>
    $(document).ready(function () {
        // Ensure only one checkbox is checked at a time
        $('input[name="leadership_and_service5"]').click(function () {
            $('input[name="' + $(this).attr('name') + '"]').not(this).prop('checked', false);
        });
    });
</script>


											</div>
											
											<!-- Step 5 -->
											<div class="form-step" id="step-5">
												<h4 class="form-section">
													<i class="ft-bar-chart-2"></i>
													Overall Impression (15 points)
												</h4>
												<div class="card-body">
													<div class="card-text">
														<p>
															Overall assessment of the candidate's suitability for Latin Honors.
														</p>
													</div>
												</div>
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
																<td>5</td>
																<td>Strongly recommended for Latin Honors.</td>
															</tr>
															<tr>
																<td>4</td>
																<td>Recommended for Latin Honors.</td>
															</tr>
															<tr>
																<td>3</td>
																<td>Marginally recommended for Latin Honors.</td>
															</tr>
															<tr>
																<td>2</td>
																<td>Not strongly recommended for Latin Honors.</td>
															</tr>
															<tr>
																<td>1</td>
																<td>Not recommended for Latin Honors.</td>
															</tr>
														</tbody>
													</table>
												</div>
												
												<br>
												<style>
    /* Add custom styles for larger checkboxes and separation */
    .form-check-input-large {
        width: 20px; /* Adjust the width as needed */
        height: 20px; /* Adjust the height as needed */
    }

    .form-check-label-large {
        font-size: 16px; /* Adjust the font size as needed */
        margin-left: 5px; /* Add margin to the left of the label */
    }
</style>

<label for="email">Score</label>
<div class="form-group" style="display: flex; gap: 10px;">
    <?php
    $scoreValue = isset($interviewScore['InterviewScore']['overall_impression5']) && $interviewScore['InterviewScore']['overall_impression5'] > 0
        ? $interviewScore['InterviewScore']['overall_impression5']
        : '';

    for ($i = 1; $i <= 5; $i++) {
        $isChecked = ($scoreValue == $i) ? 'checked' : '';
        echo '<div class="form-check">';
        echo '<input type="checkbox" class="form-check-input form-check-input-large" name="overall_impression5" value="' . $i . '" ' . $isChecked . '>';
        echo '<label class="form-check-label form-check-label-large" for="scoreOverallImpression5_' . $i . '">' . $i . '</label>';
        echo '</div>';
    }
    ?>
	<button type="submit" id="btn-submit" class="btn btn-primary">
												Save
											</button>
</div>

<script>
    $(document).ready(function () {
        // Ensure only one checkbox is checked at a time
        $('input[name="overall_impression5"]').click(function () {
            $('input[name="' + $(this).attr('name') + '"]').not(this).prop('checked', false);
        });
    });
</script>


											</div>
										</div>
										
										<div class="form-actions right">
											
											<!-- Previous and Next Buttons -->
											<button type="button" class="btn btn-secondary" id="prev-step">Previous</button>
											<button type="button" class="btn btn-primary  mr-1" id="next-step">Next</button>
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

<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Form Wizard Script -->
<script>
$(document).ready(function () {
	
	$('#form').submit(function (e) {
		e.preventDefault(); // Prevent the form from submitting normally
		$('#prev-step').addClass('btn-hide');
		$('#next-step').addClass('btn-hide');
		
		$('#btn-cancel').addClass('btn-hide');
		$('#btn-submit').addClass('btn-hide');
		$('#btn-loader').removeClass('btn-hide');
		
		this.submit();
	});
	
    var currentStep = 1;
    
	if (currentStep == 1) {
		$('#prev-step').addClass("hide-btn");
	}
	
    $("#next-step").click(function () {
        if (currentStep < 5) {
            currentStep++;
            showStep(currentStep);
        }
		
		if (currentStep == 5) {
			$('#next-step').addClass("hide-btn");
		} else {
			$('#next-step').removeClass("hide-btn");
			$('#prev-step').removeClass("hide-btn");
		}
    });
    
    $("#prev-step").click(function () {
        if (currentStep > 1) {
            currentStep--;
            showStep(currentStep);
        }
		
		if (currentStep == 1) {
			$('#prev-step').addClass("hide-btn");
		} else {
			$('#prev-step').removeClass("hide-btn");
			$('#next-step').removeClass("hide-btn");
		}
    });
    
    function showStep(step) {
        $(".form-step").hide();
        $("#step-" + step).show();
    }
    
    // Initialize on page load
    showStep(currentStep);
});
</script>