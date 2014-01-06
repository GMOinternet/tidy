<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Tidy
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<?php do_action( 'tidy_before_primary' ); ?>
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="archive-header">
				<?php do_action( 'tidy_before_page_header' ); ?>
				<h1 class="archive-title"><span class="icon-search"></span> <?php printf( __( 'Search Results for: %s', 'tidy' ), get_search_query() ); ?></h1>
				<?php do_action( 'tidy_after_page_header' ); ?>
			</header><!-- .archive-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'search' ); ?>

			<?php endwhile; ?>

			<?php tidy_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
		<?php do_action( 'tidy_after_primary' ); ?>
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
