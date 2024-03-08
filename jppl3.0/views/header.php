<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<!--  <link rel="shortcut icon" href="<?php echo URL;?>assets/apps/img/favicon.png">-->

<title>MVC</title>

<!-- Bootstrap core CSS -->
<link href="<?php echo URL;?>assets/bootstrap/css/bootstrap.css"
	rel="stylesheet">
<link rel="stylesheet"
	href="<?php echo URL;?>assets/font-awesome/css/font-awesome.css">
<!-- Custom styles for this template -->

<link href="<?php echo URL;?>assets/apps/css/app.css" rel="stylesheet">
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="<?php echo URL;?>assets/apps/js/html5shiv.js"></script>
      <script src="<?php echo URL;?>assets/apps/js/respond.min.js"></script>
    <![endif]-->

<script type="text/javascript"
	src="<?php echo URL;?>assets/jquery/js/jquery.js"></script>
<script type="text/javascript"
	src="<?php echo URL;?>assets/jquery/js/jquery-ui.min.js"></script>
<script type="text/javascript"
	src="<?php echo URL;?>assets/bootstrap/js/bootstrap.js"></script>
</head>
<body>
<?php Session::init();?>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".navbar-collapse">
					<span class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">MVC</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
				<?php if(Session::get("logedin")=='true'){?>
					<li class="active"><a href="<?php echo URL.'admin/production';?>">Production</a></li>
					<li><a href="#about">Stocks</a></li>
					
					<?php }else{?>
					<li><a href="<?php echo URL;?>">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#contact">Contact</a></li>
					<?php }?>

				</ul>
				<ul class="nav navbar-nav navbar-right">
				<?php if(Session::get("logedin")=='true'){?>
					<li><a href="#"><?php echo Session::get("name");?> </a></li>
					<li><a href="<?php echo URL.'user_service/logout';?>">Signout</a></li>
					<?php }else{?>
					<li><a href="<?php echo URL.'index/signin';?>">Signin</a></li>
					<?php }?>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>