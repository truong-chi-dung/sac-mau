<?php
if(@$_REQUEST['command']=='delete' && @$_REQUEST['pid']>0){
		remove_product($_REQUEST['pid'],$_REQUEST['idmau']);
	}
	else if($_REQUEST['command']=='clear'){
		unset($_SESSION['cart']);
	}
	else if($_REQUEST['command']=='update'){
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=intval($_REQUEST['product'.$pid]);
			if($q>0 && $q<=999){
				$_SESSION['cart'][$i]['qty']=$q;
			}
			else{
				$msg='Some proudcts not updated!, quantity must be a number between 1 and 999';
			}
		}
	}
?>
<script language="javascript">
	function del(pid){
		if(confirm('Bạn có muốn xóa sản phẩm?')){
			document.form1.pid.value=pid;
			document.form1.command.value='delete';
			document.form1.submit();
		}
	}
	function clear_cart(){
		if(confirm('Bạn có muốn xóa tất cả sản phẩm?')){
			document.form1.command.value='clear';
			document.form1.submit();
		}
	}
	function update_cart(){
		document.form1.command.value='update';
		document.form1.submit();
	}
</script>
<div class="bg-tieudesanpham"><h2><?=_giohang?></h2></div>
	<?php 
	if(count($_SESSION['cart']) > 0){ ?>
	<div class="row">
		<div class="col-md-8">
				<div id="product-all">
    
		<form name="form1" method="post">
		<input type="hidden" name="pid" />
		<input type="hidden" name="command" /> 
			<div class="table-responsive">
				<table class="table" border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px;" width="100%">
    	<?
			if(is_array($_SESSION['cart'])){
            	echo '<tr bgcolor="#a66428" style="font-weight:bold;color:#000; height:30px"><td align="center">STT</td><td align="center">'._tensp.'</td><td align="center">'._hinhanh.'</td><td align="center">'._gia.'</td><td align="center">'._soluong.'</td><td align="center">'._tonggia.'</td><td align="center">'._xoa.'</td></tr>';
				$max=count($_SESSION['cart']);
				for($i=0;$i<$max;$i++){
					$pid=$_SESSION['cart'][$i]['productid'];
					$q=$_SESSION['cart'][$i]['qty'];
					$pname=get_product_name($pid);
					$d->reset();
					$d->query("select id_list from #_product where id='".$pid."'");
					$list = $d->fetch_array();
					if($q==0) continue;
			?>
            		<tr style="color:#a66428"  height="40px" class="position_<?=$i?>"><td width="10%" align="center"><?=$i+1?></td>
            		<td align="center">
            			<?=$pname?>
            		</td>
            		<td align="center"><img src="<?=_upload_product_l.get_hinh($pid)?>" alt="<?=get_hinh($pid)?>" style="width:100px"></td>
                    <td align="center"><?=number_format(get_price($pid),0, ',', '.')?>&nbsp;VNĐ</td>
                    <td align="center"><input class="bg-v" type="text" name="product<?=$pid?>" value="<?=$q?>" maxlength="3" size="2" style="text-align:center; border:1px solid #F0F0F0" />&nbsp;</td>                    
                    <td align="center"><?=number_format(get_price($pid)*$q,0, ',', '.') ?>&nbsp;VNĐ</td>
                    <td width="10%" align="center"><a class="del-cot" rel="<?=$pid?>" data-vitri="<?=$i?>"><i class="fa fa-shopping-basket basket" ></i></a></td>
            		</tr>
            <?					
				}
			?>
				<tr><td colspan="7" style="background:#a66428; height:20px">
                
                </td></tr>
                <tr height="40px">
                	<td colspan="7" align="left">
                     <input type="button" value="<?=_capnhat?>" onclick="update_cart()" class="button btn-cart">
                     <input type="button" value="<?=_muatiep?>" onclick="window.location='san-pham.html'" class="button btn-cart">
                     
                    </td>
                </tr>
			<?
            }
			else{
				echo "<tr bgColor='#FFFFFF'><td>Không có sản phẩm nào trong giỏ hàng!</td>";
			}
		?>
        </table>	
        </div>		
  		</form>
 	</div>
		</div>
		<div class="col-md-4 col-sm-12 col-xs-12 new-action-cart">
					<h3>
						<?=_thongtindonhang?>
					</h3>
					<div id="under-table" class="new-under">
						<div id="order-infor" class="">
							<h4><?=_tongcong?>: <span style="color:#a66428"> <b class="tonggia"><?=number_format(get_order_total(),0, ',', '.')?>đ</b></span></h4>
							<div class="clearfix"></div>
						</div><!-- #order-infor-->
						<div class="">
							<input type="button" value="<?=_thanhtoan?>" onclick="window.location='http://<?=$config_url?>/thanh-toan.html'" class="button btn-cart">
						</div>
						<div class="clearfix"></div>
					</div><!-- #under-table -->
					
				</div>
	
	
 	<?php }else {
		echo 'No result';
	}?>
		</div>

<script type="text/javascript">
	$(".del-cot").click(function(){
			var id_pr = $(this).attr('rel');
			var vitri = $(this).data('vitri');
			$(".position_"+vitri).fadeOut();
			$.ajax({
			  	type: "POST",
	           	url: "ajax/del_cart.php",
	          	data: {id_pr:id_pr},
	          	dataType:'json',
	           	success:function(data){
	                $('.tonggia').html(data.tonggia);
             	}
			})
			
		})
</script>    