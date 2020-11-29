<?php  if(!defined('_source')) die("Error");	
	if(!empty($_POST)){
		
			$info=$_POST['info_member'];
			$pass = $info['password'];
			
			$sql = "select * from #_thanhvien where id='".$_SESSION['login']['id_thanhvien']."' and password='".md5($pass)."'";
			$d->query($sql);
			$rows = $d->fetch_array();

			if(empty($rows)) transfer('Mật khẩu không chính xác!',$_SESSION['links']);
			
			if($info['new_password']!='')
			{
				$data['password'] = md5($info['new_password']);
			}else{
				transfer('Thao tác bị lỗi!',$_SESSION['links']);
			}
			
			$d->setTable('thanhvien');
			$d->setWhere('id', $_SESSION['login']['id_thanhvien']);
			if($d->update($data)){
				unset($_SESSION['login']);
				transfer('Cập nhật mật khẩu thành công!','http://'.$config_url.'/dang-nhap.html');
			}
		}
?>