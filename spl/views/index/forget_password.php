<div class="container-fluid">
	<div class="span4"></div>
	<div class="span4 well" id="forget_password">
		<h4>Forget Password</h4>
		<form class="form" action="<?php echo URL;?>login/recover_password"
			method="post" id="recover_password">
			<br> <br> <input type="email" name="email" placeholder="Email"
				required /><br>
			<button class="btn btn-success pull-right" id="submit_form">Reset</button>

		</form>
	</div>
	<div class="span4"></div>
	<div class="alert alert-info" id="response_forget"
		style="display: none;"></div>
</div>
<script type="text/javascript">
<!--

//-->

$('#submit_form').click(function (e) {
	e.preventDefault();
	var formData = $('form#recover_password').serialize();
	$.ajax({
		  type: 'POST',
		  url: '<?php echo URL;?>login/recover_password',
		  data: formData,
		  success: function(resp){
			 
			  	$('#forget_password').hide();
			  	
			  	$('#response_forget').empty().append(resp);	
			  	$('#response_forget').show();	  	
			  	setTimeout(function() {
			  		$('#response_forget').hide();
				    window.location.href='<?php echo URL;?>';
				}, 2500);
			}
		});
	return false;
});
</script>
