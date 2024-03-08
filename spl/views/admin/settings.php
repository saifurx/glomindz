<div class="container-fluid">
	<h3>Settings</h3>
	<div class="row-fluid">
		<div class="span2">
			<ul class="nav nav-pills nav-stacked">
				<li id="show_tax_div" class="active"><a href="#">Taxes</a></li>
				<li id="show_discount_div"><a href="#">Discounts</a></li>
				<li id="show_packages_div"><a href="#">Packages</a></li>
				<li id="show_users_div"><a href="#">Users</a></li>
			</ul>
		</div>

		<div class="span10" id="tax_div">
			<h4>Taxes</h4>
			<hr>

			<div class="row-fluid">
				<table class="table table-bordered table-condensed">
					<thead id="tax_list_header"></thead>
					<tbody id="tax_list" class="table table-bordered"></tbody>
				</table>
			</div>

		</div>
		<div class="span10" id="discount_div">

			<h4>
				Discount
				<button class="btn btn-success pull-right"
					id="show_new_discount_row">Add discount</button>
			</h4>
			<hr>
			<div class="alert alert-error hide" id="error_discount"></div>
			<div class="row-fluid" id="new_discount_row">
				<form action="" class="form form-inline" id="new_discount_form">
					<h5>New discount</h5>
					<input type="text" name="name" placeholder="name"
						required="required" /> <input type="text" name="remarks"
						placeholder="Remarks" required="required" /> <select
						name="customer_type">
						<option>--Customer Type--</option>
						<option value="Trade">Trade</option>
						<option value="Institutional">Institutional</option>
						<option value="Government">Government</option>
					</select> <input type="number" name="percentage"
						placeholder="Percentage" required="required" />

					<button type="button" class="btn btn-primary"
						id="btn_save_new_discount">Save</button>

				</form>
			</div>

			<br>
			<div class="row-fluid">
				<table class="table table-bordered table-condensed">
					<thead id="discount_list_header"></thead>
					<tbody id="discount_list" class="table table-bordered"></tbody>
				</table>
			</div>

		</div>
		<div class="span10" id="packages_div">
			<h4>
				Packages
				<button class="btn btn-success pull-right"
					id="show_new_packages_row">Add packages</button>
			</h4>
			<hr>
			<div class="alert alert-error hide" id="error_packages"></div>
			<div class="row-fluid" id="new_packages_row">
				<form action="" class="form form-inline" id="new_packages_form">

					<h5>New packages</h5>
					<input type="number" name="volume" placeholder="volume"
						required="required" /> <input type="hidden" name="unit_type"
						value="ml" /> <select name="type">
						<option>--Package Type--</option>
						<option value="Plastic">Plastic</option>
						<option value="Glass">Glass</option>

					</select> <input type="number" name="quantity_in_box"
						placeholder="quantity_in_box" required="required" />

					<button type="button" class="btn btn-primary"
						id="btn_save_new_packages">Save</button>

				</form>
			</div>

			<br>
			<div class="row-fluid">
				<table class="table table-bordered table-condensed">
					<thead id="packages_list_header"></thead>
					<tbody id="packages_list" class="table table-bordered"></tbody>
				</table>
			</div>

		</div>

		<div class="span10" id="users_div">
			<h4>
				Users
				<button class="btn btn-success pull-right" id="show_new_users_row">Add
					User</button>
			</h4>
			<hr>
			<div class="alert alert-error hide" id="error_users"></div>
			<div class="row-fluid" id="new_users_row">
				<form action="" class="form form-inline" id="new_users_form">
					<h5>New User</h5>
					<input type="text" class="input-medium" id="user_name" name="name"
						placeholder="Name" /> <input type="email" class="input-medium"
						id="user_email" name="email" placeholder="Email" /> <input
						type="text" class="input-medium" id="user_mobile" name="mobile"
						placeholder="Mobile" /> <select id="user_role" name="role"
						class="input-medium">
						<option value="sale">Sale</option>
						<option value="dispatch">Dispatch</option>
						<option value="account">Account</option>
					</select>
					<button type="button" id="save_new_user"
						class="input-medium btn btn-primary">Save</button>
				</form>
			</div>
			<br>
			<div class="row-fluid">
				<table class="table table-bordered table-condensed">
					<thead id="user_list_header"></thead>
					<tbody id="user_list" class="table table-bordered"></tbody>
				</table>
			</div>

		</div>
	</div>

