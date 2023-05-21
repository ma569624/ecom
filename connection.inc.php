<?php
session_start();
$con = mysqli_connect("localhost","root","","ecom");

define ('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/mypojects/AdminTheme/media/product');
define ('SITE_PATH','http://127.0.0.1/mypojects/AdminTheme/media/product');

define ('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'/product');
define ('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'/product');
?>