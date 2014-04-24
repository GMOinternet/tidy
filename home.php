<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Tidy
 */
$tidy_layout = tidy_of_get_option( 'blog_c', 'cont_s2' );
$tidy_icon   = tidy_of_get_option( 'all_blog_icon', 'pencil' );
$tidy_all_blog_title  = tidy_of_get_option( 'all_blog_title',  __( 'Blog Archive', 'tidy' ) );
$tidy_cont_c = tidy_of_get_option( 'all_blog_cont_c', '1' );

$tidy_blog_type = tidy_of_get_option( 'blog_type', 'typeA' );
if ( $tidy_layout != 'cont_c1') {
	$tidy_blog_type = 'typeA';
} else {
	if ( $tidy_cont_c == 3 ) {
		$tidy_blog_type = 'typeA';
	}
}
get_header(); ?>

	<section id="primary" class="content-area <?php echo esc_attr( $tidy_layout ); ?>">
		<main id="main" class="site-main" role="main">

		<div class="archive-header"><h1 class="archive-title"><span class="icon-<?php echo esc_attr( $tidy_icon ); ?>"></span> <?php echo esc_html( $tidy_all_blog_title ); ?></h1></div>
		<?php if ( have_posts() ) : ?>

			<div class="front-section-content all-blog blog-<?php echo esc_attr( $tidy_cont_c ); ?> <?php //echo esc_attr( $tidy_port_d ); ?>">
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
	if ( $tidy_layout == 'cont_s1' or $tidy_layout == 'cont_s2' ) {
		$tidy_side = ( $tidy_layout == 'cont_s1' ) ? 'left' : 'right';
		get_sidebar();
	}
?>
<?php get_footer(); ?>
