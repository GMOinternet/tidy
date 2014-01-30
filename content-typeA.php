<?php
/**
 * @package Tidy
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'typeA' ); ?>>

	<div class="tidy_post_thumbnail tidy-thumb-blog"><a href="<?php the_permalink(); ?>" rel="bookmark">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'tidy-thumb-blog' ); ?>
		<?php else: ?>
			<img src="<?php echo get_template_directory_uri(); ?>/images/tidy-thumb-blog.png" alt="*">
		<?php endif; ?>
	</a></div>

	<div class="entry-conteiner">

		<header class="entry-header">
			<?php do_action( 'tidy_before_entry_header' ); ?>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<?php do_action( 'tidy_after_entry_header' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-summary">
			<div class="more-link">
				<a class="read-more" href="<?php the_permalink(); ?>" rel="bookmark"><span class="genericon genericon-rightarrow"></span><?php _e( 'Read More', 'tidy' ) ?></a>
			</div>
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

		<footer class="entry-meta">
			<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
				<?php tidy_posted_on(); ?>
				<span class="entry_category"><span class="icon-folder-open"></span> <?php the_category( ', ' ); ?></span>
			<?php endif; // End if 'post' == get_post_type() ?>
			<?php edit_post_link( __( 'Edit', 'tidy' ), '<span class="edit-link"><span class="icon-pencil"></span> ', '</span>' ); ?>
			<?php do_action( 'tidy_after_entry_meta' ); ?>
		</footer><!-- .entry-meta -->
	</div>


</article><!-- #post-## -->
