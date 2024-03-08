<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <title>Crimatrix: A real-time crime monitoring platform</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Crimatrix is a community powered real-time crime monitoring platform for the police department to harness the power of crowd to monitor and prevent crimes in the city.">
        <meta name="author" content="">
        <link rel="shortcut icon" href="<?php echo URL; ?>assets/bootstrap/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo URL; ?>assets/bootstrap/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo URL; ?>assets/bootstrap/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo URL; ?>assets/bootstrap/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo URL; ?>assets/bootstrap/ico/apple-touch-icon-57-precomposed.png">


        <script src="<?php echo URL; ?>assets/jquery/js/jquery.js"></script>
        <script	src="<?php echo URL; ?>assets/jquery/js/jquery-ui.min.js"></script>
        <script src="<?php echo URL; ?>assets/bootstrap/js/bootstrap.js"></script>
        <script src="<?php echo URL; ?>assets/apps/js/timepicker.js"></script>

        <link href="<?php echo URL; ?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">

        <link href="<?php echo URL; ?>assets/apps/css/crimatrix.css" rel="stylesheet">

        <link href="<?php echo URL; ?>assets/bootstrap/css/bootstrap-responsive.css"	rel="stylesheet">
        <link href="<?php echo URL; ?>assets/jquery/css/jquery-ui.min.css" rel="stylesheet">
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36940561-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script id="_webengage_script_tag" type="text/javascript">
  window.webengageWidgetInit = window.webengageWidgetInit || function(){
    webengage.init({
      licenseCode:"11b564287"
    }).onReady(function(){
      webengage.render();
    });
  };

  (function(d){
    var _we = d.createElement('script');
    _we.type = 'text/javascript';
    _we.async = true;
    _we.src = (d.location.protocol == 'https:' ? "//ssl.widgets.webengage.com" : "//cdn.widgets.webengage.com") + "/js/widget/webengage-min-v-3.0.js";
    var _sNode = d.getElementById('_webengage_script_tag');
    _sNode.parentNode.insertBefore(_we, _sNode);
  })(document);
