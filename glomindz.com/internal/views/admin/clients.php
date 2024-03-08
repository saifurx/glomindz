<div class="container-fluid">
	<div class="row-fluid">
		<h3 class="pull-left">Clients</h3>
		<button class="btn btn-success pull-right" onclick="show_new_client_section();"><i class="icon-white icon-user"></i>&nbsp;New Client</button>
	</div>
	<hr>
	
<!-- Client Details Form -->
<section id="new_client_section">
	<div class="row-fluid" >
	<h4 class="alert">Create New Client (Details)</h4>
		<form class="form-horizontal" id="new_client_form">
			<div class="span6">
				<div class="control-group">
				  <label class="control-label">Name</label>
				  <div class="controls">
				    <input id="new_client_name" name="name" type="text" placeholder="Client Name" class="input-xlarge" required="required">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Company</label>
				  <div class="controls">
				    <input id="" name="company" type="text" placeholder="Company Name" class="input-xlarge" required="required">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Customer Type</label>
				  <div class="controls">
				    <select id="new_customer_type" name="customer_type" class="input-xlarge">
				      <option value="">--Select--</option>
				      <option value="Trade">Trade</option>
				      <option value="Institutional">Institutional</option>
				      <option value="Government">Government</option>
				    </select>
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Email</label>
				  <div class="controls">
				    <input id="" name="email" type="email" placeholder="Email" class="input-xlarge">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Mobile</label>
				  <div class="controls">
				    <input id="" name="mobile" type="text" placeholder="Mobile" class="input-xlarge">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Tel</label>
				  <div class="controls">
				    <input id="" name="tel" type="text" placeholder="Tel" class="input-xlarge">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Fax</label>
				  <div class="controls">
				    <input id="" name="fax" type="text" placeholder="Fax" class="input-xlarge">
				  </div>
				</div>
				<!-- Text input-->
				<div class="control-group">
				  <label class="control-label">Pan</label>
				  <div class="controls">
				    <input id="new_client_pan" name="pan" type="text" placeholder="Pan" class="input-xlarge" >
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Vat</label>
				  <div class="controls">
				    <input id="" name="vat" type="text" placeholder="Vat" class="input-xlarge">
				  </div>
				</div>
				<span id="error_submit" class="text-error pull-left"><i class="icon-warning-sign"></i> Error. May be Some fields are empty (like Name, Customer Type ).</span>
			</div>
			<div class="span6">
				<!-- Text input-->
				<div class="control-group">
				  <label class="control-label">Cst</label>
				  <div class="controls">
				    <input id="" name="cst" type="text" placeholder="Cst" class="input-xlarge">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Cst Valid To</label>
				  <div class="controls">
				    <input id="cst_valid" name="cst_valid" type="text" placeholder="Cst Valid To" class="input-xlarge">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Bank Name</label>
				  <div class="controls">
				    <input id="" name="bank_name" type="text" placeholder="Bank Name" class="input-xlarge">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Bank Branch</label>
				  <div class="controls">
				    <input id="" name="bank_branch" type="text" placeholder="Bank Branch" class="input-xlarge">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Bank City</label>
				  <div class="controls">
				    <input id="" name="bank_city" type="text" placeholder="Bank City" class="input-xlarge">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Bank Swift Code</label>
				  <div class="controls">
				    <input id="" name="bank_swift_code" type="text" placeholder="Bank Swift Code" class="input-xlarge">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Bank Account No.</label>
				  <div class="controls">
				    <input id="" name="bank_ac_no" type="text" placeholder="Bank Account No." class="input-xlarge">
				  </div>
				</div>
				
				<!-- Multiple Radios (inline) -->
				<div class="control-group">
				  <label class="control-label">Rating</label>
				  <div class="controls">
				    <label class="radio inline">
				      <input type="radio" name="rating" value="1" >
				      1
				    </label>
				    <label class="radio inline">
				      <input type="radio" name="rating" value="2">
				      2
				    </label>
				    <label class="radio inline">
				      <input type="radio" name="rating" value="3">
				      3
				    </label>
				    <label class="radio inline">
				      <input type="radio" name="rating" value="4" checked="checked">
				      4
				    </label>
				    <label class="radio inline">
				      <input type="radio" name="rating" value="5">
				      5
				    </label>
				  </div>
				</div>
			</div>
		</form>
	</div>
	<!-- Client Address Form -->
	<div class="row-fluid" id="new_client_address_row">
		<h4 class="alert">Create New Client (Address)</h4>
		<form class="form-horizontal" id="new_client_address_form">
			<div class="span6">			
				<div class="control-group">
				  <label class="control-label">Address Type</label>
				  <div class="controls">
				    <select id="address_type" name="address_type" class="input-xlarge">
				      <option value="">--Select--</option>
				      <option value="Billing">Billing</option>
				      <option value="Transport">Transport</option>
				    </select>
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Address</label>
				  <div class="controls">
				    <input name="address" type="text" placeholder="Address" class="input-xlarge" required="required">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Locality</label>
				  <div class="controls">
				    <input name="locality" type="text" placeholder="Locality" class="input-xlarge" required="required">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">City</label>
				  <div class="controls">
				    <input name="city" type="text" placeholder="City" class="input-xlarge" required="required">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">State</label>
				  <div class="controls">
				    <input name="state" type="text" placeholder="State" class="input-xlarge" required="required">
				  </div>
				</div>
			</div>
			<div class="span6">
				<div class="control-group">
				  <label class="control-label">Country</label>
				  <div class="controls">
				    <input name="country" type="text" placeholder="Country" class="input-xlarge" required="required">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Pin</label>
				  <div class="controls">
				    <input name="pin" type="text" placeholder="Pin" class="input-xlarge" required="required">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Tel</label>
				  <div class="controls">
				    <input id="tel" name="address_tel" type="text" placeholder="Tel" class="input-xlarge" required="required">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Fax</label>
				  <div class="controls">
				    <input id="fax" name="address_fax" type="text" placeholder="Fax" class="input-xlarge" required="required">
				  </div>
				</div>
				<!-- Button -->	
				<div class="control-group">
				  <div class="controls">
				    <button type="button" class="btn btn-primary" id="save_new_client_btn" onclick="save_new_client();">Create</button>
				  </div>
				</div>	
			</div>
			<span id="error_submit_address" class="text-error"><i class="icon-warning-sign"></i> Error. May be Invalid Address Type!</span>
		</form>
	</div>		
	<hr>
