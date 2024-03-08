<?php $invoice =$this->invoice_data;?>
<script	src="<?php echo URL;?>assets/jquery/jquery-1.9.1.js"></script>
<script	src="<?php echo URL;?>assets/jquery/jquery.min.js"></script>
<script src="<?php echo URL;?>assets/bootstrap/js/bootstrap.js"></script>
<link	href="<?php echo URL;?>assets/apps/css/print.css" rel="stylesheet">
<script src="<?php echo URL;?>assets/apps/js/towords.js"></script>
<div class="container">
	<div class="row">
		<div class="span12">
			<img alt="" src="<?php echo URL;?>assets/apps/img/logo_spl.gif"
				align="left">
			<h3 style=" margin-bottom: 0;" align="center">EXCISE CUM TAX INVOICE<input onfocus="datalistfocus();" id="datalist_type" type="text" list="datalist" value="ORIGINAL FOR BUYER" class="span2 pull-right" style="height: 30px;margin-top: -40px;font-size: 16px;width: 260px;position: absolute;text-indent: 5px;margin-left: 60px;">
				<datalist id="datalist">
					<option value="ORIGINAL FOR BUYER"></option>
					<option value="DUPLICATE FOR TRANSPORTER"></option>
					<option value="TRIPLICATE FOR ASSESSEE"></option>
				</datalist>
			</h3>
			<small style=" margin-left: 10%; ">( Removal of Excisable goods from factory Under Rule 11 of C.E. Rules, 1944, Under Rule 32(5) of the Assam VAT Rules, 2005 )</small>
		</div>
	</div>
	<table class="table table-bordered">
		<tbody>
			<tr>
				<td colspan="5" rowspan="5"><strong style=" font-size: 1.5em; ">Septy Pharmaceuticals Private Limited</strong>
					<br> Registered Office & Works :<br> 
					Septy, P.O. Moranjana, Rangia,District Kamrup<br>
					Assam, India- 781354<br>
					Drug License No.370/DR/Mfg/LVP/2012 dt 6th June, 2012<br>
					Corporate Office: Adams Plaza, Christian Basti, G S<br>
					Road Guwahati-781005, Ph:0361-2341009, www.splcare.com<br/>
					<p><strong>ECC No: AALCS0698CEM001</strong><br>
					Division Guwahati(CE), Commissionerate Guwahati<br>
					Range Barpeta Road
					</p>
					<span style=" float: right; ">
					For, <strong>Septy Pharmaceuticals Pvt. Ltd.</strong><br><br>
					<span style=" float: right; ">Authenticated by</span>
					</span>
					</td>
				<td style=" width: 230px;"><strong>Invoice No</strong>&nbsp; <?php if (isset($invoice[0]['invoice_id']))  {
					echo $invoice[0]['invoice_id']; 
				}?></td>
				<td style=" width: 230px;"><strong>Dated</strong>&nbsp;<?php if (isset($invoice[0]['invoice_date'])) {
					echo date("d-m-Y", strtotime($invoice[0]['invoice_date']));
				}?></td>
			</tr>
			<tr>
				<td><strong>Challan No</strong>&nbsp;<?php if (isset($invoice[0]['invoice_id']))  {
					echo $invoice[0]['invoice_id'];
				}?></td>
				<td><strong>Challan date</strong>&nbsp;<?php if (isset($invoice[0]['invoice_date'])) {
					echo date("d-m-Y", strtotime($invoice[0]['invoice_date']));
				}?></td>
			</tr>
			<tr>
				<td><strong>Delivery Date</strong>&nbsp;<?php if (isset($invoice[0]['devilery_date']))  {
					echo date("d-m-Y", strtotime($invoice[0]['devilery_date']));
				}?></td>
				<td><strong>Mode/Term of Payment</strong>&nbsp;<?php if (isset($invoice[0]['payment_mode'])) {
					echo $invoice[0]['payment_mode'];
				}?></td>
			</tr>
			<tr>
				<td><strong>Suppliers Reference</strong><br></td>
				<td><strong>Vehicle No</strong>&nbsp;<?php if (isset($invoice[0]['vehicle_no'])) {
					echo $invoice[0]['vehicle_no'];
				}?><br></td>
			</tr>
			<tr>
				<td><strong>Buyers Order No.</strong>&nbsp;<?php if (isset($invoice[0]['order_id'])) {
					echo $invoice[0]['order_id'];
				}?>
				</td>
				<td><strong>Dated</strong>&nbsp;<?php if (isset($invoice[0]['order_id'])) {
					echo date("d-m-Y", strtotime($invoice[0]['last_update']));
				}?>
				</td>
				
			</tr>
			
			<tr>
				<td colspan="5" rowspan="3"><strong>Consignee:&nbsp;<?php if (isset($invoice[0]['company'])) {
					echo $invoice[0]['company'];
				}?>
				</strong><br/> <span><?php if (isset($invoice[0]['address'])) {
					echo $invoice[0]['address'];
				}?>, </span>&nbsp; <span><?php if (isset($invoice[0]['city'])) {
					echo $invoice[0]['city'];
				}?>, </span>&nbsp;<span><?php if (isset($invoice[0]['state'])) {
					echo $invoice[0]['state'];
				}?> </span> <?php if (isset($invoice[0]['pin']))  {
					echo $invoice[0]['pin'];
				}?><br/><strong>VAT No:</strong> <?php if (isset($invoice[0]['vat']))
				{
					echo $invoice[0]['vat'];
				}?><br/><strong>CST No:</strong> <?php if (isset($invoice[0]['cst']))
				{
					echo $invoice[0]['cst'];
				}?>&nbsp;<strong>Buyer (if other than consignee):</strong>&nbsp;
				</td>
				<td><strong>Despatch Document No.</strong>&nbsp;<?php if (isset($invoice[0]['despatch_no'])) 
				{
					echo $invoice[0]['despatch_no'];
				}?></td>
				<td><strong>Dated</strong>&nbsp; <?php if (isset($invoice[0]['despatch_date'])) {
					echo date("d-m-Y", strtotime($invoice[0]['despatch_date']));
				}?></td>
			</tr>
			<tr>
				<td><strong>Despatched through</strong>&nbsp; <?php if (isset($invoice[0]['despatch_through'])){
					echo $invoice[0]['despatch_through'];
				}?></td>
				<td><strong>Destination</strong>&nbsp;<?php if (isset($invoice[0]['destination'])){
					echo $invoice[0]['destination'];
				}?></td>
			</tr>
			<tr>
				<td><strong>Terms of Delivery</strong>&nbsp;<?php if (isset($invoice[0]['devilery_terms'])) {
					echo $invoice[0]['devilery_terms'];
				}?></td>
				<td><strong>Booking Station</strong>&nbsp; <?php if ($invoice[0]['booking_station']==='GD') 
				{
					echo 'Guwahati';
				}else{
						echo 'Rangia';
					}?>
				</td>
			</tr>
	
	</table>
	<small class="pull-right"> All prices in INR(<img alt="INR" src="<?php echo URL;?>assets/apps/img/rupee.png" width="7" height="7"/>)</small>
	<table class="table table-bordered table-condensed" id="product_table">
		<thead id="product_header">

		</thead>
		<tbody id="product_list">
		</tbody>
		<tbody id="tax_n_duty_list">
		</tbody>
		
	</table>
	
	<table class="table table-bordered table-condensed">
		<tr>
			<td colspan="7"><small>FORM to receive :<br> Company's VAT TIN :<span
				class="offset1">18740117399</span><br> Company's CST No. :<span
				class="offset1">18489930339</span><br> CST valid from
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<span
				class="offset1">25th August 2009</span></small><br>
				<hr>
				<div>
					<strong>DECLARATION</strong><br><small> We hereby declare that this
					invoice shows the actual price of the goods described and that
					all particulars are true and correct.</small>
					<div class="row">
						<div class="span8">
							<strong>CERTIFICATE</strong><br><small> We hereby certify that the goods
							supplied in this invoice do not contravene in anyway the
							provisions of Sec 10 of Drugs & Cosmetics Act 1940.</small>
						</div>
						<div class="span4 pull-right" style="text-align:right;">
							<span style=" float: right; margin-top: -20px;">For, <strong>Septy Pharmaceuticals Pvt. Ltd.</strong></span><br> <br><br>
							<br><br>Authorised Signatory
						</div>
					</div>
				</div>
			</td>
		</tr>

		</tbody>
	</table>
	<div id="inv_footer">SUBJECT TO GUWAHATI JURISDICTION
	<small class="pull-right">http://glomindz.com</small>
	</div>
	
