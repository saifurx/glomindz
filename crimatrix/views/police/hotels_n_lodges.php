<style type="text/css">
p {
	margin: 0px;
}

hr {
	margin: 10px 0px 10px 0px;
}

h3 {
	margin-top: 0px;
	line-height: 24px;
}

h4 {
	margin: 5px 10px 5px 0;
}

h5 {
	margin-top: 0px;
}

</style>

<div class="container">
	<div class="row-fluid">
		<div class="span8">

			<h4 class="pull-left">Police Station</h4>
			<select name="location" id="location">
				<option value="0">All station</option>
			</select> 
			<strong>&nbsp; Guest List &nbsp;</strong> 
			<select	class="input-medium" name="guest_list_sub" id="guest_list_sub">
				<option value="0">not submitted</option>
				<option value="1" selected="selected">submitted</option>
			</select> 
			<strong>&nbsp; on &nbsp;<input class="input-small" type="text" id="datepicker_guest_list" title="Date"/></strong> 
			<a href="#alertModal" id="alert_hotels" role="button" class="btn btn-danger btn-small pull-right" data-toggle="modal">Send Message</a>
			<hr>

			<table class="table table-condensed">
				<thead id="hotel_list_thead">

				</thead>
				<tbody id="hotel_list_tbody">

				</tbody>
			</table>
		</div>
		<div class="span4">
			<h4 class="pull-left">Guestlist</h4>
			<input class="input-medium" type="text"	placeholder="Name or mobile no." id="search">
			<button onclick="guestlist_search_result();" class="btn" type="button" id="search_btn">Search</button>
                      <div id="search_list" class="">
				<div class="alert">
					<p>
						To Search Guest by name or mobile no. type above and click the <strong>Search</strong>
						button
					</p>
				</div>
			</div>
		</div>
	</div>
	<!--/row-->
</div>
<!--/.fluid-container-->

<div id="alertModal" class="modal hide fade" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal"
			aria-hidden="true">&times;</button>
		<h4>Send Message</h4>
	</div>
	<div class="modal-body">
		<div class="form-horizontal">
			<div class="control-group">
				<label class="control-label" for="message">Send To</label>
				<div class="controls">
					<select id="send_to">
						<option selected="selected" value="1">Defaulter Hotels</option>
						<option value="2">Submitted Hotels</option>
						<option value="3">All Hotels</option>
					</select>

				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="message">Message</label>
				<div class="controls">
					<textarea rows="4" cols="" id="message" placeholder="Message"
						name="message"></textarea>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn" data-dismiss="modal"
			aria-hidden="true">Cancel</button>
		<button type="button" class="btn btn-primary" onclick="send_alert();">Send</button>
	</div>
</div>


<div id="main_img_modal" class="modal hide fade" tabindex="-1" role="dialog">
 
</div>


<script type="text/javascript">
var d = new Date();
var month = d.getMonth()+1;
var day = d.getDate();
var today =  d.getFullYear() + '-' +((''+month).length<2 ? '0' : '') + month + '-' + ((''+day).length<2 ? '0' : '') + day;
var alert_email_not_sub ='';
var alert_email_sub ='';
var alert_email_all ='';

var all_hotel_no = 0;
var count_not_submitted = 0;
var count_submitted = 0;
var date = today;

window.onload = function() {
	$('#hotels_li').addClass('active');
	get_all_ps();
	$("#datepicker_guest_list").val(today);
	get_submited_hotels_by_date(today);
	
	$("#datepicker_guest_list").datepicker({
		dateFormat: 'yy-mm-dd',
	   
	});		
};

$("#hotel_list_tbody").on("click", "tr", function() {
	$(this).addClass("alert").siblings().removeClass("alert");
});

$('#location').change(function() {
	date = $('#datepicker_guest_list').val();
	if(date== ''){
		$('#datepicker_guest_list').val(today);
	}
	var guest_list_sub =$('#guest_list_sub').val();
	if(guest_list_sub ==0){
		get_not_submited_hotels_by_date(date);
	}
	else if(guest_list_sub == 1){
		get_submited_hotels_by_date(date);
	}
});

$('#datepicker_guest_list').change(function() {
	date = $('#datepicker_guest_list').val();
	if(date== ''){
		$('#datepicker_guest_list').val(today);
	}
	var guest_list_sub =$('#guest_list_sub').val();
	if(guest_list_sub ==0){
		get_not_submited_hotels_by_date(date);
	}
	else if(guest_list_sub == 1){
		get_submited_hotels_by_date(date);
	}
});



$("#guest_list_sub").change(function() {
	var guest_list_sub =$('#guest_list_sub').val();
	date = $('#datepicker_guest_list').val();
	if(guest_list_sub ==0){
		get_not_submited_hotels_by_date(date);
	}
	else if(guest_list_sub == 1){
		get_submited_hotels_by_date(date);
	}
});

