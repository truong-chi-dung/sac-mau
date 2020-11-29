<?php  if(!defined('_source')) die("Error");

	
	$id =  addslashes($_GET['id']);
	if ($id!='') {
		$sql = "select * from #_album where hienthi=1 and id='".$id."'";
	$d->query($sql);
	$album_detail = $d->fetch_array();

	$title_detail = $album_detail['ten_'.$lang];

	$title_bar .= $album_detail['title'];
	$keyword_bar .= $album_detail['keywords'];
	$description_bar .= $album_detail['description'];

	$share_facebook = '<meta property="og:url" content="'.getCurrentPageURL().'" />';
	$share_facebook .= '<meta property="og:type" content="website" />';
	$share_facebook .= '<meta property="og:title" content="'.$album_detail['ten_'.$lang].'" />';
	$share_facebook .= '<meta property="og:description" content="'.$album_detail['mota_'.$lang].'" />';
	$share_facebook .= '<meta property="og:image" content="http://'.$config_url.'/'._upload_album_l.$album_detail['photo'].'" />';

	
	#các tin cu hon
	$sql_khac = "select * from #_album_photo where hienthi=1 and id_album ='".$album_detail['id']."' order by id desc";
	$d->query($sql_khac);
	$album_images = $d->result_array();

	} else {
		$sql_tintuc = "select * from #_album where hienthi=1 order by id desc";
		$d->query($sql_tintuc);
		$album = $d->result_array();
		
		
		$title_bar .= $row_meta['title'];
		$keyword_bar .= $row_meta['keywords'];
		$description_bar .= $row_meta['description'];
	}
?>