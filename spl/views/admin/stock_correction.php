<style>
#correction_btn {
	margin-top: 20px;
}
</style>
<div class="container-fluid">
	<div class="row-fluid">
		<h3>Sample/Defected</h3>

	</div>
	<hr>
	<div class="row-fluid" id="">
		<form class="form-inline" id="stock_correction_form">
			<label> Location <br> <select class="input-large" id="location"
				name="location">
					<option class="option_lable" value="0">-Select-</option>
					<option value="RD">Rangia (RD)</option>
					<option value="GD">Guwahati (GD)</option>
			</select> </label> <label> Product <br> <select disabled="disabled"
				class="input-large" name="products" id="products">
					<option class="option_lable" value="0">-Select-</option>
			</select> </label> <label> Package <br> <select disabled="disabled"
				class="input-large" id="packages" name="packages">
					<option class="option_lable" value="0">-Select-</option>
			</select> </label> <label> Batch <br> <select disabled="disabled"
				class="input-large" id="batch_nos" name="batch_nos">
					<option class="option_lable" value="0">-Select-</option>
			</select> </label> <label> Quantity <br> <input type="number"
				class="input-medium" placeholder="Boxes" id="selected_quantity"
				name="selected_quantity"> </label> <label> Reason <br> <select
				class="input-medium" id="reason" name="reason">
					<option value="Sample">Sample</option>
					<option value="Defected">Defected</option>
			</select> </label>

			<button disabled="disabled" class="btn btn-success pull-right"
				type="button" id="correction_btn">Correction</button>
		</form>
	</div>

	<div class="row-fluid" id="chart">
		<table class="table table-condensed table-bordered table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Item Name</th>
					<th>Package</th>
					<th>Batch</th>
					<th>Boxes</th>
					<th>Reason</th>
					<th><i class="icon-remove"></i>
					</th>
				</tr>
			</thead>
			<tbody id="item_table_row">
			</tbody>
		</table>
		<button class="btn btn-danger pull-right" id="save_changes_btn">Save Changes</button>
	</div>
	<div class="row-fluid" id="save_success">
		<span class="span4"></span>
		<h4 class="alert alert-success span4">Saved Successfuly</h4>
	</div>
</div>
<script type="text/javascript">
$('#stocks_li').addClass('active');
var stn_products=null;

window.onload = function() {
	stn_products=new Array();
	$("#date").datepicker({ dateFormat: "yy-mm-dd" });
	$("#despatch_date").datepicker({ dateFormat: "yy-mm-dd" });
	init();
};

function date_ddmmyyyy(date){
	var n=date.split("-");
	var result = n[2]+'/'+n[1]+'/'+n[0];
	return result;
}

$('#location').change(function(){
    var location=$('#location').val();
	$('#products').empty();
	$('#products').attr('disabled',true);
	$('#products').append('<option>Loading...</option>');
	$.ajax({
		url: '<?php echo URL;?>stocks/get_available_short_code/RD',
		type: 'GET',
		dataType: 'JSON',
		data: {location:location},
		success: function(data) {
			$('#products').empty();
			$('#products').attr('disabled',false);
			$('#products').append($("<option></option>").attr("value",0).text('Available packages'));
			$.each(data ,function(i,value) {
				  $('#products').append($("<option></option>").attr("value",value.id).text(value.name));
		      });
		}
	});
});

$('#products').change(function(){
    var product_id=$('#products').val();
    var location=$('#location').val();
    
	 if(product_id!= 0){
		 $('#packages').attr('disabled',false);
			$('#packages').empty();
			$('#packages').attr('disabled',true);
			$('#packages').append('<option>Loading...</option>');
			$.ajax({
				url: '<?php echo URL;?>stocks/get_available_packages/',
				type: 'GET',
				dataType: 'JSON',
				data: {location: location,product_id: product_id},
				success: function(data) {
					$('#packages').empty();
					$('#packages').attr('disabled',false);
					$('#packages').append($("<option></option>").attr("value",0).text('Available packages'));
					$.each(data ,function(i,value) {
						  $('#packages').append($("<option></option>").attr("value",value.id).text(value.name));
				    });
				}
			});
	 }
	 else{
		 $('#packages').attr('disabled',true);
	 }
});

$('#packages').change(function(){
	var location=$('#location').val();
    var product_id=$('#products').val();
    var package_id=$('#packages').val();
	$('#batch_nos').empty();
	$('#batch_nos').attr('disabled',true);
	$('#batch_nos').append('<option>Loading...</option>');
	$.ajax({
		url: '<?php echo URL;?>stocks/get_available_batches/',
		type: 'GET',
		data: {location: location,package_id: package_id,product_id: product_id},
		dataType: 'JSON',
		success: function(data) {
			$('#batch_nos').empty();
			$('#batch_nos').attr('disabled',false);			
			$('#batch_nos').append($("<option></option>").attr("value",0).text('Available batches'));
			$.each(data ,function(i,value) {
				var	mfg_date = date_ddmmyyyy(value.mfg_date);
				  $('#batch_nos').append($('<option value="'+value.id+'" data-foo="'+value.available_unit+'" data-batch="'+value.batch_no+'"  data-exp="'+value.exp_date+'"  data-mfg="'+ mfg_date +'">'+value.name+'</option>'));
		    });
		}
	});
});

