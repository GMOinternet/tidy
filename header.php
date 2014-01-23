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
			<div class="site-header-widget-area-content">
				<?php
					$tidy_default = tidy_default_array();
					$header_text = ( get_theme_mod( 'header_text' ) ) ? get_theme_mod( 'header_text' ) : $tidy_default['header_text'];
					echo wp_kses_post( $header_text );
				?>
			</div>
			<div class="header-widget-area-close-btn header-widget-toggle"><span class="genericon genericon-close"></span></div>
		</div></div>

		<?php $view_sns_header = of_get_option('sns-location-header'); ?>
		<?php if ( ( $view_sns_header === FALSE ) or ( $view_sns_header != 0 ) ) : ?>
		<div id="site-social" class="site-header-social-area"><div class="inner">
			<h1 class="sns-toggle"><?php _e( 'Social', 'tidy' ); ?><span class="genericon genericon-downarrow"></span></h1>
			<?php tidy_sns_lists(); ?>
		</div></div>
		<?php endif; ?>

		<div class="site-header-main"><div class="inner">
	
			<div class="site-branding">
				<?php
					$view_header_logo = get_theme_mod( 'logo_toggle' );
					$view_header_logo = ( ( $view_header_logo === false ) or ( $view_header_logo == 1 ) ) ? 1 : 0 ;
					$header_logo_img  = ( get_theme_mod( 'logo_image' ) === false ) ? $tidy_default['logo_image'] : get_theme_mod( 'logo_image' ) ;
					$logo_image = ( !empty($header_logo_img) && ( $view_header_logo == 1 ) ) ? '<img src="' . esc_url( $header_logo_img ) . '" alt="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '">' : esc_html( get_bloginfo( 'name', 'display' ) );
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo $logo_image ?></a></h1>
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
