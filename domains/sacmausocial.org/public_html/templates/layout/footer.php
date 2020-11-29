<?php 
    $d->reset();
    $chinhsach = "select photo,ten_vi,tenkhongdau from #_baiviet where hienthi=1 and type='chinhsach' order by stt,id desc ";
    $d->query($chinhsach);
    $chinhsach = $d->result_array();
    $d->reset();
    $hotronhanh = "select photo,ten_vi,tenkhongdau from #_baiviet where hienthi=1 and type='hotronhanh' order by stt,id desc ";
    $d->query($hotronhanh);
    $hotronhanh = $d->result_array();
?>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-7">
                <h3 class="title">  Địa chỉ liên hệ </h3>
                <div class="entry">
                    <?php echo $footer['noidung']; ?>

                </div>
            </div>
            <div class="col-md-4 col-sm-5">
                <h3 class="title"> FanPage </h3>
                <div class="entry">
                    <div id="fb-root"></div>
        <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
                    <div class="fb-page" data-href="<?=$row_setting['facebook']?>" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <div class="fb-xfbml-parse-ignore">
                            <blockquote cite="<?=$row_setting['facebook']?>"><a href="<?=$row_setting['facebook']?>">SẮC MÀU YÊU THƯƠNG</a></blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 text-left"> © 2020 SẮC MÀU YÊU THƯƠNG. All Rights Reserved. </div>
                <div class="col-sm-3 text-right">
                    <div class="boxStatis"> <span>  Đang online: <strong class="online"><?php $count=count_online();echo $count['dangxem'];?></strong> </span> <span>  Lượt truy cập: <strong class="visitor"><?=$all_visitors?></strong> </span> </div>
                </div>
            </div>
        </div>
    </div>
    </footer>
<script>
    $().ready(function(){
         $(".linklk ul li").on("click", function(){
            $id = $(this).data("id");
            $(".video-wrapper iframe").attr("src",$id);
            var $itemBtnCur = $(this);
            var $itemBtns = $(".linklk ul li");
            var active = "active";

            $itemBtns.not($itemBtnCur).removeClass(active);
            if (!$itemBtnCur.hasClass(active) ) {
                $itemBtnCur.addClass(active);
            }
         });
    })
</script>