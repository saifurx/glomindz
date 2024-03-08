<style>
	#item_discount,
	#item_tax,
	#save_order_btn,
	#add_discount_n_tax{
		display: none;
	}
</style>

<?php
$customer =$this->customer;
//print_r($customer);
?>

<div class="container-fluid" id="main" style="margin-bottom: 40px;  ">
	<div id="new_order">
		<h4>
			Order No: #
			<?php echo $this->order_id;?>
			<span class="small pull-right"><?php echo date("F j, Y, g:i a");?> </span>
		</h4>
		<hr>
		<div class="row-fluid">
			<div class="span3">
				<form id="save_order_form">
					<input type="text" id="customer_name" class="input-large"
						placeholder="Customer Name" readonly="readonly"
						value="<?php echo $customer['company'];?>" /> <input type="hidden"
						name="customer_id" id="customer_id"
						value="<?php echo $customer['customer_id'];?>"> <input type="text"
						class="input-large" name="booking_station" readonly="readonly"
						value="<?php echo $customer['booking_station'];?>" /> <input
						type="text" name="prefered_delivery_date"
						id="prefered_delivery_date"
						placeholder="<?php echo $customer['prefered_delivery_date'];?>"> <select
						name="prefered_payment">
						<option class="option_lable">--Prefered Payment--</option>
						<option value="Cash">Cash</option>
						<option value="Online">Online</option>
						<option value="Cheque/Draft">Cheque/Draft</option>
					</select> <select name="reference"> <!--  <input name="reference" type="text"	placeholder="Reference">-->
						<option value="0" class="option_lable">--Reference--</option>
						<option value="Akan">Akan</option>
						<option value="Nitul">Nitul</option>
						<option value="Naba">Naba</option>
						<option value="Uttam">Uttam</option>
						<option value="Amit">Amit</option>
					</select>  <select name="terms_of_delivery">
						<option class="option_lable">--Terms of delivery--</option>
						<option value="Advance">Advance</option>
						<option value="Full Payment">Full Payment</option>
						<option value="Installment">Installment</option>
						<option value="Credit">Credit</option>
					</select> <input type="hidden" name="order_id"
						value="<?php echo $this->order_id;?>"> <input type="text"
						name="prefered_transport" placeholder="Prefered transport"> <input
						type="number" name="discount_request"
						placeholder="Discount Request">
				</form>
			</div>
			<div class="span9">
				<div class="alert alert-error hide">
					<button class="close" data-dismiss="alert">&times;</button>
					This Customer Rating is <strong>Excelent</strong>
				</div>
				<form class="form-inline" id="add_cart_form">
					<input class="input-mini disabled" id="disabledInput" type="text"
						placeholder="#" disabled="disabled"> <input type="text" class=""
						name="product_name" id="product_name" placeholder="Products"
						autocomplete="off" /> <select name="package_id"
						class="input-xlarge">
						<option class="option_lable">Package Type</option>
						<?php foreach ($this->package as $package_type){?>
						<option value="<?php echo $package_type['id'];?>">
							<?php echo $package_type['volume'].' '.$package_type['unit_type'].' '.$package_type['type'].' ( '.$package_type['quantity_in_box'].' Nos in Box)';?>
						</option>
						<?php }?>
					</select> <input type="number" class="input-mini"
						placeholder="Boxes" name="quantity"> <input type="hidden"
						name="order_id" value="<?php echo $this->order_id;?>">
					<button type="submit" class="btn btn-primary" id="btn_add_cart">Add Item</button>
					<div id="hidden_product_id">
						<input type="hidden" name="product_id" id="product_id">
					</div>
					<input type="hidden" name="customer_id"
						value="<?php echo $customer['customer_id'];?>">
				</form>
				<div class="alert alert-error" id="add_item_error"></div>

				<table class="table table-condensed table-bordered table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Item Name</th>
							<th colspan="2" style="text-align: center;">Stocks (in Box)</th>
							<th>Boxes</th>
							<th>Units</th>
							<th>Price/Unit</th>
							<th>Price</th>
							<th>CED</th>
                            <th>Edu Cess</th>
                            <th>SH Edu Cess</th>
                            <th>Total</th>
                            <th><i class="icon-remove"></i></th>
						</tr>
						<tr>
                            <th></th>
                            <th></th>
                            <th>GD</th>
                            <th>RD</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
						</tr>
					</thead>
					<tbody id="item_table_row">
					</tbody>
  					<tbody id="item_tax_central">
                    </tbody>
					<tbody id="item_discount">
					</tbody>
					<tbody id="item_tax">
					</tbody>
				</table>
				<button type="button" class="btn btn-success pull-right" id="add_discount_n_tax" onclick="add_discount_n_tax();">Add Discount & Tax</button>
				<button type="button" class="btn btn-danger" id="cancel_order_btn">Cancel Order</button>
				<button type="button" class="btn btn-success pull-right" id="save_order_btn">Save Order</button>
			</div>
		</div>
	</div>
