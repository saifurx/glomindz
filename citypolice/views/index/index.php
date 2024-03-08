<style>
body{
	background-color: #ffff99;
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
		          <img src="<?php echo URL?>assets/apps/img/banner_1.jpg" alt="First slide">
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
		        <div class="item">
		          <img src="<?php echo URL?>assets/apps/img/banner_2.jpg" alt="Second slide">
		          <!--  
		          <div class="container">
		            <div class="carousel-caption">
		              <h1>Another example headline.</h1>
		              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
		              <p><a class="btn btn-large btn-primary" href="#">Learn more</a></p>
		            </div>
		          </div>-->
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
	    	<div class="col-md-4 col-md-offset-5"><a href="#" class="btn btn-inverse">ABOUT US <span class="glyphicon glyphicon-forward"></span></a></div>
	    </div>
	    <div class="row">
	    	<div class="col-md-4">
	    		<a href="#" class="btn btn-green">CITIZEN SERVICE <span class="glyphicon glyphicon-forward"></span></a>
	    		<div class="hoverCraft" id="craft1">
	    			<div class="innerhoverCraft">
	    				<a target="_blank" href="<?php echo URL;?>citizen_service/know_ur_ps"></a>
	    				<span class="headText">KNOW YOUR </span>
	    				<br><span class="headText">POLICE STATION</span>
	    			</div>
	    		</div>
	    		<p><a href="<?php echo URL;?>citizen_service/list_of_ngo">List of NGOs</a></p>
	    		<p><a href="#">District Juvenile Protection Unit</a></p>
	    		<p><a href="#">Passport Status Info</a></p>
	    		<p><a href="#">Downloads</a></p>
	    	</div>
	    	<div class="col-md-4">
	    		<a href="#" class="btn btn-red">CRIME <span class="glyphicon glyphicon-forward"></span></a>
	    		<div class="hoverCraft" id="craft2">
	    			<div class="innerhoverCraft">
	    				<a href="<?php echo URL;?>crime/pending_cases"></a>
	    				<span class="headText">CRIME </span>
	    				<br><span class="headText">STATISTICS</span>
	    			</div>	
	    		</div>
	    		<p><a href="<?php echo URL;?>crime/vehicletheft">Automobile Theft</a></p>
	    		<p><a href="<?php echo URL;?>crime/atm_frauds">ATM Frauds</a></p>
	    		<p><a href="#">Non-Banking & Chit Fund Chit Fund Cases</a></p>
	    	</div>
	    	<div class="col-md-4">
	    		<h4>EMERGENCY NUMBERS</h4>
				<div class="">
					<p>
						<span>For Crime Related Emergency</span><br/>
						<span class="redText">Dial - 100 <br/>or 0361-XXXXXX or 0361-XXXXXX</span>
					</p>
					<p>
						<span>For Traffic Related Emergency</span><br/>
						<span class="redText">Dial - 1073</span>
					</p>
					<p>
						<span>For Crime Against Women & Children</span><br/>
						<span class="redText">Dial - 100 0r 
						Women & Child Helpline No.
						1091 <br/>or 0361-XXXXXX</span>
					</p>
					<p>
						<span>For any Cyber Crime Complaint</span><br/>
						<span class="redText">E-mail: abc@example.com</span>
					</p>
	    		</div>
	    	</div>
	    </div>
	    <div class="row">
	    	<div class="col-md-4">
	    		<a href="#" class="btn btn-blue">TRAFFIC <span class="glyphicon glyphicon-forward"></span></a>
	    		<div class="hoverCraft" id="craft3">
	    			<div class="innerhoverCraft">
	    				<a href="#"></a>
	    				<span class="headText">RULES & </span> 
	    				<br><span class="headText">REGULATIONS</span>
	    			</div>
	    		</div>
	    		<p><a href="<?php echo URL;?>citizen_service/accidentdata">Accident Data</a></p>
	    		<p><a href="<?php echo URL;?>citypolice/traffic/fine_collected">Fines Collected</a></p>
	    	</div>
	    	<div class="col-md-4">
	    		<a href="#" class="btn btn-black">CRIMINALS <span class="glyphicon glyphicon-forward"></span></a>
	    		<div class="hoverCraft" id="craft4">
	    			<div class="innerhoverCraft">
	    				<a href="<?php echo URL;?>criminals/criminal_gallery"></a>
	    				<span class="headText">CRIMINALS<br></span>
	    				<span class="headText">GALLERY</span>
	    			</div>	
	    		</div>
	    		<p><a href="<?php echo URL;?>criminals/criminal_gallery">Most Wanted</a></p>
	    		<p><a href="<?php echo URL;?>criminals/criminal_gallery">Lookout Notice</a></p>
	    	</div>
	    	<div class="col-md-4">
	    		<h4>NEWS & UPDATES</h4>
	    	</div>
	    </div>
	</div>
</div>

<script type="text/javascript">
	$('#home_nav').addClass('active');
	$(".hoverCraft").click(function(){
		window.location=$(this).find("a").attr("href"); 
	    return false;
	});
</script>