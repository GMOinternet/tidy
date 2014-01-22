<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'tidy'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// tidy_default_array
	$tidy_default = tidy_default_array();

	// Icon array
	$icon_array = array(
		'copy' => __('Copy', 'tidy'),
		'power-cord' => __('Plugin', 'tidy'),
		'earth' => __('Graphic', 'tidy'),
		'star' => __('Logo', 'tidy')
	);

	// Test data
	$test_array = array(
		'one' => __('One', 'tidy'),
		'two' => __('Two', 'tidy'),
		'three' => __('Three', 'tidy'),
		'four' => __('Four', 'tidy'),
		'five' => __('Five', 'tidy')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'tidy'),
		'two' => __('Pancake', 'tidy'),
		'three' => __('Omelette', 'tidy'),
		'four' => __('Crepe', 'tidy'),
		'five' => __('Waffle', 'tidy')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath = get_template_directory_uri() . '/admin/images/';

	$options = array();

	/**
	 * section for About.
	 */
	$options[] = array(
		'name' => __( 'About', 'tidy' ),
		'icon' => 'info',
		'type' => 'heading'
	);

	// About this Theme
	$options[] = array(
		'name' => __( 'About this Theme', 'tidy' ),
		'desc' => __( '<p>This is a highly customizable, clean, modern, and responsive WordPress theme. originally developed plugin is included and it enables higher usability and easier production of stylish site and customization. It can be used in wide variation from private to business use. Give it a try and enjoy our beautiful theme.</p><p><strong>Features</strong></p><ul><li>Responsive</li><li>Social setting</li><li>Easy web advertisement setting</li><li>Portfolio</li><li>Icon menu</li><li>Easy tracking code &amp; Web mastertool setting</li><li>Color customization</li><li>Web fonts &amp; icon fonts</li><li>Wide variety of theme layouts</li><li>Stylish slider &quot;Classic Slider&quot;</li></ul>', 'tidy' ),
		'id' => 'about-this-theme',
		'class' => 'about-this-theme',
		'type' => 'info');

	// About WP Shop
	$options[] = array(
		'name' => __( 'About WP Shop', 'tidy' ),
		'desc' => sprintf( __( '<p class="about-photo"><img src="%1$s" alt="*"></p><p>WP Shop is a social marketplace for buying and selling WordPress themes, while providing a platform to showcase and share Asian design.</p><p>We connect buyers and sellers of digital contents for WordPress by offering more than just a marketplace.</p><p>WP Shop only offers safe and high quality themes produced according to the guidelines issued by wordpress.org and tested based on _s(underscores) provided by Automattic Inc. or default themes as a standard.</p><p class="shop_link"><a href="https://wpshop.com/signup" target="_blank" class="shop_btn"><span class="shop_name">Join WP Shop</span><span class="shop_dec">Starting from $0 / theme</span></a></p>', 'tidy' ), $imagepath . 'about-image.jpg' ),
		'id' => 'about-wp-shop',
		'class' => 'about-wp-shop',
		'type' => 'info');

	// WP Shop Headline News
	$options[] = array(
		'name' => __( 'WP Shop Headline News', 'tidy' ),
		'desc' => '',
		'url' => 'http://news.wpshop.com/?feed=rss2',
		'item' => 5,
		'id' => 'wp-shop-news',
		'class' => 'wp-shop-news',
		'type' => 'feed');

	$options[] = array(
		'name' => __( 'What\'s happennig at WordPress?', 'tidy' ),
		'desc' => '',
		'url' => 'http://wp.wpshop.com/?feed=rss2',
		'item' => 5,
		'id' => 'wp-happennig-news',
		'class' => 'wp-happennig-news',
		'type' => 'feed');

	/**
	 * General Settings.
	 */
	$options[] = array(
		'name' => __('General Settings', 'tidy'),
		'icon' => 'info',
		'type' => 'heading');

	// Header logo toggle
	$options[] = array(
		'name' => __( 'Show Header logo', 'tidy' ),
		'desc' => '',
		'id' => 'logo_toggle',
		'std' => '0',
		'type' => 'toggle');

	// Header logo image
	$options[] = array(
		'name' => __( 'Header logo image', 'tidy' ),
		'desc' => '',
		'id' => 'logo_image',
		'std' => $tidy_default['logo_image'],
		'type' => 'upload');

	// Site title
	$options[] = array(
		'name' => __( 'Site Title', 'tidy' ),
		'desc' => '',
		'id' => 'general-header-site-title',
		'std' => get_bloginfo( 'name' ),
		'type' => 'text');

	// Tagline
	$options[] = array(
		'name' => __( 'Tagline', 'tidy' ),
		'desc' => '',
		'id' => 'general-header-site-tagline',
		'std' => get_bloginfo( 'description' ),
		'type' => 'text');

	// Text Input for Header text
	$options[] = array(
		'name' => __( 'Header text', 'tidy' ),
		'desc' => '',
		'id' => 'header_text',
		'std' => $tidy_default['header_text'],
		'type' => 'text');

	// Copyright
	$options[] = array(
		'name' => __( 'Copyright', 'tidy' ),
		'desc' => '',
		'id' => 'copyright',
		'std' => $tidy_default['copyright'],
		'type' => 'text');

	// Favicon
	$options[] = array(
		'name' => __( 'Favicon', 'tidy' ),
		'desc' => 'Please upload .ico image.',
		'id' => 'favicon',
		'std' => '',
		'type' => 'upload');

	/**
	 * Color Settings.
	 */
	$options[] = array(
		'name' => __( 'Color Settings', 'tidy' ),
		'icon' => 'info',
		'type' => 'heading');

	// Header color settings (info)
	$options[] = array(
		'name' => __( 'Header color settings', 'tidy' ),
		'type' => 'info');

	// Header background color
	$options[] = array(
		'name' => __( 'Header background color', 'tidy' ),
		'desc' => __( 'No color selected by default.', 'tidy'),
		'id' => 'header_bg_color',
		'std' => $tidy_default['header_bg_color'],
		'class' => 'customcolor',
		'type' => 'color' );

	// Header text color
	$options[] = array(
		'name' => __( 'Header text color', 'tidy' ),
		'desc' => __( 'No color selected by default.', 'tidy'),
		'id' => 'header_text_color',
		'std' => $tidy_default['header_text_color'],
		'class' => 'customcolor',
		'type' => 'color' );

	// Header anchor color
	$options[] = array(
		'name' => __( 'Header anchor color', 'tidy' ),
		'desc' => __( 'No color selected by default.', 'tidy'),
		'id' => 'header_anchor_color',
		'std' => $tidy_default['header_anchor_color'],
		'class' => 'customcolor',
		'type' => 'color' );

	// Header border color
	$options[] = array(
		'name' => __('Header border color', 'tidy'),
		'desc' => __( 'No color selected by default.', 'tidy'),
		'id' => 'header_border_color',
		'std' => $tidy_default['header_border_color'],
		'class' => 'customcolor',
		'type' => 'color' );

	// Layout Settings
	$options[] = array(
		'name' => __('Layout Settings', 'tidy'),
		'type' => 'heading');

	$options[] = array(
		'name' => "Example Image Selector",
		'desc' => "Images for layout.",
		'id' => "example_images",
		'std' => "2c-l-fixed",
		'type' => "images",
		'options' => array(
			'1col-fixed' => $imagepath . '1col.png',
			'2c-l-fixed' => $imagepath . '2cl.png',
			'2c-r-fixed' => $imagepath . '2cr.png')
	);
