      
<div class="bg-tieudesanpham" style="background-repeat:no-repeat"><h4><?= _bando ?></h4></div>
<div class="product-all">         
            	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
		   <script type="text/javascript">
		   var map;
		   var infowindow;
		   var marker= new Array();
		   var old_id= 0;
		   var infoWindowArray= new Array();
		   var infowindow_array= new Array();function initialize(){
			   var defaultLatLng = new google.maps.LatLng(<?=$row_setting['toado']?>);
			   var myOptions= {
				   zoom: 16,
				   center: defaultLatLng,
				   scrollwheel : false,
				   mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);map.setCenter(defaultLatLng);			    
			   var arrLatLng = new google.maps.LatLng(<?=$row_setting['toado']?>);
			   infoWindowArray[7895] = '<div class="map_description"><div class="map_title"><?=$row_setting['ten_'.$lang]?></div><div>Địa chỉ: <?=$row_setting['diachi_'.$lang]?></div><div>Điện thoại: <?=$row_setting['dienthoai']?></div><div>Email: <?=$row_setting['email']?></div><div>Website: <?=$row_setting['website']?></div></div>';
			   loadMarker(arrLatLng, infoWindowArray[7895], 7895);
			   
			   moveToMaker(7895);}function loadMarker(myLocation, myInfoWindow, id){marker[id] = new google.maps.Marker({position: myLocation, map: map, visible:true});
			   var popup = myInfoWindow;infowindow_array[id] = new google.maps.InfoWindow({ content: popup});google.maps.event.addListener(marker[id], 'mouseover', function() {if (id == old_id) return;if (old_id > 0) infowindow_array[old_id].close();infowindow_array[id].open(map, marker[id]);old_id = id;});google.maps.event.addListener(infowindow_array[id], 'closeclick', function() {old_id = 0;});}function moveToMaker(id){var location = marker[id].position;map.setCenter(location);if (old_id > 0) infowindow_array[old_id].close();infowindow_array[id].open(map, marker[id]);old_id = id;}</script>
           <div id="map_canvas"></div>
           <div class="clear"></div>           
</div>
