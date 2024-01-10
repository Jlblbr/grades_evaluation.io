<!-- app/View/CumLaudeCandidates/index.ctp -->

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row"></div>
        <div class="content-body">
            <div class="row">
                <?php foreach ($cumLaudeCandidates as $key => $value): ?>
                    <div class="col" 
                        data-toggle="modal" 
                        data-keyboard="false" 
                        data-target="#user-cumlaude-candidate-modal-<?php echo $value['User']['id']; ?>"
                        style="cursor: pointer"
                    >
                        <!-- Card Container -->
                        <div class="card pull-up">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <?php
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
                                    <!-- Rest of your content -->
                                    <!-- ... -->

                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <h6 class="text-bold-600 mt-2"> Name : 
                                                <span class="info"><?php echo $value['User']['first_name'] . ' ' . $value['User']['last_name']; ?></span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Card Container -->
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
