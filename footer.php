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

	<?php
		if ( is_archive() ) {
			get_template_part( 'categorylist' );
		}
	?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		
		<?php do_action( 'tidy_before_footer' ); ?>

		<div class="site-footer-widget-area"><div class="inner">
			<div class="site-footer-widget-area-box">

				<div class="site-footer-widget-area-conteiner">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div>
		
				<div class="site-footer-widget-area-conteiner">
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</div>
		
				<div class="site-footer-widget-area-conteiner">
					<?php dynamic_sidebar( 'footer-3' ); ?>
				</div>
		
				<div class="site-footer-widget-area-conteiner">
					<?php dynamic_sidebar( 'footer-4' ); ?>
				</div>

			</div><!-- .site-footer-widget-area-box -->

			<?php $view_sns_footer = of_get_option('sns-location-footer', 1); ?>
			<?php if ( $view_sns_footer > 0 ) : ?>
			<div id="site-footer-social" class="site-footer-social-area">
				<?php tidy_sns_lists(); ?>
			</div>
			<?php endif; ?>
	
		</div></div>

		<div class="site-info"><div class="inner">
			<?php
				$tidy_default = tidy_default_array();
				$copyright = ( get_theme_mod( 'copyright' ) ) ? get_theme_mod( 'copyright' ) : $tidy_default['copyright'];
				echo esc_html( $copyright );
			?>
		</div></div><!-- .site-info -->
		<?php do_action( 'tidy_after_footer' ); ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<?php do_action( 'tidy_after_body' ); ?>
</body>
</html>