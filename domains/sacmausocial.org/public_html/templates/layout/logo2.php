<?php
	$d->reset();
	$row_logo = "select photo_$lang from #_photo where type='logo' order by id desc";
	$d->query($row_logo);
	$row_logo = $d->result_array();
		
?>

<a href="index.html"><img src="thumb.php?src=<?=_upload_hinhanh_l.$row_logo[0]['photo_'.$lang]?>&w=230&h=160&zc=2&q=80" alt="<?=$row_logo[0]['photo_'.$lang]?>" /></a>