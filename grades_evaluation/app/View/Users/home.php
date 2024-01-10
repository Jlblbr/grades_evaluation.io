<?php  
$whitelist = array( '127.0.0.1', '::1' );
// check if the server is in the array
if ( in_array( $_SERVER['REMOTE_ADDR'], $whitelist ) ) {
	$baseUrl = $this->Html->webroot;
} else {
	$baseUrl = 'https://church.infinityfreeapp.com/';
}
?>
<style media="screen">
    .panic-btn {
        outline: none;
        font-family: 'helvetica neue' sans-serif;
        font-size: 2em;
        color: hsla(350,0%,100%,1);
        text-shadow: -1px -1px 1px hsl(0deg 0% 0% / 70%), 1px 1px 1px hsl(0deg 0% 100% / 30%);
        display: block;
        margin: 2em auto;
        padding: 23px 37px 25px 35px;
        cursor: pointer;
        background-color: hsla(350,80%,10%,1);
        background-image: linear-gradient(273deg,hsla(350,80%,60%,1) 30%, hsla(350,80%,50%,1) 40%);
        border: none;
        border-radius: 16px;
        box-shadow: inset 0px 0px 1px 1px hsla(350,80%,30%,0.9), 
            inset 0px 0px 2px 3px hsla(350,80%,50%,0.9), 
            inset 1px 1px 1px 4px hsla(350,80%,100%,0.8), 
            inset 0px 0px 2px 7px hsla(350,80%,60%,0.8), 
            inset 0px 0px 4px 10px hsla(350,80%,50%,0.9), 
            8px 10px 2px 6px hsla(350,80%,20%,0.55), 
            0px 0px 3px 2px hsla(350,80%,40%,0.9), 
            0px 0px 2px 6px hsla(350,80%,50%,0.9), 
            /*0px 0px 2px 3px hsla(350,80%,60%,0.9),*/ 
            -1px -1px 1px 6px hsla(350,80%,100%,0.9), 
            /*0px 0px 2px 8px hsla(350,80%,60%,0.9),*/ 
            0px 0px 2px 11px hsla(350,80%,50%,0.9), 
            0px 0px 1px 12px hsla(350,80%,40%,0.9), 
            1px 3px 14px 14px hsla(350,80%,0%,0.4);
    }

    .panic-btn:active {
        color: hsla(350, 0%, 85%, 1);
        padding: 26px 34px 22px 38px;
        background-image: linear-gradient(
            273deg,
            hsla(350, 80%, 50%, 1) 50%,
            hsla(350, 80%, 55%, 1) 60%
        );
        box-shadow: inset 3px 4px 3px 2px hsla(350, 80%, 20%, 0.55),
        inset 0px 0px 1px 1px hsla(350, 80%, 30%, 0.9),
        inset -1px -1px 2px 3px hsla(350, 80%, 50%, 0.9),
        inset -2px -2px 1px 3px hsla(350, 80%, 100%, 0.8),
        inset 0px 0px 2px 7px hsla(350, 80%, 60%, 0.8),
        inset 0px 0px 3px 10px hsla(350, 80%, 50%, 0.9),
        0px 0px 3px 2px hsla(350, 80%, 40%, 0.9),
        0px 0px 2px 6px hsla(350, 80%, 50%, 0.9),
        /*0px 0px 2px 3px hsla(350,80%,60%,0.9),*/ -1px -1px 1px 6px
        hsla(350, 80%, 100%, 0.9),
        /*0px 0px 2px 8px hsla(350,80%,60%,0.9),*/ 0px 0px 2px 11px
        hsla(350, 80%, 50%, 0.9),
        0px 0px 1px 12px hsla(350, 80%, 40%, 0.9),
        1px 3px 14px 14px hsla(350, 80%, 0%, 0.4);
    }
