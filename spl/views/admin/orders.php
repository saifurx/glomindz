<div class="container-fluid">
	<h4>Orders</h4>
	<hr>
	<div class="input-append ">
		<input class="span4" id="search_order" type="text"
			placeholder="Search by company name">
		<button class="btn" type="button" onclick="search_order();">
			<i class="icon-blue icon-search"></i>&nbsp;Search
		</button>
	</div>
	<a href="<?php echo URL;?>admin/new_order"
		class="btn btn-success pull-right">New Order</a>

	<div class="row-fluid" id="preview_order">
		<div class="row-fluid" id="preview_header"></div>
		<div class="alert alert-error" id="stock_error"></div>
		<div class="row-fluid">
			<div class="span8">

				<table class="table table-bordered table-condensed">
					<thead>
						<tr>
							<th>#</th>
							<th>Item Name</th>
							<th>Package</th>
							<th>Order Quantity (Box)</th>
							<th>Stocks(Batch/Box/Location)</th>
							<th>Units/Box</th>
							<th>Price/Unit</th>
							<th>Price</th>
						</tr>
					</thead>
					<tbody id="product_list">
					</tbody>
					<tbody id="product_list_footer">
					</tbody>
				</table>
			</div>
			<div class="span4" id="invoice_form">
				<form class="form" id="generate_invoice_form">
					<input type="text" id="delevery_date" name="devilery_date" placeholder="Delevery Date" required="required"> 
					<input type="text" name="despatch_no" placeholder="Despatch No"	required="required"> 
					<input type="text" name="despatch_date"	id="despatch_date" placeholder="Despatch Date" required="required">
					<input type="text" name="despatch_through" placeholder="Despatch Through" required="required"> 
					<input type="text" name="devilery_terms" placeholder="Despatch Terms" required="required"> 
					<input type="text" name="vehicle_no" placeholder="Vehicle No" required="required"> 
					<input type="text" name="destination" placeholder="Destination" required="required">
					<button class="btn pull-right" id="save_invoice_btn">Generate invoice</button>
				</form>
			</div>
		</div>
	</div>

	<div class="row-fluid" id="order_table">
		<table class="table table-bordered table-condensed">
			<thead id="order_list_header"></thead>
			<tbody id="order_list" class="table table-bordered"></tbody>
		</table>
	</div>

</div>

<script type="text/javascript">
$('#orders_li').addClass('active');
var rupee_symbol='<img alt="INR" src="<?php echo URL;?>assets/apps/img/rupee.png" width="8" height="6"/>';
var user_role='<?php echo Session::get('role');?>';
var order_id=0;
var customer_id=0;
var order_list=new Array();

window.onload = function() {
	get_pending_orders();
	$("#delevery_date").datepicker({ dateFormat: "yy-mm-dd" });
	$("#despatch_date").datepicker({ dateFormat: "yy-mm-dd" });
};

function date_ddmmyyyy(date){
	var n=date.split("-");
	var result = n[2]+'/'+n[1]+'/'+n[0];
	return result;
}

function get_pending_orders(){
	$.ajax({
		url: '<?php echo URL;?>invoices/get_pending_orders/',
		type: 'GET',
		dataType: 'JSON',
		beforeSend: function(){
			$('#order_list_header').empty();
			$('#order_list').empty();
		},
		success: function(resp){
			var count = 0;
		if(resp.length==0){
				
			}else{
				$('#order_list_header').append('<tr><th>Order No</th><th>Company</th><th><strong>Contact person</strong></th><th><strong>Mobile</strong></th><th><strong>Booking Station</strong></th><th><strong>Reference</strong></th><th><strong>Request Delivery Date</strong></th><th><strong>Order Status</strong></th><th><strong>Action</strong></th></tr>');
					
			for(var key in resp){ 
				count = count + 1;
				var booking_station='Rangia';
				
				if(resp[key].booking_station==='GD'){
					booking_station='Guwahati';
				}
				order_list[resp[key].order_id]=resp[key];
				var is_order_possible=resp[key].is_order_possible;
				var prefered_delivery_date = date_ddmmyyyy(resp[key].prefered_delivery_date);
				var actions='<button class="btn btn-mini" onclick="preview_order('+resp[key].order_id+','+resp[key].customer_id+')">Preview</button>&nbsp;&nbsp;<a href="<?php echo URL;?>admin/modify_order/'+resp[key].order_id+'" class="btn btn-mini">Modify Order</a>';
				if(is_order_possible){
					$('#order_list').append('<tr class="success" id="order_row_'+resp[key].order_id+'"><td>'+resp[key].order_id+'</td><td>'+resp[key].company+'</td><td>'+resp[key].name+'</td><td>'+resp[key].mobile+'</td><td>'+booking_station+'</td><td>'+resp[key].reference+'</td><td>'+prefered_delivery_date+'</td><td>'+resp[key].status+'</td><td>'+actions+'</td></tr>');
				}else{
					$('#order_list').append('<tr class="error" id="order_row_'+resp[key].order_id+'"><td>'+resp[key].order_id+'</td><td>'+resp[key].company+'</td><td>'+resp[key].name+'</td><td>'+resp[key].mobile+'</td><td>'+booking_station+'</td><td>'+resp[key].reference+'</td><td>'+prefered_delivery_date+'</td><td>'+resp[key].status+'</td><td>'+actions+'</td></tr>');
					}
				}
			}
		}
	});
}

