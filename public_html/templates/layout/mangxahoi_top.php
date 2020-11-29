<?php
	$d->reset();
	$row_mangxahoi_top = "select photo,ten,url from #_lkweb where type='mxhtop' order by id desc";
	$d->query($row_mangxahoi_top);
	$row_mangxahoi_top = $d->result_array();
		
?>
<span class="mxh">
 <?php for($i=0;$i<count($row_mangxahoi_top);$i++) { ?>  
 	<a href="<?=$row_mangxahoi_top[$i]['url']?>" target="_blank"><img src="thumb.php?src=<?=_upload_hinhanh_l.$row_mangxahoi_top[$i]['photo']?>&w=30&h=30&zc=2&q=80" alt="<?=$row_mangxahoi_top[$i]['ten']?>" /></a>
 <?php } ?>
 </span>
