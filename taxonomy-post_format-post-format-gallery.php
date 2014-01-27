<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Tidy
 */

$layout = of_get_option( 'port_c', 'cont_s2' );
$icon   = of_get_option( 'port_icon', 'notebook' );
$title  = of_get_option( 'port_title',  __( 'Portfolio', 'tidy' ) );
$cont_c = of_get_option( 'port_cont_c', '3' );
$port_d = of_get_option( 'port_d', 'normal' );
get_header(); ?>

	<section id="primary" class="content-area <?php echo esc_attr( $layout ); ?>">
		<main id="main" class="site-main" role="main">
		
		<header class="archive-header"><h1 class="archive-title"><span class="icon-<?php echo esc_attr( $icon ); ?>"></span> <?php echo  esc_html( $title ); ?></h1></header>
		<div class="front-section-content gallery-section-content gallery-<?php echo esc_attr( $cont_c ); ?> <?php echo esc_attr( $port_d ); ?>">
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>

			<?php endwhile; ?>

			<?php tidy_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
		</div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
	if ( $layout == 'cont_s1' or $layout == 'cont_s2' ) {
		$side = ( $layout == 'cont_s1' ) ? 'left' : 'right';
		get_sidebar();
	}
?>
<?php get_footer(); ?>