</div>
<script type="text/javascript">
$('#settings_li').addClass('active');
window.onload = function() {
	get_taxes();
	get_discount();
	get_packages();
	get_users();
};
$('#show_new_tax_row').click(function(){
	$("#new_tax_row").slideDown("300");
});
$('#show_new_discount_row').click(function(){
	$("#new_discount_row").toggle("300");
});
$('#show_new_packages_row').click(function(){
	$("#new_packages_row").toggle("300");
});

$('#show_new_users_row').click(function(){
	$("#new_users_row").toggle("300");
});

$('#show_discount_div').click(function(){
	$("#discount_div").show();
	$('#show_discount_div').addClass('active');

	//hide
	$('#show_tax_div').removeClass();
	$("#tax_div").hide();
	$('#show_packages_div').removeClass();
	$("#packages_div").hide();
	$('#show_users_div').removeClass();
	$("#users_div").hide();
});

$('#show_tax_div').click(function(){
	$("#tax_div").show();
	$('#show_tax_div').addClass('active');

	//hide
	$('#show_discount_div').removeClass();
	$("#discount_div").hide();
	$('#show_packages_div').removeClass();
	$("#packages_div").hide();
	$('#show_users_div').removeClass();
	$("#users_div").hide();
});


$('#show_packages_div').click(function(){
	//show
	$("#packages_div").show();
	$('#show_packages_div').addClass('active');

	//hide
	$('#show_discount_div').removeClass();
	$("#discount_div").hide();
	$('#show_tax_div').removeClass();
	$("#tax_div").hide();
	$('#show_users_div').removeClass();
	$("#users_div").hide();
});


$('#show_users_div').click(function(){
	//show
	$("#users_div").show();
	$('#show_users_div').addClass('active');

	//hide
	$('#show_discount_div').removeClass();
	$("#discount_div").hide();
	$('#show_tax_div').removeClass();
	$("#tax_div").hide();
	$('#show_packages_div').removeClass();
	$("#packages_div").hide();
});
function get_taxes(){
	$.ajax({
		url: '<?php echo URL;?>settings/get_taxes',
		dataType: 'JSON',
		type: 'POST',
		beforeSend: function(){
			$('#tax_list_header').empty();
			$('#tax_list').empty();
			$('#tax_list').html('<tr><td><div class="progress progress-striped active"><div class="bar" style="width: 40%;"></div></div></td></tr>');
		},
		success: function(resp){
			$('#tax_list').html('<tr><td><div class="progress progress-striped active"><div class="bar" style="width: 80%;"></div></div></td></tr>');	
			$('#tax_list').empty();
			if(resp.length==0){
				//$('#guestlist_nill').append('<h4 class="alert-info">'+day+'</h4><p class="alert-error">Guestlist not submitted</p>');
			}else{
				$('#tax_list_header').append('<tr><th><strong>Name</strong></th><th><strong>Catagory</strong></th><th><strong>Percentage</strong></th><th><strong>Last Update</strong></th><th><strong>Action</strong></th></tr>');
			for(var key in resp){
				if(resp[key].status==0){
						$('#tax_list').append('<tr><td style="display:none;" class="id">'+resp[key].id+'</td><td class="span12">'+resp[key].name+'</td><td class="span12">'+resp[key].catagory+'</td><td class="span12">'+resp[key].percentage+'</td><td class="span12">'+resp[key].last_update+'</td><td><button class="disable label">Disabled</button></td></tr>');
					}else{
						$('#tax_list').append('<tr><td style="display:none;" class="id">'+resp[key].id+'</td><td class="span12">'+resp[key].name+'</td><td class="span12">'+resp[key].catagory+'</td><td class="span12">'+resp[key].percentage+'</td><td class="span12">'+resp[key].last_update+'</td><td><button class="enable label label-success">Enabled</button></td></tr>');
					}
				}
			}
		}			
	});
}

$("#tax_list").on("click", ".enable", function() {
	var id = $(this).closest("tr").find(".id").text();
	$(this).closest("tr").find(".enable").removeClass('enable label label-success').addClass('disable label').html("Disabled");
	update_status(id,1,1);
});

$("#tax_list").on("click", ".disable", function() {
	var id = $(this).closest("tr").find(".id").text();
	$(this).closest("tr").find(".disable").removeClass('disable label').addClass('enable label label-success').html("Enabled");
	update_status(id,0,1);
});


