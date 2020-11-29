<div class="bg-tieude"><h4 style="color:#fe0002"><?= _tinnhanh ?></h4></div>
                        <?php
                        for($i=0,$count=count($tintuc);$i<$count;$i++)
                        {					
                        ?>
                            <div class="tintuc"><a href="tin-nhanh/<?=$tintuc[$i]['tenkhongdau']?>-<?=$tintuc[$i]['id']?>.html"><?= catchuoi($tintuc[$i]['ten_'.$lang],100) ?></a></div>
<div style="margin-right:10px"><?= catchuoi($tintuc[$i]['mota_'.$lang],400) ?></div>
                            
                        <?php
                        }
                        ?>       	
               