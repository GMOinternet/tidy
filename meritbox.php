<?php
/**
 * @package Tidy
 */

global $tidy_merit_box, $i;

if ( ( tidy_of_get_option( 'merit-box-' . $i . '-image') === false ) or ( tidy_of_get_option( 'merit-box-' . $i . '-image' ) == '' ) ) {
	$tidy_merit_box_type = 'type-icon';
} else {
	$tidy_merit_box_type = 'type-image';
}

$tidy_merit_box_url = tidy_of_get_option( 'merit-box-' . $i . '-url', '' );

$tidy_icon = tidy_of_get_option( 'merit-box-' . $i . '-icon', 'copy' );

$tidy_merit_box_title = tidy_of_get_option( 'merit-box-' . $i . '-title', 'merit-box-' . $i . '-title' );

$tidy_merit_box_description = tidy_of_get_option( 'merit-box-' . $i . '-description', 'merit-box-' . $i . '-description' );

$tidy_merit_box_textalign = tidy_of_get_option( 'merit-box-' . $i . '-align', 'center' );

if ( $tidy_merit_box_type == 'type-image' ) {
	$tidy_merit_box_img = '<span class="thumbnail_img"><img src="' . tidy_of_get_option( 'merit-box-' . $i . '-image') . '" alt="' . esc_attr( $tidy_merit_box_title ) . '"></span>';
} else {
	$tidy_merit_box_img = '<span class="iconmoon"><span class="icon-' . $tidy_icon . '"></span></span>';
}
?>

<aside id="merit-box-<?php echo $i; ?>" class="merit-box-area-conteiner merit-box-<?php echo $tidy_merit_box ?> merit-box-<?php echo $tidy_merit_box; ?>-<?php echo $tidy_merit_box_type ?>">
	<div class="merit-box-thumbnail">
		<div class="<?php echo $tidy_merit_box_type; ?>"><div class="merit-box-thumbnail-inner tidy_post_thumbnail">
		<?php if ( $tidy_merit_box_url != '' ) : ?>
			<a href="<?php echo esc_url($tidy_merit_box_url); ?>" class="iconbox"><?php echo $tidy_merit_box_img; ?></a>
		<?php else: ?>
			<span class="iconbox"><?php echo $tidy_merit_box_img; ?></span>
		<?php endif; ?>
		</div></div>
	</div>
	<div class="merit-box-title"><?php echo esc_html( $tidy_merit_box_title ); ?></div>
	<div class="merit-box-caption <?php echo "text-" . esc_attr($tidy_merit_box_textalign); ?>"><?php echo wpautop( $tidy_merit_box_description ); ?></div>
	<?php if ( $tidy_merit_box_url != '' ) : ?>
	<div class="more-link"><a rel="bookmark" href="<?php echo esc_url($tidy_merit_box_url); ?>" class="read-more"><span class="genericon genericon-rightarrow"></span><?php _e( 'Read More', 'tidy' ) ?></a></div>
	<?php endif; ?>
</aside>
