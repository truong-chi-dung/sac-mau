<div class="bg-tieudesanpham"><h3><?=_duan?></h3></div>
<div class="line-tieude"></div>
<div class="product-all">   
    
  <?php
               if(count($tintuc)>0){
               for($i=0,$count_tintuc=count($tintuc);$i<$count_tintuc;$i++){
           ?>
                <div class="news_left"><a href="du-an/<?=$tintuc[$i]['tenkhongdau']?>-<?=$tintuc[$i]['id']?>.html"><img src="<?=_upload_tintuc_l.$tintuc[$i]['thumb']?>" onerror="this.src='images/noimage.gif';"/></a></div>
               <div  class="news_right">
                    <h3><a href="du-an/<?=$tintuc[$i]['tenkhongdau']?>-<?=$tintuc[$i]['id']?>.html"><?=catchuoi($tintuc[$i]['ten_'.$lang],100)?></a></h3>
                    <p><?=catchuoi($tintuc[$i]['mota_'.$lang],600)?></p>
                    <p style="color:#666666"><?=_dangluc?>: <?=date('d-m-Y ',$tintuc[$i]['ngaytao'])?> - <?=_daxem?>: <?=$tintuc[$i]['luotxem']?></p>
               </div>
              <div class="clear"></div>    
                       
        <?php } }else echo '<p>Nội dung đang cập nhật, bạn vui lòng xem các chuyên mục khác.</p>';  ?>
        <div class="clear" style="height:20px"></div>                        
        <div class="phantrang"><?=$paging['paging']?></div>
</div>             

