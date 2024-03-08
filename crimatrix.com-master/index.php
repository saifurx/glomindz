<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Crimatrix for hotel.">
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
        <style type="text/css">
           body{
            overflow: auto;
           }
        </style>

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
                    <a class="navbar-brand" href="./">
                        <img id="logo_image" class="img-responsive" src="./assets/application/img/logo.png" alt="Crimatrix Logo">
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                    	<li><a id="police_sign_in_btn" href="https://police.crimatrix.com/" class="btn btn-primary btn-lg navbar-btn">Police Sign in</a></li>
                    	<li>&nbsp;&nbsp;</li>
                        <!--<li><a id="hotel_sign_in_btn" href="http://enterprise.crimatrix.com/hotel" class="btn btn-danger btn-lg navbar-btn">Hotel Sign in</a></li>-->
						<li><a id="hotel_sign_in_btn" href="https://enterprise.crimatrix.com/hotel" class="btn btn-danger btn-lg navbar-btn">Hotel Sign in</a></li>

                    </ul>
                </div>
            </div>
        </nav>
    <section>
        <div class="container">
            <div class="page-wrap">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <h2><span class="text-crimatrix">Mission</span> Objective</h2>
                    <h3>To build safer cities with <span class="text-crimatrix">real-time</span> police-public partnership</h3>
                    <div class="mission_detail_div">
                        <p class="mission_detail">Crimatrix is <span class="text-crimatrix">a community based real-time crime monitoring platform</span> for Police and citizens of Guwahati to harness the power of mobile and web technologies to monitor and prevent crimes in the city.</p>
                    </div>
                    <div class="mission_detail_div">
                        <p class="mission_detail">We use multiple mobile and web apps to <span class="text-crimatrix">collect, analyze and share real-time crime data</span> among police officers.</p>
                         <p class="mission_detail">Relevant crime data and alerts that could be useful to citizens, like <span class="text-crimatrix">crime trends, hotspots and repeat offenders</span> will be shared for public awareness and crime prevention.</p>
                    </div>
                    <img class="img-responsive" src="./assets/application/img/tagline.png">
                </div>
            </div>
        </div>
            <hr style="margin-top: 20px;margin-bottom: 40px;">
        <div class="page-wrap">
            <div class="row">
                <div class="col-xs-12 col-md-8">
                    <h2><span class="text-crimatrix">Vehicle Theft</span> SMS Reporting</h2>
                    <h3>Guwahati is one of the most <span class="text-crimatrix">targeted</span> city by vehicle lifters</h3>
                    <div class="mission_detail_div">
                        <p class="mission_detail">Considerable amount of time is lost from when the vehicle owner realizes the theft till a FIR is lodged and the information is transmitted to officers on field. By this time the stolen vehicle is already out of the city limits or perhaps the state border.</p>
                    </div>
                    <div class="mission_detail_div">
                        <p class="mission_detail">To minimize this time gap, you can now send an sms as soon as you realize the theft of your vehicle. The sms will immediately transmitted to all police officers on the field.</p>
                         <p class="mission_detail"><span class="text-crimatrix">Note: </span>FIR needs to be lodged to the nearest police station at the earliest.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4">
                    <div>
                        <h5><span class="label label-default">Send SMS To</span></h5>
                        <h3><span class="text-crimatrix">+91-7636874687</span></h3>
                    </div>
                    <hr>
                    <div>
                        <h5><span class="label label-default">To Report</span></h5>
                        <h4 style="font-family: inherit;">VT [Model],[RC NO.],[Color],[Location],[Last seen Time]</h4>
                        <span style="font-family: monospace;">Example: VT Pulsar, AS01XXXX,Black,Maligaon,8:00PM</span>
                    </div>

                    <div>
                        <h5><span class="label label-default">To Cancel Report (for police only)</span></h5>
                        <h4 style="font-family: inherit;">VT CANCEL [RC No.]</h4>
                        <span style="font-family: monospace;">Example: VT CANCEL AS01XXXX</span>
                    </div>

                    <div>
                        <h5><span class="label label-default">To Report Recovery(for police only)</span></h5>
                        <h4 style="font-family: inherit;">VT FOUND [RC No.]</h4>
                        <span style="font-family: monospace;">Example:VT FOUND AS01XXXX</span>
                    </div>
                </div>
            </div>
        </div>
            <hr style="margin-top: 40px;margin-bottom: 60px;">
        <div class="page-wrap">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                <h2>Hotel <span class="text-crimatrix">Guest List</span> Submission</h2>
                <div>
                    <h3>Crimatrix allows registered hotels and guest houses to submit their guest records in real-time</h3>
                    <p class="mission_detail">As per The Sarais Act , all hotels and guest houses are required to submit their guest lists to the nearest police station everyday.
                    <span class="text-crimatrix">The Sarais Act, 1867 </span>[<a href="/docs/SaraisAct1867.pdf" target="_blank">view full Act</a>]</p>
                    <p class="mission_detail">Crimatrix now allows registered hotels and guest houses to submit the guest record in real-time from an internet connected computer instead of written reports. Crimatrix then cross checks the data immediately with available crime records and alerts the nearest police station if any match is found. Concerned officer will then alert the manager and provide further instructions. This helps in crime prevention and detection.</p>
                    <p class="dm_order">"The District Magistrate Kamrup (Metro) has instructed vide order dated 31st July 2013, that all hotels , guest houses and lodges shall submit their respective borders' lists online on Crimatrix.com." [<a href="https://crimatrix.com/order.php" target="_blank">view order</a>]</p>
                </div>
                </div>
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

    <script type="text/javascript">
    $('.page-wrap').css('min-height',$(window).height()/3);
    </script>
</body>
</html>
