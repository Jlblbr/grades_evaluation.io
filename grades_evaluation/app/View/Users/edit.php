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
                        'action' => 'login'
                    ),
                    array(
                        'escape' => false,
                        'class' => 'icon'
                    )
                ); ?>
            </div>
        </header>
        <!-- ===================================
          START THE SPACE STICKY
        ==================================== -->
        <div class="space-sticky"></div>
        <!-- ===================================
           START THE CONTENT
        ==================================== -->
        
        <?php echo $this->Form->create('User'); ?>
        <section class="un-page-components">
            <div class="un-title-default">
                <div class="text">
                    <h2>Input Fields</h2>
                    <p>Default examples of input forms</p>
                </div>
            </div>
            <div class="content-comp p-0">
                <?php 
                echo $this->Form->hidden('id', array('value' => $this->data['User']['id']));
                echo $this->Form->hidden('username', array( 'readonly' => 'readonly', 'label' => 'Usernames cannot be changed!'));
                echo $this->Form->hidden('email');
                
                ?>
                <div class="padding-20 form-edit-profile bg-white">
                    <div class="form-group">
                        <?php 
                        echo $this->Form->input('password_update', array( 
                            'label' => 'New Password (leave empty if you do not want to change)', 
                            'maxLength' => 255, 
                            'type'=>'password',
                            'required',
                            'class' => 'form-control',
                            'placeholder' => 'Enter new password'
                        ));
                        ?>
                    </div>
                    
                    <div class="form-group">
                        <?php 
                        echo $this->Form->input('password_confirm_update', array(
                            'label' => 'Confirm New Password *', 
                            'maxLength' => 255, 
                            'title' => 'Confirm New password', 
                            'type'=>'password',
                            'required',
                            'class' => 'form-control',
                            'placeholder' => 'Enter new password'
                        ));
                        ?>
                    </div>

                    <?php  
                    echo $this->Form->hidden('role', array(
                        'options' => array( 'User' => 'User')
                    ));
                    ?>
                    
                    <footer class="footer-pages-forms">
                        <div class="content">
                            <button class="col-12 btn btn-bid-items">
                                <p>Save Data</p>
                                <div class="ico">
                                    <i class="ri-arrow-drop-right-line"></i>
                                </div>
                            </button>
                        </div>
                    </footer>

                </div>

                <div class="space-items"></div>
            </div>
            <!-- End.content-comp -->
        </section>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
