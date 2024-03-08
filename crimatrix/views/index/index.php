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

<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>assets/apps/css/home_style.css">
<script type="text/javascript" src="<?php echo URL; ?>assets/apps/js/jquery.easing.1.3.js"></script>

<div class="container-fluid">

		<!-- Home  -->

		<div class="section" id="section1">
        	<div class="pad"></div>
        	<div class="content">
	        	<h1><span class="red_text_color">Mission</span> Objective</h1>
				<h3>To build safer cities with real-time police-public partnership</h3>
				<div id="panel_home">
					<p id="panel_home_p">
						Crimatrix is <span class="red_text_color">a community based real-time crime monitoring platform</span> for Police and citizens of Guwahati to harness the power of mobile and web technologies to monitor and prevent crimes in the city. 
					</p>
					<p class="p_nornal_small">
						We use  multiple  mobile and web apps to <span class="red_text_color">collect, analyze and share real-time crime data</span> among police officers.
					</p>	 
					<p class="p_nornal_small">
						Relevant crime data and alerts that could be useful to citizens, like <span class="red_text_color"> crime trends, hotspots and repeat offenders</span> will be shared for public awareness and crime prevention.
					</p>
					<div id="home_down_div">
							<div class="css_logo">[</div>
							<div class="red_dot"></div>
							<div class="css_logo" id="css_logo_last_part">]</div>
							<button type="button" id="home_crime_btn">Empowering citizens, Enabling police</button>		
							<a href="#section2" id="next_btn_a_img" class="next_section"><img alt="" src="assets/apps/img/btn_next_desktop.png"> </a>			
					</div>
				</div>
			</div>
        </div>
        
        <!-- For Citizen -->
        
        <div class="section" id="section2">
        <div class="pad"></div>
        	<div class="content">
        		<h1><span class="red_text_color">Vehicle Theft</span> SMS Reporting</h1>
				<h3>Guwahati has the highest number of vehicles plying than any of North East India's urban centres, which makes it the most targeted city by vehicle lifters.</h3>
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
						<h3 style=" font-size: 5em; text-indent: 25px; font-weight: bold; ">09243405521</h3>
						
						<label class="sms_lable" style=" width: 100px;">To Report</label>
						<label class="lable_margin"><b>VT</b> [Model],[RC NO.],[Color],[Location],[Last seen Time]</label>
						<label class="lable_margin eg_sms">example: VT Pulsar, AS01XXXX,Black,Maligaon,8:00PM</label>
						
						<label class="sms_lable" style=" width: 280px;">To Cancel Report (for police only)</label>
						<label class="lable_margin"><b>VT CANCEL</b> [RC No.]</label>
						<label class="lable_margin eg_sms">example: VT CANCEL AS01XXXX</label>
						
						<label class="sms_lable" style=" width: 280px;">To Report Recovery(for police only)</label>
						<label class="lable_margin"><b>VT FOUND</b> [RC No.]</label>
						<label class="lable_margin eg_sms">example:<b>VT FOUND</b> AS01XXXX</label>
					</div>
					<a href="#section3" class="pull-right btn_next_desktop_img next_section"><img alt="" src="assets/apps/img/btn_next_desktop.png"> </a>
				</div>
        	</div>       
        </div>
        <div class="section" id="section3">
        <div class="pad"></div>
	        <div class="content">
	        		<h1><span class="red_text_color">Hotel Guest List </span>Submission</h1>
					<h3>Crimatrix allows registered hotels and guest houses to submit their guest records in real-time</h3>
					<div id="panel_hotel_div"> 
					<p class="lable_margin sarai_details">As per The Sarais Act , all hotels and guest houses are required to submit their guest lists to the nearest police station everyday.
					</br><span class="red_text_color">The Sarais Act, 1867</span> [<a href="http://www.indiankanoon.org/doc/1283654/" target="_blank" style="color:#fff;">view full Act</a>]</p>
					
					<p class="lable_margin sarai_details">Crimatrix now  allows registered hotels and guest houses to submit the guest record in real-time from an internet connected computer instead of written reports. Crimatrix then cross checks the data immediately with available crime records and alerts the nearest police station if any match is found. Concerned officer will then alert the manager and provide further instructions. This helps in crime prevention and detection.</p>
					
                                        <p class="lable_margin sarai_details">"<i>The District Magistrate Kamrup (Metro) has instructed vide order dated 31st July 2013, that all hotels , guest houses and lodges shall submit their respective borders' lists online on Crimatrix.com."</i> [<a href="<?php echo URL?>apps/order" target="_blank">View Order</a>]</p>		
					</div>
					<div id="panel_hotel_signup"> 
					<h3>Register Your Hotel</h3>	
					<hr id="hrsignup">
						<div  id="hotel_signup_result"></div>
						<form id="hotel_sign_up_form" action="">
						    <input type="hidden" name="user_type" value="hotel">
						    <label class="control-label">Hotel Name</label>
	             		  	<input  class="span3 black_text" type="text" placeholder="Hotel XYZ" name="name" required="required">
	             		  	
	             		  	<label class="control-label">Email</label>
	             		  	<input  class="span3 emailValidate black_text" id="hotel_email" type="email" placeholder="example@something.com" name="email" required="required">
	             		  	
	             		  	<label class="control-label">Mobile</label>
	             		  	<input  class="span3 mobileValidate black_text" id="hotel_mobile" type="tel" placeholder="9243405521" maxlength="10" name="mobile" required="required">
	             		  	<label></label>
	             		  	
	             		  	
	             		  	<button type="button"  class="btn btn-inverse span3" id="hotel_sign_up_btn" onclick="submit_hotel_sign_up();">Sign up</button>
	             		  	<label><br/></label>
             		  		<img alt="loading" src="<?php echo URL;?>assets/apps/img/loading.gif" id="saving_hotel_user">
						</form>
					</div>
					<a href="#section5" class="pull-right btn_next_desktop_img next_section" style=" margin-top: 350px; "><img alt="" src="assets/apps/img/btn_next_desktop.png"> </a>
	        </div>
        </div>
        <div class="section" id="section5">
        <div class="pad"></div>
            <div class="content">
             	<h1><span class="red_text_color">About</span> Crimatrix</h1>
             	<h3>Crimatrix is a community based real-time crime monitoring platform</h3>
             	<div class="about">
             		<br><br>
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
				<div class="logos">
					<a href="http://www.assampolice.gov.in/" target="_blank" class="pull-right"><img alt="" src="assets/apps/img/logo_police.png"> </a><br/>
					<a href="http://www.glomindz.com" target="_blank" class="pull-right glomindz-logo"><img alt="" src="assets/apps/img/logo.png"> </a>
				</div>	
				<a href="#section6" id="about_next_section_img" class="pull-right btn_next_desktop_img next_section"><img alt="" src="assets/apps/img/btn_next_desktop.png"> </a>
             </div>
		</div>
		<div class="section" id="section6">
        <div class="pad"></div>
            <div class="content">
             	<h1><span class="red_text_color">Contact</span> Us</h1>
             	<h3>Get in touch with us for any query or suggestion</h3>
             	<div id="contact_msg">
             		<h4 class="alert">Thank You. We will get back to you soon.</h4>
             	</div>
             	<div id="contact_form">
             			<form method="POST"	id="contactForm" >
						<label for="name">Name: <span class="required">*</span> </label> 
						<input class="input-xxlarge" type="text" id="contactname" name="name" value=""	placeholder="Rakesh Sharma" required="" autofocus=""> 
						<label for="email">Email Address: <span class="required">*</span></label>
						<input class="input-xxlarge" type="email" id="contactemail" name="email" value="" placeholder="rakesh.sharma@example.com" required=""> 
						<label for="telephone">Contact No: </label> 
						<input class="input-xxlarge" type="tel" id="contacttelephone" name="tel" value="" placeholder="94350XXXXX"> 
						<label for="message">Message: <span class="required">*</span></label>
						<textarea class="input-xxlarge" id="contactmessage" name="message" 
						placeholder="Your message must be greater than 20 charcters" required="" data-minlength="20"></textarea>
						<p id="req-field-desc">
							<span class="required">*</span> indicates a required field
						</p>
						<button type="button" class="btn btn-large btn-danger" onclick="contact_us();">Submit</button>
					</form>
             	</div>
             	
             </div>
		</div>
	 
