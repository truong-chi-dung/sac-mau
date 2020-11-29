<div>
    <div id="status"> </div>
    <div class="container" style="padding-top:20px;">
        <h1 class="title-page"><?=$title_detail?></h1>
        <div class="galleryList">
            <div class="row">
              <?php for($i=0;$i<count($album);$i++){ ?>
                <div class="items col-xs-6 col-sm-4 col-md-4">
                    <a href="<?=$com?>/<?=$album[$i]['tenkhongdau']?>-<?=$album[$i]['id']?>.html">
                        <div class="camera"></div> <img src="thumb/405x270/1/<?=_upload_album_l.$album[$i]['photo']?>" class="img" alt="<?=$album[$i]['ten_vi']?>">
                        <h3><?=$album[$i]['ten_vi']?></h3> </a>
                </div>
              <?php } ?>
            </div>
        </div>
        <div class="box-pagination">            
            <div class="pagination-container">
                <?=$paging?>
            </div>
        </div>
    </div>
   
</div>

