<style media="screen">
#map {
    height: 650px;
    margin: 0px;
    padding: 0px;
    width:100%;
    background-color: red;
}
</style>
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
                <h1>Map</h1>
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
        
        <section>
            <div id="map"></div>

        </section>
    </div>
</div>
