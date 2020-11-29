<?php
	$d->reset();
	$sql = "select photo_vi,link,ten_vi from #_photo where type='logo' order by stt,id desc";
	$d->query($sql);
	$result_logo=$d->result_array();	
?>
 
        <div class="item">
            <a href="">
                <img class="transition lazy" src="thumb/142x90/2/<?=_upload_hinhanh_l.$result_logo[0]['photo_vi']?>" border="0" alt="<?=$result_logo[0]['ten_vi']?>" />
            </a>
        </div> 
    
<!-- <div class="owl-carousel owl-theme owl-logo">
    <?php  
        foreach($result_logo as $v){ ?>
        <div class="item">
        	<a href="">
	            <img class="transition lazy" src="thumb/142x90/2/<?=_upload_hinhanh_l.$v['photo_vi']?>" border="0" alt="<?=$v['photo']?>" />
	        </a>
        </div> 
    <?php } ?>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('.owl-logo').owlCarousel({
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
</script> -->
<!-- <a href="index.html"><img src="thumb.php?src=<?=_upload_hinhanh_l.$row_logo[0]['photo_vi']?>&w=132&h=103&zc=2&q=80" alt="<?=$row_logo[0]['photo_'.$lang]?>" /></a> -->