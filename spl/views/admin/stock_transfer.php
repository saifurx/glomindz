<style>
#btn_add_stn_cart {
	margin-left: 55px;
}

#packages,#selected_quantity,#batch_nos {
	margin-left: 10px;
}
</style>
<div class="container-fluid">
	<div class="row-fluid">
		<h3>
			Stocks Transfer
		
			<button class="btn pull-right" id="generate_stn">
				<i class="icon-random"></i> Transfer
			</button>
			<!-- 
				<?php if (Session::get('role') != 'dispatch' ){?>
					<a class="btn pull-right" href="<?php echo URL;?>admin/stocks/"><i class="icon-shopping-cart"></i> Stocks</a>
				<?php }?>
			-->		
		</h3>
	</div>

	<div class="row-fluid" id="add_stn_row">
		<label><strong>Stock Transfer</strong> from <strong>Rangia </strong>(RD)
			to <strong>Guwahati</strong> (GD)</label>
		<form class="inline-form" id="save_stn_form">
			<input class="span2" type="text" placeholder="vechile no"
				name="vechile_no" required="required"> <input class="span2"
				type="text" placeholder="despatch no" name="despatch_no"
				required="required"> <input class="span3" type="text"
				id="despatch_date" placeholder="despatch_date" name="despatch_date"
				required="required"> <input class="span3" type="text"
				placeholder="despatch_through" name="despatch_through"
				required="required"> <input class="span3" type="text"
				placeholder="remarks" name="remarks">
		</form>
		<hr>
		<form class="form-inline" id="add_cart_form">
			<input class="input-mini disabled" id="disabledInput" type="text" placeholder="#" disabled="disabled"> 
			<select id="products"></select>
			<select id="packages" disabled="disabled"></select> 
			<select	id="batch_nos" disabled="disabled"></select> 
			<input type="number" class="input-large" placeholder="Boxes" name="quantity" id="selected_quantity">
			<button type="submit" class="btn btn-primary" id="btn_add_stn_cart">Add	Product</button>
			<div id="hidden_product_id">
				<input type="hidden" name="product_id" id="product_id">
			</div>
		</form>
		<div class="alert alert-error" id="add_item_error"></div>
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
					<th><i class="icon-remove"></i>
					</th>
				</tr>
			</thead>
			<tbody id="item_table_row">
			</tbody>
		</table>
		<button type="button" class="btn btn-success pull-right" id="save_stock_btn">Save STN</button>
	</div>
	<div class="row-fluid" id="save_success">
		<span class="span4"></span>
		<h4 class="alert alert-success span4">Saved Successfuly</h4>
	</div>
	
	
	<br>
	<hr>
	<div class="row-fluid">
		<p class="loading_p"></p>
		<table class="table table-bordered table-condensed">
			<thead id="stock_list_header"></thead>
			<tbody id="stock_list" class="table table-bordered"></tbody>
		</table>
	</div>
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<div class="row-fluid">
				<p class="loading_m"></p>
				<table class="table table-bordered table-condensed">
					<thead id="stn_product_list_header"></thead>
					<tbody id="stn_product_list" class="table table-bordered"></tbody>
				</table>
			</div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		</div>
	</div>