$('#btn_save_new_tax').click(function(){
	var formData = $('form#new_tax_form').serialize();
	$.ajax({
		url:'<?php echo URL;?>settings/add_tax',
		type:'POST',
		data: formData,
		dataType:'json',
		beforeSend: function (){
			$('btn_save_new_tax').attr('disabled',true);
			$('btn_save_new_tax').html('Saving...');
		},
		success: function(resp){
				$('btn_save_new_tax').attr('disabled',false);
				$('btn_save_new_tax').html('Save');
			  	console.log(resp['error']);
				if(resp['error']==''){
						
						$('#tax_list').prepend('<tr><td style="display:none;">'+resp['id']+'</td><td class="span12">'+resp['name']+'</td><td class="span12">'+resp['catagory']+'</td><td class="span12">'+resp['percentage']+'</td><td class="span12">Just Now</td><td><button class="label label-success" onclick="update_status('+resp['id']+',1,1)">Enabled</button></td></tr>');
						
					}else{
						
						$('#error_tax').empty().append('<strong>Oh snap! </strong> '+resp.error);
						$("#error_tax").slideDown("300");
					}
					
			  }
	});
	return false;
});

function get_discount(){
	$.ajax({
		url: '<?php echo URL;?>settings/get_discounts',
		dataType: 'JSON',
		type: 'POST',
		beforeSend: function(){
			$('#discount_list').empty();
		},
		success: function(resp){
				
			if(resp.length==0){
				//$('#guestlist_nill').append('<h4 class="alert-info">'+day+'</h4><p class="alert-error">Guestlist not submitted</p>');
			}else{
				$('#discount_list_header').append('<tr><th><strong>Name</strong></th><th><strong>Remarks</strong></th><th><strong>Customer Type</strong></th><th><strong>Percentage</strong></th><th><strong>Last Update</strong></th><th><strong>Action</strong></th></tr>');
			for(var key in resp){
				if(resp[key].status==0){
						$('#discount_list').append('<tr><td style="display:none;" class="id">'+resp[key].id+'</td><td class="span12">'+resp[key].name+'</td><td class="span12">'+resp[key].remarks+'</td><td class="span12">'+resp[key].customer_type+'</td><td class="span12">'+resp[key].percentage+'</td><td class="span12">'+resp[key].last_update+'</td><td><button class="disable label">Disabled</button></td></tr>');
					}else{
						$('#discount_list').append('<tr><td style="display:none;" class="id">'+resp[key].id+'</td><td class="span12">'+resp[key].name+'</td><td class="span12">'+resp[key].remarks+'</td><td class="span12">'+resp[key].customer_type+'</td><td class="span12">'+resp[key].percentage+'</td><td class="span12">'+resp[key].last_update+'</td><td><button class="enable label label-success">Enabled</button></td></tr>');
					}
				}
			}
		}			
	});
}

$("#discount_list").on("click", ".enable", function() {
	var id = $(this).closest("tr").find(".id").text();
	$(this).closest("tr").find(".enable").removeClass('enable label label-success').addClass('disable label').html("Disabled");
	update_status(id,1,2);
});

$("#discount_list").on("click", ".disable", function() {
	var id = $(this).closest("tr").find(".id").text();
	$(this).closest("tr").find(".disable").removeClass('disable label').addClass('enable label label-success').html("Enabled");
	update_status(id,0,2);
});


$('#btn_save_new_discount').click(function(){
	var formData = $('form#new_discount_form').serialize();
	$.ajax({
		url:'<?php echo URL;?>settings/add_discount',
		type:'POST',
		data: formData,
		dataType:'json',
		  success: function(resp){
			  	console.log(resp['error']);
				if(resp['error']==''){
						
						$('#discount_list').prepend('<tr><td style="display:none;">'+resp['id']+'</td><td class="span12">'+resp['name']+'</td><td class="span12">'+resp['remarks']+'</td><td class="span12">'+resp['customer_type']+'</td><td class="span12">'+resp['percentage']+'</td><td class="span12">Just Now</td><td><button class="label label-success" onclick="update_status('+resp['id']+',1,2)">Enabled</button></td></tr>');
						
					}else{
						
						$('#error_discount').empty().append('<strong>Oh snap! </strong> '+resp.error);
						$('#error_discount').show();
					}
					
			  }
	});
	return false;
});

function get_packages(){
	$.ajax({
		url: '<?php echo URL;?>settings/get_packages',
		dataType: 'JSON',
		type: 'POST',
		beforeSend: function(){
			$('#packages_list').empty();
		},
		success: function(resp){
			if(resp.length==0){
				//$('#guestlist_nill').append('<h4 class="alert-info">'+day+'</h4><p class="alert-error">Guestlist not submitted</p>');
			}else{
				$('#packages_list_header').append('<tr><th><strong>Volume</strong></th><th><strong>Type</strong></th><th><strong>Quantity in box</strong></th><th><strong>Unit Type</strong></th></tr>');
			for(var key in resp){
					$('#packages_list').append('<tr><td style="display:none;">'+resp[key].id+'</td><td class="span12">'+resp[key].volume+'</td><td class="span12">'+resp[key].type+'</td><td class="span12">'+resp[key].quantity_in_box+'</td><td class="span12">'+resp[key].unit_type+'</td></tr>');
				}
			}
		}			
	});
}

