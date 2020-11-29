<?php 
	$d->reset();
	$d->query("select tenkhongdau,photo,ten_$lang,mota_$lang,h1 from #_product where type='product' and hienthi=1 and noibat=1 order by stt asc limit 4");
	$product = $d->result_array();
?>
<div class="bg-tieudesanpham">
	<h2>Sản phẩm <font>nổi bật</font></h2>
</div>
<?=get_product($product,'','san-pham');?>
<div class="t-center">
	<a class="a-sp" href="san-pham.html">Xem thêm sản phẩm</a>
</div>