	<div class="container">
		<div class="alert alert-error" id="chrome">
			<button type="button" class="close" data-dismiss="alert">
				<i class="icon-remove"></i>
			</button>
			<strong>Please <a
				href="https://www.google.com/intl/en/chrome/browser/"
				target="_blank">download and install Google Chrome</a> for full
				functionality. </strong>
		</div>
		<h3>Password Reset</h3>

		<hr>
		<div class="row">
				<div class="alert alert-info hide" id="reg_success">
					<p>Check your email for reset password</p>
				</div>
				<div class="alert alert-warning hide" id="reg_error">
					<p>Please try Later.</p>
				</div>
				<div class="span4" id="form_hotel">
					<form class="form-signin" action="<?php echo URL;?>login/recover_password" method="post"  class="form-inline" id="recover_password">
						<span class="help-block">Please enter your registered email below.</span>
						<input type="email" class="input-xlarge" name="email" placeholder="Email"required />
						<a type="submit" class="btn btn-danger"	id="submit_form">Submit</a>
					</form>
				</div>
		</div>
</div>		
<script type="text/javascript">
		$(document).ready(function () {
			if($.browser.webkit) {
			    $('#chrome').hide();
			}
		});
		$('#submit_form').click(function () {
			var formData = $('form#recover_password').serialize();
			$.ajax({
				  type: 'POST',
				  url: '<?php echo URL;?>login/recover_password',
				  data: formData,
				  success: function(resp){
					  	$('.loginBox').hide();
					  	if(resp!=0){
						  	
							$('#reg_success').show();
							
					  	}else{
						  	
					  		$('#reg_error').show();
					  		
						}
					}
				});
		});
</script>
