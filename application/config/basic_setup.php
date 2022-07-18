<?php
$weburl = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$weburl .= "://".$_SERVER['HTTP_HOST'];
$weburl .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
define('WEB_URL',$weburl.'');
define('WEB_PATH_APJS',$weburl.'assets/app_assets/');
define('WEB_PATH_FRONT',$weburl.'assets/web/');
define('WEB_PATH_ADMIN',$weburl.'assets/admin/');
define('WEB_ATTACHMENT_LOGO_PATH',$weburl.'logo/');
define('WEB_ATTACHMENT_PATH',$weburl.'uploads/');
define('WEB_ATTACHMENT_GALLERY',$weburl.'gallery/');
$rootPath = (isset($_SERVER['DOCUMENT_ROOT']))?$_SERVER['DOCUMENT_ROOT']:'/var/www/html/ctaoi';
define('ROOT_PATH',$rootPath.'/ctaoi/');
define('FILE_UPLOAD_PATH',$rootPath.'/uploads/');

?>
