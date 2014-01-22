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
		'header_border_color' => '#CDD0D4',

		'header_widget_bg_color'     => '#CDD0D4',
		'header_widget_text_color'   => '#1C1C1C',
		'header_widget_anchor_color' => '#0058AE',

		'main_bg_color'     => '#FFFFFF',
		'main_text_color'   => '#1C1C1C',
		'main_anchor_color' => '#0058AE',
		'main_border_color' => '#CDD0D4',

		'widget_bg_color'     => '#FFFFFF',
		'widget_title_color'  => '#1C1C1C',
		'widget_text_color'   => '#1C1C1C',
		'widget_anchor_color' => '#0058AE',
		'widget_border_color' => '#CDD0D4',

		'footer_bg_color'     => '#0058AE',
		'footer_title_color'  => '#FFFFFF',
		'footer_text_color'   => '#FFFFFF',
		'footer_anchor_color' => '#FFFFFF',
		'footer_border_color' => '#FFFFFF',

		'footer_category_bg_color'     => '#E3E6EA',
		'footer_category_title_color'  => '#1C1C1C',
		'footer_category_text_color'   => '#1C1C1C',
		'footer_category_anchor_color' => '#0058AE',
		'footer_category_border_color' => '#CDD0D4',

		'copyright_bg_color'     => '#CDD0D4',
		'copyright_text_color'   => '#0058AE',
		'copyright_anchor_color' => '#0058AE',
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
		'priority'   => 11,
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
		'priority'   => 12,
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
		'priority'   => 11,
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
		'priority'   => 12,
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
		'priority'   => 13,
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
		'priority'   => 10,
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
		'label'      => __( 'Header text color', 'tidy' ),
		'section'    => 'tidy_color_settings_header',
		'priority'   => 11,
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
		'label'      => __( 'Header anchor color', 'tidy' ),
		'section'    => 'tidy_color_settings_header',
		'priority'   => 12,
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
		'label'      => __( 'Header border color', 'tidy' ),
		'section'    => 'tidy_color_settings_header',
		'priority'   => 13,
		'settings'   => get_tiry_option_name( 'header_border_color' ),
	)));

	// = Color Picker for header widget background color.
	$wp_customize->add_setting( get_tiry_option_name( 'header_widget_bg_color' ), array(
		'default'           => $tidy_default['header_widget_bg_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, get_tiry_option_name( 'header_widget_bg_color' ), array(
		'label'      => __( 'Header widget background color', 'tidy' ),
		'section'    => 'tidy_color_settings_header',
		'priority'   => 14,
		'settings'   => get_tiry_option_name( 'header_widget_bg_color' ),
	)));

	// = Color Picker for header widget text color.
	$wp_customize->add_setting( get_tiry_option_name( 'header_widget_text_color' ), array(
		'default'           => $tidy_default['header_widget_text_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, get_tiry_option_name( 'header_widget_text_color' ), array(
		'label'      => __( 'Header widget text color', 'tidy' ),
		'section'    => 'tidy_color_settings_header',
		'priority'   => 15,
		'settings'   => get_tiry_option_name( 'header_widget_text_color' ),
	)));

	// = Color Picker for header widget anchor color.
	$wp_customize->add_setting( get_tiry_option_name( 'header_widget_anchor_color' ), array(
		'default'           => $tidy_default['header_widget_anchor_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, get_tiry_option_name( 'header_widget_anchor_color' ), array(
		'label'      => __('Header widget anchor color', 'tidy'),
		'section'    => 'tidy_color_settings_header',
		'priority'   => 16,
		'settings'   => get_tiry_option_name( 'header_widget_anchor_color' ),
	)));

	/**
	 * section for Main color Settings.
	 */
	$wp_customize->add_section( 'tidy_color_settings_main', array(
		'title'      => __( 'Main color settings', 'tidy' ),
		'priority'   => 300,
	));

	// = Color Picker for main background color.
	$wp_customize->add_setting( get_tiry_option_name( 'main_bg_color' ), array(
		'default'           => $tidy_default['main_bg_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, get_tiry_option_name( 'main_bg_color' ), array(
		'label'      => __( 'Main background color', 'tidy' ),
		'section'    => 'tidy_color_settings_main',
		'priority'   => 11,
		'settings'   => get_tiry_option_name( 'main_bg_color' ),
	)));

	// = Color Picker for main text color.
	$wp_customize->add_setting( get_tiry_option_name( 'main_text_color' ), array(
		'default'           => $tidy_default['main_text_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, get_tiry_option_name( 'main_text_color' ), array(
		'label'      => __('Main text color', 'tidy'),
		'section'    => 'tidy_color_settings_main',
		'priority'   => 12,
		'settings'   => get_tiry_option_name( 'main_text_color' ),
	)));

	// = Color Picker for main anchor color.
	$wp_customize->add_setting( get_tiry_option_name( 'main_anchor_color' ), array(
		'default'           => $tidy_default['main_anchor_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, get_tiry_option_name( 'main_anchor_color' ), array(
		'label'      => __('Main anchor color', 'tidy'),
		'section'    => 'tidy_color_settings_main',
		'priority'   => 13,
		'settings'   => get_tiry_option_name( 'main_anchor_color' ),
	)));

	// = Color Picker for main border color.
	$wp_customize->add_setting( get_tiry_option_name( 'main_border_color' ), array(
		'default'           => $tidy_default['main_border_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, get_tiry_option_name( 'main_border_color' ), array(
		'label'      => __('Main border color', 'tidy'),
		'section'    => 'tidy_color_settings_main',
		'settings'   => get_tiry_option_name( 'main_border_color' ),
		'priority'   => 14,
	)));

	/**
	 * section for Widget color Settings.
	 */
	$wp_customize->add_section( 'tidy_color_settings_widget', array(
		'title'      => __( 'Widget color settings', 'tidy' ),
		'priority'   => 400,
	));

	// = Color Picker for widget background color.
	$wp_customize->add_setting( get_tiry_option_name( 'widget_bg_color' ), array(
		'default'           => $tidy_default['widget_bg_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, get_tiry_option_name( 'widget_bg_color' ), array(
		'label'      => __( 'Widget background color', 'tidy' ),
		'section'    => 'tidy_color_settings_widget',
		'priority'   => 11,
		'settings'   => get_tiry_option_name( 'widget_bg_color' ),
	)));

	// = Color Picker for widget title color.
	$wp_customize->add_setting( get_tiry_option_name( 'widget_title_color' ), array(
		'default'           => $tidy_default['widget_title_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, get_tiry_option_name( 'widget_title_color' ), array(
		'label'      => __('Widgte title color', 'tidy'),
		'section'    => 'tidy_color_settings_widget',
		'priority'   => 12,
		'settings'   => get_tiry_option_name( 'widget_title_color' ),
	)));

	// = Color Picker for widget text color.
	$wp_customize->add_setting( get_tiry_option_name( 'widget_text_color' ), array(
		'default'           => $tidy_default['widget_text_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, get_tiry_option_name( 'widget_text_color' ), array(
		'label'      => __('Widget text color', 'tidy'),
		'section'    => 'tidy_color_settings_widget',
		'priority'   => 13,
		'settings'   => get_tiry_option_name( 'widget_text_color' ),
	)));

	// = Color Picker for widget anchor color.
	$wp_customize->add_setting( get_tiry_option_name( 'widget_anchor_color' ), array(
		'default'           => $tidy_default['widget_anchor_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, get_tiry_option_name( 'widget_anchor_color' ), array(
		'label'      => __('Widget anchor color', 'tidy'),
		'section'    => 'tidy_color_settings_widget',
		'priority'   => 14,
		'settings'   => get_tiry_option_name( 'widget_anchor_color' ),
	)));

	// = Color Picker for widget border color.
	$wp_customize->add_setting( get_tiry_option_name( 'widget_border_color' ), array(
		'default'           => $tidy_default['widget_border_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, get_tiry_option_name( 'widget_border_color' ), array(
		'label'      => __('Widget border color', 'tidy'),
		'section'    => 'tidy_color_settings_widget',
		'priority'   => 15,
		'settings'   => get_tiry_option_name( 'widget_border_color' ),
	)));

	/**
	 * section for Footer color Settings.
	 */
	$wp_customize->add_section( 'tidy_color_settings_footer', array(
		'title'      => __( 'Footer color settings', 'tidy' ),
		'priority'   => 500,
	));

	// = Color Picker for footer background color.
	$wp_customize->add_setting( get_tiry_option_name( 'footer_bg_color' ), array(
		'default'           => $tidy_default['footer_bg_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, get_tiry_option_name( 'footer_bg_color' ), array(
		'label'      => __('Footer background color', 'tidy'),
		'section'    => 'tidy_color_settings_footer',
		'priority'   => 11,
		'settings'   => get_tiry_option_name( 'footer_bg_color' ),
	)));

	// = Color Picker for footer title color.
	$wp_customize->add_setting( get_tiry_option_name( 'footer_title_color' ) , array(
		'default'           => $tidy_default['footer_title_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, get_tiry_option_name( 'footer_title_color' ), array(
		'label'      => __('Footer title color', 'tidy'),
		'section'    => 'tidy_color_settings_footer',
		'priority'   => 12,
		'settings'   => get_tiry_option_name( 'footer_title_color' )	,
	)));

	// = Color Picker for footer text color.
	$wp_customize->add_setting( get_tiry_option_name( 'footer_text_color' ) , array(
		'default'           => $tidy_default['footer_text_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, get_tiry_option_name( 'footer_text_color' ), array(
		'label'      => __('Footer text color', 'tidy'),
		'section'    => 'tidy_color_settings_footer',
		'priority'   => 13,
		'settings'   => get_tiry_option_name( 'footer_text_color' )	,
	)));

	// = Color Picker for footer anchor color.
	$wp_customize->add_setting( get_tiry_option_name( 'footer_anchor_color' ) , array(
		'default'           => $tidy_default['footer_anchor_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, get_tiry_option_name( 'footer_anchor_color' ), array(
		'label'      => __('Footer anchor color', 'tidy'),
		'section'    => 'tidy_color_settings_footer',
		'priority'   => 14,
		'settings'   => get_tiry_option_name( 'footer_anchor_color' )	,
	)));

	// = Color Picker for footer border color.
	$wp_customize->add_setting( get_tiry_option_name( 'footer_border_color' ), array(
		'default'           => $tidy_default['footer_border_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, get_tiry_option_name( 'footer_border_color' ), array(
		'label'      => __('Footer border color', 'tidy'),
		'section'    => 'tidy_color_settings_footer',
		'priority'   => 15,
		'settings'   => get_tiry_option_name( 'footer_border_color' ),
	)));

	// = Color Picker for footer all categories background color.
	$wp_customize->add_setting( get_tiry_option_name( 'footer_category_bg_color' ), array(
		'default'           => $tidy_default['footer_category_bg_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, get_tiry_option_name( 'footer_category_bg_color' ), array(
		'label'      => __('All categories background color', 'tidy'),
		'section'    => 'tidy_color_settings_footer',
		'priority'   => 21,
		'settings'   => get_tiry_option_name( 'footer_category_bg_color' ),
	)));

	// = Color Picker for footer all categories title color.
	$wp_customize->add_setting( get_tiry_option_name( 'footer_category_title_color' ) , array(
		'default'           => $tidy_default['footer_category_title_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, get_tiry_option_name( 'footer_category_title_color' ), array(
		'label'      => __('All categories title color', 'tidy'),
		'section'    => 'tidy_color_settings_footer',
		'priority'   => 22,
		'settings'   => get_tiry_option_name( 'footer_category_title_color' )	,
	)));

	// = Color Picker for footer all categories text color.
	$wp_customize->add_setting( get_tiry_option_name( 'footer_category_text_color' ) , array(
		'default'           => $tidy_default['footer_category_text_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, get_tiry_option_name( 'footer_category_text_color' ), array(
		'label'      => __('All categories text color', 'tidy'),
		'section'    => 'tidy_color_settings_footer',
		'priority'   => 23,
		'settings'   => get_tiry_option_name( 'footer_category_text_color' )	,
	)));

	// = Color Picker for footer all categories anchor color.
	$wp_customize->add_setting( get_tiry_option_name( 'footer_category_anchor_color' ) , array(
		'default'           => $tidy_default['footer_category_anchor_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, get_tiry_option_name( 'footer_category_anchor_color' ), array(
		'label'      => __('All categories anchor color', 'tidy'),
		'section'    => 'tidy_color_settings_footer',
		'priority'   => 24,
		'settings'   => get_tiry_option_name( 'footer_category_anchor_color' )	,
	)));

	// = Color Picker for footer all categories border color.
	$wp_customize->add_setting( get_tiry_option_name( 'footer_category_border_color' ), array(
		'default'           => $tidy_default['footer_category_border_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, get_tiry_option_name( 'footer_category_border_color' ), array(
		'label'      => __('All categories border color', 'tidy'),
		'section'    => 'tidy_color_settings_footer',
		'priority'   => 25,
		'settings'   => get_tiry_option_name( 'footer_category_border_color' ),
	)));

	// = Color Picker for copyright background color.
	$wp_customize->add_setting( get_tiry_option_name( 'copyright_bg_color' ), array(
		'default'           => $tidy_default['copyright_bg_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, get_tiry_option_name( 'copyright_bg_color' ), array(
		'label'      => __('Copyright background color', 'tidy'),
		'section'    => 'tidy_color_settings_footer',
		'priority'   => 31,
		'settings'   => get_tiry_option_name( 'copyright_bg_color' ),
	)));

	// = Color Picker for copyright text color.
	$wp_customize->add_setting( get_tiry_option_name( 'copyright_text_color' ) , array(
		'default'           => $tidy_default['copyright_text_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'option',
		'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, get_tiry_option_name( 'copyright_text_color' ), array(
		'label'      => __('Copyright text color', 'tidy'),
		'section'    => 'tidy_color_settings_footer',
		'priority'   => 33,
		'settings'   => get_tiry_option_name( 'copyright_text_color' )	,
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
		<?php if ( !empty( $options['main_bg_color'] ) ) : ?>
		body, .blog-section-content .typeB .more-link, .blog-section-content .typeB .ellipsis, .blog-section-content .typeB .more-link, .archive-content .ellipsis {
			background-color: <?php echo esc_attr( $options['main_bg_color'] ); ?>;
		}
		<?php endif; ?>
		<?php if ( !empty( $options['main_anchor_color'] ) ) : ?>
		.site-content a, .entry-meta, .post-navigation .genericon, .search-form .search-submit, .entry-title a:hover {
			color: <?php echo esc_attr( $options['main_anchor_color'] ); ?>;
		}
		.search-form input[type="search"] {
			border-color: <?php echo esc_attr( $options['main_anchor_color'] ); ?>;
		}
		ul.page-numbers li a:hover, ul.page-numbers li a:focus, ul.page-numbers li a:active {
			background-color: <?php echo esc_attr( $options['main_anchor_color'] ); ?>;
			color: <?php echo esc_attr( $options['main_bg_color'] ); ?>;
		}
		<?php endif; ?>
		<?php if ( !empty( $options['main_text_color'] ) ) : ?>
		.site-content, .entry-title a {
			color: <?php echo esc_attr( $options['main_text_color'] ); ?>;
		}
		<?php endif; ?>
		<?php if ( !empty( $options['main_border_color'] ) ) : ?>
		.archive-title, .section-title, body.single .entry-title, body.page .entry-title, .site-main [class*="navigation"], .comment-list, li.depth-1, .widget-title, .widgettitle {
			border-color: <?php echo esc_attr( $options['main_border_color'] ); ?>;
		}
		hr {
			background-color: <?php echo esc_attr( $options['main_border_color'] ); ?>;
		}
		<?php endif; ?>
		<?php if ( !empty( $options['header_bg_color'] ) ) : ?>
		.site-header {
			background-color: <?php echo esc_attr( $options['header_bg_color'] ); ?>;
		}
		<?php endif; ?>
		<?php if ( !empty( $options['header_text_color'] ) ) : ?>
		.site-header-main {
			color: <?php echo esc_attr( $options['header_text_color'] ); ?>;
		}
		<?php endif; ?>
		<?php if ( !empty( $options['header_anchor_color'] ) ) : ?>
		.site-header-main a,
		.main-navigation .current_page_item a,
		.main-navigation .current-menu-item a,
		.main-navigation li:hover > a,
		.search-toggle {
			color: <?php echo esc_attr( $options['header_anchor_color'] ); ?>;
		}
		.menu-toggle {
			background-color: <?php echo esc_attr( $options['header_anchor_color'] ); ?>;
		}
		.search-container .search-form input[type="search"] {
			border-color: <?php echo esc_attr( $options['header_anchor_color'] ); ?>;
		}
		<?php endif; ?>
		<?php if ( !empty( $options['header_border_color'] ) ) : ?>
		.site-header-social-area .inner {
			border-color: <?php echo esc_attr( $options['header_border_color'] ); ?>;
		}
		<?php endif; ?>
		<?php if ( !empty( $options['header_widget_bg_color'] ) ) : ?>
		.site-header-widget-area {
			background-color: <?php echo esc_attr( $options['header_widget_bg_color'] ); ?>;
		}
		<?php endif; ?>
		<?php if ( !empty( $options['header_widget_text_color'] ) ) : ?>
		.site-header-widget-area {
			color: <?php echo esc_attr( $options['header_widget_text_color'] ); ?>;
		}
		<?php endif; ?>
		<?php if ( !empty( $options['header_widget_anchor_color'] ) ) : ?>
		.site-header-widget-area a {
			color: <?php echo esc_attr( $options['header_widget_anchor_color'] ); ?>;
		}
		<?php endif; ?>
		<?php if ( !empty( $options['widget_bg_color'] ) ) : ?>
		#secondary .widget {
			background-color: <?php echo esc_attr( $options['widget_bg_color'] ); ?>;
		}
		<?php endif; ?>
		<?php if ( !empty( $options['widget_text_color'] ) ) : ?>
		#secondary .widget {
			color: <?php echo esc_attr( $options['widget_text_color'] ); ?>;
		}
		<?php endif; ?>
		<?php if ( !empty( $options['widget_title_color'] ) ) : ?>
		#secondary .widget-title, #secondary .widgettitle {
			color: <?php echo esc_attr( $options['widget_title_color'] ); ?>;
		}
		<?php endif; ?>
		<?php if ( !empty( $options['widget_anchor_color'] ) ) : ?>
		#secondary .widget a {
			color: <?php echo esc_attr( $options['widget_anchor_color'] ); ?>;
		}
		#secondary .search-form input[type="search"] {
			border-color: <?php echo esc_attr( $options['widget_anchor_color'] ); ?>;
		}
		<?php endif; ?>
		<?php if ( !empty( $options['widget_border_color'] ) ) : ?>
		#secondary .widget-title, #secondary .widgettitle {
			border-color: <?php echo esc_attr( $options['widget_border_color'] ); ?>;
		}
		<?php endif; ?>
		
		
		<?php if ( !empty( $options['footer_bg_color'] ) ) : ?>
		.site-footer-widget-area {
			background-color: <?php echo esc_attr( $options['footer_bg_color'] ); ?>;
		}
		<?php endif; ?>
		<?php if ( !empty( $options['footer_text_color'] ) ) : ?>
		.site-footer-widget-area {
			color: <?php echo esc_attr( $options['footer_text_color'] ); ?>;
		}
		<?php endif; ?>
		<?php if ( !empty( $options['footer_title_color'] ) ) : ?>
		.site-footer-widget-area .widget-title, .site-footer-widget-area .widgettitle {
			color: <?php echo esc_attr( $options['footer_title_color'] ); ?>;
		}
		<?php endif; ?>
		<?php if ( !empty( $options['footer_anchor_color'] ) ) : ?>
		.site-footer-widget-area a {
			color: <?php echo esc_attr( $options['footer_anchor_color'] ); ?>;
		}
		<?php endif; ?>
		<?php if ( !empty( $options['footer_border_color'] ) ) : ?>
		.site-footer-widget-area .widget-title, .site-footer-widget-area .widgettitle {
			border-color: <?php echo esc_attr( $options['footer_border_color'] ); ?>;
		}
		<?php endif; ?>
		<?php if ( !empty( $options['copyright_bg_color'] ) ) : ?>
		.site-info {
			background-color: <?php echo esc_attr( $options['copyright_bg_color'] ); ?>;
		}
		<?php endif; ?>
		<?php if ( !empty( $options['copyright_text_color'] ) ) : ?>
		.site-info {
			color: <?php echo esc_attr( $options['copyright_text_color'] ); ?>;
		}
		<?php endif; ?>
		<?php if ( !empty( $options['copyright_anchor_color'] ) ) : ?>
		.site-info a {
			color: <?php echo esc_attr( $options['copyright_anchor_color'] ); ?>;
		}
		<?php endif; ?>
		<?php if ( !empty( $options['footer_category_bg_color'] ) ) : ?>
		.footer-category-list {
			background-color: <?php echo esc_attr( $options['footer_category_bg_color'] ); ?>;
		}
		<?php endif; ?>
		<?php if ( !empty( $options['footer_category_text_color'] ) ) : ?>
		.footer-category-list {
			color: <?php echo esc_attr( $options['footer_category_text_color'] ); ?>;
		}
		<?php endif; ?>
		<?php if ( !empty( $options['footer_category_title_color'] ) ) : ?>
		.footer-category-list .widget-title {
			color: <?php echo esc_attr( $options['footer_category_title_color'] ); ?>;
		}
		<?php endif; ?>
		<?php if ( !empty( $options['footer_category_anchor_color'] ) ) : ?>
		.footer-category-list a {
			color: <?php echo esc_attr( $options['footer_category_anchor_color'] ); ?>;
		}
		<?php endif; ?>
		<?php if ( !empty( $options['footer_category_border_color'] ) ) : ?>
		.footer-category-list .widget-title {
			border-color: <?php echo esc_attr( $options['footer_category_border_color'] ); ?>;
		}
		<?php endif; ?>
	</style>
<?php
}

