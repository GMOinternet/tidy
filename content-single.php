<?php
/**
 * @package Tidy
 */

$tidy_single_type = tidy_of_get_option( 'single_type', 'typeA' );
$tidy_single_thumbnail = ( $tidy_single_type == 'typeB' ) ? 'tidy-thumb-medium' : 'full';
$tidy_icon   = tidy_of_get_option( 'single_icon', 'pencil' );

$tidy_single_meta_date     = tidy_of_get_option( 'single_meta_date', 1 );
$tidy_single_meta_author   = tidy_of_get_option( 'single_meta_author', 1 );
$tidy_single_meta_cat      = tidy_of_get_option( 'single_meta_cat', 1 );
$tidy_single_meta_tag      = tidy_of_get_option( 'single_meta_tag', 1  );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($tidy_single_type); ?>>
	<header class="entry-header">
		<?php do_action( 'tidy_before_entry_header' ); ?>
		<h1 class="entry-title"><span class="icon-<?php echo esc_attr( $tidy_icon ); ?>"></span> <?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="tidy_post_thumbnail <?php echo esc_attr( $tidy_single_thumbnail ); ?>"><?php the_post_thumbnail( $tidy_single_thumbnail ); ?></div>
			<?php endif; ?>
				<?php if ( $tidy_single_meta_date > 0 ) tidy_posted_on(); ?>
				<span class="entry-ac">
				<?php if ( $tidy_single_meta_author > 0 ) tidy_posted_author(); ?>
				<?php if ( $tidy_single_meta_cat > 0 ) tidy_posted_category(); ?>
				<?php
					if ( $tidy_single_meta_tag > 0 ) {
						/* translators: used between list items, there is a space after the comma */
						$tidy_tag_list = get_the_tag_list( '', __( ', ', 'tidy' ) );
	
						if ( '' != $tidy_tag_list ) {
							echo '<span class="entry_tags"><span class="icon-tag"></span> ' . $tidy_tag_list . '</span>';
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
