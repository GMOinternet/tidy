<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Tidy
 */
$layout = of_get_option( 'blog_c', 'cont_s2' );
$icon   = of_get_option( 'all_blog_icon', 'pencil' );
$title  = of_get_option( 'all_blog_title',  __( 'Blog Archive', 'tidy' ) );
$cont_c = of_get_option( 'all_blog_cont_c', '1' );
$blog_type  = ($cont_c == 1 && $layout == 'cont_c1') ? of_get_option( 'blog_type', 'typeA' ) : 'typeA';

get_header(); ?>

	<section id="primary" class="content-area <?php echo esc_attr( $layout ); ?>">
		<main id="main" class="site-main" role="main">

		<div class="archive-header"><h1 class="archive-title"><span class="icon-<?php echo esc_attr( $icon ); ?>"></span> <?php echo esc_html( $title ); ?></h1></div>
		<?php if ( have_posts() ) : ?>

			<div class="front-section-content all-blog blog-<?php echo esc_attr( $cont_c ); ?> <?php //echo esc_attr( $port_d ); ?>">
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'home' ); ?>

			<?php endwhile; ?>
			</div>

			<?php tidy_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
	if ( $layout == 'cont_s1' or $layout == 'cont_s2' ) {
		$side = ( $layout == 'cont_s1' ) ? 'left' : 'right';
		get_sidebar();
	}
?>
<?php get_footer(); ?>