</section>	

<!-- Edit Client Details Form -->
<section id="edit_client_section">
	<div class="row-fluid" >
	<h4 class="alert">Edit New Client (Details)</h4>
		<form class="form-horizontal" id="edit_client_form">
			<div class="span6">
				<div class="control-group">
				  <label class="control-label">Name</label>
				  <div class="controls">
				  	<input type="hidden" id="edit_client_id" name="id">
				    <input id="edit_client_name" name="name" type="text" placeholder="Client Name" class="input-xlarge" required="required">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Company</label>
				  <div class="controls">
				    <input id="edit_company" name="company" type="text" placeholder="Company Name" class="input-xlarge" required="required">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Customer Type</label>
				  <div class="controls">
				    <select id="edit_customer_type" name="customer_type" class="input-xlarge">
				      <option value="">--Select--</option>
				      <option value="Trade">Trade</option>
				      <option value="Institutional">Institutional</option>
				      <option value="Government">Government</option>
				    </select>
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Email</label>
				  <div class="controls">
				    <input id="edit_email" name="email" type="email" placeholder="Email" class="input-xlarge">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Mobile</label>
				  <div class="controls">
				    <input id="edit_mobile" name="mobile" type="text" placeholder="Mobile" class="input-xlarge">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Tel</label>
				  <div class="controls">
				    <input id="edit_tel" name="tel" type="text" placeholder="Tel" class="input-xlarge">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Fax</label>
				  <div class="controls">
				    <input id="edit_fax" name="fax" type="text" placeholder="Fax" class="input-xlarge">
				  </div>
				</div>
				<!-- Text input-->
				<div class="control-group">
				  <label class="control-label">Pan</label>
				  <div class="controls">
				    <input id="edit_client_pan" name="pan" type="text" placeholder="Pan" class="input-xlarge" >
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Vat</label>
				  <div class="controls">
				    <input id="edit_vat" name="vat" type="text" placeholder="Vat" class="input-xlarge">
				  </div>
				</div>
				<span id="edit_error_submit" class="text-error pull-left"><i class="icon-warning-sign"></i> Error. May be Some fields are empty (like Name, Customer Type ).</span>
			</div>
			<div class="span6">
				<!-- Text input-->
				<div class="control-group">
				  <label class="control-label">Cst</label>
				  <div class="controls">
				    <input id="edit_cst" name="cst" type="text" placeholder="Cst" class="input-xlarge">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Cst Valid To</label>
				  <div class="controls">
				    <input id="edit_cst_valid" name="cst_valid" type="text" placeholder="Cst Valid To" class="input-xlarge">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Bank Name</label>
				  <div class="controls">
				    <input id="edit_bank_name" name="bank_name" type="text" placeholder="Bank Name" class="input-xlarge">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Bank Branch</label>
				  <div class="controls">
				    <input id="edit_bank_branch" name="bank_branch" type="text" placeholder="Bank Branch" class="input-xlarge">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Bank City</label>
				  <div class="controls">
				    <input id="edit_bank_city" name="bank_city" type="text" placeholder="Bank City" class="input-xlarge">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Bank Swift Code</label>
				  <div class="controls">
				    <input id="edit_bank_swift_code" name="bank_swift_code" type="text" placeholder="Bank Swift Code" class="input-xlarge">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Bank Account No.</label>
				  <div class="controls">
				    <input id="edit_bank_ac_no" name="bank_ac_no" type="text" placeholder="Bank Account No." class="input-xlarge">
				  </div>
				</div>
				
				<!-- Multiple Radios (inline) -->
				<div class="control-group">
				  <label class="control-label">Rating</label>
				  <div class="controls">
				    <label class="radio inline">
				      <input class="rating"  type="radio" name="rating" value="1" >
				      1
				    </label>
				    <label class="radio inline">
				      <input class="rating" type="radio" name="rating" value="2">
				      2
				    </label>
				    <label class="radio inline">
				      <input class="rating" type="radio" name="rating" value="3">
				      3
				    </label>
				    <label class="radio inline">
				      <input class="rating" type="radio" name="rating" value="4">
				      4
				    </label>
				    <label class="radio inline">
				      <input class="rating" type="radio" name="rating" value="5">
				      5
				    </label>
				  </div>
				</div>
			</div>
		</form>
	</div>
	<!-- Edit Client Address Form -->
	<div class="row-fluid" id="edit_client_address_row">
		<h4 class="alert">Edit New Client (Address)</h4>
		<form class="form-horizontal" id="edit_client_address_form">
			<div class="span6">			
				<div class="control-group">
				  <label class="control-label">Address Type</label>
				  <div class="controls">
				    <select id="edit_address_type" name="address_type" class="input-xlarge">
				      <option value="">--Select--</option>
				      <option value="Billing">Billing</option>
				      <option value="Transport">Transport</option>
				    </select>
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Address</label>
				  <div class="controls">
				    <input id="edit_address" name="address" type="text" placeholder="Address" class="input-xlarge" required="required">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Locality</label>
				  <div class="controls">
				    <input id="edit_locality" name="locality" type="text" placeholder="Locality" class="input-xlarge" required="required">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">City</label>
				  <div class="controls">
				    <input id="edit_city" name="city" type="text" placeholder="City" class="input-xlarge" required="required">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">State</label>
				  <div class="controls">
				    <input id="edit_state" name="state" type="text" placeholder="State" class="input-xlarge" required="required">
				  </div>
				</div>
			</div>
			<div class="span6">
				<div class="control-group">
				  <label class="control-label">Country</label>
				  <div class="controls">
				    <input id="edit_country" name="country" type="text" placeholder="Country" class="input-xlarge" required="required">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Pin</label>
				  <div class="controls">
				    <input id="edit_pin" name="pin" type="text" placeholder="Pin" class="input-xlarge" required="required">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Tel</label>
				  <div class="controls">
				    <input id="edit_address_tel" name="address_tel" type="text" placeholder="Tel" class="input-xlarge" required="required">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Fax</label>
				  <div class="controls">
				    <input id="edit_address_fax" name="address_fax" type="text" placeholder="Fax" class="input-xlarge" required="required">
				  </div>
				</div>
				<!-- Button -->	
				<div class="control-group">
				  <div class="controls">
				    <button type="button" class="btn btn-primary" id="update_client_btn" onclick="update_client();">Update</button>
				  </div>
				</div>	
			</div>
			<span id="edit_error_submit_address" class="text-error"><i class="icon-warning-sign"></i> Error. May be Invalid Address Type!</span>
		</form>
	</div>		
	<hr>