/*
	$options[] = array(
		'name' =>  __('Example Background', 'tidy'),
		'desc' => __('Change the background CSS.', 'tidy'),
		'id' => 'example_background',
		'std' => $background_defaults,
		'type' => 'background' );

	$options[] = array(
		'name' => __('Multicheck', 'tidy'),
		'desc' => __('Multicheck description.', 'tidy'),
		'id' => 'example_multicheck',
		'std' => $multicheck_defaults, // These items get checked by default
		'type' => 'multicheck',
		'options' => $multicheck_array);


	$options[] = array( 'name' => __('Typography', 'tidy'),
		'desc' => __('Example typography.', 'tidy'),
		'id' => "example_typography",
		'std' => $typography_defaults,
		'type' => 'typography' );

	$options[] = array(
		'name' => __('Custom Typography', 'tidy'),
		'desc' => __('Custom typography options.', 'tidy'),
		'id' => "custom_typography",
		'std' => $typography_defaults,
		'type' => 'typography',
		'options' => $typography_options );

	$options[] = array(
		'name' => __('Input Text Mini', 'tidy'),
		'desc' => __('A mini text input field.', 'tidy'),
		'id' => 'example_text_mini',
		'std' => 'Default',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('Input Text', 'tidy'),
		'desc' => __('A text input field.', 'tidy'),
		'id' => 'example_text',
		'std' => 'Default Value',
		'type' => 'text');


	$options[] = array(
		'name' => __('Input Select Small', 'tidy'),
		'desc' => __('Small Select Box.', 'tidy'),
		'id' => 'example_select',
		'std' => 'three',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $test_array);

	$options[] = array(
		'name' => __('Input Select Wide', 'tidy'),
		'desc' => __('A wider select box.', 'tidy'),
		'id' => 'example_select_wide',
		'std' => 'two',
		'type' => 'select',
		'options' => $test_array);

	if ( $options_categories ) {
	$options[] = array(
		'name' => __('Select a Category', 'tidy'),
		'desc' => __('Passed an array of categories with cat_ID and cat_name', 'tidy'),
		'id' => 'example_select_categories',
		'type' => 'select',
		'options' => $options_categories);
	}

	if ( $options_tags ) {
	$options[] = array(
		'name' => __('Select a Tag', 'options_check'),
		'desc' => __('Passed an array of tags with term_id and term_name', 'options_check'),
		'id' => 'example_select_tags',
		'type' => 'select',
		'options' => $options_tags);
	}

	$options[] = array(
		'name' => __('Select a Page', 'tidy'),
		'desc' => __('Passed an pages with ID and post_title', 'tidy'),
		'id' => 'example_select_pages',
		'type' => 'select',
		'options' => $options_pages);

	$options[] = array(
		'name' => __('Input Radio (one)', 'tidy'),
		'desc' => __('Radio select with default options "one".', 'tidy'),
		'id' => 'example_radio',
		'std' => 'one',
		'type' => 'radio',
		'options' => $test_array);

	$options[] = array(
		'name' => __('Input Checkbox', 'tidy'),
		'desc' => __('Example checkbox, defaults to true.', 'tidy'),
		'id' => 'example_checkbox',
		'std' => '1',
		'type' => 'checkbox');
*/

	// Merit Box Settings
	$options[] = array(
		'name' => __('Merit Box Settings', 'tidy'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Select the number of merit box to display', 'tidy'),
		'desc' => __('Default:4, Min:1, Max:4.', 'tidy'),
		'id' => 'merit-box-num',
		'std' => 4,
		'min' => 1,
		'max' => 4,
		'type' => 'num');

	// Merit box %s
	for ($i = 1; $i <= 4; $i++) {

		$options[] = array(
			'name' => sprintf( __('Merit box %s', 'tidy') , $i),
			'id' => 'merit-box-' . $i . '-head',
			'type' => 'info');

		$options[] = array(
			'name' => __('Title', 'tidy'),
			'id' => 'merit-box-' . $i . '-title',
			'std' => '',
			'type' => 'text');

		$options[] = array(
			'name' => __('Textarea', 'tidy'),
			'desc' => __('Textarea description.', 'tidy'),
			'id' => 'merit-box-' . $i . '-description',
			'type' => 'textarea');
	
		$options[] = array(
			'name' => __('Icon', 'tidy'),
			'desc' => __('Small Select Box.', 'tidy'),
			'id' => 'merit-box-' . $i . '-icon',
			'std' => 'three',
			'type' => 'select',
			'class' => 'mini', //mini, tiny, small
			'options' => $icon_array);
	
		$options[] = array(
			'name' => __('Image', 'tidy'),
			'desc' => __('Image will override any icon.', 'tidy'),
			'id' => 'merit-box-' . $i . '-image',
			'type' => 'upload');

		$options[] = array(
			'name' => __('URL', 'tidy'),
			'id' => 'merit-box-' . $i . '-url',
			'std' => '',
			'type' => 'text');
	}

	// Social Settings
	$options[] = array(
		'name' => __('Social Settings', 'tidy'),
		'icon' => 'share',
		'type' => 'heading');

	$options[] = array(
		'name' => __('Social Icon setting', 'tidy'),
		'desc' => '',
		'id' => 'sns-icon',
		'std' => '',
		'type' => 'info');

	$options[] = array(
		'name' => __('Frame', 'tidy'),
		'desc' => '',
		'id' => 'sns-icon-frame',
		'std' => '1',
		'type' => 'toggle');

	$options[] = array(
		'name' => __('Header icon color', 'tidy'),
		'desc' => '',
		'id' => 'sns-icon-color-header',
		'std' => '#0058AE',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Footer icon color', 'tidy'),
		'desc' => '',
		'id' => 'sns-icon-color-footer',
		'std' => '#ffffff',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Display location', 'tidy'),
		'desc' => '',
		'id' => 'sns-location',
		'std' => '',
		'type' => 'info');

	$options[] = array(
		'name' => __('Header', 'tidy'),
		'desc' => '',
		'id' => 'sns-location-header',
		'std' => '1',
		'type' => 'toggle');

	$options[] = array(
		'name' => __('Footer', 'tidy'),
		'desc' => '',
		'id' => 'sns-location-footer',
		'std' => '1',
		'type' => 'toggle');

	$options[] = array(
		'name' => __('You\'re SNS address', 'tidy'),
		'desc' => '',
		'id' => 'sns-addr',
		'std' => '',
		'type' => 'info');

	$options[] = array(
		'name' => __('E-mail', 'tidy'),
		'desc' => __('You\'re E-mail address.', 'tidy'),
		'id' => 'email',
		'std' => '',
		'type' => 'email');

	$sns_array = tidy_sns_array();
	if ( ! empty( $sns_array )) {
		foreach( $sns_array as $key=>$val ) {
			$options[] = array(
				'name' => $key,
				'desc' => sprintf( __('You\'re %s address.', 'tidy'), $key ),
				'id' => $val,
				'account' => '',
				'toggle' => false,
				'type' => 'sns');
		}
	}

/*
	$options[] = array(
		'name' => __('Text Editor', 'tidy'),
		'type' => 'heading' );
*/

	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */

/*
	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);

	$options[] = array(
		'name' => __('Default Text Editor hogemoge', 'tidy'),
		'desc' => sprintf( __( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'tidy' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'example_editor',
		'type' => 'editor',
		'settings' => $wp_editor_settings );
*/
	return $options;
}

