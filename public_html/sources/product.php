<?php  if(!defined('_source')) die("Error");

		@$idc =  addslashes($_GET['idc']);
		@$idl =  addslashes($_GET['idl']);
		@$idi =  addslashes($_GET['idi']);
		@$ids =  addslashes($_GET['ids']);
		@$id=  addslashes($_GET['id']);
		#các sản phẩm khác======================

		if($id!=''){
			$sql_lanxem = "UPDATE #_product SET luotxem=luotxem+1  WHERE tenkhongdau ='".$id."'";
			$d->query($sql_lanxem);

			$d->reset();
			$sql_detail = "select * from #_product where hienthi=1 and type='product' and tenkhongdau='".$id."'";
			$d->query($sql_detail);
			if($d->num_rows() == 0){
		        header("Location: ../../index.html");
		    }
			$row_detail = $d->fetch_array();

			$arr_mausac = explode(',', $row_detail['mausac']);
			$arr_size = explode(',', $row_detail['size']);

			$idlist=$row_detail['id_list'];
			
			daxem($row_detail['id']);



			$share_facebook = '<meta property="og:url" content="'.getCurrentPageURL().'" />';
			$share_facebook .= '<meta property="og:type" content="website" />';
			$share_facebook .= '<meta property="og:title" content="'.$row_detail['ten_'.$lang].'" />';
			$share_facebook .= '<meta property="og:description" content="'.strip_tags($row_detail['mota_'.$lang]).'" />';
			$share_facebook .= '<meta property="og:image" content="//'.$config_url.'/'._upload_product_l.$row_detail['photo'].'" />';
			$share_facebook .= '<meta property="og:image:alt" content="//'.$config_url.'/'._upload_product_l.$row_detail['photo'].'" />';

			$d->reset();
			$sql = "select * from #_product_photo where hienthi=1 and id_product='".$row_detail['id']."' and type='product' order by stt,id desc";
			$d->query($sql);
			$result_hinhanh = $d->result_array();

			$d->reset();
			$sql = "select id,photo,ten_$lang,giaban,giacu,mota_$lang,luotxem,masp,tenkhongdau from #_product where hienthi=1 and type='product' and id_list='".$row_detail['id_list']."' and id!='".$row_detail['id']."'  order by RAND() limit 12";
			$d->query($sql);
			$product_khac = $d->result_array();

			$d->reset();
			$sql = "select id,photo,ten_$lang,giaban,giacu,luotxem,masp,tenkhongdau from #_product where hienthi=1 and type='product' and noibat1!=0 and id_list='".$row_detail['id_list']."' and id!='".$row_detail['id']."'  order by RAND() limit 3";
			$d->query($sql);
			$product_km = $d->result_array();

			$title_bar .= $row_detail['title'];
			$keyword_bar .= $row_detail['keywords'];
			$description_bar .= $row_detail['description'];


		} elseif($idl!=''){

			$d->reset();
			$sql = "select id,ten_$lang,photo,tenkhongdau,title,keywords,description from #_product_list where hienthi=1 and type='product' and tenkhongdau='".$idl."'";
			$d->query($sql);
			$row_detail = $d->fetch_array();

			$idlist=$row_detail['id'];
			$photo_list=$row_detail['photo'];

			$per_page = $row_setting['sanpham']; // Set how many records do you want to display per page.
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;
			
			$where = " #_product where hienthi=1 and type='product' and id_list='".$row_detail['id']."'   order by stt,ngaytao desc";

			$sql = "select ten_$lang,id,photo,giaban,giacu,masp,tenkhongdau from $where $limit";
			$d->query($sql);
			$result_product = $d->result_array();

			$url = getCurrentPageURL();
			$paging = pagination($where,$per_page,$page,$url);

			$title_detail = $row_detail['ten_'.$lang];
			$title_bar .= $row_detail['title'];
			$keyword_bar .= $row_detail['keywords'];
			$description_bar .= $row_detail['description'];

		} elseif($idc!=''){

			$d->reset();
			$sql = "select id,ten_$lang,tenkhongdau,id_list,title,keywords,description from #_product_cat where hienthi=1 and type='product' and tenkhongdau='".$idc."'";
			$d->query($sql);
			$row_detail = $d->fetch_array();

			$idlist=$row_detail['id_list'];

			$d->reset();
			$sql = "select id,ten_$lang,tenkhongdau,photo from #_product_list where hienthi=1 and type='product' and id='".$idlist."'";
			$d->query($sql);
			$row_detail_list = $d->fetch_array();

			$photo_list=$row_detail_list['photo'];

			$per_page = $row_setting['sanpham']; // Set how many records do you want to display per page.
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;
			
			$where = " #_product where hienthi=1 and type='product' and id_cat='".$row_detail['id']."'   order by stt,ngaytao desc";

			$sql = "select ten_$lang,id,photo,giaban,giacu,masp,tenkhongdau from $where $limit";
			$d->query($sql);
			$result_product = $d->result_array();

			$url = getCurrentPageURL();
			$paging = pagination($where,$per_page,$page,$url);


			$title_detail = $row_detail['ten_'.$lang];
			$title_bar .= $row_detail['title'];
			$keyword_bar .= $row_detail['keywords'];
			$description_bar .= $row_detail['description'];

		} elseif($idi!=''){

			$d->reset();
			$sql = "select id,ten_$lang,tenkhongdau,id_list,title,keywords,description from #_product_item where hienthi=1 and type='product' and id='".$idi."'";
			$d->query($sql);
			$row_detail = $d->fetch_array();

			$idlist=$row_detail['id_list'];

			$d->reset();
			$sql = "select id,ten_$lang,tenkhongdau,photo from #_product_list where hienthi=1 and type='product' and id='".$idlist."'";
			$d->query($sql);
			$row_detail_list = $d->fetch_array();

			$photo_list=$row_detail_list['photo'];

			$per_page = $row_setting['sanpham']; // Set how many records do you want to display per page.
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;
			
			$where = " #_product where hienthi=1 and type='product' and id_item='".$row_detail['id']."'  order by stt,ngaytao desc";

			$sql = "select ten_$lang,id,photo,mota_$lang,giaban,giacu,masp,tenkhongdau from $where $limit";
			$d->query($sql);
			$result_product = $d->result_array();

			$url = getCurrentPageURL();
			$paging = pagination($where,$per_page,$page,$url);

			$title_detail = $row_detail['ten_'.$lang];
			$title_bar .= $row_detail['title'];
			$keyword_bar .= $row_detail['keywords'];
			$description_bar .= $row_detail['description'];

		} else {
			$per_page = $row_setting['sanpham']; // Set how many records do you want to display per page.
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;

			
			
			$where = " #_product where hienthi=1 and type='product' ";
			if($com=='khuyen-mai') {$where.= ' and noibat1!=0 ';$title_detail='Sản phẩm khuyến mãi';}
			$where .= " order by stt,ngaytao asc ";

			$sql = "select ten_$lang,id,photo,mota_$lang,giaban,giacu,masp,tenkhongdau,h1 from $where $limit";
			$d->query($sql);
			$result_product = $d->result_array();

			$url = getCurrentPageURL();
			$paging = pagination($where,$per_page,$page,$url);


		}
	
		
			
?>