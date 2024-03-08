<div class="container-fluid">
	<div class="row-fluid">
		<div id="success" class="alert alert-success" style="display: none;">
			<strong>Password Changed</strong>
		</div>
		<div class="span4" id="change_passwd" style="display: none;">

			<form class="form-horizontal" action="#" method="post"
				id="change_passwd_form">
				<legend>Change Password</legend>
				<input id="new_passwd" type="password" name="password"
					placeholder="New Password" required /><br /> <br /> <input
					id="confirm_passwd" type="password"
					placeholder="Confirm New Password" required /> <br> <br> <a
					id="submit_new_passwd" class="btn">Save</a>
			</form>


		</div>
		<div class="span4" id="update_profile">

			<form class="form" action="#" method="post"
				id="update_profile_form">
				<legend>Update Profile</legend>
				<input id="name" type="text" name="name" value="" placeholder="name" disabled/>
				<input id="email" type="email" name="email" value=""
					placeholder="email" disabled/> <input id="designation" type="text"
					name="designation" value="" placeholder="designation" disabled/> <input
					id="estimate_monthly_burndown" type="number"
					name="estimate_monthly_burndown" value=""
					placeholder="estimate_monthly_burndown" /> <input id="expected_cost_per_hr"
					type="number" name="expected_cost_per_hr" value="" placeholder="expected_cost_per_hr"/> <input id="name" type="text"
					name="name" value="" placeholder="designation"/> <input id="name" type="text" name="name"
					value="" placeholder="designation"/> <a id="update_profile_btn" class="btn">Save</a>
			</form>
   

		</div>
	</div>

	<!--/row-->
</div>
<hr>

<script type="text/javascript">

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
