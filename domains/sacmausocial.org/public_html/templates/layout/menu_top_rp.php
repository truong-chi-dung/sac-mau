<?php	
	$d->reset();
	$result_list_sanpham="select ten_$lang,tenkhongdau,id from #_product_list where hienthi=1 and type='product' order by stt,id desc ";	
	$d->query($result_list_sanpham);	
	$result_list_sanpham=$d->result_array();	
?>
<a id="btn-lg" href="#menu" class="glyphicon glyphicon-align-justify"></a><div class="visible-xs marqueefix"><div class="top-marquee"><marquee><?=$row_setting['google']?></marquee></div></div>
<nav id="menu">
<ul >
    <li><a href="index.html"><?=_trangchu?></a></li>
    <li><a href="gioi-thieu.html"><?=_gioithieu?></a></li>
    <li><a href="san-pham.html"><?=_sanpham?></a>
        <ul>
            <?php foreach($array_c1 as $v_c1){
                $d->reset();
                $sql="select ten_$lang,tenkhongdau,id from table_product_cat where hienthi=1 and id_list='".$v_c1['id']."' order by stt,id desc"; 
                $d->query($sql);    
                $array_c2=$d->result_array();
            ?>
            <li><a href="san-pham/<?=$v_c1['tenkhongdau']?>.html"><?=$v_c1['ten_'.$lang]?></a>
                <ul>
                <?php if(count($array_c2) > 0){
                    foreach($array_c2 as $v_c2){ 
                    $d->reset();
                    $sql="select ten_$lang,tenkhongdau,id from table_product_item where hienthi=1 and id_cat='".$v_c2['id']."' order by stt,id desc"; 
                    $d->query($sql);    
                    $array_c3=$d->result_array();
                ?>
                
                    <li><a href="san-pham/<?=$v_c1['tenkhongdau']?>/<?=$v_c2['tenkhongdau']?>.htm"><?=$v_c2['ten_'.$lang]?></a>
                        <ul>
                        <?php if(count($array_c3) > 0){
                        foreach($array_c3 as $v_c3){ ?>
                                <li><a href="san-pham/<?=$v_c1['tenkhongdau']?>/<?=$v_c2['tenkhongdau']?>/<?=$v_c3['tenkhongdau']?>.html"><?=$v_c3['ten_'.$lang]?></a>
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
    <li><a href="dich-vu.html"><?=_dichvu?></a>
        <ul>
            <?php foreach($dichvu_c1 as $v_c1){?>
            <li><a href="dich-vu/<?=$v_c1['tenkhongdau']?>.html"><?=$v_c1['ten_'.$lang]?></a></li>
            <?php 
            } ?>
        </ul>
    </li>
    <li><a href="kinh-nghiem.html">Kinh nghiệm</a></li>
    <li><a href="bang-gia.html">Bảng giá</a></li>
    <li><a href="lien-he.html"><?=_lienhe?></a></li>
</ul>

</nav>
<div class="clear"></div>
<script type="text/javascript">
   jQuery(document).ready(function( $ ) {
      $("#menu").mmenu();
   });
</script>  
<script type="text/javascript">
   jQuery(document).ready(function( $ ) {
        $("#btn-lg").click(function(){
            $("#menu").css({"height":"-webkit-fill-available","overflow":"unset"});
       });
      $("#menu").mmenu();
   });
</script>     
