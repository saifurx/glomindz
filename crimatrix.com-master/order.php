<?php  require 'config.php'; ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Crimatrix an real time crime analytics plateform">
        <meta name="keywords" content="Assam Police, Crimatrix">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <title>Crimatrix</title>
        <!-- css -->
        <link media="all" type="text/css" rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
        <link media="all" type="text/css" rel="stylesheet" href="./assets/application/css/app.css">
        <link media="all" type="text/css" rel="stylesheet" href="./assets/application/css/home.css">
        <!-- js -->
        <script src="./assets/jquery/js/jquery-2.1.1.min.js"></script>
        <script src="./assets/bootstrap/js/bootstrap.min.js"></script>


        <script>
    		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    		  ga('create', 'UA-36940561-1', 'auto');
    		  ga('send', 'pageview');

    		</script>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo URL;?>">
                        <img id="logo_image" class="img-responsive" src="<?php echo URL;?>assets/application/img/logo.png" alt="Crimatrix Logo">
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                    	<li><a id="police_sign_in_btn" href="https://police.crimatrix.com/" class="btn btn-primary btn-lg navbar-btn">Police Sign in</a></li>
                    	<li>&nbsp;&nbsp;</li>
                        <li><a id="hotel_sign_in_btn" href="https://enterprise.crimatrix.com/hotel" class="btn btn-danger btn-lg navbar-btn">Hotel Sign in</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <section>
            <div class="container">
				<div class="row">
            <div class="col-xs-12 col-md-12">
						<a href="assets/application/img/order.jpg"><img class="img-responsive" alt="" src="assets/application/img/order.jpg" style="width:100%;height:100%/9;"></a>
				</div>
        </div>
            </div>
        </section>

        <div id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <p class="pull-left">
                            <small class="text-crimatrix">© Crimatrix 2017-2018</small>
                            <small class="text-muted"> | </small>
                            <small><a href="https://glomindz.com" title="A product of Glomindz Software Private Limited" target="_blank"> Glomindz Software Private Limited </a></small>
                        </p>
                    </div>
                    <div class="col-xs-12 col-md-6">
                      <p class="pull-right">
                          <span class="text-muted"><a href="./about.php">About</a></span>
                          <span class="text-muted"> | </span>
                          <span class="text-muted"><a href="./contact.php">Contact</a></span>
                          <span class="text-muted"> | </span>
                          <span class="text-muted"><a href="./ip.php" target="_blank">IPR Complaints</a></span>
                          <span class="text-muted"> | </span>
                          <span class="text-muted"><a href="./terms_n_condition.php" target="_blank">Terms of Service</a></span>
                          <span class="text-muted"> | </span>
                          <span class="text-muted"><a href="./privacy.php" target="_blank">Privacy Policy</a></span>
                      </p>
                    </div>
                </div>
            </div>
        </div>

</body>
</html>