</div>
<script type="text/javascript"
	src="<?php echo URL;?>assets/apps/js/towords.js">
</script>
<script type="text/javascript">
<!--

//-->
var rupee='<img alt="INR" src="<?php echo URL;?>assets/apps/img/rupee.png" width="10" height="8"/>';
var order_id=0;
var customer_id=0;
var total_price=0;
window.onload = function(){
	
	order_id= <?php echo $invoice[0]['order_id'];?>;
	customer_id=<?php echo $invoice[0]['company_id'];?>;
	get_ordered_product_list();
	get_order_products_footer();

	
};


function get_ordered_product_list(){
	
	var url_product_list ='<?php echo URL;?>invoices/get_ordered_product_list_print_invoice/'+order_id;
	$.ajax({
		url: url_product_list,
		type: 'GET',
		dataType: 'JSON',
		async :false,
		beforeSend: function(){
			$('#product_header').empty().append('<tr><th>#</th><th style=" width: 200px;">Name</th><th style=" width: 80px; ">Package</th><th style=" width: 120px; ">Batch-Exp</th><th>Tarif sub</th><th>Boxes</th><th>Units</th><th>MRP</th><th>Price</th><th style="text-align:right;">Total</th><th>CED</th><th>EC</th><th>SHEC</th><th>Total</th></tr>');
		},
		success: function(resp){
			var count = 0;
			
			for(var key in resp){
				console.log(resp);
				var product_id=key;
				stocks=resp[product_id]['stocks'];
				var price=0;
				var stock_row='';
					for(var stock_id in stocks){
						stock_row=stock_row+' &nbsp;'+stocks[stock_id].batch_id+stocks[stock_id].batch_no+'-&nbsp;'+stocks[stock_id].exp_date+'<br>';
					}
					
				count=count+1;
				var order_quantity=resp[product_id]['quantity'];
				var quantity_in_box=resp[product_id]['quantity_in_box'];
				var unit_price=resp[product_id]['unit_price'];
				var packages=resp[product_id]['volume']+' ml '+resp[product_id]['type'];
				var units = resp[product_id]['quantity']*resp[product_id]['quantity_in_box'];
				price=order_quantity*unit_price*quantity_in_box;
				var total_with_ced = parseFloat(resp[product_id]['central_excise_duty']) + parseFloat(resp[product_id]['education_cess']) + parseFloat(resp[product_id]['higher_education_cess']) + price;
				$('#product_list').append('<tr><td>'+count+'</td><td>'+resp[product_id]['name']+'</td><td>'+packages+'</td><td>'+stock_row+'</td><td>'+resp[product_id]['tariff_sub_heading']+'</td><td>'+resp[product_id]['quantity']+'</td><td>'+units+'</td><td style="text-align:right;">'+parseFloat(resp[product_id]['mrp']).toFixed(2)+'</td><td style="text-align:right;">'+parseFloat(resp[product_id]['unit_price']).toFixed(2)+'</td><td class="pull-right" style="text-align:right;">'+parseFloat(price).toFixed(2)+'</td><td style="text-align:right;">'+resp[product_id]['central_excise_duty']+'</td><td style="text-align:right;">'+resp[product_id]['education_cess']+'</td><td style="text-align:right;">'+resp[product_id]['higher_education_cess']+'</td><td style="text-align:right;">'+parseFloat(total_with_ced).toFixed(2)+'</td></tr>');
				total_price=total_price+price;
				}
			
		}
	});
}
function get_order_products_footer(){
	
	var url_product_list ='<?php echo URL;?>invoices/get_order_products_footer/'+order_id;
	$.ajax({
		url: url_product_list,
		type: 'GET',
		dataType: 'JSON',
		async :false,
		beforeSend: function(){
			
		},
		success: function(resp){
			var total_less_discount = resp.total_amount-resp.discount_amount;

			var discount_type = resp['discount']; 
			var re = /,$/;
			discount_type = discount_type.replace(re, " ");

			var tax_type =resp['tax'];
			tax_type = tax_type.substring(0, tax_type.length - 2);
			
			
			var total_ced = parseFloat(resp['central_excise_duty']) + parseFloat(resp['education_cess']) + parseFloat(resp['higher_education_cess']);
			total_ced = parseFloat(total_ced).toFixed(2);
			$('#tax_n_duty_list').append('<tr><td colspan="5" rowspan="9">'
					+'Date of Preparation: <?php if (isset($invoice[0]['invoice_date'])) {
						echo date("d-m-Y", strtotime($invoice[0]['invoice_date']));
					}?><br/>'
					+'Time of Preparation: <?php 
					if (isset($invoice[0]['last_update'])) {
						$str = explode(" ",$invoice[0]['last_update']);
						echo $str[1];	
					}
					?><br/>'
					+'Date of Removal: <?php if (isset($invoice[0]['despatch_date'])) {
						echo date("d-m-Y", strtotime($invoice[0]['despatch_date']));
					}?><br/>'
					+'Time of Removal: <?php 
					if (isset($invoice[0]['last_update'])) {
						$str = explode(" ",$invoice[0]['last_update']);
						echo $str[1];	
					}
					?><br/>'
					+'Receiving Station:<?php if (isset($invoice[0]['destination'])) {
						echo $invoice[0]['destination'];
					}?><br/>' 
					+'</td><td colspan="4">Central Excise Duty</td><td colspan="5" style="text-align:right;">'+parseFloat(resp['central_excise_duty']).toFixed(2)+'</td></tr>');
			
			$('#tax_n_duty_list').append('<tr><td colspan="4">Education Cess@2%on CED</td><td colspan="5" style="text-align:right;">'+parseFloat(resp['education_cess']).toFixed(2)+'</td></tr>');
			$('#tax_n_duty_list').append('<tr><td colspan="4">Secondary and Higher education cess@1%on CED</td><td colspan="5" style="text-align:right;">'+parseFloat(resp['higher_education_cess']).toFixed(2)+'</td></tr>');
			
			var totalplusced = parseFloat(total_ced) + parseFloat(total_price);
			$('#tax_n_duty_list').append('<tr><td colspan="4"><strong>Total After Central Excise Duty</strong></td><td colspan="5" style="text-align:right;">'+parseFloat(totalplusced).toFixed(2)+'</td></tr>');
			$('#tax_n_duty_list').append('<tr><td colspan="4">Discount('+discount_type+')</td><td colspan="5" style="text-align:right;">'+parseFloat(resp['discount_amount']).toFixed(2)+'</td></tr>');
			var totalminusdiscount = parseFloat(totalplusced) - parseFloat(resp['discount_amount']);
			
			$('#tax_n_duty_list').append('<tr><td colspan="4"><strong>Total After Discount</strong></td><td colspan="5" style="text-align:right;">'+parseFloat(totalminusdiscount).toFixed(2)+'</td></tr>');
			$('#tax_n_duty_list').append('<tr><td colspan="4">Tax('+tax_type+')</td><td colspan="5" style="text-align:right;">'+parseFloat(resp['tax_amount']).toFixed(2)+'</td></tr>');
			
			var totalplustax = parseFloat(totalminusdiscount) + parseFloat(resp['tax_amount']);
			$('#tax_n_duty_list').append('<tr><td colspan="4"><strong>Total After Tax</strong></td><td colspan="5" style="text-align:right;">'+parseFloat(totalplustax).toFixed(2)+'</td></tr>');
			$('#tax_n_duty_list').append('<tr><td colspan="4">Round off</td><td colspan="5" style="text-align:right;">'+parseFloat(resp['round_off']).toFixed(2)+'</td></tr>');
			$('#tax_n_duty_list').append('<tr><td colspan="5"><strong>Total Central Excise Duty:<strong> <img alt="INR" src="<?php echo URL;?>assets/apps/img/rupee.png" width="7" height="7"/>'+total_ced+'</td><td colspan="4"><strong>Total Invoice Value(<img alt="INR" src="<?php echo URL;?>assets/apps/img/rupee.png" width="7" height="7"/>)</strong></td><td colspan="5" style="text-align:right;">'+parseFloat(resp['bill_amount']).toFixed(2)+'</td></tr>');

			$('#tax_n_duty_list').append('<tr><td colspan="5"><strong>In Words:</strong> '+toWords(total_ced)+'</td><td colspan="9"><strong>In Words:</strong>'+toWords(parseFloat(resp['bill_amount']).toFixed(2))+'</td></tr>');

			$('#product_list').append('<tr><td></td><td></td><td></td><td colspan=4><strong>Total Price</strong></td><td></td><td></td><td style="text-align:right;">'+parseFloat(total_price).toFixed(2)+'</td><td style="text-align:right;">'+parseFloat(resp['central_excise_duty']).toFixed(2)+'</td><td style="text-align:right;">'+parseFloat(resp['education_cess']).toFixed(2)+'</td><td style="text-align:right;">'+parseFloat(resp['higher_education_cess']).toFixed(2)+'</td><td style="text-align:right;">'+parseFloat(totalplusced).toFixed(2)+'</td></tr>');
		}
	});
}

function datalistfocus(){
	$('#datalist_type').val('');
}
</script>