</div>    


<script type="text/javascript">
     $(function() {
           $('ul.nav a').bind('click',function(event){
				var $anchor = $(this);
                    $('html, body').stop().animate({
                        scrollTop: $($anchor.attr('href')).offset().top
                    }, 1500,'easeInOutExpo');
                    event.preventDefault();
                });
           $('.brand, .next_section').bind('click',function(event){
				var $anchor = $(this);
                   $('html, body').stop().animate({
                       scrollTop: $($anchor.attr('href')).offset().top
                   }, 1500,'easeInOutExpo');
                   event.preventDefault();
           });
    });


	$('#police_form_close_btn').click(function(){
		$('#police_sign_up_div').hide();
		$('#panel_police_div').show();

		$('#police_sign_up_result').show().html('');
	});
	$('#police_show_sign_up_btn').click(function(){
		$('#police_sign_up_div').show();
		$('#police_sign_up_form').show();
		$('#panel_police_div').hide();
	});


	
	$('#hotel_form_close_btn').click(function(){
		$('#hotel_sign_up_div').hide();
		$('#panel_hotel_div').show();

		$('#hotel_sign_up_result').hide().html('');
	});

	$('#hotel_show_sign_up_btn').click(function(){
		$('#hotel_sign_up_div').show();
		$('#hotel_sign_up_form').show();
		$('#panel_hotel_div').hide();
	});

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
	})
	
	function submit_hotel_sign_up(){
		$('#hotel_sign_up_btn').attr('disabled',true);
		var formdata = $('form#hotel_sign_up_form').serialize();
		var email = $('#hotel_email').val();
		var mobile = $('#hotel_mobile').val();
		
		if(email.length == 0 ){
			alert('Please enter email address');
			$('#hotel_sign_up_btn').attr('disabled',false);
		}
		else if(mobile.length == 0){
			alert('Please enter mobile no.');
			$('#hotel_sign_up_btn').attr('disabled',false);
		}
		else{
			$('#saving_hotel_user').show();
			$.ajax({
				type: 'POST',
				url: '<?php echo URL;?>user_service/register_user/',
				dataType: 'JSON',
				data: formdata,
				success: function(resp){
					$('#saving_hotel_user').hide();
					$('#hotel_sign_up_btn').attr('disabled',false);
					$('#hotel_sign_up_form').each(function(){this.reset();});
					$('#hotel_signup_result').show().html('<label>'+resp[0]+'</label><label><button style="margin-top:100px;" class="btn btn-block btn-inverse" type="button" onclick="showsignupform();">OK</button></label>');


					$('#hotel_sign_up_form').hide();
				}
			});
		}
	}

	function showsignupform(){
		$('#hotel_signup_result').html('').hide();
		$('#hotel_sign_up_form').show();
	}
	
	function submit_police_sign_up(){
		$('#police_sign_up_btn').attr('disabled',true);
		var formdata = $('form#police_sign_up_form').serialize();
		var email = $('#police_email').val();
		var mobile = $('#police_mobile').val();
		if(email.length == 0 ){
			alert('Please enter email address');
			$('#police_sign_up_btn').attr('disabled',false);
		}
		else if(mobile.length == 0){
			alert('Please enter mobile no.');
			$('#police_sign_up_btn').attr('disabled',false);
		}
		else{
			$('#saving_police_user').show();
			$.ajax({
				type: 'POST',
				url: '<?php echo URL;?>user_service/register_user/',
				dataType: 'JSON',
				data: formdata,
				success: function(resp){
					//$('#police_sign_up_form').hide();
					$('#saving_police_user').hide();
					$('#police_sign_up_form').each(function(){this.reset();});
					$('#police_sign_up_result').show().html(resp[0]);
					$('#police_sign_up_btn').attr('disabled',false);

				
				}
			});
		}
	}
	 window.onscroll = scroll;

	function scroll() {
		if(window.pageYOffset < 400){
			$('#nav_list li').siblings().removeClass("active");
		}
		
		else if(window.pageYOffset > 400 && window.pageYOffset < 1100){
      		$('#nav_list li').siblings().removeClass("active");
      		$('#for_citizen_li').addClass("active"); 
      	}
		
    	else if(window.pageYOffset > 1100 && window.pageYOffset < 2000){
     		$('#nav_list li').siblings().removeClass("active");
     		$('#forHotel_li').addClass("active");      		
     	}
		
    	else if(window.pageYOffset > 2000 && window.pageYOffset < 2500){
     		$('#nav_list li').siblings().removeClass("active");
     		$('#about_li').addClass("active");  		
     	}
	
    	else if(window.pageYOffset > 2500 && window.pageYOffset < 3500){
     		$('#nav_list li').siblings().removeClass("active");
     		$('#contact_li').addClass("active");  		
     	}
     	
    }


	function contact_us(){
		var formData = $('#contactForm').serialize();
		var contactname = $('#contactname').val();
		var contactemail = $('#contactemail').val();
		var contactmessage = $('#contactmessage').val();
		
		if(contactname == ''){
			alert('Your Name');
		}
		else if(contactemail == ''){
			alert('Your Email');
		}
		else if(contactmessage == ''){
			alert('Type Your Message');
		}
		
		else{
			$.ajax({
				type: 'POST',
				url: '<?php echo URL;?>user_service/send_contact_us_email/',
				dataType: 'JSON',
				data: formData,
				success: function(resp){
					 $('#contact_msg').show();
				}
			});
		}		
	}
</script>