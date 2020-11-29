<div class="bg-tieudesanpham"><h3><?=_kinhnghiemnhanong?></h3></div>
<div class="product-all"> 
  <?php
         if(count($tintuc)>0){
         for($i=0,$count_tintuc=count($tintuc);$i<$count_tintuc;$i++){
       ?>
              <div class="news_left"><a href="kinh-nghiem-nha-nong/<?=$tintuc[$i]['tenkhongdau']?>-<?=$tintuc[$i]['id']?>.html"><img src="<?=_upload_tintuc_l.$tintuc[$i]['thumb']?>" onerror="this.src='images/noimage.gif';"/></a></div>
               <div  class="news_right">
                  <h2><a href="kinh-nghiem-nha-nong/<?=$tintuc[$i]['tenkhongdau']?>-<?=$tintuc[$i]['id']?>.html"><?=$tintuc[$i]['ten_'.$lang]?></a></h2>
                  <p style="color:#000"><?=_dangluc?>: <?=date('d-m-Y ',$tintuc[$i]['ngaytao'])?> - <?=_daxem?>: <?=$tintuc[$i]['luotxem']?></p>
                  <p><?=$tintuc[$i]['mota_'.$lang]?></p>
               </div>
              <div class="clear" style="height:10px"></div>    
                       
        <?php } }else echo '<p>Nội dung đang cập nhật, bạn vui lòng xem các chuyên mục khác.</p>';  ?>
        <div class="clear" style="height:10px"></div>                        
        <div class="phantrang"><?=$paging['paging']?></div>
        <div class="clear" style="height:10px"></div> 
</div>             

