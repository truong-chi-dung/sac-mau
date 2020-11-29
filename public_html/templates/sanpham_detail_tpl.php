<div class="bg-tieude" style="background-repeat:no-repeat">
	<span><h4><a style="color:white" href="#">CHI TIẾT SẢN PHẨM</a></h4></span>
</div>
<div class="product-all">
	<div style="margin-bottom:10px"><h2 style="text-transform:uppercase; color:#345dcd; font-weight:bold"><?php echo $row_detail["ten"] ?></h2></div>
                    	<div style="margin-bottom:10px"><img src="<?=_upload_sanpham_l.$row_detail['thumb']?>" border="0" alt="<?=$row_detail['ten']?>" width="650px" height="459px" alt="" /></div>
                    	<div><span><?php echo $row_detail["noidung"] ?></span></div>
                        <div class="clear" style="height:20px"></div>
                        <h2>Các bài viết khác</h2>
   <ul style="padding:10px 55px">
           
<?php foreach($sanpham_khac as $tinkhac){?>
<li><a href="san-pham/<?=$tinkhac['tenkhongdau']?>-<?=$tinkhac['id']?>.html" style="text-decoration:none; color:#345dcd "><?=$tinkhac['ten']?></a> (<?=make_date($tinkhac['ngaytao'])?>)</li>
<?php }?>
     </ul>
 </div>

               





            
            
            	
            

