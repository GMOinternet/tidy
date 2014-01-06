<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Tidy
 */
?>

<section class="no-results not-found">
	<header class="archive-header">
		<?php do_action( 'tidy_before_page_header' ); ?>
		<h1 class="archive-title"><?php _e( 'Nothing Found', 'tidy' ); ?></h1>
		<?php do_action( 'tidy_after_page_header' ); ?>
	</header><!-- .archive-header -->

	<div class="page-content">
		<?php do_action( 'tidy_before_page_content' ); ?>
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'tidy' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'tidy' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'tidy' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
		<?php do_action( 'tidy_after_page_content' ); ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
