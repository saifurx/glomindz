<div class="container-fluid">
<h4>Customer Payments</h4>
<hr>
	<div class="input-append ">
		<input type="text" id="customer_name" class="span4"
			placeholder="Customer Name" /> <input type="hidden"
			name="customer_id" id="customer_id">
		<button id="search_btn" class="btn" type="button"
			onclick="get_total_payments();">
			<i class="icon-blue icon-search"></i>&nbsp;Search
		</button>

	</div>
	<div class="row-fluid" id="payment_details">
		<div class="span12">
			<form action="" class="well form-inline" id="new_payment_form">
				<input type="hidden" name="customer_id" id="customer_id">
				<!--  <input type="number"  class="input-large"	placeholder="Order Id"/>-->
				<select id="order_id" name="order_id">

				</select> <select name="prefered_payment">
					<option class="option_lable">--Payment Method--</option>
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
			<hr>
			<p class="loading_p"></p>
			<div id="outsanding" class="pull-right"></div>
			<table class="table table-bordered table-condensed">
				<thead id="payment_list_header">

				</thead>
				<tbody id="payment_list"
					class="table table-bordered table-condensed"></tbody>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">

var customer_id=0;
$('#payments_li').addClass('active');
$(document).ready(function(){
	$('#payment_details').hide();
	 var customer = localStorage.getItem('customer_list');
	   if(customer==null || customer==''){

	    	  get_all_customers();
	  	  
	    }else{
	        
	    	customer_list =JSON.parse(customer);
	   
	   }
	$("#instrument_date").datepicker({ dateFormat: "yy-mm-dd" });
});
function date_ddmmyyyy(date){
	var n=date.split("-");
	var result = n[2]+'/'+n[1]+'/'+n[0];
	return result;
}
var customer_list = [];
function get_all_customers(){
	$.ajax({
		url: '<?php echo URL;?>customer/get_all_customers/0',
		type: 'GET',
		dataType: 'JSON',
		async: true,
		success: function(data) {
			customer_list=data;
		}
	});
}

$('#customer_name').focus(function() {
	//console.log(return_list);
    $('#customer_name').typeahead({
        source: customer_list,
        itemSelected: function(resp){
            console.log(resp);
            $('#customer_id').val(resp);
            customer_id=resp;
            get_total_sales();
            $('#search_btn').click();
        }
    });
});
var total_sales=0;
var total_payments=0;
function get_total_sales(){
	$('#search_btn').attr('disabled',true).html('<img src="<?php echo URL;?>assets/apps/img/loading.gif" class="img-circle" style="width:20px; height:20px;">');
	
	$.ajax({
		url: '<?php echo URL;?>customer/customer_order_id/'+customer_id,
		type: 'GET',
		dataType: 'JSON',
		beforeSend: function(){
			$('#order_id').empty();
			total_sales=0;
		},
		success: function(data) {
			$('.loading_p').empty().hide();
			$('#order_id').append('<option value="0">Advance</option>');
			for(var i in data){
				total_sales=parseFloat(total_sales)+parseFloat(data[i].bill_amount);
				
				$('#order_id').append('<option value='+data[i].id+'>Order:'+data[i].id+' amount :'+data[i].bill_amount+' INR</option>');	
			}
			$('#search_btn').attr('disabled',false).html('<i class="icon-blue icon-search"></i>&nbsp;Search');
			
		}
	});
}

$('#update_price_btn').click(function(){
	$('#update_price_btn').attr('disabled',true);
	var formData = $('form#new_payment_form').serializeArray();
	formData.push({name:"customer_id", value:customer_id});
	$.ajax({
		url:'<?php echo URL;?>customer/save_payment',
		type:'POST',
		data: formData,
		dataType:'json',
		  success: function(resp){
			 $('#payment_details').hide();
			 get_total_payments();
			 $('#update_price_btn').attr('disabled',false);
		 }
	});
});

function get_total_payments(){
	$('.loading_p').show().html('<img src="<?php echo URL;?>assets/apps/img/loading.gif" class="img-circle" style="width:20px; height:20px;">');
	
	$.ajax({
		url: '<?php echo URL;?>customer/get_payment_details/'+customer_id,
		type: 'GET',
		dataType: 'JSON',
		beforeSend: function(){
			$('#payment_list').empty();
			$('#payment_details').show();
			total_payments=0;
		},
		success: function(data) {
			$('.loading_p').empty().hide();
			$('#payment_list_header').empty().append('<tr><th>Payment Date</th>	<th>Order id</th><th>Payment mode</th><th>Instrument no</th>	<th>Instrument Date</th><th>Amount</th>	</tr>');
			for(var i in data){
				var payment_date = date_ddmmyyyy(data[i].payment_date);
				var instrument_date = date_ddmmyyyy(data[i].instrument_date);
				total_payments=parseFloat(total_payments)+parseFloat(data[i].amount);
				$('#payment_list').append('<tr><td>'+payment_date+'</td><td>'+data[i].order_id+'</td><td>'+data[i].payment_mode+'</td><td>'+data[i].instrument_number+'</td><td>'+instrument_date+'</td><td>'+data[i].amount+'</td></tr>');	
			}
			$('#search_btn').attr('disabled',false).html('<i class="icon-blue icon-search"></i>&nbsp;Search');
			display_customer_outstanding();
		}
	});
	
}
function display_customer_outstanding(){
			balance=total_sales-total_payments;
			$('#outsanding').empty().append('<strong>Total Payments :</strong>&nbsp;'+total_payments+'&nbsp; INR&nbsp;<strong>&nbsp;Total Sales :</strong>&nbsp;&nbsp;'+total_sales+'&nbsp;INR&nbsp;<strong >&nbsp;Balance :</strong>&nbsp;&nbsp;'+balance+'&nbsp;INR');

}
</script>
