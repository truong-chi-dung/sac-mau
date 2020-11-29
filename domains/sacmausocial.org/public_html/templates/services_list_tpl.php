<div class="product-all">   
   <h1 class="title-global"><?=$row_detail['ten_'.$lang]?> </h1>
   <div class="addthis_native_toolbox" ></div>
   <div class="noidung_tintuc"><?=$row_detail['noidung_'.$lang]?></div>
   <div class="clear10"></div>
    <!-- <div class="fb-comments" data-href="http://<?=$config_url?>/<?=$_GET['com']?>/<?=$row_detail['tenkhongdau']?>.htm" data-numposts="5" data-width="100%" data-colorscheme="light"></div>-->
   <div class="othernews">
       <h2><?=_cacbaivietkhac?></h2>
        <?=get_dichvu($tintuc_list_dif,'',$com)?>
  </div>
</div>
