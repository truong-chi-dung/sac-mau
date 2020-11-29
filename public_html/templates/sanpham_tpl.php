<div class="bg-tieude" style="background-repeat:no-repeat">
	<span><h4><a style="color:white" href="#">SẢN PHẨM</a></h4></span>
</div>
<div class="product-all">
                <?php
				for($i=0,$count=count($result_sanpham);$i<$count;$i++)
				{					
				?>
                	<div class="product">
                    	<span style="padding:5px 5px; border:1px solid #d9d9d9; width:177px; height:125px; display:block"><img src="<?=_upload_sanpham_l.$result_sanpham[$i]['thumb']?>" border="0" alt="<?=$result_sanpham[$i]['ten']?>" /></span>
                        <span style="margin:0px 20px; width:471px">
                        	<div><h4 style="text-transform:uppercase; color:#345dcd; font-weight:bold"><?php echo $result_sanpham[$i]["ten"] ?></h4></div>
                            <div><p style="color:#575757"><?php echo $result_sanpham[$i]["mota"] ?></p></div>
                            <div style="float:right"><a href="san-pham/<?=$result_sanpham[$i]['tenkhongdau']?>-<?=$result_sanpham[$i]['id']?>.html"><img src="images/bt-chitiet.png" style="width:73px; height:23px" /></a></div>
                        </span>
                        <div class="clear"></div>
                    </div>
                 <?php } ?>
                </div>
    
        
					<div class="clear" style="height:20px;"></div>
     <div class="phantrang" style="text-align:center" ><?=$paging['paging']?></div>


