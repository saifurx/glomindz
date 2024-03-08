<div class="container">
<?php
$error=Session::get('error');
if (isset($error)){
	echo '<span class="label label-important">';
	echo $error;
	echo '</span>';
}
?>
	<form action="<?php echo URL;?>login/run" method="post">
		<label>Login</label><input type="email" name="email" required="required" /><br />
		<label>Password</label><input type="password" name="password" required /><br />
		<input type="submit" class="btn btn-info" value="Login">
	</form>

<hr>
<a href="<?php echo URL;?>login/register">Register Here</a><br/>
<a href="<?php echo URL;?>login/forget">Forget Password</a>
</div>