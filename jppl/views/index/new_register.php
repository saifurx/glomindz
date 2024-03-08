<div class="container">
	<div class="row-fluid inline" id="sign_up_as">
			<strong class="pull-left" style="margin-top: 10px;">Sign up as <i class="icon-forward"></i></strong>
			<div class="btn-group span8">
				<button class="btn span2" id="btn_administrative">Administrative</button>
				<button class="btn span2" id="btn_police">Police</button>
				<button class="btn span2 btn-danger" id="btn_hotel">Hotel</button>
				<button class="btn span2" id="btn_citizen">Citizen</button>
			</div>
	</div>
	<hr>
	<div class="row-fluid" id="form_submit_result"></div>
	<div class="row-fluid" id="div_administrative">
		<div class="well span8">
			<form id="administrative_register_form" action="#" method="POST">
				<div class="row-fluid">
					<div class="span6">
							<label><strong>Name</strong></label> 
							<input type="text" name="name"  class="input-xlarge" required> 
							<label><strong>Email</strong> </label> 
							<input type="text" id="email_administrative" name="email" class="input-xlarge" required="required"> 
							<span id="checking_email_administrative" style="color: #03099a;">Checking...</span>
							<div id="email_error_administrative" style="color: #992a1e;">
								Email already register...<em>Try different email.</em>
							</div>
							<label><strong>Mobile No.</strong></label> 
							<input type="text" id="mobile_administrative" name="mobile" class="input-xlarge" required>
							<span id="checking_mobile_administrative" style="color: #03099a;">Checking...</span>
							<div id="mobile_error_administrative" style="color: #992a1e;">
								Mobile already register...<em>Try different mobile</em>. 
							</div>
					</div>

					<div class="span6">
							<label><strong>Designation</strong> </label> 
							<input type="text" name="designation" class="input-xlarge" required> 
							<label><strong>Current Posting</strong></label> 
							<input type="text" name="current_posting" class="input-xlarge" required>
							<label></label>
							<input type="button" class="btn btn-medium btn-danger" id="submit_admin_form_btn" value="Sign up as Administrative">  
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="row-fluid" id="div_police">
		<div class="well span8" >
			<form id="police_register_form" action="#" method="POST">
				<div class="row-fluid">
					<div class="span6">
						<label><strong>Name</strong> </label> 
						<input type="text" name="name" class="input-xlarge" required> 
						<label><strong>Email</strong> </label> 
						<input type="text" name="email" id="email_police" class="input-xlarge"> 
						<span id="checking_email_police" style="color: #03099a;">Checking...</span>
						<div id="email_error_police" style="color: #992a1e;">
							Email already register...<em>Try different email</em> 
						</div>							
						<label><strong>Mobile	No.</strong> </label> 
						<input type="text" name="mobile" id="mobile_police" class="input-xlarge" required>
						<span id="checking_mobile_police" style="color: #03099a;">Checking...</span>
						<div id="mobile_error_police" style="color: #992a1e;">
							Email already register...<em>Try different email</em> 
						</div>
					</div>
					<div class="span6">
						<label><strong>Designation</strong> </label> 
						<input type="text"	name="designation" class="input-xlarge" required> 
						<label><strong>Current Posting</strong> </label> 
						<input type="text" name="city_id" class="input-xlarge" required> 
						<label><strong>Police Station</strong></label> 
						<select class="ps_id" name="ps_id"></select>
						<label></label>
						<a class="btn btn-medium btn-danger" id="submit_police_form_btn">Sign up as Police</a>
					</div>
				</div>
			</form>
		</div>
	</div>
	
	<div class="row-fluid" id="div_hotel">
				<div class="well span8">
				<form id="hotel_register_form" action="#" method="POST">
					<div class="row-fluid">
						<div class="span6">
							<label><strong>Hotel Name</strong> </label> 
							<input type="text" name="hotel_name" class="input-xlarge" required>
							<label><strong>Contact Person Name</strong></label>
							<input type="text" name="contact_person" class="input-xlarge" required> 
							<label><strong>Email</strong></label> 
							<input type="email" name="email" id="email_hotel" class="input-xlarge" required> 
							<span id="checking_email_hotel" style="color: #03099a;">Checking...</span>
							<div id="email_error_hotel" style="color: #992a1e;">
								Email already register...<em>Try different email</em>
							</div>
							<label><strong>Mobile No.</strong> </label> 
							<input type="text"	name="mobile_no" id="mobile_hotel" class="input-xlarge" required> 
							<span id="checking_mobile_hotel" style="color: #03099a;">Checking...</span>
							<div id="mobile_error_hotel" style="color: #992a1e;">
								Mobile already register...<em>Try different mobile</em> 
							</div>
							<label><strong>License No.</strong> 
							</label> <input type="text" name="license_no" class="input-xlarge" required>
							<label><strong>No. of Rooms</strong> </label> 
							<input type="number" min=0 name="no_of_rooms" class="input-xlarge" required>
						</div>

						<div class="span6">
						 	<label><strong>Address</strong></label> 
						 	<input type="text" name="address" class="input-xlarge" required> 
							<label><strong>Locality</strong></label> 
							<input type="text"	name="locality" class="input-xlarge" required>
							<label><strong>Police Station</strong></label> 
							<select class="ps_id" name="ps_id"></select> 
							<label><strong>City</strong></label> 
							<input type="text" name="city" class="input-xlarge"	required value="Guwahati"> 
							<label><strong>PIN</strong> </label> 
							<input type="text" name="pin" class="input-xlarge" required>
							<button type="button" class="btn btn-medium btn-danger"	id="submit_hotel_form_btn">Sign up as Hotel</button>
						</div>
					</div>
				</form>
			</div>
	</div>
	
	<div class="row-fluid" id="div_citizen">
				<div class="well span8">
				<form id="citizen_register_form" action="#" method="POST">
					<div class="row-fluid">
						<h4>We are still working on citizen engagement strategy</h4>
						<p>Please submit your email to stay updated on new features on Crimatrix.</p>
						<label>Email</label>  
						<input type="text" name="email" id="email_citizen" size="20"/>
						<span id="checking_email_citizen" style="color: #03099a;">Checking...</span>
						<div id="email_error_citizen" style="color: #992a1e;">
							Email already register...<em>Try different email</em> or contact support. 
						</div>
						<p>Please submit your mobile no. if you are interested in community policing initiatives by Guwahati Police.</p>
						<label>Mobile</label>
						<input type="tel" name="mobile" id="mobile_citizen" size="20" />
						<label></label>
						<span id="checking_mobile_citizen" style="color: #03099a;">Checking...</span>
						<div id="mobile_error_citizen" style="color: #992a1e;">
								Email already register...<em>Try different email</em> or contact support. 
						</div>
					</div>
					<button type="button" class="btn btn-medium btn-danger" id="submit_citizen_form_btn">Sign	Up As Citizen</button>
				</form>
			</div>
		</div>