</div>
<script type="text/javascript">
var product_id = 0;
var package_id = 0;
var stn_products=null;
$('#stocks_li').addClass('active');
window.onload = function() {
	stn_products=new Array();
	$("#despatch_date").datepicker({ dateFormat: "yy-mm-dd" });
	get_stn_master();
	get_available_short_code();
	init();
};
function date_ddmmyyyy(date){
	var n=date.split("-");
	var result = n[2]+'/'+n[1]+'/'+n[0];
	return result;
}
$('#products').change(function(){
	     var a=$('#products').val();
		 if(a!= 0){
			 product_id=a;
			 get_available_packages(a);
		 }
});
$('#packages').change(function(){
    var a=$('#packages').val();
	 if(a!= 0){
		 package_id=a;
		 get_available_batches(a);
	 }
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
   	console.log(selected_batch_no);
});
function get_available_short_code(){
	$('#products').empty();
	$.ajax({
		url: '<?php echo URL;?>stocks/get_available_short_code/RD/',
		type: 'GET',
		dataType: 'JSON',
		success: function(data) {
			$('#products').append($("<option></option>").attr("value",0).text('Available products'));
			$.each(data ,function(i,value) {
				  $('#products').append($("<option></option>").attr("value",value.id).text(value.name));
		      });
		}
	});
}
function get_available_packages(product_id){
	$('#packages').empty();
	$('#packages').attr('disabled',true);
	$('#packages').append('<option>Loading...</option>');
	$.ajax({
		url: '<?php echo URL;?>stocks/get_available_packages/',
		type: 'GET',
		dataType: 'JSON',
		data: {location: 'RD',product_id: product_id},
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

function get_available_batches(package_id){
	$('#batch_nos').empty();
	$('#batch_nos').attr('disabled',true);
	$('#batch_nos').append('<option>Loading...</option>');
	$.ajax({
		url: '<?php echo URL;?>stocks/get_available_batches/',
		type: 'GET',
		data: {location: 'RD',package_id: package_id,product_id: product_id},
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
}

$('#generate_stn').click(function(e){
	e.preventDefault();
	$('#add_stn_row').toggle();
});
var count=0;

$('#btn_add_stn_cart').click(function(e){
	e.preventDefault();
	$('#chart').show();
	var batch_nos = $('#batch_nos').val();
	var quantity = $('#selected_quantity').val();
	var product = $('#products').val();
	var package_id=$('#packages').val();
	if(batch_nos == 0){
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
		stn.batch_id=selected_batch_no;
		stn.qunatity=selected_quantity;
		stn.exp_date=selected_exp_date;
		stn.mfg_date=selected_mfg_date;
		var id_comapre=stn.product_id+stn.package_id+stn.batch_id;
		if(stn_products[id_comapre]===undefined){
			$('#item_table_row').append('<tr id="stn_item_row_'+id_comapre+'"><td>#</td><td>'+products+'</td><td>'+packages+'</td><td>'+batch_nos+'</td><td>'+selected_quantity+'</td><td><a href="#" onclick="delete_product('+id_comapre+');"><i class="icon-remove"></i></a></td></tr>');
			stn_products[id_comapre]=stn;
		}else{
			delete_product(id_comapre);
			$('#item_table_row').append('<tr id="stn_item_row_'+id_comapre+'"><td>#</td><td>'+products+'</td><td>'+packages+'</td><td>'+batch_nos+'</td><td>'+selected_quantity+'</td><td><a href="#" onclick="delete_product('+id_comapre+');"><i class="icon-remove"></i></a></td></tr>');
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
$('#save_stock_btn').click(function(e){
	e.preventDefault();
	new_array =cleanArray(stn_products);
	$('#save_stock_btn').attr('disabled',true).html('Saving......');
	var formData = $('form#save_stn_form').serializeArray();
	formData.push({name:'stn_products', value: JSON.stringify(new_array)});
	//formData.push({name:'exp_date', value:selected_exp_date},{name:'mfg_date', value: selected_mfg_date});
	if(new_array.length!=0){
	$.ajax({
		url:'<?php echo URL;?>stocks/save_stn',
		type:'POST',
		data: formData,
		success: function(resp){
			$('#save_stock_btn').attr('disabled',false).html('Save STN');
			$('#add_stn_row').hide();
			$('#chart').hide();
			stn_products.length = 0;
			$('#item_table_row').empty();
			$('#save_stn_form, #add_cart_form').each(function(){
			    this.reset();
			});
			$('#save_success').show();
			setTimeout(function(){$('#save_success').hide();get_stn_master();},2000);
			
		}
	});
	}
	else{
		alert('Empty List!');
		$('#save_stock_btn').attr('disabled',false).html('Save STN');
	}
});
function get_stn_master(){
	$('.loading_p').show().html('<img src="<?php echo URL;?>assets/apps/img/loading.gif" class="img-circle" style="width:20px; height:20px;">');
	$.ajax({
		url: '<?php echo URL;?>stocks/get_stn_master',
		dataType: 'JSON',
		type: 'GET',
		beforeSend: function(){
			$('#stock_list_header').empty();
			$('#stock_list').empty();
		},
		success: function(resp){
			$('.loading_p').empty().hide();
			var count = 0;
			
			if(resp.length==0){
				
			}else{
				$('#stock_list_header').append('<tr><th>STN No</th><th><strong>STN Date</strong></th><th><strong>Depatch No</strong></th><th><strong>Despatch Date</strong></th><th><strong>Despatch Through</strong></th><th><strong>Remarks</strong></th><th><strong>Product List</strong></th><th><strong>Action</strong></th></tr>');
			for(var key in resp){ 
				count = count + 1;
				var stn_date = date_ddmmyyyy(resp[key].stn_date);
				var despatch_date = date_ddmmyyyy(resp[key].despatch_date);
				var print_stn='<a class="btn btn-info btn-mini" href="<?php echo URL;?>admin/print_stn/'+resp[key].id+'" target="_blank"><i class="icon-white icon-print"></i>&nbsp;&nbsp;STN</a>';
				$('#stock_list').append('<tr><td>'+resp[key].id+'</td><td>'+stn_date+'</td><td>'+resp[key].despatch_no+'</td><td>'+despatch_date+'</td><td>'+resp[key].despatch_through+'</td><td>'+resp[key].devilery_terms+'</td><td><button class="btn btn-mini" onclick="get_stn_product_list('+resp[key].id+');">Product list</button></td><td>'+print_stn+'</td></tr>');
				}
			}
		}			
	});
}
function get_stn_product_list(stn_id){
	
	$.ajax({
		url: '<?php echo URL;?>stocks/get_stn_product_list/'+stn_id,
		dataType: 'JSON',
		type: 'GET',
		beforeSend: function(){
			$('#stn_product_list_header').empty();
			$('#stn_product_list').empty();
		},
		success: function(resp){
			console.log(resp);
			$('#myModal').modal('show');
			if(resp.length==0){
				
			}else{
				$('#stn_product_list_header').append('<tr><th>Short Code</th><th><strong>Name</strong></th><th><strong>Container</strong></th><th><strong>Quantity(Box)</strong></th><th><strong>Batch No</strong></th></tr>');
			for(var key in resp){ 
				count = count + 1;
								
				$('#stn_product_list').append('<tr><td>'+resp[key].short_code+'</td><td>'+resp[key].name+'</td><td>'+resp[key].volume+' ml '+resp[key].type+' ( '+resp[key].quantity+' Nos in Box)</td><td>'+resp[key].quantity+'</td><td>'+resp[key].batch_id+''+resp[key].batch_no+'</td></tr>');
				}
			}
		}			
	});
	
}
	

</script>
