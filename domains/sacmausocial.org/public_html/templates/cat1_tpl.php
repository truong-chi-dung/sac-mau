                             
                <div class="tcat"><?=$title_tcat?></div>
                
                <div class="content">
	 <?php for($i=0,$count_spmoi=count($product);$i<$count_spmoi;$i++) { ?>       
    <div class="item_product" <?php if(($i+1)%4==0) echo 'style="margin-right:0px;"' ?>>
    	<div class="images"><a href="du-an/<?=$product[$i]['tenkhongdau']?>-<?=$product[$i]['id']?>.html" ><img src="<?=_upload_product_l.$product[$i]['thumb']?>" border="0" /></a></div>          
    </div>
    <?php } ?>      
    <div class="clear"></div>
     <div class="phantrang" ><?=$paging['paging']?></div>
</div>
