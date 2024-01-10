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
                <h1>Notification</h1>
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
                            'class' => 'active',
                            'aria-label' => 'activity'
                        )
                    ); ?>
                </div>
            </div>
        </header>
        <!-- ===================================
          START THE SPACE STICKY
        ==================================== -->
        <div class="space-sticky"></div>
        <!-- ===================================
          START THE ACTIIVITY PAGE
        ==================================== -->
        <section class="margin-t-20 un-activity-page">
            <div class="content-activity">
                <!-- New -->
                <div class="head">
                    <div class="title">New</div>
                </div>
                <div class="body">
                    <ul class="nav flex-column">
                        <?php  
                        if (!empty($notifications)) {
                            foreach ($notifications as $key => $notification) {
                                $userInfoFrom = json_decode($notification['Notification']['user_info_from']);
                                $message = isset($userInfoFrom->message) && $userInfoFrom->message? $userInfoFrom->message: '';
                                $notiuserId = $userInfoFrom->user_id;
                                $emegencyLocationId = $userInfoFrom->id;
                                
                                $notiFullname = '';
                                
                                if (isset($notification['Notification']['user_data']) && !empty($notification['Notification']['user_data'])) {
                                    $userData = $notification['Notification']['user_data'];
                                    $notiFullname = $userData['first_name'].' '.$userData['middle_name'].' '.$userData['last_name'];
                                }
                                
                                ?>
                                <li class="nav-item">
                                    <?php echo $this->Html->link(
                                        '<div class="item-user-img">
                                            <div class="wrapper-image">
                                                <picture>
                                                    <source srcset="'. $baseUrl  .'img/warning.webp" type="image/webp">
                                                    <img class="avt-img" src="'. $baseUrl  .'img/warning.png" alt="">
                                                </picture>
                                                <!-- <div class="icon"><i class="ri-checkbox-circle-fill"></i></div> -->
                                            </div>
                                            <div class="txt-user">
                                                <h5>'. $notiFullname .' 
                                                    <span class="color-text">Need Help</span>
                                                </h5>
                                                <p>'. $message .'</p>
                                                <!-- <p>Just now</p> -->
                                            </div>
                                        </div>', 
                                        array(
                                            'controller' => 'Users', 
                                            'action' => 'map', $notiuserId, $emegencyLocationId, $notification['Notification']['id']
                                        ),
                                        array(
                                            'escape' => false,
                                            'class' => 'nav-link'
                                        )
                                    ); ?>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>

            <!-- lds-spinner -->
            <!-- <div class="loader-items">
                <div class="lds-spinner">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div> -->

        </section>
    </div>
</div>