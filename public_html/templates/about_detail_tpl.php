<div class="bannerPrallax">
    <div class="">
        <h1><?=$row_detail['ten_'.$lang]?></h1>
        <div class="parallax-banner parallaxor-container"> <img src="<?=_upload_baiviet_l.$row_detail['photo']?>" alt="<?=$row_detail['ten_'.$lang]?>" class="parallaxor-layer" style="transform: translate(0px, 12.3511px);"> </div>
    </div>
</div>
<div>
    <div id="status"> </div>
    <div class="container-fluid bgWhite" style="padding:25px 0 0;">
        <div class="containerFix">
            <h2 class="title-page"><?=$row_detail['ten_'.$lang]?></h2> </div>
    </div>
    <div class="container-fluid bgWhite" style="padding:25px 0 75px;">
        <div class="containerFix">
            <div class="row">
                <div class="col-sm-12">
                   <?=$row_detail['noidung_'.$lang]?>
                </div>
            </div>
        </div>
    </div>
</div>