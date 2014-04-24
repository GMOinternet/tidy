<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Tidy
 */
$tidy_layout = tidy_of_get_option( 'arc_c', 'cont_s2' );
$tidy_icon   = tidy_of_get_option( 'ser_icon', 'search' );
$tidy_ser_title  = tidy_of_get_option( 'ser_title', __( 'Search Results for: %s', 'tidy' ) );
get_header(); ?>

	<section id="primary" class="content-area <?php echo esc_attr( $tidy_layout ); ?>">
		<?php do_action( 'tidy_before_primary' ); ?>
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="archive-header">
				<?php do_action( 'tidy_before_page_header' ); ?>
				<h1 class="archive-title"><span class="icon-<?php echo esc_attr( $tidy_icon ); ?>"></span> <?php printf( $tidy_ser_title, get_search_query() ); ?></h1>
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

<?php
	if ( $tidy_layout == 'cont_s1' or $tidy_layout == 'cont_s2' ) {
		$tidy_side = ( $tidy_layout == 'cont_s1' ) ? 'left' : 'right';
		get_sidebar();
	}
?>
<?php get_footer(); ?>
