<?php  if(!defined('_source')) die("Error");		
	// thanh tieu de
	$title_bar .= _thanhtoan." - ";
	
	if(!empty($_POST)){
		$hoten=$_POST['ten'];
		$diachi=$_POST['diachi'];
		$dienthoai=$_POST['dienthoai'];
		$email=$_POST['email'];
		$noidung=$_POST['noidung'];		
		$httt=$_POST['httt'];
	
	$hoten = trim(strip_tags($hoten));
	$dienthoai = trim(strip_tags($dienthoai));	
	$diachi = trim(strip_tags($diachi));	
	$email = trim(strip_tags($email));	
	$noidung = trim(strip_tags($noidung));	
	$httt = trim(strip_tags($httt));	
	if (get_magic_quotes_gpc()==false) {
		$hoten = mysql_real_escape_string($hoten);
		$dienthoai = mysql_real_escape_string($dienthoai);
		$diachi = mysql_real_escape_string($diachi);
		$email = mysql_real_escape_string($email);
		$noidung = mysql_real_escape_string($noidung);						
	}
	$coloi=false;		
		
	if ($coloi==FALSE) {					
			$mahoadon=strtoupper (ChuoiNgauNhien(6));
			$_SESSION['madonhang']=$mahoadon;
			$ngaydangky=time();
			$tonggia=get_order_total();
			

			$sql = "INSERT INTO  table_order (madonhang,hoten,dienthoai,diachi,email,httt,tonggia,noidung,ngaytao,trangthai) 
				  VALUES ('$mahoadon','$hoten','$dienthoai','$diachi','$email','$httt','$tonggia','$noidung','$ngaydangky','1')";	
			mysql_query($sql) or die(mysql_error());
			$iduser = mysql_insert_id();
			$max=count($_SESSION['cart']);

			for($i=0;$i<$max;$i++){
				$pid = $_SESSION['cart'][$i]['productid'];
				$q = $_SESSION['cart'][$i]['qty'];
			
				$pname=get_product_name($pid);
				$gia = get_price($pid);
				if($q==0) continue;

				$data1['id_product'] = $pid;
				$data1['id_order'] = $iduser;
				$data1['ten'] = $pname;
				$data1['gia'] = $gia;
				$d->setTable('order_detail');
				$d->insert($data1);
        		
			}							
			include_once "phpMailer/class.phpmailer.php";
			//Khởi tạo đối tượng
			$mail = new PHPMailer();
			$mail->Priority = 1;
	     	$mail->AddCustomHeader("X-MSMail-Priority: High");
			$mail->IsSMTP(); // Gọi đến class xử lý SMTP
			$mail->Host       = $config_ip; // tên SMTP server
			$mail->SMTPDebug  = 0;
			$mail->SMTPAuth   = true; 
			$mail->Username   = $config_email; // SMTP account username
			$mail->Password   = $config_pass;  
			$mail->SetFrom($row_setting['email'],$row_setting['ten_'.$lang]);

			$mail->AddAddress($row_setting['email'],$row_setting['ten_'.$lang]);
			$mail->AddAddress($email,$hoten);
			//Thiết lập email nhận email hồi đáp
			//nếu người nhận nhấn nút Reply
			// $mail->AddReplyTo($config['email'],$row_setting['ten_'.$lang]);

		    $d->reset();
		    $row_logo = "select photo_$lang from #_photo where type='logo' order by id desc";
		    $d->query($row_logo);
		    $row_logo = $d->fetch_array();

		    $d->reset();
		    $sql_contact = "select noidung_$lang from #_company where type='footer'";
		    $d->query($sql_contact);
		    $company_contact = $d->fetch_array();

			$body.='<div style="width:100%;background:#f9f9f9;padding: 10px 0px;"><div class="form-gh" style="    box-shadow: 0px 0px 1px 1px #ccc;width: 640px;margin: 0 auto;background:#fff;box-shadow: 0px 1px 3px 1px #e3e0e0;;padding:10px;">
			    <div class="header-gh" style="border-bottom: 10px solid #f58220;padding: 10px 0px;">
			        <img src="http://'.$config_url."/"._upload_hinhanh_l.$row_logo['photo_'.$lang].'" width="115" height="95" alt="'.$row_logo['photo_'.$lang].'" />
			    </div>
			    <div class="top-gh">
			        <div class="about-gh" style=" background: #eee;padding: 10px;">
			            Chào bạn <b>'.$hoten.'</b>,<br>
			            Cảm ơn bạn đã đặt hàng tại <a href="'.$row_setting['website'].'">'.$row_setting['website'].'</a>. Thông tin đơn hàng:
			        </div>
			        <div class="madh-gh" style="padding: 10px;">
			            <span class="left-ma" style="float:left">Mã đơn hàng: <b>'.$mahoadon.'</b></span>
			            <span class="right-ma" style="float:right">Đặt lúc: '.date('d/m/Y',time()).'</span>
			            <div style="clear:both"></div>
			        </div>
			    </div>
			    <div class="mid-gh">
			        <table width="100%" class="bang-gh" style="border: 1px solid #ccc;border-bottom: none;border-collapse: collapse">
			            <th style="border-right: 1px solid #ccc;border-bottom: 1px solid #ccc;padding: 5px 10px;background: #ddd;font-size: 13px;">Sản phẩm</th>
			            <th style="border-right: 1px solid #ccc;border-bottom: 1px solid #ccc;padding: 5px 10px;background: #ddd;font-size: 13px;">Giá x Số lượng</th>
			            <th style="border-bottom: 1px solid #ccc;padding: 5px 10px;background: #ddd;font-size: 13px;">Thành tiền</th>';

					for($i=0;$i<$max;$i++){
			                    $pid=$_SESSION['cart'][$i]['productid'];
			                    $q=$_SESSION['cart'][$i]['qty'];                    
			                    $size=$_SESSION['cart'][$i]['idsize'];
			                    $mau=$_SESSION['cart'][$i]['idmau'];            
			                    $pname=get_product_name($pid);
			                    if($q==0) continue;
			                    
			                    $body.='<tr><td style="border-right: 1px solid #ccc;border-bottom: 1px solid #ccc;padding: 5px 10px;text-align: center;">'.$pname.'</td>';
			                    $body.='<td style="border-right: 1px solid #ccc;border-bottom: 1px solid #ccc;padding: 5px 10px;text-align: center;">'.number_format(get_price($pid),0, ',', '.').'&nbsp;VNĐ x&nbsp;'.$q.'</td>';
			                                 
			                    $body.='<td style="border-bottom: 1px solid #ccc;padding: 5px 10px;text-align: center;">'.number_format(get_price($pid)*$q,0, ',', '.') .'&nbsp;VNĐ</td>
			                    </tr>';

			                } 
			           
			    $body.='</table>
			        <div class="tong-gh" style="text-align: right;width: 260px;float: right;margin: 20px 0px;">
			            <p><span style="float: left;">Số tiền cần thanh toán</span> <strong style="color: #f00;">'.number_format(get_order_total()-$_SESSION['giagiam'],0, ',', '.') .'&nbsp;VNĐ'.'</strong></p>
			        </div>
			    </div>
			    <div class="bot-gh" style="clear: both;">
			        <h2 class="ttnh" style="font-size: 16px;margin: 0px;font-weight: bold;margin-bottom: 10px;">Thông tin nhận hàng</h2>
			        <div class="ten-canhan" style="background: #eee;padding: 10px 5px;"><span style="width: 200px;display: inline-block;">Tên người nhận:</span> '.$hoten.'</div>
			        <div class="tt-canhan" style="padding: 0px 5px;margin-top: 10px;"><span style="width: 200px;display: inline-block;">Điện thoại:</span> '.$dienthoai.'</div>
			        <div class="tt-canhan" style="padding: 0px 5px;margin-top: 10px;"><span style="width: 200px;display: inline-block;">Email:</span> '.$email.'</div>
			        <div class="tt-canhan" style="padding: 0px 5px;margin-top: 10px;"><span style="width: 200px;display: inline-block;">Địa chỉ:</span> '.$diachi.'</div>
			        <div class="border-bot" style=" border-top: 10px solid #eee;margin: 10px 0px;"></div>
			        <p><b>Lưu Ý </b> : Đây là thư hỗ trợ tự động , mọi phản hồi về mail này điều không được duyệt .</p>
			    </div>
			    <div class="footer-gh" style="background: #f58220;padding: 10px 10px;color: #fff; ">
			        <div class="noidung">'.$company_contact['noidung_'.$lang].'</div>
			    </div>
			</div></div>';


			
			//Thiết lập tiêu đề
			$mail->Subject    = "Có đặt hàng mới từ website ".$row_setting['website'];
			
			//Thiết lập định dạng font chữ
			$mail->CharSet = "utf-8";
			
			$mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
			

			$mail->MsgHTML($body);
			
			
			if(!$mail->Send()) {
			 	echo "Có lỗi xảy ra!";
			}else{
				unset($_SESSION['cart']);
				transfer("Gửi đơn hàng thành công!<br/>", "index.html");	
			}	
		}
	}
?>