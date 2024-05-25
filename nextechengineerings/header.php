<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nextechengineerings
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=devidev-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>software landing page</title>

    <!-- [ FONT-AWESOME ICON ] 
        =========================================================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/library/font-awesome-4.3.0/css/font-awesome.min.css" />

    <!-- [ PLUGIN STYLESHEET ]
        =========================================================================================================================-->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/icon.png" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/animate.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/owl.theme.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/magnific-popup.css" />
    <!-- [ Boot STYLESHEET ]
        =========================================================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/library/bootstrap/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/library/bootstrap/css/bootstrap.css" />
    <!-- [ DEFAULT STYLESHEET ] 
        =========================================================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/color/rose.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/contact.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <?php wp_head(); ?>
</head>
<nav class="nim-menu navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">next<span class="themecolor">ch</span>engineering</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" class="page-scroll">Home</a></li>
                <li><a href="#" class="page-scroll">About</a></li>
                <li><a href="#" class="page-scroll">Our Works</a></li>
                <li><a href="#" class="page-scroll">Team</a></li>
                <li><a href="#" class="page-scroll">Inspiration</a></li>
                <li><a href="#" class="page-scroll">Status</a></li>
                <li><a href="#" class="page-scroll">Testimonials</a></li>
                <li><a href="#" class="page-scroll">Services</a></li>
                <li><a href="#" class="page-scroll">Contact</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>