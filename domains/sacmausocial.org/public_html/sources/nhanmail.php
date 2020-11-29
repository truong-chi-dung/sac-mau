<?php if(!defined('_source')) die("Error");
	$title_bar .= " - Đăng ký";
	if(!empty($_POST)&&isset($_POST['guimail'])){
	$data1['dienthoai'] = $_POST['dienthoai'];
	$data1['noidung'] = $_POST['noidung'];
	$data1['ngaytao'] = time();
	$d->setTable('newsletter');
	if($d->insert($data1))
		transfer("Bạn đã đăng ký thành công<br/>Cảm ơn", "index.html");
	else
		transfer("Lưu dữ liệu bị lỗi", "index.html");
	}
?>