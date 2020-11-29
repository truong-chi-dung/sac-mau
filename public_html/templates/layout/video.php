
<?php if(!defined('_source')) die("Error");

	$d->reset();
	$sql_video = "select ten,photo,video,id from #_video order by id desc";
	$d->query($sql_video);
	$row_video = $d->result_array();

?>
<script type="text/javascript" src="js/swfobject.js"></script>

<embed type="application/x-shockwave-flash" src="images/player.swf" width="220px" height="191px" style="undefined" id="ply" name="ply" bgcolor="#000000" quality="best" allowfullscreen="true" allowscriptaccess="always" wmode="transparent" flashvars="file=http://<?=$config_url?>/<?=_upload_video_l.$row_video[0]['video']?>&amp;screencolor=#000000&amp;autostart=false&amp;image=<?=_upload_hinhanh_l.$row_video[0]['photo']?>">




