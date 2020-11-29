<?php
	$type = (isset($_REQUEST['type'])) ? addslashes($_REQUEST['type']) : "";	
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	$act = explode('_',$act);
	if(count($act>1)){
		$act = $act[1];
	} else {
		$act = $act[0];
	}
	switch($type){
		//-------------product------------------
		case 'product':
			switch($act){
				case 'list':
					$title_main = "Danh mục cấp 1";
					break;
				case 'cat':
					$title_main = "Danh mục cấp 2";
					break;	
				default:
					$title_main = "Sản Phẩm";
					$config_images = "true";
					$config_mota= "true";
					$config_list = "true";
					$config_cat = "true";
					$config_item = "false";
					$config_sub = "false";
					$config_noibat = "true";
					$config_noibat1 = "false";
					$config_noibat2 = "false";
					@define ( _width_thumb , 280 );
					@define ( _height_thumb , 170 );
					@define ( _style_thumb , 2 );
					$ratio_ = 1;
					break;
				}
				@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			break;
		case 'hoatdong':
			switch($act){
				case 'list':
					$title_main = "Danh mục cấp 1";
					$config_images = "true";
					$config_qc = "false";
					$config_mota= "false";
					$config_noibat= "true";
					$config_noibat1= "false";
					$config_noibat2= "false";
					@define ( _width_thumb , 365 );
					@define ( _height_thumb , 145 );
					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				
				default:
					$title_main = "Hoạt động";
					$config_images = "true";
					$config_mota= "true";
					$config_list = "true";
					$config_cat = "true";
					$config_item = "false";
					$config_sub = "false";
					$config_noibat = "false";
					$config_noibat1 = "false";
					$config_noibat2 = "false";
					@define ( _width_thumb , 210 );
					@define ( _height_thumb , 170 );
					@define ( _style_thumb , 2 );
					$ratio_ = 1;
					break;
				}
				@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			break;	
			
		case 'yahoo':
			$title_main = "Hỗ trợ trực tuyến";
			$config_images = "false";
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			@define ( _width_thumb , 86 );
			@define ( _height_thumb , 70 );
			@define ( _style_thumb , 1 );
			$ratio_ = 1;
			break;
		case 'about':
			$title_main = "Giới thiệu";
			$config_images = "false";
			$config_mota= "false";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_sub = "false";
			$config_ten = "false";
			$config_noibat = "false";
			@define ( _width_thumb , 517 );
			@define ( _height_thumb , 335 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'san-pham':
			$title_main = "";
			$config_images = "true";
			$config_mota= "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_sub = "false";
			$config_ten = "true";
			$config_noibat = "false";
			@define ( _width_thumb , 517 );
			@define ( _height_thumb , 335 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'gioi-thieu':
			$title_main = "";
			$config_images = "true";
			$config_mota= "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_sub = "false";
			$config_ten = "true";
			$config_noibat = "false";
			@define ( _width_thumb , 517 );
			@define ( _height_thumb , 335 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'tintuc':
			$title_main = "";
			$config_images = "true";
			$config_mota= "true";
			$config_list = "true";
			$config_cat = "false";
			$config_item = "false";
			$config_sub = "false";
			$config_ten = "true";
			$config_noibat = "true";
			@define ( _width_thumb , 517 );
			@define ( _height_thumb , 335 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'sechia':
			$title_main = "";
			$config_images = "true";
			$config_mota= "true";
			$config_list = "true";
			$config_cat = "false";
			$config_item = "false";
			$config_sub = "false";
			$config_ten = "true";
			$config_noibat = "true";
			@define ( _width_thumb , 517 );
			@define ( _height_thumb , 335 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'lien-he':
			$title_main = "";
			$config_images = "true";
			$config_mota= "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_sub = "false";
			$config_ten = "true";
			$config_noibat = "false";
			@define ( _width_thumb , 517 );
			@define ( _height_thumb , 335 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'banggia':
			$title_main = "Bảng giá";
			$config_images = "false";
			$config_mota= "false";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_sub = "false";
			$config_ten = "false";
			$config_noibat = "false";
			@define ( _width_thumb , 517 );
			@define ( _height_thumb , 335 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;	
		case 'xaydung':
			switch($act){
				case 'list':
					$title_main = "Danh mục cấp 1";
					$config_images = "false";
					$config_qc = "false";
					$config_mota= "false";
					$config_noibat= "false";
					$config_noibat1= "false";
					$config_noibat2= "false";
					@define ( _width_thumb , 317 );
					@define ( _height_thumb , 313 );
					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				default:
					$title_main = "Xây dựng";
					$config_images = "true";
					$config_mota= "false";
					$config_list = "true";
					$config_cat = "true";
					$config_item = "true";
					$config_sub = "false";
					$config_noibat = "true";
					$config_noibat1 = "false";
					$config_noibat2 = "false";
					@define ( _width_thumb , 261 );
					@define ( _height_thumb , 243 );
					@define ( _style_thumb , 2 );
					$ratio_ = 1;
					break;
				}
				@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			break;
		case 'gioithieu':
			$title_main = "Giới thiệu";
			$config_images = "true";
			$config_mota= "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_sub = "false";
			$config_ten = "true";
			$config_noibat = "false";
			@define ( _width_thumb , 270 );
			@define ( _height_thumb , 300 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'dichvu':
			$title_main = "Dịch vụ";
			$config_images = "true";
			$config_mota= "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_sub = "false";
			$config_noibat = "false";
			@define ( _width_thumb , 100 );
			@define ( _height_thumb , 68 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;	
		case 'kinhnghiem':
			$title_main = "Kinh nghiệm";
			$config_images = "true";
			$config_mota= "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_sub = "false";
			$config_noibat = "true";
			@define ( _width_thumb , 205 );
			@define ( _height_thumb , 170 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'htpp':
			$title_main = "Hệ thống phân phối";
			$config_images = "true";
			$config_mota= "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_sub = "false";
			$config_noibat = "false";
			@define ( _width_thumb , 100 );
			@define ( _height_thumb , 68 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;	
		case 'video':
			$title_main = "Video";
			$config_images = "true";
			$config_mota= "false";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_sub = "false";
			$config_noibat = "true";
			@define ( _width_thumb , 155 );
			@define ( _height_thumb , 155 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;	
		
		case 'tuvan':
			$title_main = "Tư vấn";
			$config_images = "true";
			$config_mota= "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_sub = "false";
			$config_noibat = "false";
			@define ( _width_thumb , 270 );
			@define ( _height_thumb , 195 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'dacdiem':
			$title_main = "Đặc điểm";
			$config_images = "true";
			$config_mota= "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_sub = "false";
			$config_noibat = "false";
			@define ( _width_thumb , 102 );
			@define ( _height_thumb , 102 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'sukien':
			$title_main = "Sự kiện";
			$config_images = "true";
			$config_mota= "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_sub = "false";
			$config_noibat = "true";
			@define ( _width_thumb , 130 );
			@define ( _height_thumb , 130 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'khuyenmai':
			$title_main = "Khuyến mãi";
			$config_images = "true";
			$config_mota= "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_sub = "false";
			$config_noibat = "true";
			@define ( _width_thumb , 130 );
			@define ( _height_thumb , 130 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'tuyendung':
			$title_main = "Tuyển dụng";
			$config_images = "true";
			$config_mota= "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_sub = "false";
			$config_noibat = "false";
			@define ( _width_thumb , 390 );
			@define ( _height_thumb , 209 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'huongdan':
			$title_main = "Hướng dẫn mua hàng";
			$config_images = "true";
			$config_mota= "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_sub = "false";
			$config_noibat = "false";
			@define ( _width_thumb , 130 );
			@define ( _height_thumb , 130 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'phuongcham':
			$title_main = "Phương châm";
			$config_images = "true";
			$config_mota= "false";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_sub = "false";
			$config_noibat = "false";
			@define ( _width_thumb , 83 );
			@define ( _height_thumb , 83 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;

		case 'download':
			$title_main = "Download File";
			$config_images = "false";
			@define ( _width_thumb , 200 );
			@define ( _height_thumb , 250 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		
		case 'album':
			$title_main = "hình ảnh khách hàng";
			$config_images = "true";
			$config_list = "false";
			$config_mota= "false";
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			@define ( _width_thumb , 370 );
			@define ( _height_thumb , 300 );
			@define ( _style_thumb , 1 );
			$ratio_ = 2;
			break;

		case 'album_list':
			$title_main = "danh mục album";
			$config_images = "true";
			$config_list = "false";
			@define ( _width_thumb , 200 );
			@define ( _height_thumb , 160 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		//-------------info------------------
	
		
		case 'tags':
			$title_main = 'tags';
			$config_ten = 'true';
			break;
			
		case 'trangchu':
			$title_main = 'Trang chủ';
			$config_images = 'true';
			$config_ten = 'true';
			@define ( _width_thumb , 590 );
			@define ( _height_thumb , 260 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;

		case 'hinhanh':
			$title_main = 'Hình ảnh';
			$config_ten = 'true';
			break;
		case 'chamsoc':
			$title_main = 'chăm sóc khách hàng';
			$config_ten = 'true';
			break;
		case 'lienhe':
			$title_main = 'Liên hệ';
			$config_ten = 'true';
			break;
		case 'giolamviec':
			$title_main = 'Giờ làm việc';
			$config_ten = 'false';
			break;

		case 'banner1':
			$title_main = 'Banner 1';
			@define ( _width_thumb , 280 );
			@define ( _height_thumb , 60 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF|swf' );
			$ratio_ = 1;
			$links_ = "true";
			break;	
		case 'banner2':
			$title_main = 'Banner 2';
			@define ( _width_thumb , 280 );
			@define ( _height_thumb , 60 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF|swf' );
			$ratio_ = 1;
			$links_ = "true";
			break;	
		case 'logo':
			$title_main = 'Logo';
			@define ( _width_thumb , 142 );
			@define ( _height_thumb , 90 );
			@define ( _style_thumb , 2 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;

		case 'bct':
			$title_main = 'Bộ công thương';
			@define ( _width_thumb , 158 );
			@define ( _height_thumb , 59 );
			@define ( _style_thumb , 2 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$links_ = 'true';
			$config_hienthi = 'true';
			break;

		case 'bgdoitac':
			$title_main = 'Background đối tác';
			@define ( _width_thumb , 1366 );
			@define ( _height_thumb , 180 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF|swf' );
			$ratio_ = 1;
			break;
		case 'popup':
			$title_main = 'Popup';
			$links_ = 'true';
			$config_hienthi = 'true';
			@define ( _width_thumb , 900 );
			@define ( _height_thumb , 500 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;

		case 'bando':
			$title_main = 'Bản đồ';
			@define ( _width_thumb , 320 );
			@define ( _height_thumb , 180 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;

		case 'favicon':
			$title_main = 'Favicon';
			@define ( _width_thumb , 40 );
			@define ( _height_thumb , 40 );
			@define ( _style_thumb , 2 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;

		case 'bgweb':
			$title_main = 'background body';
			@define ( _width_thumb , 1366 );
			@define ( _height_thumb , 768 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		//-------------photo------------------
		case 'slider':
			$title_main = "Hình ảnh slider";
			$config_list = "false";
			$config_mota = "false";
			@define ( _width_thumb , 905 );
			@define ( _height_thumb , 410 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$links_ = "true";
			break;
		case 'tieubieu':
			$title_main = "Hình ảnh slider2";
			$config_list = "false";
			$config_mota = "true";
			@define ( _width_thumb , 62 );
			@define ( _height_thumb , 62 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'slider3':
			$title_main = "Hình ảnh slider3";
			$config_list = "false";
			$config_mota = "false";
			@define ( _width_thumb , 400 );
			@define ( _height_thumb , 185 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$links_ = "true";
			break;
		case 'doitac':
		    $title_main = "Đối tác";
			@define ( _width_thumb , 180 );
			@define ( _height_thumb , 75 );
			@define ( _style_thumb , 2 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$links_ = "true";
			break;
		case 'quangcao':
		    $title_main = "Quảng cáo";
			@define ( _width_thumb , 1200 );
			@define ( _height_thumb , 295 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$links_ = "true";
			break;
			
		case 'quangcaobt':
		    $title_main = "Quảng cáo giữa";
			@define ( _width_thumb , 385 );
			@define ( _height_thumb , 255 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$links_ = "true";
			break;
		case 'quancao_sl':
		    $title_main = "Quảng cáo slider";
			@define ( _width_thumb , 230 );
			@define ( _height_thumb , 206 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$links_ = "true";
			break;
		case 'quancao_top':
		    $title_main = "Quảng cáo top";
			@define ( _width_thumb , 385 );
			@define ( _height_thumb , 215 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$links_ = "true";
			break;
		case 'thethanhvien':
		    $title_main = "Thẻ thành viên";
			@define ( _width_thumb , 310 );
			@define ( _height_thumb , 275 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$links_ = "true";
			break;

		case 'adsmenu':
		    $title_main = "Hình ảnh trang chủ";
		    // $config_list = "true";
			@define ( _width_thumb , 1366 );
			@define ( _height_thumb , 320 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$links_ = "true";
			break;
		case 'mxhtop':
		    $title_main = "Mạng xã hội";
			@define ( _width_thumb , 16 );
			@define ( _height_thumb , 16 );
			@define ( _style_thumb , 2 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$links_ = "true";
			break;
		case 'mxh':
		    $title_main = "Mạng xã hội";
			@define ( _width_thumb , 40 );
			@define ( _height_thumb , 40 );
			@define ( _style_thumb , 2 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$links_ = "true";
			break;
		case 'chinhanh':
		
		    $title_main = "Chi nhánh";
			@define ( _width_thumb , 40 );
			@define ( _height_thumb , 40 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$links_ = "true";
			break;
		//--------------defaut---------------
		default: 
			$source = "";
			$template = "index";
			break;
	}

?>