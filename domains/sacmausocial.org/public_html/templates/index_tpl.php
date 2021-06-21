<div class="container-fluid bgWhite pd50">
	<div class="wrap-news">
		<div class="container">
			<h3 class="h3fix">TIN TỨC NỔI BẬT</h3>
			<?php
				$d->reset();
				$sql = "select noidung_$lang from #_company where type='tintuc' ";
				$d->query($sql);
				$baiviet_tintuc = $d->fetch_array();

				$d->reset();
				$danhmuc_news="select ten_$lang,tenkhongdau,id ,mota_$lang, photo from #_baiviet_list where hienthi=1 and type='tintuc' and noibat=1 order by stt,id desc";    
				$d->query($danhmuc_news); 
				$danhmuc_news=$d->result_array();

			?>
			<div class="descriptionfix">
				<?=$baiviet_tintuc['noidung_'.$lang]?>
			</div>

			<div class="row row-fix">				
				<div class="col-sm-6 col-md-6 colLeft">
					<?php
						$d->reset();
						$tintuc_danhmuc="select ten_$lang,tenkhongdau,id ,mota_$lang, photo from #_baiviet where hienthi=1 and type='tintuc' and noibat=1 order by stt,id desc";    
						$d->query($tintuc_danhmuc); 
						$tintuc_danhmuc=$d->result_array();
						
					?>
					<div class="items-news">
						<div class="text-center">
							<a class="img" href="tin-tuc/<?=$tintuc_danhmuc[0]['tenkhongdau']?>-<?=$tintuc_danhmuc[0]['id']?>.html" title="<?=$tintuc_danhmuc[0]['ten_vi']?>"> <span class="over"></span> <img src="thumb/620x400/1/<?=_upload_baiviet_l.$tintuc_danhmuc[0]['photo']?>" alt="<?=$tintuc_danhmuc[0]['ten_vi']?>" title="<?=$tintuc_danhmuc[0]['ten_vi']?>"/> </a>
						</div>
						<div class="">
							<a class="title" href="tin-tuc/<?=$tintuc_danhmuc[0]['tenkhongdau']?>-<?=$tintuc_danhmuc[0]['id']?>.html" title="<?=$tintuc_danhmuc[0]['ten_vi']?>">
								<h4><?=$tintuc_danhmuc[0]['ten_vi']?></h4> </a>
								<div class="description"><?=catchuoi($tintuc_danhmuc[0]['mota_vi'],200);?></div> <a class="treadmore" href="tin-tuc/<?=$tintuc_danhmuc[0]['tenkhongdau']?>-<?=$tintuc_danhmuc[0]['id']?>.html">Đọc thêm</a> 
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 colRight mb0">
					<div class="newsList">
						<?php
						
						foreach($tintuc_danhmuc as $k=>$v){ if($k>0){
						?>
						<div class="items">
							<div class="col-sm-3 col-xs-4 text-center">
								<div class="row">
									<a class="img" href="tin-tuc/<?=$v['tenkhongdau']?>-<?=$v['id']?>.html" title="<?=$v['ten_vi']?>"> <span class="over"></span> <img src="thumb/200x110/1/<?=_upload_baiviet_l.$v['photo']?>" alt="<?=$v['ten_vi']?>" title="<?=$v['ten_vi']?>"/> </a>
								</div>
							</div>
							<div class="col-sm-9 col-xs-8">
								<a class="title" href="tin-tuc/<?=$v['tenkhongdau']?>-<?=$v['id']?>.html" title="<?=$v['ten_vi']?>">
									<h4><?=$v['ten_vi']?></h4> </a>
									<div class="description"><?=catchuoi($v['mota_vi'],180);?></div> <a class="treadmore" href="tin-tuc/<?=$v['tenkhongdau']?>-<?=$v['id']?>.html">Đọc thêm</a> 
							</div>
							<div class="clearfix"></div>
						</div>
						<?php }	} ?>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid boxgioithieu">
	<div class="container">
		<div class="videoHome">
			<h3 class="h3fix">VIDEO</h3>
			<div class="row">
				<?php 
				$d->query("select * from #_video where hienthi = 1 and type='video' order by stt desc");
				$rs_video  =$d->result_array();

				echo '<div class="cont-left"><div class="video-wrapper"><iframe id="iframe"  src="https://www.youtube.com/embed/'.getYoutubeIdFromUrl($rs_video[0]['links']).'" frameborder="0" allowfullscreen></iframe></div></div>';
				//echo '<div class="cont-left"><div class="video-wrapper"> <a class="fancybox-media" href="https://www.youtube.com/watch?v='.getYoutubeIdFromUrl($rs_video[0]['links']).'" rel="https://img.youtube.com/vi/'.getYoutubeIdFromUrl($rs_video[0]['link']).'/0.jpg"><img src="https://img.youtube.com/vi/'.getYoutubeIdFromUrl($rs_video[0]['links']).'/0.jpg"/></a></div></div>';
				?>
				<div class="cont-right">
					<div class="linklk">
						<ul>
							<?php
								$d->reset();
								$row_linklk = "select photo,ten,url from #_lkweb where type='linkvideo' order by id desc limit 4";
								$d->query($row_linklk);
								$row_linklk = $d->result_array();
								foreach($rs_video as $k=>$v){
							?>
								<li class="<?php if($k==0) echo 'active'; ?>" data-id="https://www.youtube.com/embed/<?=getYoutubeIdFromUrl($v['links'])?>">
									<a  href="javascript:void(0)">
										<img src="https://img.youtube.com/vi/<?=getYoutubeIdFromUrl($v['links'])?>/default.jpg"/>
										<h3><?=$v['ten_vi']?></h3>
									</a>
								</li>
							<?php } ?>
						</ul>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>