var available_unit = 0;
var selected_batch_no;
var selected_exp_date='';
var selected_mfg_date='';
$('#batch_nos').change(function(){
    var selected = $(this).find('option:selected');
   	available_unit = selected.data('foo'); 
   	selected_batch_no = selected.data('batch'); 
   	selected_exp_date = selected.data('exp'); 
   	selected_mfg_date = selected.data('mfg');

    $('#selected_quantity').focus().val('');
});

$('#selected_quantity').focus(function() {
	$('#correction_btn').attr('disabled',false); 
});
var count=0;

$('#correction_btn').click(function(e){
	var quantity = $('#selected_quantity').val();
	var batch = $('#batch_nos').val();
	var product = $('#products').val();
	var package_id=$('#packages').val();
	
	if(batch == 0){
		alert('Select Batch');
	}
	else if(quantity=='' || quantity == 0){
		alert('Enter Quantity');
		$('#selected_quantity').focus();
	}
	else if(product == 0){
		alert('Select Product');
	}
	else if(package_id == 0){
		alert('Select packages');
	}
	else if(quantity > available_unit){
		alert('Quantity cannot be greater than Available unit ('+available_unit+')');
	}
	else{	
		e.preventDefault();
		$('#chart').show();
		stn=new Object();
		
		var e = document.getElementById("products");
		var products = e.options[e.selectedIndex].text;
		stn.product_id=e.options[e.selectedIndex].value;
		var e = document.getElementById("packages");
		var packages = e.options[e.selectedIndex].text;
		stn.package_id=e.options[e.selectedIndex].value;
		var e = document.getElementById("batch_nos");
		var batch_nos = e.options[e.selectedIndex].text;
		var selected_quantity = $("#selected_quantity").val();
		var selected_reason = $("#reason").val();
		var selected_location = $("#location").val();
		stn.batch_id=selected_batch_no;
		stn.qunatity=selected_quantity;
		stn.exp_date=selected_exp_date;
		stn.mfg_date=selected_mfg_date;
		stn.reason=selected_reason;
		stn.location=selected_location;		
		var id_comapre=stn.product_id+stn.package_id+stn.batch_id;
		
		if(stn_products[id_comapre]===undefined){
			$('#item_table_row').append('<tr id="stn_item_row_'+id_comapre+'"><td>#</td><td>'+products+'</td><td>'+packages+'</td><td>'+batch_nos+'</td><td>'+selected_quantity+'</td><td>'+selected_reason+'</td><td><a href="#" onclick="delete_product('+id_comapre+');"><i class="icon-remove"></i></a></td></tr>');
			stn_products[id_comapre]=stn;
			$('#correction_btn').attr('disabled',true); 
		}else{
			delete_product(id_comapre);
			$('#item_table_row').append('<tr id="stn_item_row_'+id_comapre+'"><td>#</td><td>'+products+'</td><td>'+packages+'</td><td>'+batch_nos+'</td><td>'+selected_quantity+'</td><td>'+selected_reason+'</td><td><a href="#" onclick="delete_product('+id_comapre+');"><i class="icon-remove"></i></a></td></tr>');
			stn_products[id_comapre]=stn;
		}
	}
});
function delete_product(id){
	var row_id="stn_item_row_"+id;
	$('#'+row_id).remove();
	delete stn_products[id];
}
function cleanArray(actual){
	  var newArray = new Array();
	  for(var i = 0; i<actual.length; i++){
	      if (actual[i]){
	        newArray.push(actual[i]);
	    }
	  }
	  return newArray;
}

$('#save_changes_btn').click(function(e){
	e.preventDefault();
	new_array =cleanArray(stn_products);
	$('#save_changes_btn').attr('disabled',true).html('Saving......');
	if(new_array.length!=0){
		$.ajax({
			url:'<?php echo URL;?>stocks/save_stock_correction/',
			type:'POST',
			data: {stn_products: JSON.stringify(new_array)},
			dataType: 'JSON',
			beforeSend: function(){
			},
			success: function(resp){
				console.log(resp);
				$('#save_changes_btn').attr('disabled',false).html('Save Changes');
				$('#item_table_row').empty();
				$('#chart').hide();
				stn_products.length = 0;
				$('#stock_correction_form').each(function(){
				    this.reset();
				});
				$('#save_success').show();
				setTimeout(function(){$('#save_success').hide();},2000);
			}
		});
		
	}
	else{
		alert('Empty List!');
		$('#save_changes_btn').attr('disabled',false).html('Save Changes');
	}
});
</script>
