                             
                <div class="tcat"><?=$title_tcat?></div>
                
                <div class="content">
	 <?php for($i=0,$count_spmoi=count($tintuc);$i<$count_spmoi;$i++) { ?>       
    <div class="item_product">
    	<div class="images"><a href="san-pham/<?=$tintuc[$i]['tenkhongdau']?>-<?=$tintuc[$i]['id']?>.html" ><img src="<?=_upload_product_l.$tintuc[$i]['thumb']?>" width="160" border="0" /></a></div>
        <div class="name"><a href="san-pham/<?=$tintuc[$i]['tenkhongdau']?>-<?=$tintuc[$i]['id']?>.html"><?=$tintuc[$i]['ten']?></a></div>
        <div class="price">Giá: <?php if($tintuc[$i]['gia']==0) echo 'Liên hệ'; else echo number_format ($tintuc[$i]['gia'],0,",",".")." VNĐ";?></div>
    </div>
    <?php } ?>        
    <div class="clear"></div>
     <div class="phantrang" ><?=$paging['paging']?></div>
</div>
