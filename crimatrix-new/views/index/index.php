<style>
#wrap {
	padding-bottom: 0px;
}
</style>
<?php if ((Session::get('loggedIn') == true) && (Session::get('user_type') == 'hotel')):?>
<script type="text/javascript">
	<?php if (Session::get('status') == 1):?>
		window.location="<?php echo URL;?>hotel";
	<?php endif; ?>
	<?php if (Session::get('status') == 0):?>
		window.location="<?php echo URL;?>hotel/profile";
	<?php endif; ?>
</script>
 <?php endif; ?>
 
 <?php if ((Session::get('loggedIn') == true) && (Session::get('user_type') == 'police')):?>
 <script type="text/javascript">
	<?php if (Session::get('status') == 1):?>
		window.location="<?php echo URL;?>police";
	<?php endif; ?>
	<?php if (Session::get('status') == 0):?>
		window.location="<?php echo URL;?>police/profile";
	<?php endif; ?>
</script>
 <?php endif; ?>
 <link href="<?php echo URL;?>assets/apps/css/home_style.css" rel="stylesheet">
<div id="wrap">
	<div class="container" id="ContainerforHome">
		<div class="row">
			<h1><strong><span class="red_text_color">Mission</span> Objective</strong></h1>
			<h3>To build safer cities with real-time police-public partnership</h3>
		</div>
		<div class="row" id="panel_home">
			<p id="panel_home_p">
				Crimatrix is <span class="red_text_color">a community based real-time crime monitoring platform</span> for Police and citizens of Guwahati to harness the power of mobile and web technologies to monitor and prevent crimes in the city. 
			</p>
			<p class="p_nornal_small">
				We use  multiple  mobile and web apps to <span class="red_text_color">collect, analyze and share real-time crime data</span> among police officers.
			</p>	 
			<p class="p_nornal_small">
				Relevant crime data and alerts that could be useful to citizens, like <span class="red_text_color"> crime trends, hotspots and repeat offenders</span> will be shared for public awareness and crime prevention.
			</p>
		</div>
		<div class="row">
			<div id="home_down_div">
				<div class="css_logo">[</div>
				<div class="red_dot"></div>
				<div class="css_logo" id="css_logo_last_part">]</div>
				<button type="button" id="home_crime_btn">Empowering citizens, Enabling police</button>		
			</div>
		</div>
	</div><!-- /.container -->
	
	<div class="container" id="ContainerforCitizen">
		<div class="row">
			<h1><span class="red_text_color">Vehicle Theft</span> SMS Reporting</h1>
			<h3>Guwahati has the highest number of vehicles plying than any of North East India's urban centres, which makes it the most targeted city by vehicle lifters.</h3>
		</div>
		<div class="row">
		<div id="panel_citizen">
					<div id="panel_citizen_r_div">
						<div>
							<p class="panel_citizen_r_div_p">Considerable amount of time is lost from when the vehicle owner realizes the theft till a FIR is lodged and the information is transmitted to officers on field. By this time the stolen vehicle is already out of the city limits or perhaps the state border.</p>
							<p class="panel_citizen_r_div_p">To minimize this time gap, you can now send an sms  as soon as you realize the theft of your vehicle. The sms will immediately transmitted to all police officers on the field.</p>
							
							<p class="panel_citizen_r_div_p"><span class="red_text_color">Note:</span> FIR needs to be lodged to the nearest police station at the earliest.</p>
						</div>
					</div>
					<div id="panel_citizen_l_div">
						<label class="sms_lable" style=" width: 120px;">Send SMS To</label>
						<h3 style=" font-size: 4.5em; text-indent: 25px; font-weight: bold; margin-top: 0px; margin-bottom: 0px;">09243405521</h3>
						
						<label class="sms_lable" style=" width: 100px; margin-top: 0px;">To Report</label><br>
						<label class="lable_margin"><b>VT</b> [Model],[RC NO.],[Color],[Location],[Last seen Time]</label><br>
						<label class="lable_margin eg_sms">example: VT Pulsar, AS01XXXX,Black,Maligaon,8:00PM</label><br>
						
						<label class="sms_lable" style=" width: 280px; margin-top: 0px;">To Cancel Report (for police only)</label><br>
						<label class="lable_margin"><b>VT CANCEL</b> [RC No.]</label><br>
						<label class="lable_margin eg_sms">example: VT CANCEL AS01XXXX</label><br>
						
						<label class="sms_lable" style=" width: 280px; margin-top: 0px;">To Report Recovery(for police only)</label><br>
						<label class="lable_margin"><b>VT FOUND</b> [RC No.]</label><br>
						<label class="lable_margin eg_sms">example:<b>VT FOUND</b> AS01XXXX</label><br>
					</div>
				</div>
		</div>
	</div><!-- /.container -->
	
	
	<div class="container" id="ContainerforHotel">
		<div class="row">
			<h1><strong><span class="red_text_color">Hotel Guest List </span>Submission</strong></h1>
            <h3>Crimatrix allows registered hotels and guest houses to submit their guest records in real-time</h3>
		</div>
		<div class="row" style="background-color: rgba(0,0,0,0.7);margin-top: 10px;">
			<div class="col-md-9" id="panel_hotel_div" style="margin-top: 20px;">
				<p class="lable_margin sarai_details">As per The Sarais Act , all hotels and guest houses are required to submit their guest lists to the nearest police station everyday.
		        <br/><span class="red_text_color">The Sarais Act, 1867</span> [<a href="http://www.indiankanoon.org/doc/1283654/" target="_blank" style="color:#fff;">view full Act</a>]</p>
		        <p class="lable_margin sarai_details">Crimatrix now  allows registered hotels and guest houses to submit the guest record in real-time from an internet connected computer instead of written reports. Crimatrix then cross checks the data immediately with available crime records and alerts the nearest police station if any match is found. Concerned officer will then alert the manager and provide further instructions. This helps in crime prevention and detection.</p>
		        <p class="lable_margin sarai_details">"<i>The District Magistrate Kamrup (Metro) has instructed vide order dated 31st July 2013, that all hotels , guest houses and lodges shall submit their respective borders' lists online on Crimatrix.com."</i> [<a href="<?php echo URL?>apps/order" target="_blank">View Order</a>]</p>
	        </div>
	         <div class="col-md-3" style="color: #000;">
                                <div class="panel panel-default" style="color: #000;background: #cc0000; border: 0px;">
                                <div class="panel-heading" style="background: #9E0C0C; border: 0px;">
                                          <h1 class="panel-title" style="color: #fff; font-size: 1.5em;">Register Your Hotel</h1>
                                </div>
                                <div class="panel-body">
                                                <form role="form" id="signUpForm">
                                                  <div class="form-group">
                                                    <label>Hotel Name</label>
                                                    <input type="text" class="form-control" id="signUpName" name="name" placeholder="e.g. Dimond Inn">
                                                    <p class="errorText" id="errorName"><i class="fa fa-exclamation-triangle"></i> Invalid Name</p>
                                                  </div>
                                                  <div class="form-group">
                                                    <label>Email Address</label>
                                                    <input type="email" class="form-control" id="signUpEmail" name="email" placeholder="e.g. example@example.com">
                                                    <p class="errorText" id="errorEmail"><i class="fa fa-exclamation-triangle"></i> Invalid Email</p>
                                                  </div>
                                                  <div class="form-group">
                                                    <label>Mobile Number</label>
                                                    <input type="text" class="form-control" id="signUpMobile" name="mobile" maxlength="10" placeholder="e.g. 9243405521">
                                                    <p class="errorText" id="errorMobile"><i class="fa fa-exclamation-triangle"></i> Invalid mobile</p>
                                                  </div>
                                                  <button type="button" class="btn btn-success btn-block" id="signUpBtn" onclick="signup();">Register</button>
                                                </form>
                                </div>
                              </div>
                        </div>
		</div>
		
	</div><!-- /.container -->
	<!--  
	<div class="container" id="ContainerforPolice">
		
	</div>
	-->
	<div class="container" id="ContainerforAbout">
		<div class="row">
			<h1><span class="red_text_color">About</span> Crimatrix</h1>
            <h3>Crimatrix is a community based real-time crime monitoring platform</h3>
		</div>
		<br><br>
		<div class="row">
			<div class="col-md-8">
				    <span class="home_about_p_q">Where does Crimatrix work?</span><br/>
	             	<span class="home_about_p_ans">Currently, Crimatrix works only <span class="red_text_color">in Guwahati</span>. With time, we plan to extend it across Assam.</span>
					
					<br><br>
					<span class="home_about_p_q">Who is behind Crimatrix?</span><br/>
					<span class="home_about_p_ans">Crimatrix is a joint initiative by <span class="red_text_color">Assam Police</span> and <span class="glomindz_text_color">Glomindz</span></span>
					<br><br>
					
					<span class="home_about_p_q">The Crimatrix team is led by</span><br/>
					<span class="home_about_p_ans"><span class="red_text_color">Amitava Sinha</span> Addl. SP(Crime) City</span>
					<br><br>
					<p class="home_about_p_ans">under the guidance and patronage of<br/>
					<span class="red_text_color">Shri J.N. Chowdhury</span> IPS, Director General of Police, and<br/>
					<span class="red_text_color">Shri Anand Prakash Tiwari</span> IPS, Sr. Supdt of Police, City.</p>
			</div>
			<div class="col-md-4">
				<a class="row pull-right" style="margin-top: -50px;" href="http://www.assampolice.gov.in/" target="_blank"><img alt="" src="assets/apps/img/logo_police.png"> </a><br/>
				<a class="row pull-right" style="margin-top: 60px;" href="http://www.glomindz.com" target="_blank"><img alt="" src="assets/apps/img/logo.png"> </a>
			</div>
		</div>
	</div><!-- /.container -->
	<div class="container" id="ContainerforContact">
		<div class="row" style="margin-top: 40px">
			<h1><span class="red_text_color">Contact</span> Us</h1>
            <h3>Get in touch with us for any query or suggestion</h3>
            <div id="contact_msg">
            	
            </div>
            <div class="row" style="margin-left: -10px;">
            	<div class="col-md-6 ">
            	<form role="form" id="contactForm">
				  <div class="form-group">
				   <label for="name">Name: <span class="required">*</span> </label> 
				    <input class="form-control" type="text" id="contactname" name="name" value=""	placeholder="Rakesh Sharma" required="" autofocus="">
				  </div>
				  <div class="form-group">
				    <label>Email Address: <span class="required">*</span></label>
				    <input class="form-control" type="email" id="contactemail" name="email" value="" placeholder="rakesh.sharma@example.com" required="">
				  </div>
				  <div class="form-group">
				    <label>Mobile No: </label> 
				    <input type="text" class="form-control" type="tel" id="contacttelephone" placeholder="94350XXXXX">
				  </div>
				  <div class="form-group">
				    <label for="message">Message: <span class="required">*</span></label>
				    <textarea class="form-control" id="contactmessage" name="message"	placeholder="Your message must be greater than 20 charcters" required="" data-minlength="20"></textarea>
				  </div>
				  <p id="req-field-desc">
					<span class="required">*</span> indicates a required field
				  </p>
				  <button type="button" class="btn btn-default" onclick="contact_us();">Submit</button>
				</form>
				</div>
            </div>
		</div>
	</div><!-- /.container -->
