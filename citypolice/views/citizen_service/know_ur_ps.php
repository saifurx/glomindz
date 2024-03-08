<style type="text/css">
    #map-canvas { 
        height: 450px; 
        width: 100%;
    }
    footer {
		margin-top: 0px;
	}
</style>

<div class="">
    <div class="subNav">
        <span class="subNavtext">KNOW YOUR POLICE STATION</span>&nbsp;&nbsp; <small style="color: #fff;">( Scroll to Zoom in and click at your location )</small>
    </div>
    <div class="container" style=" height: auto;">
        <div class="row">
            <div class="col-md-12">
                <div id="map-canvas" style=""></div>
                
                <div class="mapInfobox">
					<div id="content-window">
						
					</div>
	        	</div>
        	</div>
    	</div>
	</div>
</div>
<script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript"
        src="http://maps.googleapis.com/maps/api/js?libraries=geometry,places,visualization&sensor=true">
</script>
<script type="text/javascript" src="http://www.google.com/jsapi"></script>

<script type="text/javascript">
window.onload = function() {
	$('#citizen_service_nav').addClass('active');
};

var map, ps_layer, ps_points_layer;
var styles = new Array();

var gcp_division ="1nmLVIKCyDRR8JzkILzJXHRmgS8_fJVfRvSSXwR0";
var gcp_ps = '1TdM-bk3iHfaNYuVFd6gjVaef6yOdtD3qUZuOe8U';
var gcp_ps_points = '1Hi6rQxPO7DuBDSyfOLUwXYafTk4htyVq_9ftQlI';


function initialize() {

  var myLatlng = new google.maps.LatLng(26.16545,91.84175);

  map = new google.maps.Map(document.getElementById('map-canvas'), {
    center: myLatlng,
    zoom: 11,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });

  ps_layer = new google.maps.FusionTablesLayer({
    query: {
      select: 'geometry',
      from: gcp_ps
    },
    suppressInfoWindows: true,
    styles: [{
        polygonOptions: {
            fillColor: "#1f9d29",
            strokeColor: "#cc0000",
            strokeOpacity: 0.06,
            strokeWeight: 0.08,
            fillOpacity: 0.02,
        }
      }]
  });

  ps_points_layer = new google.maps.FusionTablesLayer({
      query: {
          select: 'name',
          from: gcp_ps_points
        },
        suppressInfoWindows: true
  });
  
  ps_layer.setMap(map);
  ps_points_layer.setMap(map);

  google.maps.event.addListener(ps_layer,'click', function(e) {
	  showInContentWindow(e.row['name'].value);
	  styleLayer(e.row['ps_id'].value);
  });

  function showInContentWindow(text) {
	 var sidediv = document.getElementById('content-window');

	var html = '<h4>'+text+'</h4>';
	sidediv.innerHTML = html;
  }
  
  function styleLayer(ps_id) {
	  styles.push({
          where: "ps_id = "+ps_id+"",
          polygonOptions: {
              fillColor: "#1f9d29",
              strokeColor: "#cc0000",
              strokeOpacity: 0.6,
              strokeWeight: 0.8,
              fillOpacity: 0.2,
          }
      });
	  ps_layer.set('styles', styles);
  }
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>