</div>	


<script type="text/javascript">
var alreadyregister_email=0;
var alreadyregister_mobile=0;

$(document).ready(function () {
	get_all_ps();
});

function get_all_ps(){
	$.ajax({
		url: '<?php echo URL;?>user_service/get_all_ps/',
		type: 'POST',
		dataType: 'JSON',
		success: function(data){
			$('#ps_id').empty();
			for(var i in data){
				  $('.ps_id').append($('<option value="'+data[i].id+'">'+data[i].name+'</option>'));
			}
		}		
	});
}

$('#email_administrative').change(function () {
	$('#checking_email_administrative').hide();
	$('#email_error_administrative').hide();
	$('#submit_admin_form_btn').attr('disabled', true);
	alreadyregister_email = 0;
	var email= $('#email_administrative').val();
	var role='administrative';
	$.ajax({
		  type: 'POST',
		  url: '<?php echo URL;?>user_service/check_email/',
		  data: {email:email,role:role},
		  dataType:'json',
		  beforeSend: function() {
			  $('#checking_email_administrative').show();
		  },
		  success: function(data){
			  $('#checking_email_administrative').hide();
			  $('#submit_admin_form_btn').attr('disabled', false);
			  if(data[0].id > 0){
						  $('#email_error_administrative').show();
						  $('#submit_admin_form_btn').attr('disabled', true);
						  alreadyregister_email = 1;
						  
			  }
		  }
	});
});

$('#mobile_administrative').change(function () {
	$('#checking_mobile_administrative').hide();
	$('#mobile_error_administrative').hide();
	$('#submit_admin_form_btn').attr('disabled', true);
	alreadyregister_mobile = 0;
	var mobile= $('#mobile_administrative').val();
	var role='administrative';
		$.ajax({
			  type: 'POST',
			  url: '<?php echo URL;?>user_service/check_mobile/',
			  data: {mobile:mobile,role:role},
			  dataType:'json',
			  beforeSend: function() {
				  $('#checking_mobile_administrative').show();
			  },
			  success: function(data){
				  $('#checking_mobile_administrative').hide();
				  $('#submit_admin_form_btn').attr('disabled', false);
					  if(data[0].id > 0){
							  $('#mobile_error_administrative').show();
							  $('#submit_admin_form_btn').attr('disabled', true);
							  alreadyregister_mobile = 1;
					  }
					
			  }
		});
});

