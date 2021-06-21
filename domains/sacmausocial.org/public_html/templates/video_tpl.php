<link rel="stylesheet" href="fancy/jquery.fancybox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="fancy/jquery.fancybox-buttons.css" type="text/css" media="screen" />
<link rel="stylesheet" href="fancy/jquery.fancybox-thumbs.css" type="text/css" media="screen" />

<div class="container-fix" style="padding: 30px 0;">
    <div class="row">
    <?php
    if($_GET['idl']!=''){
        for($i=0,$count=count($tintuc);$i<$count;$i++)
        {					
            ?>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="bg-video">
                  <a title="<?=$tintuc[$i]['ten_'.$lang]?>" class="various fancybox.iframe" href="https://www.youtube.com/embed/<?=getYoutubeIdFromUrl($tintuc[$i]['links']);?>?autoplay=1">
                    <img src="https://img.youtube.com/vi/<?=getYoutubeIdFromUrl($tintuc[$i]['links'])?>/hqdefault.jpg"/>
                  </a>
                </div>  
                <div class="ten-tintuc"><a><?php echo $tintuc[$i]["ten_".$lang] ?></a></div>                        
            </div>
        <?php } } else{
       for($i=0,$count=count($tintuc);$i<$count;$i++)
        {                   
            ?>
            <div class="col-xs-12 col-sm-6 col-md-4 item-video">
                <div class="bg-video"><a title="<?=$tintuc[$i]['ten_'.$lang]?>" href="thu-vien-video/<?=$tintuc[$i]['tenkhongdau']?>.html"><img src="<?=_upload_baiviet_l.$tintuc[$i]['photo']?>" class="img-responsive" /></a></div>  
                <div class="ten-video"><a><?php echo $tintuc[$i]["ten_".$lang] ?></a></div>                        
            </div>
        <?php }  } ?>  
        <div class="clear" style="height:10px"></div> 
        <div class="phantrang" style="text-align:center" ><?=$paging['paging']?></div> 

    </div>     
</div>
    <div class="clearfix"></div>
