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
$tidy_layout = tidy_of_get_option( 'arc_c', 'cont_s2' );
$tidy_icon = tidy_of_get_option( 'arc_icon', 'pencil' );
$tidy_arc_title  = tidy_of_get_option( 'arc_title',  __( 'Blog Archive', 'tidy' ) );
get_header(); ?>

	<div id="primary" class="content-area <?php echo esc_attr( $tidy_layout ); ?>">
		<?php do_action( 'tidy_before_primary' ); ?>
		<main id="main" class="site-main" role="main">

		<div class="archive-header"><h1 class="archive-title"><span class="icon-<?php echo esc_attr( $tidy_icon ); ?>"></span> <?php echo  esc_html( $tidy_arc_title ); ?></h1></div>

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content' ); ?>

			<?php endwhile; ?>

			<?php tidy_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
		<?php do_action( 'tidy_after_primary' ); ?>
	</div><!-- #primary -->

<?php
	if ( $tidy_layout == 'cont_s1' or $tidy_layout == 'cont_s2' ) {
		$tidy_side = ( $tidy_layout == 'cont_s1' ) ? 'left' : 'right';
		get_sidebar();
	}
?>
<?php get_footer(); ?>
