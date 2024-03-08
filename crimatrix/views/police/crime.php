<div class="visible-print">
</div>

<div class="confirm_div"><h3 class="alert alert-success">Successful</h3></div>

<div class="container hidden-print">
	<div class="row-fluid">
		<div class="span2">
			<h4 class="input-large filter_h4"><strong>Crime</strong></h4>	
		</div>
		<div class="span9 offset1">
			<div class="span4">
				<div class="input-append span10">
				  <input class="span12" id="appendedInputButton" type="text" id="search_textbox">
				  <button class="btn" type="button" title="seatch" id="search_btn"><i class="icon-search"></i>Search</button>
				</div>
			</div>
			<div class="span8" id="above_bar">
				<div class="btn-group pull-right">
				  <a href="#add_crime_modal" role="button" data-toggle="modal" class="btn btn-primary" title="Add"><i class="icon-plus icon-white"></i>Add</a>
				  <button class="btn" title="print" onclick="window.print();"><i class="icon-print"></i>Print</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row-fluid">
		<div class="span2 hidden-print">
			<form id="filter_form">	
				<label>Crime Type</label>
				<select id="crime_type_id" name="crime_type_id">
					<option value="0">All</option>
					<option value="1">Vehcile Theft</option>
				</select>
				
				<label>City</label>
				<select id="city_id" name="city_id">
					<option value="0">All</option>
					<option value="1">Guwahati</option>
				</select>
				
				<label>Police Station</label>
				<select id="ps_id" name="ps_id">
					<option value="0">All</option>
				</select>
				<label>From Date</label>
				<input class="input-large" type="text" id="from_date" name="from_date">
				<label>To Date</label>
				<input class="input-large" type="text" id="to_date" name="to_date">
			</form>
			<label></label>
			<input class="btn btn-primary " type="button" id="search_with_filter_btn" value="Search" onclick="get_filter_data();get_crime_data();">
		</div>
		<div class="span9 offset1">
			<table class="table table-bordered table-condensed">
				<thead id="data_table_head"></thead>
				<tbody id="data_table_body">
					
				</tbody>
	         </table> 
	         <hr>
	         <table class="table table-bordered table-condensed">
				<thead id="crime_table_head"></thead>
				<tbody id="crime_table_body">
					
				</tbody>
	         </table>   
		</div>
	</div>
</div>

<div id="edit_crime_modal" class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Edit Crime Details</h3>
  </div>
  <div class="modal-body">
  	<div class="row-fluid">
  		<form class="" id="crime_update_form">
    		<div class="span4">
	    		<input type="hidden" name="id" id="edit_crime_modal_id">
	    		<label>Crime Type</label>
	    		<select name="crime_type_id" id="edit_crime_modal_crime_type_id">
	    			<option value="0">All</option>
	    		</select>
	    		<label>City</label>
	    		<select name="city_id" id="edit_crime_modal_city_id">
	    			<option value="0">All</option>
	    		</select>
	    		<label>Fir No.</label>
	    		<input type="text" name="fir_no" id="edit_crime_modal_fir_no">
	    		<label>Case Reference</label>
	    		<input type="text" name="case_ref" id="edit_crime_modal_case_ref">
				   		
    		</div>
			<div class="span4">
				<label>Police Station</label>
	    		<select name="ps_id" id="edit_crime_modal_ps_id"></select>	 
	    		<label>Vehicle Type</label>
	    		<input type="text" name="vehicle_type" id="edit_crime_modal_vehicle_type">
	    		<label>Color</label>
	    		<input type="text" name="color" id="edit_crime_modal_color">
				<label>Rc No.</label>
	    		<input type="text" name="rc_no" id="edit_crime_modal_rc_no"> 
			</div>
			<div class="span4">
				<label>Theft Location</label>
	    		<input type="text" name="theft_location" id="edit_crime_modal_theft_location">
				<label>Theft Time</label>
	    		<input type="text" name="theft_time" id="edit_crime_modal_theft_time"> 
				<label class="label">Status</label>
					<select name="status" id="edit_crime_modal_status">
						<option value="Theft">Theft</option>
						<option value="Cancel">Cancel</option>
						<option value="Found">Found</option>
					</select>
	    		<label>Date of Occurence</label>
	    		<input type="text" name="date_of_occurence" id="edit_crime_modal_date_of_occurence">
			</div>
		</form>
	</div>
  </div>
  <div class="modal-footer">
    <a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
    <button class="btn btn-primary" id="save_crime_update_form_btn" onclick="save_crime_update_form();">Update</button>
  </div>
</div>

