<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <title>Glomindz internal portal</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="<?php echo URL; ?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo URL; ?>assets/bootstrap/css/bootstrap-responsive.css"	rel="stylesheet">
        <link rel="stylesheet"	href="<?php echo URL; ?>assets/jquery/jquery-ui.css" />
        <link href="<?php echo URL; ?>assets/apps/css/apps.css" rel="stylesheet">
        <link rel="shortcut icon" href="<?php echo URL; ?>assets/bootstrap/ico/favicon.ico">

        <link href="<?php echo URL; ?>assets/apps/css/pagespecific.css" rel="stylesheet">

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo URL; ?>assets/bootstrap/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo URL; ?>assets/bootstrap/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo URL; ?>assets/bootstrap/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo URL; ?>assets/bootstrap/ico/apple-touch-icon-57-precomposed.png">

        <script src="<?php echo URL; ?>assets/jquery/jquery-1.9.1.js"></script>
        <script src="<?php echo URL; ?>assets/bootstrap/js/bootstrap.js"></script>
        <script src="<?php echo URL; ?>assets/apps/js/bootstrap-typeahead.js"></script>
        <script src="<?php echo URL; ?>assets/jquery/jquery-ui.js"></script>

        <style type="text/css">
            body {
                padding-top: 60px;
                padding-bottom: 4px;
                background-image: url("<?php echo URL; ?>assets/bootstrap/img/bg.png");
            }

            .sidebar-nav {
                padding: 9px 0;
            }

            div#timelinecontainer {
                width: 100%;
                height: 20%;
            }

            div#timeline {
                width: 100%;
                height: 100%;
                font-size: 12px;
                background: #CCCCCC;
            }

            div#mapcontainer {
                width: 100%;
                height: 80%;
            }

            #timemap {
                height: 650px;
            }

            div#map {
                width: 100%;
                height: 100%;
                background: #EEEEEE;
            }

            div.itemdata {
                font-size: 14px;
            }

            div.itemdata p {
                padding: 0;
                margin: .5em 0 0 0;
            }
        </style>
    </head>
    <body>
        <?php Session::init(); ?>
        <?php if (Session::get('loggedIn') == true): ?>
            <div class="navbar navbar-inverse navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container-fluid">
                        <a class="btn btn-navbar" data-toggle="collapse"
                           data-target=".nav-collapse"> <span class="icon-bar"></span> <span
                                class="icon-bar"></span> <span class="icon-bar"></span>
                        </a> <a class="brand" href="<?php echo URL; ?>"><img src="<?php echo URL; ?>assets/apps/img/logo.png" alt="Glomindz Software" class="logo" width="100px;"> </a>
                        <div class="nav-collapse collapse">
                            <p class="navbar-text pull-right">
                                <?php if (Session::get('role') == 'admin'): ?>


                                <p class="navbar-text pull-right">
                                    Logged in as <a href="<?php echo URL; ?>admin/profile" class="navbar-link"><?php echo Session::get("name"); ?>
                                    </a> | <a href="<?php echo URL; ?>admin/logout">Signout</a>


                                <ul class="nav">
                                    <li id="clients_li"><a href="<?php echo URL; ?>admin/clients">Clients</a></li>
                                    <li id="projects_li"><a href="<?php echo URL; ?>admin/projects">Projects</a></li>
                                    <li id="tasks_li"><a href="<?php echo URL; ?>admin/tasks">Tasks</a>
                                    </li>

                                    <li id="burndown_li"><a href="<?php echo URL; ?>admin/burndown">Burndown</a>
                                    </li>
                                    <li id="settings_li" class="dropdown"><a href="#"
                                                                             class="dropdown-toggle" data-toggle="dropdown">Admin </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?php echo URL; ?>admin/settings">Settings</a>
                                            </li>
                                            <li id="payments_li"><a href="<?php echo URL; ?>admin/payments">Payments</a>
                                            </li>

                                        </ul>
                                    </li>
                                </ul>
                            <?php endif; ?>
                            <?php if (Session::get('role') == 'user'): ?>


                                <p class="navbar-text pull-right">
                                    Logged in as <a href="<?php echo URL; ?>admin/profile" class="navbar-link"><?php echo Session::get("name"); ?>
                                    </a> | <a href="<?php echo URL; ?>admin/logout">Signout</a>


                                <ul class="nav">
                                    <li id="tasks_li"><a href="<?php echo URL; ?>admin/tasks">Tasks</a>
                                    </li>

                                    <li id="burndown_li"><a href="<?php echo URL; ?>admin/burndown">Burndown</a>
                                    </li>
                                </ul>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>