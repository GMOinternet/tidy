<?php
/**
 * Theme option css
 *
 * @package Tidy
 */


add_action( 'wp_head', 'tidy_themeoption_header_style' );

if ( ! function_exists( 'tidy_themeoption_header_style' ) ) :
function tidy_themeoption_header_style() {
	// sns
	$tidy_sns_icon_border = tidy_of_get_option( 'sns-icon-frame', '1' );
	$tidy_sns_icon_color_header = tidy_of_get_option( 'sns-icon-color-header', '#0058AE' );
	$tidy_sns_icon_color_footer = tidy_of_get_option( 'sns-icon-color-footer', '#ffffff' );
	// Archive Description
	$tidy_arc_desc_bg_color     = tidy_of_get_option( 'arc_desc_bg_color', '#E3E6EA' );
	$tidy_arc_desc_text_color   = tidy_of_get_option( 'arc_desc_text_color', '#1C1C1C' );
	$tidy_arc_desc_anchor_color = tidy_of_get_option( 'arc_desc_anchor_color', '#0058AE' );

	?>
	<style type="text/css">
	<?php 
	for ($i = 1; $i <= 4; $i++) {
		echo '#merit-box-' .$i .' .merit-box-thumbnail .type-icon .merit-box-thumbnail-inner {
			background-color: ' . tidy_of_get_option( 'merit-box-' . $i . '-icon-color', '#0058AE' ). ';
		}';
	}
	 ?>
		.sns-icons a {
			color: <?php echo $tidy_sns_icon_color_header; ?> !important;
			border-color: <?php echo $tidy_sns_icon_color_header; ?>;
		}
		.site-footer .sns-icons a {
			color: <?php echo $tidy_sns_icon_color_footer; ?> !important;
			border-color: <?php echo $tidy_sns_icon_color_footer; ?>;
		}
		<?php if ( $tidy_sns_icon_border == 0 ) : ?>
		.sns-icons a,
		.tidy_contact_sns_icons .sns-icons a,
		.gallery-section-content .entry-conteiner a,
		.gmo-shares a {
			border-style: none;
			border-width: 0px;
		}
		<?php endif; ?>
		<?php if ( $tidy_arc_desc_bg_color != '#E3E6EA' ) : ?>
		.page-header {
			background-color:  <?php echo $tidy_arc_desc_bg_color; ?>;
		}
		<?php endif; ?>
		<?php if ( $tidy_arc_desc_text_color != '#1C1C1C' ) : ?>
		.page-header {
			color:  <?php echo $tidy_arc_desc_text_color; ?>;
		}
		<?php endif; ?>
		<?php if ( $tidy_arc_desc_anchor_color != '#0058AE' ) : ?>
		.page-header a,
		.page-header span {
			color:  <?php echo $tidy_arc_desc_anchor_color; ?>;
		}
		<?php endif; ?>
	</style>
	<?php
}
endif; // tidy_header_style