$('#email_police').change(function () {
    $('#checking_email_police').hide();
    $('#email_error_police').hide();
    $('#submit_police_form_btn').attr('disabled', true);
    alreadyregister_email = 0;
	var email= $('#email_police').val();
	var role='police';
	$.ajax({
		  type: 'POST',
		  url: '<?php echo URL;?>user_service/check_email/',
		  data: {email:email,role:role},
		  dataType:'json',
		  beforeSend: function() {
			  $('#checking_email_police').show();
		  },
		  success: function(data){
			  $('#checking_email_police').hide();
			  $('#submit_police_form_btn').attr('disabled', false);
			  if(data[0].id > 0){
					  $('#email_error_police').show();
					  $('#submit_police_form_btn').attr('disabled', true);
					  alreadyregister_email = 1;
					  
			  }
		  }
	});
});

$('#mobile_police').change(function () {
		$('#checking_mobile_police').hide();
	    $('#mobile_error_police').hide();
	    $('#submit_police_form_btn').attr('disabled', true);
	    alreadyregister_mobile = 0;
		var mobile= $('#mobile_police').val();
		var role='police';
		$.ajax({
			  type: 'POST',
			  url: '<?php echo URL;?>user_service/check_mobile/',
			  data: {mobile:mobile,role:role},
			  dataType:'json',
			  beforeSend: function() {
				  $('#checking_mobile_police').show();
			  },
			  success: function(data){
				  $('#checking_mobile_police').hide();
				  $('#submit_police_form_btn').attr('disabled', false);
				  if(data[0].id > 0){
						  $('#mobile_error_police').show();
						  $('#submit_police_form_btn').attr('disabled', true);
						  alreadyregister_mobile = 1;
				  }
			  }
		});
});

$('#email_hotel').change(function () {
    $('#checking_email_hotel').hide();
    $('#email_error_hotel').hide();
    $('#submit_hotel_form_btn').attr('disabled', true);
    alreadyregister_email = 0;
	var email= $('#email_hotel').val();
	var role='hotel';
	$.ajax({
		  type: 'POST',
		  url: '<?php echo URL;?>user_service/check_email/',
		  data: {email:email,role:role},
		  dataType:'json',
		  beforeSend: function() {
			  $('#checking_email_hotel').show();
		  },
		  success: function(data){
			  $('#checking_email_hotel').hide();
			  $('#submit_hotel_form_btn').attr('disabled', false);
			  if(data[0].id > 0){
					  $('#email_error_hotel').show();
					  $('#submit_hotel_form_btn').attr('disabled', true);
					  alreadyregister_email = 1;
			  }
		  }
	});
});

$('#mobile_hotel').change(function () {
		$('#checking_mobile_hotel').hide();
	    $('#mobile_error_hotel').hide();
	    $('#submit_hotel_form_btn').attr('disabled', true);
	    alreadyregister_mobile = 0;
		var mobile= $('#mobile_hotel').val();
		var role='hotel';
		$.ajax({
			  type: 'POST',
			  url: '<?php echo URL;?>user_service/check_mobile/',
			  data: {mobile:mobile,role:role},
			  dataType:'json',
			  beforeSend: function() {
				  $('#checking_mobile_hotel').show();
			  },
			  success: function(data){
				  $('#checking_mobile_hotel').hide();
				  $('#submit_hotel_form_btn').attr('disabled', false);
				  if(data[0].id > 0){
						  $('#mobile_error_hotel').show();
						  $('#submit_hotel_form_btn').attr('disabled', true);
						  alreadyregister_mobile = 1;
				  }
			  }
		});
});

$('#email_citizen').change(function () {
    $('#checking_email_citizen').hide();
    $('#email_error_citizen').hide();
    $('#submit_citizen_form_btn').attr('disabled', true);
    alreadyregister_email = 0;
	var email= $('#email_citizen').val();
	var role='citizen';
	$.ajax({
		  type: 'POST',
		  url: '<?php echo URL;?>user_service/check_email/',
		  data: {email:email,role:role},
		  dataType:'json',
		  beforeSend: function() {
			  $('#checking_email_citizen').show();
		  },
		  success: function(data){
			  $('#checking_email_citizen').hide();
			  $('#submit_citizen_form_btn').attr('disabled', false);
			  if(data[0].id > 0){
					  $('#email_error_citizen').show();
					  $('#submit_citizen_form_btn').attr('disabled', true);
					  alreadyregister_email = 1;
			  }
		  }
	});
});

