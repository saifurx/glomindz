<!doctype html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>Resource Map of Assam</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<style type="text/css">
body {
	padding-top: 60px;
	padding-bottom: 40px;
}
</style>
<!-- Le styles -->
<link href="<?php echo URL; ?>assets/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo URL; ?>assets/css/bootstrap-responsive.css" rel="stylesheet">
<link href="<?php echo URL; ?>assets/css/docs.css" rel="stylesheet">

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

<!-- Le fav and touch icons -->
<link rel="shortcut icon"
	href="<?php echo URL; ?>assets/ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="144x144"
	href="<?php echo URL; ?>assets/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114"
	href="<?php echo URL; ?>assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72"
	href="<?php echo URL; ?>assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed"
	href="<?php echo URL; ?>assets/ico/apple-touch-icon-57-precomposed.png">

<script src="<?php echo URL; ?>assets/js/jquery.js"></script>
<script src="<?php echo URL; ?>assets/js/bootstrap.js"></script>

</head>
<body>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36603032-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script type="text/JavaScript" src="//cdn.debuggify.net/js/c94f87af053ce4d51232241317903987/debuggify.logger.http.js"></script>

<?php Session::init(); ?>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner" style="border-bottom-width: 0px;">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse"
					data-target=".nav-collapse"> <span class="icon-bar"></span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> </a>
				<div class="nav-collapse">
					<ul class="nav">
					<?php if (Session::get('loggedIn') == true):?>
						<li id="admin"><a href="<?php echo URL;?>admin/edit_block">Admin Panel</a></li>
						<?php endif; ?>
						<li id="home"><a href="<?php echo URL;?>">Home</a></li>
						<li id="resourcemap"><a
							href="<?php echo URL;?>resourcemap/raw_material">Resource Mapping</a>
						</li>
						<li id="profile" class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> Profile </a>
							<ul class="dropdown-menu">
							    <li><a href="<?php echo URL;?>profile/block_profile">Development Blocks</a></li>
								<li class="dropdown-submenu"><a>District</a>
									<div class=" dropdown-menu img-polaroid span4">
										<div class="dist_dropdown">
											<ul>
												<li class="dropdown"><a href="<?php echo URL;?>profile/district_profile_details/1" tabindex="-1">Baska</a></li>
												<li class="dropdown"><a href="<?php echo URL;?>profile/district_profile_details/2" tabindex="-1">Barpeta</a></li>
												<li class="dropdown"><a href="<?php echo URL;?>profile/district_profile_details/3" tabindex="-1">Bongaigaon</a></li>
												<li class="dropdown"><a href="<?php echo URL;?>profile/district_profile_details/4" tabindex="-1">Cachar</a></li>
												<li class="dropdown"><a href="<?php echo URL;?>profile/district_profile_details/5" tabindex="-1">Chirang</a></li>
												<li class="dropdown"><a href="<?php echo URL;?>profile/district_profile_details/6" tabindex="-1">Darrang</a></li>
												<li class="dropdown"><a href="<?php echo URL;?>profile/district_profile_details/7" tabindex="-1">Dhemaji</a></li>
												<li class="dropdown"><a href="<?php echo URL;?>profile/district_profile_details/8" tabindex="-1">Dhubri</a></li>
												<li class="dropdown"><a href="<?php echo URL;?>profile/district_profile_details/9" tabindex="-1">Dibrugarh</a></li>
												<li class="dropdown"><a href="<?php echo URL;?>profile/district_profile_details/23" tabindex="-1">Dima Hasao</a></li>
												<li class="dropdown"><a href="<?php echo URL;?>profile/district_profile_details/10" tabindex="-1">Goalpara</a></li>
		    									<li class="dropdown"><a href="<?php echo URL;?>profile/district_profile_details/11" tabindex="-1">Golaghat</a></li>
												<li class="dropdown"><a href="<?php echo URL;?>profile/district_profile_details/12" tabindex="-1">Hailakandi</a></li>
												<li class="dropdown"><a href="<?php echo URL;?>profile/district_profile_details/13" tabindex="-1">Jorhat</a></li>	
										        <li class="dropdown"><a href="<?php echo URL;?>profile/district_profile_details/14" tabindex="-1">Kamrup</a></li>								            							            								            								            								            								            
								             </ul>      
										</div>
										<div class="dist_dropdown">
											<ul>
												<li class="dropdown"><a href="<?php echo URL;?>profile/district_profile_details/15" tabindex="-1">Kamrup (M)</a></li>
												<li class="dropdown"><a href="<?php echo URL;?>profile/district_profile_details/16" tabindex="-1">Karbi Anglong</a></li>
												<li class="dropdown"><a href="<?php echo URL;?>profile/district_profile_details/17" tabindex="-1">Karimganj</a></li>
												<li class="dropdown"><a href="<?php echo URL;?>profile/district_profile_details/18" tabindex="-1">Kokrajhar</a></li>
												<li class="dropdown"><a href="<?php echo URL;?>profile/district_profile_details/19" tabindex="-1">Lakhimpur</a></li>
												<li class="dropdown"><a href="<?php echo URL;?>profile/district_profile_details/20" tabindex="-1">Marigaon</a></li>
												<li class="dropdown"><a href="<?php echo URL;?>profile/district_profile_details/21" tabindex="-1">Nagaon</a></li>
												<li class="dropdown"><a href="<?php echo URL;?>profile/district_profile_details/22" tabindex="-1">Nalbari</a></li>
												
												<li class="dropdown"><a href="<?php echo URL;?>profile/district_profile_details/24" tabindex="-1">Sibsagar</a></li>
										        <li class="dropdown"><a href="<?php echo URL;?>profile/district_profile_details/25" tabindex="-1">Sonitpur</a></li>
												<li class="dropdown"><a href="<?php echo URL;?>profile/district_profile_details/26" tabindex="-1">Tinsukia</a></li>
												<li class="dropdown"><a href="<?php echo URL;?>profile/district_profile_details/27" tabindex="-1">Udalguri</a></li>
								            </ul> 
										</div>									
									</div>
									
								</li>
							</ul>
						</li>
						
						<li id="about"><a href="<?php echo URL;?>about">About This Project</a>
						</li>
						<li id="contact"><a href="<?php echo URL;?>contact">Contact Us</a>
						</li>
					</ul>
					<?php if (Session::get('loggedIn') != true):?>
					<a class="btn pull-right" href="<?php echo URL;?>login">Login</a>
					<?php else:?>
					<p class="btn pull-right">
						<strong><?php echo Session::get("name");?></strong> | <a href="<?php echo URL;?>admin/logout">Logout</a></p>
				<?php endif; ?>
				</div>
				<!--/.nav-collapse -->
			</div>
		</div>
	</div>