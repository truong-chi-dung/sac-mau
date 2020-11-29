<script type="text/javascript" language="javascript">
	function nhantin(){
		document.submit_nhantin.submit();
	}
	
</script>
<?php
	if(isset($_POST['tencanhan']))
	{		
		$tencanhan = $_POST['tencanhan'];	
		$tentochuc = $_POST['tentochuc'];	
		$mstncc = $_POST['mstncc'];	
		$taichinh = $_POST['taichinh'];	
		$cosovatchat = $_POST['cosovatchat'];	
			
		$choduansacmautuoitho = $_POST['choduansacmautuoitho'];
		$hocbongsacmau = $_POST['hocbongsacmau'];
		$clbtienganh = $_POST['clbtienganh'];
		$clbmentor = $_POST['clbmentor'];
		$dktrothanhmember = $_POST['dktrothanhmember'];
		$dienthoaincc = $_POST['dienthoaincc'];	
		$tinhnguyenvien = $_POST['tinhnguyenvien'];	
		$emailncc = $_POST['emailncc'];		
		// $smtt = $_POST['smtt'];	
		// $hbsm = $_POST['hbsm'];	
		// $tasm = $_POST['tasm'];	
		$member = $_POST['member'];	
		$noidung = $_POST['noidung'];	
		include_once "phpMailer/class.phpmailer.php";	
		$mail = new PHPMailer();
		$mail->IsSMTP(); 				// Gọi đến class xử lý SMTP
		$mail->Host       = $config_ip; // tên SMTP server
		$mail->SMTPDebug  = 0;
		$mail->SMTPAuth   = true; 
		$mail->Username   = $config_email; // SMTP account username
		$mail->Password   = $config_pass;  

		//Thiết lập thông tin người gửi và email người gửi
		$mail->SetFrom($config_email,$_POST['tencanhan']);

		//Thiết lập thông tin người nhận và email người nhận
		$mail->AddAddress($row_setting['email'], $row_setting['ten']);
		
		//Thiết lập email nhận hồi đáp nếu người nhận nhấn nút Reply
		$mail->AddReplyTo($_POST['emailncc'],$_POST['tencanhan']);

		//Thiết lập file đính kèm nếu có
		// if (isset($_FILES['uploaded_file']) &&
		//     $_FILES['uploaded_file']['error'] == UPLOAD_ERR_OK) {
		//     $mail->AddAttachment($_FILES['uploaded_file']['tmp_name'],
		//                          $_FILES['uploaded_file']['name']);
		// }
		
		//Thiết lập tiêu đề email
		$mail->Subject    = 'DONATE - '.$_POST['tencanhan'];
		$mail->IsHTML(true);
		
		//Thiết lập định dạng font chữ tiếng việt
		$mail->CharSet = "utf-8";	
			$body = '<h3 style="text-align: center;">THÔNG TIN <span style="color:red">DONATE</span></h3>';
			$body .= '<table rules="all" style="border-color:#ccc;border:1px solid #ccc;width:400px;padding:5px;text-align: center;margin:auto;">';
			$body .= '
				
				<tr>
					<th colspan="2">Thư liên hệ từ website <a href="'.$_SERVER["SERVER_NAME"].'">'.$_SERVER["SERVER_NAME"].'</a></th>
				</tr>
				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>
				<tr>
					<th>Tên cá nhân :</th><td>'.$_POST['tencanhan'].'</td>
				</tr>
				<tr>
					<th>Tên tổ chức :</th><td>'.$_POST['tentochuc'].'</td>
				</tr>
				<tr>
					<th>Điện Thoại :</th><td>'.$_POST['dienthoaincc'].'</td>
				</tr>
				<tr>
					<th>Email :</th><td>'.$_POST['emailncc'].'</td>
				</tr>
				<tr>
					<th>Mục đích</th><td>'.$_POST['taichinh'].'<br>'.$_POST['cosovatchat'].'<br>'.$_POST['dktrothanhmember'].'</td>
				</tr>
				<tr>
					<th>Cho dự án: </th><td><br>'.$_POST['choduansacmautuoitho'].'<br>'.$_POST['hocbongsacmau'].'<br>'.$_POST['clbtienganh'].'<br>'.$_POST['clbmentor'].'<br>'.$_POST['member'].'</td>
				</tr>
				<tr>
					<th>Nội dung :</th><td>'.$_POST['noidung'].'</td>
				</tr>
				';
			$body .= '</table>';
			
			$mail->Body = $body;
			if($mail->Send())
				//transfer(_guilienhethanhcong, "index.html");
				alert("Gửi thông tin thành công!");
			else
				alert("Gửi thông tin thất bại! Vui lòng nhập lại");
				//transfer(_guilienhethatbai, "lien-he.html");	
	}
