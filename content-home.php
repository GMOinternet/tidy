<?php
/**
 * @package Tidy
 */
global $blog_type;

$meta_date     = of_get_option( 'all_blog_meta_date', 1 );
$meta_author   = of_get_option( 'all_blog_meta_author', 1 );
$meta_cat      = of_get_option( 'all_blog_meta_cat', 1 );
//$meta_tag      = of_get_option( 'all_blog_meta_tag', 1  );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $blog_type ); ?>>

	<div class="tidy_post_thumbnail tidy-thumb-blog-large"><a href="<?php the_permalink(); ?>" rel="bookmark"><span class="thumbnail_img">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'tidy-thumb-blog-large' ); ?>
		<?php else: ?>
			<img src="<?php echo get_template_directory_uri(); ?>/images/tidy-thumb-blog-large.png" alt="*">
		<?php endif; ?>
	</span></a></div>

	<div class="entry-conteiner">

		<header class="entry-header">
			<?php do_action( 'tidy_before_entry_header' ); ?>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title() ?></a></h1>
			<?php do_action( 'tidy_after_entry_header' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-summary">
			<?php the_excerpt(); //echo tidy_ellipsis( get_the_excerpt(), $excerpt_trm ); ?>
			<div class="more-link">
				<a class="read-more" href="<?php the_permalink(); ?>" rel="bookmark"><span class="genericon genericon-rightarrow"></span><?php _e( 'Read More', 'tidy' ) ?></a>
			</div>
		</div><!-- .entry-summary -->

		<footer class="entry-meta">
			<?php if ( $meta_date > 0 ) tidy_posted_on(); ?>
			<?php if ( $meta_author > 0 ) tidy_posted_author(); ?>
			<?php if ( $meta_cat > 0 ) tidy_posted_category(); ?>
			<?php edit_post_link( __( 'Edit', 'tidy' ), '<div class="edit-link"><span class="icon-pencil"></span> ', '</div>' ); ?>
			<?php do_action( 'tidy_after_entry_meta' ); ?>
		</footer><!-- .entry-meta -->
	</div>


</article><!-- #post-## -->
