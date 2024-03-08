<style>
	.media, .media .media {
		margin-top: 15px;
		background: #fff;
	}
	.list-group-item.active,
	.list-group-item.active:hover,
	.list-group-item.active:focus {
	  z-index: 0;
	}
	.hInfo{
		background: #fff;
		padding-top: 10px;
		margin-top: -30px;
		padding-bottom: 10px;
		color: #000;
	}
	.card{
		padding: 5px;
		border: 1px solid #E4DFDF;
	}
	.col-md-6 {
		width: 49.2%;
		margin: 2px;
	}
</style>

<div id="wrap">	
	<div class="container">
		<div class="row">
			<div class="col-md-3" style="background: antiquewhite ;padding-top: 20px;margin-top: -20px; min-height: 600px;">
				<div class="row">
					<div class="col-md-12">
						<input class="form-control input-sm" type="text" id="datepicker_guest_list" onchange="changeDate(this.value);">
						<br>
						<select class="selectPs form-control input-sm" id="ps_id" onchange="changePS(this.value);"></select>
						<br>
					</div>	
					<div class="col-md-12">
						<ul class="list-group" id="hotel_list_ul">
							<!--  
							  <li class="list-group-item">Cras justo odio</li>
							  <li class="list-group-item">Dapibus ac facilisis in</li>
							-->  
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row hInfo">
					<div class="col-md-12" id="hotel_info">
						<h3 style="text-align: center;">Hotel Details & Guestlist</h3>
					</div>
				</div>
				<div class="row" id="hotel_guestList">
					
				</div>	
			</div>
			<div class="col-md-3" style="border-left: 1px solid #bcbcbc;background: #fff;padding-top: 20px; min-height: 600px; margin-top: -20px; padding-bottom: 20px;">
		        <div class="row">
		        <div class="col-md-12">
		        	<p>Send Email Message to Hotels</p>
		        	<button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#msgModal">Send Message</button>
		        </div>
		        <br><br>
		        </div>
		        <div class="row">
			        <div class="col-md-12" style="margin-bottom: 10px;">
				        <div class="input-group">
				            <input type="text" class="form-control" placeholder="Search" id="searchGuest">
				            <span class="input-group-btn">
				              <button class="btn btn-default" type="button" onclick="searchGuest();">Go!</button>
				            </span>
				        </div>
				    </div>    
				    <div class="col-md-12" id="searchResults">    
				    </div>
		        </div>
			</div>
		</div>
	</div>
</div>		

<!-- Msg Modal -->

