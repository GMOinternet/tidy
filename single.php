<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Tidy
 */

$post_id = $wp_query->get_queried_object_id();
$post_format = get_post_format( $post_id );
$port_nav = "";
if ( $post_format == "gallery" ) {
	$type = 'portfolio';
	$layout = of_get_option( 'port_c', 'cont_s2' );
	$port_nav = of_get_option( 'port_nav', 'bottom' );
	$galleryicon   = of_get_option( 'home_port_icon', 'notebook' );
	$gallerytitle  = of_get_option( 'home_port_title',  __( 'Portfolio', 'tidy' ) );
} else {
	$type = 'single';
	$layout = of_get_option( 'single_c', 'cont_s2' );
}
get_header(); ?>

	<div id="primary" class="content-area <?php echo esc_attr( $layout ); ?>">
		<?php do_action( 'tidy_before_primary' ); ?>
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
			<?php if ( $post_format == "gallery") : ?>
			<div class="section-header">
				<h1 class="section-title"><a href="<?php echo get_post_format_link( 'gallery' ); ?>"><span class="icon-<?php echo esc_attr( $galleryicon ); ?>"></span> <?php echo esc_html( $gallerytitle ); ?></a></h1>
			</div>
			<?php endif; ?>

			<?php
				if ( $post_format == "gallery" ) {
					if ($port_nav == 'top') {
						tidy_portfolio_posts_slider( get_the_ID(), $port_nav );
					}
				}
			?>

			<?php get_template_part( 'content', $type ); ?>

			<?php
				if ( $post_format == "gallery") {
					if ($port_nav == 'bottom') {
						tidy_portfolio_posts_slider( get_the_ID(), $port_nav );
					}
				} else {
					tidy_post_nav();
				}
			?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
		<?php do_action( 'tidy_after_primary' ); ?>
	</div><!-- #primary -->

<?php
	if ( $layout == 'cont_s1' or $layout == 'cont_s2' ) {
		$side = ( $layout == 'cont_s1' ) ? 'left' : 'right';
		get_sidebar();
	}
?>
<?php get_footer(); ?>