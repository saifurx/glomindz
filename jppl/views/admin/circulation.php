<div class="container">
	<div class="row-fluid">
		<div class="span2">
			<h4 class="input-large filter_h4"><strong>Circulation</strong></h4>	
		</div>
		<div class="span9 offset1">
			<div class="span4">
			</div>
			<div class="span8" id="above_bar">
				<div class="btn-group pull-right">
				  <button data-toggle="modal" data-target="#add_agency_modal"  class="btn btn-primary" title="Add"><i class="icon-plus icon-white" ></i>Add Agency</button>
				  <button class="btn" title="print"><i class="icon-print"></i>Print Label</button>
                                  
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row-fluid">
		<div class="span2">
			<form id="filter_form">	
				<label>District</label>
				<select id="crime_type_id" name="crime_type_id">
					<option value="0">All</option>
				</select>
				<label>Bill Month</label>
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

<div id="add_agency_modal" class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Add Agency</h3>
  </div>
  <div class="modal-body">
  	<div class="row-fluid">
  		<form class="" id="add_agency_form">
    		<div class="span4">
	    			    		
    		</div>
			<div class="span4">

			</div>
		</form>
	</div>
  </div>
  <div class="modal-footer">
    <a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
    <button class="btn btn-primary" id="add_agency_form_btn" onclick="add_agency();">Update</button>
  </div>
</div>

<script type="text/javascript">
window.onload = function() {
	$('#circulation_li').addClass('active');
	$('#from_date').datepicker({ dateFormat: "yy-mm-dd" });
};



function get_filter_data(){
	var formData = $('#filter_form').serialize();
		$('#data_table_head,#data_table_body').empty();
		$.ajax({
			type: 'POST',
			url: '<?php echo URL;?>',
			dataType: 'JSON',
			data: formData,
			success: function(resp){
				console.log(resp);
				/*
				 if(resp.length != 0){
					 $('#data_table_head').append('<tr><th>Fir No.</th><th>Case Reference</th><th>Rc No.</th><th>vehicle_Type</th><th>Theft Location</th><th>Status</th><th>Edit</th></tr>');
					 for(var i in resp){
					 	$('#data_table_body').append('<tr><td>'+resp[i].fir_no+'</td><td>'+resp[i].case_ref+'</td><td>'+resp[i].rc_no+'</td><td>'+resp[i].vehicle_type+'</td><td>'+resp[i].theft_location+'</td><td>'+resp[i].status+'</td><td> <button class="btn btn-mini" type="button" onclick="edit_crime('+resp[i].id+');"><i class="icon-pencil"></i></button></td></tr>');
					 }
				 }
				 else{
					 $('#data_table').append('<thead><tr class="alert alert-error"><th>No Record Found</th></tr><thead>');
				 }
				 */
			}
		});
}

function save_crime_update_form(){
	var formData = $('#add_agency_form').serialize();
	$.ajax({
		url: '<?php echo URL;?>',
		type: 'POST',
		dataType: 'JSON',
		data: formData,
		success: function(data){
			$('#add_agency_modal').modal('hide');
			get_filter_data();
		}		
	});
}
</script>