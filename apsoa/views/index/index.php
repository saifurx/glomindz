<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
         <title>ASOPA</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo URL; ?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo URL; ?>assets/font-awesome/css/font-awesome.css">
        <!-- Custom styles for this template -->

        <link href="<?php echo URL; ?>assets/apps/css/signin.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="<?php echo URL; ?>assets/apps/js/html5shiv.js"></script>
          <script src="<?php echo URL; ?>assets/apps/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            
            <form class="form-signin" role="form" action="<?php echo URL; ?>user_service/login" method="POST">

                <input type="text" class="form-control" name="username" placeholder="Email or Mobile" required autofocus>
                <input type="password" class="form-control" name="password" placeholder="Password" required>

                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>

        </div>
 
<div id="footer">
    <div class="container">
        <p class="text-muted">Design & Developed by Glomindz.</p>
    </div>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>