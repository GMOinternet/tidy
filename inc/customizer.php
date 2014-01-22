<?php
/**
 * Tidy Theme Customizer
 *
 * @package Tidy
 */

/**
 * tidy_sns_array
 * @param   none
 * @return  Array
 */
function tidy_sns_array() {
	$sns_array = array(
		'Facebook' => 'facebook',
		'Twitter' => 'twitter',
		'Pinterest' => 'pinterest',
		'Flickr' => 'flickr',
		'Linkedin' => 'linkedin',
		'Google+' => 'google-plus',
		'Tumblr' => 'tumblr',
		'Instagram' => 'instagram',
		'YouTube' => 'youtube',
		'Vimeo' => 'vimeo',
		'Lanyrd' => 'lanyrd',
		'Picasa' => 'picasa',
		'Dribbble' => 'dribbble',
		'Forrst' => 'forrst',
		'deviantART' => 'deviantart',
		'Steam' => 'steam',
		'GitHub' => 'github',
		'WordPress' => 'wordpress',
		'SoundCloud' => 'soundcloud',
		'Skype' => 'skype',
		'reddit' => 'reddit',
		'Last.fm' => 'lastfm',
		'Delicious' => 'delicious',
		'StumbleUpon' => 'stumbleupon',
		'Stack Overflow' => 'stackoverflow',
		'Flattr' => 'flattr',
		'Yelp' => 'yelp',
		'Foursquare' => 'foursquare'
	);
	return $sns_array;
}

/**
 * tidy_default_array
 * @param   none
 * @return  Array
 */
