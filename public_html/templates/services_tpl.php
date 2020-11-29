
    <div class="title_p ">
        <h3 class="title"><?=$title_detail?></h3></div>
<?php foreach($tintuc as $k=>$v){?>
    <div class="box_news"  <?php if(($k+1)%2==0){ echo 'style="margin-right:0px"';}?>>
        <div class="ten_tt">
            <h2> <a href="dich-vu/<?=$v['tenkhongdau']?>.html"> <?=$v['ten_'.$lang]?></a></h2></div>
        <div class="image_boder">
            <a href="dich-vu/<?=$v['tenkhongdau']?>.html"><img src="thumb/350x135/1/<?=_upload_baiviet_l.$v['photo']?>" alt=" <?=$v['ten_'.$lang]?>"></a>
        </div>
        <div class="mota_tt">
           <?=$v['motain_'.$lang]?>
        </div>
        <a class="chitiet" href="dich-vu/<?=$v['tenkhongdau']?>.html"><?=_chitiet?></a>
        <div class="clr"></div>
    </div>
<?php } ?>

    <div class="clr"></div>
    <div class="phantrang"></div>