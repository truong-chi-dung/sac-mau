<script type="text/javascript">
	$(document).ready(function() {
		$('.update_stt').keyup(function(event) {
			var id = $(this).attr('rel');
			var table = 'thuoctinh';
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
			window.location.href="index.php?com=thuoctinh&act=man&type=<?=$_GET['type']?>&keyword="+keyword+"&id_list=<?=$_GET['id_list']?>";
		});

    $("#xoahet").click(function(){
      var listid="";
      $("input[name='chon']").each(function(){
        if (this.checked) listid = listid+","+this.value;
        })
      listid=listid.substr(1);   //alert(listid);
      if (listid=="") { alert("Bạn chưa chọn mục nào"); return false;}
      hoi= confirm("Bạn có chắc chắn muốn xóa?");
      if (hoi==true) document.location = "index.php?com=thuoctinh&act=delete&type=<?=$_GET['type']?>&curPage=<?=$_GET['curPage']?>&listid=" + listid;
    });
	});
function select_list()
  {
    var a=document.getElementById("id_list");
    window.location ="index.php?com=thuoctinh&act=man&type=<?=$_GET['type']?>&id_list="+a.value; 
    return true;
  }
</script>

<?php
  function get_main_list()
  {
    $sql="select * from table_product_list where type='product' order by stt asc";
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
  function get_main_list2()
  {
    $sql="select * from table_thuoctinh where type='timkiem' order by stt asc";
    $stmt=mysql_query($sql);
    $str='
      <select id="id_list" name="id_list" onchange="select_list()" class="main_select">
      <option value="">Chọn danh mục</option>';
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
?>
<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="index.php?com=thuoctinh&act=man<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Quản lý <?=$title_main ?></span></a></li>
        	<?php if($_GET['keyword']!=''){ ?>
				<li class="current"><a href="#" onclick="return false;">Kết quả tìm kiếm " <?=$_GET['keyword']?> " </a></li>
			<?php }  else { ?>
            	<li class="current"><a href="#" onclick="return false;">Tất cả</a></li>
            <?php } ?>
        </ul>
        <div class="clear"></div>
    </div>
</div>

<script src="js/jquery.datetimepicker.full.min.js"></script>

<?php if($_GET['type']=="soluong") { ?>
<div class="widget">
  <div class="titlee" style="padding-bottom:5px;">

    <div class="timkiem" >
    <form name="search" action="index.php" method="GET" class="form giohang_ser">
      <input name="com" value="thuoctinh" type="hidden"  />
      <input name="act" value="man" type="hidden" />
      <input name="type" value="soluong" type="hidden" />
      <input name="p" value="<?=($_GET['p']=='')?'1':$_GET['p']?>" type="hidden" />
      <input class="form_or" name="keyword" placeholder="Nhập từ khóa.." value="<?=$_GET['keyword']?>" type="text" />
      <input class="form_or" name="ngaybd" id="datefm" type="text" value="<?=$_GET['ngaybd']?>" placeholder="Từ ngày.."/>
      <input class="form_or" name="ngaykt" id="dateto" type="text" value="<?=$_GET['ngaykt']?>" placeholder="Đến ngày.." />
      <input type="submit" class="blueB" value="Tìm kiếm" style="width:100px; margin:0px 0px 0px 10px;"  />
    </form>
    </div><!--end tim kiem-->
  </div>
</div>
<?php } ?>
<form name="f" id="f" method="post">

<div class="control_frm" style="margin-top:0;">
  	<div style="float:left;">
    	<input type="button" class="blueB" value="Thêm" onclick="location.href='index.php?com=thuoctinh&act=add<?php if($_REQUEST['id_list']!='') echo'&id_list='. $_REQUEST['id_list'];?><?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>'" />
        <input type="button" class="blueB" value="Xoá Chọn" id="xoahet" />
        <?php if($_GET['type']=="soluong") { 
          $url_link=strstr(getCurrentPage(), '&keyword');
        ?>
      <a href="export_sl.php?com=thuoctinh&act=man&type=soluong<?php if($url_link!="") echo $url_link;?>" title="" class="smallButton2 tipS" original-title="Xuất excel">Xuất file exel</a>
      <?php } ?>
    </div>  
</div>

<div class="widget">
  <div class="title"><span class="titleIcon">
    <input type="checkbox" id="titleCheck" name="titleCheck" />
    </span>
    <h6>Chọn tất cả</h6>
    <?php if($_GET['type']!="soluong") { ?>
    <div class="timkiem">
	    <input type="text" value="" placeholder="Nhập từ khóa tìm kiếm ">
	    <button type="button" class="blueB"  value="">Tìm kiếm</button>
    </div>
    <?php } ?>
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
        <td></td>
        <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">Thứ tự</a></td>   
        <?php if($config_list=='true'){ ?>
        <td class="tb_data_small"><?=get_main_list()?></td>
        <?php } ?>   
        <?php if($config_list2=='true'){ ?>
        <td class="tb_data_small"><?=get_main_list2()?></td>
        <?php } ?>      
        <td class="sortCol"><div><?php if($_GET['type']!="makm" && $_GET['type']!="doidiem") { ?>Tiêu đề <?php } ?><?=$title_main?><span></span></div></td>
        <?php if($_GET['type']=="makm") { ?>
        <td class="tb_data_small">Giá giảm</td>
        <td class="tb_data_small">Mã thành viên</td>
        <?php } ?>
        <?php if($_GET['type']=="doidiem") { ?>
        <td class="tb_data_small">Giá giảm</td>

        <?php } ?>
        <?php if($_GET['type']=="soluong") { ?>
        <td class="tb_data_small">Số lượng</td>
        <td class="tb_data_small">Ngày nhập</td>
        <?php } ?>
        <?php if($config_images=='true'){ ?>
        <td class="tb_data_small">Hình ảnh</td>
        <?php } ?>
        <?php if($_GET['type']=='timkiem'){ ?>
        <td class="tb_data_small">Chi tiết tìm kiếm</td>
        <?php } ?>
        <?php if($config_noibat=='true'){ ?> 
        <td class="tb_data_small">Nổi bật</td>
        <?php }?>
        <?php if($_GET['type']!="soluong") { ?>
        <td class="tb_data_small">Ẩn/Hiện</td>
        <?php } ?>
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
            <input type="text" value="<?=$items[$i]['stt']?>" name="ordering[]" onkeypress="return OnlyNumber(event)" class="tipS smallText update_stt" original-title="Nhập số thứ tự sản phẩm" rel="<?=$items[$i]['id']?>" />

            <div id="ajaxloader"><img class="numloader" id="ajaxloader<?=$items[$i]['id']?>" src="images/loader.gif" alt="loader" /></div>
        </td> 

        <?php if($config_list=='true'){ ?>
         <td>
          <?php
            $d->reset();
            $sql = "select ten_vi from table_product_list where id='".$items[$i]['id_list']."'";
            $result=mysql_query($sql);
            $name_danhmuc =mysql_fetch_array($result);
            echo @$name_danhmuc['ten_vi'];
          ?>  
         </td>
         <?php } ?>
         <?php if($config_list2=='true'){ ?>
         <td>
          <?php
            $d->reset();
            $sql = "select ten_vi from table_thuoctinh where id='".$items[$i]['id_list']."'";
            $result=mysql_query($sql);
            $name_danhmuc =mysql_fetch_array($result);
            echo @$name_danhmuc['ten_vi'];
          ?>  
         </td>
         <?php } ?>
        <td class="title_name_data">
            <?=$items[$i]['ten_vi']?>
        </td>
        <?php if($_GET['type']=="makm") { ?>
        <td class="title_name_data">
            <?=number_format($items[$i]['giagiam'],0, ',', '.')?>&nbsp;VNĐ
        </td>
        <td class="title_name_data">
          <?php
            $d->reset();
            $sql = "select mathanhvien from table_thanhvien where id='".$items[$i]['id_khachhang']."'";
            $result=mysql_query($sql);
            $row =mysql_fetch_array($result);
            echo @$row['mathanhvien'];
          ?>  
        </td>
        <?php }?>
        <?php if($_GET['type']=="doidiem") { ?>
        <td class="title_name_data"><?=number_format($items[$i]['giagiam'],0, ',', '.')?>&nbsp;VNĐ</td>
        <?php }?>
        <?php if($_GET['type']=="soluong") { ?>
        <td class="title_name_data"><?=$items[$i]['soluongnhap']?></td>
        <td class="title_name_data"><?=date('d-m-Y ',$items[$i]['ngaytao'])?></td>
        <?php }?>
        <?php if($config_images=='true'){ ?>
        <td align="center">
            <a href="index.php?com=thuoctinh&act=edit&id_list=<?=$items[$i]['id_list']?>&id_cat=<?=$items[$i]['id_cat']?>&id_item=<?=$items[$i]['id_item']?>&id_sub=<?=$items[$i]['id_sub']?>&id=<?=$items[$i]['id']?><?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" class="tipS SC_bold"><img src="<?=_upload_hinhanh.$items[$i]['photo']?>" width="100" alt=""> </a>
        </td>
        <?php } ?>
        <?php if($_GET['type']=='timkiem'){ ?>
        <td align="center">
            <a href="index.php?com=thuoctinh&act=man&type=cttimkiem&id_list=<?=$items[$i]['id']?>" class="tipS SC_bold">Thêm</a>
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
        </td>
        <?php }?>
        <?php if($_GET['type']!="soluong") { ?>
        <td align="center">
           <?php 
			if(@$items[$i]['hienthi']==1)
				{
		?>
            <a href="index.php?com=thuoctinh&act=man&id_list=<?=$_REQUEST['id_list']?>&id_cat=<?=$_REQUEST['id_cat']?>&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" title="" class="smallButton tipS" original-title="Click để ẩn"><img src="./images/icons/color/tick.png" alt=""></a>
            <?php } else { ?>
         <a href="index.php?com=thuoctinh&act=man&id_list=<?=$_REQUEST['id_list']?>&id_cat=<?=$_REQUEST['id_cat']?>&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" title="" class="smallButton tipS" original-title="Click để hiện"><img src="./images/icons/color/hide.png" alt=""></a>
         <?php } ?>
        </td>
       <?php } ?>
        <td class="actBtns">
          <?php if($_GET['type']!="soluong") { ?>
            <a href="index.php?com=thuoctinh&act=edit&id_list=<?=$items[$i]['id_list']?>&id=<?=$items[$i]['id']?><?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" title="" class="smallButton tipS" original-title="Sửa sản phẩm"><img src="./images/icons/dark/pencil.png" alt=""></a>
          <?php } ?>
            <a href="index.php?com=thuoctinh&act=delete&id_list=<?=$items[$i]['id_list']?>&id=<?=$items[$i]['id']?><?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" onClick="if(!confirm('Xác nhận xóa')) return false;" title="" class="smallButton tipS" original-title="Xóa sản phẩm"><img src="./images/icons/dark/close.png" alt=""></a>
        </td>
      </tr>
         <?php } ?>
                </tbody>
  </table>
</div>
</form>  

<div class="paging"><?=$paging?></div>
<script type="text/javascript">
function onSearch(evt) {  
    var datefm = document.getElementById("datefm").value; 
    var dateto = document.getElementById("dateto").value;
    var status = document.getElementById("id_tinhtrang").value;   
    //var encoded = Base64.encode(keyword);
    location.href = "index.php?com=thuoctinh&act=man&type=soluong&datefm="+datefm+"&dateto="+dateto+"&status="+status;
    loadPage(document.location);
      
}
$(document).ready(function(){           
  var dates = $( "#datefm, #dateto" ).datepicker({
      defaultDate: "+1w",
      dateFormat: 'dd/mm/yy',
      changeMonth: true,      
      numberOfMonths: 3,
      onSelect: function( selectedDate ) {
        var option = this.id == "datefm" ? "minDate" : "maxDate",
          instance = $( this ).data( "datepicker" ),
          date = $.datepicker.parseDate(
            instance.settings.dateFormat ||
            $.datepicker._defaults.dateFormat,
            selectedDate, instance.settings );
        dates.not( this ).datepicker( "option", option, date );
      }
    });
        
    });
    
</script>