$('#mobile_citizen').change(function () {
		$('#checking_mobile_citizen').hide();
	    $('#mobile_error_citizen').hide();
	    $('#submit_citizen_form_btn').attr('disabled', true);
	    alreadyregister_mobile = 0;
		var mobile= $('#mobile_citizen').val();
		var role='citizen';
		$.ajax({
			  type: 'POST',
			  url: '<?php echo URL;?>user_service/check_mobile/',
			  data: {mobile:mobile,role:role},
			  dataType:'json',
			  beforeSend: function() {
				  $('#checking_mobile_citizen').show();
			  },
			  success: function(data){
				  $('#checking_mobile_citizen').hide();
				  $('#submit_citizen_form_btn').attr('disabled', false);
				  if(data[0].id > 0){
						  $('#mobile_error_citizen').show();
						  $('#submit_citizen_form_btn').attr('disabled', true);
						  alreadyregister_mobile = 1;
				  }
			  }
		});
});

$('#submit_admin_form_btn').click(function () {
	var formData = $('form#administrative_register_form').serialize();
	var email = $('#email_administrative').val();
	var mobile = $('#mobile_administrative').val();
	
	if(alreadyregister_email==1){
		$('#email_error_administrative').show();
		$('#submit_admin_form_btn').attr('disabled', true);
	}
	else if(alreadyregister_mobile==1){
		$('#mobile_error_administrative').show();
		$('#submit_admin_form_btn').attr('disabled', true);
	}
	else if(email=='' || email==null){
		$('#submit_admin_form_btn').attr('disabled', true);
	}
	else if(mobile=='' || mobile==null){
		$('#submit_admin_form_btn').attr('disabled', true);
	}
	else{
		$.ajax({
			  type: 'POST',
			  url: '<?php echo URL;?>user_service/save_administrative_user/',
			  data: formData,
			  success: function(resp){
				  	$("#div_administrative").hide();
				  	$("#sign_up_as").hide();
				  	if(resp > 0){
						$('#form_submit_result').show().html('<div class="alert alert-success"><h3>Thank you for signing up with us.</h3><em>We will activate your account after verification.</em></div>');
						setTimeout(function() {
							window.location= '<?php echo URL;?>';
						}, 5000);
						
				  	}else{
				  		$('#form_submit_result').show().html('<h3 class="alert alert-error">Please try later.Currently we are not able to register.</h3>');
					}
					
				}
			});
	}
});

$('#submit_police_form_btn').click(function () {
	var formData = $('form#police_register_form').serialize();
	var email = $('#email_police').val();
	var mobile = $('#mobile_police').val();
	if(alreadyregister_email==1){
		$('#email_error_police').show();
		$('#submit_police_form_btn').attr('disabled', true);
	}
	else if(alreadyregister_mobile==1){
		$('#mobile_error_police').show();
		$('#submit_police_form_btn').attr('disabled', true);
	}
	else if(email=='' || email==null){
		$('#submit_police_form_btn').attr('disabled', true);
	}
	else if(mobile=='' || mobile==null){
		$('#submit_police_form_btn').attr('disabled', true);
	}
	else{
		$.ajax({
			  type: 'POST',
			  url: '<?php echo URL;?>user_service/save_police_user/',
			  data: formData,
			  success: function(resp){
				  $("#div_police").hide();
				  $("#sign_up_as").hide();
				  if(resp > 0){
						$('#form_submit_result').show().html('<div class="alert alert-success"><h3>Thank you for signing up with us.</h3><em>We will activate your account after verification.</em></div>');
						setTimeout(function() {
							window.location= '<?php echo URL;?>';
						}, 4000);
						
				  	}else{
				  		$('#form_submit_result').show().html('<h3 class="alert alert-error">Please try later.Currently we are not able to register.</h3>');
					}
				}
			});
	}
});

