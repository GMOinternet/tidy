<?php
/**
 * @package Tidy
 */

global $merit_box, $i;
?>
<aside id="merit-box-<?php echo $i; ?>" class="merit-box-area-conteiner merit-box-<?php echo $merit_box ?>">
<?php
	if ( ( of_get_option( 'merit-box-' . $i . '-image') === false ) or ( of_get_option( 'merit-box-' . $i . '-image' ) == '' ) ) {
		$type = 'type-icon';
	} else {
		$type = 'type-image';
	}
	
	if ( ( of_get_option( 'merit-box-' . $i . '-url') === false ) or ( of_get_option( 'merit-box-' . $i . '-url') == '' ) ) {
		$url = '#';
	} else {
		$url = of_get_option( 'merit-box-' . $i . '-url');
	}

	if ( of_get_option( 'merit-box-' . $i . '-icon') === false ) {
		$icon = 'copy';
	} else {
		$icon = of_get_option( 'merit-box-' . $i . '-icon');
	}

	if ( of_get_option( 'merit-box-' . $i . '-title') === false ) {
		$title = 'merit-box-' . $i . '-title';
	} else {
		$title = of_get_option( 'merit-box-' . $i . '-title');
	}

	if ( of_get_option( 'merit-box-' . $i . '-description') === false ) {
		$description = 'merit-box-' . $i . '-description';
	} else {
		$description = of_get_option( 'merit-box-' . $i . '-description');
	}

	if ( $type == 'type-image' ) {
		$img = '<img src="' . of_get_option( 'merit-box-' . $i . '-image') . '" alt="' . esc_attr( $title ) . '">';
	} else {
		$img = '<span class="iconmoon icon-' . $icon . '"></span>';
	}
?>
	<div class="merit-box-thumbnail <?php echo $type; ?>"><a href="<?php echo esc_url($url); ?>"><?php echo $img; ?></a></div>
	<div class="merit-box-title"><?php echo esc_html( $title ); ?></div>
	<div class="merit-box-caption"><?php echo wpautop( $description ); ?></div>
	<?php if ( $url != "#" ) : ?>
	<div class="more-link"><a rel="bookmark" href="<?php echo esc_url($url); ?>" class="read-more"><span class="genericon genericon-rightarrow"></span><?php _e( 'Read More', 'tidy' ) ?></a></div>
	<?php endif; ?>
</aside>
