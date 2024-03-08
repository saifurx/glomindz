<div class="container-fluid">
	<h4>Customers</h4> 
	<hr>
	<div class="row-fluid">
		<div class="input-append span8">
			<input id="search_customer" type="text" class="span6" placeholder="Search by company name,mobile,contact person">
			<button id="search_btn" class="btn" type="button" onclick="search_customer();">
				<i class="icon-blue icon-search"></i>&nbsp;Search
			</button>
		</div>
		<button class="btn btn-success pull-right" id="show_new_customer_row">
			<i class="icon-white icon-user"></i>&nbsp;New Customer
		</button>
	</div>

	<div class="row-fluid" id="new_customer_row">
		<form action="" class="form" id="new_cust_form">
			<div class="span4">
				<h4>Customer Details</h4>
				<input type="text" name="company" placeholder="Company Name"/> 
				<input type="text" name="name" placeholder="Contact Person" required /> 
				<select	name="customer_type">
					<option>--Customer Type--</option>
					<option value="Trade">Trade</option>
					<option value="Institutional">Institutional</option>
					<option value="Government">Government</option>
				</select> 
				<input type="text" name="mobile" placeholder="Mobile"/> 
				<input type="text" name="email" placeholder="Email"/> 
				<input type="tel" name="tel" placeholder="Phone"/> 
				<input type="text" name="fax" placeholder="Fax" />
			</div>

			<div class="span4">
				<h4>Transaction Details</h4>
				<input type="text" name="vat" placeholder="VAT No" required/> 
				<input type="text" name="cst" placeholder="CST No" required/> 
				<input type="text" name="cst_valid" placeholder="CST valid from" required/>
				<input type="text" name="pan" placeholder="PAN No" required/> 
				<input type="text" name="bank_name" placeholder="Bank Name" required/> 
				<input type="text" name="bank_ac_no" placeholder="Bank ac no"/> 
				<input type="text" name="bank_branch" placeholder="Branch"/> 
				<input type="text" name="bank_city" placeholder="Bank City"/> 
				<input type="text" name="bank_swift_code" placeholder="Bank Swift Code"/>
			</div>
			<div class="span4">
				<h4>Address</h4>
				<input type="text" placeholder="House No./ Flat No." name="address_bill" id="address_bill"/> 
				<input type="text" placeholder="Locality" name="locality_bill" id="locality_bill"/>
				<input type="text" placeholder="City" name="city_bill" id="city_bill"/>
				<input type="text" placeholder="State" name="state_bill" id="state_bill"/>
				<input type="text" placeholder="Country" name="country_bill" id="country_bill"/>
				<input type="text" placeholder="Pin" name="pin_bill" id="pin_bill"/> 
				<input type="text" placeholder="Phone" name="tel_bill" id="tel_bill"/>
				<input type="text" placeholder="Fax" name="fax_bill" id="fax_bill"/>

				<button type="button" class="btn" onclick="reset_form_new_cust_form();">Reset</button>
				<button type="button" class="btn btn-primary" id="btn_save_new_customer">Save</button>
			</div>
		</form>
	</div>
	<div class="row-fluid" id="edit_customer_row">
		<form action="" class="form" id="edit_customer_form">

			<div class="span4">
				<h4>Customer Details</h4>
				<input type="hidden" name="customer_id" id="customer_id"> 
				<input type="text" name="company" placeholder="Company Name" id="customer_name" /> 
				<input type="text" name="name" placeholder="Contact Person" required id="contact_person" /> 
				<select	name="customer_type" id="customer_type">
					<option>--Customer Type--</option>
					<option value="Trade">Trade</option>
					<option value="Institutional">Institutional</option>
					<option value="Government">Government</option>
				</select> 
				<input type="text" name="mobile" placeholder="Mobile" id="mobile"/> 
				<input type="text" name="email" placeholder="Email"	id="email"/> 
				<input type="tel" name="tel" placeholder="Phone" id="phone"/> 
				<input type="text" name="fax" placeholder="Fax"	id="fax"/>
			</div>

			<div class="span4">
				<h4>Transiction Details</h4>
				<input type="text" name="vat" placeholder="VAT No" id="vat_no"/> 
				<input type="text" name="cst" placeholder="CST No" id="cst_no"/>
				<input type="text" name="cst_valid"	placeholder="CST valid from" id="cst_valid"/> 
				<input type="text" name="pan" placeholder="PAN No" id="pan_no" /> 
				<input type="text" name="bank_name" placeholder="Bank Name" required id="bank_name" /> 
				<input type="text" name="bank_ac_no" placeholder="Bank ac no" id="acc_no" /> 
				<input type="text" name="bank_branch" placeholder="Branch" id="branch" /> 
				<input type="text" name="bank_city" placeholder="Bank City" id="bank_city" />
				<input type="text" name="bank_swift_code" placeholder="Bank Swift Code" id="bank_swift_code" />
			</div>
			<div class="span4">
				<h4>Address</h4>
				<input type="hidden" name="customer_address_id"	id="customer_address_id"/> 
				<input type="text" placeholder="House No./ Flat No." name="address_bill" id="house_no" />
				<input type="text" placeholder="Locality" name="locality_bill" id="locality"/>
				<input type="text" placeholder="City" name="city_bill" id="city"/> 
				<input type="text" placeholder="State" name="state_bill" id="state"/> 
				<input type="text" placeholder="Country" name="country_bill" id="country"/>
				<input type="text" placeholder="Pin" name="pin_bill" id="pin"/>
				<input type="text" placeholder="Phone" name="tel_bill" id="tel"/>
				<input type="text" placeholder="Fax" name="fax_bill" id="fax"/>
				<br/>
				<button type="button" class="input-medium btn btn-primary" id="btn_update_customer">Update</button>
			</div>
		</form>
	</div>
	<div class="row-fluid">
		<p class="loading_p"></p>
		<table class="table table-bordered table-condensed">
			<thead id="customer_list_header"></thead>
			<tbody id="customer_list" class="table table-bordered"></tbody>
		</table>
	</div>
