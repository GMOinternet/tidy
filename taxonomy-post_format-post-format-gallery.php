<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Tidy
 */

$tidy_layout = tidy_of_get_option( 'port_c', 'cont_s2' );
$tidy_icon   = tidy_of_get_option( 'port_icon', 'notebook' );
$tidy_port_title  = tidy_of_get_option( 'port_title',  __( 'Portfolio', 'tidy' ) );
$tidy_cont_c = tidy_of_get_option( 'port_cont_c', '3' );
$tidy_port_d = tidy_of_get_option( 'port_d', 'normal' );
get_header(); ?>

	<section id="primary" class="content-area <?php echo esc_attr( $tidy_layout ); ?>">
		<main id="main" class="site-main" role="main">
		
		<header class="archive-header"><h1 class="archive-title"><span class="icon-<?php echo esc_attr( $tidy_icon ); ?>"></span> <?php echo  esc_html( $tidy_port_title ); ?></h1></header>
		<div class="front-section-content gallery-section-content gallery-<?php echo esc_attr( $tidy_cont_c ); ?> <?php echo esc_attr( $tidy_port_d ); ?>">
		<?php if ( have_posts() ) : ?>
			 
			<?php /* Start the Loop */ ?>
			<div class="gallery-section-content-inner clearfix">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>

			<?php endwhile; ?>
			</div>

			<?php tidy_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
		</div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
	if ( $tidy_layout == 'cont_s1' or $tidy_layout == 'cont_s2' ) {
		$tidy_side = ( $tidy_layout == 'cont_s1' ) ? 'left' : 'right';
		get_sidebar();
	}
?>
<?php get_footer(); ?>
