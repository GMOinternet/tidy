<?php
/**
 * Theme option css
 *
 * @package Tidy
 */


add_action( 'wp_head', 'tidy_themeoption_header_style' );

if ( ! function_exists( 'tidy_themeoption_header_style' ) ) :
function tidy_themeoption_header_style() {
	$sns_icon_color_header = of_get_option( 'sns-icon-color-header', '#0058AE' );
	$sns_icon_color_footer = of_get_option( 'sns-icon-color-footer', '#ffffff' );
	?>
	<style type="text/css">
		.sns-icons a {
			color: <?php echo $sns_icon_color_header; ?>;
			border-color: <?php echo $sns_icon_color_header; ?>;
		}
		.tidy_contact_sns_icons .sns-icons a {
			color: <?php echo $sns_icon_color_footer; ?>;
			border-color: <?php echo $sns_icon_color_footer; ?>;
		}
	</style>
	<?php
}
endif; // tidy_header_style
