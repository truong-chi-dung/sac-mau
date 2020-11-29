<?php
	$d->reset();
	$sql_product_l_1="select ten_$lang,tenkhongdau,id from #_product_list where hienthi=1 and type='product' order by stt,id desc ";	
	$d->query($sql_product_l_1);	
	$result_list=$d->result_array();
?>

<div class="bg-tieudesanpham"><h2>SITEMAP</h2></div>
<div class="product-all">		
        <ul class="sitemap">
        	<li><a href="index.html">Trang chủ</a></li>
            <li><a href="gioi-thieu.html">Giới thiệu</a></li>
            <li><a href="san-pham.html">Sản phẩm</a>
            	<ul class="sitemap-parent">
            	<?php for($i=0;$i<count($result_list);$i++){
            		$d->reset();
					$sql_product_l_1="select ten_$lang,tenkhongdau,id from #_product_cat where hienthi=1 and id_list= '".$result_list[$i]['id']."' and type='product' order by stt,id desc ";	
					$d->query($sql_product_l_1);	
					$result_cat=$d->result_array(); 
            	?>                 	
                        	<li><a href="san-pham/<?=$result_list[$i]['tenkhongdau']?>.html"><?=$result_list[$i]['ten_'.$lang]?></a>
                            	<ul class="sitemap-child">
                                <?php for($j=0;$j<count($result_cat);$j++){?>
                                	<li class="sitemap-li-child"><a href="san-pham/<?=$result_list[$i]['tenkhongdau']?>/<?=$result_cat[$j]['tenkhongdau']?>.htm"><?=$result_cat[$j]['ten_'.$lang]?></a></li>
                                <?php } ?>
                                </ul>
                            </li>
                            
                        
                        <?php } ?>
                 </ul>
            </li>       
            <li><a href="tin-tuc.html">Tin tức</a></li>
            <li><a href="tuyen-dung.html">Tuyển dụng</a></li>
            <li><a href="site-map.html">Sitemap</a></li>
            <li><a href="lien-he.html">Liên hệ</a></li>
        </ul>           
 </div> 
 
            