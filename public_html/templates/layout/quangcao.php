<?php 
	$d->reset();
	$sql = "select photo_vi,link,ten_vi from #_photo where type='quangcao' order by stt,id desc";
	$d->query($sql);
	$quangcao=$d->result_array();
?>
<div class="dichvu-all">
<div class="slider_quangcao">
	<?php foreach($quangcao as $v){ ?>
		<div class="item ">
			<img class="transition lazy" src="thumb/1200x295/1/<?=_upload_hinhanh_l.$v['photo_vi']?>" border="0" alt="<?=$v['ten_'.$lang]?>" />
		</div>  
	<?php } ?>
</div>
	<div class="clear"></div>
</div>
<div class="clear"></div>


<!-- 
<script type="text/javascript">
	$(document).ready(function(){
		$('.owl-quangcao').owlCarousel({
	        autoplay:true,
	        margin:0,
	        nav:true,
	        loop:true,
	        animateOut: 'fadeOut',
	        responsive:{
	            0:{
	                items:1
	            },
	            600:{
	                items:1
	            },
	            1000:{
	                items:1
	            }
	        }
	    })
	})
</script>	 -->