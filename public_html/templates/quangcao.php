<?php
	
	
	$sql_qctrai="select photo,mota from #_qctruot where id=14 and hienthi=1";
	$d->query($sql_qctrai);
	$rows_qctrai=$d->result_array();
	$trai = $rows_qctrai[0]['photo'];	
	
	
	$sql_qcphai="select photo,mota from #_qctruot where id=13  and hienthi=1";
	$d->query($sql_qcphai);
	$rows_qcphai=$d->result_array();
	$phai = $rows_qcphai[0]['photo']
		
	
	
?>
<?php
	$d->reset();
	$sql_quangcaotrai="select * from #_quangcaotrai ";
	$d->query($sql_quangcaotrai);
	$result_quangcaotrai=$d->result_array();
	
	$d->reset();
	$sql_quangcaophai="select * from #_quangcaophai ";
	$d->query($sql_quangcaophai);
	$result_quangcaophai=$d->result_array();
?>
<div id="divAdLeft">
<?php for($i=0,$count=count($result_quangcaotrai);$i<$count;$i++) { ?>
<div><a href="<?php echo $result_quangcaotrai[$i]['mota'] ?>" target="_blank"><img src="<?=_upload_hinhanh_l.$result_quangcaotrai[$i]['photo']?>" onerror="this.src='images/noimage.gif';" width="170px"  /></a></div>
<?php } ?>
</div> 

<div id="divAdRight">
<?php for($i=0,$count=count($result_quangcaotrai);$i<$count;$i++) { ?>
<div><a href="<?php echo $result_quangcaophai['mota'] ?>" target="_blank"><img src="<?=_upload_hinhanh_l.$result_quangcaophai['photo']?>" onerror="this.src='images/noimage.gif';" width="170px"  /></a></div>
<?php } ?>
</div>






	
    <div id="divAdRight" style="DISPLAY: none; POSITION: absolute; TOP: 0px;left:0px;"> 
	<?php if(count($rows_qctrai)>0){?>
    	<a href="<?=$rows_qcphai[0]['mota']?>" target="_blank"><img src="<?=_upload_hinhanh_l.$trai?>" width="140" /></a><br/>	
<?php }?>		
    </div>
	
    
	
    <div id="divAdLeft" style="DISPLAY: none; POSITION: absolute; TOP: 0px;left:10px;">    
	<?php if(count($rows_qcphai)>0){?>
    	<a href="<?=$rows_qctrai[0]['mota']?>" target="_blank"><img src="<?=_upload_hinhanh_l.$phai?>" width="140" /></a><br/>          
   
	<?php }?>
	 </div>
    <script>
        function FloatTopDiv()
        {
            startLX = ((document.body.clientWidth -MainContentW)/2)-LeftBannerW-LeftAdjust , startLY = TopAdjust+80;
            startRX = ((document.body.clientWidth -MainContentW)/2)+MainContentW+RightAdjust , startRY = TopAdjust+80;
            var d = document;
            function ml(id)
            {
                var el=d.getElementById?d.getElementById(id):d.all?d.all[id]:d.layers[id];
                el.sP=function(x,y){this.style.left=x + 'px';this.style.top=y + 'px';};
                el.x = startRX;
                el.y = startRY;
                return el;
            }
            function m2(id)
            {
                var e2=d.getElementById?d.getElementById(id):d.all?d.all[id]:d.layers[id];
                e2.sP=function(x,y){this.style.left=x + 'px';this.style.top=y + 'px';};
                e2.x = startLX;
                e2.y = startLY;
                return e2;
            }
            window.stayTopLeft=function()
            {
                if (document.documentElement && document.documentElement.scrollTop)
                    var pY =  document.documentElement.scrollTop;
                else if (document.body)
                    var pY =  document.body.scrollTop;
                if (document.body.scrollTop > 30){startLY = 3;startRY = 3;} else {startLY = TopAdjust;startRY = TopAdjust;};
                ftlObj.y += (pY+startRY-ftlObj.y)/16;
                ftlObj.sP(ftlObj.x, ftlObj.y);
                ftlObj2.y += (pY+startLY-ftlObj2.y)/16;
                ftlObj2.sP(ftlObj2.x, ftlObj2.y);
                setTimeout("stayTopLeft()", 1);
            }
            ftlObj = ml("divAdRight");
            //stayTopLeft();
            ftlObj2 = m2("divAdLeft");
            stayTopLeft();
        }
        function ShowAdDiv()
        {
            var objAdDivRight = document.getElementById("divAdRight");
            var objAdDivLeft = document.getElementById("divAdLeft");       
            if (document.body.clientWidth < 1000)
            {
                objAdDivRight.style.display = "none";
                objAdDivLeft.style.display = "none";
            }
            else
            {
                objAdDivRight.style.display = "block";
                objAdDivLeft.style.display = "block";
                FloatTopDiv();
            }
        } 
    </script>
    <script>
    document.write("<script type='text/javascript' language='javascript'>MainContentW = 1024;LeftBannerW = 159;RightBannerW = 159;LeftAdjust = -15;RightAdjust = 5;TopAdjust = 40;ShowAdDiv();window.onresize=ShowAdDiv;;<\/script>");
    </script>
