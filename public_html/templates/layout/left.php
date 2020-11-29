<script type="text/javascript">
    (function($) {
        $(function() { //on DOM ready
            $("#scroller").simplyScroll({
                customClass: 'vert',
                orientation: 'vertical',
                auto: true,
                manualMode: 'loop',
                frameRate: 20,
                speed: 1
            });

        });
    })(jQuery);
</script>
<div id="box_scroll">
    <!-- Hỗ trợ trực tuyến -->
    <div class="left_box">
        <h2>Danh mục dịch vụ</h2>
        <ul class="cateUl ">
            <?php
                $d->reset();
                $result_danhmuc_dichvu="select ten_$lang,tenkhongdau,id ,motain_$lang, photo from #_baiviet_list where hienthi=1 and type='dichvu' and noibat=0 order by stt,id asc ";    
                $d->query($result_danhmuc_dichvu); 
                $result_danhmuc_dichvu=$d->result_array();
                foreach($result_danhmuc_dichvu as $k=>$v){
            ?>
                <li><a href="dich-vu/<?=$v['tenkhongdau']?>.html" title="<?=$v['ten_'.$lang]?>"><?=$v['ten_'.$lang]?></a></li>
            <?php } ?>
            
        </ul>
    </div>
    <div class="left_box">
        <h2>HỖ TRỢ TRỰC TUYẾN</h2>
        <div class="hotl">

            <span class="sodt"><?=$row_setting['hotline']?></span>

        </div>
        <div id="hotro">
            <p class="hotro_o">Hỗ trợ Online</p>
            <?php           
                $d->reset();
                $result_yahoo="select * from #_yahoo where hienthi=1 order by stt,id desc ";   
                $d->query($result_yahoo);    
                $result_yahoo=$d->result_array();
                foreach($result_yahoo as $k=>$v){                                             
            ?>
            <ul>

                <li>
                    <div style="text-align:left; line-height:20px; position:relative;">

                        <div class="nick">
                            <div class="ht_name">
                                <span class="ten_ht">
                                        <a rel="nofollow" href=""><img src="images/yahoo.png" alt="<?=$v['ten']?>"> </a>
                                        <a rel="nofollow" href="skype:<?=$v['skype']?>"><img src="images/skype.png" alt="<?=$v['ten']?>"></a>

                                        </span>
                                <span class="ht_ten"> <font style="color:#3a3288;"><?=$v['ten']?></font></span>
                                <span class="dt_ht"><?=$v['dienthoai']?></span>
                            </div>

                            <p></p>
                            <div class="clr"></div>

                        </div>

                    </div>
                </li>

            </ul>
            <div class="ht_email">Email: <?=$v['email']?></div>
        <?php } ?>
        </div>

    </div>

    <!-- mua bán chó -->
    <div class="left_box">
        <h2>Fanpage Facebook</h2>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
        <div class="fb-like-box" data-href="<?=$row_setting['facebook']?>" data-width="220" data-height="330" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="false">
        </div>
    </div>
    <div class="left_box">
        <h2>Thống kê truy cập</h2>

        <ul id="thongke" style="">

            <li><img src="images/online.png" alt="<?=_dangtruycap?>"><?=_dangtruycap?> : <span><?php $count=count_online();echo $count['dangxem'];?></span></li>
            <li><img src="images/homnay.png" alt="<?=_homnay?>"><?=_homnay?> : <span><?=$week_visitors?></span></li>
            <li><img src="images/thang.png" alt="<?=_thanghientai?>"><?=_thanghientai?> : <span><?=$month_visitors?></span></li>
            <li><img src="images/tong.png" alt="<?=_all?>"><?=_all?> : <span><?=$all_visitors?></span></li>
        </ul>

    </div>
    <!--Danh mục sản phẩm-->
</div>