<div class="container">
	
	<div class="row-fluid">
		<div class="span4">
			<h4 class="dash_h3 alert alert-error">Crime Alerts</h4>
			<div class="well2" id="crime_alerts">
				<div class="notification-box" id="vehicle_theft"></div>
			</div>

		</div>
		<div class="span4">
			<h4 class="dash_h3 alert alert-info">Arrested Criminals</h4>
			<div class="well2">
				<div class="notification-box" id="wanted"></div>
			</div>
		</div>
		<div class="span4">
			<h4 class="dash_h3 alert">Watch List Alerts</h4>
			<div class="well2" id="watch_list_alert"></div>
		</div>
	</div>
</div>
<script type="text/javascript">
window.onload = function() {
	$('#dashboard_police_li').addClass('active');
	
	//get_vehicle_theft_alert_initial();
	//get_watchlist_alerts();
	//get_criminal_data();	
};

var myVar=setInterval(function(){
	//get_vehicle_theft_alert();
},15000);

function get_vehicle_theft_alert(){	
	$.ajax({
		url: '<?php echo URL;?>crime_service/get_vehicle_theft_alert/'+last_vt_id,
		type: 'POST',
		dataType: 'JSON',
		success: function(data) {
			for (var i in data){
				$("#vehicle_theft").prepend('<div class="row-fluid"><div class="span7"><p><strong>Vehicle Stolen</strong></p></div><div class="span5">'+data[i].theft_time+'<small class="pull-right"></small></div></div><div class="row-fluid"><div class="span9"><p><a href="#" class="large-font">'+data[i].rc_no+'</a></br> <strong>Model:</strong>'+data[i].vehicle_type+' <strong><br>Color:</strong> '+data[i].color+'</br> <strong>Location:</strong><a href="#">'+data[i].theft_location+'</a></p></div></div><hr>');
				//console.log(parseInt(data[i].id));
				if(last_vt_id < parseInt(data[i].id)){
					last_vt_id=parseInt(data[i].id);
			    }
		  	}
		 }			
	});
}

var last_vt_id=0;
function get_vehicle_theft_alert_initial(){	
	$.ajax({
		url: '<?php echo URL;?>crime_service/get_vehicle_theft_alert/'+last_vt_id,
		type: 'POST',
		dataType: 'JSON',
		success: function(data) {
			for (var i in data){
				
				$("#vehicle_theft").prepend('<div class="row-fluid"><div class="span7"><p><strong>Vehicle Stolen</strong></p></div><div class="span5">'+data[i].theft_time+'<small class="pull-right"></small></div></div><div class="row-fluid"><div class="span9"><p><a href="#" class="large-font">'+data[i].rc_no+'</a></br> <strong>Model:</strong>'+data[i].vehicle_type+' <strong>Color:</strong> '+data[i].color+'</br> <strong>Location:</strong><a href="#">'+data[i].theft_location+'</a></p></div></div><hr>');
				//console.log(parseInt(data[i].id));
				if(last_vt_id < parseInt(data[i].id)){
					last_vt_id=parseInt(data[i].id);
			    }
		  }
		}			
	});
  }

jQuery(document).ready(function($){
	var timeID=0;
	if($("div.text > p").length>0){
		$("div.text > p").css("display","none");
		$("div.text > p:last").fadeIn(3000).css("display","block").addClass("nowShowing");
		timeID=setInterval('textRotate()',3000);
	}
	
});

function textRotate(){
	$("div.text > p.nowShowing:first").slideUp("3000").removeClass("nowShowing");
}
function get_watchlist_alerts(){	
		$.ajax({
			url: '<?php echo URL;?>crime_service/get_watchlist_alerts/',
			type: 'POST',
			dataType: 'JSON',
			beforeSend: function() {$('#watch_list_alert').empty();},
			success: function(data) {
				for (var i in data){
					$('#watch_list_alert').append('<div class="notification-box"><div class="row-fluid"><div class="span8"><p><strong>Mobile number match found for </p></strong> <div class="large-font"><a href=<?php echo URL;?>police/guest_details/'+data[i].id+'>'+data[i].watchlist+'</a></div> <strong>wanted for '+data[i].wanted_for+'</strong> at </br><strong>'+data[i].hotel+', '+data[i].loc+', Guwahati</strong></div></div></div>');
				}
			}			
		});
}


function get_criminal_data(){
	$.ajax({
		url: '<?php echo URL;?>crime_service/get_criminal_data/',
		type: 'POST',
		dataType: 'JSON',
		beforeSend: function() {$('#wanted').empty();},
		success: function(data) {
			//console.log(data);
			for (var i in data){
				$('#wanted').append('<div class="row-fluid" style="padding-bottom: 10px;">'
				+'<img src="http://placehold.it/100x100" class="span3 img-rounded">'
				+'<div class="span8"><h4>'+data[i].name+'</h4><strong>Crime Type: </strong>'+data[i].crime_type+'<br>'
				+'<strong>Case Reference No: </strong>'+data[i].case_ref_no+'<br>'
				+'<strong>Date of Arrest: </strong>'+data[i].date_of_arrest+'<br></div></div>');
			}
		}			
	});
	
}
</script>