</div>
<script type="text/javascript">
<!--

//-->
var search_query='0';
$('#customer_li').addClass('active');
window.onload = function() {
	$('#new_cust_form').show();
	$('#edit_customer_row').hide();
	get_all_customers();
};

function search_customer(){
	$('#search_btn').attr('disabled',true).html('<img src="<?php echo URL;?>assets/apps/img/loading.gif" class="img-circle" style="width:20px; height:20px;">');
	search_query=$('#search_customer').val();
	
	if(search_query!=''){
		get_all_customers();
	}
}
function get_all_customers(){
	$('.loading_p').show().html('<img src="<?php echo URL;?>assets/apps/img/loading.gif" class="img-circle" style="width:20px; height:20px;">');
	$.ajax({
		url: '<?php echo URL;?>customer/get_all_customers/'+search_query,
		dataType: 'JSON',
		type: 'POST',
		beforeSend: function(){
			$('#new_customer_row').hide();
			$('#edit_customer_row').hide();
			$('#customer_list_header').empty();
			$('#customer_list').empty();
		},
		success: function(resp){
			$('.loading_p').empty().hide();
			$('#search_btn').attr('disabled',false).html('<i class="icon-blue icon-search"></i>&nbsp;Search');
			if(resp.length==0){
				
			}else{
				$('#customer_list_header').append('<tr><th><strong>Company</strong></th><th><strong>Contact Person</strong></th><th><strong>Customer Type</strong></th><th><strong>Mobile</strong></th><th><strong>Outstanding</strong></th><th><strong>Action</strong></th></tr>');
				for(var key in resp){
					var balance =parseInt(resp[key].outstanding.out_standing);
					var total_sales =parseInt(resp[key].outstanding.total_sales);
					var total_payments=parseInt(resp[key].outstanding.total_payments);
					var outstnding ='NA';
					if(total_sales==0){
						outstnding='<td style="font:12; background-color: #f4f4f4"><span>No Sales</span></td>';
					}else if(balance>100000){
						outstnding='<td style="font:12; background-color: #fee0e2"><span>'+balance+'</span></td>';
					}
					else if(balance<=100000 && balance>0){
						outstnding='<td style="font:12; background-color: #fef9ea"><span>'+balance+'</span></td>';
					}else if(balance<=0){
						outstnding='<td style="font:12; background-color: #effaee"><span>'+balance+'</span></td>';
					}else{
						outstnding='<td style="font:12;"><span>'+balance+'</span></td>';
						}
					$('#customer_list').append('<tr><td style="display:none;">'+resp[key].id+'</td><td>'+resp[key].name+'</td><td>'+resp[key].contact+'</td><td>'+resp[key].customer_type+'</td><td>'+resp[key].mobile+'</td>'+outstnding+'<td><button class="btn btn-small" onclick="edit_customer('+resp[key].id+')"><span class="add-on"><i class="icon-edit"></i> </span> </button></td></tr>');
						
				}
			}
		}			
	});
}

$('#show_new_customer_row').click(function(){
	$("#new_customer_row").toggle("300");
	$("#edit_customer_row").hide("300");
});

