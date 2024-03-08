<div class="container">
	<div class="row-fluid">
		<div class="span2">
			<h4 class="input-large filter_h4"><strong>Payroll</strong></h4>	
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
				  <button class="btn btn-primary" title="Add"><i class="icon-plus icon-white"></i>Process Salary</button>
				  <button class="btn" title="print"><i class="icon-print"></i>Print</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row-fluid">
		<div class="span2">
				<form id="filter_form">	
				<label>Employee Type</label>
				<select id="crime_type_id" name="crime_type_id">
					<option value="0">All</option>
					<option value="1">Regular</option>
                                        <option value="2">Casual</option>
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
				<label>Salary Month</label>
				<input class="input-large" type="text" id="from_date" name="from_date">
				</form>
				<label></label>
				<input class="btn btn-primary " type="button" id="search_with_filter_btn" value="Search" onclick="get_filter_data();">
				
		</div>
		<div class="span9 offset1">
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
	$('#payroll_li').addClass('active');
	$('#from_date,#to_date,#edit_crime_modal_date_of_occurence').datepicker({ dateFormat: "yy-mm-dd" });
	get_all_employee();
};

function get_all_employee(){
	$.ajax({
		url: '<?php echo URL;?>employee_service/get_all_employee/',
		type: 'POST',
		dataType: 'JSON',
		success: function(data){
                     $('#data_table_head').append('<th>Emp ID</th><th>Name</th><th>Type</th><th>Account no</th><th>Gross Salary</th><th>Spl Allowance</th><th>Action</th>');
                      
                     for(var i in data){
                       
                            $('#data_table_body').append('<tr><td>'+data[i].id+'</td><td>'+data[i].firstname+'&nbsp;'+data[i].lastname+'</td><td></td><td></td><td></td><td></td><td>Actions</td></tr>');
            		 
                     }
			
		}		
	});
}

</script>