// overwride
add_action( 'optionsframework_after_validate', 'optionsframework_after_validate_overwride' );
function optionsframework_after_validate_overwride( $clean ) {
	foreach( $clean as $k => $v ){
		if ( $k == 'general-header-site-title' ) {
			update_option( 'blogname', $v );
		} elseif ( $k == 'general-header-site-tagline' ) {
			update_option( 'blogdescription', $v );
		} elseif ( $k == 'logo_toggle' ) {
			set_theme_mod( 'logo_toggle', $v );
		} elseif ( $k == 'logo_image' ) {
			set_theme_mod( 'logo_image', $v );
		} elseif ( $k == 'header_text' ) {
			set_theme_mod( 'header_text', $v );
		} elseif ( $k == 'copyright' ) {
			set_theme_mod( 'copyright', $v );
		} elseif ( $k == 'favicon' ) {
			set_theme_mod( 'favicon', $v );
		} elseif ( $k == 'header_bg_color' ) {
			set_theme_mod( 'header_bg_color', $v );
		} elseif ( $k == 'header_text_color' ) {
			set_theme_mod( 'header_text_color', $v );
		} elseif ( $k == 'header_anchor_color' ) {
			set_theme_mod( 'header_anchor_color', $v );
		} elseif ( $k == 'header_border_color' ) {
			set_theme_mod( 'header_border_color', $v );
		}
	}
	return $clean;
}