<div class="modal fade" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Send Message</h4>
      </div>
      <div class="modal-body">
        <form role="form">
		  <div class="form-group">
		    <label>Message</label>
		    <textarea class="form-control" rows="4" cols="" id="msg" name="msg"></textarea>
		  </div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="sendMsg();">Send</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Guest Detail Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body row" id="detailModalBody">
        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
	var d = new Date();
	var month = d.getMonth()+1;
	var day = d.getDate();
	var today =  d.getFullYear() + '-' +((''+month).length<2 ? '0' : '') + month + '-' + ((''+day).length<2 ? '0' : '') + day;
	var alert_email_not_sub ='';
	var alert_email_sub ='';
	var alert_email_all ='';
	$('#hotels_n_lodges_li').addClass('active');
	window.onload = function() {
		getAllHotelUser(0);
		$("#datepicker_guest_list").val(today);
		$("#datepicker_guest_list").datepicker({
			dateFormat: 'yy-mm-dd'
		});	
		get_policeStations();
	};

	$('#hotel_list_ul,#searchResults,#hotel_guestList').slimscroll({
		  height: '450px'
	});

	
	function get_policeStations(){
		$.ajax({
			url: '<?php echo URL;?>user_service/get_policeStations/',
			type: 'GET',
			dataType: 'JSON',
			success: function(data){
				for(var i in data){
					$('.selectPs').append('<option value='+data[i].id+'>'+data[i].name+'</option>')
				}
			}		
		});
	}

	var notsubmited_hotels = new Array();
	function getAllHotelUser(ps_id){
		$.ajax({
			url: '<?php echo URL;?>police_service/getAllHotelUser/',
			type: 'POST',
			dataType: 'JSON',
			data: {ps_id:ps_id},
			success: function(data){
				notsubmited_hotels=[];
				notsubmited_hotels = data;
				$('#hotel_list_ul').empty();
				var count = 1;
				for(var i in data){
					$('#hotel_list_ul').append('<li class="list-group-item" onclick="showHotelData('+data[i].id+')">'+data[i].name+'</li><span>');
				}
			}		
		});
	}

	var current_hotel_user_id = 0;
	function showHotelData(data){
		//console.log(notsubmited_hotels);
		for(var i = 0; i < notsubmited_hotels.length; i++){
		  if(notsubmited_hotels[i].id == data){
			  //console.log(notsubmited_hotels[i].name);
			  $('#hotel_info').empty();
			  var content = '<h4 class="col-md-12">'+notsubmited_hotels[i].name+'</h4>'
					+'<span class="col-md-6"><strong>Contact Person:</strong> '+notsubmited_hotels[i].contact_person+'</span>'
					+'<span class="col-md-6"><strong>Email:</strong> '+notsubmited_hotels[i].email+'</span>'
					+'<span class="col-md-6"><strong>Mobile:</strong> '+notsubmited_hotels[i].mobile+'</span>'
					+'<span class="col-md-6"><strong>No&#39;s of Room:</strong> '+notsubmited_hotels[i].no_of_rooms+'</span>'
					+'<span class="col-md-6"><strong>Licence No:</strong> '+notsubmited_hotels[i].licence_no+'</span>'
					+'<span class="col-md-6"><strong>Police station:</strong> '+notsubmited_hotels[i].ps_name+'</span>';
			  $('#hotel_info').append(content);

			  var date = $("#datepicker_guest_list").val();
			  getGuestList(notsubmited_hotels[i].id,date);
			  current_hotel_user_id = notsubmited_hotels[i].id;
		  }
		}
	}

	$("#hotel_list_ul").on("click", "li", function() {
		$(this).addClass("active").siblings().removeClass("active");
	});

	$('.front-toggle').click(function(e) {
		e.preventDefault();
		$('.flip-box').addClass('flipped');
	});
	$('.back-toggle').click(function(e) {
		e.preventDefault();
		$('.flip-box').removeClass('flipped');
	});
		
	function getGuestList(user_id,date){
		$('#hotel_guestList').empty();
		$('#hotel_guestList').css('border', 0).append('<div class="col-md-12"><p style="text-align: center;"><i class="fa fa-spinner fa-spin"></i></p></div>')
		$.ajax({
			url: '<?php echo URL;?>police_service/show_guest_list/',
			dataType: 'JSON',
			type: 'POST',
			data: {user_id:user_id,date:date},
			success: function(resp){
				$('#hotel_guestList').empty();
				if(resp.length == 0){
					$('#hotel_guestList').css('border', 0).append('<div class="col-md-12"><p class="text-danger">No Record Found</p></div>')
				}
				for(var i in resp){
					
					var content= '<div class="col-md-6 card">'
						+'<div class="col-md-4" style="padding-left: 5px;">'
						+'<img onclick="openModal('+resp[i].id+');" style="width:80px; height: 80px; cursor: pointer;" src='+resp[i].image_url+'>'
						+'</div>'
						+'<div class="col-md-8">'
						+'<strong>'+resp[i].name+'</strong> <small>('+resp[i].age+')</small><br>'
						+'<lable>'+resp[i].comming_from+'<lable> <span class="glyphicon glyphicon-arrow-right"></span> '
						+'<lable>'+resp[i].going_to+'<lable><br>'
						+'<lable>'+readable_format_date_without_time(resp[i].date_arrival)+'<lable>'
						+'</div></div>';
						$('#hotel_guestList').prepend(content);
				}
			}			
		});
	}

	function openModal(id){
		$('#detailModal').modal('show');
		$.ajax({
			type: 'POST',
			url: '<?php echo URL;?>police_service/hotel_guset_details/',
			dataType: 'JSON',
			data: {id:id},
			success: function(resp){
				for(var i in resp){
				var details ='<div class="col-md-12"><img src="'+resp[i].image_url+'" alt="" style="width: 100%;max-height: 350px;" class="img-rounded"></div>'
					+'<div class="col-md-12"><br>'
					+'<table class="table table-condensed">'
					+'<tr><td>Name:</td><td>'+resp[i].name+'</td></tr>'
					+'<tr><td>Mobile:</td><td>'+resp[i].mobile+'</td></tr>'
					+'<tr><td>Check-in:</td><td>'+readable_format_date_without_time(resp[i].date_arrival)+' ('+resp[i].check_in_time+')</td></tr>'
					+'<tr><td>Comming From:</td><td>'+resp[i].comming_from+'</td></tr>'
					+'<tr><td>Going To:</td><td>'+resp[i].going_to+'</td></tr>'
					+'<tr><td>Id Type:</td><td>'+resp[i].id_type+'</td></tr>'
					+'<tr><td>Id No:</td><td>'+resp[i].id_no+'</td></tr>'
					+'</table>'
					+'</div>';
				$('#detailModalBody').html(details);
				$('#detailModal').modal('show');
				}
			}
		});
	}

	function changePS(ps_id){
		getAllHotelUser(ps_id);
	}

	function changeDate(date){
		getGuestList(current_hotel_user_id,date);
	}

	function searchGuest(){
		var search = $('#searchGuest').val();
		var validsearch = alphanumericValidate(search);
		if(validsearch == false){
			alert('Invalid Search');
		}
		if(validsearch == true){
			$('#searchResults').html('<p style="text-align: center;"><i class="fa fa-spinner fa-spin"></i></p>')
			$.ajax({
				url: '<?php echo URL;?>police_service/search_guest/',
				type: 'POST',
				dataType: 'JSON',
				data: {search:search},
				success: function(data){
					$('#searchResults').empty();
					for(var i in data){
						var res = ' <div class="media">'
					        	  +'<a class="pull-left">'
					        	  +'<img class="media-object" style="width: 84px; height: 84px;" src='+data[i].image_url+'>'
					        	  +'</a>'
					        	  +'<div class="media-body">'
					        	  +'<span>'+data[i].name+' ('+data[i].sex+'/'+data[i].age+')</span><br>'
					        	  +'<span>'+data[i].comming_from+' <span class="glyphicon glyphicon-arrow-right"></span> '+data[i].going_to+'</span><br>'
					        	  +'<span>'+data[i].mobile+'</span><br>'
					        	  +'<span>'+readable_format_date_without_time(data[i].date_arrival)+'</span><br>'
					        	  +'</div>'
					        	  +'</div>';
						$('#searchResults').append(res);
					}	
				}		
			});
		}
	}

	function readable_format_date_without_time(date){
		//date formate has to be in yyyy-mm-dd
		var n=date.split("-");
		var month='';
		if(n[1] == '01'){month= "Jan";}
		else if(n[1] == '02'){month= "Feb";}
		else if(n[1] == '03'){month= "Mar";}
		else if(n[1] == '04'){month= "Apr";}
		else if(n[1] == '05'){month= "May";}
		else if(n[1] == '06'){month= "Jun";}		
		else if(n[1] == '07'){month= "Jul";}
		else if(n[1] == '08'){month= "Aug";}
		else if(n[1] == '09'){month= "Sep";}
		else if(n[1] == '10'){month= "Oct";}
		else if(n[1] == '11'){month= "Nov";}
		else if(n[1] == '12'){month= "Dec";}
		var d=n[2]+' '+month+', '+n[0]; 
		return d;
	}

	function sendMsg(){
		var msg = $('#msg').val();
		var validMsg = alphanumericValidate(msg);
		if(validMsg == true){
			$.ajax({
				url: '<?php echo URL;?>police_service/sendMsg/',
				type: 'POST',
				dataType: 'JSON',
				data: {msg: msg},
				success: function(data){
					for(var i in data){
						
					}
				}		
			});
		}
	}
	
</script>	