function tidy_default_array() {
	$tidy_default = array(
		'logo_image' => get_template_directory_uri() . '/images/logo-sample.png',
		'header_text' => __( 'Eeh what\'s that when it\'s at ooam big girl\'s blouse ah\'ll learn thi ey up. <a href="#">Click here.</a>', 'tidy' ),
		'copyright' => '&copy; ' . get_bloginfo( 'name', 'display' ) . '. All Rights Reserved.',
		
		'header_bg_color'     => '#E3E6EA',
		'header_text_color'   => '#1C1C1C',
		'header_anchor_color' => '#0058AE',
		'header_border_color' => '#CDD0D4'
	);
	return $tidy_default;
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function tidy_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_setting( 'logo_toggle' )->transport     = 'postMessage';
	$wp_customize->get_setting( 'logo_image' )->transport      = 'postMessage';
	$wp_customize->get_setting( 'copyright' )->transport       = 'postMessage';
	$wp_customize->get_setting( 'header_text' )->transport     = 'postMessage';

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

	$tidy_default = tidy_default_array();

	/**
	 * section for title_tagline.
	 */

	// = Text Input for Header text
	$wp_customize->add_setting( get_tiry_option_name( 'header_text' ), array(
		'default'    => $tidy_default['header_text'],
		'type'       => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( get_tiry_option_name( 'header_text' ), array(
		'label'      => __( 'Header text', 'tidy' ),
		'section'    => 'title_tagline',
		'settings'   => get_tiry_option_name( 'header_text' ),
	));

	// = Text Input for Copyright
	$wp_customize->add_setting( get_tiry_option_name( 'copyright' ), array(
		'default'    => $tidy_default['copyright'],
		'type'       => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( get_tiry_option_name( 'copyright' ), array(
		'label'      => __( 'Copyright', 'tidy' ),
		'section'    => 'title_tagline',
		'settings'   => get_tiry_option_name( 'copyright' ),
	));

	/**
	 * section for logo Settings.
	 */
	$wp_customize->add_section( 'tidy_logo_settings', array(
		'title'      => __( 'Logo settings', 'tidy' ),
		'priority'   => 35,
	));

	// = header toggle.
	$wp_customize->add_setting( get_tiry_option_name( 'logo_toggle' ), array(
		'default'    => '0',
		'type'       => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, get_tiry_option_name( 'logo_toggle' ), array(
		'label'      => __( 'Show Header logo', 'tidy' ),
		'section'    => 'tidy_logo_settings',
		//'priority'   => 15,
		'settings'   => get_tiry_option_name( 'logo_toggle' ),
		'type'       => 'radio',
		'choices'    => array(
			'1' => __( 'On', 'tidy' ),
			'0' => __( 'Off', 'tidy' )
		),
	) ) );
	
	// = header logo.
	$wp_customize->add_setting( get_tiry_option_name( 'logo_image' ), array(
		'default'    => $tidy_default['logo_image'],
		'type'       => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, get_tiry_option_name( 'logo_image' ), array(
		'label'      => __( 'Header logo image', 'tidy' ),
		'section'    => 'tidy_logo_settings',
		// 'priority'   => 21,
		'settings'   => get_tiry_option_name( 'logo_image' ),
	)));

	// = favicon.
	$wp_customize->add_setting( get_tiry_option_name( 'favicon' ), array(
		'type'       => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, get_tiry_option_name( 'favicon' ), array(
		'label'      => __( 'Favicon', 'tidy' ),
		'section'    => 'tidy_logo_settings',
		//'priority'   => 32,
		'settings'   => get_tiry_option_name( 'favicon' ),
	)));

	/**
	 * section for Header color Settings.
	 */
	$wp_customize->add_section( 'tidy_color_settings_header', array(
		'title'      => __( 'Header color settings', 'tidy' ),
		'priority'   => 200,
	));

	// = Color Picker for header background color.
	$wp_customize->add_setting( get_tiry_option_name( 'header_bg_color' ), array(
		'default'           => $tidy_default['header_bg_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, get_tiry_option_name( 'header_bg_color' ), array(
		'label'      => __( 'Header background color', 'tidy' ),
		'section'    => 'tidy_color_settings_header',
		'settings'   => get_tiry_option_name( 'header_bg_color' ),
	)));

	// = Color Picker for header text color.
	$wp_customize->add_setting( get_tiry_option_name( 'header_text_color' ), array(
		'default'           => $tidy_default['header_text_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, get_tiry_option_name( 'header_text_color' ), array(
		'label'      => __('Header text color', 'tidy'),
		'section'    => 'tidy_color_settings_header',
		'settings'   => get_tiry_option_name( 'header_text_color' ),
	)));

	// = Color Picker for header anchor color.
	$wp_customize->add_setting( get_tiry_option_name( 'header_anchor_color' ), array(
		'default'           => $tidy_default['header_anchor_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, get_tiry_option_name( 'header_anchor_color' ), array(
		'label'      => __('Header anchor color', 'tidy'),
		'section'    => 'tidy_color_settings_header',
		'settings'   => get_tiry_option_name( 'header_anchor_color' ),
	)));

	// = Color Picker for header border color.
	$wp_customize->add_setting( get_tiry_option_name( 'header_border_color' ), array(
		'default'           => $tidy_default['header_border_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, get_tiry_option_name( 'header_border_color' ), array(
		'label'      => __('Header border color', 'tidy'),
		'section'    => 'tidy_color_settings_header',
		'settings'   => get_tiry_option_name( 'header_border_color' ),
	)));



	/**
	 * customize for footer.
	 */
	$wp_customize->add_section( 'tidy_footer_scheme', array(
		'title'      => __('Footer Scheme', 'tidy'),
		'priority'   => 210,
	));


	// = Color Picker for footer background color.
	$wp_customize->add_setting( get_tiry_option_name( 'footer_bg_color' ), array(
		'default'           => '333333',
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, get_tiry_option_name( 'footer_bg_color' ), array(
		'label'      => __('Background Color', 'tidy'),
		'section'    => 'tidy_footer_scheme',
		'settings'   => get_tiry_option_name( 'footer_bg_color' ),
	)));

	// = Color Picker for footer text color.
	$wp_customize->add_setting( get_tiry_option_name( 'footer_text_color' ) , array(
		'default'           => 'cccccc',
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, get_tiry_option_name( 'footer_text_color' ), array(
		'label'      => __('Text Color', 'tidy'),
		'section'    => 'tidy_footer_scheme',
		'settings'   => get_tiry_option_name( 'footer_text_color' )	,
	)));

	// = Color Picker for footer link color.
	$wp_customize->add_setting( get_tiry_option_name( 'footer_link_color' ) , array(
		'default'           => 'ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, get_tiry_option_name( 'footer_link_color' ), array(
		'label'      => __('Link Color', 'tidy'),
		'section'    => 'tidy_footer_scheme',
		'settings'   => get_tiry_option_name( 'footer_link_color' )	,
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
		.site-header-main {
			color: <?php echo esc_html( $options['header_text_color'] ); ?>;
		}
		<?php endif; ?>
		<?php if ( !empty( $options['header_anchor_color'] ) ) : ?>
		.site-header-main a,
		.main-navigation .current_page_item a,
		.main-navigation .current-menu-item a {
			color: <?php echo esc_html( $options['header_anchor_color'] ); ?>;
		}
		.menu-toggle {
			background-color: <?php echo esc_html( $options['header_anchor_color'] ); ?>;
		}
		<?php endif; ?>
		<?php if ( !empty( $options['header_border_color'] ) ) : ?>
		.site-header-social-area .inner {
			border-color: <?php echo esc_html( $options['header_border_color'] ); ?>;
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

