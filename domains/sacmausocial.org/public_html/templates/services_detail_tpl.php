<div class="bg"><h4>CHI TIẾT</h4></div>
                <div class="product-all">
	<div style="margin-bottom:10px"><h2 style="text-transform:uppercase; color:#345dcd; font-weight:bold"><?php echo $row_detail["ten"] ?></h2></div>
    <div style="margin-bottom:10px"><h2 style="color:#666666; font-size:13px"><?php echo $row_detail["diadiem"] ?></h2></div>
                    	<div style="margin-bottom:10px"><img src="<?=_upload_product_l.$row_detail['thumb']?>" border="0" alt="<?=$row_detail['ten']?>" width="600px" height="469px" alt="" /></div>
                    	<div style="margin-right:20px"><span><?php echo $row_detail["noidung"] ?></span></div>
                        <div class="clear" style="height:20px"></div>
                  		<h2>CÁC CÔNG TRÌNH KHÁC</h2>
<?php foreach($product_khac as $tinkhac){?>
<div class="congtrinh" style="margin-top:20px">		
					<div><img src="<?=_upload_product_l.$tinkhac['thumb']?>" border="0" alt="<?=$tinkhac['ten']?>" /></div>		
                    <div class="ten-product"><?php echo $tinkhac["ten"] ?></div>
                    <div class="diadiem-product"><font color="#333333">Địa điểm: </font><?php echo $tinkhac["diadiem"] ?></div>
                    <div class="bt-product"><a href="cong-trinh/<?=$tinkhac['tenkhongdau']?>-<?=$tinkhac['id']?>.html"><img src="images/xemthem.png" /></a></div>
                    
                </div>
                <div class="clear"></div>
<?php }?>
                        
 </div>
 
               





            
            
            	
            

