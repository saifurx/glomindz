<div class="container">
	<h2>Forget Password</h2>
	<div class="row">
		<div class="span6">
			<div class="alert fade in span6">
				<button class="close" data-dismiss="alert">&times;</button>
				<div id="msg"></div>
			</div>
			<hr>
			<form action="<?php echo URL;?>login/changePassword" method="post">

				Email <input type="email" name="email" required /><br /> <input
					type="submit" class="btn btn-success" value="Submit"
					onclick="return changePassword(this.form);">
			</form>
		</div>

	</div>
</div>
<script type="text/javascript">
function changePassword(form) {
	document.getElementById('msg').innerHTML = ""
	  var formData = new FormData(form);
	  var xhr = new XMLHttpRequest();
	  xhr.open('POST', form.action, true);
	  xhr.onload = function(e) {
		  if (this.status == 200) {
		      console.log('Server got:', this.response);
		      $('#msg').append('<div>'+this.response+'</div>');
		    };
	 };
	  xhr.send(formData);
	  return false; // Prevent page from submitting.
}
</script>
