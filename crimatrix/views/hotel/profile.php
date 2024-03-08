<div class="container">
	<div class="row-fluid">
		<h3 class="pull-left">Profile</h3>
	</div>
	<hr>
	<div class="row-fluid">
		<div class="" id="info" style="display: none;"></div>
	</div>
	<div class="row-fluid">
	<!-- 	<div class="span4">
			<img alt="" src="http://placehold.it/350x350" id="photo">
			<input type="file" class="" id="imgfiles" onchange="readURL(this);">
			
		</div>
	-->	
		<form action="" id="hotel_profile_edit_form">
			<div class="span4">
				<input type="hidden" id="profile_id" name="id">
				<label>Hotel Name</label>
				<input type="text" class="" id="name" name="name" >
				
				<label>Contact Person</label>
				<input type="text" class="" id="contact_person" name="contact_person" >
				
				<label>City</label>
				<select class="" id="city_id" name="city" >
					<option value="Guwahati">Guwahati</option>
				</select>
						
				<label>Police Station</label>
				<select class="" id="ps_id" name="ps_id" >
					
				</select>
				<!-- Can't change Email And Mobile. So no name attribute -->
				<label>Mobile</label>
				<input type="text" class="" id="mobile_no" disabled="disabled">
				<label>Email</label>
				<input type="text" class="" id="email_id" disabled="disabled">
				<label><br></label>
				<a href="#changePasswordModal" role="button" class="" data-toggle="modal">Change Password</a>
			</div>
			<div class="span4">
				<label>Locality</label>
				<input type="text" class="" id="locality" name="locality" >
				
				<label>Pin</label>
				<input type="text" class="" id="pin" name="pin" >
					
				<label>Number of Rooms</label>
				<input type="number" class="" id="no_of_rooms" name="no_of_rooms" >
					
				<label>Licence No.</label>
				<input type="text" class="" id="licence_no" name="licence_no" >
					
				<label>Address</label>
				<textarea rows="5" cols="" class="" id="address" name="address" ></textarea>
				<label></label>
				
					<label>
					<button type="button" id="edit_profile_btn" class="btn span7 btn-primary hidden" onclick="edit_profile();">Edit</button>
					<button type="button" id="save_profile_btn" class="btn span7 btn-primary" onclick="save_profile();">Save</button>
					</label>
			</div>
		</form>	

	</div>
</div>	

<div id="changePasswordModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">Change Password</h3>
  </div>
  <div class="modal-body">
 
	<form class="form-horizontal span3 offset1" action="#" method="post" id="change_passwd_form">
		<label></label>
		<input class="input-block-level" id="new_passwd" type="password" name="password" placeholder="New Password" required="required"><br/><br/>
		<input class="input-block-level" id="confirm_passwd" type="password" placeholder="Confirm New Password" required="required"><br/><br/>
	</form>
				  
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Skip</button>
    <button id="submit_new_passwd"  type="button" class="btn btn-primary">Save changes</button>
  </div>
</div>
<script type="text/javascript">
	$('#hotel_profile_li').addClass('active');
	get_all_ps();
	window.onload = function() {
		get_user_profile_details();
		$('#save_profile_btn').show();
	};

	function toggleLoginBox(){
		$('.loginBox').toggle();
		$('#success').hide();
	}
	
	function get_all_ps(){
		$.ajax({
			url: '<?php echo URL;?>user_service/get_all_ps/',
			type: 'POST',
			dataType: 'JSON',
			success: function(data){
				$('#ps_id').empty();
				for(var i in data){
					  $('#ps_id').append($('<option value="'+data[i].id+'">'+data[i].name+'</option>'));
				}
			}		
		});
	}
	
	function get_user_profile_details(){
		<?php Session::init(); ?>
		var id = <?php echo Session::get("user_id");?>;
		var status = <?php echo Session::get("status");?>;
		$.ajax({
			url: '<?php echo URL;?>hotel_service/get_user_profile_details/',
			type: 'POST',
			dataType: 'JSON',
			data: {id:id},
			success: function(resp){
				for(var i in resp){
					$('#profile_id').val(resp[i].id);
					$('#name').val(resp[i].name);
					$('#contact_person').val(resp[i].contact_person);
					$('#city_id').val(resp[i].city_id);
					$('#ps_id').val(resp[i].ps_id);
					$('#mobile_no').val(resp[i].mobile);
					$('#email_id').val(resp[i].email);
					$('#locality').val(resp[i].locality);
					$('#pin').val(resp[i].pin);
					$('#no_of_rooms').val(resp[i].no_of_rooms);
					$('#licence_no').val(resp[i].licence_no);
					$('#address').val(resp[i].address);

					if(resp[i].contact_person.length==0){
						$('#info').html('<h3 class="alert alert-error">Please update your profile information.</h3>').show();
					}
					else if(status==0 && resp[i].contact_person.length!=0){
						$('#info').html('<h3 class="alert alert-success">We will get back to you soon. Your account will be activated within 24 hrs</h3>').show();
					}	  
				}
			}		
		});
	}

	function edit_profile(){
		$('#edit_profile_btn').removeClass('btn span7 btn-primary').addClass('btn span7 btn-primary hidden');
		$('#save_profile_btn').show();
		$('#save_profile_btn, #hotel_profile_edit_form input, select, textarea').attr('disabled', false);
		$('#mobile_no,#email_id').attr('disabled', true);
	}
	
	function save_profile(){
		$('#save_profile_btn').attr('disabled', true);
		var contact_person = $('#contact_person').val();
		var ps_id = $('#ps_id').val();
		var formData = $('#hotel_profile_edit_form').serializeArray();
		if(contact_person ==''){
			alert('Please Enter Contact Person Name');
			$('#save_profile_btn').attr('disabled', false);
		}
		else if(ps_id == 0){
			alert('Please Enter Police Station');
			$('#save_profile_btn').attr('disabled', false);
		}
		else{
			$.ajax({
				type: 'POST',
				url: '<?php echo URL;?>hotel_service/update_user_profile_info/',
				dataType: 'JSON',
				data: formData,
				success: function(resp){
					$('#save_profile_btn').hide();
					$('#edit_profile_btn').removeClass('btn span7 btn-primary hidden').addClass('btn span7 btn-primary');
					$('#hotel_profile_edit_form input, select, textarea').attr('disabled', true);
					$('#info').html('<h3 class="alert alert-success">We will get back to you soon. Your account will be activated within 24 hrs</h3>').show();
				}
			});
		}
	}

	$('#submit_new_passwd').click(function () {
		$('#submit_new_passwd').attr('disabled',true);
		var new_passwd = $('#new_passwd').val();
		var confirm_passwd = $('#confirm_passwd').val();
		if((new_passwd == confirm_passwd) && new_passwd.length !=0){
			var formData = $('form#change_passwd_form').serialize();
			$.ajax({
				  type: 'POST',
				  url: '<?php echo URL;?>hotel_service/change_password/',
				  data: formData,
				  success: function(data){
						$('#changePasswordModal').model('hide');			
				  }
			});
		}
	});
</script>