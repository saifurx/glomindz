<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Crimatrix for hotel.">
        <meta name="keywords" content="Assam Police, Crimatrix">


        <title>Crimatrix</title>
        <!-- css -->
        <link media="all" type="text/css" rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
        <link media="all" type="text/css" rel="stylesheet" href="./assets/bootstrapvalidator/css/bootstrapvalidator.min.css">
        <link media="all" type="text/css" rel="stylesheet" href="./assets/alertifyjs/css/alertifyjs.min.css">
        <link media="all" type="text/css" rel="stylesheet" href="./assets/application/css/app.css">
        <link media="all" type="text/css" rel="stylesheet" href="./assets/application/css/home.css">
        <!-- js -->
        <script src="./assets/jquery/js/jquery-2.1.1.min.js"></script>
        <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="./assets/bootstrapvalidator/js/bootstrapvalidator.min.js"></script>
        <script src="./assets/alertifyjs/js/alertifyjs.min.js"></script>
        <style type="text/css">
            #footer{
                position: absolute;
                bottom: 0;
            }
        </style>
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
                    <a class="navbar-brand" href="./">
                        <img id="logo_image" class="img-responsive" src="./assets/application/img/logo.png" alt="Crimatrix Logo">
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
                    <div class="col-xs-6 col-md-6">
                        <header><h2>Contact  us</h2></header>
                        <form role="form" id="contact_form">
                          <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter email">
                          </div>
                          <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email">
                          </div>
                          <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" class="form-control" name="mobile" maxlength="10" placeholder="Mobile Number">
                          </div>
                          <div class="form-group">
                            <label>Message</label>
                            <textarea class="form-control" rows="4" name="msg"></textarea>
                          </div>
                          <button type="button" class="btn btn-success pull-right" id="submitformbtn" onclick="submitform();">Submit</button>
                        </form>
                    </div>
                    <div class="col-xs-2 col-md-2"></div>
                    <div class="col-xs-4 col-md-4">
                      <br>
                      <br>
                      <br>
                      <br>
                      <p><h4>Glomindz Software (P) Ltd.</h4><br>
                         <h5>2nd Floor, 26/27, 3rd Bye Lane</h5>
                         <h5>Industrial Easte, Bamunimaidam, Guwahati-781021</h5>
                         Email: <small>sarfaraz.hassan[AT]glomindz.com</small><br>
                         Mobile: +91 8876698046
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
    <script>
        $(function(){
            $('form#contact_form').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: 'The name is required and can\'t be empty'
                            }
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'The email address is required and can\'t be empty'
                            },
                            emailAddress: {message: 'The input is not a valid email address'}
                        }
                    },
                    mobile: {
                        validators: {
                            notEmpty: {
                                message: 'The mobile is required and can\'t be empty'
                            },
                            digits: {
                                message: 'The value can contain only digits. Don\'t add +91'
                            },
                            stringLength: {
                                min: 10,
                                max: 10,
                                message: 'The name must be 10'
                            }
                        }
                    },
                     msg: {
                        validators: {
                            notEmpty: {
                                message: 'The message is required and can\'t be empty',
                            }
                        }
                    }
                }
            });
        });
        function submitform(){
            var res = $('form#contact_form').data('bootstrapValidator').validate();
            if(res.isValid() == true){
                var formData = $('form#contact_form').serializeArray();
                $('#submitformbtn').attr('disabled',true);
                $.ajax({
                    type: 'POST',
                    url: 'mail.php',
                    dataType: 'JSON',
                    data: formData,
                    success: function(data){
                        alertify.success("Add Successfully");
                        $('#submitformbtn').attr('disabled',false);
                        $('form#contact_form').each(function(){this.reset();});
                    }
                });
            }
        }
    </script>
</body>
</html>
