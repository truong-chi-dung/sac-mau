<?php
  function getCom($com){
    switch ($com)
    {
        case 'gioi-thieu' :
            echo 'Giới thiệu';
            break;
        case 'hoat-dong':
            echo 'Hoạt động';
            break;
        case 'tin-tuc':
            echo 'Tin tức';
            break;
        case 'thu-vien':
            echo 'Thư viện';
            break;
        case 'lien-he' :
            echo 'Liên hệ';
            break;
        case 'video' :
            echo 'Video';
            break;
        case 'thu-vien-hinh-anh' :
            echo 'Thư viện ảnh';
            break;
        case 'thu-vien-video' :
            echo 'Thư viện video';
            break;
        case 'se-chia' :
            echo 'Sẻ chia';
            break;
        default:
            echo 'Không tìm thấy';
            break;
    }
  }
?>
<div>
    <div class="container-fluid nguyen-breadcumb">
        <div class="container-fix">
            <div class="row">
                <ol class="breadcrumb">
                    <li>
                        <div itemscope="" itemtype="index.html">
                            <a href="index.html" itemprop="url"> <span itemprop="title">  Trang chủ </span> </a>
                        </div>
                    </li>
                    <li>
                        <div itemscope="" itemtype="<?=$com?>.html">
                            <a href="<?=$com?>.html" itemprop="url"> <span itemprop="title"><?=getCom($_GET['com']);?></span> </a>
                        </div>
                    </li>
                    <li>
                        <div itemscope="" itemtype="<?=$com?>/tam-nhin-su-menh.html">
                            <a href="<?=$com?>/tam-nhin-su-menh.html" itemprop="url"> <span itemprop="title"><?=$row_detail['ten_vi']?></span> </a>
                        </div>
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>