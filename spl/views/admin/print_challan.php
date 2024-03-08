<?php $invoice =$this->invoice_data;?>
<script	src="<?php echo URL;?>assets/jquery/jquery-1.9.1.js"></script>
<script	src="<?php echo URL;?>assets/jquery/jquery.min.js"></script>
<script	src="<?php echo URL;?>assets/bootstrap/js/bootstrap.js"></script>
<link href="<?php echo URL;?>assets/apps/css/print.css" rel="stylesheet">
<div class="container">
	<div class="row">
		<div class="row span12">
			<img alt="" src="<?php echo URL;?>assets/apps/img/logo_spl.gif"
				align="left">
			<h3 align="center">
				CHALLAN<input onfocus="datalistfocus();" id="datalist_type" type="text" list="datalist" value="ORIGINAL FOR BUYER" class="span2 pull-right" style="height: 30px;margin-top: -40px;font-size: 16px;width: 260px;position: absolute;text-indent: 5px;margin-left: 160px;">
				<datalist id="datalist">
					<option value="ORIGINAL FOR BUYER"></option>
					<option value="DUPLICATE FOR TRANSPORTER"></option>
					<option value="TRIPLICATE FOR ASSESSEE"></option>
				</datalist>
			</h3>
		</div>
		<table class="table table-bordered">
			<tbody>
				<tr>
					<td colspan="5" rowspan="5"><strong>Septy Pharmaceuticals Private
							Limited</strong><br> Registered Office & Works :<br> Septy, P.O.
						Moranjana, Rangia,District Kamrup<br> Assam, India- 7810354<br>
						Drug License No.370/DR/Mfg/LVP/2012 dt 6th June, 2012<br>
						Corporate Office: Adams Plaza, Christian Basti, G S<br> Road
						Guwahati -781005, Ph:0361-2341009, www.splcare.com<br></td>

				</tr>
				<tr>
					<td><strong>Challan No</strong>&nbsp; <?php if (isset($invoice[0]['invoice_id'])) 
					{
						echo $invoice[0]['invoice_id'];
					}?></td>
					<td><strong>Challan date</strong>&nbsp; <?php if (isset($invoice[0]['invoice_date'])) 
					{
						echo date("d-m-Y", strtotime($invoice[0]['invoice_date']));
					}?></td>
				</tr>
				<tr>
					<td><strong>Delivery Date</strong>&nbsp; <?php if (isset($invoice[0]['devilery_date'])) 
					{
						echo date("d-m-Y", strtotime($invoice[0]['devilery_date']));
					}?></td>
					<td><strong>Vehicle No</strong>&nbsp;<?php if (isset($invoice[0]['vehicle_no'])) {
					echo $invoice[0]['vehicle_no'];
				}?><br></td>
				</tr>
				<tr>
				</tr>
				<tr>
					<td><strong>Buyers Order No.</strong>&nbsp; <?php if (isset($invoice[0]['order_id'])) 
					{
						echo $invoice[0]['order_id'];
					}?></td>
					<td><strong>Dated</strong>&nbsp;</td>
				</tr>
				<tr>
					<td colspan="5" rowspan="3"><strong>Consignee:&nbsp;&nbsp;<?php if (isset($invoice[0]['company'])) 
					{
						echo $invoice[0]['company'];
					}?>
					</strong> <br> <span class="offset1"><?php if (isset($invoice[0]['address']))
					{
						echo $invoice[0]['address'];
					}?> </span> <br> <span class="offset1"><?php if (isset($invoice[0]['city']))
					{
						echo $invoice[0]['city'];
					}?> </span><br> <span class="offset1"><?php if (isset($invoice[0]['state']))
					{
						echo $invoice[0]['state'];
					}?> </span> <?php if (isset($invoice[0]['pin']))
					{
						echo $invoice[0]['pin'];
					}?><br> <strong>VAT No:</strong> <?php if (isset($invoice[0]['vat']))
					{
						echo $invoice[0]['vat'];
					}?><br> <strong>CST No:</strong> <?php if (isset($invoice[0]['cst']))
					{
						echo $invoice[0]['cst'];
					}?><br> <strong>Buyer(if other than consignee):</strong><br></td>
					<td><strong>Despatch Document No.</strong><br> <?php if (isset($invoice[0]['despatch_no'])) 
					{
						echo $invoice[0]['despatch_no'];
					}?></td>
					<td><strong>Dated</strong><br> <?php if (isset($invoice[0]['despatch_date'])) 
					{
						echo date("d-m-Y", strtotime($invoice[0]['despatch_date']));
					}?></td>
				</tr>
				<tr>
					<td><strong>Despatched through</strong><br> <?php if (isset($invoice[0]['despatch_through'])) 
					{
						echo $invoice[0]['despatch_through'];
					}?></td>
					<td><strong>Destination</strong><br> <?php if (isset($invoice[0]['destination'])) 
					{
						echo $invoice[0]['destination'];
					}?></td>
				</tr>
				<tr>
					<td><strong>Terms of Delivery</strong><br> <?php if (isset($invoice[0]['devilery_terms'])) 
					{
						echo $invoice[0]['devilery_terms'];
					}?></td>
					<td><strong>Booking Station</strong><br> <?php if ($invoice[0]['booking_station']==='GD') 
					{
						echo 'Guwahati';
					}else{
						echo 'Rangia';
					}?></td>
				</tr>
		
		</table>
		<table class="table table-bordered table-condensed" id="product_table">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Package</th>
					<th>Batch-Exp date</th>
					<th>Total Units</th>
					<th>Boxes</th>
				</tr>
			</thead>
			<tbody id="product_list">
			</tbody>
		</table>
		<table class="table table-bordered table-condensed">

			<tr>
				<td colspan="7"><strong>Company's VAT TIN :</strong><span
					class="offset1">18740117399</span><br> <strong>Company's CST No. :</strong><span
					class="offset1">18489930339</span><br> <strong>CST valid from
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong><span
					class="offset1">25th August 2009</span><br>
					<hr>
					<div class="row">
						<div class="span8">
							<strong>TERMS AND CONDITION</strong><br> 1 Item, quality and
							fitness must be verified before delevery<br> 2 Our liability
							towards damage or leakage once googs<br> are delivery at buyers
							premises or to Buyers Agent
						</div>
						<div class="span4 pull-right" style="text-align:right;">
							For, <strong>Septy Pharmaceuticals Pvt. Lid.</strong>
							<br>
							<br><br>
							Authorised Signatory
						</div>
					</div>
				</td>
			</tr>

			</tbody>
		</table>
		<div id="inv_footer">SUBJECT TO GUWAHATI JURISDICTION</div>
		<p class="pull-right">
			<small>http://glomindz.com</small>
		</p>
	</div>
