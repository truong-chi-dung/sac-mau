<?php 
	$d->reset();
	$sql_tieubieu = "select photo_vi,link,ten_$lang,mota_$lang from #_photo where type='tieubieu' order by stt,id desc";
	$d->query($sql_tieubieu);
	$result_tieubieu=$d->result_array();
?>
<div class="dichvu-all">
	<div class="content-tieubieu">
		<?php foreach($result_tieubieu as $v){ ?>
			<div class="item col-xs-12">
				<div class="tieubieu">
					<img class="transition lazy" alt="<?=$v['ten_'.$lang]?>" src="thumb/62x62/2/<?=_upload_hinhanh_l.$v['photo_vi']?>">
					<div class="des_tieubieu">
						<h2 class="transition"><?=$v['ten_'.$lang]?></h2>
						<p><?=$v['mota_'.$lang]?></p>
					</div>
				</div>
			</div>  
		<?php } ?>
	</div>
	<div class="clear"></div>
</div>
<div class="clear"></div>
<!-- 
<script type="text/javascript">
	$(document).ready(function(){
		$('.owl-tieubieu').owlCarousel({
	        autoplay:true,
	        margin:30,
	        nav:true,
	        responsive:{
	            0:{
	                items:1
	            },
	            600:{
	                items:2
	            },
	            1000:{
	                items:3
	            }
	        }
	    })
	})
</script>	 -->