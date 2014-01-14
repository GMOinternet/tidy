<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Tidy
 */

get_header(); ?>

	<div id="merit-box-area" class="front-section"><div class="front-section-content merit-section-content">
		
		<?php get_template_part( 'meritbox' ) ?>
		<?php get_template_part( 'meritbox' ) ?>
		<?php get_template_part( 'meritbox', 'image' ) ?>
		<?php get_template_part( 'meritbox', 'image' ) ?>

	</div></div><!-- #merit-box-area -->

	<div id="primary" class="content-area">
		<?php do_action( 'tidy_before_primary' ); ?>
		<main id="main" class="site-main" role="main">

			<section id="blog-area" class="front-section">

				<header class="section-header">
					<h1 class="section-title"><span class="icon-pencil"></span><?php _e( 'Blog', 'tidy' ); ?></h1>
				</header>

				<?php if ( have_posts() ) : ?>
					<div class="front-section-content blog-section-content">
					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', 'typeB' ); ?>
					<?php endwhile; ?>
					</div>
					<?php //tidy_paging_nav(); ?>
				<?php else : ?>
					<?php get_template_part( 'content', 'none' ); ?>
				<?php endif; ?>

			</section><!-- #blog-area -->

			<section id="gallery-area" class="front-section ">
				<header class="section-header">
					<h1 class="section-title"><span class="icon-notebook"></span><?php _e( 'Portfolio', 'tidy' ); ?></h1>
				</header>
				<?php
				$args = array(
					'posts_per_page' => 5,
					'tax_query'      => array(
							array(
								'taxonomy' => 'post_format',
								'field'    => 'slug',
								'terms'    => 'post-format-gallery'
							)
						)
					);
				$tidy_gallery_posts = get_posts( $args );
				?>
				
				<?php if ( !empty( $tidy_gallery_posts ) ) : ?>
					<div class="front-section-content gallery-section-content">
					<?php foreach ( $tidy_gallery_posts as $post ) : setup_postdata( $post ); ?>
						<?php get_template_part( 'content', get_post_format() ); ?>
					<?php endforeach; ?>
					</div>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			</section>
		</main><!-- #main -->
		<?php do_action( 'tidy_after_primary' ); ?>
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
