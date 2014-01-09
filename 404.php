<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Tidy
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="archive-header">
					<h1 class="archive-title"><span class="icon-warning"></span><?php _e( '404 - File or directory not found.', 'tidy' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php _e( 'The resource you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'tidy' ); ?></p>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>