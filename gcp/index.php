<?php include "header.php" ?>
<style>
body{
	background-color: #ffff99;
}

.carousel-caption{
	background: transparent;
	opacity: 0.90;
	text-align: center;
	padding-left: 0px;
	margin-bottom: 70px;
 }

</style>
<div class="content">
	<div class="container" style=" height: auto;">
		<div class="row" id="bannersDiv">
		   <!-- Carousel
		    ================================================== -->
		    <div id="myCarousel" class="carousel slide">
		      <!-- Indicators -->
		      <ol class="carousel-indicators">
		        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		        <li data-target="#myCarousel" data-slide-to="1"></li>
		      </ol>
		      <div class="carousel-inner">
		        <div class="item active">
		          <img src="<?php echo URL?>assets/apps/img/diwali.jpg" alt="First slide">
			      <div class="container">
		            <div class="carousel-caption">
		              <h2>Guwahati City Police Wishes You <br>
		              <span class="Three-Dee">A Happy & Safe Diwali</span>
		              </h2>
		              <a data-toggle="modal" href="#myModal" class="btn btn-primary">Message form SSP</a>
		            </div>
		          </div>
		        </div>
		        <div class="item">
		          <img src="<?php echo URL?>assets/apps/img/banner_1.jpg" alt="Second slide">
					<!--  
		          <div class="container">
		            <div class="carousel-caption">
		              <h1>Example headline.</h1>
		              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
		              <p><a class="btn btn-large btn-primary" href="#">Sign up today</a></p>
		            </div>
		          </div>
		          -->
		        </div>

		      </div>
		      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
		      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
		    </div><!-- /.carousel -->
	    </div>
	    <div class="row">
	   		<h4 class="col-md-4 col-md-offset-5">MISSION STATEMENT</h4>
	    </div>
	    
	    <hr class="blackHr">
	    <div class="row">
	   		<p class="missionText">Maintain order, prevent and detect crime by enforcing law firmly and impartially, without fear or favor, prejudice or vindictiveness.</p>
	    </div>
	    <hr class="blackHr">
	    <div class="row" style="padding-bottom: 30px;">
	    	<div class="col-md-4 col-md-offset-5"><a href="<?php echo URL?>about_us" class="btn btn-inverse">ABOUT US <span class="glyphicon glyphicon-forward"></span></a></div>
	    </div>
	    <div class="row">
	    	<div class="col-md-4">
	    		<a href="<?php echo URL;?>citizen_service/know_ur_ps.php" class="btn btn-green">CITIZEN SERVICE <span class="glyphicon glyphicon-forward"></span></a>
	    		<div class="hoverCraft" id="craft1">
	    			<div class="innerhoverCraft">
	    				<a target="_blank" href="<?php echo URL;?>citizen_service/know_ur_ps.php"></a>
	    				<span class="headText">KNOW YOUR </span>
	    				<br><span class="headText">POLICE STATION</span>
	    			</div>
	    		</div>
	    		<p><a href="<?php echo URL;?>citizen_service/list_of_ngo.php">List of NGOs</a></p>
	    		<p><a href="<?php echo URL;?>downloads">Downloads</a></p>
	    	</div>
	    	<div class="col-md-4">
	    		<a href="<?php echo URL;?>crime/vehicletheft.php" class="btn btn-red">CRIME <span class="glyphicon glyphicon-forward"></span></a>
	    		<div class="hoverCraft" id="craft2">
	    			<div class="innerhoverCraft">
	    				<a href="<?php echo URL;?>crime/vehicletheft.php"></a>
	    				<span class="headText">VEHICLE THEFT</span>
	    				<br><span class="headText">STATISTICS</span>
	    			</div>	
	    		</div>
	    		<p><a href="<?php echo URL;?>crime/pending_cases.php">Pending UD Cases</a></p>
	    		<p><a href="<?php echo URL;?>crime/non_banking_n_chit_fund_cases.php">Non-Banking & Chit Fund Chit Fund Cases</a></p>
	    	</div>
	    	<div class="col-md-4">
	    		<h4>EMERGENCY NUMBERS</h4>
				<div class="">
					<p>
						<span>For Crime Related Emergency</span><br/>
						<span class="redText"><strong>Dial - 100</strong></span>
					</p>
					
	    		</div>
	    	</div>
	    </div>
	    <div class="row">
	    	<div class="col-md-4">
	    		<a href="<?php echo URL;?>traffic/accidentdata.php" class="btn btn-blue">TRAFFIC <span class="glyphicon glyphicon-forward"></span></a>
	    		<div class="hoverCraft" id="craft3">
	    			<div class="innerhoverCraft">
	    				<a href="#"></a>
	    				<span class="headText">RULES & </span> 
	    				<br><span class="headText">REGULATIONS</span>
	    			</div>
	    		</div>
	    		<p><a href="<?php echo URL;?>traffic/accidentdata.php">Accident Data</a></p>
	    		<p><a href="<?php echo URL;?>traffic/fine_collected.php">Fines Collected</a></p>
	    	</div>
	    	<div class="col-md-4">
	    		<a href="<?php echo URL;?>criminals/criminal_gallery.php" class="btn btn-black">CRIMINALS <span class="glyphicon glyphicon-forward"></span></a>
	    		<div class="hoverCraft" id="craft4">
	    			<div class="innerhoverCraft">
	    				<a href="<?php echo URL;?>criminals/criminal_gallery.php"></a>
	    				<span class="headText">CRIMINALS<br></span>
	    				<span class="headText">GALLERY</span>
	    			</div>	
	    		</div>
	    		<p><a href="<?php echo URL;?>criminals/criminal_gallery.php">Most Wanted</a></p>
	    		<p><a href="<?php echo URL;?>criminals/criminal_gallery.php">Car Lifters</a></p>
	    	</div>
	    	<div class="col-md-4">
	    		<h4>FOLLOW US ON FACEBOOK</h4>
	    		
	    		<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
				<div class="fb-like-box" data-href="https://www.facebook.com/pages/Guwahati-City-Police/211606768891234" data-width="The pixel width of the plugin" data-height="250px" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="true"></div>
	    	</div>
	    </div>
	</div>