$('#same_address').change(function(){
    var checked = this.checked;
    if(checked == true){
    	
    	$("#address_trans").val($("#address_bill").val()); 
		$("#locality_trans").val($("#locality_bill").val());
		$("#city_trans").val($("#city_bill").val());
		$("#state_trans").val($("#state_bill").val());
		$("#country_trans").val($("#country_bill").val());
		$("#pin_trans").val($("#pin_bill").val());
		$("#tel_trans").val($("#tel_bill").val());
		$("#fax_trans").val($("#fax_bill").val());
    	
    }
    else{
        
    	$("#address_trans").val(''); 
		$("#locality_trans").val('');
		$("#city_trans").val('');
		$("#state_trans").val('');
		$("#country_trans").val('');
		$("#pin_trans").val('');
		$("#tel_trans").val('');
		$("#fax_trans").val('');
    }
});

$('#btn_save_new_customer').click(function(){
	$('#btn_save_new_customer').attr('disabled',true).html('Saving...');
	var formData = $('form#new_cust_form').serialize();
	console.log(formData.name);
	$.ajax({
		url:'<?php echo URL;?>customer/save_new_customer',
		type:'POST',
		data: formData,
		dataType:'json',
		  success: function(resp){
			    $("#new_customer_row").slideUp(300);
			  	$('#btn_save_new_customer').attr('disabled',false).html('Save');
				var array_element = resp;
				if(array_element.id==0){
				}
				else{
					$('#customer_list').prepend('<tr><td style="display:none;">'+array_element['id']+'</td><td>'+array_element['company']+'</td><td class="span12">'+array_element['name']+'</td><td class="span12">'+array_element['mobile']+'</td><td class="span12">'+array_element['rating']+'</td></tr>');
					highilight();
					reset_form_new_cust_form();
				}
			  }
	});
	return false;
});
$('#btn_update_customer').click(function(){
	$('#btn_update_customer').attr('disabled',true).html('Saving...');
	var formData = $('form#edit_customer_form').serialize();
	$.ajax({
		url:'<?php echo URL;?>customer/update_customer',
		type:'POST',
		data: formData,
		dataType:'json',
		  success: function(resp){
			    $("#edit_customer_row").slideUp(300);
			  	$('#btn_update_customer').attr('disabled',false).html('Save');
				var array_element = resp;
				if(array_element.id==0){
				}
				else{
					get_all_customers();
					highilight();
					
				}
			  }
	});
	return false;
});

function highilight(){
	$("#customer_list tr:first").addClass('alert-success');
	setTimeout(function() {
	    $("#customer_list tr:first").removeClass('alert-success');
	}, 2500);
}

function reset_form_new_cust_form(){
	$('#new_cust_form').each(function(){
	    this.reset();
	});
}

function edit_customer(customer_id){
	$("#new_customer_row").hide("300");
	$("#edit_customer_row").hide();
	
	$('#edit_cust_form').each(function(){
	    this.reset();
	});
	$.ajax({
		url:'<?php echo URL;?>customer/get_customer_info/'+customer_id,
		type:'POST',
		dataType:'json',
		  success: function(resp){
			console.log(resp[0].customer_address_id);
			$("#edit_customer_row").slideDown("300");
			$('#customer_id').val(customer_id);
			$('#customer_address_id').val(resp[0].customer_address_id);
			$('#customer_name').val(resp[0].company);
			$('#customer_type').val(resp[0].customer_type);
			$('#contact_person').val(resp[0].name);
			$('#mobile').val(resp[0].mobile);
			$('#email').val(resp[0].email);
			$('#fax').val(resp[0].fax);
			$('#phone').val(resp[0].tel);
			$('#vat_no').val(resp[0].vat);
			$('#pan_no').val(resp[0].pan);
			$('#cst_no').val(resp[0].cst);
			$('#cst_valid').val(resp[0].cst_valid);
			$('#bank_name').val(resp[0].bank_name);
			$('#acc_no').val(resp[0].bank_ac_no);
			$('#branch').val(resp[0].bank_branch);
			$('#bank_city').val(resp[0].bank_city);
			$('#bank_swift_code').val(resp[0].bank_swift_code);
			$('#house_no').val(resp[0].address);
			$('#locality').val(resp[0].locality);
			$('#city').val(resp[0].city);
			$('#state').val(resp[0].state);
			$('#country').val(resp[0].country);
			$('#pin').val(resp[0].pin);
			$('#city').val(resp[0].city);
			$('#city').val(resp[0].city);
		  }
		});
}


</script>