</div>
<script type="text/javascript">
<!--

//-->
var order_id=0;
var customer_id=0;

window.onload = function(){
	
	order_id= <?php echo $invoice[0]['order_id'];?>;
	customer_id=<?php echo $invoice[0]['company_id'];?>;
	get_ordered_product_list();
};
function get_ordered_product_list(){
	
	var url_product_list ='<?php echo URL;?>invoices/get_ordered_product_list_print_invoice/'+order_id;
	$.ajax({
		url: url_product_list,
		type: 'GET',
		dataType: 'JSON',
		beforeSend: function(){
			
		},
		success: function(resp){
			var count = 0;
			var total_quantity=0;
			for(var key in resp){ 
				var product_id=key;
				stocks=resp[product_id]['stocks'];
				var stock_row='';
				for(var stock_id in stocks){
					console.log(stocks[stock_id]);
					stock_row=stock_row+' &nbsp;'+stocks[stock_id].batch_id+stocks[stock_id].batch_no+'-&nbsp;'+stocks[stock_id].exp_date+' ( &nbsp;'+stocks[stock_id].quantity_from_batch+' box)<br>';
				}
				count=count+1;
				var order_quantity=resp[product_id]['quantity'];
				var quantity_in_box=resp[product_id]['quantity_in_box'];
				var packages=resp[product_id]['volume']+' ml '+resp[product_id]['type']+'&nbsp;'+quantity_in_box+' Units';
				var total_units=order_quantity*quantity_in_box;
				$('#product_list').append('<tr><td>'+count+'</td><td>'+resp[product_id]['name']+'</td><td>'+packages+'</td><td>'+stock_row+'</td><td>'+total_units+'</td><td>'+resp[product_id]['quantity']+'</td></tr>');
				total_quantity=total_quantity+parseInt(order_quantity);
				}
			$('#product_list').append('<tr><td>#</td><td></td><td></td><td></td><td></td><td></td></tr>');
			$('#product_list').append('<tr><td></td><td></td><td><strong>Total</strong></td><td><td></td><td>'+total_quantity+'</td></tr>');
			
			$("#product_table").show();
		}
	});
}

function datalistfocus(){
	$('#datalist_type').val('');
}
</script>
