<?php
/**
 * @package Tidy
 */

global $merit_box, $i;

if ( ( of_get_option( 'merit-box-' . $i . '-image') === false ) or ( of_get_option( 'merit-box-' . $i . '-image' ) == '' ) ) {
	$type = 'type-icon';
} else {
	$type = 'type-image';
}

$url = of_get_option( 'merit-box-' . $i . '-url', '' );

$icon = of_get_option( 'merit-box-' . $i . '-icon', 'copy' );

$title = of_get_option( 'merit-box-' . $i . '-title', 'merit-box-' . $i . '-title' );

$description = of_get_option( 'merit-box-' . $i . '-description', 'merit-box-' . $i . '-description' );

$textalign = of_get_option( 'merit-box-' . $i . '-align', 'center' );

if ( $type == 'type-image' ) {
	$img = '<img src="' . of_get_option( 'merit-box-' . $i . '-image') . '" alt="' . esc_attr( $title ) . '">';
} else {
	$img = '<span class="iconmoon icon-' . $icon . '"></span>';
}
?>

<aside id="merit-box-<?php echo $i; ?>" class="merit-box-area-conteiner merit-box-<?php echo $merit_box ?> merit-box-<?php echo $merit_box; ?>-<?php echo $type ?>">
	<div class="merit-box-thumbnail">
		<div class="<?php echo $type; ?>"><div class="merit-box-thumbnail-inner tidy_post_thumbnail">
		<?php if ( $url != '' ) : ?>
			<a href="<?php echo esc_url($url); ?>" class="iconbox"><span class="thumbnail_img"><?php echo $img; ?></span></a>
		<?php else: ?>
			<span class="iconbox"><?php echo $img; ?></span>
		<?php endif; ?>
		</div></div>
	</div>
	<div class="merit-box-title"><?php echo esc_html( $title ); ?></div>
	<div class="merit-box-caption <?php echo "text-" . esc_attr($textalign); ?>"><?php echo wpautop( $description ); ?></div>
	<?php if ( $url != '' ) : ?>
	<div class="more-link"><a rel="bookmark" href="<?php echo esc_url($url); ?>" class="read-more"><span class="genericon genericon-rightarrow"></span><?php _e( 'Read More', 'tidy' ) ?></a></div>
	<?php endif; ?>
</aside>
