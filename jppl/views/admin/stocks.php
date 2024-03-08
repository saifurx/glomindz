<div class="container">
	<div class="row-fluid">
		<div class="span2">
			<h4 class="input-large filter_h4"><strong>Stocks</strong></h4>	
		</div>
		<div class="span9 offset1">
			<div class="span4">
				
			</div>
			<div class="span8" id="above_bar">
				<div class="btn-group pull-right">
				  <button type="button" data-toggle="modal" data-target="#add_stock_modal" class="btn btn-primary" title="Add"><i class="icon-plus icon-white"></i>Add</button>
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
					<label>Product</label>
					<select name="product_id" id="product_id">
						<option value="0">All</option>
					</select>
					<label>Location</label>
					<select id="ps_id" name="ps_id">
						<option value="0">All</option>
	                    <option value="Guwahati">Guwahati</option>
	                    <option value="Dibrugarh">Dibrugarh</option>
					</select>
					<label>Quantity</label>
					<input type="text" id="quantity" name="quantity">
					<label>Units</label>
					<input type="text" id="unit" name="unit">
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

<div id="add_stock_modal" class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Add Stock</h3>
  </div>
  <div class="modal-body">
  	<div class="row-fluid">
  		<form class="" id="add_stock_form">
    		<div class="span6">
	    		<label>Product</label>
	    		<select name="product_id"></select>
	    		<label>Location</label>
				<select id="location" name="location">
	                <option value="Guwahati">Guwahati</option>
	                <option value="Dibrugarh">Dibrugarh</option>
				</select>
				<label>Transaction Date</label>
				<input type="text" name="transaction_date">
				<label>Unit Quantity</label>
				<input type="text" name="unit_quantity">
			</div>
			<div class="span6">
				<label>Box Quantity</label>
				<input type="text" name="box_quantity">
				<label>Transaction Type</label>
				<select name="transaction_type">
					<option value="Transfer-in">Transfer-in</option>
					<option value="Transfer-out">Transfer-out</option>
				</select>
				<label>Remarks</label>
				<textarea rows="4" cols="" name="remarks"></textarea>
    		</div>
		</form>
	</div>
  </div>
  <div class="modal-footer">
  	<strong id="result"></strong>
    <a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
    <button class="btn btn-primary" id="add_stock_form_btn" onclick="add_stock();">Save</button>
  </div>
</div>

<script type="text/javascript">
window.onload = function() {
	$('#stocks_li').addClass('active');
	$('input:text[name=transaction_date]').datepicker({ dateFormat: "yy-mm-dd" });
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
	if( formData == ''){
		alert('Select Filters');
	}
	else{
		$('#data_table_head,#data_table_body').empty();
		$.ajax({
			type: 'POST',
			url: '<?php echo URL;?>stock_service/get_stocks/',
			dataType: 'JSON',
			data: formData,
			success: function(resp){
				console.log(resp);
				 if(resp.length != 0){
					 //$('#data_table_head').append('<tr><th>Fir No.</th><th>Case Reference</th><th>Rc No.</th><th>vehicle_Type</th><th>Theft Location</th><th>Status</th><th>Edit</th></tr>');
					 for(var i in resp){
					 	//$('#data_table_body').append('<tr><td>'+resp[i].fir_no+'</td><td>'+resp[i].case_ref+'</td><td>'+resp[i].rc_no+'</td><td>'+resp[i].vehicle_type+'</td><td>'+resp[i].theft_location+'</td><td>'+resp[i].status+'</td><td> <button class="btn btn-mini" type="button" onclick="edit_crime('+resp[i].id+');"><i class="icon-pencil"></i></button></td></tr>');
					 }
				 }
				 else{
					 //$('#data_table').append('<thead><tr class="alert alert-error"><th>No Record Found</th></tr><thead>');
				 }
			}
		});
	}
}


function add_stock(){
	var formData = $('#add_stock_form').serializeArray();
	console.log(formData);
	var product_id = formData[0]['value'];
	if(product_id==0){
		alert('Select Product');
	}
	else{
		$('#add_stock_form_btn').attr('disabled', true);
		$.ajax({
			url: '<?php echo URL;?>stock_service/add_stocks/',
			type: 'POST',
			dataType: 'JSON',
			data: formData,
			success: function(data){
				$('#result').addClass('alert-success pull-left').html('Saved Successfully');
				$('#add_stock_form').each(function(){this.reset();});
				setTimeout(function(){
					 $('#result').hide();
					 $('#add_stock_modal').modal('hide');
					 $('#add_stock_form_btn').attr('disabled', false);
	            }, 2000);
			}		
		});
	}
}
</script>