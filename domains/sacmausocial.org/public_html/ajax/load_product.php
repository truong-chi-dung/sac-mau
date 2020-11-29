<?php
	session_start();
	error_reporting(E_ALL & ~E_NOTICE & ~8192);
	@define ( '_source' , '../sources/');
	@define ( '_lib' , '../libraries/');
    if(!isset($_SESSION['value']))
	{
		$_SESSION['value']='1';
	}	
	if(!isset($_SESSION['lang']))
	{
		$_SESSION['lang']='vi';
	}
	$lang='vi';
	include_once _lib."config.php";
	include_once _lib."constant.php";;
	include_once _source."lang_$lang.php";
	include_once _lib."functions.php";
	include_once _lib."functions_giohang.php";
	include_once _lib."class.database.php";
	$d = new database($config['database']);
	include_once _lib."file_requick.php";
	$page=$_POST['page'];
	$startpoint = ($page * 8) - 8;
    $endpoint = 8;
    $d->reset();
	$sql = "select tenkhongdau,photo,ten_$lang,giaban,mota_$lang from #_product where type='product' and hienthi=1 and noibat=1 order by stt asc limit ".$startpoint.",".$endpoint;
	$d->query($sql);
	$product = $d->result_array();
	get_product($product,'','san-pham');
?>
