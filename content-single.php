<?php
/**
 * @package Tidy
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php do_action( 'tidy_before_entry_header' ); ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="tidy_post_thumbnail tidy-thumb-medium"><?php the_post_thumbnail( 'tidy-thumb-medium' ); ?></div>
			<?php endif; ?>
			<div class="tidy_posted_on">
				<?php tidy_posted_on(); ?>
				<span class="entry_category"><span class="icon-folder-open"></span> <?php the_category( ', ' ); ?></span>
				<?php
					/* translators: used between list items, there is a space after the comma */
					$tag_list = get_the_tag_list( '', __( ', ', 'tidy' ) );

					if ( '' != $tag_list ) {
						echo '<span class="entry_tags"><span class="icon-tag"></span> ' . $tag_list . '</span>';
					}
				?>
				<?php edit_post_link( __( 'Edit', 'tidy' ), '<span class="edit-link"><span class="icon-pencil"></span> ', '</span>' ); ?>
			</div>
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
		<?php do_action( 'tidy_after_entry_content' ); ?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
