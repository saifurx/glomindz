<div class="container-fluid">
	<h3>Stock Reports</h3>
	<hr>
	<div class="row-fluid">
		<div class="span3 hidden-print">
			<ul class="nav nav-pills nav-stacked well well_bg">
				<li>
					<select class="span12" id="location">
						<option value="0">--Location--</option>
						<option value="RD">Rangia (RD)</option>
						<option value="GD">Guwahati (GD)</option>
					</select>
				</li>
				<li>
					<input class="span12" type="text" name="product_name" id="product_name" placeholder="Products" autocomplete="off" />
					<input type="hidden" name="product_id" id="product_id">
				</li>
				<li>
					<select class="span12" id="package">
						<option value="0">--Package--</option>
					</select>
				</li>
				<li>
					<input class="span12" type="text" placeholder="From Date" id="from_date">
				</li>
				<li>
					<input class="span12" type="text" placeholder="To Date" id="to_date">
				</li>
				<li>
					<button type="button" class="span12 btn btn-success" id="get_stock_report_btn" onclick="get_stock_report();">Find</button>
				</li>
			</ul>
		</div>
		<div class="span9">
			<table class="table table-bordered table-condensed table-striped" id="result_table">
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
var product_list = [];
$('#reports_li').addClass('active');

$(function() {
    $( "#from_date" ).datepicker({
      defaultDate: "+1w",
      dateFormat: "yy-mm-dd",
      onClose: function( selectedDate ) {
        $( "#to_date" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#to_date" ).datepicker({
      defaultDate: "+1w",
      dateFormat: "yy-mm-dd",
      onClose: function( selectedDate ) {
        $( "#from_date" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
});

window.onload = function() {
	get_all_package();
	$('#result_table').hide();
	var product = localStorage.getItem('product_list');
	if(product==null || product==''){
		 get_short_code();
	}else{
		product_list =JSON.parse(product);
	}
};

$('#product_name').focus(function() {
	$('#product_name').val('');
    $('#product_name').typeahead({
        source: product_list,
        itemSelected: function(resp){
            $('#product_id').val(resp);
            console.log(resp);
        }
    });
});

function get_short_code(){
	$.ajax({
		url: '<?php echo URL;?>product/get_short_code/',
		type: 'GET',
		dataType: 'JSON',
		success: function(data) {
			product_list=data;
			localStorage.setItem('product_list', JSON.stringify(product_list));
			
		}
	});
}

function get_all_package(){
	$.ajax({
		url: '<?php echo URL;?>stocks/get_all_packages/',
		type: 'GET',
		dataType: 'JSON',
		success: function(data) {
			$('#package').empty();
			$('#package').attr('disabled',false);
			$('#package').append($("<option></option>").attr("value",0).text('Package'));
			$.each(data ,function(i,value) {
				  $('#package').append($("<option></option>").attr("value",value.id).text(value.name));
		    });
		}
	});
}



function get_stock_report(){
	$('#get_stock_report_btn').attr('disabled', true).html('Finding...');
	$('#filters_details').html('');
	var location=$('#location').val();
	var product=$('#product_id').val();
	var package_id = $('#package').val(); 
	var from_date = $('#from_date').val();
	var to_date = $('#to_date').val();
	if((location!=0 && product != 0) &&(from_date !=0 && to_date !=0)){
		$.ajax({
			url: '<?php echo URL;?>analytics/get_stock_report/',
			type: 'POST',
			data: {location:location,product:product,package_id:package_id,from_date:from_date,to_date:to_date},
			dataType: 'JSON',
			success: function(data) {
				$('#result_table').show().empty();
				console.log(data);
				if(data.length==0){
					$('#result_table').append('<thead><tr class="alert alert-error"><td><h4>No Record Found</h4></td></tr></thead>');
				}else{
					var product_text = $('#product_name').val();
					var location = $('#location option[value='+$('#location').val()+']').text();
					
					$('#result_table').append('<caption style="text-align:left"><strong>'+product_text+'</strong>&nbsp;&nbsp;&nbsp; in <strong>'+location+' </strong></caption>');
					$('#result_table').append('<thead><tr><th>Batch</th><th>Package Size</th><th>Container Type</th><th>Transaction Date</th><th>Quantity</th><th>Transaction Type</th></tr></thead>');
					for(var i in data){
						var batch = data[i].batch_id+data[i].batch_no;
						var packsize = data[i].volume+' '+data[i].unit_type+' '+data[i].quantity_in_box+' Nos';
						$('#result_table').append('<tbody><tr><td>'+batch+'</td><td>'+packsize+'</td><td>'+data[i].type+'</td><td>'+data[i].last_update+'</td><td>'+data[i].quantity+'</td><td>'+data[i].transaction_type+'('+data[i].remarks+')</td></tr></tbody>');	 
					}
				}
				$('#get_stock_report_btn').attr('disabled', false).html('Find');
			}
		});
	}
	else{
		alert('Error! Select above parameters.');
		$('#get_stock_report_btn').attr('disabled', false).html('Find');
	}
}
</script>
