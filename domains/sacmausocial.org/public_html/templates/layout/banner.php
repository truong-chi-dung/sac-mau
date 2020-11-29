<?php
	$d->reset();
	$row_logo = "select photo_vi,ten_vi from #_photo where type='logo' order by id desc";
	$d->query($row_logo);
	$row_logo = $d->result_array();
	$d->reset();
	$row_banner = "select photo_vi,ten_vi from #_photo where type='banner' order by id desc";
	$d->query($row_banner);
	$row_banner = $d->result_array();	
?>
 <header id="header">
    <div class="top-header"> 
        <div class="container-fix">
            <span class="fz16"><i class="fa fa-phone mr10"> </i><span class="">
                <strong><u>Phone</u>:</strong> 
                <strong><?=$row_setting['hotline']?> - <?=$row_setting['dienthoai']?></strong> 
            </span>
            <span class="hidden-xs">- </span><span class="img-mail hidden-xs"></span>
            <span class="hidden-xs"><strong>
                <u>Email</u>: <?=$row_setting['email']?></strong>
            </span> ​
            </span>
             <?php include _template."layout/mangxahoi_top.php"; ?>
        </div>
    </div>
    <?php include _template."layout/menu_top.php"; ?>
    <div class="boxSerch">
        <a href="javascript:;" onclick="return ToggleSearch();" class="sSearch"> <i class="glyphicon glyphicon-search"></i> </a>
        <div class="search">
            <form action="tim-kiem.html" method="get" id="frmSearch">
                <input autocomplete="off" id="txtSearch" name="keyword" placeholder="Từ khóa..." type="text" value="" />
                <button type="submit"> <i class="glyphicon glyphicon-play"></i> </button>
            </form>
            <div class="clearfix"></div>
        </div>
    </div>
</header>