<?php
/**
 * @package Tidy
 */
$port_content = of_get_option( 'port_content', 'type1' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $port_content ); ?>>

	<div class="entry-box">
		<div class="tidy_post_thumbnail tidy-thumb-portfolio"><a href="<?php the_permalink(); ?>" rel="bookmark">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'tidy-thumb-portfolio' ); ?>
			<?php else: ?>
				<img src="<?php echo get_template_directory_uri(); ?>/images/tidy-thumb-portfolio.png" alt="*">
			<?php endif; ?>
		</a></div>

		<div class="entry-conteiner">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><div class="entry-title"><?php the_title(); ?></div>
			<div class="entry-summary"><?php the_excerpt(); ?></div></a>
			<div class="entry-meta"><?php do_action( 'tidy_after_entry_meta' ); ?></div>
		</div>
	</div>

	<?php if ( $port_content != "type1") : ?>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->
	<?php endif; ?>

	<?php if ( $port_content == "type3") : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php tidy_posted_on(); ?>
			<span class="entry_category"><span class="icon-folder-open"></span> <?php the_category( ', ' ); ?></span>
		<?php endif; // End if 'post' == get_post_type() ?>
		<?php edit_post_link( __( 'Edit', 'tidy' ), '<span class="edit-link"><span class="icon-pencil"></span> ', '</span>' ); ?>

	</footer><!-- .entry-meta -->

</article><!-- #post-## -->
