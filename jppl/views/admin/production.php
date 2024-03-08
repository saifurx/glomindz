<div class="container">
	<div class="row-fluid">
		<div class="span2">
			<h4 class="input-large filter_h4"><strong>Print Details</strong></h4>	
		</div>
		<div class="span9 offset1">
			<div class="span4">
			</div>
			<div class="span8" id="above_bar">
				<div class="btn-group pull-right">
				  <button class="btn btn-primary" title="Add" data-toggle="modal" data-target="#add_consumption_modal"><i class="icon-plus icon-white"></i>PrintOrder</button>
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
				<label>Publication</label>
				<select name="publication">
					<option value="Janasadharan">Janasadharan</option>
					<option value="Tribune">Tribune</option>
                    <option value="Hills Time">Hills Time</option>
                    <option value="Amar Nagaon">Amar Nagaon</option>
                    <option value="Etydi">Etydi</option>
                    <option value="Other">Other</option>
				</select>
				<label>Location</label>
				<select name="location">
					
					<option value="Guwahati">Guwahati</option>
                    <option value="Dibrugarh">Dibrugarh</option>
				</select>
				<label>Month</label>
				<select name="month">
					
				</select>
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

<div id="add_consumption_modal" class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Add Consumption</h3>
  </div>
  <div class="modal-body">
  	<div class="row-fluid">
  		<form class="" id="add_consumption_form">
    		<div class="span6">
	    	   	<label>Publication</label>
	    	   	<select name="publication">
					<option value="Janasadharan">Janasadharan</option>
					<option value="Tribune">Tribune</option>
                    <option value="Hills Time">Hills Time</option>
                    <option value="Amar Nagaon">Amar Nagaon</option>
                    <option value="Etydi">Etydi</option>
                    <option value="Other">Other</option>
                    
				</select>
	    	   		<label>Location</label>
	    	   	<select name="location">
	                <option value="Guwahati">Guwahati</option>
	                <option value="Dibrugarh">Dibrugarh</option>
				</select>
	    	   	<label>Date</label>
	    	   	<input type="text" name="date">
	    	   	
    		</div>
			<div class="span6">
			<label>Print Order</label>
	    	   	<input type="text" name="print_order">
				<label>Color Page</label>
	    	   	<input type="text" name="color_page">
	    	   	<label>BW Page</label>
	    	   	<input type="text" name="bw_page">
	    	   
			</div>
		</form>
	</div>
  </div>
  <div class="modal-footer">
    <strong id="result"></strong>
    <a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
    <button class="btn btn-primary" id="add_consumption_btn" onclick="add_consumption();">Save</button>
  </div>
</div>

<script type="text/javascript">
window.onload = function() {
	$('#production_li').addClass('active');
	$('input:text[name=date]').datepicker({ dateFormat: "yy-mm-dd" });
	all_product();
};

function all_product(){
	$.ajax({
		url: '<?php echo URL;?>stock_service/all_product/',
		type: 'POST',
		dataType: 'JSON',
		success: function(data){
			$('select[name=product_id]').empty();
			$('select[name=product_id]').append('<option value="0">All</option>');
			for(var i in data){
				$('select[name=product_id]').append($('<option value="'+data[i].id+'">'+data[i].name+'</option>'));
			}
		}		
	});
}

function get_filter_data(){
	var formData = $('#filter_form').serialize();
	$('#data_table_head,#data_table_body').empty();
	$.ajax({
		type: 'POST',
		url: '<?php echo URL;?>stock_service/get_consumption/',
		dataType: 'JSON',
		data: formData,
		success: function(resp){
			if(resp.length != 0){
				$('#data_table_head').append('<tr><th>publication</th><th>location</th><th>print_order</th><th>color_page</th><th>bw_page</th><th>date</th></tr>');
				for(var i in resp){
					$('#data_table_body').append('<tr><td>'+resp[i].publication+'</td><td>'+resp[i].location+'</td><td>'+resp[i].print_order+'</td><td>'+resp[i].color_page+'</td><td>'+resp[i].bw_page+'</td><td>'+resp[i].date+'</td></tr>');
				}
			}
			else{
				$('#data_table').append('<thead><tr class="alert alert-error"><th>No Record Found</th></tr><thead>');
			}
		}
	});
}

function add_consumption(){
	var formData = $('#add_consumption_form').serialize();
	$('#add_consumption_btn').attr('disabled', true);
	$.ajax({
		url: '<?php echo URL;?>stock_service/add_consumption/',
		type: 'POST',
		dataType: 'JSON',
		data: formData,
		success: function(data){
			 $('#add_consumption_form').each(function(){this.reset();});
			 $('#result').addClass('alert-success pull-left').html('Saved Successfully');
			 get_filter_data();
			 setTimeout(function(){
				 $('#result').hide();
				 $('#add_consumption_modal').modal('hide');
				 $('#add_consumption_btn').attr('disabled', false);
            }, 2000);
		}		
	});
}
</script>