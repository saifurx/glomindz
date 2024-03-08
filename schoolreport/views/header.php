<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <title>School Report: School management made easy</title>
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

        <link href="<?php echo URL; ?>assets/apps/css/apps.css" rel="stylesheet">

        <link href="<?php echo URL; ?>assets/bootstrap/css/bootstrap-responsive.css"	rel="stylesheet">
        <link href="<?php echo URL; ?>assets/jquery/css/jquery-ui.min.css" rel="stylesheet">



    </head>
<style>
<!--

.logo{
font-size: 20px;
color: #b5eb83;
}
-->
</style>
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
                    <?php if (Session::get('loggedIn') == true): ?>
                        <a class="brand" href="#" title="schoolreport: school management made easy"><strong><span class="logo">School</span>Report.in</strong></a>
                    <?php endif; ?>
                    <div class="nav-collapse collapse">
                        <?php if (Session::get('loggedIn') == true): ?>
                            <?php if (Session::get('user_type') == 'general' && Session::get('status') == 1): ?>
                                <ul class="nav">
                                    <li id="dashboard_hotel_li"><a href="<?php echo URL;?>student">Dashboard</a></li>
                                </ul>

                            <?php endif; ?>
                            
                            <?php if (Session::get('user_type') == 'teacher' && Session::get('status') == 1): ?>
                                <ul class="nav">
                                    <li id="dashboard_teacher_li"><a href="<?php echo URL;?>teacher">Student</a></li>
                                    
                                    
                                </ul>
                            <?php endif; ?>

                            <?php if (Session::get('user_type') == 'admin' && Session::get('status') == 1): ?>
                                <ul class="nav">
                                    <li id="student_nav" ><a href="<?php echo URL; ?>admin">Student</a></li>
                                    <li id="facuty_nav"><a href="<?php echo URL; ?>admin/faculty">Faculty</a></li>
                                    <li id="fee_nav"><a href="<?php echo URL; ?>admin/fee_structure">Fees Structure</a></li>
                                    
                                </ul>
                            <?php endif; ?>
                            <ul class="nav pull-right">
                                <?php if (Session::get('user_type') == 'admin' && Session::get('status') == 1): ?>
                                   <li id="setting_dropdown_li" class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog icon-white"></i> Settings <b class="caret" style=" margin-top: 8px;"></b></a>
                                        <ul class="dropdown-menu" role="menu" aria-labelledby="drop2">
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo URL; ?>admin/notification">Notice Board</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo URL; ?>admin/exam">Exam Board</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo URL; ?>admin/result">Result Board</a></li>
                                        </ul>
                                    </li>
                                    <li id="admin_profile_li"><a href="<?php echo URL; ?>admin/profile" class="navbar-link" title="Logged in as"><i class="icon-user icon-white"></i> <?php echo Session::get("name"); ?></a></li>
                                <?php endif; ?>
                                <?php if (Session::get('user_type') == 'general' && Session::get('status') == 1): ?>
                                    <li id="general_profile_li"><a href="<?php echo URL; ?>student/profile" class="navbar-link" title="Logged in as"><i class="icon-user icon-white"></i> <?php echo Session::get("name"); ?></a></li>
                                <?php endif; ?>
                                <li><a class="pull-right" href="<?php echo URL; ?>user_service/logout" title="Sign Out"><i class="icon-off icon-white"></i> Sign Out</a></li>
                            </ul>
                            <?php endif; ?>  
                            <?php if (Session::get('loggedIn') == false): ?>
                            <ul class="nav" id="nav_list">
                                <li ><a class="brand" href="<?php echo URL;?>"><strong><span class="logo">School</span>Report.in</strong></a></li>
                                
                            </ul>
                            
                        

                        <?php endif; ?>
                         	
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>    
        
        