<div id="add_crime_modal" class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Add Crime</h3>
  </div>
  <div class="modal-body">
  	<div class="row-fluid">
  		<form class="" id="crime_add_form">
    		<div class="span4">
	    		<input type="hidden" name="id">
	    		<label>Crime Type</label>
	    		<select name="crime_type_id" >
	    			<option value="0">All</option>
	    		</select>
	    		<label>City</label>
	    		<select name="city_id" >
	    			<option value="0">All</option>
	    		</select>
	    		<label>Fir No.</label>
	    		<input type="text" name="fir_no">
	    		<label>Case Reference</label>
	    		<input type="text" name="case_ref">
				   		
    		</div>
			<div class="span4">
				<label>Police Station</label>
	    		<select name="ps_id" id="add_crime_modal_ps_id"></select>	 
	    		<label>Crime Details</label>
	    		<input type="text" name="crime_details">
	    		<label>Motive</label>
	    		<input type="text" name="motive">
				<label>Victim Details</label>
	    		<input type="text" name="victim_details"> 
			</div>
			<div class="span4">
				<label>Crime Location</label>
	    		<input type="text" name="crime_location">
				<label class="label">Status</label>
					<select name="status">
						<option value="Theft">Theft</option>
						<option value="Cancel">Cancel</option>
						<option value="Found">Found</option>
					</select>
	    		<label>Date of Occurence</label>
	    		<input type="text" name="date_of_occurence">
			</div>
		</form>
	</div>
  </div>
  <div class="modal-footer">
    <a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
    <button class="btn btn-primary" id="save_add_crime_form_btn" onclick="save_add_crime_form();">Save</button>
  </div>
</div>
<script type="text/javascript">
$('#crime_li').addClass('active');
window.onload = function() {
	var d = new Date();
	var month = d.getMonth()+1;
	var day = d.getDate();
	var today =  d.getFullYear() + '-' +((''+month).length<2 ? '0' : '') + month + '-' + ((''+day).length<2 ? '0' : '') + day;

	var bmonth = month-1;
	var year = d.getFullYear();
	if(month == 1){
		bmonth = 12;
		year=year-1
	}	
	var backdays =   year+ '-' +((''+bmonth).length<2 ? '0' : '') + bmonth + '-' + ((''+day).length<2 ? '0' : '') + day;
	$('#from_date').val(backdays);
	$('#from_date,#to_date').datepicker({ dateFormat: "yy-mm-dd" });
	$("#to_date").val(today);

	/*$('input[name=date_of_occurence]').datetimepicker({
		dateFormat: "yy-mm-dd",
		timeFormat: "hh:mm tt"
	});*/
	get_all_ps();
	get_filter_data();
	get_crime_data();
};

function get_all_ps(){
	$.ajax({
		url: '<?php echo URL;?>user_service/get_all_ps/',
		type: 'POST',
		dataType: 'JSON',
		success: function(data){
			$('#ps_id').empty();
			$('#ps_id').append('<option value="0">All</option>');
			$('#edit_crime_modal_ps_id,#add_crime_modal_ps_id').append('<option value="0">All</option>');
			for(var i in data){
				  $('#ps_id').append($('<option value="'+data[i].id+'">'+data[i].name+'</option>'));
				  $('#edit_crime_modal_ps_id').append($('<option value="'+data[i].id+'">'+data[i].name+'</option>'));
				  $('#add_crime_modal_ps_id').append($('<option value="'+data[i].id+'">'+data[i].name+'</option>'));
			}
		}		
	});
}

