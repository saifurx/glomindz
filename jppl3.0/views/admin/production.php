<div id="wrap">
	<div class="container">
		<div class="page-header">
			<h3>
				Printing Details <small>search by chossing the filter</small>
			</h3>
		</div>
		<div class="col-md-3">
			<form class="form-horizontal" role="form">
				<div class="form-group">
					<div class="col-sm-10">
						<select class="form-control">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10">
						<select class="form-control">
							<option>Guwahati</option>
							<option>Dibrughrah</option>

						</select>
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-9">fdsafdsafdasfdsafsd</div>
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
