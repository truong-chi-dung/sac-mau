<div id="wrapper">
    <div id="status"> </div>
    <div class="container">
        <h2 class="title-page">  Thư viện ảnh </h2> </div>
    <div class="container-fluid" style="padding-top:20px;">
        <div class="container">
            <article id="boxContent">
                <div class="content">
                    <header>
                        <h1 class="title"><?=$album_detail['ten_'.$lang]?></h1>
                        <div class="date">Ngày đăng <?=date('d/m/Y', $album_detail['ngaytao']);?></div>
                    </header>
                    <div class="entry-body">
                        <p>&nbsp;</p>
                        <div class="galleryList row">
                        	<?php
							      $d->reset();
							      $sql = "select photo from #_album_photo where hienthi=1 and id_album='".$album_detail['id']."' and type='album' order by stt,id desc";
							      $d->query($sql);
							      $result_hinhanh = $d->result_array();
							       for($i=0;$i<count($result_hinhanh);$i++){ 
							?>
	                            <div class="items col-md-3 col-sm-4 col-xs-6">
	                                <a href="thumb/700x600/1/<?=_upload_album_l.$result_hinhanh[$i]['photo']?>" class="gallery-link "> <img src="thumb/425x340/1/<?=_upload_album_l.$result_hinhanh[$i]['photo']?>" alt="" class="hvr-round-corners"> <strong>   </strong> </a>
	                            </div>
                           	<?php } ?>
                        </div>
                        <!--/ .video-->
                    </div>
                    <!--/ .entry-body -->
                </div>
                <div class="clearfix"></div>
                <div class="addthis_native_toolbox" ></div>
                <div class="clearfix"></div>
            </article>
            <div class="boxOther">
                <div class="title-news">
                    <h3>  Bài viết bạn có thể quan tâm </h3> </div>
                <div class="galleryList">
                    <div class="row">
                    	<?php 
                    	$sql_khac = "select * from #_album where hienthi=1 and id !='".$album_detail['id']."' and type='album' order by id desc";
						$d->query($sql_khac);
						$album_images = $d->result_array();
                    	foreach($album_images as $k=>$v){?>
	                        <div class="items col-xs-6 col-sm-4 col-md-3">
	                            <a href="<?=$com?>/<?=$v['tenkhongdau']?>-<?=$v['id']?>.html">
	                                <div class="camera"></div> <img src="thumb/460x290/1/<?=_upload_album_l.$v['photo']?>" class="img" alt="<?=$v['ten_vi']?>">
	                                <h3><?=$v['ten_vi']?></h3> </a>
	                        </div>
	                    <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>