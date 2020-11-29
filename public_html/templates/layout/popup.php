<?php 
    $d->reset();
    $sql = "select * from #_photo where type='popup' and hienthi=1 ";
    $d->query($sql);
    $pop1 = $d->fetch_array();
    
if(($_REQUEST['com'] == 'index' or $_REQUEST['com'] == '' or !isset($_REQUEST['com']) )&& $_SESSION['popup'] ==0 ){ ?>
    <?php if(count($pop1)>0 and $pop1['hienthi']==1) {
        $_SESSION['popup'] = 1;
    ?>
<div class="popup">
    <div class="img_pop">
        <img src="images/close.png" class="close_button" width="40" height="40">
        <a href="<?=$pop1['link']?>">
        <img class="img-responsive" src="thumb.php?src=<?=_upload_hinhanh_l.$pop1['thumb_vi']?>&w=900&h=500&zc=2&q=80">
        </a>
    </div>
</div>
    <?php } } ?> 
<script type="text/javascript">
    $(document).ready(function(){
        $('.popup').click(function() {
            $('.popup').css('display','none');
        });
        $('.close_button').click(function() {
            $('.popup').css('display','none');
        });
    });
</script>
<style type="text/css">
    .popup {
        position: fixed;
        background: rgba(0,0,0,0.7);
        width: 100%;
        height: 100%;
        z-index: 999999;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .img_pop {
        position: relative;
    }
    img.close_button {
        position: absolute;
        right: 0px;
        top: 0px;
        cursor: pointer;
    }
</style>