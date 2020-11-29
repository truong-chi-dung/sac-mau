<?php  if(!defined('_source')) die("Error");

	$d->reset();
	$sql = "select ten_$lang,tenkhongdau,id,photo,giaban,giacu from #_product where hienthi=1 and type='product' and noibat!=0 order by stt,id desc";
	$d->query($sql);
	$result_product_km = $d->result_array();
?>