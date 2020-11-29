<?php if(!defined('_source')) die("Error");

		
		if(!empty($_POST)){
		$file_name = images_name($_FILES['file']['name']);
		if($file_att = upload_image("file", 'doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|xlsx|jpg|png|gif|JPG|PNG|GIF', _upload_hinhanh_l,$file_name)){
			$data1['photo'] = $file_att;
			
		}

		include_once "phpMailer/class.phpmailer.php";	
		$mail = new PHPMailer();
		$mail->Priority = 1;
     	$mail->AddCustomHeader("X-MSMail-Priority: High");
		$mail->IsSMTP(); // Gọi đến class xử lý SMTP
		$mail->Host       = $config_ip; // tên SMTP server
		$mail->Port       = 587;
		$mail->SMTPDebug  = 0;
		$mail->SMTPAuth   = true; 
		$mail->SMTPSecure = "tls";                 // Sử dụng đăng nhập vào account
		$mail->Username   = $config_email; // SMTP account username
		$mail->Password   = $config_pass;  

		//Thiet lap thong tin nguoi gui va email nguoi gui
		$mail->SetFrom($row_setting['email'],$row_setting['ten_'.$lang]);
		
		$mail->AddAddress($row_setting['email'],$row_setting['ten_'.$lang]);
		
		/*=====================================
		 * THIET LAP NOI DUNG EMAIL
 		*=====================================*/

		//Thiết lập tiêu đề
		$mail->Subject    = '['.$_POST['ten'].']';
		$mail->IsHTML(true);
		//Thiết lập định dạng font chữ
		$mail->CharSet = "utf-8";	
			$body = '<table>';
			$body .= '
				<tr> 
					<th colspan="2">&nbsp;</th>
				</tr>

				<tr>
					<th colspan="2">Thư liên hệ từ website <a href="http://'.$config_url.'">www.'.$config_url.'</a></th>
				</tr>

				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>

				<tr>
					<th>Họ tên :</th><td>'.$_POST['ten'].'</td>
				</tr>

				<tr>
					<th>Điện thoại :</th><td>'.$_POST['dienthoai'].'</td>
				</tr>

				<tr>
					<th>Email :</th><td>'.$_POST['email'].'</td>
				</tr>
				
			
				<tr>
					<th>Nội dung :</th><td>'.$_POST['noidung'].'</td>
				</tr>
				<tr>
					<th>Tên sản phẩm :</th><td>'.$_POST['tensp'].'</td>
				</tr>
				<tr>
					<th>Link sản phẩm :</th><td>'.$_POST['linksp'].'</td>
				</tr>
				<tr>
					<th>Link hình :</th><td>'.$_POST['linkhinh'].'</td>
				</tr>
				<tr>
					<th>Số lượng :</th><td>'.$_POST['soluong'].'</td>
				</tr>
				<tr>
					<th>Màu sắc :</th><td>'.$_POST['mausac'].'</td>
				</tr>
				<tr>
					<th>Phương thức thanh toán :</th><td>'.$_POST['hinhthuctt'].'</td>
				</tr>
				';
			$body .= '</table>';

			$data1['ten'] = $_POST['ten'];
			$data1['diachi'] = $_POST['diachi'];
			$data1['dienthoai'] = $_POST['dienthoai'];
			$data1['email'] = $_POST['email'];
			$data1['noidung'] = $_POST['noidung'];

			$data1['tensp'] = $_POST['tensp'];
			$data1['linksp'] = $_POST['linksp'];
			$data1['linkhinh'] = $_POST['linkhinh'];
			$data1['soluong'] = $_POST['soluong'];
			$data1['mausac'] = $_POST['mausac'];
			$data1['hinhthuctt'] = $_POST['hinhthuctt'];

			$data1['stt'] = $_POST['stt'];

			$data1['ngaytao'] = time();
			$d->setTable('dathen');
			$d->insert($data1);

				
			$mail->Body = $body;

			if($data1['photo']){
				$mail->AddAttachment(_upload_hinhanh_l.$data1['photo']);
			}
		
			
			if($mail->Send())
			{	
				transfer("Thông tin đặt hàng được gửi . Cảm ơn bạn !.", "trang-chu.html");
			} else {
				transfer("Xin lỗi quý khách.<br>Hệ thống bị lỗi, xin quý khách thử lại.", "dat-hang-theo-yeu-cau.html",false);
			}
		}
			
	
?>