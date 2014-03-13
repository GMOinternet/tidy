<?php
/**
 * @package Tidy
 */

$single_type = of_get_option( 'single_type', 'typeA' );
$thumbnail = ( $single_type == 'typeB' ) ? 'tidy-thumb-medium' : 'full';
$icon   = of_get_option( 'single_icon', 'pencil' );

$meta_date     = of_get_option( 'single_meta_date', 1 );
$meta_author   = of_get_option( 'single_meta_author', 1 );
$meta_cat      = of_get_option( 'single_meta_cat', 1 );
$meta_tab      = of_get_option( 'single_meta_tag', 1  );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($single_type); ?>>
	<header class="entry-header">
		<?php do_action( 'tidy_before_entry_header' ); ?>
		<h1 class="entry-title"><span class="icon-<?php echo esc_attr( $icon ); ?>"></span><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="tidy_post_thumbnail <?php echo esc_attr( $thumbnail ); ?>"><?php the_post_thumbnail( $thumbnail ); ?></div>
			<?php endif; ?>
				<?php if ( $meta_date > 0 ) tidy_posted_on(); ?>
				<span class="entry-ac">
				<?php if ( $meta_author > 0 ) tidy_posted_author(); ?>
				<?php if ( $meta_cat > 0 ) tidy_posted_category(); ?>
				<?php
					if ( $meta_tab > 0 ) {
						/* translators: used between list items, there is a space after the comma */
						$tag_list = get_the_tag_list( '', __( ', ', 'tidy' ) );
	
						if ( '' != $tag_list ) {
							echo '<span class="entry_tags"><span class="icon-tag"></span> ' . $tag_list . '</span>';
						}
					}
				?>
				<?php edit_post_link( __( 'Edit', 'tidy' ), '<span class="edit-link"><span class="icon-pencil"></span> ', '</span>' ); ?>
				</span>
		</div><!-- .entry-meta -->
		<?php do_action( 'tidy_after_entry_header' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php do_action( 'tidy_before_entry_content' ); ?>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'tidy' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
