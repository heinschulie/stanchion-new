<?php

/**

 * The Header for our theme.

 *

 * Displays all of the <head> section and everything up till <div id="content">

 *

 * @package stanchion!

 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title><?php wp_title( '|', true, 'right' ); ?></title>

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link rel="profile" href="http://gmpg.org/xfn/11">

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!--[if lt IE 9]>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/ie.css" type="text/css">
<![endif]-->

<?php wp_head(); ?>

</head>



<?php if(isset($_POST['scrollPosition'])): ?>

	<body <?php body_class(); ?> onLoad="window.scrollTo(0,<?php echo intval($_POST['scrollPosition']); ?>)">

<?php else: ?>

	<body <?php body_class(); ?> >

<?php endif; ?>




<!-- =========================

   PRE LOADER

============================== -->
<?php
	
 global $wp_customize;

 if(is_front_page() && !isset( $wp_customize ) && get_option( 'show_on_front' ) != 'page' ): 
 
	$zerif_disable_preloader = get_theme_mod('zerif_disable_preloader');
	
	if( isset($zerif_disable_preloader) && ($zerif_disable_preloader != 1)):
		 
		echo '<div class="preloader">';
			echo '<div class="status">&nbsp;</div>';
		echo '</div>';
		
	endif;	

endif; ?>


<header id="home" class="header">

	<div id="main-nav" class="navbar navbar-inverse bs-docs-nav" role="banner">

		<div class="container">

			<div class="navbar-header responsive-logo">

				<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">

				<span class="sr-only"><?php _e('Toggle navigation','zerif-lite'); ?></span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>

				</button>



				<?php

					$zerif_logo = get_theme_mod('zerif_logo');

					if(isset($zerif_logo) && $zerif_logo != ""):

						echo '<a href="'.esc_url( home_url( '/' ) ).'" class="navbar-brand">';

							echo '<img src="'.$zerif_logo.'" alt="'.get_bloginfo('title').'">';

						echo '</a>';

					else:

						echo '<a href="'.esc_url( home_url( '/' ) ).'" class="navbar-brand">';
						
							if( file_exists(get_stylesheet_directory()."/images/logo.png")):
							
								echo '<img src="'.get_stylesheet_directory_uri().'/images/logo.png" alt="'.get_bloginfo('title').'">';
							
							else:
								
								echo '<img src="'.get_template_directory_uri().'/images/logo.png" alt="'.get_bloginfo('title').'">';
								
							endif;

						echo '</a>';

					endif;

				?>

			</div>

			<nav class="navbar-collapse bs-navbar-collapse collapse" role="navigation"   id="site-navigation">

				<ul class="nav navbar-nav navbar-right responsive-nav main-nav-list initial-navlist" >
					<li class="page_item page-item-12"><a href="http://batstone-stanchiondev.azurewebsites.net/#whatwedo">What We Do</a></li>
					<li class="page_item page-item-12"><a href="http://batstone-stanchiondev.azurewebsites.net/#results">Results</a></li>
					<li class="page_item page-item-12"><a href="http://batstone-stanchiondev.azurewebsites.net/#clients">Clients</a></li>
					<li class="page_item page-item-12"><a href="http://batstone-stanchiondev.azurewebsites.net/#howwethink">How We Think</a></li>
					<li class="page_item page-item-12"><a href="http://batstone-stanchiondev.azurewebsites.net/#aboutus">About Us</a></li>	
					<li class="page_item page-item-12"><a href="http://batstone-stanchiondev.azurewebsites.net/careers/">Careers</a></li>
					<li class="page_item page-item-12"><a href="http://batstone-stanchiondev.azurewebsites.net/team/">Team</a></li>
					<li class="page_item page-item-12"><a href="http://batstone-stanchiondev.azurewebsites.net/#contact">Contact</a></li>	
					<li><a target="_blank" href="'.esc_url(__($zerif_socials_twitter,'zerif-lite')).'"><i class="fa fa-twitter"></i></a></li>	
					<li><a target="_blank" href="'.esc_url(__($zerif_socials_linkedin,'zerif-lite')).'"><i class="fa fa-linkedin"></i></a></li>				
				</ul>
				
				<!-- This is commented out to avoid having page links dynamically added to the nav bar -->
				<!-- <?php wp_nav_menu( array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav navbar-right responsive-nav main-nav-list', 'fallback_cb'     => 'zerif_wp_page_menu')); ?> -->

			</nav>

		</div>

	</div>

	<!-- / END TOP BAR -->
