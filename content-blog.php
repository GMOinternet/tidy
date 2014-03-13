<?php
/**
 * @package Tidy
 */
global $blog_type;

$title_trm = apply_filters( 'tidy_blog_title_trm_word', 85 );
$excerpt_trm = apply_filters( 'tidy_blog_excerpt_trm_word', 130 );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $blog_type ); ?>>

	<div class="tidy_post_thumbnail tidy-thumb-blog"><a href="<?php the_permalink(); ?>" rel="bookmark"><span class="thumbnail_img">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'tidy-thumb-blog' ); ?>
		<?php else: ?>
			<img src="<?php echo get_template_directory_uri(); ?>/images/tidy-thumb-blog.png" alt="*">
		<?php endif; ?>
	</span></a></div>

	<div class="entry-conteiner">

		<header class="entry-header">
			<?php do_action( 'tidy_before_entry_header' ); ?>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo tidy_ellipsis( the_title('', '', false), $title_trm ); ?></a></h1>
			<?php do_action( 'tidy_after_entry_header' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-summary">
			<p><?php echo tidy_ellipsis( get_the_excerpt(), $excerpt_trm ); ?></p>
			<div class="more-link">
				<a class="read-more" href="<?php the_permalink(); ?>" rel="bookmark"><span class="genericon genericon-rightarrow"></span><?php _e( 'Read More', 'tidy' ) ?></a>
			</div>
		</div><!-- .entry-summary -->

		<footer class="entry-meta">
			<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php tidy_posted_on(); ?>
			<div class="entry-ac">
			<?php tidy_posted_author(); ?>
			<?php tidy_posted_category(); ?>
			</div>
			<?php endif; // End if 'post' == get_post_type() ?>
			<?php edit_post_link( __( 'Edit', 'tidy' ), '<div class="edit-link"><span class="icon-pencil"></span> ', '</div>' ); ?>
			<?php do_action( 'tidy_after_entry_meta' ); ?>
		</footer><!-- .entry-meta -->
	</div>


</article><!-- #post-## -->
