<link rel="stylesheet" type="text/css" href="css/cart.css?v=<?=time()?>" media="screen"/>
<script type="text/javascript">
function validEmail(obj) {
	var s = obj.value;
	for (var i=0; i<s.length; i++)
		if (s.charAt(i)==" "){
			return false;
		}
	var elem, elem1;
	elem=s.split("@");
	if (elem.length!=2)	return false;

	if (elem[0].length==0 || elem[1].length==0)return false;

	if (elem[1].indexOf(".")==-1)	return false;

	elem1=elem[1].split(".");
	for (var i=0; i<elem1.length; i++)
		if (elem1[i].length==0)return false;
	return true;
}//Kiem tra dang email
function IsNumeric(sText)
{
	var ValidChars = "0123456789";
	var IsNumber=true;
	var Char;

	for (i = 0; i < sText.length && IsNumber == true; i++) 
	{ 
		Char = sText.charAt(i); 
		if (ValidChars.indexOf(Char) == -1) 
		{
			IsNumber = false;
		}
	}
	return IsNumber;
}//Kiem tra dang so
function check()
		{
			var frm 	= document.frm_order;
			
			if(frm.ten.value=='') 
			{ 
				alert( "Bạn chưa điền họ tên." );
				frm.ten.focus();
				return false;
			}
			if(frm.dienthoai.value=='') 
			{ 
				alert( "Bạn chưa điền điện thoại." );
				frm.dienthoai.focus();
				return false;
			}
			if(frm.diachi.value=='') 
			{ 
				alert( "Bạn chưa điền địa chỉ." );
				frm.diachi.focus();
				return false;
			}
			
			if(frm.email.value=='') 
			{ 
				alert( "Bạn chưa điền email." );
				frm.email.focus();
				return false;
			}
			if(!validEmail(frm.email)){
				alert('Vui lòng nhập đúng địa chỉ email');
				frm.email.focus();
				return false;
			}
			// if($('input[name=httt]:checked').length<=0)
			// {
			// 	 alert("Bạn chưa chọn hình thức thanh toán");
			// 	 return false;
			// }												
			frm.submit();		
		}	
