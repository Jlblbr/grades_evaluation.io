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
                        'action' => 'contacts'
                    ),
                    array(
                        'escape' => false,
                        'class' => 'icon'
                    )
                ); ?>
                <h1>Add Contact Person</h1>
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
          START THE UPLOAD FORM
        ==================================== -->
        <?php echo $this->Form->create('EmergencyContact'); ?>
            <section class="un-create-collectibles">
                <!-- alert -->
                <?php echo $this->Session->flash('addContactPerson'); ?>
                <?php echo $this->Session->flash('editContactPerson'); ?>

                <div class="form-group">
                    <label>Fullname <span class="size-11">(*)</span></label>
                    <input 
                        type="text" 
                        name="data[EmergencyContact][fullname]" 
                        value="<?php echo (isset($contactPersonData['fullname']) && $contactPersonData['fullname'])? $contactPersonData['fullname']: null ?>" 
                        class="form-control" 
                        required 
                    />
                    
                </div>
                <div class="form-group">
                    <label>Contact Number <span class="size-11">(*)</span></label>
                    <input 
                        type="number" 
                        name="data[EmergencyContact][contact_number]" 
                        value="<?php echo (isset($contactPersonData['contact_number']) && $contactPersonData['contact_number'])? $contactPersonData['contact_number']: null ?>" 
                        class="form-control" 
                        required 
                    />
                </div>
                <div class="form-group">
                    <label>Message <span class="size-11">(*)</span></label>
                    <textarea 
                        name="data[EmergencyContact][message]"
                        class="form-control" 
                        rows="3"
                        placeholder='e. g. "After purchasing you’ll be able to get ..."'
                        required
                    ><?php echo (isset($contactPersonData['message']) && $contactPersonData['message'])? $contactPersonData['message']: null ?></textarea>
                </div>
            </section>
            <!-- ===================================
              START PUT ON SALE
            ==================================== -->
            <section class="un-activity-toggle">
                <nav class="nav flex-column">
                    <div class="nav-link border-0 px-0 mb-0 pt-1">
                        <div class="text">
                            <h2>Emergency Contact Status</h2>
                            <p>Enable to receive sos message</p>
                        </div>
                        <label class="switch_toggle toggle_lg" for="swithDefault">
                            <input 
                                type="checkbox" 
                                name="data[EmergencyContact][status]" 
                                <?php echo (isset($contactPersonData['status']) && $contactPersonData['status'])? 'checked': null ?> 
                                id="swithDefault"
                            />
                            <span class="handle"></span>
                        </label>
                    </div>
                </nav>
            </section>
            <!-- ===================================
              START THE SPACE STICKY -FOOTER
            ==================================== -->
            <!-- space-sticky-footer -->
            <div class="space-sticky-footer"></div>
            <!-- ===================================
              START THE FOOTER - BUTTONS
            ==================================== -->
            <footer class="footer-pages-forms">
                <div class="content">
                    <button href="page-put-on-marketplace.html" class="col-12 btn btn-bid-items">
                        <p>Save Data</p>
                        <div class="ico">
                            <i class="ri-arrow-drop-right-line"></i>
                        </div>
                    </button>
                </div>
            </footer>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
