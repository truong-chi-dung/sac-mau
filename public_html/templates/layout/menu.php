<?php	
	$d->reset();
	$sql="select ten_$lang,tenkhongdau,id from #_product_list where hienthi=1 and type='product' order by stt,id desc ";	
	$d->query($sql);	
	$array_c1=$d->result_array();

    $d->reset();
    $sql="select ten_$lang,tenkhongdau,id from #_baiviet_list where hienthi=1 and type='dichvu' order by stt,id desc ";    
    $d->query($sql);    
    $dichvu_c1=$d->result_array();
?>
<ul class="menu-parent">
    <li <?=active_menu('')?>><a class="text-a" href="index.html"><?=_trangchu?></a></li>
    <li <?=active_menu('gioi-thieu')?>><a class="text-a" href="gioi-thieu.html"><?=_gioithieu?></a></li>
    <li <?=active_menu('san-pham')?>><a class="text-a" href="san-pham.html"><?=_sanpham?></a>
        <ul class="ul-child">
            <?php foreach($array_c1 as $v_c1){
                $d->reset();
                $sql="select ten_$lang,tenkhongdau,id from table_product_cat where hienthi=1 and id_list='".$v_c1['id']."' order by stt,id desc"; 
                $d->query($sql);    
                $array_c2=$d->result_array();
            ?>
            <li class="li-child"><a href="san-pham/<?=$v_c1['tenkhongdau']?>.html"><?=$v_c1['ten_'.$lang]?></a>
                <ul class="ul-child-child">
                <?php if(count($array_c2) > 0){
                    foreach($array_c2 as $v_c2){ 
                    $d->reset();
                    $sql="select ten_$lang,tenkhongdau,id from table_product_item where hienthi=1 and id_cat='".$v_c2['id']."' order by stt,id desc"; 
                    $d->query($sql);    
                    $array_c3=$d->result_array();
                ?>
                
                    <li class="li-child-child"><a href="san-pham/<?=$v_c1['tenkhongdau']?>/<?=$v_c2['tenkhongdau']?>.htm"><?=$v_c2['ten_'.$lang]?></a>
                        <ul class="ul-child-child-child">
                        <?php if(count($array_c3) > 0){
                        foreach($array_c3 as $v_c3){ ?>
                                <li class="li-child"><a href="san-pham/<?=$v_c1['tenkhongdau']?>/<?=$v_c2['tenkhongdau']?>/<?=$v_c3['tenkhongdau']?>.html"><?=$v_c3['ten_'.$lang]?></a>
                                </li>
                            
                        <?php } } ?>
                        </ul>
                    </li>
                <?php } } ?>
                </ul>
            </li>
            <?php 
            } ?>
        </ul>
    </li>
    <li <?=active_menu('dich-vu')?>><a class="text-a" href="dich-vu.html"><?=_dichvu?></a>
        <ul class="ul-child">
            <?php foreach($dichvu_c1 as $v_c1){?>
            <li class="li-child"><a href="dich-vu/<?=$v_c1['tenkhongdau']?>.html"><?=$v_c1['ten_'.$lang]?></a></li>
            <?php 
            } ?>
        </ul>
    </li>
    <li <?=active_menu('kinh-nghiem')?>><a class="text-a" href="kinh-nghiem.html">Kinh nghiệm</a></li>
    <li <?=active_menu('lien-he')?>><a class="text-a" href="lien-he.html"><?=_lienhe?></a></li>
</ul>	