<?php
	$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	$d = new database($config['database']);
	
	$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
	if ($page <= 0) $page = 1;
	
	$d->reset();
	$sql_setting = "select * from #_setting limit 0,1";
	$d->query($sql_setting);
	$row_setting= $d->fetch_array();

	$d->reset();
	$sql_setting = "select * from #_bgweb where type='bgweb' limit 0,1";
	$d->query($sql_setting);
	$row_background= $d->fetch_array();



	$d->reset();
    $sql = "select thumb_$lang from #_photo where type='favicon'";
    $d->query($sql);
    $favicon = $d->fetch_array();

    $d->reset();
    $sql = "select noidung_$lang as noidung from #_company where type='footer'  limit 0,1";
    $d->query($sql);
    $footer = $d->fetch_array();
	
	$d->reset();
    $sql = "select noidung_$lang as noidung from #_company where type='giolamviec'  limit 0,1";
    $d->query($sql);
    $giolamviec = $d->fetch_array();
	
	switch($com){
		case 'video':
			$source = "video";
			$template = isset($_GET['id']) ? "video_detail" : "video";
			break;
			
		case 'download':
			$source = "download";
			$template = isset($_GET['id']) ? "download_detail" : "download";
			$type_bar = 'download';
			$title_detail = "Download";
			break;
		case 'thu-vien-anh':
			$source = "album";
			$template = isset($_GET['id']) ? "album_detail" : "image";
			$type_bar = 'album';
			$title_detail = "album";
			break;
		case 'site-map':
			$template ="sitemap";
			break;
		


		case 'bang-gia':
			$source = "news";
			$template ="banggia";
			$type_bar = 'banggia';
			$title_detail ='Bảng giá';
			break;	
		case 'gop-y-khieu-nai':
			$source = "about";
			$template ="about";
			$type_bar = 'gopy';
			$title_detail = "Góp ý 7 khiếu nại";
			break;	
		case 'se-chia':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "sechia";
			$type_bar = 'sechia';
			$title_detail = "Sẻ chia";
			break;
		case 'gioi-thieu':
			$source = "news";
			$template = isset($_GET['id']) ? "about_detail" : "about";
			$type_bar = 'about';
			$title_detail = 'Giới thiệu ';
			break;	
		case 'kinh-nghiem':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_bar = 'kinhnghiem';
			$title_detail = 'Kinh nghiệm';
			break;
		case 'thu-vien-hinh-anh':
			$source = "album";
			$template = isset($_GET['id']) ? "image_detail" : "image";
			$type_bar = 'image';
			$title_detail = 'Thư viện ảnh';
			break;
		case 'thu-vien-video':
			$source = "video";
			$template = isset($_GET['id']) ? "video_detail" : "video";
			$type_bar = 'video';
			$title_detail = 'Thư viện video';
			break;
		case 'tin-tuc':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_bar = 'tintuc';
			$title_detail = "Tin tức";
			break;	
		case 'tuyen-dai-ly':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_bar = 'tuyendaily';
			$title_detail = 'Tuyển đại lý';
			break;	
		case 'dich-vu':
			$source = "services";
			switch ($_GET) {
				case isset($_GET['id']):
					$template = "news_detail";
					break;
				case isset($_GET['idl']):
					$template = "services_list";
					break;
				default:
					$template = "services";
					break;
			}
			$type_bar = 'dichvu';
			$title_detail = _dichvu;
			break;
		// case 'tin-tuc':
		// 	$source = "news";
		// 	$template = isset($_GET['id']) ? "hoatdong_detail" : "hoatdong";
		// 	$title_detail = "Hoạt động";
		// 	$type_bar = 'hoatdong';	
		// 	break;	
		case 'ho-tro':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_bar = 'hotro';
			$title_detail = 'Hỗ trợ';
			break;


		case 'hoat-dong':
			$source = "news";
			$template = isset($_GET['id']) ? "hoatdong_detail" : "hoatdong";
			$title_detail = "Hoạt động";
			$type_bar = 'hoatdong';	
			break;	
		case 'san-pham':
			$source = "product";
			$template =isset($_GET['id']) ? "product_detail" : "product";
			$title_detail = _sanpham;
			$type_bar = 'product';	
			break;	

		case 'nhan-mail':
			$source = "nhanmail";			
			break;		
								
		case 'lien-he':
			$source = "contact";
			$template = "contact";
			break;
		
		case 'tim-kiem':
			$source = "search";
			$template = "search";
			break;
		case '404':
			$source = "product";
			$template = "404";
			include $template.".php";die;
			break;
		case 'gio-hang':
			$source = "giohang";
			$template = "giohang";
			break;	
		case 'thanh-toan':
			$source = "thanhtoan";
			$template = "thanhtoan";
			break;	

		case 'dang-ky':
			$source = "register";
			$template ="register";
			break;
		case 'dang-nhap':
			$source = "login";
			$template ="login";
			break;
		case 'logout':
			$source = "logout";
			$template ="logout";
			break;
		case 'thong-tin-ca-nhan':
			$source = "taikhoan";
			$template ="taikhoan";
			break;
			case 'doi-mat-khau':
			$source = "doimk";
			$template ="doimk";
			break;
		case 'quen-mat-khau':
			$source = "rematkhau";
			$template ="rematkhau";
			break;
		case 'kich-hoat-mail':
			$source = "activemail";
			$template ="activemail";
			break;

		case 'ngonngu':
			if(isset($_GET['lang']))
			{
				$_SESSION['lang'] = $_GET['lang'];
			}
			else{
			$_SESSION['lang'] = 'vi';
			}
			echo '<script language="javascript">history.go(-1)</script>';
			break;

    case 'donation':
      $source = "donation";
      $template = "donation";
      break;

    case 'volunteer':
      $source = "volunteer";
      $template = "volunteer";
      break;

    case 'mentor':
      $source = "mentor";
      $template = "mentor";
      break;

		default: 
			$source = "index";
			$template = "index";
			break;
	}
	
	if($source!=""){
		// include_once "googlev3.php";
	 	include _source.$source.".php";
	}
	
	if($_REQUEST['com']=='logout')
	{
	session_unregister($login_name);
	header("Location:index.php");
	}		
?>