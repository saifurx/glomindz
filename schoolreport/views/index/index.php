<div class="container">
	<div class="row-fluid">
		<div class="span12">
			<div class="span2"></div>
			<div class="span8">
				<div class="login_form">
					<form class="form-signin" action="<?php echo URL;?>user_service/login" method="post">
	        			<h4 class="alert alert-info form-signin-heading">Please sign in</h4>
	        			<input type="text" class="span12 input-medium" placeholder="Email or Mobile" name="user" required="required">
	        			<input type="password" class="span12 input-medium" placeholder="Password" name="password" required="required">
	        			<input type="text" class="span12 input-medium" id="error" disabled="disabled" value="Something Went Wrong">
	        			<input type="submit" class="span12 input-medium btn btn-success" id="login_btn" value="Sign in">
	        			<a href="#forgetpasswdModal" role="button" data-toggle="modal" class="pull-left" style="margin-top: 10px;">Forgot Password ?</a>
                    </form>
				</div>
			</div>
			<div class="span2"></div>
		</div>
	</div>
</div>
<!-- Modal part -->
<div id="forgetpasswdModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 id="myModalLabel">Forgot Password</h3>
            </div>
            <div class="modal-body">
                <h4>Please enter your registered email below.</h4>
                <div class="input-append">
                    <input type="email" class="input-xlarge" id="forgetpasswdEmail" placeholder="Email" required>
                    <button class="btn btn-primary" type="button" id="submit_form">Submit</button>
                </div>
            </div>
        </div>
        
 <script type="text/javascript">
$(document).ready(function () {
	
	if(document.URL.split('?')[1]=='loginFailed'){
		$('#error').show();
	}
	
});

</script>