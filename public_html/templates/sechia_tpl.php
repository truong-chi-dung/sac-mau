<?php
    $d->reset();
    $sql = "select photo_$lang from #_photo where type='".$com."'";
    $d->query($sql);
    $hoatdong = $d->fetch_array();
   //echo $photo;
?>

<div class="bannerPrallax">
    <div class="">
       <!--  <h1><?=$title_detail?></h1> -->
        <div class="parallax-banner parallaxor-container"> <img src="<?=_upload_baiviet_l.$photo?>" alt="<?=$title_detail?>" class="parallaxor-layer" style="transform: translate(0px, 12.3511px);"> </div>
    </div>
</div>
<div id="wrapper">
    <div class="container" style="padding-top:20px;">
        <h2 class="title-page"><?=$title_detail?></h2>
        <div class="timelineList">
            <?php foreach($tintuc as $k=>$v){?>
            <div class="items">
                <time datetime="<?=date('d/m/Y', $v['ngaytao']);?>" class="date"><?=date('d/m/Y', $v['ngaytao']);?></time>
                <div class="col-md-4 col-sm-3 col-xs-12">
                    <a class="img hvr-bubble-float-right" href="<?=$com?>/<?=$v['tenkhongdau']?>-<?=$v['id']?>.html" title="<?=$v['ten_'.$lang]?>"> <span class="over"></span> <img class="" src="thumb/210x170/1/<?=_upload_baiviet_l.$v['photo']?>" alt="<?=$v['ten_'.$lang]?>" title="<?=$v['ten_'.$lang]?>" style="display: inline;"> </a>
                </div>
                <div class="col-md-8 col-sm-9 col-xs-12"> <a class="title" href="<?=$com?>/<?=$v['tenkhongdau']?>-<?=$v['id']?>.html" title="<?=$v['ten_'.$lang]?>">  <?=$v['ten_'.$lang]?> </a>
                    <div class="description"> <?=$v['mota_'.$lang]?></div>
                </div>
            
                <div class="clearfix"></div>
            </div>
            <?php } ?>
        </div>
        <div class="box-pagination">
            
            <div class="pagination-container">
                <?=$paging?>
              
            </div>
        </div>
    </div>
    <div class="container-fluid boxdonate_tomtat">
        <div class="container">
            <section class="boxBannerAds">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="circle"></div>
                        <h1 style="text-align: center;">Xin cảm ơn tấm chân tình của tất cả Tình Nguyện Viên<br> và các Mạnh Thường Quân!</h1> </div>
                </div>
            </section>
        </div>
    </div>
</div>