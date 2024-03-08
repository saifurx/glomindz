<style>
#afile{
	display: none;
}
#label_before_afile{
	width: 180px;
}
#change_password_div{
	display: none;
}
#show_change_pass_div{
	cursor: pointer;
}
</style>
<div class="container-fluid">
	<div class="row-fluid">
		<h4>Profile Information<span class="label label-inverse pull-right" id="show_change_pass_div" onclick="show_change_pass_div();">Change Password</span></h4>
	</div>
	<hr>
	<div class="row-fluid" id="change_password_div">
		<div id="success" class="alert alert-success" style="display: none;">
			<strong>Password Changed</strong>
		</div>
		<div id="change_passwd">
			<form class="form-inline alert" action="#" method="post" id="change_passwd_form">
				<div class="controls controls-row">
					<label class="span2"><strong class="label label-info">Change Password</strong></label>
					<input class="span3" id="new_passwd" type="password" name="password" placeholder="New Password" required />
					<input class="span3" id="confirm_passwd" type="password" placeholder="Confirm New Password" required />
					<a class="btn span2" id="submit_new_passwd">Save</a>
				</div>
			</form>
		</div>
	</div>
	<div class="row-fluid" id="profile_form_div">
		<div class="span6">
			<form class="form-horizontal">
				<div class="control">
					<label class="control-label" id="label_before_afile"></label>
					<input type="file" onchange="readURL(this);" name="afile" id="afile" accept="image/jpeg"> 
					<img id="photo"	style="margin-bottom: 50px;" class="img-polaroid" src="http://placehold.it/200x150">
				</div>
				<div class="control-group">
					 <label class="control-label">Name</label>
					<div class="controls">
						<input type="text" id="name" name="name"/>
					</div>
				</div>
				<div class="control-group">
					 <label class="control-label">Designation</label>
					<div class="controls">
						<input type="text" id="designation" name="designation"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Address</label>
					<div class="controls">
						<textarea rows="3" cols="" id="address" name="address"></textarea>
					</div>
				</div>
			</form>
		</div>
		<div class="span6">
			<form class="form-horizontal">
				
				<div class="control-group">
					 <label class="control-label">City</label>
					<div class="controls">
						<input type="text" id="City" name="City"/>
					</div>
				</div>
				<div class="control-group">
					 <label class="control-label">District</label>
					<div class="controls">
						<input type="text" id="district" name="district"/>
					</div>
				</div>
				<div class="control-group">
					 <label class="control-label">State</label>
					<div class="controls">
						<input type="text" id="state" name="state"/>
					</div>
				</div>
				<div class="control-group">
					 <label class="control-label">Pin</label>
					<div class="controls">
						<input type="text" id="pin" name="pin"/>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						 <button type="submit" class="btn btn-success">Save</button>
					</div>
				</div>
			</form> 
		</div>
	</div>
</div>




 

	



<script type="text/javascript">
	function show_change_pass_div(){
		$('#change_password_div').toggle();
		
		if ($('#change_password_div').css('display') == 'none') {
			$('#profile_form_div').css('opacity', '1.00');
		}
		else{
			$('#profile_form_div').css('opacity', '0.3');
			$('#change_password_div').css('opacity', '1.00');
		}
	}
	$('#submit_new_passwd').click(function () {
		var new_passwd = $('#new_passwd').val();
		var confirm_passwd = $('#confirm_passwd').val();
		if(new_passwd == confirm_passwd){
			var formData = $('form#change_passwd_form').serialize();
			$.ajax({
				  type: 'POST',
				  url: '<?php echo URL;?>admin/save_changed_password',
				  data: formData,
				  
				  success: function(resp){
					  	$('#change_passwd').hide();
						$('#success').show();
					}
				});
		}
		else{
			$('#new_passwd').val('');
			$('#confirm_passwd').val('');
			alert("Password Doesn't matched");
		}
	});
</script>
