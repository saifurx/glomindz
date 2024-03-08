<div class="container">
	<div class="row-fluid">
		<div class="span12">
			<div id="map_canvas" style="height: 500px">
				
			</div>
		</div>
	</div>

</div>
<script
	type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
<!--

//-->

var center_guwahati =  new google.maps.LatLng(26.115345,91.632787);
google.maps.event.addDomListener(window, 'load', initialize);
function initialize() {
    
    var myOptions = {
      zoom: 7,
      center: center_all_district,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      zoomControlOptions: {
          style: google.maps.ZoomControlStyle.SMALL
       },
    };

    map = new google.maps.Map(document.getElementById('map_canvas'),myOptions);
	
    var style = [
                 {
                   featureType: 'all',
                   elementType: 'all',
                   stylers: [
                     { saturation: -90 }
                   ]
                 },
                 {
                   featureType: 'road.highway',
                   elementType: 'all',
                   stylers: [
                     { visibility: 'off' }
                   ]
                 },
                 {
                   featureType: 'road.arterial',
                   elementType: 'all',
                   stylers: [
                     { visibility: 'off' }
                   ]
                 },
                 {
                   featureType: 'road.local',
                   elementType: 'all',
                   stylers: [
                     { visibility: 'off' }
                   ]
                 },
                 {
                   featureType: 'administrative.country',
                   elementType: 'all',
                   stylers: [
                     { visibility: 'off' }
                   ]
                 },
                 {
                   featureType: 'administrative.province',
                   elementType: 'all',
                   stylers: [
                     { visibility: 'off' }
                   ]
                 },
                 {
                   featureType: 'administrative.locality',
                   elementType: 'all',
                   stylers: [
                     { visibility: 'off' }
                   ]
                 },
                 {
                   featureType: 'administrative.neighborhood',
                   elementType: 'all',
                   stylers: [
                     { visibility: 'off' }
                   ]
                 },
                 {
                   featureType: 'poi',
                   elementType: 'all',
                   stylers: [
                     { visibility: 'off' }
                   ]
                 },
                 {
                   featureType: 'transit',
                   elementType: 'all',
                   stylers: [
                     { visibility: 'off' }
                   ]
                 }
               ];
               var styledMapType = new google.maps.StyledMapType(style, {
                 map: map,
                 name: 'styledMap'
               });
	             
               map.mapTypes.set('map-style', styledMapType);
               map.setMapTypeId('map-style');

                var marker = new google.maps.Marker({
            	   	  position: center_guwahati,
            	      map: map,
            	      title:"Capital Guwahati"
            	 });
    			

             
  }
</script>