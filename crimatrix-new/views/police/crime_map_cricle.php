<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<div id="map" style="height: 600px"></div>
		</div>
	</div>
</div>
<script
	type="text/javascript"
	src="http://gmaps-utility-gis.googlecode.com/svn/trunk/fusiontips/src/fusiontips_compiled.js"></script>
<script
	type="text/javascript"
	src="http://maps.googleapis.com/maps/api/js?libraries=geometry,places,visualization&sensor=true"></script>
<script
	type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
vt_archive = [];
vt_sms = [];
window.onload = function() {
	$('#crime').addClass('active');
	get_vehcile_theft_archive();
	//get_vehcile_theft_from_sms();
};



function get_vehcile_theft_archive(){
	$.ajax({
		url: '<?php echo URL;?>police_vehicletheft/get_vehcile_theft_archive_count/',
		type: 'POST',
		dataType: 'json',
		success: function(data) {
			
			for (var i in data){
			
            	    var crime_cricle = {
            	      strokeColor: "#ff0000",
            	      strokeOpacity: 0.1,
            	      strokeWeight: 0.2,
            	      fillColor: "#ff0000",
            	      fillOpacity: 0.1,
            	      map: map,
            	      center: new google.maps.LatLng(data[i].latitude, data[i].longitude),
            	      radius: 600
            	    };
            	    cityCircle = new google.maps.Circle(crime_cricle);
            	  }
		}	
	});

}
function get_vehcile_theft_from_sms(){
	 var image = '<?php echo URL;?>assets/apps/img/motor-vehicle-theft.png';
	$.ajax({
		url: '<?php echo URL;?>police_vehicletheft/get_vehcile_theft_from_sms/',
		type: 'POST',
		dataType: 'json',
		success: function(data) {
			
			for (var i in data) {
				var title=data[i].gps_loc+' '+data[i].rc_no+' '+data[i].color+' '+data[i].vehicle_type;
			      var marker = new google.maps.Marker({
            		   	  position: new google.maps.LatLng(data[i].latitude, data[i].longitude),
            		      map: map,
            		      title:title,
            		      icon: image,
            		      optimized:false    
            		 });
            	  }
		}	
	});

}
var center_guwahati =  new google.maps.LatLng(26.171523,91.756096);
var map;
google.maps.event.addDomListener(window, 'load', initialize);


function initialize() {
    var myOptions = {
      zoom: 13,
      center: center_guwahati,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      zoomControlOptions: {
          style: google.maps.ZoomControlStyle.SMALL
       },
    };
   
  map = new google.maps.Map(document.getElementById('map'),myOptions);

   var style = [
                {
                  "stylers": [
                    { "saturation": -100 },
                    { "gamma": 0.77 }
                  ]
                }
              
               ];
               var styledMapType = new google.maps.StyledMapType(style, {
                 map: map,
                 name: 'stylers'
               });    
               map.mapTypes.set('map-style', styledMapType);
               map.setMapTypeId('map-style');

               

}


</script>
