<div class="bg-tieudesanpham"><h3><?= _kinhnghiemnhanong ?></h3></div>
<div class="product-all">   
   <h1 class="title_news"><?=$tintuc_detail[0]['ten_'.$lang]?> </h1>
   <p style="color:#666;"><?=_dangluc?>: <?=date('d-m-Y ',$tintuc_detail[0]['ngaytao'])?> - <?=_daxem?>: <?=$tintuc_detail[0]['luotxem']?></p>
   <div class="addthis_native_toolbox" ></div>
   <div class="noidung_tintuc"><?=$tintuc_detail[0]['noidung_'.$lang]?></div>
   <div class="othernews">
       <h2><?=_cacbaivietkhac?></h2>
       <ul class="links_titles" style="padding:10px 55px">
               
    <?php foreach($tintuc_khac as $tinkhac){?>
    <li><a href="kinh-nghiem-nha-nong/<?=$tinkhac['tenkhongdau']?>-<?=$tinkhac['id']?>.html" ><?=$tinkhac['ten_'.$lang]?></a> <font color="#666">(<?=make_date($tinkhac['ngaytao'])?>)</font></li>
    <?php }?>
         </ul>
  </div>
</div>