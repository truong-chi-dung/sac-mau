<div id="content-right">
<div style="margin-bottom:30px"><b style="font-size:x-large; color:#ff0000; text-transform:uppercase"><?=_chungnhan?></b></div>
  <?php
			   if(count($tintuc)>0){
			   for($i=0,$count_tintuc=count($tintuc);$i<$count_tintuc;$i++){
		   ?>
            	<div class="news_left"><img src="<?=_upload_tintuc_l.$tintuc[$i]['photo']?>" onerror="this.src='images/noimage.gif';" width="100px"/></div>
               <div class="news_right">
               		<p style="margin-bottom:10px"><?=catchuoi($tintuc[$i]['ten_'.$lang],200)?></p>
                    <p style="margin-bottom:10px"><?=catchuoi($tintuc[$i]['mota_'.$lang],400)?></p>
                    <p><a style="color:#a5bcf9" href="<?=_upload_download_l.$tintuc[$i]['file']?>">Certificate</a></p>
               </div>
              <div class="clear"></div>    
                       
        <?php } } ?>
                                
            <div class="phantrang" style="text-align:center"><?=$paging['paging']?></div>
</div>            

<div class="clear"></div>
