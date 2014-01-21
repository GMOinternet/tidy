<?php
/**
 * Tidy Theme Customizer
 *
 * @package Tidy
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function tidy_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'logo_toggle' )->transport = 'postMessage';
	$wp_customize->get_setting( 'logo_image' )->transport = 'postMessage';
	$wp_customize->get_setting( 'copyright' )->transport = 'postMessage';

//	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'tidy_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function tidy_customize_preview_js() {
	wp_enqueue_script( 'tidy_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'tidy_customize_preview_js' );

/**
 * get_tiry_option_name
 * @param   String  Key
 * @return  String  propaty name
 */

function get_tiry_option_name( $key = null ) {
	if ( !empty( $key ) ) {
		return 'theme_mods_'.get_stylesheet().'['.$key.']';
	} else {
		return 'theme_mods_'.get_stylesheet();
	}
}

function tidy_customize_setup( $wp_customize ) {

	// = header logo.
	$wp_customize->add_setting( get_tiry_option_name( 'logo_toggle' ), array(
		'default'    => '0',
		'type'       => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, get_tiry_option_name( 'logo_toggle' ), array(
		'label'    => __( 'Show Header logo', 'tidy' ),
		'section'  => 'title_tagline',
		'settings' => get_tiry_option_name( 'logo_toggle' ),
		'type'     => 'radio',
		'choices'  => array(
			'1' => __( 'On', 'tidy' ),
			'0' => __( 'Off', 'tidy' )
		),
	) ) );
	
	$wp_customize->add_setting( get_tiry_option_name( 'logo_image' ), array(
		'default'    => get_template_directory_uri() . '/images/logo-sample.png',
		'type'       => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, get_tiry_option_name( 'logo_image' ), array(
		'label'    => __( 'Header logo image', 'tidy' ),
		'section'  => 'title_tagline',
		'settings' => get_tiry_option_name( 'logo_image' ),
	)));

	// = Text Input for Copyright
	$wp_customize->add_setting( get_tiry_option_name( 'copyright' ), array(
		'default'           => '&copy; ' . get_bloginfo( 'name', 'display' ) . '. All Rights Reserved.',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));

	$wp_customize->add_control( get_tiry_option_name( 'copyright' ), array(
		'label'      => __( 'Copyright', 'tidy' ),
		'section'    => 'title_tagline',
		'settings'   => get_tiry_option_name( 'copyright' ),
	));

	// = favicon.
	$wp_customize->add_setting( get_tiry_option_name( 'favicon' ), array(
		'type'       => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, get_tiry_option_name( 'favicon' ), array(
		'label'    => __( 'Favicon', 'tidy' ),
		'section'  => 'title_tagline',
		'settings' => get_tiry_option_name( 'favicon' ),
	)));

	/**
	 * customize for Header.
	 */
	$wp_customize->add_section( 'tidy_header_scheme', array(
		'title'    => __('Header Scheme', 'tidy'),
		'priority' => 200,
	));

	// = Color Picker for header background color.
	$wp_customize->add_setting( get_tiry_option_name( 'header_bg_color' ), array(
		'default'           => '2ba6cb',
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, get_tiry_option_name( 'header_bg_color' ), array(
		'label'    => __('Background Color', 'tidy'),
		'section'  => 'tidy_header_scheme',
		'settings' => get_tiry_option_name( 'header_bg_color' ),
	)));

	// = Color Picker for header text color.
	$wp_customize->add_setting( get_tiry_option_name( 'header_text_color' ) , array(
		'default'           => 'ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, get_tiry_option_name( 'header_text_color' ), array(
		'label'    => __('Text Color', 'tidy'),
		'section'  => 'tidy_header_scheme',
		'settings' => get_tiry_option_name( 'header_text_color' )	,
	)));


	/**
	 * customize for footer.
	 */
	$wp_customize->add_section( 'tidy_footer_scheme', array(
		'title'    => __('Footer Scheme', 'tidy'),
		'priority' => 210,
	));


	// = Color Picker for footer background color.
	$wp_customize->add_setting( get_tiry_option_name( 'footer_bg_color' ), array(
		'default'           => '333333',
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, get_tiry_option_name( 'footer_bg_color' ), array(
		'label'    => __('Background Color', 'tidy'),
		'section'  => 'tidy_footer_scheme',
		'settings' => get_tiry_option_name( 'footer_bg_color' ),
	)));

	// = Color Picker for footer text color.
	$wp_customize->add_setting( get_tiry_option_name( 'footer_text_color' ) , array(
		'default'           => 'cccccc',
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, get_tiry_option_name( 'footer_text_color' ), array(
		'label'    => __('Text Color', 'tidy'),
		'section'  => 'tidy_footer_scheme',
		'settings' => get_tiry_option_name( 'footer_text_color' )	,
	)));

	// = Color Picker for footer link color.
	$wp_customize->add_setting( get_tiry_option_name( 'footer_link_color' ) , array(
		'default'           => 'ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, get_tiry_option_name( 'footer_link_color' ), array(
		'label'    => __('Link Color', 'tidy'),
		'section'  => 'tidy_footer_scheme',
		'settings' => get_tiry_option_name( 'footer_link_color' )	,
	)));

}
add_action( 'customize_register', 'tidy_customize_setup' );

/**
 * Preview Style
 */
add_action( 'wp_head', 'tidy_customize_style' );
function tidy_customize_style() {
	$options = get_theme_mods();
	?>
	<style type="text/css" id="tidy_customize_style">
		<?php if ( !empty( $options['header_bg_color'] ) ) : ?>
		.site-header {
			background-color: <?php echo esc_html( $options['header_bg_color'] ); ?>;
		}
		<?php endif; ?>
		<?php if ( !empty( $options['header_text_color'] ) ) : ?>
		.site-header, .site-header a, .site-description {
			color: <?php echo esc_html( $options['header_text_color'] ); ?>;
		}
		<?php endif; ?>
		<?php if ( !empty( $options['footer_bg_color'] ) ) : ?>
		.site-footer {
			background-color: <?php echo esc_html( $options['footer_bg_color'] ); ?>;
		}
		<?php endif; ?>
		<?php if ( !empty( $options['footer_text_color'] ) ) : ?>
		.site-footer {
			color: <?php echo esc_html( $options['footer_text_color'] ); ?>;
		}
		<?php endif; ?>
		<?php if ( !empty( $options['footer_link_color'] ) ) : ?>
		.site-footer a {
			color: <?php echo esc_html( $options['footer_link_color'] ); ?>;
		}
		<?php endif; ?>
	</style>
<?php
}

