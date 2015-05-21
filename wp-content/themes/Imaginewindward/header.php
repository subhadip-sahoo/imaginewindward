<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Imagine_windward
 * @since Imagine windward 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/moderniz.js"></script>
<link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo get_template_directory_uri(); ?>/css/responsive.css" rel="stylesheet" type="text/css">
<link href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.css" rel="stylesheet" type="text/css">
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/tinynav.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/nivo-slider.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.nivo.slider.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/fancybox/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/fancybox/jquery.fancybox.js?v=2.1.4"></script>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/fancybox/jquery.fancybox.css?v=2.1.4" media="screen" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/flexslider.css" type="text/css" media="screen" />
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.anchor.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#slider').nivoSlider({
		effect:'fade',
		//animSpeed:1500,
		//pauseTime:7000
	});
	$('.fancybox').fancybox();
});
</script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.flexslider.js"></script>
<script type="text/javascript">
$(window).load(function() {	
	$('#carousel').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 210,
    itemMargin: 5,
    asNavFor: '#slider1'
  });
   
  $('#slider1').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    sync: "#carousel"
  });
});
</script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- HEADER SECTION -->
<div id="header_section">
  <header class="clearfix">
    <figure>
	<?php if ( get_header_image() ) : ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>" alt="" /></a>
		<?php endif; ?>
	</figure>
    <aside>
      <div class="callbox">239.989.6066</div>
      <div class="dashbox">-</div>
      <div class="socialbox">
        <ul>
          <li><a href="https://www.facebook.com/" target="new"><i class="fa fa-facebook"></i></a></li>
          <li><a href="https://www.twitter.com/" target="new"><i class="fa fa-twitter"></i></a></li>
          <li><a href="https://plus.google.com/" target="new"><i class="fa fa-google-plus"></i></a></li>
          <li><a href="https://www.linkedin.com/" target="new"><i class="fa fa-linkedin"></i></a></li>
        </ul>
      </div>
      <div class="logbox">
          <?php
                if(is_user_logged_in()){
          ?>
          <a href="<?php echo site_url();?>/agent-logout/" title="Logout">Logout</a>
          <?php
                }else{
          ?>
          <a href="<?php echo site_url();?>/agent-login/">Login</a> | <a href="<?php echo site_url();?>/register/">Register</a>
          <?php
                }
          ?>
      </div>
    </aside>
  </header>
</div>
<!-- /HEADER SECTION --> 
<!-- NAVIGATION SECTION -->
<div id="navigation_section">
  <nav class="clearfix">
    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'menu_id' => 'nav', 'container' => '' ) ); ?>
  </nav>
</div>
<!-- /NAVIGATION SECTION --> 
<?php if(is_home() || is_front_page()) { ?>
<!-- BANNER SECTION -->
<div id="banner_section">
  <section class="clearfix">
    <div class="slider-wrapper">
        <div id="slider" class="nivoSlider"> 
            <img src="<?php echo get_template_directory_uri(); ?>/images/slide-01.jpg" alt="" title="#htmlcaption01"> 
            <img src="<?php echo get_template_directory_uri(); ?>/images/slide-02.jpg" alt="" title="#htmlcaption01"> 
            <img src="<?php echo get_template_directory_uri(); ?>/images/slide-03.jpg" alt="" title="#htmlcaption01"> 
        </div>
        <div id="htmlcaption01" class="nivo-html-caption">
            <h1><span>Imagine your loving </span>dream home...</h1>
        </div>
    </div>
  </section>
</div>
<!-- /BANNER SECTION --> 
<?php } ?>
