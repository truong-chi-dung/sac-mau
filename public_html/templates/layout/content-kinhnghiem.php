<?php 
	$d->reset();
	$d->query("select tenkhongdau,photo from #_baiviet where type='kinhnghiem' and hienthi=1 and noibat=1 order by stt asc");
	$kinhnghiem = $d->result_array();

    $d->reset();
    $sql_khachhang = "select photo_vi,link,ten_vi from #_photo where type='khachhang' order by stt,id desc";
    $d->query($sql_khachhang);
    $result_khachhang=$d->result_array();
?>
<div class="bg-tieudesanpham">
    <h2>Hình ảnh <font>hoạt động</font></h2>
</div>
<div id="slider_motto" class="row">
    <?php foreach($result_khachhang as $k=>$v){ ?>
        <div class="col-xs-12">
            <a data-fancybox="images" href="<?=_upload_hinhanh_l.$v['photo_vi']?>">
                <img class="lazy" src="thumb/278x250/1/<?=_upload_hinhanh_l.$v['photo_vi']?>" alt="<?=$v["ten_vi"]?>"/>
            </a>
        </div>
    <?php } ?>
</div>
<div class="bg-tieudesanpham">
	<h2>Kinh nghiệm <font>sữa chữa</font></h2>
</div>

<div class="ketqua ketquakn"></div>
<ul class="pagination paginationkn"></ul>                    
<div class="clear"></div>
<script type="text/javascript">
    $(function () {
        window.pagObj = $('.paginationkn').twbsPagination({
            totalPages: "<?= ceil(count($kinhnghiem)/6)?>",
            visiblePages: 6,
            onPageClick: function (event, page) {
                 $.ajax({
                    type:'POST',
                    url:"ajax/load_kinhnghiem.php",
                    data:{page:page},
                    success:function(re){
                        if(re !='') { 
                            $('.ketquakn').html(re);   
                        }
                    }
                });
            }
        });
    });
</script> 