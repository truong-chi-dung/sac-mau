  <script type="text/javascript" src="js/my_script.js"></script>
  <script type="text/javascript">
    function js_submit(){
      if(isEmpty(document.getElementById('ten'), "Xin nhập Họ tên.")){
        document.getElementById('ten').focus();
        return false;
      }
      
      // if(isEmpty(document.getElementById('diachi'), "Xin nhập địa chỉ.")){
      //   document.getElementById('diachi').focus();
      //   return false;
      // }
      
      if(isEmpty(document.getElementById('dienthoai'), "Xin nhập Số điện thoại.")){
        document.getElementById('dienthoai').focus();
        return false;
      }
      
      if(!isNumber(document.getElementById('dienthoai'), "Số điện thoại không hợp lệ.")){
        document.getElementById('dienthoai').focus();
        return false;
      }
      
      if(!check_email(document.frm.email.value)){
        alert("Email không hợp lệ");
        document.frm.email.focus();
        return false;
      }
      
    
      if(isEmpty(document.getElementById('noidung'), "Xin nhập Nội dung.")){
        document.getElementById('noidung').focus();
        return false;
      }
      
      document.frm.submit();
    }
  </script>
  <div class="container">
    <h2 class="title-page"><?=_lienhe?></h2>
  <div class="row">
     <div class="col-md-7"><?=$row_detail['noidung_'.$lang];?><div class="clear" style="border-bottom:1px solid #999; margin-bottom:20px; ">&nbsp;</div></div>
    
    <div class="col-md-5">
      <form method="post" name="frm" action="" enctype="multipart/form-data" class="form-horizontal" role="form">
        <div class="form-group">
         <div class=" control-label"><?=_hovaten?><font color="red">*</font></div>
         <input type="text" id="ten" name="ten" class="form-control" placeholder="<?=_hovaten?>">
       </div>
       <div class="form-group">
         <div class=" control-label"><?=_diachi?><font color="red">*</font></div>
         <input type="text" id="diachi" name="diachi" class="form-control" placeholder="<?=_diachi?>">
       </div>
       <div class="form-group">
         <div class=" control-label"><?=_dienthoai?><font color="red">*</font></div>
         <input type="text" id="dienthoai" name="dienthoai" class="form-control" placeholder="<?=_dienthoai?>">
       </div>
       <div class="form-group">

         <div class=" control-label">Email<font color="red">*</font></div>

         <input type="text" id="inputEmail3" name="email" class="form-control" placeholder="Email">
       </div>
       
      <p class="error red"></p>
      <div class="form-group">
       <div class=" control-label"><?=_noidung?><font color="red">*</font></div>
       <textarea name="noidung" class="form-control" id="noidung" rows="5" placeholder="<?=_noidung?>" ></textarea>
     </div>
     <div class="form-group">
      <div class='text-right'>
        <button type="button" class="btn btn-danger" onclick="js_submit();"><?=_gui?></button>
        <button type="button" class="btn btn-danger" onclick="document.frm.reset();"><?=_nhaplai?></button>
      </div>
    </div>
    <input type="hidden" name="recaptcha_response" class="recaptchaResponse"/>
  </form>
</div>

 <div class="clearfix"></div>
<div id="map_canvas"><?=$row_setting['toado']?></div>

</div>

</div>