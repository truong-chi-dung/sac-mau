<div class="tcat"><div class="icon">Chi tiết đối tác</div></div>
<div class="box_content">
   <div class="content">    
   <h1 class="title_news"><?=$tintuc_detail[0]['ten']?> </h1>
           <?=$tintuc_detail[0]['noidung']?>
           
          <div class="othernews">
           <h1>Các đối tác khác</h1>
           <ul>
           
<?php foreach($tintuc_khac as $tinkhac){?>
<li><a href="doi-tac/<?=$tinkhac['tenkhongdau']?>-<?=$tinkhac['id']?>.html" style="text-decoration:none;"><?=$tinkhac['ten']?></a> (<?=make_date($tinkhac['ngaytao'])?>)</li>
<?php }?>
     </ul>
</div>
         </div></div>