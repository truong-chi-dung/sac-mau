<?php  if(!defined('_source')) die("Error");

	$title_bar .= $row_setting['title'];
	$keyword_bar .= $row_setting['keywords'];
	$description_bar .= $row_setting['description'];

	$kiemtramail=$_SESSION['login']['email'];

	$d->reset();
	$sql_donhang = "select * from #_order where email='".$kiemtramail."' order by id desc";
	$d->query($sql_donhang);
	$row_donhang = $d->result_array();
	
?>