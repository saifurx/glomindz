<div class="container-fluid">
	<h3>
		Products Price
		
	</h3>
	<div class="row-fluid">
		<div class="span12">
			<form action="" class="form-inline" id="new_product_form">
				<input type="text" name="product_name" id="product_name"
					placeholder="Products" /> <input type="hidden" name="product_id"
					id="product_id" /> <select name="customer_type">
					<option>--Customer Type--</option>
					<option value="Trade">Trade</option>
					<option value="Institutional">Institutional</option>
					<option value="Government">Government</option>
				</select><select name="package_id" class="input input-xlarge">
					<option value="0">--Package Type--</option>
					<?php foreach ($this->package as $package_type){?>
					<option value="<?php echo $package_type['id'];?>">
						<?php echo $package_type['volume'].' '.$package_type['unit_type'].' '.$package_type['type'].' ( '.$package_type['quantity_in_box'].' Nos in Box)';?>
					</option>
					<?php }?>
				</select> 
				<input class="input-medium" type="number" name="mrp" placeholder="MRP"> 
				<input class="input-medium" type="number" name="unit_price" placeholder="Unit Price"> 
				<input class="input-medium" type="hidden" name="valid_from" value="2000-01-01"> 
				<input type="hidden" name="valid_to" value="2099-01-01">
				<button type="button" class="btn btn-primary input-small" id="update_price_btn">Save</button>
				<button type="button" class="btn btn-success pull-right"id="new_product_btn" href="#productModal" data-toggle="modal">New Product</button>

			</form>
			<hr>
			<div id="dateformat_div"></div>
			<table class="table table-bordered table-condensed">
				<thead id="product_list_header"></thead>
				<tbody id="product_list"
					class="table table-bordered table-condensed"></tbody>
			</table>
		</div>
	</div>

	<!-- update model -->

	<div id="updateModal" class="modal hide fade" tabindex="-1"
		role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">&times;</button>
			<h3 id="myModalLabel">Update Price</h3>
		</div>
		<div class="modal-body">
			<form class="form-horizontal" id="update_model_form">
				<div class="control-group">
					<label class="control-label" for="update_name_short_code">Name</label>
					<div class="controls">
						<input type="hidden" id="update_product_id" name="product_id"> <input
							type="hidden" id="update_package_id" name="package_id"> <input
							type="hidden" name="valid_from" value="2000-01-01"> <input
							type="hidden" name="valid_to" value="2099-01-01"> <input
							type="text" id="update_name" disabled="disabled"> <input
							type="hidden" id="update_customer_type_hidden"
							name="customer_type" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="update_unit_price">Customer Type</label>
					<div class="controls">
						<input type="text" id="update_customer_type" disabled="disabled" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="update_package_type">Package Type</label>
					<div class="controls">
						<input type="text" id="update_package_type" disabled="disabled">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="update_unit_price">Unit Price</label>
					<div class="controls">
						<input type="number" id="update_unit_price"
							placeholder="Unit Price" name="unit_price">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="update_mrp">MRP</label>
					<div class="controls">
						<input type="text" id="update_mrp" placeholder="MRP" name="mrp">
					</div>
				</div>

			</form>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
			<button class="btn btn-primary" data-dismiss="modal"
				id="update_price_model">Save</button>
		</div>
	</div>


	<div id="productModal" class="modal hide fade" tabindex="-1"
		role="dialog" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">&times;</button>
			<h3 id="myModalLabel">New Product</h3>
		</div>
		<div class="alert alert-error hide" id="error_model"></div>
		<div class="modal-body">
			<form class="form-horizontal" id="add_product_form">
				<div class="control-group">
					<label class="control-label" for="update_name_short_code">Short
						Code</label>
					<div class="controls">
						<input type="text" name="short_code">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="update_name">Product Name</label>
					<div class="controls">
						<input type="text" name="name">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="update_name">Product Type</label>
					<div class="controls">
						<input type="text" name="type">
					</div>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
			<button class="btn btn-primary" data-dismiss="modal"
				id="add_product_model">Save</button>
		</div>
	</div>
</div>
<script type="text/javascript">
$('#settings_li').addClass('active');	
var product_id=0;
window.onload = function() {
	get_short_code();
	get_all_products();
	
};
var return_list = [];

