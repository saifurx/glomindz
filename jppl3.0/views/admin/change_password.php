<div class="container-fluid">
	<div class="row-fluid">
		<div class="span4"></div>
		<div class="span4">
			<div class="loginBox">
				<form class="form-horizontal" action="#" method="post"
					id="change_passwd_form">
					<legend>Change Password</legend>
					<input id="new_passwd" type="password" name="password"
						placeholder="New Password" required /><br />
					<br /> <input id="confirm_passwd" type="password"
						placeholder="Confirm New Password" required /> <br> <br> <a
						id="submit_new_passwd" class="btn">Save</a>
				</form>
			</div>
			<div id="success" class="alert alert-success" style="display: none;">
				<strong>Password Changed</strong>
			</div>
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
				  url: '<?php echo URL;?>hotel/save_changed_password',
				  data: formData,
				  success: function(){
					  	$('.loginBox').hide();
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