</script>
    </head>

    <body>
        <?php Session::init(); ?>
        <div class="navbar navbar-inverse navbar-fixed-top hidden-print">
            <div class="navbar-inner">
                <div class="container">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?php if (Session::get('loggedIn') == false): ?>
                        <a class="brand" title="Crimatrix: A real-time crime monitoring platform" href="#section1"><img alt="Crimatrix" src="<?php echo URL; ?>assets/apps/img/logo_name48px.png"></a>
                    <?php endif; ?>
                    <?php if (Session::get('loggedIn') == true): ?>
                        <a class="brand" href="#" title="Crimatrix: A real-time crime monitoring platform"><img alt="Crimatrix" src="<?php echo URL; ?>assets/apps/img/logo_name48px.png" ></a>
                    <?php endif; ?>
                    <div class="nav-collapse collapse">
                        <?php if (Session::get('loggedIn') == true): ?>
                            <?php if (Session::get('user_type') == 'hotel' && Session::get('status') == 1): ?>
                                <ul class="nav">
                                    <li id="dashboard_hotel_li"><a href="<?php echo URL; ?>hotel">Dashboard</a></li>
                                </ul>

                            <?php endif; ?>

                            <?php if (Session::get('user_type') == 'police' && Session::get('status') == 1): ?>
                                <ul class="nav">
                                    <li id="dashboard_police_li"><a href="<?php echo URL; ?>police">Dashboard</a></li>
                                    <li id="hotels_li"><a href="<?php echo URL; ?>police/hotels_n_lodges">Hotels & Lodges</a></li>
                                    <li id="crime_li"><a href="<?php echo URL; ?>police/crime">Crime</a></li>
                                    <li id="arrests_li"><a href="<?php echo URL; ?>police/arrests">Arrests</a></li>
                                    <li id="watchlist_li"><a href="<?php echo URL; ?>police/watch_list">Watch List</a></li>
                                </ul>
                            <?php endif; ?>
                            <ul class="nav pull-right">
                                <?php if (Session::get('user_type') == 'police' && Session::get('status') == 1): ?>
                                <?php if (Session::get('role') == 'admin'): ?>
                                    <li id="setting_dropdown_li" class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog icon-white"></i> Settings <b class="caret" style=" margin-top: 20px;"></b></a>
                                        <ul class="dropdown-menu" role="menu" aria-labelledby="drop2">
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo URL; ?>police/police_users">Police Users</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo URL; ?>police/hotels_users">Hotels Users</a></li>
                                        </ul>
                                    </li>
                                    <?php endif; ?>
                                    <li id="police_profile_li"><a href="<?php echo URL; ?>police/profile" class="navbar-link" title="Logged in as"><i class="icon-user icon-white"></i> <?php echo Session::get("name"); ?></a></li>
                                <?php endif; ?>
                                <?php if (Session::get('user_type') == 'hotel' && Session::get('status') == 1): ?>
                                    <li id="hotel_profile_li"><a href="<?php echo URL; ?>hotel/profile" class="navbar-link" title="Logged in as"><i class="icon-user icon-white"></i> <?php echo Session::get("name"); ?></a></li>
                                <?php endif; ?>
                                <li><a class="pull-right" href="<?php echo URL; ?>user_service/logout" title="Sign Out"><i class="icon-off icon-white"></i> Sign Out</a></li>
                            </ul>

                        <?php endif; ?>
                        <?php if (Session::get('loggedIn') == false): ?>
                            <ul class="nav" id="nav_list">
                                <li id="for_citizen_li"><a href="#section2">For Citizen</a></li>
                                <li id="forHotel_li"><a href="#section3">For Hotel</a></li>
                                <!--  <li id="for_police_li"><a href="#section4">For Police</a></li>-->
                                <li id="about_li"><a href="#section5">About</a></li>
                                <li id="contact_li"><a href="#section6">Contact</a></li>
                            </ul>
                            <ul class="nav pull-right">
                                <li class="dropdown active" id="sign_in_dropdown_li">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-off icon-white"></i> Sign In <b class="caret" style="margin-top: 20px;"></b></a>
                                    <ul class="dropdown-menu well span3" id="sign_in_div">
                                        <li>
                                            <form id="sign_in" method="POST" action="<?php echo URL; ?>user_service/login/" accept-charset="UTF-8" style="margin-bottom: 0px;">
                                                <label>Email or Mobile</label>
                                                <input class="span3" type="text" placeholder="Email or Mobile" name="user">
                                                <label>Password</label>
                                                <input class="span3" type="password" placeholder="Password" name="password">
                                                <input type="text" class="span3" id="login_fail" disabled="disabled" value="Username or Password are incorrect.">
                                                <input class="span3" type="hidden" name="ip_address" value="127.0.0.1">
                                                <input class="span3" type="hidden" name="location" value="GUWAHATI">
                                                <button class="btn btn-danger" type="submit">Sign In</button>
                                                <a href="#forgetpasswdModal" role="button" data-toggle="modal" class="pull-right" style="margin-top: 10px;">Forgot Password ?</a>
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
        <div id="forgetpasswdModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 id="myModalLabel">Forgot Password</h3>
            </div>
            <div class="modal-body">
                <h4>Please enter your registered email below.</h4>
                <div class="input-append">
                    <input type="email" class="input-xlarge" id="forgetpasswdEmail" placeholder="Email" required>
                    <button class="btn btn-primary" type="button" id="submit_form">Submit</button>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                var current_url = "<?php echo URL; ?>";
                var url = current_url + '?loginFailed';
                if (document.URL == url) {
                    $('#sign_in_dropdown_li').addClass('dropdown open');
                    $('#login_fail').show();
                    setTimeout(function() {
                        $("#login_fail").slideUp(500);
                    }, 2500);
                }

                $('html, body').stop().animate({
                    scrollTop: 0
                }, 1, 'easeInOutExpo');
            });


            $('#submit_form').click(function() {
                var email = $('#forgetpasswdEmail').val();
                if (email.length == 0) {
                    alert('Please give your regiestered email');
                }
                else {
                    $('#submit_form').attr('disabled', true);
                    $.ajax({
                        url: '<?php echo URL; ?>user_service/recover_password/',
                        type: 'POST',
                        data: {email: email},
                        success: function(data) {
                            alert(data);
                            $('#forgetpasswdModal').modal('hide');
                            //$('#forgetpasswdEmail').val('');
                            //$('#submit_form').attr('disabled',false);
                        }
                    });
                }
            });
        </script>