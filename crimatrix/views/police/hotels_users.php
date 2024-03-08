<div class="container">
	<div class="row-fluid">
		<h4 class="span6">Registerd Hotels & Lodges</h4>
		<div class="span6 input-append">
		<div class="pull-right">
			<input id="search_hotel" type="text" class="row" placeholder="Search by hotel name">
			<button class="btn" type="button" onclick="search_hotel();">
				<i class="icon-blue icon-search"></i>&nbsp;Search
			</button>
		</div>	
		</div>
	</div>
	<hr>
	<div class="row-fluid bottom_up">
		<table class="table table-bordered table-condensed">
			<thead id="hotel_master_header">
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Contact Person</th>
					<th>Email</th>
					<th>Mobile</th>
					<th>Police Station</th>
					<th>Location</th>
					<th>Approve</th>
					<th>Reset</th>
					<th>Edit</th>
				</tr>
			</thead>
			<tbody id="hotel_master" class="table table-bordered"></tbody>
		</table>
	</div>
</div>

<div id="edituserModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="cancel_submitUserinfo();">&times;</button>
    <h3 id="myModalLabel">Edit User Details</h3>
  </div>
  <div class="modal-body">
  	<form action="" id="edituserdetails_form">
  		<div class="span3">
	  		<input type="hidden" id="user_type" name="user_type">
	  		<input type="hidden" id="profile_id" name="profile_id">
	  		<label>Name</label>
	  		<input class="input-block-level" type="text" id="user_name" name="name">
	  		<label>Email</label>
	  		<input class="input-block-level" type="text" id="user_email" name="email">
	  		<label>Mobile</label>
	  		<input class="input-block-level" type="text" id="user_mobile" name="mobile">
	  		<label>Contact Person</label>
  			<input class="input-block-level" type="text" name="contact_person" id="user_contact_person">
  			<label>City</label>
  			<input class="input-block-level" type="text" name="city" id="user_city">
  			<label>Police Station</label>
  			<select class="ps_id input-block-level" name="ps_id" id="user_ps_id">
  			</select>
  		</div>
  		<div class="span3">
  			<label>Locality</label>
  			<input class="input-block-level" type="text" name="locality" id="user_locality">
  			<label>Pin</label>
  			<input class="input-block-level" type="text" name="pin" id="user_pin">
  			<label>No of Rooms</label>
  			<input class="input-block-level" type="text" name="no_of_rooms" id="user_no_of_rooms">
  			<label>Licence No</label>
  			<input class="input-block-level" type="text" name="licence_no" id="user_licence_no">
  			<label>Address</label>
  			<textarea rows="4" cols="" class="input-block-level" name="address" id="user_address"></textarea>
  		</div>
  	</form>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true" onclick="cancel_submitUserinfo();">Close</button>
    <button class="btn btn-primary" type="button" onclick="submitUserinfo();" id="submitUserinfo_btn">Save changes</button>
  </div>
</div>


<script type="text/javascript">
var search_query='0';
window.onload = function() {
	$('#setting_dropdown_li').addClass('active');
	get_all_ps();
	get_registered_hotels();
};

function get_all_ps(){
	$.ajax({
		url: '<?php echo URL;?>user_service/get_all_ps/',
		type: 'POST',
		dataType: 'JSON',
		success: function(data){
			$('#ps_id').empty();
			$('#ps_id').append('<option value="0">All</option>');
			$('#edit_crime_modal_ps_id,#add_crime_modal_ps_id').append('<option value="0">All</option>');
			for(var i in data){
				  $('.ps_id').append($('<option value="'+data[i].id+'">'+data[i].name+'</option>'));
			}
		}		
	});
}

function search_hotel(){

	search_query = $('#search_hotel').val();
	get_registered_hotels();
}

function get_registered_hotels(){
	$('#hotel_master').html('<p class="loading_img"><img alt="loading" src="<?php echo URL;?>/assets/apps/img/loading.gif"/></p>');
	$.ajax({
		url: '<?php echo URL;?>police_service/get_registered_hotels/'+search_query,
		dataType: 'JSON',
		success: function(data){
			$("#hotel_master").empty();
			var count=0;
			for (var i in data){
				count= count +1;
				var url='';

				var resetpass = '<td id=reset_'+data[i].id+' class="resetpass"><a title="Click to Reset Password" class="label label-inverse">Reset</a></td>';
				var edit = '<td id=edit_'+data[i].id+' class="edituser"><a title="Click to Edit" class="label label-important">Edit</a></td>';

				if(data[i].status==0){
					url= '<td id='+data[i].id+' class="is-disable"><a title="Click to Enable" class="label">Disabled</a></td>';
				}else{
					url= '<td id='+data[i].id+' class="is-enable"><a title="Click to Disable" class="label label-success">Enabled</a></td>';
				}

				$('#hotel_master').append('<tr id=tr_'+data[i].id+'><td>'+count+'</td><td class="id hidden">'+data[i].id+'</td><td class="name">'+data[i].name+'</td><td class="contact_person">'+data[i].contact_person+'</td><td class="email">'+data[i].email+'</td><td class="mobile">'+data[i].mobile+'</td><td>'+data[i].ps_name+'</td><td class="locality">'+data[i].locality+'</td>'+url+resetpass+edit+'</tr>');	
			}	
		}			
	});
}

