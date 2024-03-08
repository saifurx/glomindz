<?php $invoice = $this->stn_data;?>

<script
	src="<?php echo URL;?>assets/jquery/jquery-1.9.1.js"></script>
<script
	src="<?php echo URL;?>assets/jquery/jquery.min.js"></script>
<script
	src="<?php echo URL;?>assets/bootstrap/js/bootstrap.js"></script>
<link
	href="<?php echo URL;?>assets/apps/css/print.css" rel="stylesheet">
<div class="container">
	<div class="row">
		<div class="row span12">
			<img alt="" src="<?php echo URL;?>assets/apps/img/logo_spl.gif"
				align="left">
			<h3 align="center">
				STN <input onfocus="datalistfocus();" id="datalist_type" type="text" list="datalist" value="ORIGINAL"
					class="span2 pull-right" style="height: 30px;">
				<datalist id="datalist">
					<option value="ORIGINAL"></option>
					<option value="DUPLICATE"></option>
					<option value="TRIPLICATE"></option>
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
					<td><strong>STN No<br>
					</strong><br> <?php if (isset($invoice[0]['id'])) {
						echo $invoice[0]['id'];
					}?>
					</td>
					<td><strong>Dated<br>
					</strong><br> <?php if (isset($invoice[0]['despatch_date'])) {
						echo $invoice[0]['despatch_date'];
					}?>
					</td>
				</tr>
				<tr>
					<td><strong>Transporter's Ref.</strong><br> <?php if (isset($invoice[0]['id'])) {
						echo $invoice[0]['id'];
					}?></td>
					<td><strong>Vehicle No.</strong><br> <?php if (isset($invoice[0]['vehicle_no']))  {
						echo $invoice[0]['vehicle_no'];
					}?></td>
				</tr>
				<tr>
					<td><strong>STA No.</strong><br> <?php if (isset($invoice[0]['id'])){
						echo $invoice[0]['id'];
					}?></td>
					<td><strong>Date</strong><br> <?php if (isset($invoice[0]['despatch_date'])) {
						echo $invoice[0]['despatch_date'];
					}?></td>
				</tr>
				<tr>
					<td><strong>Despatch Doc No.</strong><br> <?php if (isset($invoice[0]['id'])){
						echo $invoice[0]['id'];
					}?></td>
					<td><strong>Date</strong><br> <?php if (isset($invoice[0]['despatch_date'])) {
						echo $invoice[0]['despatch_date'];
					}?></td>
				</tr>
				<tr>
					<td><strong>Despatch Through</strong><br> <?php if (isset($invoice[0]['despatch_through'])){
						echo $invoice[0]['despatch_through'];
					}?></td>
					<td><strong>Description</strong><br> <?php if (isset($invoice[0]['despatch'])) {
						echo $invoice[0]['despatch'];
					}?></td>
				</tr>
				<tr>
					<td colspan="7" rowspan=""><strong>To,</strong><br> <strong>Septy
							Pharmaceuticals Private Limited</strong> <br>Corporate Office<br>7th
						Floor, ADAMS Plaza <br>Christian Basti, Guwahati-781005 <br>Assam
					</td>


				</tr>
			</tbody>
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
				<td colspan="7"><br>
					<div id="stn_note">
						<strong>NOTE : STOCK TRANSFER FROM PLANT TO COMPANY DEPOT</strong>
					</div>
					<hr>
					<p>
						<small> Company's VAT TIN :<span class="offset1">18740117399</span><br>
							Company's CST No. :<span class="offset1">18489930339</span><br>
							CST valid from &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<span
							class="offset1">25th August 2009</span>
						</small>
					
					<p>
					
					<div class="row">
						<div class="span8">
							<strong>Decleration:</strong> <br> <small>We declare that this
								stock transfer shows the actual description of the <br> goods
								and that all particulars are true and correct.
							</small>
						</div>
						<div class="span4 pull-right" style="text-align: right;">
							For, <strong>Septy Pharmaceuticals Pvt. Ltd.</strong><br> <br> <br>Authorised
							Signatory
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
var stn_id=0;
window.onload = function(){
	stn_id = <?php echo $invoice[0]['id'];?>;
	get_stn_product_list(stn_id);
	
};

function get_stn_product_list(stn_id){
	$.ajax({
		url: '<?php echo URL;?>stocks/get_stn_product_list/'+stn_id,
		dataType: 'JSON',
		type: 'GET',
		beforeSend: function(){
			$('#product_list').empty();
		},
		success: function(resp){
			console.log(resp);
			if(resp.length!=0){
				var count=0;
				var total_box=0;
				for(i in resp){
					count=count+1;
					total_box=parseInt(resp[i].quantity)+ total_box;
					var total_unit=resp[i].quantity*resp[i].quantity_in_box;
					$('#product_list').append('<tr><td>'+count+'</td><td>'+resp[i].name+'</td><td>'+resp[i].volume+' ml '+resp[i].type+' ( '+resp[i].quantity_in_box+' Nos in Box)</td><td>'+resp[i].batch_id+''+resp[i].batch_no+'-'+resp[i].exp_date+'</td><td>'+total_unit+'</td><td>'+resp[i].quantity+'</td></tr>');
				}
				$('#product_list').append('<tr><td>#</td><td></td><td></td><td></td><td></td><td></td></tr>');
				$('#product_list').append('<tr><td></td><td></td><td><strong>Total Boxes</strong></td><td></td><td></td><td><strong>'+total_box+'</strong></td></tr>');
			}
		}			
	});
}

function datalistfocus(){
	$('#datalist_type').val('');
}
</script>
