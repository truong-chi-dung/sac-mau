<div id="content-right">	   
	<h1 style="color:#ac0b0b; font-size:18px"><?=catchuoi($row_detail['ten_'.$lang],200)?></h1>
   <div class="noidung_tintuc"><?=$row_detail['noidung_'.$lang]?></div>
   <h2>Các bài viết khác</h2>
   <ul style="padding:5px 55px">        
<?php foreach($tintuc_khac as $tinkhac){?>
<li><a href="tin-tuc/<?=$tinkhac['tenkhongdau']?>-<?=$tinkhac['id']?>.html" style="text-decoration:none; color:#345dcd "><?=$tinkhac['ten_'.$lang]?></a> (<?=make_date($tinkhac['ngaytao'])?>)</li>
<?php }?>
     </ul>
</div>
<div class="clear"></div>fgf
