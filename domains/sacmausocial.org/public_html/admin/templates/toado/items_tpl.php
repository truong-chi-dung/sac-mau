<script type="text/javascript">
	$(document).ready(function() {
		$('.update_stt').keyup(function(event) {
			var id = $(this).attr('rel');
			var table = 'toado';
			var value = $(this).val();
			$.ajax ({
				type: "POST",
				url: "ajax/update_stt.php",
				data: {id:id,table:table,value:value},
				success: function(result) {
				}
			});
		});
		$('.timkiem button').click(function(event) {
			var keyword = $(this).parent().find('input').val();
			window.location.href="index.php?com=toado&act=man&keyword="+keyword;
		});
    $("#xoahet").click(function(){
      var listid="";
      $("input[name='chon']").each(function(){
        if (this.checked) listid = listid+","+this.value;
        })
      listid=listid.substr(1);   //alert(listid);
      if (listid=="") { alert("Bạn chưa chọn mục nào"); return false;}
      hoi= confirm("Bạn có chắc chắn muốn xóa?");
      if (hoi==true) document.location = "index.php?com=toado&act=delete&curPage=<?=$_GET['curPage']?>&listid=" + listid;
    });
	});

  function select_list()
  {
    var a=document.getElementById("id_list");
    window.location ="index.php?com=toado&act=man&id_list="+a.value; 
    return true;
  }

  function select_cat()
  {
    var a=document.getElementById("id_list");
    var b=document.getElementById("id_cat");
    window.location ="index.php?com=toado&act=man&id_list="+a.value+"&id_cat="+b.value; 
    return true;
  }
   function select_item()
  {
    var a=document.getElementById("id_list");
    var b=document.getElementById("id_cat");
    var c=document.getElementById("id_item");
    window.location ="index.php?com=toado&act=man&id_list="+a.value+"&id_cat="+b.value+"&id_item="+c.value; 
    return true;
  }