function show_guest_list(hotel_id){
	$.ajax({
		url: '<?php echo URL;?>police_service/show_guest_list/',
		type: 'POST',
		dataType: 'JSON',
		data: {hotel_id:hotel_id,date:date},
		beforeSend: function(){	
			$('#search_list').empty();
			$('#search_list').addClass('guestlist-container');
			$('#search_list').html('<img src="<?php echo URL;?>assets/apps/img/loading.gif" style=" width:16px; height:16px;" class="img-circle"> retrieving guestlist...');
		},
		success: function(data) {
			$('#search_list').empty();
			var n=date.split("-");
			var month='';
			if(n[1] == '01'){month= "January";}
			else if(n[1] == '02'){month= "February";}
			else if(n[1] == '03'){month= "March";}
			else if(n[1] == '04'){month= "April";}
			else if(n[1] == '05'){month= "May";}
			else if(n[1] == '06'){month= "June";}		
			else if(n[1] == '07'){month= "July";}
			else if(n[1] == '08'){month= "August";}
			else if(n[1] == '09'){month= "September";}
			else if(n[1] == '10'){month= "October";}
			else if(n[1] == '11'){month= "November";}
			else if(n[1] == '12'){month= "December";}
			var d=n[2]+' '+month+', '+n[0]; 
			
			if(data.length != 0){
				var hotel_name='';
				for(var i in data){
					hotel_name = data[i].hotel_name; 
					break;
				}
				
				$('#search_list').append('<div class="search-info"><strong>'+hotel_name+' </strong><span class="pull-right">'+d+'</span></div>');	
				for (var i in data){
						$('#search_list').append('<div class="row-fluid">'+	
						'<a href="#" class="pull-left guest-thumb"><img src="'+data[i].image_url+'" alt="" onclick="show_main_img('+data[i].id+')"></a>'+					
						'<div class="guest-info">'+	
							'<p><strong>'+data[i].name+'</strong><span class="pull-right">'+data[i].id_no+' ('+data[i].id_type+')</span> </br>'+data[i].nationality+' / '+data[i].sex+' / '+data[i].age+'<span class="pull-right">'+data[i].vehicle_no+'</span></br>'+
							''+data[i].mobile+'<span class="pull-right">'+
							''+data[i].comming_from+' <i class="icon-arrow-right"></i> '+data[i].going_to+'</span></p>'+
						'</div>'+
					'</div><hr>');
				}
			}
			else{
				$('#search_list').append('<div class="alert alert-error" id="no_result"><button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>No match found</div>');
			}
		 }
	});		
}

function get_not_submited_hotels_by_date(date){
	$('#hotel_list_thead').empty();
	$('#hotel_list_tbody').empty();
	var location = $('#location').val();
	$.ajax({
		url: '<?php echo URL;?>police_service/get_not_submited_hotels_by_date/',
		type: 'POST',
		data: {date:date, location:location},
		dataType: 'JSON',
		beforeSend: function() {
			alert_email = [];
			$('#hotel_list_thead').empty();
			$('#hotel_list_tbody').empty();
			$('#hotel_list_tbody').html('<img src="<?php echo URL;?>assets/apps/img/loading.gif" style=" width:16px; height:16px;" class="img-circle"> loading...');
		},
		success: function(data) {
			$('#hotel_list_tbody').empty();
			if(data.length != 0){
				$('#hotel_list_thead').append('<tr><th>#</th><th>Hotel Name</th><th>Contact Person</th><th>Location</th><th>Contact No</th></tr>');
				var count = 0;
				for (var i in data){
					count = count + 1;
					$('#hotel_list_tbody').append('<tr><td>'+count+'</td><td>'+data[i].name+'</td><td>'+data[i].contact_person+'</td><td>'+data[i].locality+'</td><td>'+data[i].mobile+'</td></tr>');
					alert_email_not_sub=data[i].email+','+alert_email_not_sub;
				}
				count_not_submitted = count;
				//$('#count_nos').html('('+count_not_submitted+'/'+all_hotel_no+')');
			}
			else{
				$('#hotel_list_tbody').append('<div class="alert alert-error" id="no_result"><button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>No result found</div>');
			}
		}			
		
	});
}

function get_submited_hotels_by_date(date){
	$('#hotel_list_thead').empty();
	$('#hotel_list_tbody').empty();
	var location = $('#location').val();
	$.ajax({
		url: '<?php echo URL;?>police_service/get_submited_hotels_by_date/',
		type: 'POST',
		data: {date:date,location:location},
		dataType: 'JSON',
		beforeSend: function() {
			alert_email = [];
			$('#hotel_list_thead').empty();
			$('#hotel_list_tbody').empty();
			$('#hotel_list_tbody').html('<img src="<?php echo URL;?>assets/apps/img/loading.gif" style=" width:16px; height:16px;" class="img-circle"> loading...');
		},
		success: function(data) {
			$('#hotel_list_tbody').empty();
			if(data.length != 0){
				$('#hotel_list_thead').append('<tr><th>#</th><th>Hotel Name</th><th>Contact Person</th><th>Location</th><th>Contact No</th><th class="span2">Action</th></tr>');
				var count = 0;
				for (var i in data){
                                        var print_btn ='<a  class="btn btn-warning btn-mini" href="<?php echo URL;?>police/print_guest_list?hotel_id='+data[i].id+'&guest_list_date='+date+'&hotel_name='+data[i].name+'" target="_blank"><i class="icon-white icon-print"></i>&nbsp;Print</a>';
                                	count = count + 1;
					$('#hotel_list_tbody').append('<tr><td>'+count+'</td><td><a href="#" onclick="show_guest_list('+data[i].id+')">'+data[i].name+'</a></td><td>'+data[i].contact_person+'</td><td>'+data[i].locality+'</td><td>'+data[i].mobile+'</td><td>'+print_btn+'</td></tr>');
					alert_email_sub=data[i].email+','+alert_email_sub;
				}
				count_submitted = count;
				//$('#count_nos').html(count_submitted+'/'+all_hotel_no);
			}
			else{
				$('#hotel_list_tbody').append('<div class="alert alert-error" id="no_result"><button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>No result found</div>');
			}
		}			
		
	});
}

