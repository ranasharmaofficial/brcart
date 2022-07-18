
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="<?php echo $this->security->get_csrf_hash(); ?>">
	<meta name="weburl" content="<?php echo WEB_URL;?>">
	<title><?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'Home';?></title>
	<link rel="icon"  type="image/x-icon" href="<?php echo WEB_PATH_ADMIN.'img/favicon.png?v='.CSS_JS_VERSION;?>"/>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo WEB_PATH_ADMIN; ?>plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bootstrap 4 -->
	<link rel="stylesheet" href="<?php echo WEB_PATH_ADMIN; ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?php echo WEB_PATH_ADMIN; ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- JQVMap -->
	<link rel="stylesheet" href="<?php echo WEB_PATH_ADMIN; ?>plugins/jqvmap/jqvmap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo WEB_PATH_ADMIN; ?>css/adminlte.min.css">
	<link rel="stylesheet" href="<?php echo WEB_PATH_ADMIN; ?>css/custom.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
	<script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
	<link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
	<!---Gallery Light Box ---->
	<link rel="stylesheet" href="<?php echo WEB_PATH_ADMIN; ?>plugins/ekko-lightbox/ekko-lightbox.css">
	<!-- overlayScrollbars -->

	<link rel="stylesheet" href="<?php echo WEB_PATH_ADMIN; ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<script>
        window.addEventListener('load', function(){
    var allimages= document.getElementsByTagName('img');
    for (var i=0; i<allimages.length; i++) {
        if (allimages[i].getAttribute('data-src')) {
            allimages[i].setAttribute('src', allimages[i].getAttribute('data-src'));
        }
    }
}, fal
    </script> 
</head>
