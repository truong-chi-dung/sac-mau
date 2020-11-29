<div class="bg-tieudesanpham"><h2><?=$title_detail?></h2></div>
<div id="info_deals" class="usual">
    <ul id="tab_content">
        <?php foreach($tintuc as $k => $v){ ?>
        <li><a href="#tab<?=$k?>"><?=$v['ten_vi']?></a></li> 
        <?php } ?> 
    </ul>
    <div class="clear10"></div>
    <?php foreach($tintuc as $k => $v){ ?>
 	<div id="tab<?=$k?>">
 		<?=$v['noidung_vi']?>
 	</div>
 	<?php } ?>
</div>
<div class="clear"></div>