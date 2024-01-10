<?php  
$whitelist = array( '127.0.0.1', '::1' );
// check if the server is in the array
if ( in_array( $_SERVER['REMOTE_ADDR'], $whitelist ) ) {
	$baseUrl = $this->Html->webroot;
} else {
	$baseUrl = 'https://church.infinityfreeapp.com/';
}
?>
<script type="text/javascript">
$('#menu-hider').removeClass('menu-active');
$('.menu-hider').removeClass('menu-active');
// window.location.reload('/logout');
window.location.href = '<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'logout')); ?>';
</script>