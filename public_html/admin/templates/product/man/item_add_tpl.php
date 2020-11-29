
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

		$('.update_stt').keyup(function(event) {
			var id = $(this).attr('rel');
			var table = 'product_photo';
			var value = $(this).val();
			$.ajax ({
				type: "POST",
				url: "ajax/update_stt.php",
				data: {id:id,table:table,value:value},
				success: function(result) {
				}
			});
		});

		$('.delete_images').click(function(){
	      if (confirm('Bạn có muốn xóa hình này ko ? ')) {
	        var id = $(this).attr('title');
			var table = 'product_photo';
			var links = "../upload/product/";
	        $.ajax ({
	          type: "POST",
	          url: "ajax/delete_images.php",
	          data: {id:id,table:table,links:links},
	          success: function(result) { 
	          }
	        });
	        $(this).parent().slideUp();
	      }
	      return false;
	    });

	    $('.themmoi').click(function(e) {
			$.ajax ({
				type: "POST",
				url: "ajax/khuyenmai.php",
				success: function(result) { 
					$('.load_sp').append(result);
				}
			});
        });

		$('.delete').click(function(e) {
			$(this).parent().remove();
		});
		

	});

	$(function(){
		 $("#states").select2();
        ///
        $("#states").change(function(){
        	$tags = $(this).val();
        	
        	if($tags>0){
        	$("#tags_name").append("<p class='delete_tags'>"+$("#states option:selected").text()+"<input name='tags[]' value='"+$tags+"'  type='hidden' /> <span></span> </p>");
        	}

	       	$(".delete_tags span").click(function(){
	        	$(this).parent().remove();
	        });
        });
        //
        $(".delete_tags span").click(function(){
        	$(this).parent().remove();
        });
	});
	
</script>