$("#hotel_master").on("click", ".is-disable", function(){
	
	var  profile_id = $(this).closest("tr").find(".id").text();
	var  name = $(this).closest("tr").find(".name").text();
	var  email = $(this).closest("tr").find(".email").text();
	var user_type='hotel';
	var status = 1;
	document.getElementById(profile_id).innerHTML='<a><img src="<?php echo URL;?>assets/apps/img/loading.gif"  width="20" heigth="20"></a>';
	approve_hotel(profile_id,name,email,user_type,status);
});

$("#hotel_master").on("click", ".is-enable", function(){
	var  profile_id = $(this).closest("tr").find(".id").text();
	var  name = $(this).closest("tr").find(".name").text();
	var  email = $(this).closest("tr").find(".email").text();
	var user_type='hotel';
	var status = 0;
	document.getElementById(profile_id).innerHTML='<a><img src="<?php echo URL;?>assets/apps/img/loading.gif" width="20" heigth="20"></a>';
	approve_hotel(profile_id,name,email,user_type,status);
});

function approve_hotel(profile_id,name,email,user_type,status){
	 $.ajax({
		url: '<?php echo URL;?>police_service/change_account_status/',
		type: 'POST',
		dataType: 'JSON',
		data:{'profile_id':profile_id,'name':name,'email':email,'user_type':user_type,'status':status},
		success: function(data){
			if(data==0){
				document.getElementById(profile_id).innerHTML='<a title="Click to Enable" class="label">Disabled</a>';
				$('#'+profile_id).removeClass('is-enable').addClass('is-disable');
			}
			else{
				document.getElementById(profile_id).innerHTML='<a title="Click to Disable" class="label label-success">Enabled</a>';
				$('#'+profile_id).removeClass('is-disable').addClass('is-enable');
			}
		}			
	});
}



$("#hotel_master").on("click", ".resetpass", function(){
	var  profile_id = $(this).closest("tr").find(".id").text();
	var  name = $(this).closest("tr").find(".name").text();
	var  email = $(this).closest("tr").find(".email").text();
	var  mobile = $(this).closest("tr").find(".mobile").text();
	var user_type='hotel';
	document.getElementById('reset_'+profile_id).innerHTML='<a><img src="<?php echo URL;?>assets/apps/img/loading.gif" width="20" heigth="20"></a>';
	reset_pass(profile_id,name,email,mobile,user_type);
});

function reset_pass(profile_id,name,email,mobile,user_type){
	 $.ajax({
		url: '<?php echo URL;?>police_service/reset_password/',
		type: 'POST',
		dataType: 'JSON',
		data:{profile_id:profile_id,name:name,email:email,user_type:user_type,mobile:mobile},
		success: function(data){
			alert('Done');
			document.getElementById('reset_'+profile_id).innerHTML='<a title="Click to Reset Password" class="label label-inverse">Reset</a>';
		}			
	});
}

$("#hotel_master").on("click", ".edituser", function(){
	var  profile_id = $(this).closest("tr").find(".id").text();
	var user_type='hotel';
	document.getElementById('edit_'+profile_id).innerHTML='<a><img src="<?php echo URL;?>assets/apps/img/loading.gif" width="20" heigth="20"></a>';
	 $.ajax({
			url: '<?php echo URL;?>police_service/get_user_details/',
			type: 'POST',
			dataType: 'JSON',
			data:{profile_id:profile_id,user_type:user_type},
			success: function(data){
				console.log(data);
				for(var i in data){
					//console.log(data);
					$('#cancel_submitUserinfo_btn').attr('data-profile_id',profile_id);
					$('#user_type').val(user_type);
					$('#profile_id').val(profile_id);
					$('#user_name').val(data[i].name);
					$('#user_email').val(data[i].email);
					$('#user_mobile').val(data[i].mobile);				
					$('#user_contact_person').val(data[i].contact_person);
					$('#user_city').val(data[i].city);
					$('#user_ps_id').val(data[i].ps_id);
					$('#user_locality').val(data[i].locality);
					$('#user_pin').val(data[i].pin);
					$('#user_no_of_rooms').val(data[i].no_of_rooms);
					$('#user_licence_no').val(data[i].licence_no);
					$('#user_address').val(data[i].address);
				}
				$('#edituserModal').modal('show');
			}			
	});
});

function submitUserinfo(){
	var formData = $('#edituserdetails_form').serialize();
	$("#submitUserinfo_btn").attr('disabled', true).html('<img src="<?php echo URL;?>assets/apps/img/loading.gif" width="20" heigth="20">');
	 $.ajax({
			url: '<?php echo URL;?>police_service/update_user_details/',
			type: 'POST',
			dataType: 'JSON',
			data:formData,
			success: function(data){
				$('#edituserModal').modal('hide');
				$("#submitUserinfo_btn").attr('disabled', false).html('Save changes');
				document.getElementById('edit_'+data).innerHTML='<a title="Click to Edit" class="label label-important">Edit</a>';
				$('#edituserdetails_form').each(function(){this.reset();});
				get_registered_hotels();		
			}			
	});
}

function cancel_submitUserinfo(){
	var profile_id = $('#profile_id').val();
	document.getElementById('edit_'+profile_id).innerHTML='<a title="Click to Edit" class="label label-important">Edit</a>';
}
</script>
