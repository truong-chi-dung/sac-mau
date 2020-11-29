
    <div id="content-right">

    	<?php
                    for($i=0,$count=count($result_khachhang);$i<$count;$i++)
                    {					
                    ?>
                        <div class="product">
                            <div class="bg-sanpham">
                            	<a href="<?= $result_khachhang[$i]['mota'] ?>.html" target="_blank"><img src="<?=_upload_hinhanh_l.$result_khachhang[$i]['thumb']?>" /></a> 
                            </div>                          
                        </div>
                     <?php } ?>
                    <div class="clear" style="height:10px"></div> 
                    <div class="phantrang" style="text-align:center" ><?=$paging['paging']?></div> 
    </div>     
    <div class="clear"></div>                


            