function get_filter_data(){
	$('.visible-print').html('');
	var formData = $('#filter_form').serialize();
	var crime_type_id = $('#crime_type_id').val();
	var city_id = $('#city_id').val();
	var ps_id = $('#ps_id').val();
	var from_date = $('#from_date').val();
	var to_date = $('#to_date').val();

	var crime_type = $('#crime_type_id option[value='+crime_type_id+']').text();
	
	if(crime_type_id == ''){
		alert('Select Crime Type');
	}
	else if(city_id == ''){
		alert('Select City');
	}
	else if(ps_id == ''){
		alert('Select Police Station');
	}
	else if(from_date == ''){
		alert('Select From Date');
	}
	else if(to_date == ''){
		alert('Select To Date');
	}
	else{
		$('#data_table_body').html('<p class="loading_img"><img alt="loading" src="../assets/apps/img/loading.gif"/></p>');
		$.ajax({
			type: 'POST',
			url: '<?php echo URL;?>crime_service/get_vehcile_theft_details/',
			dataType: 'JSON',
			data: formData,
			success: function(resp){
				$('.visible-print').html('<lable>Crime Type :'+crime_type+'</lable> &nbsp;&nbsp; <lable>From Date : '+from_date+'</lable> &nbsp;&nbsp; <lable>To Date : '+to_date+'</lable>');
				
				$('#data_table_head,#data_table_body').empty();
				 if(resp.length != 0){
					 $('#data_table_head').append('<tr><th class="">Vehcile Theft</th></tr><tr><th>Fir No.</th><th>Case Reference</th><th>Rc No.</th><th>Vehicle Type</th><th>Theft Location</th><th>Status</th><th class="hidden-print">Edit</th></tr>');
					 for(var i in resp){
					 	$('#data_table_body').append('<tr><td>'+resp[i].fir_no+'</td><td>'+resp[i].case_ref+'</td><td>'+resp[i].rc_no+'</td><td>'+resp[i].vehicle_type+'</td><td>'+resp[i].theft_location+'</td><td>'+resp[i].status+'</td><td class="hidden-print"> <button class="btn btn-mini" type="button" onclick="edit_crime('+resp[i].id+');"><i class="icon-pencil"></i></button></td></tr>');
					 }
				 }
				 else{
					 $('#data_table_head').append('<tr class="alert alert-error hidden-print"><th>No Record Found</th></tr>');
				 }
			}
		});
	}
}

function edit_crime(id){
	$('#edit_crime_modal').modal('show');
	$('#crime_update_form').each(function(){
	    this.reset();
	});
	$.ajax({
		type: 'POST',
		url: '<?php echo URL;?>crime_service/get_crime_details/',
		dataType: 'JSON',
		data: {id:id},
		success: function(resp){
			for(var i in resp){
				$('#edit_crime_modal_id').val(resp[i].id);
				$('#edit_crime_modal_ps_id').val(resp[i].ps_id);
				$('#edit_crime_modal_crime_type_id').val(resp[i].crime_type_id);
				$('#edit_crime_modal_fir_no').val(resp[i].fir_no);
				$('#edit_crime_modal_city_id').val(resp[i].city_id);
				$('#edit_crime_modal_vehicle_type').val(resp[i].vehicle_type);
				$('#edit_crime_modal_color').val(resp[i].color);
				$('#edit_crime_modal_rc_no').val(resp[i].rc_no);
				$('#edit_crime_modal_theft_location').val(resp[i].theft_location);
				$('#edit_crime_modal_theft_time').val(resp[i].theft_time);
				$('#edit_crime_modal_status').val(resp[i].status);
				$('#edit_crime_modal_date_of_occurence').val(resp[i].date_of_occurence);
				$('#edit_crime_modal_case_ref').val(resp[i].case_ref);
			}
		}
	});
}

function save_crime_update_form(){
	var formData = $('#crime_update_form').serialize();
	$.ajax({
		url: '<?php echo URL;?>crime_service/update_crime_details/',
		type: 'POST',
		dataType: 'JSON',
		data: formData,
		success: function(data){
			$('#edit_crime_modal').modal('hide');
			get_filter_data();
		}		
	});
}

function save_add_crime_form(){
	var formData = $('#crime_add_form').serialize();
	$.ajax({
		url: '<?php echo URL;?>crime_service/save_crime_details/',
		type: 'POST',
		dataType: 'JSON',
		data: formData,
		success: function(data){
			$('#add_crime_modal').modal('hide');
			$('.confirm_div').show();
			setTimeout(function() {
				$('.confirm_div').hide();
				get_filter_data();
			}, 3000);
		}		
	});
}

function get_crime_data(){
	var formData = $('#filter_form').serialize();
	$.ajax({
		type: 'POST',
		url: '<?php echo URL;?>crime_service/get_crime_data/',
		dataType: 'JSON',
		data: formData,
		success: function(resp){
			console.log(resp);
			$('#crime_table_head,#crime_table_body').empty();
			 if(resp.length != 0){
				 $('#crime_table_head').append('<tr><th class="">Others Crime</th></tr><tr><th>Fir No.</th><th>Case Reference</th><th>Crime Details</th><th>Motive</th><th>Crime Location</th><th>Status</th></tr>');
				 for(var i in resp){
				 	$('#crime_table_body').append('<tr><td>'+resp[i].fir_no+'</td><td>'+resp[i].case_ref+'</td><td>'+resp[i].crime_details+'</td><td>'+resp[i].motive+'</td><td>'+resp[i].crime_location+'</td><td>'+resp[i].status+'</td></tr>');
				 }
			 }
			 else{
				 $('#crime_table_head').append('<tr class="alert alert-error hidden-print"><th>No Record Found</th></tr>');
			 }
		}
	});
	
} 

</script>