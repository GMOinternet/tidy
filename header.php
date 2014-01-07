<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Tidy
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'tidy_before_body' ); ?>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">

		<?php do_action( 'tidy_before_header' ); ?>

		<div id="site-header-widget" class="site-header-widget-area"><div class="inner">
			<div class="site-header-widget-area-content">Eeh what's that when it's at ooam big girl's blouse ah'll learn thi ey up. Click here.</div>
			<div class="header-widget-area-close-btn header-widget-toggle"><span class="genericon genericon-close"></span></div>
		</div></div>

		<div id="site-social" class="site-header-social-area"><div class="inner">
			<h1 class="sns-toggle"><?php _e( 'Social', 'tidy' ); ?><span class="genericon genericon-downarrow"></span></h1>
			<ul class="sns-icons">
				<li><a href="#"><span class="icon-facebook"></span></a></li>
				<li><a href="#"><span class="icon-twitter"></span></a></li>
				<li><a href="#"><span class="icon-pinterest"></span></a></li>
				<li><a href="#"><span class="icon-flickr"></span></a></li>
				<li><a href="#"><span class="icon-linkedin"></span></a></li>
				<li><a href="#"><span class="icon-google-plus"></span></a></li>
				<li><a href="#"><span class="icon-tumblr"></span></a></li>
				<li><a href="#"><span class="icon-instagram"></span></a></li>
				<li><a href="#"><span class="icon-youtube"></span></a></li>
				<li><a href="#"><span class="icon-vimeo"></span></a></li>
				<li><a href="#"><span class="icon-lanyrd"></span></a></li>
				<li><a href="#"><span class="icon-picassa"></span></a></li>
				<li><a href="#"><span class="icon-dribbble"></span></a></li>
				<li><a href="#"><span class="icon-forrst"></span></a></li>
				<li><a href="#"><span class="icon-deviantart"></span></a></li>
				<li><a href="#"><span class="icon-steam"></span></a></li>
				<li><a href="#"><span class="icon-github"></span></a></li>
				<li><a href="#"><span class="icon-wordpress"></span></a></li>
				<li><a href="#"><span class="icon-soundcloud"></span></a></li>
				<li><a href="#"><span class="icon-skype"></span></a></li>
				<li><a href="#"><span class="icon-reddit"></span></a></li>
				<li><a href="#"><span class="icon-lastfm"></span></a></li>
				<li><a href="#"><span class="icon-delicious"></span></a></li>
				<li><a href="#"><span class="icon-stumbleupon"></span></a></li>
				<li><a href="#"><span class="icon-stackoverflow"></span></a></li>
				<li><a href="#"><span class="icon-flattr"></span></a></li>
				<li><a href="#"><span class="icon-yelp"></span></a></li>
				<li><a href="#"><span class="icon-foursquare"></span></a></li>
				<li><?php the_feed_link( '<span class="icon-feed"></span>'); ?></li>
			</ul>
		</div></div>

		<div class="site-header-main"><div class="inner">
	
			<div class="site-branding">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div>
	
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<h1 class="menu-toggle"><span class="screen-reader-text"><?php _e( 'Menu', 'tidy' ); ?></span><span class="genericon genericon-menu"></span></h1>
				<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'tidy' ); ?></a>
				<div class="main-navigation-box">
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</div>
			</nav><!-- #site-navigation -->
	
			<div id="search-container" class="search-container">
				<h1 class="search-toggle"><span class="screen-reader-text"><?php _e( 'Search', 'tidy' ); ?></span><span class="icon-search"></span></h1>
	
				<div class="search-box"><?php get_search_form(); ?></div>
			</div>

		</div></div>

		<?php do_action( 'tidy_after_header' ); ?>
	</header><!-- #masthead -->

	<?php do_action( 'tidy_before_content' ); ?>

	<div id="content" class="site-content">
