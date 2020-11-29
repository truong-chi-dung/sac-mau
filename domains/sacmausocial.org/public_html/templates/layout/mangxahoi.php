<?php
	$d->reset();
	$row_mangxahoi = "select photo,ten,url from #_lkweb where type='mxh' order by id desc";
	$d->query($row_mangxahoi);
	$row_mangxahoi = $d->result_array();
		
?>
<div class="mxh">Kết nối với chúng tôi
	 <div class="clear"></div>
 <?php for($i=0;$i<count($row_mangxahoi);$i++) { ?>  
 	<a href="<?=$row_mangxahoi[$i]['url']?>" target="_blank"><img src="thumb.php?src=<?=_upload_hinhanh_l.$row_mangxahoi[$i]['photo']?>&w=40&h=40&zc=2&q=80" alt="<?=$row_mangxahoi[$i]['ten']?>" /></a>
 <?php } ?>
 </div>