$('#submit_hotel_form_btn').click(function () {
		var formData = $('form#hotel_register_form').serialize();
		var email = $('#email_hotel').val();
		var mobile = $('#mobile_hotel').val();
		if(alreadyregister_email==1){
			$('#email_error_hotel').show();
			$('#submit_hotel_form_btn').attr('disabled', true);
		}
		else if(alreadyregister_mobile==1){
			$('#mobile_error_hotel').show();
			$('#submit_hotel_form_btn').attr('disabled', true);
		}
		else if(email=='' || email==null){
			$('#submit_hotel_form_btn').attr('disabled', true);
		}
		else if(mobile=='' || mobile==null){
			$('#submit_hotel_form_btn').attr('disabled', true);
		}
		else{
			$.ajax({
				  type: 'POST',
				  url: '<?php echo URL;?>user_service/save_hotel_user/',
				  data: formData,
				  success: function(resp){
					  $("#div_hotel").hide();
					  $("#sign_up_as").hide();
					  if(resp > 0){
							$('#form_submit_result').show().html('<div class="alert alert-success"><h3>Thank you for signing up with us.</h3></div>');
							setTimeout(function() {
								window.location= '<?php echo URL;?>';
							}, 4000);
							
					  	}else{
					  		$('#form_submit_result').show().html('<h3 class="alert alert-error">Please try later.Currently we are not able to register.</h3>');
						}
					}
				});
		}
});



 $('#submit_citizen_form_btn').click(function () {
		var formData = $('form#citizen_register_form').serialize();
		var email = $('#email_citizen').val();
		var mobile = $('#mobile_citizen').val();
		if(alreadyregister_email==1){
			$('#email_error_citizen').show();
			$('#submit_citizen_form_btn').attr('disabled', true);
		}
		else if(alreadyregister_mobile==1){
			$('#mobile_error_citizen').show();
			$('#submit_citizen_form_btn').attr('disabled', true);
		}
		else if(email=='' || email==null){
			$('#submit_citizen_form_btn').attr('disabled', true);
		}
		else if(mobile=='' || mobile==null){
			$('#submit_citizen_form_btn').attr('disabled', true);
		}
		else{
			$.ajax({
				  type: 'POST',
				  url: '<?php echo URL;?>user_service/save_citizen_contact/',
				  data: formData,
				  success: function(resp){
					  $("#div_citizen").hide();
					  $("#sign_up_as").hide();
					  if(resp > 0){
							$('#form_submit_result').show().html('<div class="alert alert-success"><h3>Thank you for signing up with us.</h3><em>We will activate your account after verification.</em></div>');
							setTimeout(function() {
								window.location= '<?php echo URL;?>';
							}, 4000);
							
					  	}else{
					  		$('#form_submit_result').show().html('<h3 class="alert alert-error">Please try later.Currently we are not able to register.</h3>');
						}
					}
			});
		}
});
	 
	

 function hide_all(){
		$("#reg_success").hide();
		$("#reg_error").hide();
		$("#checking_email").hide();
		$("#email_error").hide();
		$("#form_police").hide();
		$("#form_citizen").hide();
		$("#reg_success_citizen").hide();
		
}

 $("#btn_administrative").click(function() {
	 	$('#btn_administrative').addClass('btn btn-danger');
	 	$('#btn_police').removeClass('btn btn-danger').addClass('btn');
	 	$('#btn_hotel').removeClass('btn btn-danger').addClass('btn');
	 	$('#btn_citizen').removeClass('btn btn-danger').addClass('btn');
	 	
	  	$("#div_police").hide();
	  	$("#div_hotel").hide();
		$("#div_citizen").hide();
		$("#div_administrative").show();
});

$("#btn_police").click(function(){
		$('#btn_police').addClass('btn btn-danger');
		$('#btn_administrative').removeClass('btn btn-danger').addClass('btn');
	 	$('#btn_hotel').removeClass('btn btn-danger').addClass('btn');
	 	$('#btn_citizen').removeClass('btn btn-danger').addClass('btn');
	 	
	  	$("#div_administrative").hide();
	  	$("#div_hotel").hide();
		$("#div_citizen").hide();
		$("#div_police").show();
});

$("#btn_hotel").click(function() {
		$('#btn_hotel').addClass('btn btn-danger');
		$('#btn_administrative').removeClass('btn btn-danger').addClass('btn');
	 	$('#btn_police').removeClass('btn btn-danger').addClass('btn');
	 	$('#btn_citizen').removeClass('btn btn-danger').addClass('btn');
	 	
	  	$("#div_administrative").hide();
		$("#div_citizen").hide();
		$("#div_police").hide();
		$("#div_hotel").show();
});

$("#btn_citizen").click(function() {
		$('#btn_citizen').addClass('btn btn-danger');
		$('#btn_hotel').removeClass('btn btn-danger').addClass('btn');
		$('#btn_administrative').removeClass('btn btn-danger').addClass('btn');
	 	$('#btn_police').removeClass('btn btn-danger').addClass('btn');
	 	
	  	$("#div_administrative").hide();
		$("#div_police").hide();
		$("#div_hotel").hide();
		$("#div_citizen").show();
});


</script>
</body>
</html>
