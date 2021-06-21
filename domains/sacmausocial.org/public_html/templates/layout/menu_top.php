<?php	
	$d->reset();
	$result_list_sanpham="select ten_$lang,tenkhongdau,id,thumb from #_product_list where hienthi=1 and type='product' order by stt,id desc ";	
	$d->query($result_list_sanpham);	
	$result_list_sanpham=$d->result_array();
    $d->reset();
    $result_about="select ten_$lang,tenkhongdau,id ,ngaytao from #_baiviet where hienthi=1 and type='gioithieu' order by stt,id desc ";    
    $d->query($result_about); 	
    $result_about=$d->result_array();
?>
<div id="menu" class="">
    <div class="container container-fix">
        <a href="index.html"> <img src="thumb/100x80/2/<?=_upload_hinhanh_l.$row_logo[0]['photo_vi']?>" alt="banner" class="logo" /> </a>
        <div class="boxMenu">
            <nav class="navbar">
                <div class="container-fluid-none">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-menu-top"> <span class="sr-only"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-menu-top">
                        <ul class="nav navbar-nav">
                            <li> <a href="index.html" class="home">  Trang chủ </a> </li>
                            <li class="menu-gioithieu"> <a href="gioi-thieu/<?=$result_about[0]['tenkhongdau']?>-<?=$result_about[0]['id']?>.html" target="_self" class="gioithieu cat-0">  Giới thiệu </a>
                                <ul class="dropdown-menu">
                                    <?php
                                        
                                        
                                        foreach($result_about as $k=>$v){
                                    ?>
                                        <li> <a href="gioi-thieu/<?=$v['tenkhongdau']?>-<?=$v['id']?>.html" target="_self"><?=$v['ten_vi']?></a> </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class="menu-hoatdong"> <a href="" target="_self" class="hoatdong cat-0 menu-li-4-nguyen">  Hoạt động </a>
                                <ul class="dropdown-menu">
                                    <?php
                                        $d->reset();
                                        $resulthoatdong="select ten_$lang,tenkhongdau,id ,ngaytao from #_baiviet_list where hienthi=1 and type='hoatdong' order by stt,id desc ";    
                                        $d->query($resulthoatdong); 
                                        $resulthoatdong=$d->result_array();
                                        foreach($resulthoatdong as $k=>$v){
                                    ?>
                                        <li> <a href="hoat-dong/<?=$v['tenkhongdau']?>.html" target="_self"><?=$v['ten_vi']?></a> </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class="menu-tintuc"> <a href="tin-tuc.html" target="_self" class="tintuc cat-0 menu-li-6-nguyen">  Tin tức </a>
                                <ul class="dropdown-menu">
                                    <?php
                                        $d->reset();
                                        $resulttintuc="select ten_$lang,tenkhongdau,id ,ngaytao from #_baiviet_list where hienthi=1 and type='tintuc' order by stt,id desc ";    
                                        $d->query($resulttintuc); 
                                        $resulttintuc=$d->result_array();
                                        foreach($resulttintuc as $k=>$v){
                                    ?>
                                        <li> <a href="tin-tuc/<?=$v['tenkhongdau']?>.html" target="_self"><?=$v['ten_vi']?></a> </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class="menu-gallery"> <a href="thu-vien-hinh-anh.html" target="_self" class="gallery video gallery">  Thư viện </a>
                                <ul class="dropdown-menu">
                                    
                                    <li class="menu-video"> <a href="thu-vien-video.html" target="_self" class="video">Video</a> </li>
                                    <li class="menu-gallery"> <a href="thu-vien-hinh-anh.html" target="_self" class="gallery">Hình ảnh</a> </li>
                                </ul>
                            </li>
                            <li class="menu-"> <a href="lien-he.html" target="_self" class="thamgia">Liên hệ</a> </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>
        </div>
    </div>
</div>