?>
<div id="wrap-ncc" class="wrap-ncc">
	<h3>DONATE</h3>
	<form name="ncc" id="ncc" class="ncc" action="" method="post" enctype="multipart/form-data">
		<div class="">
			<div class="col-12">
				<div class="formRow">
				  <label>Tên cá nhân</label>
				  <div class="formRight require">
				    <input type="text" value="<?=@$item['tencanhan']?>" name="tencanhan" title="" class="tipS" />
				  </div>
				  <div class="clear"></div>
				</div>
				<div class="formRow">
				  <label>Tên tổ chức</label>
				  <div class="formRight require">
				    <input type="text" value="<?=@$item['tentochuc']?>" name="tentochuc" title="" class="tipS" />
				  </div>
				  <div class="clear"></div>
				</div>
				<div class="formRow">
				  <label>Email</label>
				  <div class="formRight require">
				    <input type="email" value="<?=@$item['emailncc']?>" name="emailncc" title="" class="tipS" />
				  </div>
				  <div class="clear"></div>
				</div>
				<div class="formRow">
				  <label><?=_dienthoai?></label>
				  <div class="formRight require">
				    <input type="text" value="<?=@$item['dienthoaincc']?>" name="dienthoaincc" title="" class="tipS" />
				  </div>
				  <div class="clear"></div>
				</div>
				<div class="formRow">
					<input type="checkbox" id="taichinh" name="taichinh" value="Đóng góp tài chính">
					<label for="taichinh"> Đóng góp tài chính</label><br>
					<input type="checkbox" id="cosovatchat" name="cosovatchat" value="Cơ sở vật chất ( phòng học, thiết bị học tập,...)">
					<label for="cosovatchat"> Cơ sở vật chất ( phòng học, thiết bị học tập,...)</label><br>
					
					
					<input type="checkbox" id="dktrothanhmember" name="dktrothanhmember" value=" Đăng ký trở thành tình nguyện viên">
					<label for="dktrothanhmember"> Đăng ký trở thành tình nguyện viên</label><br>
				</div>
				<div class="formRow">
					<h4>Cho dự án:</h4>
					<input type="checkbox" id="choduansacmautuoitho" name="choduansacmautuoitho" value="Sắc Màu tuổi thơ">
					<label for="choduansacmautuoitho"> Sắc Màu tuổi thơ</label><br>
					<input type="checkbox" id="hocbongsacmau" name="hocbongsacmau" value=" Học bổng Sắc Màu">
					<label for="hocbongsacmau"> Học bổng Sắc Màu</label><br>
					<input type="checkbox" id="clbtienganh" name="clbtienganh" value=" CLB Tiếng Anh Sắc Màu">
					<label for="clbtienganh"> CLB Tiếng Anh Sắc Màu</label><br>
					<input type="checkbox" id="clbmentor" name="clbmentor" value=" CLB Mentor">
					<label for="clbmentor"> CLB Mentor</label><br>
					<input type="checkbox" id="member" name="member" value="Đăng ký trở thành member">
					<label for="member"> Đăng ký trở thành member</label>
				</div>
				<div class="formRow">
					<label>Nội dung</label>
					<div class="formRight require">
						<textarea name="noidung" id="noidung" rows="5"></textarea>
					</div>
				</div>
				<div class="form-group frm-btnwrap">
                  <div class="frm-btn">
                    <input type="submit" name="submit_nhantin" value="Gửi" id="submit_nhantin" class="btn btn-default frm-btn-submit" value='submit_nhantin'/>
                  </div>

              </div>
			</div>
			
		</div>
		<div class="clearfix"></div>
	</form>
</div>
<!-- End NCC -->
