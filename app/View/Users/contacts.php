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
                <h1>My Contacts</h1>
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
          START NFTS LIST
        ==================================== -->
        <section class="un-myItem-list">
            <nav class="nav flex-column">
                <?php if ($countEmerContactNo): ?>
                    <?php foreach ($countEmerContactNo as $key => $value): ?>
                        <div class="nav-link">
                            <div class="cover_img">
                                <div class="txt">
                                    <h2>
                                        <strong><?php echo $value['EmergencyContact']['fullname'] ?></strong>
                                        (<?php echo $value['EmergencyContact']['contact_number'] ?>)
                                    </h2>
                                    <p><?php echo $value['EmergencyContact']['message'] ?></p>
                                </div>
                            </div>
                            <div class="other-side">
                                <?php echo $this->Html->link(
                                    '<i class="ri-pencil-line"></i>', 
                                    array(
                                        'controller' => 'Users', 
                                        'action' => 'addContact', $value['EmergencyContact']['id']
                                    ),
                                    array(
                                        'escape' => false,
                                        'class' => 'out-link-edit'
                                    )
                                ); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </nav>
        </section>
        <!-- ===================================
          ADD NEW NFT
        ==================================== -->
        <div class="d-flex justify-content-center buttonSticky_add">
            <div class="item-add-NFTs-plus">
                <?php echo $this->Html->link(
                    '<i class="ri-add-fill"></i>', 
                    array(
                        'controller' => 'Users', 
                        'action' => 'addContact'
                    ),
                    array(
                        'escape' => false,
                        'class' => 'out-link-edit'
                    )
                ); ?>
            </div>
        </div>
    </div>
</div>