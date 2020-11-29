<div class="bg-tieudesanpham t-center"><h2>Hình ảnh khách hàng</h2></div>
<?php
    $d->reset();
    $sql_tintuc = "select * from #_album where hienthi=1 and type='album' order by id asc";
    $d->query($sql_tintuc);
    $album = $d->result_array();
?>

  <div class="hinh-all row">
    <?php for($i=0;$i<count($album);$i++){ 
        $d->reset();
        $sql = "select photo from #_album_photo where hienthi=1 and id_album='".$album[$i]['id']."' and type='album' order by stt,id desc";
        $d->query($sql);
        $result_hinhanh = $d->result_array();

    ?>
      <div id="gallery<?=$i?>" class="col-md-3 col-sm-6 col-xs-6">
        <div class="album-a ">
          <a href="<?=_upload_album_l.$album[$i]['photo']?>">
            <img class="transition img-responsive" src="thumb.php?src=<?=_upload_album_l.$album[$i]['photo']?>&w=307.5&h=270&zc=1&q=80"/>
          </a>
          <a class="ten-album transition" href="<?=_upload_album_l.$album[$i]['photo']?>">
                <?=$album[$i]['ten_vi'];?>
            </a>
        </div>
        <?php for($j=0;$j<count($result_hinhanh);$j++){?>
         <div class="album-a" style="display:none">
            <a  href="<?=_upload_album_l.$result_hinhanh[$j]['photo']?>">
              <img src="<?=_upload_album_l.$result_hinhanh[$j]['photo']?>"/>
            </a>
        </div>
        <?php } ?> 
      </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#gallery<?=$i?>').photobox({ thumbs:true, loop:true });
        });
    </script> 

  <?php } ?>
  </div>
  <div class="clear"></div>