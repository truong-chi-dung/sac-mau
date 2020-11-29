<?php
	$d->reset();
	$result_doitac="select link,photo_vi from #_photo where hienthi =1 and type='doitac' order by stt,id desc";
	$d->query($result_doitac);
	$result_doitac=$d->result_array();
?>

             
<div class="container-fix">
	<div id="owl-view-doitac" class="owl-carousel owl-theme">
		<?php for($i=0,$count=count($result_doitac);$i<$count;$i++) { ?>
		<div class="item">
			<a href="<?=$result_doitac[$i]['link']?>">
				<img src="thumb/185x95/2/<?=_upload_hinhanh_l.$result_doitac[$i]['photo_vi']?>" />
			</a>
		</div>
		<?php } ?>
	</div>
</div>				
	



    
 
