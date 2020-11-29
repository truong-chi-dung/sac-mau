<?php			
	$d->reset();
	$result_icon="select id,icon from #_product_list where hienthi=1 and type='product' and noibat!=0 order by stt,id desc ";	
	$d->query($result_icon);	
	$result_icon=$d->result_array();
													
?>
<div id="danhmuc_fixed">
    <?php for($i=0;$i<count($result_icon);$i++) { ?>
        <div class="img_fixed" data-id="<?=$result_icon[$i]['id']?>" data-link="#features_nhantin<?=$result_icon[$i]['id']?>">
            <img class="filter" src="thumb.php?src=<?=_upload_product_l.$result_icon[$i]['icon']?>&w=44&h=40&zc=1&q=80" alt="<?=$result_icon[$i]['icon']?>">
        </div>
    <?php } ?>
</div>