</div>

<script type="text/javascript">
window.onload = function() {
	$('#ContainerforHome').slideDown();
};

$("#home_nav").on("click", "li", function() {
	$(this).addClass("active").siblings().removeClass("active");
});

$('#navbar-brand').on("click", function() {
	$('#home_nav').children().removeClass("active");

	$('#ContainerforCitizen,#ContainerforHotel,#ContainerforPolice,#ContainerforAbout,#ContainerforContact').slideUp();
	$('#ContainerforHome').slideDown();
});

$('#citizen_li').click(function(){
	$('#ContainerforHome,#ContainerforHotel,#ContainerforPolice,#ContainerforAbout,#ContainerforContact').slideUp();
	$('#ContainerforCitizen').slideDown();
});

$('#hotel_li').click(function(){
	$('#ContainerforHome,#ContainerforCitizen,#ContainerforPolice,#ContainerforAbout,#ContainerforContact').slideUp();
	$('#ContainerforHotel').slideDown();
});

$('#about_li').click(function(){
	$('#ContainerforHome,#ContainerforCitizen,#ContainerforHotel,#ContainerforPolice,#ContainerforContact').slideUp();
	$('#ContainerforAbout').slideDown();
});

$('#contact_li').click(function(){
	$('#ContainerforHome,#ContainerforCitizen,#ContainerforHotel,#ContainerforPolice,#ContainerforAbout').slideUp();
	$('#ContainerforContact').slideDown();
});
/*
  
 #ContainerforHome,#ContainerforCitizen,#ContainerforHotel,#ContainerforPolice,#ContainerforAbout,#ContainerforContact
 





*/
function signup(){
	var signUpName = $('#signUpName').val();
	var signUpEmail = $('#signUpEmail').val();
	var signUpMobile = $('#signUpMobile').val();

	var validate_signUpName = alphanumericValidate(signUpName);
	var validate_signUpEmail = emailValidate(signUpEmail);
	var validate_signUpMobile = mobileValidate(signUpMobile);

	$('#errorMobile,#errorEmail,#errorName').hide();
	if(validate_signUpMobile == false){$('#errorMobile').show();}
	if(validate_signUpEmail == false){$('#errorEmail').show();}
	if(validate_signUpName == false){$('#errorName').show();}	
	if(validate_signUpMobile == true && validate_signUpEmail == true && validate_signUpName == true){
		$('#errorMobile,#errorEmail,#errorName').hide();
		$('#signUpBtn').attr('disabled',true).html('Creating... <i class="fa fa-refresh fa-spin"></i>');
		var formdata = $('form#signUpForm').serialize();
		$.ajax({
			type: 'POST',
			url: '<?php echo URL;?>user_service/register_hotel_user/',
			dataType: 'JSON',
			data: formdata,
			success: function(resp){
				if(resp > 0){
					$('#signUpForm').html('<br><br><br><h3 class="alert alert-success">Thank You!</h3><br><br><br>');
				}
				else{
					$('#signUpForm').html('<br><br><br><h3 class="alert alert-danger">You are Already Registered!</h3><br><br><br>');
				}
			}
		});
	}
}

function contact_us(){
	var formData = $('#contactForm').serialize();
	var contactname = $('#contactname').val();
	var contactemail = $('#contactemail').val();
	var contacttelephone = $('#contacttelephone').val();
	var contactmessage = $('#contactmessage').val();
	
	var validate_Name = alphanumericValidate(contactname);
	var validate_Email = emailValidate(contactemail);
	var validate_Mobile = mobileValidate(contacttelephone);
	var validate_Msg = alphanumericValidate(contactmessage);

	if(validate_Name== true &&  validate_Email == true && validate_Mobile == true && validate_Msg == true){
		$.ajax({
			type: 'POST',
			url: '<?php echo URL;?>user_service/send_contact_us_email/',
			dataType: 'JSON',
			data: formData,
			success: function(resp){
				 $('#contact_msg').show().html('<h4 class="text-success">Thank You. We will get back to you soon.</h4>');
			}
		});
	}
	else{
		$('#contact_msg').show().html('<h4 class="text-danger">Please fillup the form with valid input.</h4>');
	}		
}
</script>