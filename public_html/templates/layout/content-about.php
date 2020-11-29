<?php 
	$d->Reset();
	$sql ="Select tenkhongdau,ten_$lang,photo,mota_$lang from #_info where type='about' ";
	$d->query($sql);
	$about = $d->fetch_array();
?>
<div class="row">
	<div class="col-md-6 col-xs-12 col-sm-12 gth-right wow fadeInLeft">
		<div class="noidung-gt">
			<h3><?=$about['ten_'.$lang]?></h3>
			<p><?=catchuoi(strip_tags($about['mota_'.$lang]),985)?></p>
			<a class='xemthem' href="gioi-thieu.html"><?=_xemthem?> >></a>
		</div>
	</div>
	<div class="col-md-6 col-xs-12 col-sm-12 gth-left wow fadeInRight">
	<img class="transition img-responsive"  src="thumb.php?src=<?=_upload_hinhanh_l.$about['photo']?>&w=615&h=335&zc=2&q=80" border="0" alt="<?=$about['ten_'.$lang]?>" />
	</div>
</div>