</section>	

<section id="client_list_section">
	<div class="row-fluid">
		<table class="table table-bordered table-condensed">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Company</th>
					<th>Client Type</th>
					<th>Mobile</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody id="client_list">
				
			</tbody>
		</table>
	</div>
</section>
</div>  

<script type="text/javascript">
$('#clients_li').addClass('active');
$(document).ready(function(){
	get_all_client();
	 $( "#cst_valid" ).datepicker({
		  dateFormat: "yy-mm-dd",
	      changeMonth: true,
	    });
});

function show_new_client_section(){
	$("#new_client_section").toggle();
	//$("#client_list_section").hide();
	$('#edit_client_section').hide();
}

function save_new_client(){	
	var new_client_name = $('#new_client_name').val();
  	var new_customer_type = $('#new_customer_type').val();
  	var address_type = $('#address_type').val();

	if((new_client_name.length !=0 && new_customer_type.lenght != 0) && address_type.lenght != 0 ){	
		$('#save_new_client_btn').attr('disabled',true).html('Creating...');		
		var formData = $('#new_client_form, #new_client_address_form').serialize();
		$.ajax({
			  url: '<?php echo URL;?>clients/create_client/',
			  type:'POST',
			  data:formData,
			  dataType: 'JSON',
			  success: function(resp){
				   if(resp > 0){
					  	$('#save_new_client_btn').attr('disabled',false).html('Create');
					  	//$("#client_list_section").show();
					  	$("#new_client_section").hide();
					  	get_all_client();
					  	reset_form();
					}
			  }
		});
	}
	else{
		$('#error_submit_address').show();
		$('#error_submit').show();
	}
}

