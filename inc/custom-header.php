<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...

	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>

 *
 * @package Tidy
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * @uses tidy_header_style()
 * @uses tidy_admin_header_style()
 * @uses tidy_admin_header_image()
 *
 * @package Tidy
 */
function tidy_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'tidy_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '1C1C1C',
		'width'                  => 1200,
		'height'                 => 300,
		'flex-height'            => true,
		'wp-head-callback'       => 'tidy_header_style',
		'admin-head-callback'    => 'tidy_admin_header_style',
		'admin-preview-callback' => 'tidy_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'tidy_custom_header_setup' );

if ( ! function_exists( 'tidy_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see tidy_custom_header_setup().
 */
function tidy_header_style() {
	$header_image = get_header_image();
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	if ( empty( $header_image ) && $header_text_color == get_theme_support( 'custom-header', 'default-text-color' ) )
		return;

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		if ( ! empty( $header_image ) ) :
	?>
		.site-header {
			background: url(<?php header_image(); ?>) no-repeat scroll top center;
			background-size: cover;
		}

	<?php
		endif;

		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo $header_text_color; ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // tidy_header_style

if ( ! function_exists( 'tidy_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see tidy_custom_header_setup().
 */
function tidy_admin_header_style() {
?>
	<style type="text/css">
		.appearance_page_custom-header #headimg {
			border: none;
		}
		#headimg h1,
		#desc {
		}
		#headimg h1 {
		}
		#headimg h1 a {
			color: #0058AE;
			text-decoration: none;
		}
		#headimg h1 a:hover {
			text-decoration: underline;
		}
		#desc {
		}
		#headimg img {
		}
	</style>
<?php
}
endif; // tidy_admin_header_style

if ( ! function_exists( 'tidy_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see tidy_custom_header_setup().
 */
function tidy_admin_header_image() {
	$style = sprintf( ' style="color:#%s;"', get_header_textcolor() );
?>
	<div id="headimg" style="background: url(<?php header_image(); ?>) no-repeat scroll top center; background-size: cover;">
		<h1 class="displaying-header-text"><a id="name" onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div class="displaying-header-text" id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
	</div>
<?php
}
endif; // tidy_admin_header_image