function guestlist_search_result(){	
	var search = 0;
        search = $('#search').val();
	$.ajax({
		url: '<?php echo URL;?>police_service/guestlist_search_result/',
		type: 'POST',
		dataType: 'JSON',
		data: {search:search},
		beforeSend: function(){	
			$('#search_list').empty();
			$('#search_list').addClass('guestlist-container');
			$('#search_list').html('<img src="<?php echo URL;?>assets/apps/img/loading.gif" style=" width:16px; height:16px;" class="img-circle"> searching...');
		},
		success: function(data) {
			$('#search_list').empty();
			if(data.length != 0){
				for (var i in data){
					
					$('#search_list').append('<div class="row-fluid">'+	
							'<div class="search-info"><strong>'+data[i].hotel_name+' </strong><span class="pull-right">'+data[i].guestlist_date+'</span></div>'+
							'<a href="#" class="pull-left guest-thumb"><img src="'+data[i].image_url+'" alt="" onclick="show_main_img('+data[i].id+')"></a>'+					
							'<div class="guest-info">'+	
								'<p><strong>'+data[i].name+'</strong><span class="pull-right">'+data[i].id_no+' ('+data[i].id_type+')</span> </br>'+data[i].nationality+' / '+data[i].sex+' / '+data[i].age+'<span class="pull-right">'+data[i].vehicle_no+'</span></br>'+
								''+data[i].mobile+'<span class="pull-right">'+
								''+data[i].comming_from+' <i class="icon-arrow-right"></i> '+data[i].going_to+'</span></p>'+
							'</div>'+
						'</div>');
				
				
				}
			}
			else{
				$('#search_list').append('<div class="alert alert-error" id="no_result"><button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>No match found</div>');
			}
		 }
	});		
}

$('#alert_hotels').click(function(){
	var text = $('#btn_submit_type').text();
	$('#myModal').modal('show');
});

function send_alert(){
	
	var message = $('#message').val();
	var send_to = $('#send_to').val();
	var to_hotels='';

	
	
	if(message.length > 0){
		
		if(send_to == 1 && alert_email_not_sub.length > 0){
			
			to_hotels='Defaulter Hotels';
			send_alert_email(message,alert_email_not_sub,to_hotels);
			
		}
		else if(send_to == 2 && alert_email_sub.length > 0){
			to_hotels='Submitted Hotels';
			send_alert_email(message,alert_email_sub,to_hotels);
		}
		else if(send_to == 3){
			$.ajax({
				url: '<?php echo URL;?>police_service/get_all_hotels_email/',
				type: 'POST',
				dataType: 'JSON',
				success:function (resp){
					for(var i in resp){
						alert_email_all=resp[i].email+','+alert_email_all;
					}
					to_hotels='All Hotels';
					console.log(alert_email_all);
					send_alert_email(message,alert_email_all,to_hotels);
				}
			});
			
		}
		else{
			alert('Error');
		}
	}
	else{
		alert('Empty Message!');
	}
}

function send_alert_email(message,emails,to_hotels){
	$.ajax({
		url: '<?php echo URL;?>police_service/send_hotel_alert_email/',
		type: 'POST',
		data: {alert:emails, message:message,to_hotels:to_hotels},
		success:function (resp){
			$('#message').val('');
		}
	});
}


function get_all_ps(){
	$.ajax({
		url: '<?php echo URL;?>user_service/get_all_ps/',
		type: 'POST',
		dataType: 'JSON',
		success: function(data) {
			$('#locality').empty();
			for(var i in data){
				//'<li><a id="Guwahati" href="#">Guwahati</a></li>'
				$('#location').append('<option value="'+data[i].id+'">'+data[i].name+'</option>');
			}					
		}		
	});
}

function show_main_img(id){
	var path = '<?php echo URL;?>assets/uploded_img/hotel_guest/'+id+'.jpg';
	$('#main_img_modal').html('<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style=" margin-bottom: -26px;">&times;</button><img class="container" src='+path+'>');
	$('#main_img_modal').modal('show');
}

</script>
