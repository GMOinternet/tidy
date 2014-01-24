<?php
/**
 * Tidy functions and definitions
 *
 * @package Tidy
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'tidy_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tidy_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Tidy, use a find and replace
	 * to change 'tidy' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'tidy', get_template_directory() . '/languages' );

	/**
	 * Enable support for Editor Style
	 */
	add_editor_style();

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'tidy-thumb-tiny', 80, 80, true);
	add_image_size( 'tidy-thumb-small', 125, 125, true);
	add_image_size( 'tidy-thumb-medium', 580, 580);
	add_image_size( 'tidy-meritbox', 370, 370);
	add_image_size( 'tidy-thumb-blog', 270, 180, true);
	add_image_size( 'tidy-thumb-portfolio', 270, 270, true);

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'tidy' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'gallery' ) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'tidy_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // tidy_setup
add_action( 'after_setup_theme', 'tidy_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function tidy_widgets_init() {
	$before_widget = '<aside id="%1$s" class="widget %2$s">';
	$after_widget  = '</aside>';
	$before_title  = '<h1 class="widget-title">';
	$after_title   = '</h1>';

	register_sidebar( array(
		'name'          => __( 'Sidebar', 'tidy' ),
		'id'            => 'sidebar-1',
		'before_widget' => $before_widget,
		'after_widget'  => $after_widget,
		'before_title'  => $before_title,
		'after_title'   => $after_title,
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'tidy' ),
		'id'            => 'footer-1',
		'before_widget' => $before_widget,
		'after_widget'  => $after_widget,
		'before_title'  => $before_title,
		'after_title'   => $after_title,
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 2', 'tidy' ),
		'id'            => 'footer-2',
		'before_widget' => $before_widget,
		'after_widget'  => $after_widget,
		'before_title'  => $before_title,
		'after_title'   => $after_title,
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 3', 'tidy' ),
		'id'            => 'footer-3',
		'before_widget' => $before_widget,
		'after_widget'  => $after_widget,
		'before_title'  => $before_title,
		'after_title'   => $after_title,
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 4', 'tidy' ),
		'id'            => 'footer-4',
		'before_widget' => $before_widget,
		'after_widget'  => $after_widget,
		'before_title'  => $before_title,
		'after_title'   => $after_title,
	) );

}
add_action( 'widgets_init', 'tidy_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tidy_scripts() {

	$tidy_info = wp_get_theme();
	$tidy_version = $tidy_info->get( 'Version' );

	wp_enqueue_style(
		'google-fonts',
		'http://fonts.googleapis.com/css?family=Open+Sans',
		array(),
		$tidy_version
	);

	wp_enqueue_style(
		'genericons',
		get_template_directory_uri() . '/genericons/genericons.min.css',
		array(),
		'3.0.2'
	);
	wp_enqueue_style(
		'iconmoon-tidy',
		get_template_directory_uri() . '/iconmoon-tidy/style.min.css',
		array(),
		$tidy_version
	);
	wp_enqueue_style(
		'tidy-style',
		get_stylesheet_uri(),
		array( 'google-fonts', 'genericons', 'iconmoon-tidy' ),
		$tidy_version
	);
	wp_enqueue_style(
		'tidy-mobile',
		get_template_directory_uri() . '/mobile.css',
		array( 'tidy-style' ),
		$tidy_version
	);

	wp_enqueue_script(
		'tidy-skip-link-focus-fix',
		get_template_directory_uri() . '/js/skip-link-focus-fix.js',
		array(),
		$tidy_version,
		true
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script(
		'jquery-cookie',
		get_template_directory_uri() . '/js/jquery.cookie.js',
		array( 'jquery' ) ,
		'1.4.0',
		true
	);

	wp_enqueue_script(
		'tidy-script',
		//get_stylesheet_directory_uri() . '/js/tidy.min.js',
		get_stylesheet_directory_uri() . '/js/tidy.js',
		array( 'jquery' ) ,
		$tidy_version,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'tidy_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Custom widgets for this theme.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/*
 * Loads the Theme Options Panel
 */

define( 'TIDY_ADMIN_DIRECTORY_URI',  get_template_directory_uri() . '/admin/' );
define( 'TIDY_ADMIN_DIRECTORY_PATH', get_template_directory() . '/admin/' );
require get_template_directory() . '/admin/options-framework.php';
require get_template_directory() . '/inc/custom-css.php';
