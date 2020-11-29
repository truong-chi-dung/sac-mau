
<script type="text/javascript">		
	$(document).ready(function() {
		$('.chonngonngu li a').click(function(event) {
			var lang = $(this).attr('href');
			$('.chonngonngu li a').removeClass('active');
			$(this).addClass('active');
			$('.lang_hidden').removeClass('active');
			$('.lang_'+lang).addClass('active');
			return false;
		});
	});

</script>
<?php
	function get_main_list()
  {
  	global $item;
    $sql="select * from table_product_list where type='product' order by stt asc";
    $stmt=mysql_query($sql);
    $str='
      <select id="id_list" name="id_list" data-level="0" data-type="product" data-table="table_product_cat" data-child="id_cat" class="main_select select_danhmuc">
      <option value="">Chọn danh mục 1</option>';
    while ($row=@mysql_fetch_array($stmt)) 
    {
      if($row["id"]==(int)@$item["id_list"])
        $selected="selected";
      else 
        $selected="";
      $str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';      
    }
    $str.='</select>';
    return $str;
  } 
  function get_main_list2()
  {
  	global $item;
    $sql="select * from table_thuoctinh where type='timkiem' order by stt asc";
    $stmt=mysql_query($sql);
    $str='
      <select id="id_list" name="id_list" data-level="0" data-type="product" data-table="table_product_cat" data-child="id_cat" class="main_select select_danhmuc">
      <option value="">Danh mục tìm kiếm</option>';
    while ($row=@mysql_fetch_array($stmt)) 
    {
      if($row["id"]==(int)@$item["id_list"] || $row["id"]==$_GET["id_list"])
        $selected="selected";
      else 
        $selected="";
      $str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';      
    }
    $str.='</select>';
    return $str;
  } 
?>
<div class="wrapper">

<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="index.php?com=thuoctinh&act=add<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Thêm <?=$title_main?></span></a></li>
            <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>