function get_short_code(){
	$.ajax({
		url: '<?php echo URL;?>product/get_short_code/',
		type: 'GET',
		dataType: 'JSON',
		success: function(data) {
			return_list=data;
			
		}
	});
	
}

var count=0;
function get_all_products(){
	$.ajax({
		url: '<?php echo URL;?>admin/get_all_products',
		dataType: 'JSON',
		type: 'GET',
		beforeSend: function(){
			$('#product_list_header').empty();
			$('#product_list').empty();
		},
		success: function(resp){
			if(resp.length==0){
				
			}else{
				 var data = new google.visualization.DataTable();
				  data.addColumn('string', 'Short Code');
				  data.addColumn('string', 'Name');
				  data.addColumn('string', 'Customer Type');
				  data.addColumn('string', 'MRP');
				  data.addColumn('string', 'Unit price');
				  data.addColumn('string', 'Container');
				 
				  var count=0;
				  	
				  for(var key in resp){
					  	count=count+1;
						var package_type = resp[key].volume+' '+resp[key].unit_type+' '+resp[key].type+' ( '+resp[key].quantity_in_box+' units )';
						var row_data=new Array();
						row_data[0]=resp[key].short_code;
						row_data[1]=resp[key].name;
						row_data[2]=resp[key].customer_type;
						row_data[3]=resp[key].mrp;
						row_data[4]=resp[key].unit_price;
						row_data[5]=package_type;
						data.addRow(row_data);
					}
				  var table = new google.visualization.Table(document.getElementById('dateformat_div'));
				  table.draw(data, {showRowNumber: false});
			}
		}			
	});
}
$("#product_list").on("click", ".update", function() {
	var name = $(this).closest("tr").find(".name").text();
	var product_id = $(this).closest("tr").find(".product_id").text();
	var package_id = $(this).closest("tr").find(".package_id").text();
	var customer_type = $(this).closest("tr").find(".customer_type").text();
	var package_type = $(this).closest("tr").find(".package_type").text();
	
	$('#update_name').val(name);
	$('#update_product_id').val(product_id);
	$('#update_package_id').val(package_id);
	$('#update_customer_type').val(customer_type);
	$('#update_package_type').val(package_type);
	$('#update_customer_type_hidden').val(customer_type);
	
});


$('#product_name').focus(function() {
	//console.log(return_list);
    $('#product_name').typeahead({
        source: return_list,
        itemSelected: function(resp){
            console.log(resp);
            $('#product_id').val(resp);
        }
    });
});


$('#update_price_btn').click(function(){
	var formData = $('form#new_product_form').serialize();
	//formData.push('id',product_id);
	$.ajax({
		url:'<?php echo URL;?>product/update_price/',
		type:'POST',
		data: formData,
		dataType:'json',
		beforeSend: function(){
			$('#btn_save_new_product').attr('disabled', true).html('Saving...');
		},
		success: function(resp){
			console.log(resp);
			$('#btn_save_new_product').attr('disabled', false).html('Save');
			get_all_products();

		}
	});
	return false;
});

$('#update_price_model').click(function(){
	var formData = $('form#update_model_form').serialize();
	var update_unit_price = $('#update_unit_price').val();
	var update_mrp = $('#update_mrp').val();
	var len_up = update_unit_price.length;
	var len_mrp = update_mrp.length;
	if(len_up > 0 && len_mrp > 0){
		$.ajax({
			url:'<?php echo URL;?>product/update_price/',
			type:'POST',
			data: formData,
			dataType:'json',
			success: function(resp){
				$('#update_unit_price').val('');
				$('#update_mrp').val('');
				$('#updateModal').modal('hide');
				get_all_products();
	
			}
		});
	return false;
	}
	else{
		alert('Empty Unit Price or MRP');
	}
});
$('#add_product_model').click(function(){
	var formData = $('form#add_product_form').serialize();
	$.ajax({
		url:'<?php echo URL;?>product/save_new_product/',
		type:'POST',
		data: formData,
		dataType:'json',
		success: function(resp){
			console.log(resp.error);
			if(resp.error==''){
				$('#productModal').modal('hide');
				get_short_code();
			}else{
				$('#error_model').empty().append('<strong>Oh snap! </strong> '+resp.error);
				$('#error_model').show();
			}
		}
	});
	return false;
});
</script>
<script
	type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
      google.load('visualization', '1.0', {packages: ['charteditor']});
    </script>