add_filter( 'optionsframework_std', 'tidy_optionsframework_std', 10, 3);
function tidy_optionsframework_std( $option_name, $value, $val ) {
	if ( ! array_key_exists( 'id', $value ) )
		return $val;

	$options = get_theme_mods();

	if ( $value['id'] == 'general-header-site-title' ) {
		$val = get_bloginfo( 'name' );
	} elseif ( $value['id'] == 'general-header-site-tagline' ) {
		$val = get_bloginfo( 'description' );
	} elseif ( $value['id'] == 'logo_toggle' ) {
		$val = ( get_theme_mods('logo_toggle') ) ? $options['logo_toggle'] : $value['std'];
	} elseif ( $value['id'] == 'logo_image' ) {
		$val = ( get_theme_mods('logo_image') ) ? $options['logo_image'] : $value['std'];
	} elseif ( $value['id'] == 'header_text' ) {
		$val = ( get_theme_mods('header_text') ) ? $options['header_text'] : $value['std'];
	} elseif ( $value['id'] == 'copyright' ) {
		$val = ( get_theme_mods('copyright') ) ? $options['copyright'] : $value['std'];
	} elseif ( $value['id'] == 'favicon' ) {
		$val = ( get_theme_mods('favicon') ) ? $options['favicon'] : $value['std'];
	} elseif ( $value['id'] == 'header_bg_color' ) {
		$val = ( get_theme_mods('header_bg_color') ) ? $options['header_bg_color'] : $value['std'];
	} elseif ( $value['id'] == 'header_text_color' ) {
		$val = ( get_theme_mods('header_text_color') ) ? $options['header_text_color'] : $value['std'];
	} elseif ( $value['id'] == 'header_anchor_color' ) {
		$val = ( get_theme_mods('header_anchor_color') ) ? $options['header_anchor_color'] : $value['std'];
	} elseif ( $value['id'] == 'header_border_color' ) {
		$val = ( get_theme_mods('header_border_color') ) ? $options['header_border_color'] : $value['std'];
	}

	return $val;
}

// favicon
add_action( 'wp_head', 'tidy_favicon' );
add_action( 'admin_head', 'tidy_favicon' );
function tidy_favicon() {
	$favicon = get_theme_mod( 'favicon' );
	if ( $favicon ) {
		$link = '<link rel="Shortcut Icon" type="image/x-icon" href="%s" />'."\n";
		printf( $link, esc_url( $favicon ) );
	}
}