<?php

 function get_main_list()
  {
  	global $item;
    $sql="select * from table_product_list where type='".$_GET['type']."' order by stt asc";
    $stmt=mysql_query($sql);
    $str='
      <select id="id_list" name="id_list" data-level="0" data-type="'.$_GET['type'].'" data-table="table_product_cat" data-child="id_cat" class="main_select select_danhmuc">
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

  function get_main_cat()
  {
  	global $item;
    $sql="select * from table_product_cat where id_list='".$item['id_list']."' and type='".$_GET['type']."' order by stt asc";
    $stmt=mysql_query($sql);
    $str='
      <select id="id_cat" name="id_cat" data-level="1" data-type="'.$_GET['type'].'" data-table="table_product_item" data-child="id_item" class="main_select select_danhmuc">
      <option value="">Chọn danh mục 2</option>';
    while ($row=@mysql_fetch_array($stmt)) 
    {
      if($row["id"]==(int)@$item["id_cat"])
        $selected="selected";
      else 
        $selected="";
      $str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';      
    }
    $str.='</select>';
    return $str;
  }

  function get_main_item()
  {
  	global $item;
    $sql="select * from table_product_item where id_cat='".$item['id_cat']."' and type='".$_GET['type']."' order by stt asc";
    $stmt=mysql_query($sql);
    $str='
      <select id="id_item" name="id_item" data-level="2" data-type="'.$_GET['type'].'" data-table="table_product_sub" data-child="id_sub" class="main_select select_danhmuc">
      <option value="">Chọn danh mục 3</option>';
    while ($row=@mysql_fetch_array($stmt)) 
    {
      if($row["id"]==(int)@$item["id_item"])
        $selected="selected";
      else 
        $selected="";
      $str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';      
    }
    $str.='</select>';
    return $str;
  }
function get_main_sub()
  {
  	global $item;
    $sql="select * from table_product_sub where id_item='".$item['id_item']."' and type='".$_GET['type']."' order by stt asc";
    $stmt=mysql_query($sql);
    $str='
      <select id="id_sub" name="id_sub" class="main_select">
      <option value="">Chọn danh mục 3</option>';
    while ($row=@mysql_fetch_array($stmt)) 
    {
      if($row["id"]==(int)@$item["id_sub"])
        $selected="selected";
      else 
        $selected="";
      $str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';      
    }
    $str.='</select>';
    return $str;
  }
function get_dotuoi()
  {
  	global $item;
    $sql="select * from table_thuoctinh where type='dotuoi' order by stt,id desc";
    $stmt=mysql_query($sql);
    $str='
      <select id="id_dotuoi" name="id_dotuoi" class="main_select">
      <option value="">Chọn độ tuổi</option>';
    while ($row=@mysql_fetch_array($stmt)) 
    {
      if($row["id"]==(int)@$item["id_dotuoi"])
        $selected="selected";
      else 
        $selected="";
      $str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';      
    }
    $str.='</select>';
    return $str;
  }
  function get_gioitinh()
  {
  	global $item;
    $sql="select * from table_thuoctinh where type='gioitinh' order by stt,id desc";
    $stmt=mysql_query($sql);
    $str='
      <select id="id_gioitinh" name="id_gioitinh" class="main_select">
      <option value="">Chọn giới tính</option>';
    while ($row=@mysql_fetch_array($stmt)) 
    {
      if($row["id"]==(int)@$item["id_gioitinh"])
        $selected="selected";
      else 
        $selected="";
      $str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';      
    }
    $str.='</select>';
    return $str;
  }
  //------------ tags-------------------------
  if($item['tags']!=''){
		$tags = explode(",", $item['tags']) ;
		$sql = "select id,ten_vi from #_tags where id<>".$tags[0];
		for ($i=1,$count = count($tags); $i < $count ; $i++) { 
			$sql .=" and id<> ".$tags[$i];
		}
	}else{
		$sql = "select id,ten_vi from #_tags";
	}
		$d->query($sql);
	    $tags_arr = $d->result_array();

  //------------end tags---------------


?>


<div class="wrapper">

<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="index.php?com=product&act=add<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Thêm <?=$title_main?></span></a></li>
            <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>

<form name="supplier" id="validate" class="form" action="index.php?com=product&act=save<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" method="post" enctype="multipart/form-data">
	<div class="widget">

		<div class="title chonngonngu">
		<ul>
			<li><a href="vi" class="active tipS validate[required]" title="Chọn tiếng việt "><img src="./images/icon-vi.png" alt="" class="tiengviet" />Tiếng Việt</a></li>
			<li><a href="en" class="tipS validate[required]" title="Chọn tiếng anh "><img src="./images/icon-en.png" alt="" class="tienganh" />Tiếng Anh</a></li>
			<!-- <li><a href="cn" class="tipS validate[required]" title="Chọn tiếng trung "><img src="./images/icon-cn.png" alt="" class="tiengtrung" />Tiếng Trung</a></li> -->
		</ul>
		</div>	
		
		<?php if($config_list=='true'){ ?>
		<div class="formRow">
			<label>Chọn danh mục 1</label>
			<div class="formRight">
			<?=get_main_list()?>
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
		<?php if($config_cat=='true'){ ?>
		<div class="formRow">
			<label>Chọn danh mục 2</label>
			<div class="formRight">
			<?=get_main_cat()?>
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
		<?php if($config_item=='true'){ ?>
        <div class="formRow">
			<label>Chọn danh mục 3</label>
			<div class="formRight">
			<?=get_main_item()?>
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
		<?php if($config_sub=='true'){ ?>
		<div class="formRow">
			<label>Chọn danh mục 4</label>
			<div class="formRight">
			<?=get_main_sub()?>
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>

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
			
			<div class="mt10"><img src="<?=_upload_product.$item['thumb']?>"  alt="NO PHOTO" width="250" /></div>

			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
        
         <div class="formRow">
      <label>Hình ảnh kèm theo: </label>
      <div class="formRight">
          <a class="file_input" data-jfiler-name="files" data-jfiler-extensions="jpg, jpeg, png, gif"><img src="images/image_add.png" alt="" width="100"></a>                
         
     
    <?php if($act=='edit'){?>
      <?php if(count($ds_photo)!=0){?>       
            <?php for($i=0;$i<count($ds_photo);$i++){?>
              <div class="item_trich">
                  <img class="img_trich" width="140px" height="110px" src="<?=_upload_product.$ds_photo[$i]['photo']?>" />
                  <input type="text" rel="<?=$ds_photo[$i]['id']?>" value="<?=$ds_photo[$i]['stt']?>" class="update_stt tipS" />
                  <a class="delete_images" title="<?=$ds_photo[$i]['id']?>"><img src="images/delete.png"></a>
              </div>
            <?php } ?>
        
      <?php }?>

    <?php }?>
      </div>
          <div class="clear"></div>
        </div>
        
		<!-- <div class="formRow">
			<label>Mã SP</label>
			<div class="formRight">
                <input type="text" name="masp" title="Nhập mã sản phẩm" id="masp" class="tipS" value="<?=@$item['masp']?>" />
			</div>
			<div class="clear"></div>
		</div> -->
		
        <div class="formRow lang_hidden lang_vi active">
			<label>Tiêu đề</label>
			<div class="formRight">
                <input type="text" name="ten_vi" title="Nhập tên sản phẩm" id="ten_vi" class="tipS validate[required]" value="<?=@$item['ten_vi']?>" />
			</div>
			<div class="clear"></div>
		</div>
		

		<div class="formRow lang_hidden lang_en">
			<label>Tiêu đề (Tiếng anh)</label>
			<div class="formRight">
                <input type="text" name="ten_en" title="Nhập tên sản phẩm" id="ten_en" class="tipS validate[required]" value="<?=@$item['ten_en']?>" />
			</div>
			<div class="clear"></div>
		</div>

		<!-- <div class="formRow lang_hidden lang_cn">
			<label>Tiêu đề (Tiếng trung)</label>
			<div class="formRight">
                <input type="text" name="ten_cn" title="Nhập tên sản phẩm" id="ten_cn" class="tipS validate[required]" value="<?=@$item['ten_cn']?>" />
			</div>
			<div class="clear"></div>
		</div> -->
		<div class="formRow">
			<label class="price">Giá</label>
			<div class="formRight">
                <input type="text" name="giaban" title="Nhập giá bán" id="giaban" class="conso tipS " value="<?=@$item['giaban']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<!-- <div class="formRow">
			<label>Màu sắc </label>
			<div class="formRight">
                <select data-placeholder="Chọn màu sắc" multiple class="chosen-select" name="mausac[]" style="width:30%">
					<option value="">--Chọn màu sắc--</option>
					<?php 
						$d->reset();
					    $sql = "select id,ten_vi from #_thuoctinh where hienthi=1 and type='mausac' order by id desc";
					    $d->query($sql);
					    $row_mausac = $d->result_array();
					    $arr_mau=explode(',', $item['mausac']);
						for($i=0;$i<count($row_mausac);$i++) {
						if(in_array($row_mausac[$i]['id'], $arr_mau))
						{
							$selected='selected';

						}else{
							$selected='';
						}
					?>
					<option value="<?=$row_mausac[$i]['id']?>" <?=$selected?>><?=$row_mausac[$i]['ten_vi']?></option>
					<?php } ?>
				</select>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Size </label>
			<div class="formRight">
                <select data-placeholder="Chọn size" multiple class="chosen-select" name="size[]" style="width:30%">
					<option value="">--Chọn size--</option>
					<?php 
						$d->reset();
					    $sql = "select id,ten_vi from #_thuoctinh where hienthi=1 and type='size' order by id desc";
					    $d->query($sql);
					    $row_size = $d->result_array();
					    $arr_size=explode(',', $item['size']);
						for($i=0;$i<count($row_size);$i++) {
						if(in_array($row_size[$i]['id'], $arr_size))
						{
							$selected='selected';

						}else{
							$selected='';
						}
					?>
					<option value="<?=$row_size[$i]['id']?>" <?=$selected?>><?=$row_size[$i]['ten_vi']?></option>
					<?php } ?>
				</select>
			</div>
			<div class="clear"></div>
		</div> -->
		<!-- <div class="formRow">
			
			<label class="price">Giá gốc</label>
			
			<div class="formRight">
                <input type="text" name="giacu" title="Nhập giá gốc" id="giacu" class="conso tipS " value="<?=@$item['giacu']?>" />
			</div>
			<div class="clear"></div>
		</div> -->
		<!-- <div class="formRow">
			<label>Khuyến mãi</label>
			<div class="formRight">

                <div id="load_muakem">
			     <?php
					$khuyenmai_vi=explode("|",$item['khuyenmai_vi']);
					if(count($khuyenmai_vi)!=0){
					?>     
			        <div class="load_sp">
			        <?php for($i=0;$i<count($khuyenmai_vi);$i++){ ?>
			            <p>
			            <input type="text" value="<?=$khuyenmai_vi[$i]?>" name="khuyenmai_vi[]" placeholder="Thông tin khuyến mãi" size="30" >&nbsp;
			            <img src="images/disabled.png" class="delete" height="15" />
			            </p>
			        <?php } ?>
			        </div>
			     	<?php  } ?>
			        <div><img src="images/add.jpg" class="themmoi" /></divs>
			    </div>
			</div>
			<div class="clear"></div>
		</div> -->

		<!-- <div class="formRow lang_hidden lang_vi active">
			<label>Tags </label>
			<div class="formRight">
            	<select style="width:300px" id="states">
            		<option value="0">
            			Thêm Tags 
            		</option>
            		<?php for ($i=0,$countt = count($tags_arr); $i < $countt ; $i++) { ?>
            			<option value="<?=$tags_arr[$i]["id"]?>"><?=$tags_arr[$i]["ten_vi"]?></option>
            		<?php }?>
            	</select>
            	<div class="clear"></div>
            	<div id="tags_name">
            	<?php  for ($i=0,$count = count($tags); $i < $count ; $i++) { 
        			$d->query("select id,ten_vi from #_tags where id=".$tags[$i]);
        			$tags_name = $d->fetch_array();
        			?>
        				<p value="<?=$tags_name["id"]?>" class="delete_tags"><?=$tags_name["ten_vi"]?> <span ></span> 
        					<input name="tags[]" value="<?=$tags_name["id"]?>"  type="hidden" />
        				</p>
        				
        		<?php }?>
        		</div>
            </div>
			<div class="clear"></div>
		</div> -->
		
		<div class="formRow lang_hidden lang_vi active">
			<label>Mô tả</label>
			<div class="formRight">
                <textarea rows="4" cols="" title="Nhập mô tả . " class="tipS" name="mota_vi"><?=@$item['mota_vi']?></textarea>
			</div>
			<div class="clear"></div>
		</div>

		<!-- <div class="formRow lang_hidden lang_en">
			<label>Mô tả (Tiếng anh)</label>
			<div class="formRight">
                <textarea rows="4" cols="" title="Nhập mô tả . " class="tipS" name="mota_en"><?=@$item['mota_en']?></textarea>
			</div>
			<div class="clear"></div>
		</div> -->

		<!--<div class="formRow lang_hidden lang_cn">
			<label>Mô tả (Tiếng trung)</label>
			<div class="formRight">
                <textarea rows="4" cols="" title="Nhập mô tả . " class="tipS" name="mota_cn"><?=@$item['mota_cn']?></textarea>
			</div>
			<div class="clear"></div>
		</div>
	-->
		<div class="formRow lang_hidden lang_vi active">
			<label>Nội Dung</label>
			<div class="ck_editor">
                <textarea id="noidung_vi" name="noidung_vi"><?=@$item['noidung_vi']?></textarea>
			</div>
			<div class="clear"></div>
		</div>

		<div class="formRow lang_hidden lang_en">
			<label>Nội Dung (Tiếng anh)</label>
			<div class="ck_editor">
                <textarea id="noidung_en" name="noidung_en"><?=@$item['noidung_en']?></textarea>
			</div>
			<div class="clear"></div>
		</div>

		<div class="formRow lang_hidden lang_cn">
			<label>Nội Dung (Tiếng trung)</label>
			<div class="ck_editor">
                <textarea id="noidung_cn" name="noidung_cn"><?=@$item['noidung_cn']?></textarea>
			</div>
			<div class="clear"></div>
		</div>


        <div class="formRow">
          <label>Hiển thị : <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Bỏ chọn để không hiển thị danh mục này ! "> </label>
          <div class="formRight">
         
            <input type="checkbox" name="hienthi" id="check1" value="1" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> />
             <label>Số thứ tự: </label>
              <input type="text" class="tipS" value="<?=isset($item['stt'])?$item['stt']:1?>" name="stt" style="width:40px; text-align:center;" onkeypress="return OnlyNumber(event)" original-title="Số thứ tự của danh mục, chỉ nhập số">
          </div>
          <div class="clear"></div>
        </div>
		
	</div>  
	<div class="widget">
		<div class="title"><img src="./images/icons/dark/record.png" alt="" class="titleIcon" />
			<h6>Nội dung seo</h6>
		</div>
		<div class="formRow">
			<label>Alt</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['h1']?>" name="h1" title="Nội dung alt" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		
		<!-- 
		<div class="formRow">
			<label>H2</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['h2']?>" name="h2" title="Nội dung thẻ meta h2 dùng để SEO" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		
		
		
		<div class="formRow">
			<label>H3</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['h3']?>" name="h3" title="Nội dung thẻ meta h3 dùng để SEO" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		
		
		<div class="formRow">
			<label>H4</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['h4']?>" name="h4" title="Nội dung thẻ meta h4 dùng để SEO" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		
		
		<div class="formRow">
			<label>H5</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['h5']?>" name="h5" title="Nội dung thẻ meta h5 dùng để SEO" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		
		
		<div class="formRow">
			<label>H6</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['h6']?>" name="h6" title="Nội dung thẻ meta h6 dùng để SEO" class="tipS" />
			</div>
			<div class="clear"></div>
		</div> -->
		<div class="formRow">
			<label>Title</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['title']?>" name="title" title="Nội dung thẻ meta Title dùng để SEO" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="formRow">
			<label>Từ khóa</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['keywords']?>" name="keywords" title="Từ khóa chính cho danh mục" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="formRow">
			<label>Description:</label>
			<div class="formRight">
				<textarea rows="4" cols="" title="Nội dung thẻ meta Description dùng để SEO" class="tipS" name="description"><?=@$item['description']?></textarea>
                <input readonly="readonly" type="text" style="width:25px; margin-top:10px; text-align:center;" name="des_char" value="<?=@$item['des_char']?>" /> ký tự <b>(Tốt nhất là 68 - 170 ký tự)</b>
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="formRow">
			<div class="formRight">
                <input type="hidden" name="type" id="id_this_type" value="<?=$_REQUEST['type']?>" />
                <input type="hidden" name="id" id="id_this_post" value="<?=@$item['id']?>" />
            	<input type="submit" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
            	<a href="index.php?com=product&act=man<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" onClick="if(!confirm('Bạn có muốn thoát không ? ')) return false;" title="" class="button tipS" original-title="Thoát">Thoát</a>
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
<script>
  $(document).ready(function() {
    $('.file_input').filer({
            showThumbs: true,
            templates: {
                box: '<ul class="jFiler-item-list"></ul>',
                item: '<li class="jFiler-item">\
                            <div class="jFiler-item-container">\
                                <div class="jFiler-item-inner">\
                                    <div class="jFiler-item-thumb">\
                                        <div class="jFiler-item-status"></div>\
                                        <div class="jFiler-item-info">\
                                            <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                        </div>\
                                        {{fi-image}}\
                                    </div>\
                                    <div class="jFiler-item-assets jFiler-row">\
                                        <ul class="list-inline pull-left">\
                                            <li><span class="jFiler-item-others">{{fi-icon}} {{fi-size2}}</span></li>\
                                        </ul>\
                                        <ul class="list-inline pull-right">\
                                            <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                        </ul>\
                                    </div>\<input type="text" name="stthinh[]" class="stthinh" placeholder="Nhập STT" />\
                                </div>\
                            </div>\
                        </li>',
                itemAppend: '<li class="jFiler-item">\
                            <div class="jFiler-item-container">\
                                <div class="jFiler-item-inner">\
                                    <div class="jFiler-item-thumb">\
                                        <div class="jFiler-item-status"></div>\
                                        <div class="jFiler-item-info">\
                                            <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                        </div>\
                                        {{fi-image}}\
                                    </div>\
                                    <div class="jFiler-item-assets jFiler-row">\
                                        <ul class="list-inline pull-left">\
                                            <span class="jFiler-item-others">{{fi-icon}} {{fi-size2}}</span>\
                                        </ul>\
                                        <ul class="list-inline pull-right">\
                                            <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                        </ul>\
                                    </div>\<input type="text" name="stthinh[]" class="stthinh" placeholder="Nhập STT" />\
                                </div>\
                            </div>\
                        </li>',
                progressBar: '<div class="bar"></div>',
                itemAppendToEnd: true,
                removeConfirmation: true,
                _selectors: {
                    list: '.jFiler-item-list',
                    item: '.jFiler-item',
                    progressBar: '.bar',
                    remove: '.jFiler-item-trash-action',
                }
            },
            addMore: true
        });
  });
</script>
