<div class="container">
<div class="bg-tieudesanpham"><h2><?=$title_detail?></h2></div>
<div class="container" style="padding-top:20px;">
        <h2 class="title-page"><?=$title_detail?></h2>
        <div class="timelineList">
            <?php foreach($result_product as $k=>$v){?>
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
</div>