<?php  if(!defined('_source')) die("Error");

		$id =  $_GET['id'];
		$idl =  addslashes($_GET['idl']);
		
		if($id!=''){
			$sql_lanxem = "UPDATE #_baiviet SET luotxem=luotxem+1  WHERE tenkhongdau='".$id."'";
			$d->query($sql_lanxem);

			$sql = "select * from #_baiviet where hienthi=1 and tenkhongdau='".$id."'";
			$d->query($sql);
			$row_detail = $d->fetch_array();

			$share_facebook = '<meta property="og:url" content="'.getCurrentPageURL().'" />';
			$share_facebook .= '<meta property="og:type" content="website" />';
			$share_facebook .= '<meta property="og:title" content="'.$row_detail['ten_'.$lang].'" />';
			$share_facebook .= '<meta property="og:description" content="'.strip_tags($row_detail['mota_'.$lang]).'" />';
			$share_facebook .= '<meta property="og:image" content="http://'.$config_url.'/'._upload_baiviet_l.$row_detail['photo'].'" />';
			$share_facebook .= '<meta property="og:image:alt" content="http://'.$config_url.'/'._upload_baiviet_l.$row_detail['photo'].'" />';

			$title_bar .= $row_detail['title'];
			$keyword_bar .= $row_detail['keywords'];
			$description_bar .= $row_detail['description'];
			
			#các tin cu hon
			$sql_khac = "select ten_$lang,ngaytao,id,tenkhongdau from #_baiviet where hienthi=1 and id !='".$row_detail['id']."' and type='".$type_bar."' order by stt,ngaytao desc limit 0,10";
			$d->query($sql_khac);
			$tintuc = $d->result_array();

			$sql = "select ten_$lang,ngaytao,id,tenkhongdau from #_baiviet where hienthi=1 and id !='".$row_detail['id']."' and type='".$type_bar."' order by stt,ngaytao desc limit 0,6";
			$d->query($sql);
			$tinmoi = $d->result_array();
			


		} elseif($idl!=''){
			$sql_lanxem = "UPDATE #_baiviet_list SET luotxem=luotxem+1  WHERE tenkhongdau='".$idl."'";
			$d->query($sql_lanxem);

			$d->reset();
			$sql = "select id,ten_$lang,tenkhongdau,title,keywords,description,mota_$lang,photo,noidung_$lang,luotxem from #_baiviet_list where hienthi=1 and type='".$type_bar."' and tenkhongdau='".$idl."'";
			$d->query($sql);
			$row_detail = $d->fetch_array();

			$per_page = 5; // Set how many records do you want to display per page.
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;
			
			$where = " #_baiviet where hienthi=1 and type='".$type_bar."' and id_list='".$row_detail['id']."'  order by stt,ngaytao desc";

			$sql = "select ten_$lang,id,mota_$lang,tenkhongdau,photo from $where $limit";
			$d->query($sql);
			$tintuc = $d->result_array();

			$sql_khac = "select tenkhongdau,photo,ten_$lang,noidungin_$lang,motain_$lang from #_baiviet_list where hienthi=1 and id !='".$row_detail['id']."' and type='".$type_bar."' order by stt,ngaytao desc";
			$d->query($sql_khac);
			$tintuc_list_dif = $d->result_array();

			$d->reset();
			$sql = "select * from #_baiviet_photo where hienthi=1 and id_baiviet_list='".$row_detail['id']."' and type='".$type_bar."' order by stt,id desc";
			$d->query($sql);
			$result_hinhanh = $d->result_array();

			$url = getCurrentPageURL();
			$paging = pagination($where,$per_page,$page,$url);

			$title_detail = $row_detail['ten_'.$lang];
			$title_bar .= $row_detail['title'];
			$keyword_bar .= $row_detail['keywords'];
			$description_bar .= $row_detail['description'];

		} else {

			// cac tin tuc
			
			$per_page = 12; // Set how many records do you want to display per page.
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page; 
			$where = " #_baiviet_list where hienthi=1 and type='".$type_bar."' order by id desc";
			
			$sql = "select tenkhongdau,photo,ten_$lang,noidungin_$lang,motain_$lang from $where $limit";
			$d->query($sql);
			$tintuc = $d->result_array();

			$url = getCurrentPageURL();
			$paging = pagination($where,$per_page,$page,$url);
		}
	
?>