</script>
<?php
  function get_main_list()
  {
    $sql="select * from table_toado_list where type='".$_GET['type']."' order by stt asc";
    $stmt=mysql_query($sql);
    $str='
      <select id="id_list" name="id_list" onchange="select_list()" class="main_select">
      <option value="">Chọn danh mục 1</option>';
    while ($row=@mysql_fetch_array($stmt)) 
    {
      if($row["id"]==(int)@$_REQUEST["id_list"])
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
    $sql="select * from table_toado_cat where id_list='".$_GET['id_list']."' and type='".$_GET['type']."' order by stt asc";
    $stmt=mysql_query($sql);
    $str='
      <select id="id_cat" name="id_cat" onchange="select_cat()" class="main_select">
      <option value="">Chọn danh mục 2</option>';
    while ($row=@mysql_fetch_array($stmt)) 
    {
      if($row["id"]==(int)@$_REQUEST["id_cat"])
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
    $sql="select * from table_toado_item where id_cat='".$_GET['id_cat']."' and type='".$_GET['type']."' order by stt asc";
    $stmt=mysql_query($sql);
    $str='
      <select id="id_item" name="id_item" onchange="select_item()" class="main_select">
      <option value="">Chọn danh mục 3</option>';
    while ($row=@mysql_fetch_array($stmt)) 
    {
      if($row["id"]==(int)@$_REQUEST["id_item"])
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
    $sql="select * from table_toado_sub where id_item='".$_GET['id_item']."' and type='".$_GET['type']."' order by stt asc";
    $stmt=mysql_query($sql);
    $str='
      <select id="id_sub" name="id_sub" onchange="select_sub()" class="main_select">
      <option value="">Chọn danh mục 4</option>';
    while ($row=@mysql_fetch_array($stmt)) 
    {
      if($row["id"]==(int)@$_REQUEST["id_sub"])
        $selected="selected";
      else 
        $selected="";
      $str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';      
    }
    $str.='</select>';
    return $str;
  }
?>

<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="index.php?com=toado&act=man"><span>Quản lý mạng lưới</span></a></li>
        	<?php if($_GET['keyword']!=''){ ?>
				<li class="current"><a href="#" onclick="return false;">Kết quả tìm kiếm " <?=$_GET['keyword']?> " </a></li>
			<?php }  else { ?>
            	<li class="current"><a href="#" onclick="return false;">Tất cả</a></li>
            <?php } ?>
        </ul>
        <div class="clear"></div>
    </div>
</div>


<form name="f" id="f" method="post">
<div class="control_frm" style="margin-top:0;">
  	<div style="float:left;">
    	<input type="button" class="blueB" value="Thêm" onclick="location.href='index.php?com=toado&act=add'" />
        <input type="button" class="blueB" value="Xoá Chọn" id="xoahet" />

    </div>  
</div>

<div class="widget">
  <div class="title"><span class="titleIcon">
    <input type="checkbox" id="titleCheck" name="titleCheck" />
    </span>
    <h6>Chọn tất cả</h6>
    <div class="timkiem">
	    <input type="text" value="" placeholder="Nhập từ khóa tìm kiếm ">
	    <button type="button" class="blueB"  value="">Tìm kiếm</button>
    </div>
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
        <td></td>
        <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">Thứ tự</a></td>     
        <?php if($config_list=='true'){ ?>
        <td class="tb_data_small"><?=get_main_list()?></td>
        <?php } ?>
        <?php if($config_cat=='true'){ ?> 
        <td class="tb_data_small"><?=get_main_cat()?></td>
        <?php } ?>
         <?php if($config_item=='true'){ ?> 
        <td class="tb_data_small"><?=get_main_item()?></td>
        <?php } ?>
         <?php if($config_sub=='true'){ ?> 
        <td class="tb_data_small"><?=get_main_sub()?></td>
        <?php } ?>
        <td class="sortCol"><div>Tên bài viết<span></span></div></td>
		 <?php if($config_images=='true'){ ?> 
			<td class="tb_data_small"><div>Hình ảnh</div></td>
		  <?php } ?>
        <?php if($config_noibat=='true'){ ?> 
         <td class="tb_data_small">Nổi bật</td>
         <?php } ?>
         
        <td class="tb_data_small">Ẩn/Hiện</td>
        <td width="200">Thao tác</td>
      </tr>
    </thead>

    <tbody>
         <?php for($i=0, $count=count($items); $i<$count; $i++){?>
          <tr>
       <td>
            <input type="checkbox" name="chon" value="<?=$items[$i]['id']?>" id="check<?=$i?>" />
        </td>

       
        <td align="center">
            <input type="text" value="<?=$items[$i]['stt']?>" name="ordering[]" onkeypress="return OnlyNumber(event)" class="tipS smallText update_stt" original-title="Nhập số thứ tự bài viết" rel="<?=$items[$i]['id']?>" />

            <div id="ajaxloader"><img class="numloader" id="ajaxloader<?=$items[$i]['id']?>" src="images/loader.gif" alt="loader" /></div>
        </td> 
        <?php if($config_list=='true'){ ?>
         <td align="center">
          <?php
            $d->reset();
            $sql = "select ten_vi from table_toado_list where id='".$items[$i]['id_list']."'";
            $result=mysql_query($sql);
            $name_danhmuc =mysql_fetch_array($result);
            echo @$name_danhmuc['ten_vi'];
          ?>  
         </td>
         <?php } ?> 
         <?php if($config_cat=='true'){ ?>
         <td align="center">
          <?php
            $d->reset();
            $sql = "select ten_vi from table_toado_cat where id='".$items[$i]['id_cat']."'";
            $result=mysql_query($sql);
            $name_danhmuc =mysql_fetch_array($result);
            echo @$name_danhmuc['ten_vi'];
          ?>  
         </td>
        <?php } ?> 
         <?php if($config_item=='true'){ ?>
         <td align="center">
          <?php
            $d->reset();
            $sql = "select ten_vi from table_toado_item where id='".$items[$i]['id_item']."'";
            $result=mysql_query($sql);
            $name_danhmuc =mysql_fetch_array($result);
            echo @$name_danhmuc['ten_vi'];
          ?>  
         </td>
        <?php } ?> 
        <?php if($config_sub=='true'){ ?>
         <td align="center">
          <?php
            $d->reset();
            $sql = "select ten_vi from table_toado_sub where id='".$items[$i]['id_sub']."'";
            $result=mysql_query($sql);
            $name_danhmuc =mysql_fetch_array($result);
            echo @$name_danhmuc['ten_vi'];
          ?>  
         </td>
        <?php } ?> 
        <td class="title_name_data" align="center">
            <a href="index.php?com=toado&act=edit&id_list=<?=$items[$i]['id_tinh']?>&id_cat=<?=$items[$i]['id_quan']?>&id_hethong=<?=$items[$i]['id_hethong']?>&id_sub=<?=$items[$i]['id_sub']?>&id=<?=$items[$i]['id']?>" class="tipS SC_bold"><?=$items[$i]['ten']?></a>
        </td>
		 <?php if($config_images=='true'){ ?> 
        <td align="center">
            <a href="index.php?com=toado&act=edit&id_list=<?=$items[$i]['id_list']?>&id_cat=<?=$items[$i]['id_cat']?>&id_item=<?=$items[$i]['id_item']?>&id_sub=<?=$items[$i]['id_sub']?>&id=<?=$items[$i]['id']?>" class="tipS SC_bold"><img src="<?=_upload_toado.$items[$i]['thumb']?>" width="80" alt=""> </a>
        </td>
		<?php } ?>
        <?php if($config_noibat=='true'){ ?> 
        <td align="center">
          <a data-val2="table_<?=$_GET['com']?>" rel="<?=$items[$i]['noibat']?>" data-val3="noibat" title class="status smallButton tipS" original-title="<?php if($items[$i]['noibat']==0) echo 'Click để hiện'; else echo "Click để ẩn"; ?>" data-val0="<?=$items[$i]['id']?>" >
            <?php if($items[$i]['noibat']==1) { ?>
            <img src="./images/icons/color/tick.png" alt="">
            <?php }else{ ?>
            <img src="./images/icons/color/hide.png" alt="">
            <?php } ?>
          </a>
          <!-- <a data-val2="table_<?=$_GET['com']?>" rel="<?=$items[$i]['noibat']?>" data-val3="noibat" class="diamondToggle <?=($items[$i]['noibat']==1)?"diamondToggleOff":""?>" data-val0="<?=$items[$i]['id']?>" ></a>  -->
        </td>
        <?php } ?>              
        <td align="center">
          <a data-val2="table_<?=$_GET['com']?>" rel="<?=$items[$i]['hienthi']?>" data-val3="hienthi" title class="status smallButton tipS" original-title="<?php if($items[$i]['hienthi']==0) echo 'Click để hiện'; else echo "Click để ẩn"; ?>" data-val0="<?=$items[$i]['id']?>" >
            <?php if($items[$i]['hienthi']==1) { ?>
            <img src="./images/icons/color/tick.png" alt="">
            <?php }else{ ?>
            <img src="./images/icons/color/hide.png" alt="">
            <?php } ?>
          </a>
          <!-- <a data-val2="table_<?=$_GET['com']?>" rel="<?=$items[$i]['hienthi']?>" data-val3="hienthi" class="diamondToggle <?=($items[$i]['hienthi']==1)?"diamondToggleOff":""?>" data-val0="<?=$items[$i]['id']?>" ></a>    -->
        </td>
       
        <td class="actBtns">
            <a href="index.php?com=toado&act=edit&id_list=<?=$items[$i]['id_tinh']?>&id_cat=<?=$items[$i]['id_quan']?>&id_hethong=<?=$items[$i]['id_hethong']?>&id_sub=<?=$items[$i]['id_sub']?>&id=<?=$items[$i]['id']?>" title="" class="smallButton tipS" original-title="Sửa bài viết"><img src="./images/icons/dark/pencil.png" alt=""></a>

            <a href="index.php?com=toado&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;" title="" class="smallButton tipS" original-title="Xóa bài viết"><img src="./images/icons/dark/close.png" alt=""></a>
        </td>
      </tr>
         <?php } ?>
                </tbody>
  </table>
</div>
</form>  

<div class="paging"><?=$paging?></div>