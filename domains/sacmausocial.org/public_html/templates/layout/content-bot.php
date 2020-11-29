<link rel="stylesheet" type="text/css" href="css/jquery.simplyscroll.css"/>
<script type="text/javascript" src="js/jquery.simplyscroll.min.js"></script>


<?php
  $d->reset();
  $lido="select ten_$lang,mota_$lang,tenkhongdau,photo from #_baiviet where hienthi =1 and type='lido' and noibat=1 order by stt,id asc limit 0,4";
  $d->query($lido);
  $lido=$d->result_array();

    $d->reset();
  $result_video="select ten_vi,links,id from #_video where hienthi =1 and type='video' order by stt,id desc";
  $d->query($result_video);
  $result_video=$d->result_array();
?>
<div class="row">
  <div class="col-md-6 wow fadeInLeft">
      <div class="bg-tieude"><h2><?=_taisao?></h2></div>
      <div class="lido-all">
        <?php for($i=0;$i<count($lido);$i++){ ?>  
        <div class="lido">
          <div class="ten_lido">
          <img src="images/lido<?=$i+1?>.png"><h2><a href="li-do/<?=$lido[$i]['tenkhongdau']?>.htm"><?=$lido[$i]['ten_vi']?></a></h2>
          </div>
          <div class="clear"></div>
        </div>
        <?php } ?>
      </div>
  </div>

  <div class="col-md-6">
    <div class="bg-tieude"><h2><?=_video?></h2></div>
    <div id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:445px;padding-left:0px; padding-right:0px;">
      <div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
        <ul class="amazingslider-slides" style="display:none;">
          <?php for($i=0;$i<count($result_video);$i++) { ?>
              <li><img src="http://img.youtube.com/vi/<?=youtobi($result_video[$i]['links'])?>/0.jpg" alt="<?=$result_video[$i]['ten_vi']?>">
              <video preload="none" src="https://www.youtube.com/embed/<?=youtobi($result_video[$i]['links'])?>?v=<?=youtobi($result_video[$i]['links'])?>" ></video>
              </li>
              <?php } ?>
          </ul>
          <ul class="amazingslider-thumbnails" style="display:none;">
            <?php for($i=0;$i<count($result_video);$i++) { ?>
              <li><img src="http://img.youtube.com/vi/<?=youtobi($result_video[$i]['links'])?>/0.jpg" alt="<?=$result_video[$i]['ten_vi']?>"></li>
              <?php } ?>
          </ul>
      </div>
    </div>
  </div>

</div>