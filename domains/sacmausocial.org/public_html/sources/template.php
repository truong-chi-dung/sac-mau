<?php
	
	$d->reset();
    $sql_banner_top= "select thumb_$lang from #_photo where type='logo'";
    $d->query($sql_banner_top);
    $logo_top = $d->fetch_array();

    $d->reset();
    $sql_banner_top= "select thumb_$lang from #_photo where type='banner'";
    $d->query($sql_banner_top);
    $banner = $d->fetch_array();

    $d->reset();
    $sql_banner_top= "select * from #_bgweb where type='bg_header'";
    $d->query($sql_banner_top);
    $bg_header = $d->fetch_array();

    $d->reset();
    $sql_banner_top= "select * from #_bgweb where type='bgweb'";
    $d->query($sql_banner_top);
    $bg_body = $d->fetch_array();

	$d->reset();
    $sql = "select ten,id,url,photo from #_lkweb where hienthi=1 and type='mxh' order by id asc";
    $d->query($sql);
    $mxh = $d->result_array();
	
	$d->reset();
    $sql = "select ten,id,url,photo,thumb from #_lkweb where hienthi=1 and type='chinhanh' order by id asc";
    $d->query($sql);
    $chinhanh = $d->fetch_array();

	 $d->reset();
    $sql = "select ten_$lang as ten,id,tenkhongdau,thumb,photo from #_baiviet_list where hienthi=1 and type='hethong'  order by stt,id desc";
    $d->query($sql);
    $hethong = $d->result_array();
		
    $d->reset();
    $sql = "select ten_$lang as ten,id,link,photo_vi,thumb_vi,mota_$lang as mota from #_photo where hienthi=1 and type='slider' order by id asc";
    $d->query($sql);
    $slider = $d->result_array();

    $d->reset();
    $sql_support="select * from #_yahoo where hienthi= 1 order by stt,id desc";
    $d->query($sql_support);
    $hotro=$d->result_array();
    
    $d->reset();
    $sql = "select ten_$lang as ten,id,links from #_video where hienthi=1 and type='video' order by stt,id desc";
    $d->query($sql);
    $video = $d->result_array();

    $d->reset();
    $sql = "select ten_$lang as ten,id,tenkhongdau,thumb,mota_$lang as mota,ngaytao from #_baiviet where hienthi=1 and type='tintuc' and noibat>0 order by stt,id desc";
    $d->query($sql);
    $tin_nb = $d->result_array();
	
	$d->reset();
    $sql = "select ten_$lang as ten,id,tenkhongdau,thumb,mota_$lang as mota,ngaytao from #_baiviet where hienthi=1 and type='tintuc' and noibat>0 order by stt,id desc limit 0,4";
    $d->query($sql);
    $tintuc_bt = $d->result_array();
	
		
	$d->reset();
    $sql = "select ten_$lang as ten,id,tenkhongdau,thumb,mota_$lang as mota,ngaytao from #_baiviet where hienthi=1 and type='suckhoe' and noibat>0 order by stt,id desc";
    $d->query($sql);
    $suckhoe = $d->result_array();
	
	$d->reset();
    $sql = "select ten_$lang as ten,id,tenkhongdau,thumb,mota_$lang as mota,ngaytao from #_baiviet where hienthi=1 and type='gockhachhang' order by stt,id desc";
    $d->query($sql);
    $gockhachhang = $d->result_array();
	
	$d->reset();
    $sql = "select ten_$lang as ten,id,tenkhongdau,thumb,mota_$lang as mota,ngaytao from #_baiviet where hienthi=1 and type='chuyenkhoa' order by stt,id desc";
    $d->query($sql);
    $chuyenkhoa = $d->result_array();
	

	
	$d->reset();
    $sql = "select ten_vi,id,link,photo_vi,thumb_vi from #_photo where hienthi=1 and type='doitac' order by id asc";
    $d->query($sql);
    $doitac = $d->result_array();
	
	$d->reset();
    $sql = "select ten_vi,id,link,photo_vi,thumb_vi from #_photo where hienthi=1 and type='quangcaogiua' order by id asc";
    $d->query($sql);
    $quangcaogiua = $d->result_array();
	
	$d->reset();
    $sql = "select ten_vi,id,link,photo_vi,thumb_vi from #_photo where hienthi=1 and type='quangcaobt' order by id asc";
    $d->query($sql);
    $quangcaobt = $d->result_array();

    $d->reset();
    $sql = "select ten_vi,id,link,photo_vi,thumb_vi from #_photo where hienthi=1 and type='quancao_sl' order by id asc";
    $d->query($sql);
    $quancao_sl = $d->result_array();

     $d->reset();
    $sql = "select ten_vi,id,link,photo_vi,thumb_vi from #_photo where hienthi=1 and type='quancao_top' order by id asc";
    $d->query($sql);
    $quancao_top = $d->result_array();
	
	$d->reset();
    $sql = "select ten_vi,id,link,photo_vi,thumb_vi from #_photo where hienthi=1 and type='thethanhvien' order by id asc";
    $d->query($sql);
    $thethanhvien = $d->result_array();
	
	$d->reset();
    $sql_dmsp="select ten_$lang as ten,tenkhongdau,id from #_product_list where hienthi =1 and type='product'  order by stt,id desc";
    $d->query($sql_dmsp);
    $product_list_left=$d->result_array();

        $d->reset();
    $sql_dmsp="select ten_$lang as ten,tenkhongdau,id from #_product_list where hienthi =1 and type='product'  and noibat=1 order by stt,id desc";
    $d->query($sql_dmsp);
    $product_list_menu=$d->result_array();
	
	$d->reset();
    $sql = "select ten_$lang as ten,id,links from #_video where hienthi=1 and type='video' order by stt,id desc";
    $d->query($sql);
    $video = $d->result_array();

    $d->reset();
    $sql = "select ten_$lang as ten,id,tenkhongdau,thumb,mota_$lang as mota,ngaytao from #_baiviet where hienthi=1 and type='hotro' order by stt,id desc";
    $d->query($sql);
    $hotro_ft = $d->result_array();


     $d->reset();
    $sql = "select ten_$lang as ten,id,tenkhongdau,thumb,mota_$lang as mota,ngaytao from #_baiviet where hienthi=1 and type='hotro' order by stt,id desc";
    $d->query($sql);
    $hotro_bt = $d->result_array();

     $d->reset();
    $sql = "select ten_$lang as ten,id,tenkhongdau,thumb,mota_$lang as mota,ngaytao from #_baiviet where hienthi=1 and type='dichvu' order by stt,id desc";
    $d->query($sql);
    $dichvu_ft = $d->result_array();

     $d->reset();
    $sql = "select ten_$lang as ten,id,tenkhongdau,thumb,mota_$lang as mota,ngaytao from #_baiviet where hienthi=1 and type='chuongtrinh' order by stt,id desc";
    $d->query($sql);
    $chuongtrinh_ft = $d->result_array();

  

?>