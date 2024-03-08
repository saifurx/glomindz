<html>
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
				<meta name="description" content="Crimatrix for hotel.">
				<meta name="keywords" content="Assam Police, Crimatrix">
				<link rel="shortcut icon" href="https://police.crimatrix.com/assets/img/favicon.ico" type="image/x-icon">
				<link rel="icon" href="https://police.crimatrix.com/assets/img/favicon.ico" type="image/x-icon">


        <title>Crimatrix for hotel</title>
				<link media="all" type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
				<link media="all" type="text/css" rel="stylesheet" href="https://cdn.datatables.net/plug-ins/1.10.13/features/mark.js/datatables.mark.min.css">
				  <!-- css -->
  	    {{ HTML::style('packages/bootstrap/css/bootstrap.min.css') }}
        {{ HTML::style('css/bootstrapValidator.min.css')}}
        {{ HTML::style('css/alertify.core.css')}}
        {{ HTML::style('css/alertify.bootstrap3.css')}}
  	    {{ HTML::style('css/app.css')}}
        <!-- js -->
        {{ HTML::script('js/jquery.min.js');}}
        {{ HTML::script('packages/bootstrap/js/bootstrap.min.js');}}
        {{ HTML::script('js/bootstrapValidator.min.js');}}
		    {{ HTML::script('js/moment.min.js');}}
        {{ HTML::script('js/alertify.min.js');}}
				<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
				<script src="https://cdn.datatables.net/plug-ins/1.10.13/features/mark.js/datatables.mark.js"></script>
			  <script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.9.0/jquery.mark.js"></script>

				<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-96604514-1', 'auto');
		  ga('send', 'pageview');

		</script>
	</head>
    <body>
        @section('navbar')
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
                    <a class="navbar-brand" href="{{URL::to('hotel')}}">
                        <img id="logo_image" class="img-responsive" src="{{asset('img/logo.png')}}" alt="Crimatrix Logo">
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                    @if(Auth::check())

                        <li id="guestlist_li"><a href="{{URL::to('hotel/guestlist')}}">Guestlist</a></li>
												@if(Auth::user()->role == 'admin')
												<li id="reg_hotel_users_li"><a href="{{URL::to('hotel/admin/hotels')}}">Registerd Hotels</a></li>
												<li id="reg_hotel_users_li"><a href="{{URL::to('hotel/admin/paymentdetails')}}">Payment Details</a></li>

												@endif
											  <!--	<li id="reports_li"><a href="{{URL::to('hotel/reports')}}">Reports</a></li>-->
                        <!--<li id="watchlist_li"><a href="#">Watchlist</a></li>-->
                    @endif
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                    @if(Auth::check())
												<li id="faq_li" class="text-danger"><a href="{{URL::to('hotel/faq')}}">FAQ</a></li>
												<li id="payment_li" class="text-danger"><a href="{{URL::to('hotel/subcribe')}}">Subcribe</a></li>
												<li id="invoice_li" class="text-danger"><a href="{{URL::to('hotel/invoice')}}">Invoice</a></li>
												<li id="profile_li"><a href="{{URL::to('hotel/profile')}}">Profile</a></li>
                        <li>{{ HTML::link('hotel/users/logout', 'Logout') }}</li>
                      @endif
											<li class="alert alert-success" role="alert"><b>Support: </b><span class="glyphicon glyphicon-phone-alt" aria-hidden="true">  </span> 9401915865</li>

                    </ul>
                </div>
            </div>
        </nav>
        @show
        <section>
            @yield('content')
        </section>
        @section('footer')
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
													<span class="text-muted"><a href="https://crimatrix.com/about.php" target="_blank">About</a></span>
													<span class="text-muted"> | </span>
													<span class="text-muted"><a href="https://crimatrix.com/contact.php" target="_blank">Contact</a></span>
													<span class="text-muted"> | </span>
													<span class="text-muted"><a href="https://crimatrix.com/ip.php" target="_blank">IPR Complaints</a></span>
													<span class="text-muted"> | </span>
													<span class="text-muted"><a href="https://crimatrix.com/terms_n_condition.php" target="_blank">Terms of Service</a></span>
													<span class="text-muted"> | </span>
													<span class="text-muted"><a href="https://crimatrix.com/privacy.php" target="_blank">Privacy Policy</a></span>
											</p>
										</div>
								</div>
						</div>
				</div>
    </body>
</html>
