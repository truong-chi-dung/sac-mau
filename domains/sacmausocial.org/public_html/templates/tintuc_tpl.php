<div id="content-right">
  <?php
			   if(count($result_tintuc)>0){
			   for($i=0,$count_tintuc=count($result_tintuc);$i<$count_tintuc;$i++){
		   ?>
            	<div class="news_left"><a href="tin-tuc/<?= $result_tintuc[$i]['tenkhongdau'] ?>-<?= $result_tintuc[$i]['id'] ?>.html"><img src="<?=_upload_tintuc_l.$result_tintuc[$i]['photo']?>" onerror="this.src='images/noimage.gif';" width="100px"/></a></div>
               <div class="news_right">
               		<p style="margin-bottom:10px"><a style="color:#ac0b0b" href="tin-tuc/<?= $result_tintuc[$i]['tenkhongdau'] ?>-<?= $result_tintuc[$i]['id'] ?>.html"><?=catchuoi($result_tintuc[$i]['ten_'.$lang],200)?></a></p>
                    <p style="margin-bottom:10px"><?=catchuoi($result_tintuc[$i]['mota_'.$lang],400)?></p>
               </div>
              <div class="clear"></div>    
                       
        <?php } }  ?>
                                
            <div class="phantrang" style="text-align:center"><?=$paging['paging']?></div>
</div>            

<div class="clear"></div>
