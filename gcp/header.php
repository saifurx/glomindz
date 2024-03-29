<?php define('URL', 'http://guwahaticitypolice.com/'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	
	<meta property="og:title" content="Kamal dev Bhuyan" /> 
	<meta property="og:image" content="<?php echo URL;?>assets/apps/img/me_xl.png" /> 

    <link rel="shortcut icon" href="">
	
	
    
    <title>Guwahati City Police</title>
    
    <!-- Bootstrap core CSS -->
    <link href="<?php echo URL;?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    
	<link href="<?php echo URL;?>assets/apps/css/app.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo URL;?>assets/apps/js/html5shiv.js"></script>
      <script src="<?php echo URL;?>assets/apps/js/respond.min.js"></script>
    <![endif]-->
    
    <script type="text/javascript" src="<?php echo URL;?>assets/apps/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo URL;?>assets/bootstrap/js/bootstrap.js"></script>

	<style>

	</style>
  </head>

  <body>
  	<header>
  	 <div class="redRibon"></div>
      <div class="container">
      	<h3 id="logo" class="col-md-1 pull-left"><img alt="City Police" src="<?php echo URL;?>assets/apps/img/logo_police.png"></h3>
      	
      	<div class="col-md-4">
      		<div id="hederTexta">GUWAHATI CITY</div>
      		<div id="hederTextb">POLICE</div>
      	</div>	
      	
      	<h3 id="logo" class="col-md-3 pull-right">
      		<img class="pull-right" alt="City Police" src="<?php echo URL;?>assets/apps/img/GOI_Logo_2.png" style=" margin-top: -7px; "> 
      	</h3>
      </div>	
	    <div class="navbar navbar-inverse">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	        </div>
	        <div class="collapse navbar-collapse">
	          <ul class="nav navbar-nav">
	            <li id="home_nav"><a href="<?php echo URL;?>"><strong>HOME</strong></a></li>
	            <li id="citizen_service_nav" class="dropdown">
			        <a href="#" class="dropdown-toggle" data-toggle="dropdown">CITIZEN SERVICE<b class="caret"></b></a>
			        <ul class="dropdown-menu">
			        	<li><a href="<?php echo URL;?>citizen_service/know_ur_ps.php">Know Your Police Station</a></li>	    		
						<li><a href="<?php echo URL;?>citizen_service/list_of_ngo.php">List of NGOs</a></li>
						<li><a href="<?php echo URL;?>citizen_service/advisory_for_citizen.php">Advisory for Citizen</a></li>
						<li><a href="<?php echo URL;?>downloads">Downloads</a></li>
						<!-- 
						<li><a href="<?php echo URL;?>citizen_service/district_juvenile_protection_unit">District Juvenile Protection Unit</a></li>
						<li><a href="<?php echo URL;?>citizen_service/passport_status_info">Passport Status Info</a></li>
						<li><a href="<?php echo URL;?>citizen_service/downloads">Downloads</a></li>
						 -->
			        </ul>
			    </li>
			    <li id ="crime_nav" class="dropdown">
			        <a href="#" class="dropdown-toggle" data-toggle="dropdown">CRIME<b class="caret"></b></a>
			        <ul class="dropdown-menu">
			          <li><a href="<?php echo URL;?>crime/vehicletheft.php">Vehicle Theft</a></li>
			          <li><a href="<?php echo URL;?>crime/case_registered_disposed.php">Case Registered/Disposed</a></li>
			          <li><a href="<?php echo URL;?>crime/case_registered_pending.php">Cases Registered/Pending </a></li>
			           <li><a href="<?php echo URL;?>crime/crime_trends.php">Crime Trends </a></li>
			          <li><a href="<?php echo URL;?>crime/non_banking_n_chit_fund_cases.php">Non-Banking & Chit Fund Cases</a></li>
			        </ul>
			    </li>
			    <li id ="criminal_nav" class="dropdown">
			    	<a href="#" class="dropdown-toggle" data-toggle="dropdown">CRIMINALS<b class="caret"></b></a>
				<ul class="dropdown-menu">
	    				<li><a href="<?php echo URL;?>criminals/criminal_gallery.php?#most_wanted">Most Wanted</a></li>
	    				<li><a href="<?php echo URL;?>criminals/criminal_gallery.php?#car_lifter">Car Lifters</a></li>
	    				<li><a href="<?php echo URL;?>criminals/criminal_gallery.php?#two_wheeler_lifter">2 wheeler Lifters</a></li>
	    				<li><a href="<?php echo URL;?>criminals/criminal_gallery.php?#peddler">Drug Peddlers</a></li>
	    				<li><a href="<?php echo URL;?>criminals/criminal_gallery.php?#snatcher">Snatchers</a></li>
			        </ul>
			    </li>
			    <li id="trafic_nav" class="dropdown">
			        <a href="#" class="dropdown-toggle" data-toggle="dropdown">TRAFFIC<b class="caret"></b></a>
			        <ul class="dropdown-menu">
			        	<li><a href="#">Rules & Regulations</a></li>
	    				<li><a href="<?php echo URL;?>traffic/accidentdata.php">Accident Data</a></li>
	    				<li><a href="<?php echo URL;?>traffic/fine_collected.php">Fines Collected</a></li>
			        </ul>
			    </li>
			    <li id="news_us_nav"><a href="<?php echo URL;?>news_n_update">NEWS & UPDATES</a></li>
	          </ul>
	          <ul class="nav navbar-nav pull-right">
	          	<li id="about_us_nav"><a href="<?php echo URL;?>about_us">ABOUT US</a></li>
	          	<li id="contact_us_nav"><a href="<?php echo URL;?>contact_us">CONTACT US</a></li>
	          </ul> 
	        </div><!--/.nav-collapse -->
	      </div>
	    </div>
    </header>
