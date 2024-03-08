<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Crimatrix is a community powered real-time crime monitoring platform for the police department to harness the power of crowd to monitor and prevent crimes in the city.">
    <meta name="author" content="">
    <title>Crimatrix: A real-time crime monitoring platform</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo URL;?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URL;?>assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo URL; ?>assets/jquery/css/jquery-ui.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    
	<link href="<?php echo URL;?>assets/apps/css/app.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo URL;?>assets/apps/js/html5shiv.js"></script>
      <script src="<?php echo URL;?>assets/apps/js/respond.min.js"></script>
    <![endif]-->
    
    <script type="text/javascript" src="<?php echo URL;?>assets/jquery/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo URL;?>assets/jquery/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo URL;?>assets/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo URL;?>assets/bootstrap/js/typeahead.min.js"></script>
    <script type="text/javascript" src="<?php echo URL;?>assets/apps/js/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="<?php echo URL;?>assets/apps/js/app.js"></script>
    
    <style type="text/css">
    .errorText {
    	color: #E8F398;
    }
    </style>
  </head>
  <body>
   <?php Session::init(); ?>
    <?php if (Session::get('loggedIn') == true): ?>
      <div class="navbar navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
          <a class="navbar-brand" title="Crimatrix: A real-time crime monitoring platform" href="#section1"><img alt="Crimatrix" src="<?php echo URL; ?>assets/apps/img/crimatrix_logo32x32.png"></a>
        </div>
        <div class="collapse navbar-collapse">
          <!-- left -->
          
          <?php if (Session::get('user_type') == 'hotel' && Session::get('status') == 1): ?>
          	<ul class="nav navbar-nav">
            	<li id="dashboard_hotel_li"><a href="<?php echo URL;?>hotel">DASHBOARD</a></li>
            </ul>
          <?php endif; ?><!-- End -->
          
          <?php if (Session::get('user_type') == 'police' && Session::get('status') == 1): ?>
          	<ul class="nav navbar-nav">
	            <li id="dashboard_police_li"><a href="<?php echo URL;?>police">DASHBOARD</a></li>
	            <li id="hotels_n_lodges_li"><a href="<?php echo URL; ?>police/hotels_n_lodges">HOTELS &amp; LODGES</a></li>
				<li id="arrests_li"><a href="<?php echo URL; ?>police/arrests">ARRESTS</a></li>
	           <!--  <li id="watchlist_li"><a href="<?php echo URL; ?>police/watch_list">WATCHLIST</a></li> -->
            </ul>
          <?php endif; ?><!-- End -->
          
          <!-- right -->
          
          <?php if (Session::get('user_type') == 'hotel'): ?>
	        <ul class="nav navbar-nav navbar-right">
	        	<li id="hotelProfile_li"><a title="Profile" href="<?php echo URL; ?>hotel/profile"><?php echo strtoupper(Session::get("name")); ?></a></li>
	            <li><a title="Logout" href="<?php echo URL; ?>user_service/logout">SIGN OUT</a></li>
	        </ul>
          <?php endif; ?><!-- End -->
          
          <?php if (Session::get('user_type') == 'police' && Session::get('status') == 1): ?>
          	<ul class="nav navbar-nav navbar-right">
          		<?php if (Session::get('role') == 'admin'): ?>
          		<li id="setting_li" class="dropdown">
			      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cogs fa-fw"></i> SETTING <b class="caret"></b></a>
			      <ul class="dropdown-menu">
			        <li><a href="<?php echo URL; ?>police/police_users">POLICE USER</a></li>
			        <li><a href="<?php echo URL; ?>police/police_sms_users">SMS USER</a></li>
			        <li><a href="<?php echo URL; ?>police/hotels_users">HOTEL USER</a></li>
			      </ul>
			    </li>
			    <?php endif; ?><!-- End -->
	        	<li class="policeProfile_li"><a title="Profile" href="<?php echo URL; ?>police/profile"><?php echo strtoupper(Session::get("name")); ?></a></li>
	            <li><a title="Logout" href="<?php echo URL; ?>user_service/logout"><span class="glyphicon glyphicon-off"></span> SIGN OUT</a></li>
	        </ul>
          <?php endif; ?><!-- End -->
          
          <?php if (Session::get('user_type') == 'police' && Session::get('status') == 0): ?>
          	<ul class="nav navbar-nav navbar-right">
          		<li class="policeProfile_li"><a title="Profile" href="<?php echo URL; ?>police/profile"><?php echo strtoupper(Session::get("name")); ?></a></li>
	            <li><a title="Logout" href="<?php echo URL; ?>user_service/logout"><span class="glyphicon glyphicon-off"></span> SIGN OUT</a></li>
          	</ul>
          <?php endif; ?><!-- End -->
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <?php endif; ?><!-- End -->
    
    <?php if (Session::get('loggedIn') == false): ?>
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container" id="navContainer">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
          <a id="navbar-brand" class="navbar-brand" title="Crimatrix: A real-time crime monitoring platform" href="#"><img alt="Crimatrix" src="<?php echo URL; ?>assets/apps/img/logo_name48px.png"></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav" id="home_nav">
            <li id="citizen_li"><a href="#">FOR CITIZEN</a></li>
            <li id="hotel_li"><a href="#">FOR HOTEL</a></li>
            <!-- <li id="police_li"><a href="#">FOR POLICE</a></li>-->
            <li id="about_li"><a href="#about">ABOUT</a></li>
            <li id="contact_li"><a href="#contact">CONTACT</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown active" id="sign_in_dropdown_li">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-power-off"></i> SIGN IN <i class="fa fa-angle-double-down"></i></a>
              <div class="dropdown-menu well" id="sign_in_div">
                <form  method="POST" action="<?php echo URL; ?>user_service/login/" accept-charset="UTF-8">
				  <div class="form-group">
				   <label style="font-weight: normal;">Email or Mobile</label>
				    <input type="text" class="form-control" id="" name="username" placeholder="Enter or Mobile">
				  </div>
				  <div class="form-group">
				    <label style="font-weight: normal;">Password</label>
				    <input type="password" class="form-control" id="" name="password" placeholder="Password">
                    <input class="span3" type="hidden" name="ip_address" value="127.0.0.1">
                    <input class="span3" type="hidden" name="location" value="GUWAHATI">
				  </div>
				  <div class="form-group">
				  	<input type="text" class="form-control" id="login_fail" disabled="disabled" value="Username or Password are incorrect.">
				  </div>
				  <div class="form-group">
				  	<button class="btn btn-danger" type="submit">Sign In</button>
				  	<a href="#forgetPasswordModal" role="button" data-toggle="modal" class="pull-right" style="margin-top: 6px;"><small>Forgot Password ?</small></a>
				  </div>
				</form>
              </div>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <?php endif; ?>
    
    
    <!-- Modal -->
	<div class="modal fade" id="forgetPasswordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header cm-modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h3 class="modal-title" id="myModalLabel">Recover Password</h3>
	      </div>
	      <div class="modal-body">
	       	<div class="form-group">
				<label class="control-label">Enter Your Registered Email</label>
				<input type="text" class="form-control" id="registered_email" placeholder="e.g. my@email.com">
			</div>
			<div class="form-group">
				<h5 id="validate_registered_email"></h5>
			</div>
	      </div>
	      <div class="modal-footer cm-modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	        <button type="button" class="btn btn-primary" id="recoverPassword_btn" onclick="recoverPassword();">Submit</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
