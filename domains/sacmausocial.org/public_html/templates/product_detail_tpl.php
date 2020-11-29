<?php
    $q = 1;
    if($_SESSION['cart']){
        for($i=0;$i<count($_SESSION['cart']);$i++){
            if($_SESSION['cart'][$i]['productid'] == $row_detail['id']){
                $q = $_SESSION['cart'][$i]['qty'];
            }
        }
    }
?>
<div id="product-detail">
    <div class="bg-tieudesanpham"><h2><?= _chitietsanpham ?></h2></div>
    <div class="row">
        <div id="left" class="col-md-5 col-sm-7">
            <div class="hinhchitiet">
                <a id="Zoomer" href="<?=_upload_product_l.$row_detail['photo']?>" class="MagicZoomPlus hinhchitiet" rel="selectors-effect-speed: 600;"><img src="thumb/590x380/2/<?=_upload_product_l.$row_detail['photo']?>" alt="<?=$row_detail['ten_'.$lang]?>"/></a>
                <div class="clear"></div>
                <div class="sl-all owl-carousel owl-theme" style="margin:15px 0px">
                    <?php if(count($result_hinhanh)>=1) { ?>
                        <div class="item"><a href="<?=_upload_product_l.$row_detail['photo']?>" rel="zoom-id: Zoomer" rev="thumb/590x380/2/<?=_upload_product_l.$row_detail['photo']?>"><img src="thumb/590x380/2/<?=_upload_product_l.$row_detail['photo']?>" alt="<?=$row_detail['ten_'.$lang]?>" width="80px"/></a>
                        </div>
                    <?php } ?>    
                    <?php for($i=0;$i<count($result_hinhanh);$i++) { ?>
                        <div class="item">
                    <a href="<?=_upload_product_l.$result_hinhanh[$i]['photo']?>" rel="zoom-id: Zoomer" rev="thumb/590x380/2/<?=_upload_product_l.$result_hinhanh[$i]['photo']?>"><img src="thumb/590x380/2/<?=_upload_product_l.$result_hinhanh[$i]['photo']?>" alt="<?=$row_detail['ten_'.$lang]?>" width="80px" /></a>
                </div>
                    <?php } ?>
                </div>                  
            </div>
        </div>
        <div id="right" class="col-md-7 col-sm-5">
            <h1 class="vcard fn"><?php echo $row_detail['ten_'.$lang]; ?></h1>
            <div class="chitietsanpham">
                <div class="gia-product"><b><?php if($row_detail['giaban']==0) echo _lienhe; else echo number_format ($row_detail['giaban'],0,",",".").' VNĐ' ?></b></div>
                <?php if($row_detail['giacu']!=0) { ?><div class="gia-goc"><?= number_format ($row_detail['giacu'],0,",",".").' VNĐ' ?></div><?php } ?>
            </div>
           <!--  <div class="chitietsanpham">
                Nhãn hiệu : <?=$row_detail['masp']?>
            </div> -->
            <div class="chitietsanpham">
                Mô tả : <?=$row_detail['mota_'.$lang]?>
            </div>
            <!-- <div class="chitietsanpham">
                Số lương: <input type="text" name="soluong_ct" class="soluong_ct" id="soluong_ct" value="<?=$q?>" >
            </div>
            <div class="chitietsanpham">
                <a class="themgh add_to_cart" rel="<?=$row_detail['id']?>"><img src="thumb.php?src=images/icon-themgh.png&w=200&h=48&zc=1&q=80" alt="icon-themgh" /></a>
                <a class="muangay" onClick="addtocart(<?=$row_detail['id']?>)">Mua ngay</a>
            </div> -->
            <div class="chitietsanpham"><div class="addthis_native_toolbox" ></div></div>
        </div>
    </div>
</div>
<div class="clear"></div>
<div class="row">
    <div class="col-md-12">
        <div class="clear10"></div>
        <div class="tab">
          <button class="tablinks" onclick="openCity(event, 'tab-thongsokythuat') " id="defaultOpen"><?=_thongtinchitiet?></button>
          <button class="tablinks" onclick="openCity(event, 'tab-fanpage')">Bình luận</button>
          
        </div>
        <div id="tab-thongsokythuat" class="tabcontent">
          <div class="noidung"><?=$row_detail['noidung_'.$lang]; ?></div> 
        </div>
        <div id="tab-fanpage" class="tabcontent">
            <div id="fb-root"></div>
             <div class="fb-comments" data-href="https://<?=$config_url?>/<?=$_GET['com']?>/<?=$row_detail['tenkhongdau']?>.htm" data-width="auto" data-numposts="5"></div> 
        </div>
        <div class="clear10"></div>
        <div class="bg-tieudesanpham"><h2><?=_sanphamcungloai?></h2></div>
        <?=get_product($product_khac,'',$com)?>
            <div class="clear"></div>
        </div>    
    </div> 
</div>
<div class="clear"></div>
<form name="form1" action="index.php">
    <input type="hidden" name="productid" />
    <input type="hidden" name="soluong" />
    <input type="hidden" name="command" />
</form>                
<script language="javascript">
    var soluong = '<?=$q?>';
    $(document).ready(function(){
        $('.soluong_ct').keyup(function(){
            soluong = $(this).val();
        })
    });
    function addtocart(pid){
        document.form1.productid.value=pid;
        document.form1.soluong.value=soluong;
        document.form1.command.value='add';
        document.form1.submit();
    }
</script>                    
 <script type="text/javascript">
    function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
document.getElementById("defaultOpen").click();
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.sl-all').owlCarousel({
            autoplay:true,
            margin:0,
            nav:true,
            responsive:{
            0:{
                items:6
            },
            600:{
             items:6
            },
            1000:{
                items:6
            }
        }
        })
    })
</script>   