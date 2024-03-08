<div class="container-fluid">
	<div class="row-fluid">		  
		  <form class="form-signin" method="POST" action="<?php echo URL;?>login/run" accept-charset="UTF-8">
	        <h4 class="alert alert-info form-signin-heading">Sign In</h4>
	        <hr>
	        <input type="email" class="span12 input-medium" id="username" placeholder="Email" name="email" required="required">
	        <input type="password" class="span12 input-medium" id="password" placeholder="Password" name="password" required="required">
	        <input type="text" class="span12 input-medium" id="login_fail" disabled="disabled" value="Something Went Wrong">
	        <input type="submit" class="span12 input-medium btn btn-primary" id="login_btn" value="Sign in">
	        <hr>
	        <a href="<?php echo URL;?>login/forget_password">Forget Password</a>
	      </form>
	</div>
</div>
<script type="text/javascript">
<!--

//-->
$(document).ready(function () {
	var current_url="<?php echo URL;?>";
	url= current_url+'?loginFailed';
	if(document.URL == url){
		$('#login_fail').show();
		setTimeout(function(){
		    $("#login_fail").slideUp(500);
		}, 2500);
	}
});
</script>
