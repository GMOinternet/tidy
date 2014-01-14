<?php
/**
 * @package Tidy
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( get_post_format() ); ?>>

	<a href="<?php the_permalink(); ?>" rel="bookmark" class="entry-box">
		<div class="tidy_post_thumbnail tidy-thumb-portfolio">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'tidy-thumb-portfolio' ); ?>
			<?php else: ?>
				<img src="<?php echo get_template_directory_uri(); ?>/images/tidy-thumb-portfolio.png" alt="*">
			<?php endif; ?>
		</div>

		
		<div class="entry-conteiner">
			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->

			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		</div>
	</a>

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php tidy_posted_on(); ?>
		<?php edit_post_link( __( 'Edit', 'tidy' ), '<span class="edit-link"><span class="icon-pencil"></span> ', '</span>' ); ?>
			<span class="entry_category"><span class="icon-folder-open"></span> <?php the_category( ', ' ); ?></span>
		<?php endif; // End if 'post' == get_post_type() ?>

	</footer><!-- .entry-meta -->

</article><!-- #post-## -->
