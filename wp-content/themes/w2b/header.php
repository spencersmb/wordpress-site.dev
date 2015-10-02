<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootstrap_to_Wordpress
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bootstrap2wordpress' ); ?></a>

  <!-- HEADER
  ================================================== -->
  <header class="site-header" role="banner">

    <!-- NAVBAR
	  ================================================== -->
    <div class="navbar-wrapper">
      <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php bloginfo('url'); ?>">
              <?php if(get_theme_mod('wpt_logo') != ""): ?>
               <img src="<?php echo get_theme_mod('wpt_logo'); ?>" alt="<?php bloginfo('title') ?>">
              <?php endif; ?>

            </a>
          </div>

          <?php wp_nav_menu( array(

            'theme_location'  => 'primary',
            'container'       => 'nav',
            'container_class' => 'navbar-collapse',
            'menu_class'      => 'nav navbar-nav navbar-right'

//              <div class="navbar-collapse collapse">
//            <ul class="nav navbar-nav navbar-right">
//              <li class="active"><a href="index.html">Home</a></li>
//              <li><a href="blog.html">Blog</a></li>
//              <li><a href="resources.html">Resources</a></li>
//              <li><a href="contact.html">Contact</a></li>
//            </ul>
//          </div>

          )); ?>


        </div>
      </div>
    </div>

  </header>

	<div id="content" class="site-content">
