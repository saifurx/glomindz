<div class="container">
	<h2>Register here for update data</h2>
	<div class="row">
		<div class="span6">
			<form action="<?php echo URL;?>login/saveUser" method="post">
				<label>Name</label><input type="text" name="name" required
					pattern="[A-Za-z]" /><br /> <label>Email</label><input type="email"
					name="email" required /><br /> <label>Password</label><input
					type="password" name="password" required /><br /> <label>District</label>
					
						<select name="dist_id" id="dist_id">
							<?php
							foreach($this->districtList as $key => $value) {?>
							<option value="<?php echo $value['id']; ?>">
								<?php echo $value['name']; ?>
							</option>
							<?php }?>
						</select>
					 <label>Mobile</label><input
					type="text" name="mobile" /><br /><input type="submit"
					class="btn btn-success" value="Register"
					onclick="return saveUser(this.form);">
			</form>
		</div>
		<div class="alert fade in span4">
			<button class="close" data-dismiss="alert">&times;</button>
			<div id="msg"></div>
		</div>
	</div>
</div>
<script type="text/javascript">
function saveUser(form) {
	document.getElementById('msg').innerHTML = ""
	  var formData = new FormData(form);
	  var xhr = new XMLHttpRequest();
	  xhr.open('POST', form.action, true);
	  xhr.onload = function(e) {
		  if (this.status == 200) {
		      var resp = JSON.parse(this.response);
		      console.log('Server got:', resp);
		      
		      if(resp.id==0){
			      $('#msg').append('<div>Your email already registerd with us!<a href="' + '<?php echo URL;?>login/forget'+ '">Forget Password</a></div>');
		      }else{
		  	      $('#msg').append('<div><h5>Hi <b>' + resp.name + '</b> We will confirm your registration by mail.Thank you</h5></div>');
		      }
		    };
	 };
	  xhr.send(formData);
	  return false; // Prevent page from submitting.
}

</script>
