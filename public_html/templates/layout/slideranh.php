<?php
	$d->reset();
	$sql_slider = "select photo_vi,link,ten_vi from #_photo where type='slider' order by stt,id desc";
	$d->query($sql_slider);
	$result_slider=$d->result_array();
?>
<section id="boxSliderHome">
	<ul class="bxslider">
		<?php foreach($result_slider as $k=>$v){?>
		    <li>
		        <a title="<?=$v['ten_vi']?>"> <img src="<?=_upload_hinhanh_l.$v["photo_vi"]?>" alt="<?=$v['ten_vi']?>" /> </a>
		    </li>
		<?php } ?>
	    
	</ul>
</section>
<div class="clearfix"></div>