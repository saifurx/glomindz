
<div class="container-fluid">
<h4>Invoices</h4>
<hr>
	<div class="input-append row-fluid">
		<input class="span4" id="search_order" type="text"
			placeholder="Search by company name">
		<button class="btn" type="button" onclick="search_order();">
			<i class="icon-black icon-search"></i>&nbsp;Search
		</button>
	</div>
	<div class="row-fluid" id="invoice_table">
	<p class="loading_p"></p>
		<table class="table table-bordered table-condensed">
			<thead id="invoice_list_header"></thead>
			<tbody id="invoice_list" class="table table-binvoiceed"></tbody>
		</table>
	</div>
</div>
<script type="text/javascript">
$('#invoices_li').addClass('active');
window.onload = function() {
	get_invoices();
};
function date_ddmmyyyy(date){
	var n=date.split("-");
	var result = n[2]+'/'+n[1]+'/'+n[0];
	return result;
}
function search_order(){
	var search_query=$('#search_order').val();
	$.ajax({
		url: '<?php echo URL;?>invoices/search_invoices/'+search_query,
		type: 'GET',
		dataType: 'JSON',
		beforeSend: function(){
			$('#invoice_list_header').empty();
			$('#invoice_list').empty();
			$('.loading_p').show().html('<img src="<?php echo URL;?>assets/apps/img/loading.gif" class="img-circle" style="width:20px; height:20px;">');
		},
		success: function(resp){
			$('.loading_p').empty().hide();
			var count = 0;
			if(resp.length==0){
				
			}
			else{
				$('#invoice_list_header').append('<tr><th>Order Id</th><th>Company</th><th><strong>Contact person</strong></th><th><strong>Mobile</strong></th><th><strong>Booking Station</strong></th><th><strong>devilery_date</strong></th><th><strong>despatch_through</strong></th><th><strong>Action</strong></th></tr>');		
				for(var key in resp){ 
					count = count + 1;
					var booking_station='Rangia';
					
					if(resp[key].booking_station==='GD'){
						booking_station='Guwahati';
					}
					var devilery_date = date_ddmmyyyy(resp[key].devilery_date);
					var actions='<a  class="btn btn-warning btn-mini" href="<?php echo URL;?>admin/print_invoice/'+resp[key].order_id+'" target="_blank"><i class="icon-white icon-print"></i>&nbsp;Invoice</a>&nbsp;&nbsp;<a class="btn btn-info btn-mini" href="<?php echo URL;?>admin/print_challan/'+resp[key].order_id+'" target="_blank"><i class="icon-white icon-print"></i>&nbsp;Challan</a>';
					$('#invoice_list').append('<tr><td>'+resp[key].order_id+'</td><td>'+resp[key].company+'</td><td>'+resp[key].name+'</td><td>'+resp[key].mobile+'</td><td>'+booking_station+'</td><td>'+devilery_date+'</td><td>'+resp[key].despatch_through+'</td><td>'+actions+'</td></tr>');
					}
			}
		}
	});

	
}
function get_invoices(){
	$.ajax({
		url: '<?php echo URL;?>invoices/get_invoices/',
		type: 'GET',
		dataType: 'JSON',
		beforeSend: function(){
			$('#invoice_list_header').empty();
			$('#invoice_list').empty();
		},
		success: function(resp){
			var count = 0;
				if(resp.length==0){
				
			}else{
				$('#invoice_list_header').append('<tr><th>Invoice Id</th><th>Company</th><th><strong>Contact person</strong></th><th><strong>Mobile</strong></th><th><strong>Booking Station</strong></th><th><strong>devilery_date</strong></th><th><strong>despatch_through</strong></th><th><strong>Action</strong></th></tr>');
				
			for(var key in resp){ 
				count = count + 1;
				var booking_station='Rangia';
				
				if(resp[key].booking_station==='GD'){
					booking_station='Guwahati';
				}
				var devilery_date = date_ddmmyyyy(resp[key].devilery_date);
				var actions='<a  class="btn btn-warning btn-mini" href="<?php echo URL;?>admin/print_invoice/'+resp[key].order_id+'" target="_blank"><i class="icon-white icon-print"></i>&nbsp;Invoice</a>&nbsp;&nbsp;<a class="btn btn-info btn-mini" href="<?php echo URL;?>admin/print_challan/'+resp[key].order_id+'" target="_blank"><i class="icon-white icon-print"></i>&nbsp;Challan</a>';
				$('#invoice_list').append('<tr><td>'+resp[key].invoice_id+'</td><td>'+resp[key].company+'</td><td>'+resp[key].name+'</td><td>'+resp[key].mobile+'</td><td>'+booking_station+'</td><td>'+devilery_date+'</td><td>'+resp[key].despatch_through+'</td><td>'+actions+'</td></tr>');
				}
			}
		}
	});
}
</script>
