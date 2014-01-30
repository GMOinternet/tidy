<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Tidy
 */

$post_id = $wp_query->get_queried_object_id();
$post_format = get_post_format( $post_id );
if ( $post_format == "gallery") {
	$layout = of_get_option( 'port_c', 'cont_s2' );
	$type = 'portfolio';
} else {
	$layout = of_get_option( 'blog_c', 'cont_s2' );
	$type = 'single';
}
get_header(); ?>

	<div id="primary" class="content-area <?php echo esc_attr( $layout ); ?>">
		<?php do_action( 'tidy_before_primary' ); ?>
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', $type ); ?>

			<?php
				if ( $post_format == "gallery") {
					$now = get_the_id();
					$args = array(
						'posts_per_page' => -1,
						'tax_query'      => array(
								array(
									'taxonomy' => 'post_format',
									'field'    => 'slug',
									'terms'    => 'post-format-gallery'
								)
							)
						);
					$tidy_gallery_posts = get_posts( $args );
					if ( !empty( $tidy_gallery_posts ) ) : ?>
						<div class="navigation gallery-navigation"><ul id="port_bxslider" class="bxslider">
						<?php foreach ( $tidy_gallery_posts as $post ) :
						setup_postdata( $post ); 
						$active = ($now == get_the_id()) ? 'active' : '';
						?>
							<li class="tidy_post_thumbnail tidy-thumb-portfolio <?php echo $active; ?>"><a href="<?php the_permalink() ?>">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'tidy-thumb-portfolio' ); ?>
							<?php else: ?>
								<img src="<?php echo get_template_directory_uri(); ?>/images/tidy-thumb-portfolio.png" alt="*">
							<?php endif; ?>
							</a></li>
						<?php
						endforeach; ?>
						</ul></div>
					<?php endif;
					wp_reset_postdata();


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