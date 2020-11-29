<?php if(!defined('_source')) die("Error");
		
		$title_bar .= "Tài Khoản  thành viên";		
		if($_SESSION['login']['thanhvien']==''){
			transfer("Bạn phải đăng nhập mới được vào đây .", "http://$config_url/dang-nhap.html");
		}
		
		$vl =  addslashes($_SESSION['login']['id_thanhvien']);
		
		$d->reset();
		$sql = "select * from #_thanhvien where  id = '".$_SESSION['login']['id_thanhvien']."' ";
		$d->query($sql);
		$thanhvien1 = $d->result_array();
		
		
		if($vl==0){
			transfer("Thành viên không tồn tại . <br/>Cảm ơn", "../trang-chu.html");
		}
	
		if(isset($_POST) && $_POST['email']){
		
	
		$reguser = $_POST['email'];
		$sql_reguser = "select * from #_thanhvien where email='$reguser'";
		$d->query($sql_reguser);
		$usercheck = $d->result_array();
		$count_usercheck = count($usercheck);
		
		if($_SESSION['login']['thanhvien']!=''){
		if(md5($_POST['password'])!=$thanhvien1[0]['password'])
		{
			alert('Password không đúng mời bạn nhập lại password');
		
		}else {

		$data['email'] = $_POST['email'];
		$data['ten'] = $_POST['hoten'];
		$data['dienthoai'] = $_POST['dienthoai'];
		$data['diachi'] = $_POST['diachi'];
		$data['sex'] = $_POST['gioitinh'];
		$data['nguoigt'] = $_POST['nguoigt'];

		
		$d->setTable('thanhvien');
		$d->setWhere('id', $vl);
		if($d->update($data))
			transfer("Bạn đã cập nhật thông tin thành công<br/>Cảm ơn", "index.html"); 
		else
			transfer("Lưu dữ liệu bị lỗi", "Dang-ky.html");
		}
		}
	}
		
?>