<script type="text/javascript">
	$(document).ready(function() {
		
	    var current_url = "<?php echo URL; ?>";
	    var url = current_url + '?loginFailed';
	    if (document.URL == url) {
	        $('li#sign_in_dropdown_li').addClass('dropdown active open');
	        $('#login_fail').show();
	        setTimeout(function() {
	            $("#login_fail").slideUp(500);
	        }, 2500);
	    }
	});

	function recoverPassword(){
		var email = $('#registered_email').val();
		var validate_email = emailValidate(email);
		if(validate_email == true){
			$('#recoverPassword_btn').attr('disabled',true).html('&nbsp;&nbsp;<i class="fa fa-cog fa-spin"></i>&nbsp;&nbsp;');
			$.ajax({
				type: 'POST',
				url: '<?php echo URL;?>user_service/recover_password/',
				dataType: 'JSON',
				data: {email:email},
				success: function(resp){
					$('#validate_registered_email').removeClass('errorText').addClass('successText').text('Password has been reset and send to your email');
					$('#recoverPassword_btn').attr('disabled',false).html('Submit');
					$('#registered_email').val('');
					setTimeout(function(){
						$('#forgetPasswordModal').modal('hide');
						$('#forgetPasswordModal').on('hidden.bs.modal', function(){
							$('#validate_registered_email').removeClass('successText').addClass('errorText').text('');
						})
					},2000);
					
				}
			});
		}
		else{
			$('#validate_registered_email').removeClass('successText').addClass('errorText').html('<i class="fa fa-exclamation-triangle"></i> Please Enter a valid email');
			$('#registered_email').focus().val('');
		}
	}
</script>