function reset_form(){
	 $('#new_client_form, #new_client_address_form').each(function(){
	    this.reset();
	});
}

function get_all_client(){
	$.ajax({
		  url: '<?php echo URL;?>clients/get_all_client/',
		  type:'GET',
		  dataType: 'JSON',
		  success: function(resp){
			  $('#client_list').empty();
			  //console.log(resp);
			  if(resp.length > 0){
				 var count = 0; 
				 for(var i in resp){
					 count = count +1;
					 var row='<tr><td style="display:none;">'+resp[i].id+'</td><td>'+count+'</td><td>'+resp[i].name+'</td><td>'+resp[i].company+'</td><td>'+resp[i].customer_type+'</td><td>'+resp[i].mobile+'</td><td><button class="btn btn-mini" onclick="edit_client('+resp[i].id+');"><i class="icon-pencil"></i></button></td></tr>';
					 $('#client_list').append(row);
				 }
			  }
		  }
	});
}

function edit_client(client_id){
	$('#edit_client_section').toggle();
	$("#new_client_section").hide();
	$.ajax({
		  url: '<?php echo URL;?>clients/get_client_details/',
		  type:'POST',
		  dataType: 'JSON',
		  data:{client_id:client_id},
		  success: function(resp){
			  console.log(resp); 
			  $('#edit_client_id').val(resp[0]['id']);
			  $('#edit_client_name').val(resp[0]['name']);
			  $('#edit_company').val(resp[0]['company']);
			  $('#edit_customer_type').val(resp[0]['customer_type']);
			  $('#edit_email').val(resp[0]['email']);
			  $('#edit_mobile').val(resp[0]['mobile']);
			  $('#edit_tel').val(resp[0]['tel']);
			  $('#edit_fax').val(resp[0]['fax']);
			  $('#edit_client_pan').val(resp[0]['pan']);
			  $('#edit_vat').val(resp[0]['vat']);
			  $('#edit_cst').val(resp[0]['cst']);
			  $('#edit_cst_valid').val(resp[0]['cst_valid']);
			  $('#edit_bank_name').val(resp[0]['bank_name']);
			  $('#edit_bank_branch').val(resp[0]['bank_branch']);
			  $('#edit_bank_city').val(resp[0]['bank_city']);
			  $('#edit_bank_swift_code').val(resp[0]['bank_swift_code']);
			  $('#edit_bank_ac_no').val(resp[0]['bank_ac_no']);
			  var $radios = $('.rating');
			    if($radios.is(':checked') === false) {
			        $radios.filter('[value='+resp[0]['rating']+']').prop('checked', true);
			   }
			  
			  $('#edit_address').val(resp[0]['address']);
			  $('#edit_address_type').val(resp[0]['address_type']);
			  $('#edit_locality').val(resp[0]['locality']);
			  $('#edit_city').val(resp[0]['city']);
			  $('#edit_state').val(resp[0]['state']);
			  $('#edit_country').val(resp[0]['country']);
			  $('#edit_pin').val(resp[0]['pin']);
			  $('#edit_address_tel').val(resp[0]['meca_tel']);
			  $('#edit_address_fax').val(resp[0]['meca_fax']);
		  }
	});
}

function reset_edit_form(){
	 $('#edit_client_form, #edit_client_address_form').each(function(){
	    this.reset();
	});
}

function update_client(){
	$('#edit_client_section').hide();
	$("#new_client_section").hide();
	$('#edit_client_section').show();

	var new_client_name = $('#edit_client_name').val();
  	var new_customer_type = $('#edit_customer_type').val();
  	var address_type = $('#edit_address_type').val();

	if((new_client_name.length !=0 && new_customer_type.lenght != 0) && address_type.lenght != 0 ){	
		$('#update_client_btn').attr('disabled',true).html('Updating...');		
		var formData = $('#edit_client_form, #edit_client_address_form').serialize();
		$.ajax({
			  url: '<?php echo URL;?>clients/update_client/',
			  type:'POST',
			  data:formData,
			  dataType: 'JSON',
			  success: function(resp){
				   if(resp > 0){
					  	$('#update_client_btn').attr('disabled',false).html('Update');
					  	$("#client_list_section").show();
						$('#edit_client_section').hide();
						$("#new_client_section").hide();
					  	get_all_client();
					  	reset_form();
					  	reset_edit_form();
					}
			  }
		});
	}
	else{
		$('#edit_error_submit_address').show();
		$('#edit_error_submit').show();
	}
}

</script>
