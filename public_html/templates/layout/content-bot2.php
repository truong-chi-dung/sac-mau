<!-- <link rel="stylesheet" type="text/css" href="css/jquery.simplyscroll.css"/>
<script type="text/javascript" src="js/jquery.simplyscroll.min.js"></script> -->
<?php
  $d->reset();
  $lido="select ten_$lang,mota_$lang,tenkhongdau,photo from #_baiviet where hienthi =1 and type='lido' and noibat=1 order by stt,id asc limit 0,4";
  $d->query($lido);
  $lido=$d->result_array();

  $d->reset();
  $result_tintuc= "select mota_$lang,photo,ten_$lang,tenkhongdau,ngaytao from #_baiviet where hienthi=1 and type = 'tintuc' and noibat!=0 order by stt,id desc";
  $d->query($result_tintuc);
  $result_tintuc = $d->result_array();

  $d->reset();
  $album= "select photo from #_album where hienthi=1 and type = 'album' order by stt,id asc";
  $d->query($album);
  $album = $d->fetch_array();
?>


<div class="bg-tieude"><h2>Đặt lịch trực tuyến</h2></div>
<div class="bg-lich">
  <div class="bor-lich">
    <form name="frm" id="frm_datlich" action="lien-he.html" method="post">
          <div class="form-dla form-dlab">
                <input type="text" id="hoten" name="ten" class="form-dl" placeholder="<?=_hovaten?>" required/>
          </div>
          <div class="form-dla form-dlab">
                  <input type="text" id="dienthoai_dl" name="dienthoai" class="form-dl" placeholder="<?=_dienthoai?>" required/>
          </div>
           <div class="form-dla form-dlab">
                  <input type="text" id="diachi_dl" name="diachi" class="form-dl" placeholder="<?=_diachi?>" required/>
          </div>
          <div class="form-dla form-dlab">
                  <input type="text" id="email_dl" name="email" class="form-dl" placeholder="<?=_email?> (không bắt buộc)"/>
          </div>
          <div class="form-dla">
            <textarea name="noidung" class="form-dl" id="noidung_dl" rows="5" placeholder="<?=_noidung?>" ></textarea>
          </div>
          <div class="form-dla">
            <button type="submit" class="btn-dl  my_glass">Đặt lịch sữa chữa</button>
          </div>
           <input type="hidden" name="recaptcha_response" class="recaptchaResponse"/>
      </form>
    </div>
</div>