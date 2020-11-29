<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "capnhat":
		get_gioithieu();
		$template = "setting/item_add";
		break;
	case "save":
		save_gioithieu();
		break;
		
	default:
		$template = "index";
}

function get_gioithieu(){
	global $d, $item;

	$sql = "select * from #_setting limit 0,1";
	$d->query($sql);
	//if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item = $d->fetch_array();
}

function save_gioithieu(){
	global $d;
	$file_name=images_name($_FILES['file']['name']);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=setting&act=capnhat");
		
	if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_hinhanh,$file_name)){
		$data['photo'] = $photo;	
	}
	
	$data['ten_vi'] = $_POST['ten_vi'];
	$data['ten_en'] = $_POST['ten_en'];
	$data['ten_cn'] = $_POST['ten_cn'];
	$data['slogan_vi'] = $_POST['slogan_vi'];
	$data['slogan_en'] = $_POST['slogan_en'];
	$data['diachi_vi'] = $_POST['diachi_vi'];	
	$data['diachi_en'] = $_POST['diachi_en'];
	$data['diachi_cn'] = $_POST['diachi_cn'];
	$data['sang'] = $_POST['sang'];
	$data['chieu'] = $_POST['chieu'];
	$data['thu2'] = $_POST['thu2'];
	$data['chunhat'] = $_POST['chunhat'];
	$data['tenph'] = $_POST['tenph'];
	$data['dienthoaiph'] = $_POST['dienthoaiph'];
	$data['emailph'] = $_POST['emailph'];
	
	$data['datve'] = $_POST['datve'];
	upload_image("dongdau", 'png', '../upload/','watermark');


	$data['dienthoai'] = $_POST['dienthoai'];
	$data['email'] = $_POST['email'];
	$data['website'] = $_POST['website'];
	
	$data['facebook'] = $_POST['facebook'];
	$data['twitter'] = $_POST['twitter'];
	$data['google'] = $_POST['google'];
	$data['youtube'] = $_POST['youtube'];
	$data['toado'] = $_POST['toado'];
	$data['toado1'] = $_POST['toado1'];
	$data['toado2'] = $_POST['toado2'];
	$data['hotline'] = $_POST['hotline'];
	$data['sanpham'] = $_POST['sanpham'];
	
	$data['scriptcode'] = magic_quote($_POST['scriptcode']);
	$data['scriptcode_body'] = magic_quote($_POST['scriptcode_body']);
	$data['title'] = $_POST['title'];
	$data['keywords'] = $_POST['keywords'];
	$data['description'] = $_POST['description'];							
							
	$d->reset();
	$d->setTable('setting');
	if($d->update($data))
		header("Location:index.php?com=setting&act=capnhat");
	else
		transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=setting&act=capnhat");
}

?>