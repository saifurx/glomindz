<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <title>Internal portal</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="shortcut icon" href="<?php echo URL; ?>assets/bootstrap/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo URL; ?>assets/bootstrap/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo URL; ?>assets/bootstrap/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo URL; ?>assets/bootstrap/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo URL; ?>assets/bootstrap/ico/apple-touch-icon-57-precomposed.png">


        <script src="<?php echo URL; ?>assets/jquery/js/jquery.js"></script>
        <script	src="<?php echo URL; ?>assets/jquery/js/jquery-ui.min.js"></script>
        <script src="<?php echo URL; ?>assets/bootstrap/js/bootstrap.js"></script>
        <script src="<?php echo URL; ?>assets/apps/js/site_analitics.js"></script>

        <link href="<?php echo URL; ?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo URL; ?>assets/apps/css/jppl.css" rel="stylesheet">
        <link href="<?php echo URL; ?>assets/bootstrap/css/bootstrap-responsive.css"	rel="stylesheet">
        <link href="<?php echo URL; ?>assets/jquery/css/jquery-ui.min.css" rel="stylesheet">
    </head>
    <body>
        <?php Session::init(); ?>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                        <a class="brand" href="<?php echo URL; ?>"><img alt="Glomindz" src="<?php echo URL; ?>assets/apps/img/logo.png" style="padding-top: 5px;height:30px;" ></a>
                    
                    <div class="nav-collapse collapse">
                        <?php if (Session::get('loggedIn') == true): ?>
                           

                            <?php if (Session::get('user_type') == 'admin'): ?>
                                <ul class="nav">
                                 
                                  <!--   <li id="hr_li"><a href="<?php echo URL; ?>employee/hr">Employee</a></li>
                                    <li id="payroll_li"><a href="<?php echo URL; ?>employee/payroll">Payroll</a></li>
                                    <li id="accounts_li"><a href="<?php echo URL; ?>employee/accounts">Accounts</a></li> -->
                                    <li id="stocks_li"><a href="<?php echo URL; ?>employee/stocks">Stocks</a></li>
                                   <!-- <li id="circulation_li"><a href="<?php echo URL; ?>employee/circulation">Circlation</a></li> -->
                                  <!--  <li id="advertisement_li"><a href="<?php echo URL; ?>employee/advertisement">Advertisement</a></li> -->
                                    <li id="production_li"><a href="<?php echo URL; ?>employee/production">Production</a></li>
                                  <!--  <li id="payment_li"><a href="<?php echo URL; ?>employee/payment">Payment</a></li> -->
                                </ul>
                            <?php endif; ?>
                            <ul class="nav pull-right">
                             	<li id="setting_dropdown_li" class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog icon-white"></i> Settings<b class="caret"></b></a>
                                   
                                </li>
                                <li><a href="#" class="navbar-link" title="Logged in as"><i class="icon-user icon-white"></i> <?php echo Session::get("name"); ?></a></li> 
                                <li><a class="pull-right" href="<?php echo URL; ?>user_service/logout" title="Sign Out"><i class="icon-off icon-white"></i> Sign Out</a></li>
                            </ul>

                        <?php endif; ?>
                        <?php if (Session::get('loggedIn') == false): ?>
                            <ul class="nav">
                                <li id="about_li"><a href="#section4">About</a></li>
                                <li id="contact_li"><a href="#section5">Contact</a></li>
                            </ul>
                            <ul class="nav pull-right">
                                <li class="dropdown" id="sign_in_dropdown_li">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-off icon-white"></i> Sign In <b class="caret"></b></a>
                                    <ul class="dropdown-menu well span3" style="background: #fff;">
                                        <li>
                                            <form id="sign_in" method="POST" action="<?php echo URL; ?>user_service/login/" accept-charset="UTF-8" style="margin-bottom: 0px;">
                                                <strong style="font-weight: bold;">Sign In</strong>
                                                <hr>
                                                <label>Email or Mobile</label>
                                                <input class="span3" type="text" placeholder="Email or Mobile" name="user">
                                                <label>Password</label>
                                                <input class="span3" type="password" placeholder="Password" name="password">
                                  				<input type="text" class="span3" id="login_fail" disabled="disabled" value="Username or Password are incorrect.">
                                                <input class="span3" type="hidden" name="ip_address" value="127.0.0.1">
                                                <input class="span3" type="hidden" name="location" value="GUWAHATI">
                                                <button class="btn btn-primary" type="submit">Sign In</button>
                                                <a class="pull-right" href="<?php echo URL; ?>apps/forget_password" style="margin-top: 10px;">Forget Password</a>
                                                <hr>
                                                <a href="<?php echo URL;?>apps/new_register">New User ?<strong> Sign Up</strong></a>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        <?php endif; ?>  	
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>    
        
        <script type="text/javascript">
        $(document).ready(function () {
            
        	var current_url="<?php echo URL;?>";
        	var url= current_url+'?loginFailed';
        	if(document.URL == url){
            	$('#sign_in_dropdown_li').addClass('dropdown open');
        		$('#login_fail').show();
        		setTimeout(function(){
        		    $("#login_fail").slideUp(500);
        		}, 2500);
        	}

        	 $('html, body').stop().animate({
                 scrollTop: 0
             }, 1500,'easeInOutExpo');
        });


		</script>