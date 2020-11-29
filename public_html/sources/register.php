<?php if(!defined('_source')) die("Error");
		$title_bar .= "Đăng ký thành viên";

		$time =  time();
		
		
		$sql = "select id from #_thanhvien";		
		$sql.=" order by id desc";
		$d->query($sql);
		$items = $d->result_array();
	
		$matv=$items[0]['id']+1; 
		$mathanhvien='TV'.str_pad($matv, 8, "0", STR_PAD_LEFT);
		
	
		$info=$_POST['info_member'];
		//$vl =  $_SESSION['login']['id_thanhvien'];
		
		if(isset($_POST) && $_POST['email']!=''){
		
		
		if($_SESSION['login']['mathanhvien']==''){
		
		$captcha = $info['mabaove'];

			
	
		if($captcha == NULL)
		 {
		  $loi=" Bạn Chưa Nhập Mã Xác Nhận .";
		 }
		 
		
		 
		if($captcha!=$_SESSION['code_security'])
		 {
		    transfer('Mã bảo vệ không đúng, vui lòng thử lại!',$_SESSION['links']);
		   
		 } else {
			 
		$reguser = $_POST['email'];
	
		$id_name = $_POST['hoten'];
		
		$d->reset();
		$sql = "select id from #_thanhvien where email='$reguser'";
		$d->query($sql);
		$kiemmail = $d->result_array();
		$count_km = count($kiemmail);
		
		/*$d->reset();
		$sql = "select id from #_thanhvien where thanhvien='$id_name'";
		$d->query($sql);
		$kiem_id = $d->result_array();*/
		
		$d->reset();
		$sql = "select id from #_phanquyen order by stt asc";
		$d->query($sql);
		$quyen = $d->result_array();
		
		//$count_kid = count($kiem_id);
		
		if ($count_km > 0)
		{
       	 	echo "<script>alert('Email Đã Tồn Tại . vui lòng chọn email khác');</script>";
		}
	
		else 
		{
		
			
		if($_POST['password']!='')
		{
		$data['password'] = md5($_POST['password']);
		}

		$file_name=images_name($_FILES['file']['name']);
			if($photo = upload_image("file", 'jpg|jpeg|png|JPG|JPEG|PNG', _upload_thanhvien_l,$file_name)){
				$data['photo'] = $photo;		
				
			}
			
		$data['email'] = $_POST['email'];
		//$data['thanhvien'] = $_POST['hoten'];
		$data['ten'] = $_POST['hoten'];
		$data['ngaysinh'] = $_POST['ngaysinh'];
		$data['dienthoai'] = $_POST['dienthoai'];
		$data['diachi'] = $_POST['diachi'];
		$data['sex'] = $_POST['gioitinh'];
		$data['nguoigt'] = $_POST['nguoigt'];
		//$data['sotaikhoan'] = $_POST['sotaikhoan'];
		//$data['chutaikhoan'] = $_POST['chutaikhoan'];
		
		$data['mathanhvien'] = $mathanhvien;
		//$data['quyen'] = $quyen[0]['id'];
		$data['ngaytao'] = time();
		$data['hienthi'] = 0;
		$d->setTable('thanhvien');
		$email  = $_POST['email'];
			
		include_once "phpMailer/class.phpmailer.php";	
		$mail = new PHPMailer();
		$mail->IsSMTP(); // Gọi đến class xử lý SMTP
		$mail->Host       = "116.193.76.23"; // tên SMTP server  
		$mail->SMTPAuth   = true;                  // Sử dụng đăng nhập vào account
		$mail->Username   = "demo34"; // SMTP account username
		$mail->Password   = "UwtWVTUhun";  

		//Thiet lap thong tin nguoi gui va email nguoi gui
		$mail->SetFrom('support@vnhieu.vn',$row_setting['ten_'.$lang]);

		//Thiết lập thông tin người nhận
		$mail->AddAddress($_POST['email'], $_POST['hoten']);
	
		//Thiết lập email nhận email hồi đáp
		//nếu người nhận nhấn nút Reply
		$mail->AddReplyTo($row_setting['email'],$row_setting['ten_'.$lang]);
	
		/*=====================================
		 * THIET LAP NOI DUNG EMAIL
 		*=====================================*/

		//Thiết lập tiêu đề
		$mail->Subject    = "Xác Nhận Tài Khoản  . ";
		$mail->IsHTML(true);
		//Thiết lập định dạng font chữ
		$mail->CharSet = "utf-8";	

			$body = '<table style="text-align:left;">';
			$body .= '
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="2">Bạn '.$_POST['hoten'].' Thân  Mến ! </td>
				</tr>
				<tr>
					<td colspan="2">Cảm ơn bạn đã đăng ký thành viên trên http://'.$config_url.'/ . Để kích hoạt tài khoản thành viên , bạn vui lòng nhấn vào liên kết dưới đây: </td>
				</tr>
				<tr>
					<td colspan="2"><a href="http://'.$config_url.'/kich-hoat-mail/'.$mathanhvien.'.htm">http://'.$config_url.'/kich-hoat-mail/'.$mathanhvien.'.htm</a></td>
				</tr>
				
				<tr>
					<th width="100px">Tên truy cập :</th><td> <a href="mailto:'.$_POST['email'].'">'.$_POST['email'].'</a></td>
				</tr>
				<tr>
					<th width="100px">Mật khẩu : </th><td>'.$_POST['password'].'</td>
				</tr>
				<tr><td colspan="2">&nbsp;</td></tr>
				<tr>
					<td colspan="2"><i><b>Lưu Ý </b> : Đây là thư hổ trợ tự động , mọi phản hồi về mail này điều không được duyệt .</i></td>
				</tr>
				
				';
			$body .= '</table>';
			
			$mail->Body = $body;
			
		if($d->insert($data))
		{
			if($mail->Send()) {
			transfer("Bạn đã đăng ký thành công<br/>Vui lòng vào email kích hoạt tài khoản", "trang-chu.html");
			}
			else 
			{
				echo "<script>alert('Đăng Ký Không Thành Công .Vui lòng đăng ký lại .');</script>";
			}
			
		}
		else
			echo "<script>alert('Đăng Ký Không Thành Công .Vui lòng đăng ký lại .');</script>";
		}
		}
		} 
		}
		
	
?>