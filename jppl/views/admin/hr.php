<div class="container">
	<div class="row-fluid">
		<div class="span2">
			<h4 class="input-large filter_h4"><strong>HR</strong></h4>	
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
				  <button class="btn btn-primary" title="Add"><i class="icon-plus icon-white"></i>Add</button>
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
				<select id="emp_type" name="emp_type">
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
				<label>Working From</label>
				<input class="input-large" type="text" id="from_date" name="from_date">
				<label>Working To</label>
				<input class="input-large" type="text" id="to_date" name="to_date">
				</form>
				<label></label>
				<input class="btn btn-primary " type="button" id="search_with_filter_btn" value="Search" onclick="search_employee();">
				
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



<script type="text/javascript">
window.onload = function() {
	$('#hr_li').addClass('active');
	get_all_employee();
};

function get_all_employee(){
	$.ajax({
		url: '<?php echo URL;?>employee_service/get_all_employee/',
		type: 'POST',
		dataType: 'JSON',
		success: function(data){
                     $('#data_table_head').append('<th>Emp ID</th><th>Name</th><th>Department</th><th>Designation</th><th>Mobile</th><th>Action</th>');
                      
                     for(var i in data){
                       
                            $('#data_table_body').append('<tr><td>'+data[i].id+'</td><td>'+data[i].firstname+'&nbsp;'+data[i].lastname+'</td><td>'+data[i].department+'</td><td>'+data[i].designation+'</td><td>'+data[i].mobile+'</td><td>Actions</td></tr>');
            		 
                     }
			
		}		
	});
}

function search_employee(){
      var formData = $('#filter_form').serialize();

	$.ajax({
		url: '<?php echo URL;?>employee_service/search_employee/',
		type: 'POST',
		dataType: 'JSON',
                data: formData,
		success: function(data){
                     $('#data_table_head').append('<th>Emp ID</th><th>Name</th><th>Department</th><th>Designation</th><th>Mobile</th><th>Action</th>');
                      
                     for(var i in data){
                       
                            $('#data_table_body').append('<tr><td>'+data[i].id+'</td><td>'+data[i].firstname+'&nbsp;'+data[i].lastname+'</td><td>'+data[i].department+'</td><td>'+data[i].designation+'</td><td>'+data[i].mobile+'</td><td>Actions</td></tr>');
            		 
                     }
			
		}		
	});
}

</script>