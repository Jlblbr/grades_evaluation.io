<?php  
$whitelist = array( '127.0.0.1', '::1' );
// check if the server is in the array
if ( in_array( $_SERVER['REMOTE_ADDR'], $whitelist ) ) {
	$baseUrl = $this->Html->webroot;
} else {
	$baseUrl = 'https://church.infinityfreeapp.com/';
}
?>
<div id="wrapper">
    <!-- START CONTENT -->
    <div id="content">
        <!-- ===================================
          START THE HEADER
        ==================================== -->
        <header class="default heade-sticky border-b-gradient">
            <div class="un-title-page go-back">
                <?php echo $this->Html->link(
                    '<i class="ri-arrow-drop-left-line"></i>', 
                    array(
                        'controller' => 'Users', 
                        'action' => 'home'
                    ),
                    array(
                        'escape' => false,
                        'class' => 'icon'
                    )
                ); ?>
                <h1>Edit Profile</h1>
            </div>
            <div class="un-block-right">
                <div class="un-notification">
                    <?php echo $this->Html->link(
                        '<i class="ri-notification-line"></i>', 
                        array(
                            'controller' => 'Users', 
                            'action' => 'notification'
                        ),
                        array(
                            'escape' => false,
                            'aria-label' => 'activity'
                        )
                    ); ?>
                    <span id="dot">
                        
                    </span>
                </div>
            </div>
        </header>
        <!-- ===================================
          START THE SPACE STICKY
        ==================================== -->
        <div class="space-sticky"></div>
        
        <!-- ===================================
          START THE FORM
        ==================================== -->
        <section class="padding-20 form-edit-profile margin-b-20">
            <!-- alert -->
            <?php echo $this->Session->flash('profile'); ?>
            
            <?php echo $this->Form->create('User'); ?>
                <input type="hidden" name="data[User][username]" value="<?php echo isset($data) && $data? $data['username']: ''; ?>">
                <div class="form-group">
                    <label>First Name</label>
                    <input 
                        type="name" 
                        name="data[User][first_name]" 
                        class="form-control" 
                        id="form1a" 
                        placeholder="First Name"
                        value="<?php echo isset($data) && $data? $data['first_name']: ''; ?>"
                    >
                    <div class="size-11 color-text form-text">Full name is not visible to other users</div>
                </div>
                <div class="form-group">
                    <label>Middle Name</label>
                    <input 
                        type="text" 
                        name="data[User][middle_name]" 
                        class="form-control" 
                        id="form1aa" 
                        placeholder="Middle Name"
                        value="<?php echo isset($data) && $data? $data['middle_name']: ''; ?>"
                    >
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input 
                        type="text" 
                        name="data[User][last_name]" 
                        class="form-control validate-password" 
                        id="form3a" 
                        placeholder="Last Name"
                        value="<?php echo isset($data) && $data? $data['last_name']: ''; ?>"
                    >
                </div>
                <div class="form-group">
                    <label>E-Mail Address</label>
                    <input 
                        type="email" 
                        name="data[User][email]" 
                        class="form-control" 
                        id="form3a1" 
                        placeholder="E-mail"
                        value="<?php echo isset($data) && $data? $data['email']: ''; ?>"
                    >
                    <!-- <div class="size-11 color-red form-text">This email address is not valid</div> -->
                </div>
                
                <div class="form-group">
                    <label>Contact Number</label>
                    <input 
                        type="number" 
                        name="data[User][contact_number]" 
                        class="form-control validate-password" 
                        
                        placeholder="Contact Number"
                        value="<?php echo isset($data) && $data? $data['contact_number']: ''; ?>"
                    >
                </div>
                <br>
                <hr>
                <br>
                <div class="content">
                    <button href="page-my-profile.html" aria-label="profile" class="col-12 btn btn-bid-items">
                        <p>Update Profile</p>
                        <div class="ico">
                            <i class="ri-arrow-drop-right-line"></i>
                        </div>
                    </button>
                </div>
            <?php echo $this->Form->end(); ?>
        </section>
    </div>
    <!-- ===================================
      START THE BOTTOM NAVIGATION
    ==================================== -->
    <?php echo $this->element('mobile/footer');?>
</div>

<div class="modal transition-bottom screenFull defaultModal mdlladd__rate fade" id="modal-emergency" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="title-modal">Alert</h1>
                <button type="button" class="btn btnClose" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ri-close-fill"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="content-upload-item text-center">
                    <i class="fa fa-handshake color-gray-dark fa-5x pt-2"></i>
                    <h1 class="pt-3 font-30">Are You Sure?</h1>
                    <p class="boxed-text-xl">
                        We will locate your phone
                    </p>
                    <div class="grid_buttonUpload">
                        <a href="javascript: void(0)" data-bs-dismiss="modal" class="btn btn-create bg-primary text-white margin-b-20">
                            Cancel
                        </a>
                        <a  href="javascript: void(0)" onclick="getLocation()" class="btn btn-create bg-white border border-solid border-snow text-dark">
                            Yes
                        </a>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <div class="env-pb"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal transition-bottom screenFull defaultModal mdlladd__rate fade" id="modal-stop-emergency" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="title-modal">Alert</h1>
                <button type="button" class="btn btnClose" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ri-close-fill"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="content-upload-item text-center">
                    <i class="fa fa-handshake color-gray-dark fa-5x pt-2"></i>
                    <h1 class="pt-3 font-30">Are You Sure?</h1>
                    <p class="boxed-text-xl">
                        The we will stop the tracker now
                    </p>
                    <div class="grid_buttonUpload">
                        <a href="javascript: void(0)" data-bs-dismiss="modal" class="btn btn-create bg-primary text-white margin-b-20">
                            Cancel
                        </a>
                        <a  href="javascript: void(0)" onclick="modalstopTracking()" class="btn btn-create bg-white border border-solid border-snow text-dark">
                            Yes
                        </a>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <div class="env-pb"></div>
            </div>
        </div>
    </div>
</div>