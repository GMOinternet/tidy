<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Tidy
 */
$tidy_layout = tidy_of_get_option( 'arc_c', 'cont_s2' );
$tidy_icon   = tidy_of_get_option( 'arc_icon', 'pencil' );
$tidy_arc_title  = tidy_of_get_option( 'arc_title',  __( 'Blog Archive', 'tidy' ) );
get_header(); ?>

	<section id="primary" class="content-area <?php echo esc_attr( $tidy_layout ); ?>">
		<main id="main" class="site-main" role="main">

		<div class="archive-header"><h1 class="archive-title"><span class="icon-<?php echo esc_attr( $tidy_icon ); ?>"></span> <?php echo esc_html( $tidy_arc_title ); ?></h1></div>
		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
						if ( is_category() ) :
							printf( __( 'Category: %s', 'tidy' ), '<span>' . single_cat_title( '', false ) . '</span>' );

						elseif ( is_tag() ) :
							printf( __( 'Tag: %s', 'tidy' ), '<span>' . single_tag_title( '', false ) . '</span>' );

						elseif ( is_author() ) :
							/* Queue the first post, that way we know
							 * what author we're dealing with (if that is the case).
							*/
							the_post();
							printf( __( 'Author: %s', 'tidy' ), '<span class="vcard">' . get_the_author() . '</span>' );
							/* Since we called the_post() above, we need to
							 * rewind the loop back to the beginning that way
							 * we can run the loop properly, in full.
							 */
							rewind_posts();

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'tidy' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'tidy' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'tidy' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'tidy' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'tidy' ) ) . '</span>' );

						elseif ( is_tax( 'post_format' ) ) :
							printf( __( 'Post format: %s', 'tidy' ), '<span>' . single_term_title( '', false ) . '</span>' );

						else :
							_e( 'Archives', 'tidy' );

						endif;
					?>
				</h1>
				<?php
					// Show an optional term description.
					$tidy_term_description = term_description();
					if ( ! empty( $tidy_term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $tidy_term_description );
					endif;
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content' ); ?>

			<?php endwhile; ?>

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
