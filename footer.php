<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Tidy
 */
?>

		<?php do_action( 'tidy_after_content' ); ?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		
		<?php do_action( 'tidy_before_footer' ); ?>

		<div class="site-footer-widget-area"><div class="inner">
		<?php if ( ! dynamic_sidebar( 'footer-1' ) ) : ?>

			<aside id="about-us" class="widget">
				<h1 class="widget-title"><?php _e( 'About Us', 'tidy' ); ?></h1>
				<div>text</div>
			</aside>

			<aside id="tag_cloud" class="widget">
				<h1 class="widget-title"><?php _e( 'Tags', 'tidy' ); ?></h1>
				<?php wp_tag_cloud(); ?>
			</aside>

			<aside id="archives" class="widget">
				<h1 class="widget-title"><?php _e( 'Recent', 'Post' ); ?></h1>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</aside>

			<aside id="meta" class="widget">
				<h1 class="widget-title"><?php _e( 'Contact', 'tidy' ); ?></h1>
			</aside>

		<?php endif; // end sidebar widget area ?>
		</div></div>

		<div class="site-info"><div class="inner">
			&copy; 2013 GMO Internet Pte Ltd. All Rights Reserved.
		</div></div><!-- .site-info -->
		<?php do_action( 'tidy_after_footer' ); ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<?php do_action( 'tidy_after_body' ); ?>
</body>
</html>