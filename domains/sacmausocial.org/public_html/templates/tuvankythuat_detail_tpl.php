<div class="box_content">
<div class="tcat"><div class="icon">Chi tiết bài viết</div></div>
   <div class="content">    
   <h1 class="title_news"><?=$tintuc_detail[0]['ten']?> </h1>   
           <?=$tintuc_detail[0]['noidung'.$lang]?>
           
          <div class="othernews">
           <h1>Các tư vấn khác</h1>
           <ul>
           
<?php foreach($tintuc_khac as $tinkhac){?>
<li><a href="tu-van/<?=$tinkhac['tenkhongdau']?>-<?=$tinkhac['id']?>.html" style="text-decoration:none;"><?=$tinkhac['ten']?></a> (<?=make_date($tinkhac['ngaytao'])?>)</li>
<?php }?>
     </ul>
</div>
         </div>
         </div>