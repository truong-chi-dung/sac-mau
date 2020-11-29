<?php 
	$d->Reset();
	$sql ="Select tenkhongdau,ten_$lang,photo,mota_$lang from #_product_list where type='product' and noibat=1 ";
	$d->query($sql);
	$list_product = $d->result_array();
?>

<div class="bg-tieudesanpham"><h2>Sản phẩm <font>nổi bật</font></h2></div>
<div class="dichvu-all">
	<div class="owl-carousel owl-theme">
		<?php for($i=0;$i<count($list_product);$i++) { ?>
			<div class="item ">
				<div class="dichvu">
					<div class="hinh-dichvu transition hover_sang1">
						<a href="san-pham/<?=$list_product[$i]['tenkhongdau']?>.htm"><img " class="transition" src="thumb.php?src=<?=_upload_product_l.$list_product[$i]['photo']?>&w=260&h=260&zc=1&q=80" border="0" alt="<?=$list_product[$i]['ten_'.$lang]?>" /></a>
						<div class="ten-dichvu"><h3><a href="san-pham/<?=$list_product[$i]['tenkhongdau']?>.htm"><?php echo $list_product[$i]["ten_".$lang] ?></a></h3></div>
					</div>	
		        	
				</div>
			</div>  
		<?php } ?>
	</div>
	<div class="clear"></div>
</div>
<div class="clear"></div>



<script type="text/javascript">
    $('.owl-carousel').owlCarousel({
        autoplay:false,
        margin:30,
        nav:true,
        responsive:{
            0:{
                items:4
            },
            600:{
                items:4
            },
            1000:{
                items:4
            }
        }
    })
</script>	