$('#save_invoice_btn').click(function(){
	
	generate_invoice();

	
});
function generate_invoice(){
	
	var formData = $('form#generate_invoice_form').serializeArray();
	formData.push({name:'order_id', value: order_id});
	formData.push({name:'customer_id', value: customer_id});
	$.ajax({
		url:'<?php echo URL;?>invoices/save_invoice',
		type:'POST',
		data: formData,
		dataType:'json',
		beforeSend: function(){
			$('#save_invoice_btn').attr('disabled',true).html('Saving......');
			//$('#preview_data_table').empty();
		},
		success: function(resp){
			console.log(resp);
			$('#order_row_'+order_id).remove();
			$('#product_list').empty();
			$("#order_table").show(300);
			$("#preview_order").hide(100);
			window.location='<?php echo URL;?>admin/invoices';
		}
	});
	return false;
}
function show_order_list(){

	//alert(10);
	$("#order_table").show(300);
	$("#preview_order").hide(100);
}
var total_price=0;
function preview_order(id,cust_id){
	order_id=id;
	customer_id=cust_id;
	var order_data =order_list[order_id];
	var stocks=0;
	var disable_invoice=true;
	$('#preview_header').empty().append('<span><strong>Company :</strong>'+order_data['company']+'</span><br><span><strong>Conatct Person :</strong>'+order_data['name']+'</span><br><strong>Mobile :</strong>'+order_data['mobile']+'</span><br><span><strong>Booking Station :</strong>'+order_data['booking_station']+'</span><br>');
	$('#preview_header').append('<button class="btn btn-info btn-mini pull-right" onclick="show_order_list();">Order List</button>');

	var url_product_list ='<?php echo URL;?>invoices/get_ordered_product_list/'+order_id;
	$.ajax({
		url: url_product_list,
		type: 'GET',
		dataType: 'JSON',
		async :false,
		beforeSend: function(){
			//$("#order_table").slideDown(300);
			$('#product_list').empty();
		},
		success: function(resp){
			var count = 0;
			total_price=0;
			for(var key in resp){ 
				count=count+1;
				var product_id=key;
				stocks=resp[product_id]['stocks'];
				
				var price=0;
				var stock_row='';
				if(stocks==0){
					stock_row='Stock Insufficent';
					disable_invoice=false;
				}else{
					for(var stock_id in stocks){
						//console.log(stocks[stock_id]);
						stock_row=stock_row+'<strong>'+stocks[stock_id].batch_id+stocks[stock_id].batch_no+'&nbsp;&nbsp;</strong>/&nbsp;&nbsp;'+stocks[stock_id].quantity+'&nbsp;&nbsp;/&nbsp;&nbsp;'+stocks[stock_id].location+'<br>';
					}
				}
				var order_quantity=resp[product_id]['quantity'];
				var quantity_in_box=resp[product_id]['quantity_in_box'];
				var unit_price=resp[product_id]['unit_price'];
				var packages=resp[product_id]['volume']+' ml '+resp[product_id]['quantity_in_box']+' nos '+resp[product_id]['type'];
				price=order_quantity*unit_price*quantity_in_box;
				$('#product_list').append('<tr><td>'+count+'</td><td>'+resp[product_id]['name']+'</td><td>'+packages+'</td><td>'+order_quantity+'</td><td>'+stock_row+'</td><td>'+resp[product_id]['quantity_in_box']+'</td><td>'+resp[product_id]['unit_price']+'</td><td>'+price+'</td></tr>');
				total_price=total_price+price;
				}
				$("#order_table").hide(300);
			if(!disable_invoice){
				$("#stock_error").empty().append('Please modify/request stock as some products having insufficent stocks');
				$("#invoice_form").hide();
				$("#stock_error").show();
			}else{
				$("#stock_error").empty();
				$("#stock_error").hide();
				if(user_role=='sale'){
					$("#invoice_form").hide();
				}else{
					$("#invoice_form").show();
				}
			}
			
			$("#preview_order").show();
		}
	});
	order_preview_footer();
}
function order_preview_footer(){
	
	var url_product_list ='<?php echo URL;?>invoices/get_order_products_footer/'+order_id;
	$.ajax({
		url: url_product_list,
		type: 'GET',
		dataType: 'JSON',
		async :false,
		beforeSend: function(){
			
		},
		success: function(resp){
			console.log(resp);
			$('#product_list').append('<tr><td></td><td></td><td></td><td><strong>Total Price</strong></td><td></td><td></td><td>'+rupee_symbol+'</td><td>'+parseFloat(total_price).toFixed(2)+'</td></tr>');

			$('#product_list').append('<tr><td></td><td></td><td></td><td></td><td>Central Excise Duty@2%</td><td></td><td>'+rupee_symbol+'</td><td>'+parseFloat(resp['central_excise_duty']).toFixed(2)+'</td></tr>');
			$('#product_list').append('<tr><td></td><td></td><td></td><td></td><td>Education Cess@2%on CED</td><td></td><td>'+rupee_symbol+'</td><td>'+parseFloat(resp['education_cess']).toFixed(2)+'</td></tr>');
			$('#product_list').append('<tr><td></td><td></td><td></td><td></td><td>Secondary and Higher education cess@1%on CED</td><td></td><td>'+rupee_symbol+'</td><td>'+parseFloat(resp['higher_education_cess']).toFixed(2)+'</td></tr>');
			
			$('#product_list').append('<tr><td></td><td></td><td></td><td><strong>Discount</strong></td><td>'+resp['discount']+'</td><td></td><td>'+rupee_symbol+'</td><td>'+parseFloat(resp['discount_amount']).toFixed(2)+'</td></tr>');
			$('#product_list').append('<tr><td></td><td></td><td></td><td><strong>Tax</strong></td><td>'+resp['tax']+'</td><td></td><td>'+rupee_symbol+'</td><td>'+parseFloat(resp['tax_amount']).toFixed(2)+'</td></tr>');
			$('#product_list').append('<tr><td></td><td></td><td></td><td><strong>Round off</strong></td><td></td><td></td><td>'+rupee_symbol+'</td><td>'+parseFloat(resp['round_off']).toFixed(2)+'</td></tr>');
			$('#product_list').append('<tr><td></td><td></td><td></td><td><strong>Net Payable</strong></td><td></td><td></td><td>'+rupee_symbol+'</td><td>'+parseFloat(resp['bill_amount']).toFixed(2)+'</td></tr>');
		}
	});
}
function search_order(){
	var search_query=$('#search_order').val();
		$.ajax({
			url: '<?php echo URL;?>orders/search_order/'+search_query,
			type: 'GET',
			dataType: 'JSON',
			beforeSend: function(){
				$('#order_list_header').empty();
				$('#order_list').empty();
			},
			success: function(resp){
				var count = 0;
				$('#order_list_header').append('<tr><th>Company</th><th><strong>Contact person</strong></th><th><strong>Mobile</strong></th><th><strong>Booking Station</strong></th><th><strong>Reference</strong></th><th><strong>Request Delivery Date</strong></th><th>Product List </th><th><strong>Order Status</strong></th><th><strong>Action</strong></th></tr>');
				if(resp.length==0){
					
				}else{
					
				for(var key in resp){ 
					count = count + 1;
					var booking_station='Rangia';
					
					if(resp[key].booking_station==='GD'){
						booking_station='Guwahati';
					}
					order_list[resp[key].order_id]=resp[key];
					var actions='<button class="btn btn-info btn-mini" onclick="preview_order('+resp[key].order_id+','+resp[key].customer_id+')">Preview</button>&nbsp;&nbsp;<a href="<?php echo URL;?>admin/modify_order/'+resp[key].order_id+'" class="btn btn-danger btn-mini">Modify Order</a>';
					
					$('#order_list').append('<tr id="order_row_'+resp[key].order_id+'"><td>'+resp[key].company+'</td><td>'+resp[key].name+'</td><td>'+resp[key].mobile+'</td><td>'+booking_station+'</td><td>'+resp[key].reference+'</td><td>'+resp[key].prefered_delivery_date+'</td><td>'+resp[key].no+'</td><td>'+resp[key].status+'</td><td>'+actions+'</td></tr>');
					}
				}
			}
		});
}
</script>
