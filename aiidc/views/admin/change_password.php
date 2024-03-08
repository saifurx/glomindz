<div class="container">
	<div class="subnav subnav-fixed">
		<ul class="nav nav-pills">

			<li><a href="<?php echo URL;?>admin/edit_block">Update Block</a></li>
			<li><a href="<?php echo URL;?>admin/remarks">GM Comments</a>
			</li>
			<?php if(Session::get("role")!="default"){?>
			<li><a href="<?php echo URL;?>admin/analytics">Analytics</a>
			
			<li><a href="<?php echo URL;?>admin">Users List</a>
			</li>


			<li><a href="<?php echo URL;?>admin/approve">Modified Data</a></li>
			<?php }else{?>
			<li><a href="<?php echo URL;?>admin/modification">Modified Data</a></li>
			<?php }?>

			<li class="active"><a href="<?php echo URL;?>admin/change_password">Change
					Password</a>
			</li>
		</ul>
	</div>

	<hr>
	<div class="row">

		<div class="span4"></div>
		<div class="span4">
			<div class="loginBox">
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
				  url: '<?php echo URL;?>admin/save_changed_password',
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
