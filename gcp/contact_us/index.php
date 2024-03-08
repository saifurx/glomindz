<?php include "../header.php"; ?>

<div class="">
	<div class="subNav">
		<span class="subNavtext">CONTACT FORM</span>&nbsp;&nbsp;
		<div class=" pull-right img_pills">
			<button type="button" class="btnPill" onclick="window.location.href='<?php echo URL;?>contact_us/contact_nos.php'" style=" width: 200px; ">CONTACT NUMBERS</button>
		</div>	
	</div><br>
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-6">
					<div id="result"></div>
					<form role="form" method="post" action="" id="contactForm">
						  <div class="form-group">
						    <label>Name</label>
						    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
						  </div>
						  <div class="form-group">
						    <label>Email address</label>
						    <input type="email" class="form-control emailValidate" id="email" name="email" placeholder="Enter email" required>
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Mobile Number</label>
						    <input type="tel" class="form-control mobileValidate" id="mobile" name="mobile" maxlength="10" placeholder="Mobile Number" required>
						  </div>
						  <div class="form-group">
						    <label>Your Message</label>
						    <textarea class="form-control" rows="3" id="message" name="message"></textarea> 
						  </div>
						  <div class="form-group">
							<small>Note: This message will not consider as FIR.</small>
						  </div>
						  <button type="button" class="btn btn-primary" onclick="send_contact();">Submit</button>
					</form>
				</div>
				<div class="col-md-6">
					<div class="pull-right">
					<h4>ASSAM POLICE HQ</h4>
					<p>B K Kakati Rd, Ulubari<br>Guwahati, ASSAM</p>
					<p>DGP's Control- 0361-2521242, 0361-2460061</p>
					<br>
					<h4>SSP OFFICE </h4>
					<P>Ananda Ram Baruah Road<br>Pan Bazaar, Guwahati, Assam,</P>
					<p>City Police Control 0361-2464557</p>
					<p>Email: ssp-guwahati@assampolice.gov.in</p>
					<br>
					<h4>CRIME BRANCH</h4>
					<P>Crime Unit, 2nd floor<br> Assam Police Central Hospital<br> Panbazar, Guwahati</P>
					<p>Email: crimebranch.ghycity@assampolice.gov.in</p>
					</div>
				</div>
			</div>
		</div>
		<br><br>
		
		<div class="row">
			<div class="col-md-12">
				<h3>RTI Related</h3>
			</div>
			<hr>
			<div class="col-md-6">
				<strong>Public Information Officer (PIO):</strong><br>
				Sr. Superintendent of Police, City, Guwahati<br>
				Office of the Sr. Supdt. of Police<br>
				Kacharighat, Panbazar<br>
				Guwhati- 781001<br>
			</div>
			<div class="col-md-6">
				<strong>State Public Information Officer (SPIO):</strong><br> 
				Addl. Supdt. of Police, (HQ), City, Guwahati<br>
				Office of the Sr. Supdt. of Police<br>
				Kacharighat, Panbazar<br>
				Guwhati- 781001<br>
			</div>
		</div>
	</div>
</div>
<br><br>
<script type="text/javascript">

	window.onload = function() {
		$('#contact_us_nav').addClass('active');
	};

	$('.emailValidate').change(function(){
		var x=$(this).val();//document.forms["myForm"]["email"].value;
		var atpos=x.indexOf("@");
		var dotpos=x.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length){
		  alert("Not a valid e-mail address");
		  $(this).focus().val('');
		  return false;
		}
			
	});

	$('.mobileValidate').change(function(){
		  var a = $(this).val();
		  if(a.length ==10){
		    var filter = /^[0-9-+]+$/;
		    if (filter.test(a)) {
		        //return true;
		    }
		    else{
		    	alert("Not a valid mobile no");
		    	$(this).focus().val('');
		        return false;
		    }
		  }
		  else{
			 	alert("Not a valid mobile no");
		    	$(this).focus().val('');
		  } 
	});

	
	function send_contact(){
		var name = $('#name').val();
		var mobile = $('#mobile').val();
		var message = $('#message').val();
		var email = $('#email').val();
		var url = document.URL+'send_email.php'
		if(message.length == 0){
			alert('Please Enter Your Message');
		}
		else if(email.length == 0){
			alert('Please Enter Your Email');
		}
		else if(name.length == 0){
			alert('Please Enter Your Name');
		}
		else{
		$.ajax({
			url: url,
			type: 'POST',
			data: {message:message,email:email,mobile:mobile},
			success: function(data){
					$('#contactForm').each(function(){this.reset();});
					$('#result').html('<h3 class="alert alert-success">Thnak You</h3>');
				}
			});
		}

	}
</script>
<?php include "../footer.php" ?>