</div>


  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Message from SSP</h4>
        </div>
        <div class="modal-body">
          	<img class="pull-left" style="padding:10px;"alt="" src="<?php echo URL;?>assets/apps/img/aptiwari.jpg">
          
          
          <p>Dear Guwahatians,</p>
		  <p>I wish you a <strong>Very Happy and Safe Diwali</strong>. This website is a gift to the people of Guwahati on this auspicious occasion from us. We have a goal to provide various informations for easy access by citizens, particularly <strong>Know your Police Station</strong>, through this website. We will continue updating this website with more information as frequently as possible.</p> 
 		  <p>I also take this opportunity to request you to kindly assist the Policeman on the street to help you by not only being law abiding but also by being friendly in your interface with him/her. All Policemen have been briefed to remain extremely courteous. In case of any problem, please feel free to contact us. We are available 24x7. I assure you that you shall have a wonderful Diwali experience when you go out of your home with your family to participate in the festivities.</p>
		  <p>Guwahati City Police remains committed to smart, transparent, proactive citizen friendly Policing. Please accept this website as a gesture of our commitment and help us to upgrade it with your suggestions.</p>
		  <p>
          Thanking you,<br>
		  Sincerely yours,<br>
          (Anand Prakash Tiwari), IPS
          </p>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  </div>
  
<script type="text/javascript">
	$('#home_nav').addClass('active');
	$(".hoverCraft").click(function(){
		window.location=$(this).find("a").attr("href"); 
	    return false;
	});
	
	window.onload = function() {
		//$('#myCarousel').carousel('pause');
		$('#myCarousel').carousel({
		  interval: 10000
		});
		checkCookie();
	}

	/***Cookie***/
	
	function getCookie(c_name){
		var c_value = document.cookie;
		var c_start = c_value.indexOf(" " + c_name + "=");
		if (c_start == -1){
			c_start = c_value.indexOf(c_name + "=");
		}
		if (c_start == -1){
			c_value = null;
		}
		else{
			c_start = c_value.indexOf("=", c_start) + 1;
			var c_end = c_value.indexOf(";", c_start);
			if (c_end == -1){
				c_end = c_value.length;
			}
			c_value = unescape(c_value.substring(c_start,c_end));
		}
		return c_value;
	}

	function setCookie(c_name,value,exdays){
		var exdate=new Date();
		exdate.setDate(exdate.getDate() + exdays);
		var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
		document.cookie=c_name + "=" + c_value;
	}

	function checkCookie(){
		var username=getCookie("modal");
		if (username!=null && username!=""){
			
		}
		else{
			username='spMsg';
			if (username!=null && username!=""){
				$('#myModal').modal('show');
				setCookie("modal","spMsg",1);
			}
		}
	}
</script>
<?php include "footer.php" ?>