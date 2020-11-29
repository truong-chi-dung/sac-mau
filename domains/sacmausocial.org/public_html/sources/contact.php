<?php if(!defined('_source')) die("Error");
		
		$d->reset();
		$sql = "select noidung_$lang,title,keywords,description from #_company where type='lienhe' ";
		$d->query($sql);
		$row_detail = $d->fetch_array();
		
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
			$mail->SMTPDebug  = 0;
			$mail->SMTPAuth   = true; 
			$mail->Username   = $config_email; // SMTP account username
			$mail->Password   = $config_pass;  

			//Thiet lap thong tin nguoi gui va email nguoi gui
			$mail->SetFrom($config_email,$row_setting['ten_'.$lang]);

			$mail->AddAddress($row_setting['email'],$row_setting['ten_'.$lang]);
			$mail->AddAddress($_POST['email'],$_POST['ten']);
			
			/*=====================================
			 * THIET LAP NOI DUNG EMAIL
				*=====================================*/

			//Thiết lập tiêu đề
			$mail->Subject    = '['.$_POST['ten'].']';
			$mail->IsHTML(true);
			//Thiết lập định dạng font chữ
			$mail->CharSet = "utf-8";	
				$body = '<table style="min-width: 525px;border-spacing: 0;border-collapse: collapse;">';
				$body .= '
					<tr> 
						<th style="background: #09c;color: #fff;text-transform: uppercase;text-align: center;padding: 10px 0px;" colspan="2">Thông tin liên hệ '.$row_setting['ten_vi'].'</th>
					</tr>
					<tr>
						<th style="text-align: left;border: 1px solid #ccc;padding: 5px;">Họ tên </th><td style="padding: 0;border: 1px solid #ccc;padding: 10px;">'.$_POST['ten'].'</td>
					</tr>

					<tr>
						<th style="text-align: left;border: 1px solid #ccc;padding: 5px;">Điện thoại </th><td style="padding: 0;border: 1px solid #ccc;padding: 10px;">'.$_POST['dienthoai'].'</td>
					</tr>

					<tr>
						<th style="text-align: left;border: 1px solid #ccc;padding: 5px;">Email </th><td style="padding: 0;border: 1px solid #ccc;padding: 10px;">'.$_POST['email'].'</td>
					</tr>
					<tr>
						<th style="text-align: left;border: 1px solid #ccc;padding: 5px;">Tiêu đề </th><td style="padding: 0;border: 1px solid #ccc;padding: 10px;">'.$_POST['tieude'].'</td>
					</tr>

					<tr>
						<th style="text-align: left;border: 1px solid #ccc;padding: 5px;">Nội dung </th><td style="padding: 0;border: 1px solid #ccc;padding: 10px;">'.$_POST['noidung'].'</td>
					</tr>
					<tr> 
						<th style="border: 1px solid #ccc;text-transform: uppercase;text-align: center;padding: 5px 0px;" colspan="2">Website '.$row_setting['website'].'</th>
					</tr>'
					;
				$body .= '</table>';

				$data1['ten'] = $_POST['ten'];
				$data1['diachi'] = $_POST['diachi'];
				$data1['dienthoai'] = $_POST['dienthoai'];
				$data1['email'] = $_POST['email'];
				$data1['tieude'] = $_POST['tieude'];
				$data1['noidung'] = $_POST['noidung'];
				$data1['stt'] = $_POST['stt'];
				$data1['type'] = 'lienhe';

				$data1['ngaytao'] = time();
				$d->setTable('contact');
				$d->insert($data1);

					
				$mail->Body = $body;

				if($data1['photo']){
					$mail->AddAttachment(_upload_hinhanh_l.$data1['photo']);
				}
			
				
				if($mail->Send())
				{	
					transfer("Thông tin liên hệ được gửi . Cảm ơn.", "index.html");
				} else {
					transfer("Xin lỗi quý khách.<br>Hệ thống bị lỗi, xin quý khách thử lại.", "lien-he.html",false);
				}
		}
			
	
?>