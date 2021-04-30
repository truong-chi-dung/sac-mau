 <div class="container" style="padding-top:20px;">
        <h1 class="h3fix"><?=$title_detail?></h1>
        <div class="wrap-box-news">
            <?php foreach($tintuc as $k=>$v){?>
                <div class="col-xs-6 col-sm-4">
                    <div class="items">                      
                        <a href="<?=$com?>/<?=$v['tenkhongdau']?>-<?=$v['id']?>.html" title="<?=$v['ten_'.$lang]?>">
                            <div class="img">
                                <img class="" src="thumb/410x300/1/<?=_upload_baiviet_l.$v['photo']?>" alt="<?=$v['ten_'.$lang]?>" title="<?=$v['ten_'.$lang]?>">
                            </div>
                            <div style="height: 40px;">
                              <h4><?=$v['ten_'.$lang]?></h4>
                            </div>
                        </a>                        <div class="description"> <?=catchuoi($v['mota_'.$lang],200);?></div>

                    </div>
                </div>
            
            <?php } ?>
            <div class="clearfix"></div>
        </div>
        <div class="box-pagination">
            
            <div class="pagination-container">
                <?=$paging?>
              
            </div>
        </div>
    </div>