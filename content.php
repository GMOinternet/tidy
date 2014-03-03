<?php
/**
 * @package Tidy
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'archive-content' ); ?>>

	<div class="tidy_post_thumbnail tidy-thumb-tiny"><a href="<?php the_permalink(); ?>" rel="bookmark"><span class="thumbnail_img">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'tidy-thumb-tiny' ); ?>
		<?php else: ?>
			<img src="<?php echo get_template_directory_uri(); ?>/images/tidy-thumb-tiny.png" alt="*">
		<?php endif; ?>
	</span></a></div>

	<div class="entry-conteiner">

		<header class="entry-header">
			<?php do_action( 'tidy_before_entry_header' ); ?>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<?php do_action( 'tidy_after_entry_header' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-summary">
			<?php the_excerpt(); ?>
			<div class="more-link">
				<a class="read-more" href="<?php the_permalink(); ?>" rel="bookmark"><span class="genericon genericon-rightarrow"></span><?php _e( 'Read More', 'tidy' ) ?></a>
			</div>
		</div><!-- .entry-summary -->

		<footer class="entry-meta">
			<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
				<?php tidy_posted_on(); ?>
				<?php tidy_posted_author(); ?>
				<?php tidy_posted_category(); ?>
			<?php endif; // End if 'post' == get_post_type() ?>
			<?php edit_post_link( __( 'Edit', 'tidy' ), '<span class="edit-link"><span class="icon-pencil"></span> ', '</span>' ); ?>
	
			<?php /*
	if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link"><span class="genericon genericon-chat"></span> <?php comments_popup_link( __( 'Leave a comment', 'tidy' ), __( '1 Comment', 'tidy' ), __( '% Comments', 'tidy' ) ); ?></span>
			<?php endif;
	*/ ?>
	
		</footer><!-- .entry-meta -->

	</div>

</article><!-- #post-## -->
