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
        <header class="default heade-sticky">
            <div class="un-title-page go-back">
                <?php echo $this->Html->link(
                    '<i class="ri-arrow-drop-left-line"></i>', 
                    array(
                        'controller' => 'Users', 
                        'action' => '/'
                    ),
                    array(
                        'escape' => false,
                        'class' => 'icon'
                    )
                ); ?>
                <h1></h1>
            </div>
        </header>
        <!-- ===================================
          START THE SPACE STICKY
        ==================================== -->
        <div class="space-sticky"></div>
        <!-- ===================================
          START THE FORM
        ==================================== -->
        <?php echo $this->Form->create('User'); ?>
            <section class="account-section padding-20">
                <div class="display-title">
                    <h1>Reset Password</h1>
                    <p>A password reset link will be sent to the email entered below</p>
                </div>
                <div class="content__form margin-t-40">
                    
                    <!-- alert -->
                    <?php echo $this->Session->flash('resetPassword'); ?>
                    
                    <div class="form-group icon-left">
                        <label>Number</label>
                        <div class="input_group">
                            <input 
                                type="number" 
                                name = "contactNumber" 
                                class="form-control" 
                                placeholder='e. g. "09123456652"'
                                value="<?php echo isset($contactNumber) && $contactNumber ? $contactNumber : null ?>"
                                required>
                            <div class="icon">
                                <i class="ri-smartphone-line"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ===================================
              START ACCOUT FOOTER
            ==================================== -->
            <footer class="footer-account">
                <div class="env-pb">
                    <div class="display-actions">
                        <button type="submit" name="button" class="btn btn-sm-arrow bg-primary">
                            <p>Send Link</p>
                            <div class="ico">
                                <i class="ri-arrow-drop-right-line"></i>
                            </div>
                        </button>
                    </div>
                    <div class="dividar"></div>
                    <div class="support">
                        <p>Need help? <a href="page-help.html">Contact our support team</a></p>
                    </div>
                </div>
            </footer>
        <?php echo $this->Form->end(); ?>
    </div>
</div>