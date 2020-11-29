<?php	if(!defined('_source')) die("Error");
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";



switch($act){
	case "man":
		get_items();
		$template = "toado/items";
		break;
	
	case "add":

		$template = "toado/item_add";
		break;
	
	case "edit":
		get_item();
		$template = "toado/item_add";
		break;	
		
	case "send":
		send();
		break;
	
	case "save":
		save_item();
		break;	
	
	case "delete":
		delete();
		break;	

		
	default:
		$template = "index";
}

function get_items(){
	global $d, $items;

	$where = " #_toado ";

	if($_REQUEST['keyword']!='')
	{
		$keyword=addslashes($_REQUEST['keyword']);
		$where.=" and ten LIKE '%$keyword%'";
	}
	$where .=" order by id desc";

	$sql = "select * from $where";
	$d->query($sql);
	// if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$items = $d->result_array();
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=toado&act=man");
	
	$sql = "select * from #_toado where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=toado&act=man");
	$item = $d->fetch_array();
}

function save_item(){
	global $d;
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=toado&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$data['ten'] = $_POST['ten'];
		$data['diachi'] = $_POST['diachi'];
		$data['toado'] = $_POST['toado'];
		$data['dienthoai'] = $_POST['dienthoai'];
		$data['id_quan'] = $_POST['id_cat'];
		$data['id_tinh'] = $_POST['id_list'];
		$data['id_hethong'] = $_POST['id_hethong'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		
		$d->setTable('toado');
		$d->setWhere('id', $id);
		if($d->update($data))
				redirect("index.php?com=toado&act=man");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=toado&act=man");
	}else{
		
		$data['ten'] = $_POST['ten'];
		$data['diachi'] = $_POST['diachi'];
		$data['toado'] = $_POST['toado'];
		$data['dienthoai'] = $_POST['dienthoai'];
		$data['id_quan'] = $_POST['id_cat'];
		$data['id_tinh'] = $_POST['id_list'];
		$data['id_hethong'] = $_POST['id_hethong'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('toado');
		if($d->insert($data))
			redirect("index.php?com=toado&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=toado&act=man");
	}
}


function delete(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$sql = "delete from #_toado where id='".$id."'";
		$d->query($sql);
		if($d->query($sql))
			redirect("index.php?com=toado&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=toado&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=toado&act=man");
	
		
}





?>