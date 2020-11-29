<div class="tcat"><div class="icon"><?=$title_tcat?></div></div>
<div class="box_content">
<div class="content">
  <?php
			   if(count($tintuc)>0){
			   for($i=0,$count_tintuc=count($tintuc);$i<$count_tintuc;$i++){
		   ?>
    <div class="box_news">
            	<div class="image_boder"><a href="doi-tac/<?=$tintuc[$i]['tenkhongdau']?>-<?=$tintuc[$i]['id']?>.html"><img src="<?=_upload_tintuc_l.$tintuc[$i]['thumb']?>" onerror="this.src='images/noimage.gif';" width="120" height="80"/></a></div>
               <h2> <a href="doi-tac/<?=$tintuc[$i]['tenkhongdau']?>-<?=$tintuc[$i]['id']?>.html"><?=$tintuc[$i]['ten']?></a></h2>
               <p class="small">Đăng lúc: <?=date('d-m-Y h:i:s A',$tintuc[$i]['ngaytao'])?> - Đã xem: <?=$tintuc[$i]['luotxem']?></p>
              <p><?=$tintuc[$i]['mota']?></p>
              <div class="clear"></div>             
            </div>
        <?php } }else echo '<p>Nội dung đang cập nhật, bạn vui lòng xem các chuyên mục khác.</p>';  ?>                                     
            <div class="phantrang" ><?=$paging['paging']?></div>
    <div class="clear"></div>
</div></div>