$('#btn_save_new_packages').click(function(){
	var formData = $('form#new_packages_form').serialize();
	$.ajax({
		url:'<?php echo URL;?>settings/add_package',
		type:'POST',
		data: formData,
		dataType:'json',
		  success: function(resp){
				if(resp['error']==''){
						$('#packages_list').prepend('<tr><td style="display:none;">'+resp['id']+'</td><td class="span12">'+resp['volume']+'</td><td class="span12">'+resp['type']+'</td><td class="span12">'+resp['quantity_in_box']+'</td><td class="span12">'+resp['unit_type']+'</td></tr>');
						
					}else{
						
						$('#error_packages').empty().append('<strong>Oh snap! </strong> '+resp.error);
						$('#error_packages').show();
					}
			  }
	});
	return false;
});

$('#save_new_user').click(function(){
	var formData = $('form#new_users_form').serialize();
	$.ajax({
		url:'<?php echo URL;?>settings/add_user',
		type:'POST',
		data: formData,
		dataType:'json',
		  success: function(resp){
				if(resp['error']===''){
						$('#user_list').prepend('<tr><td style="display:none;">'+resp['id']+'</td><td class="span12">'+resp['name']+'</td><td>'+resp['email']+'</td><td>'+resp['mobile']+'</td><td><button class="enable label label-success">Enabled</button></td></tr>');
					}else{
						$('#error_users').empty().append('<strong>Oh snap! </strong> '+resp.error);
						$('#error_users').show();
					}
			  }
	});
	return false;
});

function get_users(){
	$.ajax({
		url: '<?php echo URL;?>settings/get_users',
		dataType: 'JSON',
		type: 'POST',
		beforeSend: function(){
			$('#user_list_header').empty();
			$('#user_list').empty();		
		},
		success: function(resp){
			$('#user_list').html('<tr><td><div class="progress progress-striped active"><div class="bar" style="width: 80%;"></div></div></td></tr>');	
			$('#user_list').empty();
			if(resp.length==0){
			}else{
				$('#user_list_header').append('<tr><th><strong>Name</strong></th><th><strong>Email</strong></th><th><strong>Mobile</strong></th><th><strong>Action</strong></th></tr>');
			for(var key in resp){
				if(resp[key].status==0){
						$('#user_list').append('<tr><td style="display:none;" class="id">'+resp[key].id+'</td><td class="span12">'+resp[key].name+'</td><td class="span12">'+resp[key].email+'</td><td class="span12">'+resp[key].mobile+'</td><td><button class="disable label">Disabled</button></td></tr>');
					}else{
						$('#user_list').append('<tr><td style="display:none;" class="id">'+resp[key].id+'</td><td class="span12">'+resp[key].name+'</td><td class="span12">'+resp[key].email+'</td><td class="span12">'+resp[key].mobile+'</td><td><button class="enable label label-success">Enabled</button></td></tr>');
					}
				}
			}
		}			
	});
}

$("#user_list").on("click", ".enable", function() {
	var id = $(this).closest("tr").find(".id").text();
	$(this).closest("tr").find(".enable").removeClass('enable label label-success').addClass('disable label').html("Disabled");
	update_status(id,1,3);
});

$("#user_list").on("click", ".disable", function() {
	var id = $(this).closest("tr").find(".id").text();
	$(this).closest("tr").find(".disable").removeClass('disable label').addClass('enable label label-success').html("Enabled");
	update_status(id,0,3);
});


function update_status(id,status,table){
	if(table != '' || table != null){
		$.ajax({
			url:'<?php echo URL;?>settings/change_status',
			type:'POST',
			data: {id:id, status:status, table_name:table},
			dataType:'json',
			  success: function(resp){
				  if(resp==1){
					if(status == 1){
			  			$(this).removeClass('label label-success').addClass('label').html('Disable');				  							
			  		}
			  		else{
			  			$(this).removeClass('label').addClass('label label-success').html('Enable');			
				  	}	
				  }	else{
						
						$('#error_packages').empty().append('<strong>Oh snap! </strong> '+resp);
						$('#error_packages').show();
					}  
			  }
		});
	}
}
</script>