</script>
<div class="bg-tieudesanpham"><h2><?=_thanhtoan?></h2></div>
	<?php 
	if(count($_SESSION['cart']) > 0){ ?>
	<form method="post" name="frm_order" id="frm_order" action="" enctype="multipart/form-data" onsubmit="return check();">
        <div id="product-detail row" >
        	<div class="tt-right col-md-6 col-xs-12 col-sm-12">
        		<ul class="breadcrumb_cart m-show">
        			<li>
						<a href="index.html"><?=_trangchu?></a><i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="gio-hang.html"><?=_giohang?></a><i class="fa fa-angle-right"></i>
					</li>
                    <li >
                        <?=_thongtingiaohang?>
                    </li>
				</ul>
				<div class="clear10"></div>
           		<table border="0" width="100%" cellpadding="5px" cellspacing="1px" class="tbl-tt" width="100%">
		    	<?
					if(is_array($_SESSION['cart'])){
						$max=count($_SESSION['cart']);
						for($i=0;$i<$max;$i++){
							$pid=$_SESSION['cart'][$i]['productid'];
							$q=$_SESSION['cart'][$i]['qty'];
							$size=$_SESSION['cart'][$i]['idsize'];
							$mau=$_SESSION['cart'][$i]['idmau'];						
							$pname=get_product_name($pid);
							if($q==0) continue;
					?>
						<tr>
		            		<td width="2%" align="left">
		        				<div class="relative">
		        					<div class="sl-abs"><?=$q?></div> 	
		            				<img src="thumb.php?src=<?=_upload_product_l.get_hinh($pid);?>&w=64&h=64&zc=2&q=80" alt="<?=$pname?>" />
		            			</div>
		            		</td>
		            		<td width="29%" align="left">
		            			<?=$pname?>
		            			
		            		</td>
		                    <td width="5%" align="right"><?=number_format(get_price($pid)*$q,0, ',', '.') ?>&nbsp;đ</td>
		                </tr>

		            <?					
						}
					?>
						
		                
					<?
		            }
					else{
						echo "<tr bgColor='#FFFFFF'><td>Không có sản phẩm nào trong giỏ hàng!</td></tr>";
					}
				?>
		        </table>
		        
		        <div class="tong">
		        	<?=_tongcong?>:<div class="fl-r col-red"><font class="tongtinh">
		        		<?=number_format(get_order_total(),0, ',', '.')?></font>&nbsp;đ</div>
		        </div>
		       <br/>
		   </div>
        	<div class="info_khach col-md-6 col-xs-12 col-sm-12">
        		<ul class="breadcrumb_cart m-hidden">
        			<li>
						<a href="index.html"><?=_trangchu?></a><i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="gio-hang.html"><?=_giohang?></a><i class="fa fa-angle-right"></i>
					</li>
                    <li >
                        <?=_thongtingiaohang?>
                    </li>
				</ul>
				<div class="clear20"></div>
		    	
		    	<p class="ttkh"><?=_thongtinkhachhang?></p>
			    <input name="ten" id="ten" class="input_cart w-100" value="<?=$_SESSION['login']['thanhvien']?>"  placeholder="<?=_hoten?>"/>
			    <input name="email" id="email" class="input_cart w-6"  value="<?=$_SESSION['login']['email']?>" placeholder="<?=_email?>..."/>
			    <input name="dienthoai" id="dienthoai" class="input_cart w-3" value="<?=$_SESSION['login']['dienthoai']?>" placeholder="<?=_dienthoai?>..."/>
			    <input  name="diachi"  id="diachi" class="input_cart w-100"  value="<?=$_SESSION['login']['diachi']?>" placeholder="<?=_diachi?>..."/>
			    <textarea id="noidung_tt" name="noidung" placeholder="<?=_ghichu?>..."></textarea>
			    
			    <p class="ttkh"><?=_pt1?></p>
			    <div class="section-content">
			    	<?php
			    		$d->reset();
			    		$d->query("select ten_$lang as ten,id,noidung_$lang as noidung from #_baiviet where type='httt' and hienthi=1");
			    		$httt = $d->result_array();
			    	?>
			    	<div class="content-box">
			    	<?php foreach ($httt as $k => $v) { ?>
			    		
				            <div class="radio-wrapper content-box-row">
				                <label class="container_cart"><?=$v['ten']?>
								  <input type="radio" name="httt" id="<?=$v['id']?>" value="<?=$v['id']?>">
								  <span class="checkmark"></span>
								</label>
				            </div>
				        	<div class="nd-ttt nd-ttt<?=$v['id']?>" >
					        	<?=$v['noidung']?>
					        </div>
			    	<?php } ?>
			        </div>
			    </div> 
			    <div class="clear10"></div>
			    <input title='tiếp tục' class="button" type="submit" name="next" value="<?=_hoantatdonhang?>" style="cursor:pointer;"/> 
			    <div class="clear10"></div>  
			       
			</div>
        	
		    
		    
		          
		    </div>
		  </form>      	      
	<?php }else {
		echo 'No result';
	}?>
</div>  
<div class="clear"></div>

<style type="text/css">
	body{
		background: none;
	}
	#header,#menu,#menu-top,#footer,#rib,#menu-top-rp,#content-bot,#map_canvas1,#copyright{
		display: none;
	}
	#content{
		overflow-x: hidden;
		margin:0px;
	}
	.bg-tieudesanpham{
		display: none
	}
</style>
<script type="text/javascript">
	$("input[name='httt']").click(function(){
		var id=$(this).val();
		$(".nd-ttt").hide(300);
		$(".nd-ttt"+id).show(300);
	})
</script>
<script type="text/javascript">
	$( "#giaship" ).click(function(){
		var id = $(this).val(),
			diemtichluy = $("input[name='diemtichluy']:checked").val();
		$.ajax({
			type:'POST',
			url:'ajax/ajax_giaship.php',
			dataType:"json",
			data:{id:id,diemtichluy:diemtichluy},
			success:function(data){
				$('.tongtinh').html(data.tonggia);
				$('.giaship').html(data.giaship);
			}
		});
	});
</script> 