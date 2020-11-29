<?php
    $d->reset();
    $sql = "select photo_$lang from #_photo where type='".$com."'";
    $d->query($sql);
    $hoatdong = $d->fetch_array();
?>
<div class="wrap-hoatdong">
    <div class="containerFix">
        <div class="tab-category">
            <ul class="tab-nav">
                <?php
                   // echo $_GET['idl'];
                   // echo $row_detail['tenkhongdau'];
                   // echo $id_fix;
                    foreach($hoatdong_cat as $k=>$v){
                ?>
                    <li class="litab <?php if($k==0){ echo 'active';}?>"><a href="#thongso-<?=$k?>"><?=$v['ten_vi']?></a></li>
                <?php } ?>
            </ul>
            <div class="tab-content">
                <?php foreach($hoatdong_cat as $k=>$v){ 
                    $d->reset();
                    $rs_hoatdong="select ten_$lang,tenkhongdau,id ,noidung_$lang, photo from #_baiviet where hienthi=1 and type='hoatdong' and id_cat='".$v['id']."' order by stt,id desc";    
                    $d->query($rs_hoatdong); 
                    $rs_hoatdong=$d->result_array();
                   
                ?>
                    <div class="tab <?php if($k==0){ echo 'active';}?>" id="thongso-<?=$k?>">
                        <?php foreach($rs_hoatdong as $k1=>$v1){ ?>
                            <h3><?=$v1['ten_vi']?></h3>
                            <div class="desc"><?=$v1['noidung_vi']?></div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<script>
    $().ready(function(){
        $(".tab-category li.litab a").click(function(){
            $(".tab-category li.litab").removeClass("active");
            $id = $(this).attr("href");
            $(this).parent().addClass("active");
            $(".tab-category .tab").fadeOut(function(){
                $(".tab-category .tab").removeClass("active");
                $(".tab-category .tab"+$id).fadeIn().addClass("active");                
            })            
            return false;
        });        
    })
</script>
<!-- <div class="bannerPrallax">
    <div class="">
        <h1><?=$title_detail?></h1>
        <div class="parallax-banner parallaxor-container"> <img src="<?=_upload_hinhanh_l.$hoatdong['photo_'.$lang]?>" alt="<?=$title_detail?>" class="parallaxor-layer" style="transform: translate(0px, 12.3511px);"> </div>
    </div>
</div> -->
