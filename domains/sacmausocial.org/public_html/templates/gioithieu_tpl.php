<div class="bg-tieudesanpham"><h3><?=_gioithieu?></h3></div>
<div class="product-all"> 
  <?php
         if(count($tintuc)>0){
         for($i=0,$count_tintuc=count($tintuc);$i<$count_tintuc;$i++){
       ?>
              <div class="col-md-3 col-xs-6 col-sm-6 wow ScaleYIn">
                <div class="product">
                    <div class="hinh-product transition hover_sang1">
                        <a href="gioi-thieu/<?=$tintuc[$i]['tenkhongdau']?>.htm"><img class="transition" src="thumb.php?src=<?=_upload_baiviet_l.$tintuc[$i]['photo']?>&w=278&h=300&zc=2&q=80" border="0" alt="<?=$tintuc[$i]['ten_'.$lang]?>" /></a>
                    </div>  
                    <div class="mota-product">
                        <div class="ten-product"><h3><a href="gioi-thieu/<?=$tintuc[$i]['tenkhongdau']?>.htm"><?php echo $tintuc[$i]["ten_".$lang] ?></a></h3></div> 
                    </div>
                </div>  
            </div>    
                       
        <?php } }else echo '<p>Nội dung đang cập nhật, bạn vui lòng xem các chuyên mục khác.</p>';  ?>
        <div class="clear" style="height:10px"></div>                        
        <div class="phantrang"><?=$paging['paging']?></div>
        <div class="clear" style="height:10px"></div> 
</div>             

