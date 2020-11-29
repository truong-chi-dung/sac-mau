

        
<div class="bg-tieudesanpham"><h4>CATALOQUE</h4><div class="addthis_native_toolbox" style="margin:-25px 30px; float:right"></div></div>
<div id="product-detail">
		<?php
	$d->reset();
	$sql_cataloque = "select ten,photo,link from #_cataloque order by stt,id desc";
	$d->query($sql_cataloque);
	$result_cataloque=$d->result_array();
	
?>

<section>
	    <div id="mybook">
        <?php
		for($i=0,$count=count($result_cataloque);$i<$count;$i++)
		{					
		?>
	        <div>
	            
                <a href="<?=_upload_hinhanh_l.$result_cataloque[$i]['photo']?>" class="MagicThumb" rel="selectors-effect-speed: 600;"><img src="<?=_upload_hinhanh_l.$result_cataloque[$i]['photo']?>" width="280px" height="374px"/></a>
	        </div>
	    <?php
		}
		?>
        	<div>
	            <img src="images/theend.png" width="280px" height="374px"/>
	        </div>
	    </div>
	</section>

</div>