<form name="supplier" id="validate" autocomplete="off" class="form" action="index.php?com=thuoctinh&act=save<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" method="post" enctype="multipart/form-data">
	<div class="widget">

		<div class="title chonngonngu">
		<ul>
			<li><a href="vi" class="active tipS validate[required]" title="Chọn tiếng việt "><img src="./images/vi.png" alt="" class="tiengviet" />Tiếng Việt</a></li>
			<?php if($_GET['type']!="makm" && $_GET['type']!="doidiem" && $_GET['type']!="chucai") { ?><li><a href="en" class="tipS validate[required]" title="Chọn tiếng anh "><img src="./images/en.png" alt="" class="tienganh" />Tiếng Anh</a></li><?php } ?>
		</ul>
		</div>	
		<?php if($config_list=='true'){ ?>
		<div class="formRow">
			<label>Chọn danh mục</label>
			<div class="formRight">
			<?=get_main_list()?>
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
		<?php if($config_list2=='true'){ ?>
		<div class="formRow">
			<label>Chọn danh mục</label>
			<div class="formRight">
			<?=get_main_list2()?>
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
        <?php if($_GET['type']=="soluong") { ?>
		<div class="formRow lang_hidden lang_vi active">
			<label>Tên sản phẩm</label>
			<div class="formRight">
                 <select data-placeholder="Chọn sản phẩm" class="chosen-select" name="id_product" style="width:30%">
					<option value=""></option>
					<?php 
						$d->reset();
					    $sql = "select id,ten_vi from #_product where hienthi=1 and type='product' order by id desc";
					    $d->query($sql);
					    $row_product = $d->result_array();
						for($i=0;$i<count($row_product);$i++) {
						if($row_product[$i]['id']==@$item['id_product'])
						{
							$selected='selected';

						}else{
							$selected='';
						}
					?>
					<option value="<?=$row_product[$i]['id']?>" <?=$selected?>><?=$row_product[$i]['ten_vi']?></option>
					<?php } ?>
				</select>
			</div>
			<div class="clear"></div>
		</div>
		<?php }elseif($_GET['type']=="makm") { ?>
		<div class="formRow lang_hidden lang_vi active">
			<label>Mã khuyến mãi</label>
			<div class="formRight">
                <input type="text" name="ten_vi" title="Nhập tên danh mục" id="ten_vi" class="tipS validate[required]" readonly <?php if($_GET['id']) { ?> value="<?=@$item['ten_vi']?>" <?php }else{ ?>value="<?=strtoupper (ChuoiNgauNhien(9));?>"<?php } ?> />
			</div>
			<div class="clear"></div>
		</div>
		<?php }elseif($_GET['type']=="doidiem"){ ?>
		<div class="formRow lang_hidden lang_vi active">
			<label>Điểm tích lũy</label>
			<div class="formRight">
                <input type="text" name="ten_vi" title="Nhập tên danh mục" id="ten_vi" class="tipS validate[required]" value="<?=@$item['ten_vi']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<?php }else{ ?>
		<div class="formRow lang_hidden lang_vi active">
			<label>Tiêu đề</label>
			<div class="formRight">
                <input type="text" name="ten_vi" title="Nhập tên danh mục" id="ten_vi" class="tipS validate[required]" value="<?=@$item['ten_vi']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
		<div class="formRow lang_hidden lang_en">
			<label>Tiêu đề (Tiếng anh)</label>
			<div class="formRight">
                <input type="text" name="ten_en" title="Nhập tên danh mục" id="ten_en" class="tipS validate[required]" value="<?=@$item['ten_en']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<?php if($_GET['type']=="makm" || $_GET['type']=="doidiem") { ?>
		<div class="formRow">
			
			<label class="price">Giá giảm</label>
			
			<div class="formRight">
                <input type="text" name="giagiam" title="Nhập giá giảm" id="giagiam" class="conso tipS " value="<?=@$item['giagiam']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
		<?php if($config_images=='true'){ ?>
        <div class="formRow">
			<label>Tải hình ảnh:</label>
			<div class="formRight">
            	<input type="file" id="file" name="file" />
				<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
				<div class="note"> width : <?php echo _width_thumb*$ratio_;?> px , Height : <?php echo _height_thumb*$ratio_;?> px </div>
			</div>
			<div class="clear"></div>
		</div>
        <?php if($_GET['act']=='edit'){?>
		<div class="formRow">
			<label>Hình Hiện Tại :</label>
			<div class="formRight">
			
			<div class="mt10"><img src="<?=_upload_hinhanh.$item['photo']?>"  alt="NO PHOTO" width="100" /></div>

			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
   		<?php } ?>
   		 <?php if($_GET['type']=='mausac'){?>
		<div class="formRow">
			<label>Màu nền:</label>
			<div class="formRight">
				<input type="text" class="color" name="mau" title="Nhập màu nền" class="tipS" value="<?=@$item['mau']?>" size="15" />
			</div>

			<div class="clear"></div>
		</div>
		<?php } ?>
		<?php if($_GET['type']=='soluong'){?>
		<div class="formRow">
			<label>Số lượng nhập:</label>
			<div class="formRight">
				<input type="text" name="soluongnhap" title="Nhập số lượng" class="tipS" value="<?=@$item['soluongnhap']?>" size="15" />
			</div>

			<div class="clear"></div>
		</div>
		<?php } ?>
		<?php if($links_=='true'){?>
        <div class="formRow">
            <label>Link liên kết:</label>
            <div class="formRight">
                <input type="text" id="code_pro" name="link" value=""  title="Nhập link liên kết cho hình ảnh"  value="<?=@$item['link']?>" class="tipS" />
            </div>
            <div class="clear"></div>
        </div>
        <?php }  ?>
        <div class="formRow">
          <label>Hiển thị : <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Bỏ chọn để không hiển thị danh mục này ! "> </label>
          <div class="formRight">
         
            <input type="checkbox" name="hienthi" id="check1" value="1" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> />
             <label>Số thứ tự: </label>
              <input type="text" class="tipS" value="<?=isset($item['stt'])?$item['stt']:1?>" name="stt" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" original-title="Số thứ tự của danh mục, chỉ nhập số">
          </div>
          <div class="clear"></div>
        </div>
		
	</div>  
	<div class="widget">

		
		<div class="formRow">
			<div class="formRight">
                <input type="hidden" name="type" id="id_this_type" value="<?=$_REQUEST['type']?>" />
                <input type="hidden" name="id" id="id_this_post" value="<?=@$item['id']?>" />
            	<input type="submit" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
            	<a href="index.php?com=thuoctinh&act=man<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" onClick="if(!confirm('Bạn có muốn thoát không ? ')) return false;" title="" class="button tipS" original-title="Thoát">Thoát</a>
			</div>
			<div class="clear"></div>
		</div>

	</div>
</form>        </div>
<script type="text/javascript">
	var config = {
	  '.chosen-select'           : {},
	  '.chosen-select-deselect'  : {allow_single_deselect:true},
	  '.chosen-select-no-single' : {disable_search_threshold:10},
	  '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
	  '.chosen-select-width'     : {width:"95%"}
	}
	for (var selector in config) {
	  $(selector).chosen(config[selector]);
	}
</script>