</div>


<script
	src="<?php echo URL;?>assets/bootstrap/js/bootstrap-typeahead.js"></script>
<script type="text/javascript">
$('#orders_li').addClass('active');
var total_price=0.00;

var discount_total=0.00;
var total_after_discount=0.00;
var tax_total=0.00;
var round_off=0.00;
var total_bill=0.00;

var central_excise_duty = 0.00;
var education_cess = 0.00;
var higer_education_cess = 0.00;
var total_price_after_excise=0.00;

var discount_ids= new Array();
var tax_ids= new Array();
var applied_discounts= new Array();
var applied_taxs= new Array();
var order_id=<?php echo $this->order_id;?>;
$('#loadingContainer')
.hide()  // at first, just hide it
.ajaxStart(function() {
    $(this).show();
    $('#main').hide();
})
.ajaxStop(function() {
    $(this).hide();
    $('#main').show();
});
function reset_calculation(){
	total_bill=0.00;
	round_off=0.00;
	discount_total=0.00;
	tax_total=0.00;
	total_after_discount=0.00;
}
function get_discounts(customer_id) {
	$('#item_tax_central').append('<tr><td><strong>Total</strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td class="total_price">' + total_price + '</td><td class="ced">' + central_excise_duty + '</td><td class="edu_cess">' + education_cess + '</td><td class="higher_edu">' + higer_education_cess + '</td><td class="total_price_after_excise">' + total_price_after_excise + '</td><td></td></tr>');
	$('#item_discount').append('<tr><td><strong>Total</strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td class="total_price">'+total_price+'</td><td class="ced">'+central_excise_duty+'</td><td class="edu_cess">'+education_cess+'</td><td class="higher_edu">'+higer_education_cess+'</td><td class="total_price_after_excise">'+total_price_after_excise+'</td><td></td></tr>');
	$('#item_discount').append('<tr><td><strong>Discounts</strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
	$.ajax({
		url: '<?php echo URL;?>admin/get_discounts/'+customer_id,
		type: 'GET',
		dataType: 'JSON',
		async: true,
		success: function(data) {
			var i=0;
			for(var key in data){ 
				var discount_id=data[key].id;
				var dis_id='discount_'+discount_id;
				var remove_id='remove_dis_'+discount_id;
				var dis_val='dis_val_'+discount_id;
				discount_ids[i]=discount_id;
				var apply_discount='<a href="#" onclick="apply_discount('+discount_id+','+data[key].percentage+');" id="'+dis_id+'"><span class="label label-warning">apply</span></a>';
				var remove_discount='<a href="#" onclick="remove_discount('+discount_id+','+data[key].percentage+');" id="'+remove_id+'" style="display:none;"><span class="label label-inverse">remove</span></a>';
				$('#item_discount').append('<tr><td></td><td>'+data[key].name+'&nbsp;&nbsp;'+apply_discount+'</td><td></td><td></td><td></td><td></td><td>'+data[key].percentage+'&nbsp;%</td><td></td><td></td><td></td><td></td><td id="'+dis_val+'"></td><td>'+remove_discount+'</td></tr>');
				i++;
			}
			$('#item_discount').append('<tr><td><strong>Total(after discount)</strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td id="total_after_discount">'+parseFloat(total_after_discount).toFixed(2)+'</td><td></td></tr>');
		}
	});
}
function get_taxes(customer_id) {
	$('#item_tax').empty();
	$('#item_tax').append('<tr><td><strong>Tax</strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
	
	$.ajax({
		url: '<?php echo URL;?>admin/get_taxes/'+customer_id,
		type: 'GET',
		dataType: 'JSON',
		async: true,
		success: function(data) {
			var i=0;
			for(var key in data){ 
				var dis_id='tax_'+data[key].id;
				var dis_val='tax_val_'+data[key].id;
				var remove_id='remove_tax_'+data[key].id;
				tax_ids[i]=data[key].id;
				var apply_tax='<a href="#" onclick="apply_tax('+data[key].id+','+data[key].percentage+');" id="'+dis_id+'"><span class="label label-important">apply</span></a>';
				var remove_tax='<a href="#" onclick="remove_tax('+data[key].id+','+data[key].percentage+');" id="'+remove_id+'" style="display:none;"><span class="label label-inverse">remove</span></a>';
				$('#item_tax').append('<tr><td></td><td>'+data[key].name+'&nbsp;&nbsp;'+apply_tax+'</td><td></td><td></td><td></td><td></td><td>'+data[key].percentage+'&nbsp;%</td><td></td><td></td><td></td><td></td><td id="'+dis_val+'"></td><td>'+remove_tax+'</td></tr>');
				i++;
	
			}
			$('#item_tax').append('<tr><td><strong>Roundoff</strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td id="round_off">'+round_off+'</td><td></td></tr>');
			$('#item_tax').append('<tr><td><strong>Total payable</strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td id="total_bill">'+total_bill+'</td><td></td></tr>');
					
		}
	});
}
function apply_discount(id,percentage){
	var dis_id='discount_'+id;
	var remove_id='remove_dis_'+id;
	var dis_val='dis_val_'+id;
	$('#'+dis_id).hide();
	$('#'+remove_id).show();
	var discount=total_price_after_excise*percentage/100;
	$('#'+dis_val).empty().append(parseFloat(discount).toFixed(2));
	discount_total=discount_total+discount;
	applied_discounts.push(id);
	reset_taxes();
	calculate_order();
}
function apply_tax(id,percentage){
	var tax_id='tax_'+id;
	var tax_val='tax_val_'+id;
	var remove_id='remove_tax_'+id;

	$('#'+tax_id).hide();
	$('#'+remove_id).show();

	var tax=total_after_discount*percentage/100;

	$('#'+tax_val).empty().append(parseFloat(tax).toFixed(2));
	tax_total=tax_total+tax;
	applied_taxs.push(id);
	calculate_order();
}

function remove_discount(id,percentage){
	var dis_id='discount_'+id;
	var dis_val='dis_val_'+id;
	var remove_id='remove_dis_'+id;
	
	$('#'+dis_id).show();
	$('#'+dis_val).empty().append(0);

	var discount=total_price*percentage/100;
	discount_total=discount_total-discount;
	$('#'+remove_id).hide();
	var index = applied_discounts.indexOf(id);
	applied_discounts.splice(index, 1);
	reset_taxes();
	calculate_order();
}
function remove_tax(id,percentage){
	var tax_id='tax_'+id;
	var tax_val='tax_val_'+id;
	var remove_id='remove_tax_'+id;

	
	$('#'+tax_id).show();
	$('#'+tax_val).empty().append(0);
	$('#'+remove_id).hide();
	var tax=total_after_discount*percentage/100;
	tax_total=tax_total-tax;
	
	var index = applied_taxs.indexOf(id);
	applied_taxs.splice(index, 1);
	calculate_order();
}
function reset_taxes(){
	for(var i=0;i<tax_ids.length;i++){
		var tax_id='tax_'+tax_ids[i];
		var tax_val='tax_val_'+tax_ids[i];
		var remove_id='remove_tax_'+tax_ids[i];
		$('#'+tax_id).show();
		$('#'+tax_val).empty().append(0);
		$('#'+remove_id).hide();
	}
	tax_total=0.00;
}
var customer_id=0;

$(document).ready(function(){
	customer_id=<?php echo $customer['customer_id']; ?>;
	$("#prefered_delivery_date").datepicker({ dateFormat: "yy-mm-dd" });
	
	$('#loadingContainer')
	.hide()  // at first, just hide it
	.ajaxStart(function() {
	    $(this).show();
	    $('#main').hide();
	})
	.ajaxStop(function() {
	    $(this).hide();
	    $('#main').show();
	});
	
	get_short_code();
	get_product_list();
	get_discounts(customer_id);
	get_taxes(customer_id);
});


function get_product_list(){
	$('#add_discount_n_tax').show();
	$.ajax({
		url: '<?php echo URL;?>orders/get_product_list/<?php echo $this->order_id;?>',
		type: 'GET',
		dataType: 'JSON',
		async: true,
		success: function(data) {
			
			for(var key in data){ 
				count=count+1;
				var array_element=data[key];
				console.log(array_element);
				var availibilityGD='NA';
				var availibilityRD='NA';
				//if(array_element[0].availibilityGD == null){array_element[0].availibilityGD='NA';};
				//if(array_element[0].availibilityRD == null){array_element[0].availibilityRD='NA';};
				var ced = array_element['central_excise_duty'];
				var units =  array_element['quantity'] * array_element['quantity_in_box'];
				var price =  units * array_element['unit_price'];
				total_price=total_price+price;
				
				var total_with_ced = parseFloat(array_element['central_excise_duty']) + parseFloat(array_element['education_cess']) + parseFloat(array_element['higher_education_cess']) + price; 
				
				$('#item_table_row').append('<tr id="order_item_row_'+array_element['order_item_id']+'"><td style="display:none;">'+array_element['order_item_id']+'</td><td>'+count+'</td><td>'+array_element['name']+'</td><td>'+availibilityGD+'</td><td>'+availibilityRD+'</td><td>'+array_element['quantity']+'</td><td>'+units+'</td><td>'+array_element['unit_price']+'</td><td>'+price+'</td><td>'+ced+'</td><td>'+array_element['education_cess']+'</td><td>'+array_element['higher_education_cess']+'</td><td>'+total_with_ced+'</td><td><a href="#" onclick="delete_product('+array_element['order_item_id']+','+price+');"><i class="icon-remove"></i></a></td></tr>');
				$('.total_price').empty().append(total_price);
				calculate_central_excise();
				apply_final();
			}
		}
	});
}

var product_list = [];

function get_short_code(){
	$.ajax({
		url: '<?php echo URL;?>product/get_short_code/',
		type: 'GET',
		dataType: 'JSON',
		success: function(data) {
			product_list=data;
			
		}
	});
}
$('#product_name').focus(function() {
	//console.log(return_list);
    $('#product_name').typeahead({
        source: product_list,
        itemSelected: function(resp){
            //var name = $('#product_name').val();
            $('#product_id').val(resp);
            //console.log(name+'::'+resp);  
            //$('#hidden_product_name').empty().append('<input type="hidden" name="product_name" value="'+name+'"/>');      
        }
    });
});
var count=0;
$('#btn_add_cart').click(function(){
	$('#btn_add_cart').attr('disabled',true).html('Adding');
	var formData = $('form#add_cart_form').serialize();
	//formData.push('id',product_id);
	$('#add_item_error').empty();
	$('#add_item_error').hide();
	$.ajax({
		url:'<?php echo URL;?>orders/add_cart',
		type:'POST',
		data: formData,
		dataType:'json',
		  success: function(resp){
			    $('#btn_add_cart').attr('disabled',false).html('Add Item');
				var array_element = resp;
				console.log(array_element);
				if(array_element['error']!=''){
					
					$('#add_item_error').append('<strong>Oh snap! </strong> '+array_element['error']);
					$('#add_item_error').show();
					}else{
						count=count+1;
						if(array_element[0].availibilityGD == null){array_element[0].availibilityGD='NA';};
						if(array_element[0].availibilityRD == null){array_element[0].availibilityRD='NA';};
						var units =  array_element['quantity'] * array_element['quantity_in_box'];
						var price =  units * array_element['unit_price'];
						
						total_price=total_price+price;
						var total_with_ced = (array_element['central_excise_duty'] + array_element['education_cess'] + array_element['higher_education_cess']) + price;
						
						$('#item_table_row').append('<tr id="order_item_row_'+array_element['order_item_id']+'"><td style="display:none;">'+array_element['order_item_id']+'</td><td>'+count+'</td><td>'+array_element['product_name']+'</td><td>'+array_element[0].availibilityGD+'</td><td>'+array_element[0].availibilityRD+'</td><td>'+array_element['quantity']+'</td><td>'+units+'</td><td>'+array_element['unit_price']+'</td><td>'+price+'</td><td>'+array_element['central_excise_duty'] + '</td><td>' + array_element['education_cess'] + '</td> <td>' + array_element['higher_education_cess'] + '</td><td>'+ total_with_ced + '</td> <td><a href="#" onclick="delete_product('+array_element['order_item_id']+','+price+');"><i class="icon-remove"></i></a></td></tr>');
						$('.total_price').empty().append(total_price);
						calculate_central_excise();
						reset_calculation();
						apply_final();
						$('#add_cart_form').each(function(){this.reset();});
					}
			  }
	});
	return false;
});

function calculate_central_excise() {
    central_excise_duty = parseFloat(Math.round(total_price * 2) / 100).toFixed(2);
    education_cess = parseFloat(Math.round(central_excise_duty * 2) / 100).toFixed(2);
    higer_education_cess = parseFloat(Math.round(central_excise_duty * 1) / 100).toFixed(2);
    $('.ced').empty().append(parseFloat(central_excise_duty));
    $('.edu_cess').empty().append(parseFloat(education_cess));
    $('.higher_edu').empty().append(parseFloat(higer_education_cess));
    total_price_after_excise=parseFloat(total_price)+parseFloat(central_excise_duty)+parseFloat(education_cess)+parseFloat(higer_education_cess);
    $('.total_price_after_excise').empty().append(parseFloat(total_price_after_excise).toFixed(2));
    
}

function apply_final(){
	for(var i=0;i<discount_ids.length;i++){
		var dis_id='discount_'+discount_ids[i];
		var dis_val='dis_val_'+discount_ids[i];
		var remove_id='remove_dis_'+discount_ids[i];
		$('#'+dis_id).show();
		$('#'+dis_val).empty().append(0);
		$('#'+remove_id).hide();
		
	}
	for(var i=0;i<tax_ids.length;i++){
		var tax_id='tax_'+tax_ids[i];
		var tax_val='tax_val_'+tax_ids[i];
		var remove_id='remove_tax_'+tax_ids[i];
		$('#'+tax_id).show();
		$('#'+tax_val).empty().append(0);
		$('#'+remove_id).hide();
	}
	
	calculate_order();
}
var total_after_tax=0.00;
function calculate_order(){


	total_after_discount=total_price_after_excise - discount_total;
	total_after_tax=total_after_discount+tax_total;

	round_off = total_after_tax - Math.floor(total_after_tax);
	
	round_off=parseFloat(Math.round(round_off * 100) / 100).toFixed(2);
	
	total_bill=Math.ceil(total_after_tax);

	$('.total_price').empty().append(parseFloat(total_price).toFixed(2));
	$('#total_after_discount').empty().append(parseFloat(total_after_discount).toFixed(2));
	$('#round_off').empty().append(parseFloat(round_off).toFixed(2));
	$('#total_bill').empty().append(parseFloat(total_bill).toFixed(2));
	
}
$('#save_order_btn').click(function(e){
	e.preventDefault();
	if(validate_fields()){
		var formData = $('form#save_order_form').serializeArray();
		formData.push({name:'discount_ids', value: JSON.stringify(applied_discounts)});
		formData.push({name:'tax_ids', value: JSON.stringify(applied_taxs)});
		formData.push({name:'total_amount', value: total_price});
		formData.push({name:'discount_amount', value: discount_total});
		formData.push({name:'tax_amount', value: tax_total});
		formData.push({name:'round_off', value: round_off});
		formData.push({name:'bill_amount', value: total_bill});
        formData.push({name:'central_excise_duty', value: central_excise_duty});
        formData.push({name:'education_cess', value: education_cess});
        formData.push({name:'higher_education_cess', value: higer_education_cess});
		$.ajax({
			url:'<?php echo URL;?>orders/save_order',
			type:'POST',
			data: formData,
			beforeSend: function(){
				$('#save_order_btn').attr('disabled',true).html('Saving......');
				//$('#preview_data_table').empty();
			},
			success: function(resp){
				window.location.href='<?php echo URL;?>admin/orders';
			}
		});
	}
	return false;
});
function validate_fields(){
	var flag=true;
	var booking_stn=$('#booking_station').val();
	if(booking_stn==0){
		$('#myModal').modal('show');
		flag=false;
	}
	return flag;
}
function delete_product(id,price){
	//alert(id);
	var row_id="order_item_row_"+id;
	$('#'+row_id).remove();
	total_price=total_price-parseFloat(price);
    reset_calculation();
    apply_final();
    calculate_central_excise();
	$.ajax({
		url:'<?php echo URL;?>orders/delete_product_from_cart/'+id,
		type:'GET',
		dataType:'json',
		success: function(resp){
			//TODO if FAILED;
			
		}
	});
}

function removeA(arr) {
    var what, a = arguments, L = a.length, ax;
    while (L > 1 && arr.length) {
        what = a[--L];
        while ((ax= arr.indexOf(what)) !== -1) {
            arr.splice(ax, 1);
        }
    }
    return arr;
}
$('#cancel_order_btn').click(function(){

	cancel_order();
});
function cancel_order(){
	$.ajax({
		url: '<?php echo URL;?>orders/cancel_order/'+order_id,
		type: 'GET',
		dataType: 'JSON',
		beforeSend: function(){
					
		},
		success: function(resp){
			window.location.href='<?php echo URL;?>admin/orders';
		}
	});
}

function add_discount_n_tax(){
	$('#add_cart_form,#add_discount_n_tax,#item_table_row,#item_tax_central').hide();
	$('#item_discount,#item_tax,#save_order_btn').show();  
}
</script>
