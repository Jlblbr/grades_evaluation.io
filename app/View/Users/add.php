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
            <div class="un-block-right">
                <?php echo $this->Html->link(
                    'Sign in', 
                    array(
                        'controller' => 'Users', 
                        'action' => 'login'
                    ),
                    array(
                        'escape' => false,
                        'class' => 'btn nav-link text-primary size-14 weight-500 pe-0'
                    )
                ); ?>
            </div>
        </header>
        <!-- ===================================
          START THE SPACE STICKY
        ==================================== -->
        <div class="space-sticky"></div>
        <!-- ===================================
          START THE FORM
        ==================================== -->
        <section class="account-section padding-20">
            <?php echo $this->Form->create('User');?>
                <div class="display-title">
                    <h1>Let's Get Started!</h1>
                    <p>Register the email address to continue</p>
                </div>
                
                <div class="dividar_or">
                    <span>Sign Up</span>
                </div>
                
                <div class="content__form margin-t-40">
                    
                    <?php if (isset($this->validationErrors['User']['email'][0]) && $this->validationErrors['User']['email'][0]): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo isset($this->validationErrors['User']['email'][0])? $this->validationErrors['User']['email'][0]: ''; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($this->validationErrors['User']['username'][0]) && $this->validationErrors['User']['username'][0]): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo isset($this->validationErrors['User']['username'][0])? $this->validationErrors['User']['username'][0]: ''; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($this->validationErrors['User']['password'][0]) &&  $this->validationErrors['User']['password'][0]): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo isset($this->validationErrors['User']['password'][0])? $this->validationErrors['User']['password'][0]: ''; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($this->validationErrors['User']['password_confirm'][0]) && $this->validationErrors['User']['password_confirm'][0]): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo isset($this->validationErrors['User']['password_confirm'][0])? $this->validationErrors['User']['password_confirm'][0]: ''; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (isset($this->validationErrors['User']['contact_number'][0]) && $this->validationErrors['User']['contact_number'][0]): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo isset($this->validationErrors['User']['contact_number'][0])? $this->validationErrors['User']['contact_number'][0]: ''; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    
                    
                    <div class="form-group icon-left">
                        <label>Your Username</label>
                        <div class="input_group">
                            <input 
                                type="text" 
                                name="data[User][username]" 
                                class="form-control validate-name" 
                                id="form1ac" 
                                placeholder="Your Username" 
                                value="<?php echo isset($data) && $data? $data['username']: ''; ?>"
                                required
                            >
                            <div class="icon">
                                <i class="ri-user-3-line"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group  icon-left">
                        <label>Email Address</label>
                        <div class="input_group">
                            <input 
                                type="email" 
                                name="data[User][email]" 
                                class="form-control validate-text" 
                                id="form2ac55" 
                                placeholder="Your Email" 
                                value="<?php echo isset($data) && $data? $data['email']: ''; ?>"
                                required
                            >
                            <div class="icon">
                                <i class="ri-mail-open-line"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group icon-left">
                        <label>Contac Number</label>
                        <div class="input_group">
                            <input 
                                type="text" 
                                name="data[User][contact_number]" 
                                class="form-control validate-text" 
                                id="form4ac" 
                                placeholder="Contact Number" 
                                value="<?php echo isset($data) && $data? $data['contact_number']: ''; ?>"
                                required
                            >
                            <div class="icon">
                                <i class="ri-lock-password-line"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group icon-left">
                        <label>Password</label>
                        <div class="input_group">
                            <input 
                                type="password" 
                                name="data[User][password]" 
                                class="form-control validate-text" 
                                id="form3ac" 
                                placeholder="Choose Password" 
                                value="<?php echo isset($data) && $data? $data['password']: ''; ?>"
                                required
                            >
                            <div class="icon">
                                <i class="ri-lock-password-line"></i>
                            </div>
                        </div>
                        <div class="feedback-text">Password must be at least <span class="text-dark">8
                                characters</span> long.</div>
                    </div>
                    <div class="form-group icon-left">
                        <label>Confirm Password</label>
                        <div class="input_group">
                            <input 
                                type="password" 
                                name="data[User][password_confirm]" 
                                class="form-control validate-text" 
                                id="form4ac" 
                                placeholder="Confirm Password" 
                                value="<?php echo isset($data) && $data? $data['password_confirm']: ''; ?>"
                                required
                            >
                            <div class="icon">
                                <i class="ri-lock-password-line"></i>
                            </div>
                        </div>
                    </div>
                    <div class="" hidden>
                        <?php  
                        echo $this->Form->input('role', array(
                            'options' => array( 'User' => 'User')
                        ));
                        ?>
                    </div>
                </div>
                <div class="dividar"></div>
                <br>
                <button href="#" class="col-12 btn btn-sm-arrow bg-primary">
                    <p>Create Account</p>
                    <div class="ico">
                        <i class="ri-arrow-drop-right-line"></i>
                    </div>
                </button>
            <?php echo $this->Form->end(); ?>
        </section>
    
        
    </div>
</div>