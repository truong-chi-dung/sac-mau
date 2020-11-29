<?php

    session_start();
     
    @define ( '_source' , './sources/');
    @define ( '_lib' , './libraries/');
    @define ( '_template' , './templates/');
    include_once _lib."Mobile_Detect.php";
    $detect = new Mobile_Detect;
    $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
    @define ( _upload_folder , './upload/');
    if(empty($_SESSION['lang']))
    {
        $_SESSION['lang']='vi';
    }
    $lang=$_SESSION['lang'];
    
    include_once _lib."config.php";
   // include_once _lib."checkSSL.php";
    include_once _lib."constant.php";
    include_once _lib."functions.php";
    include_once _lib."functions_share.php";
    include_once _lib."class.database.php";
    include_once _source."lang_$lang.php";  
    include_once _lib."functions_giohang.php";
    include_once _lib."file_requick.php";
    include_once _lib."counter.php"; 
    include_once _source."template.php";
    
    if($_REQUEST['command']=='add' && $_REQUEST['productid']>0){
    $pid=$_REQUEST['productid'];
    $soluong=$_REQUEST['soluong'];
    addtocart($pid,$soluong);
    redirect("gio-hang.html");}
    
    if($_GET['lang']!=''){
        $_SESSION['lang']=$_GET['lang'];
        header("location:".$_SESSION['links']);
    } else {
        $_SESSION['links']=getCurrentPageURL();
    }
    echo $_GET['lang'];
?>
<!DOCTYPE html PUBLIC>
<html lang="vi" itemscope itemtype="//schema.org/WebPage">
<head>
<meta charset="UTF-8">
<base href="//<?=$config_url?>/">
<link id="favicon" rel="shortcut icon" href="<?=_upload_hinhanh_l.$favicon['thumb_'.$lang]?>" type="image/x-icon" />
<link rel="canonical" href="<?=getCurrentPageURL();?>" />
<title><?php if($title_bar!='') echo $title_bar; else echo $row_setting['title']; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=1" />

<?php include _template."layout/l-seo.php"; ?>
<script type="text/javascript" src="content/view/js/min.jquery.js"></script>
<style type="text/css"><?php echo file_get_contents('http://'.$config_url.'/css_optimize.php');?></style>
<?=$share_facebook?>
<!--  <script src="fancy/jquery.min.js"></script> -->
 <script src="content/view/js/modernizr-2.6.2.js"></script>
<?php //include _template."layout/l-css.php"; ?>

</head>
<body class="home">

    <div class="container-fluid">
       <?php include _template."layout/banner.php"; ?>
        <div class="bannerPrallax">
            <div class="container"> </div>
        </div>
        <div id="wrapper">
            <?php if($_GET['com']=='index' || $_GET['com']=="") { ?>
                <div id="boxLogoSlider">
                    <?php include _template."layout/slideranh.php"; ?>                
                </div>
            <?php } if($_GET['com']!='index' && $_GET['com']!="") {?>
            <?php include _template."layout/breadcrumb.php"; }?>
            <?php include _template.$template."_tpl.php"; ?>
            <?php $d->reset();
                $row_donggop = "select photo_vi,ten_vi from #_photo where type='donggop' order by id desc";
                $d->query($row_donggop);
                $row_donggop = $d->result_array(); 

                 $row_donggopdt = "select photo_vi,ten_vi from #_photo where type='donggopdk' order by id desc";
                $d->query($row_donggopdt);
                $row_donggopdt = $d->result_array();   
            ?>
            <div class="bgWhite boxdonate">
                <div class="">
                    <section class="boxBannerAds">
                        <div class="row">
                            <div class="">
                                <a href="#wrap-ncc" class="various hidden-xs"><img alt="donate" src="<?=_upload_hinhanh_l.$row_donggopdt[0]['photo_vi']?>" /></a>
                                <a href="#wrap-ncc" class="various visible-xs"><img alt="donate" src="<?=_upload_hinhanh_l.$row_donggop[0]['photo_vi']?>" /></a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="container-fluid boxdonate_tomtat">
                <div class="container">
                    <section class="boxBannerAds">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="circle"></div>
                                <h3 class="txt-center title-tks">TRÂN TRỌNG CẢM ƠN CÔ, CHÚ / ANH, CHỊ ĐÃ ĐỒNG HÀNH CÙNG SỨ MỆNH CỦA SẮC MÀU</h3>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

        </div>
        
    <?php include _template."layout/doitac.php"; ?>  
    <?php include _template."layout/footer.php"; ?>  
    <?php include _template."layout/form.php"; ?>  
    </div>
    <a class="to-top"></a>
    
<?=$row_setting['scriptcode']?>
<?php include _template."layout/l-js.php"; ?>  
 <script type="text/javascript" src="fancy/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="fancy/jquery.fancybox-buttons.js"></script>
<script type="text/javascript" src="fancy/jquery.fancybox-media.js"></script>
<script type="text/javascript" src="fancy/jquery.fancybox-thumbs.js"></script>                   
<script type="text/javascript">
$(document).ready(function() {
    $(".various").fancybox({
        maxWidth    : 800,
        maxHeight   : 600,
        fitToView   : false,
        width       : '100%',
        height      : '80%',
        autoSize    : false,
        closeClick  : false,
        openEffect  : 'none',
        closeEffect : 'none'
    });
});
</script> 
    
<?=$row_setting['scriptcode_body']?>     
</body>
</html>
