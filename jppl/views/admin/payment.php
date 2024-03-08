<div class="container">
	<div class="row-fluid">
		<div class="span2">
			<h4 class="input-large filter_h4"><strong>Payment</strong></h4>	
		</div>
		<div class="span9 offset1">
			<div class="span4">
				
			</div>
			<div class="span8" id="above_bar">
				<div class="btn-group pull-right">
				  <button type="button" data-toggle="modal" data-target="#add_payment_modal" class="btn btn-primary" title="Add"><i class="icon-plus icon-white"></i>Add</button>
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
				<label>Department</label>
				<select name="dept">
					<option value="0">All</option>
					<option value="1">Administration</option>
                    <option value="1">Advertisement</option>
                    <option value="1">Circulation</option>
                    <option value="1">Editorial</option>
                    <option value="1">Production</option>
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
			<table class="table table-bordered table-condensed">
				<thead id="data_table_head"></thead>
				<tbody id="data_table_body">
				</tbody>
	         </table>   
		</div>
	</div>
</div>

<div id="add_payment_modal" class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Add Payment</h3>
  </div>
  <div class="modal-body">
  	<div class="row-fluid">
  		<form class="" id="add_payment_form">
    		<div class="span6">
	    		<label>Department</label>
				<select name="dept">
					<option value="0">All</option>
					<option value="1">Administration</option>
                    <option value="2">Advertisement</option>
                    <option value="3">Circulation</option>
                    <option value="4">Editorial</option>
                    <option value="5">Production</option>
				</select>
	    		
	    		<label>Received From</label>
				<input type="text" name="received_from">
				<label>Amount</label>
				<input type="text" name="amount">
				<label>Payment Date</label>
				<input type="text" name="payment_date" id="payment_date">
			</div>
			<div class="span6">
				<label>Payment Mode</label>
				<select name="payment_mode">
					<option value="Cash">Cash</option>
					<option value="Online">Online</option>
					<option value="Cheque/Draft">Cheque/Draft</option>
				</select>
				<label>Instrument Number</label>
				<input type="text" name="instrument_number">
				<label>Instrument Date</label>
				<input type="text" name="instrument_date" id="instrument_date">
				<label>Remarks</label>
				<textarea rows="2" cols="" name="remark"></textarea>
    		</div>
		</form>
	</div>
  </div>
  <div class="modal-footer">
  	<strong id="result"></strong>
    <a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
    <button class="btn btn-primary" id="add_payment_form_btn" onclick="add_payment();">Save</button>
  </div>
</div>

<script type="text/javascript">
window.onload = function() {
	$('#payment_li').addClass('active');
	$('#from_date,#to_date,#instrument_date,#payment_date').datepicker({ dateFormat: "yy-mm-dd" });
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
			url: '<?php echo URL;?>payment_service/get_all_payment/',
			dataType: 'JSON',
			data: formData,
			success: function(resp){
				console.log(resp);
				 if(resp.length != 0){
					 $('#data_table_head').append('<tr><th>Department</th><th>Received From</th><th>Amount</th><th>Payment Date</th><th>payment_mode</th><th>Instrument Number</th><th>instrument_date</th></tr>');
					 for(var i in resp){
					 	$('#data_table_body').append('<tr><td>'+resp[i].dept+'</td><td>'+resp[i].received_from+'</td><td>'+resp[i].amount+'</td><td>'+resp[i].payment_date+'</td><td>'+resp[i].payment_mode+'</td><td>'+resp[i].instrument_number+'</td><td>'+resp[i].instrument_date+'</td></tr>');
					 }
				 }
				 else{
					 $('#data_table_body').append('<tr colspan="6"  class="alert alert-error"><th>No Record Found</th></tr>');
				 }
			}
		});
	}
}


function add_payment(){
	var formData = $('#add_payment_form').serializeArray();
		$('#add_payment_form_btn').attr('disabled', true);
		$.ajax({
			url: '<?php echo URL;?>payment_service/add_payment/',
			type: 'POST',
			dataType: 'JSON',
			data: formData,
			success: function(data){
				$('#add_payment_form').each(function(){this.reset();});
				$('#result').addClass('alert-success pull-left').html('Saved Successfully');
				setTimeout(function(){
					 $('#result').hide();
					 $('#add_payment_modal').modal('hide');
					 $('#add_payment_form_btn').attr('disabled', false);
	            }, 2000);
			}		
		});
}
</script>
