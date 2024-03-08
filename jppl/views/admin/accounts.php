<div class="container">
	<div class="row-fluid">
		<div class="span2">
			<h4 class="input-large filter_h4"><strong>Accounts</strong></h4>	
		</div>
		<div class="span10">
			
				<form action="" class="well form-inline" id="new_payment_form">
				<input type="hidden" name="customer_id" id="customer_id">
				<select name="prefered_payment">
					<option class="option_lable">--Department--</option>
					<option value="Cash">Cash</option>
					<option value="Online">Online</option>
					<option value="Cheque/Draft">Cheque/Draft</option>
				</select> <input type="text" id="instrument_no" name="instrument_no"
					class="input" placeholder="Instrument no" /> <input type="text"
					placeholder="Instrument_Date" id="instrument_date"
					name="instrument_date"> <input type="number" id="amount"
					name="amount" class="input-small" placeholder="Amount" />
				<button type="button" class="btn btn-primary" id="update_price_btn">Save</button>

			</form>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row-fluid">
		<div class="span2">
				<form id="filter_form">	
				<label>Transaction Type</label>
				<select id="crime_type_id" name="crime_type_id">
					<option value="0">All</option>
					<option value="1">Debit</option>
                                        <option value="2">Credit</option>
				</select>
				
				<label>Department</label>
				<select id="city_id" name="city_id">
					<option value="0">All</option>
					<option value="1">Administration</option>
                                        <option value="1">Advertisement</option>
                                        <option value="1">Circulation</option>
                                        <option value="1">Editorial</option>
                                        <option value="1">Production</option>
				</select>
				
				<label>Location</label>
				<select id="ps_id" name="ps_id">
					<option value="0">All</option>
                                        <option value="0">Guwahati</option>
                                        <option value="0">Dibrugarh</option>
				</select>
				<label>From Date</label>
				<input class="input-large" type="text" id="from_date" name="from_date">
				<label>To Date</label>
				<input class="input-large" type="text" id="to_date" name="to_date">
				</form>
				<label></label>
				<input class="btn btn-primary " type="button" id="search_with_filter_btn" value="Search" onclick="get_filter_data();">
				
		</div>
		<div class="span9 offset1">
                    <div class="row"></div>
			<table class="table table-bordered table-condensed">
				<thead id="data_table_head"></thead>
				<tbody id="data_table_body">
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
				<label>Police Station</label>
	    		<select name="ps_id" id="edit_crime_modal_ps_id"></select>	    		
    		</div>
			<div class="span4">
	    		<label>Vehicle Type</label>
	    		<input type="text" name="vehicle_type" id="edit_crime_modal_vehicle_type">
	    		<label>Color</label>
	    		<input type="text" name="color" id="edit_crime_modal_color">
				<label>Rc No.</label>
	    		<input type="text" name="rc_no" id="edit_crime_modal_rc_no"> 
	    		<label>Theft Location</label>
	    		<input type="text" name="theft_location" id="edit_crime_modal_theft_location">
			</div>
			<div class="span4">
				<label>Theft Time</label>
	    		<input type="text" name="theft_time" id="edit_crime_modal_theft_time"> 
				<label>Status</label>
	    		<input type="text" name="status" id="edit_crime_modal_status">
	    		<label>Date of Occurence</label>
	    		<input type="text" name="date_of_occurence" id="edit_crime_modal_date_of_occurence">
	    		<label>User Mobile No</label>
	    		<input type="text" name="user_mobile_no" id="edit_crime_modal_user_mobile_no">
			</div>
		</form>
	</div>
  </div>
  <div class="modal-footer">
    <a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
    <button class="btn btn-primary" id="save_crime_update_form_btn" onclick="save_crime_update_form();">Update</button>
  </div>
</div>

<script type="text/javascript">
window.onload = function() {
	$('#accounts_li').addClass('active');
	$('#from_date,#to_date,#edit_crime_modal_date_of_occurence').datepicker({ dateFormat: "yy-mm-dd" });
	get_all_ps();
};

function get_all_ps(){
	$.ajax({
		url: '<?php echo URL;?>user_service/get_all_ps/',
		type: 'POST',
		dataType: 'JSON',
		success: function(data){
			$('#ps_id').empty();
			$('#ps_id').append('<option value="0">All</option>');
			$('#edit_crime_modal_ps_id').append('<option value="0">All</option>');
			for(var i in data){
				  $('#ps_id').append($('<option value="'+data[i].id+'">'+data[i].name+'</option>'));
				  $('#edit_crime_modal_ps_id').append($('<option value="'+data[i].id+'">'+data[i].name+'</option>'));
			}
		}		
	});
}

function get_filter_data(){
	var formData = $('#filter_form').serialize();
	var crime_type_id = $('#crime_type_id').val();
	var city_id = $('#city_id').val();
	var ps_id = $('#ps_id').val();
	var from_date = $('#from_date').val();
	var to_date = $('#to_date').val();

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
		$('#data_table_head,#data_table_body').empty();
		$.ajax({
			type: 'POST',
			url: '<?php echo URL;?>police_service/get_crime_data/',
			dataType: 'JSON',
			data: formData,
			success: function(resp){
				 if(resp.length != 0){
					 $('#data_table_head').append('<tr><th>Fir No.</th><th>Case Reference</th><th>Rc No.</th><th>vehicle_Type</th><th>Theft Location</th><th>Status</th><th>Edit</th></tr>');
					 for(var i in resp){
					 	$('#data_table_body').append('<tr><td>'+resp[i].fir_no+'</td><td>'+resp[i].case_ref+'</td><td>'+resp[i].rc_no+'</td><td>'+resp[i].vehicle_type+'</td><td>'+resp[i].theft_location+'</td><td>'+resp[i].status+'</td><td> <button class="btn btn-mini" type="button" onclick="edit_crime('+resp[i].id+');"><i class="icon-pencil"></i></button></td></tr>');
					 }
				 }
				 else{
					 $('#data_table').append('<thead><tr class="alert alert-error"><th>No Record Found</th></tr><thead>');
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
		url: '<?php echo URL;?>police_service/get_crime_details/',
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
				$('#edit_crime_modal_user_mobile_no').val(resp[i].user_mobile_no);
				$('#edit_crime_modal_case_ref').val(resp[i].case_ref);
			}
		}
	});
}

function save_crime_update_form(){
	var formData = $('#crime_update_form').serialize();
	$.ajax({
		url: '<?php echo URL;?>police_service/update_crime_details/',
		type: 'POST',
		dataType: 'JSON',
		data: formData,
		success: function(data){
			$('#edit_crime_modal').modal('hide');
			get_filter_data();
		}		
	});
}
</script>