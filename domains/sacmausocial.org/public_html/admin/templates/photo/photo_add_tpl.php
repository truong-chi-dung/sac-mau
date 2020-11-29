<?php
    $d->reset();
    $sql="select id,ten_vi from table_product_list where hienthi =1 and type='product' order by stt,id desc";
    $d->query($sql);
    $result_list=$d->result_array();
?>
<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="index.php?com=photo&act=man_photo<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span><?=$title_main?></span></a></li>
            <li class="current"><a href="#" onclick="return false;">Thêm hình ảnh</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">		
	function TreeFilterChanged2(){		
				$('#validate').submit();		
	}	
</script>
<form name="supplier" id="validate" class="form" action="index.php?com=photo&act=save_photo<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" method="post" enctype="multipart/form-data">
	<div class="widget">
				
		
        <?php for($i=0; $i<1; $i++){?>
        <div class="title"><img src="./images/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Thêm hình ảnh</h6>
		</div>
        <?php if($config_list=='true'){ ?>
        <div class="formRow">
            <label>Chọn danh mục 1</label>
            <div class="formRight">
                <select id="id_list" name="id_list<?=$i?>" class="main_select">
                    <option>Chọn danh mục</option>
                    <?php for ($j=0; $j < count($result_list) ; $j++) { ?>
                    <option value="<?=$result_list[$j]['id']?>"><?=$result_list[$j]['ten_vi']?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="clear"></div>
        </div>
        <?php } ?>
        <div class="formRow">
			<label>Tên hình ảnh</label>
			<div class="formRight">
                <input type="text" name="ten_vi<?=$i?>" title="Nhập tên hình ảnh" id="name" class="tipS validate[required]" value="" />
			</div>
			<div class="clear"></div>
		</div>		                     
        
		<div class="formRow">
			<label>Tải hình ảnh:</label>
			<div class="formRight">
            					<input type="file" id="file" name="file<?=$i?>" />
				<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
                <span class="note">width : <?php echo _width_thumb*$ratio_;?>px  - Height : <?php echo _height_thumb*$ratio_;?>px</span>
			</div>
			<div class="clear"></div>
		</div>
                <?php if($config_mota=='true'){?>
                <div class="formRow lang_hidden lang_vi active">
                    <label>Mô tả</label>
                    <div class="formRight">
                        <textarea rows="4" cols="" title="Nhập mô tả . " class="tipS" name="mota_vi<?=$i?>"><?=@$item['mota_vi<?=$i?>']?></textarea>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="formRow lang_hidden lang_en">
                    <label>Mô tả (Tiếng anh)</label>
                    <div class="ck_editor">
                        <textarea rows="4" id="mota_en<?=$i?>" cols="" title="Nhập mô tả . " class="tipS" name="mota_en<?=$i?>"><?=@$item['mota_en']?></textarea>
                    </div>
                    <div class="clear"></div>
                </div>
                <?php }?>
        <?php if($links_=='true'){?>
        <div class="formRow">
            <label>Link liên kết:</label>
            <div class="formRight">
                <input type="text" id="code_pro" name="link<?=$i?>" value=""  title="Nhập link liên kết cho hình ảnh" class="tipS" />
            </div>
            <div class="clear"></div>
        </div>
        <?php }  ?>
        <div class="formRow">
          <label>Tùy chọn: <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Check vào những tùy chọn "> </label>
          <div class="formRight">           
            <input type="checkbox" name="active<?=$i?>" id="check1" value="1" checked="checked" />
            <label for="check1">Hiển thị</label>           
          </div>
          <div class="clear"></div>
        </div>
        <div class="formRow">
            <label>Số thứ tự: </label>
            <div class="formRight">
                <input type="text" class="tipS" value="1" name="stt<?=$i?>" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" original-title="Số thứ tự của hình ảnh, chỉ nhập số">
            </div>
            <div class="clear"></div>
        </div>
		<?php } ?>
	<div class="formRow">
			<div class="formRight">
            	<input type="hidden" name="type" id="id_this_type" value="<?=$_REQUEST['type']?>" />
            	<input type="button" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div>	
	</div>
   
	
</form>   