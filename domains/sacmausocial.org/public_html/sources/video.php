<?php  if(!defined('_source')) die("Error");

		$id =  $_GET['id'];
		$idl =  addslashes($_GET['idl']);
		
		if($id!=''){

			$sql = "select * from #_video where hienthi=1 and id='".$id."'";
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
			$sql_khac = "select ten_$lang,ngaytao,id,tenkhongdau from #_video where hienthi=1 and id !='".$row_detail['id']."' and type='".$type_bar."' order by stt,ngaytao desc limit 0,10";
			$d->query($sql_khac);
			$tintuc = $d->result_array();

			$sql = "select ten_$lang,ngaytao,id,tenkhongdau,id_list,photo from #_video where hienthi=1 and id !='".$row_detail['id']."' and type='".$type_bar."' order by stt,ngaytao desc limit 0,6";
			$d->query($sql);
			$tinmoi = $d->result_array();

			$d->reset();
			$sql = "select id,ten_$lang,tenkhongdau,title,keywords,description from #_video_list where hienthi=1 and type='".$type_bar."' and id='".$row_detail['id_list']."'";
			$d->query($sql);
			$row_list = $d->fetch_array();

		} elseif($idl!=''){

			$d->reset();
			$sql = "select * from #_video_list where hienthi=1 and type='".$type_bar."' and tenkhongdau='".$idl."'";
			$d->query($sql);
			$row_detail = $d->fetch_array();
			$photo = $row_detail['photo'];
			$per_page = 12; // Set how many records do you want to display per page.
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;
			
			$where = " #_video where hienthi=1 and type='".$type_bar."' and id_list='".$row_detail['id']."'  order by stt,ngaytao desc";

			$sql = "select * from $where $limit";
			$d->query($sql);
			$tintuc = $d->result_array();

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
			$where = " #_video_list where hienthi=1 and type='".$type_bar."' order by id desc";
			
			$sql = "select * from $where $limit";
			$d->query($sql);
			$tintuc = $d->result_array();

			$url = getCurrentPageURL();
			$paging = pagination($where,$per_page,$page,$url);
		}
	
?>