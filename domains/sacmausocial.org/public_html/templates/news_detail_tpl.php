<div class="box-container">
    <div id="status"> </div>
    <div class="container">
        <h1 class="h3fix"><?=$row_detail['ten_'.$lang]?></h1> </div>
    <div class="container-fluid" style="padding-top:20px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-9 colRight">
                    <div class="clearfix"></div>
                    <article class="page-content" id="boxContent">
                        <div class="content">
                            <header>
                              <!--   <h1 class="title"><?=$row_detail['ten_'.$lang]?></h1> -->
                                <div class="date">Ngày đăng <?=date('d/m/Y', $row_detail['ngaytao']);?></div>
                            </header>
                            <?=$row_detail['noidung_'.$lang]?>
                        </div>
                        <div class="clearfix"></div>
                        <div class="box-social">
                           <div class="addthis_native_toolbox" ></div>
                        </div>
                        <div class="clearfix"></div>
                    </article>
                    <div class="boxOther">
                        <div class="title-news">
                            <h3>  Bài viết bạn có thể quan tâm </h3> </div>
                        <div class="newsOtherList">
                            <ul>
                              <?php foreach($tintuc as $tinkhac){?>
                                  <li> <a href="<?=$com?>/<?=$tinkhac['tenkhongdau']?>-<?=$tinkhac['id']?>.html"><?=$tinkhac['ten_'.$lang]?><span class="date"><?=date('d/m/Y', $tinkhac['ngaytao']);?></span> </a> </li>
                              <?php } ?>
                               
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                       
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 colLeft ">
                    <div class="typicalList">
                        <div class="title-news">
                            <h3>Tin nổi bật</h3>
                        </div>
                        <?php foreach($tinmoi as $k=>$v){?>
                          <div class="items hvr-curl-top-left">
                            <div class="col-xs-4">
                                <a class="img" href="<?=$com?>/<?=$v['tenkhongdau']?>-<?=$v['id']?>.html" title="<?=$v['ten_'.$lang]?>"> <img src="thumb/100x75/1/<?=_upload_baiviet_l.$v['photo']?>" alt="<?=$v['ten_'.$lang]?>" title="<?=$v['ten_'.$lang]?>"> </a>
                            </div>
                            <div class="col-xs-8"> <a class="title" href="<?=$com?>/<?=$v['tenkhongdau']?>-<?=$v['id']?>.html" title="<?=$v['ten_'.$lang]?>">  <?=$v['ten_'.$lang]?> </a>
                                <div class="description hidden-sm"> </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                      <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