</style>
<div id="wrapper">
    <!-- START CONTENT -->
    <div id="content">
        <!-- ===================================
          START THE HEADER
        ==================================== -->
        <header class="default heade-sticky border-b-gradient">
            <a href="index.html">
                <div class="un-item-logo">
                    <!-- <img class="logo-img light-mode" src="<?php echo $baseUrl ; ?>img/images/logo_b.svg" alt="">
                    <img class="logo-img dark-mode" src="<?php echo $baseUrl ; ?>img/images/logo-white.svg" alt=""> -->
                </div>
            </a>
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
          EMEGENCY BUTTON
        ==================================== -->
        <section  class="un__listPages_started" id="btn-emergency">
            <a class="btn panic-btn" data-bs-toggle="modal" data-bs-target="#modal-emergency" data-menu=""><b>Emergency Button</b></a>
        </section>
    </div>
    
    <section class="un-page-components">
        <div class="un-title-default">
            <div class="text">
                <h2>Terms and Conditions</h2>
                <code>Effective April 2022</code>
                <p>These Terms and Conditions are a legal agreement between Notice Me and you which govern your access and use of the Notice Me App.</p>
            </div>
        </div>
        <div class="content-comp p-0">
            <div class="space-items"></div>
            <div class="bg-white padding-20">
                <h6>
                    1. Terms
                </h6>
                <p>
                    You can indicate your acceptance by clicking on the appropriate button below, 
                    or by downloading, installing and using Notice Me App, you agree to be bound by these Terms of Use.
                </p>
                <br>
                <h6>
                    2. Notice Me Terms of Use
                </h6>
                <p>
                    Notice Me is an application that is built to send an emergency text message that includes the location of the phone and the user. 
                    Upon signing up, the user needs to provide their name, email address, contact number and password. 
                    It helps women to cope up in distress or emergency situation by launching the app and by simply clicking 
                    the emergency button which will alert it's added contact by means of text messages.
                </p>
                <p>
                    We don't sell your personal data to advertisers and we don't sell 
                    information that directly identifies you (such as name, email address and contact number). 
                    We guarantee that all information you provided in the app will be protected and secured. 
                    If there is any concern, you can reach out for us at ymarialouise@gmail.com
                </p>
                
            </div>
            <div class="space-items"></div>
        </div>
        <!-- End.content-comp -->
    </section>
    
    
    <section class="un-page-components" style="display:none">
        <div class="un-title-default">
            <div class="text">
                <h2>Modal</h2>
                <p>Enjoy many models</p>
            </div>
        </div>
        <div class="content-comp p-0">
            <!-- un-title-default -->
            <div class="un-title-default py-3">
                <div class="text">
                    <h2 class="m-0 size-15 weight-500">Add ETH</h2>
                </div>
                <div class="un-block-right">
                    <button type="button" id="btn-modal" class="btn btn-md-size bg-primary text-white rounded-pill"
                        data-bs-toggle="modal" data-bs-target="#mdllAddETH">
                        Click!
                    </button>
                </div>
            </div>
        </div>
        <!-- End.content-comp -->
    </section>
    
    <!-- ===================================
      START THE BOTTOM NAVIGATION
    ==================================== -->
    <?php echo $this->element('mobile/footer');?>
</div>

<!-- ===================================
  START THE ADD ETH MODAL
==================================== -->
<div class="modal transition-bottom screenFull defaultModal mdlladd__rate fade" id="mdllAddETH" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="title-modal">Reminder</h1>
                <button type="button" class="btn btnClose" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ri-close-fill"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="content-upload-item">
                    <p class="text-center">
                        This system will collect you information like location when you activate your emergency buton
                    </p>
                    <div class="un-navMenu-default margin-t-30 p-0">
                        <ul class="nav flex-column">
                            <li class="nav-item mb-3">
                                <?php echo $this->Html->link(
                                    '<div class="item-content-link">
                                        <div class="icon color-text w-auto">
                                            <i class="ri-exchange-box-line"></i>
                                        </div>
                                        <h3 class="link-title">Ok I understand the consequences</h3>
                                    </div>
                                    <div class="other-cc">
                                        <span class="badge-text"></span>
                                        <div class="icon-arrow">
                                            <i class="ri-arrow-drop-right-line"></i>
                                        </div>
                                    </div>', 
                                    array(
                                        'controller' => 'Users', 
                                        'action' => 'newVissitFlagSet'
                                    ),
                                    array(
                                        'escape' => false,
                                        'class' => 'nav-link effect-click'
                                    )
                                ); ?>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>
            <div class="modal-footer border-0">
                <div class="env-pb"></div>
            </div>
        </div>
    </div>
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
                        <a  href="javascript: void(0)" id="getLocation" class="btn btn-create bg-white border border-solid border-snow text-dark">
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
                        <a  href="javascript: void(0)" id="modalstopTracking" class="btn btn-create bg-white border border-solid border-snow text-dark">
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
