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
$tidy_layout = tidy_of_get_option( 'home_c', 'cont_s2' );
get_header(); ?>

	<?php // merit-box-area
		$tidy_merit_box_toggle = tidy_of_get_option( 'meritbox_toggle', 0 );
		$tidy_merit_box = tidy_of_get_option( 'merit-box-num', 4 );
		if ( $tidy_merit_box_toggle > 0) :
	?>
	<div id="merit-box-area" class="front-section"><div class="front-section-content merit-section-content">
		<?php
			for ( $i = 1; $i <= $tidy_merit_box; $i++ ) {
				get_template_part( 'meritbox' );
			}
		?>
	</div></div><!-- #merit-box-area -->
	<?php endif; ?>

	<div id="primary" class="content-area <?php echo esc_attr( $tidy_layout ); ?>">
		<?php do_action( 'tidy_before_primary' ); ?>
		<main id="main" class="site-main" role="main">

			<?php
				$tidy_home_blog_num = (int)tidy_of_get_option( 'home_blog_num', 6 );
				if ( $tidy_home_blog_num > 0 ) :
					$tidy_home_blog_icon  = tidy_of_get_option( 'home_blog_icon', 'pencil' );
					$tidy_home_blog_title = tidy_of_get_option( 'home_blog_title',  _x( 'Blog', 'Front page', 'tidy' ) );
					$tidy_blog_type = ( $tidy_layout == 'cont_c1' ) ? 'typeB' : 'typeA' ;
					$tidy_blogargs = array(
						'posts_per_page' => $tidy_home_blog_num,
						'tax_query'      => array(
								array(
									'taxonomy' => 'post_format',
									'field'    => 'slug',
									'terms'    => 'post-format-gallery',
									'operator' => 'NOT IN'
								)
							)
						);
					$tidy_blog_posts = get_posts( $tidy_blogargs );
				?>
				<section id="blog-area" class="front-section">
				<?php if ( !empty( $tidy_blog_posts ) ) : ?>
					<header class="section-header">
						<h1 class="section-title">
							<?php if ( get_option('show_on_front') == "page" && get_option('page_for_posts') > 0 ) : ?>
								<a href="<?php echo get_page_link( get_option('page_for_posts')); ?>" class="read-more"><span class="icon-<?php echo esc_attr( $tidy_home_blog_icon ); ?>"></span> <?php echo esc_html( $tidy_home_blog_title ); ?></a>
							<?php else: ?>
								<span class="icon-<?php echo esc_attr( $tidy_home_blog_icon ); ?>"></span> <?php echo esc_html( $tidy_home_blog_title ); ?>
							<?php endif; ?>
							</h1>
					</header>
					<div class="front-section-content blog-section-content">
					<?php foreach ( $tidy_blog_posts as $post ) : setup_postdata( $post ); ?>
						<?php get_template_part( 'content', 'blog' ); ?>
					<?php endforeach; ?>
					</div>
					<?php if ( get_option('show_on_front') == "page" && get_option('page_for_posts') > 0 ) : ?>
					<div class="more-link archive-link">
						<a href="<?php echo get_page_link( get_option('page_for_posts')); ?>" class="read-more"><span class="genericon genericon-rightarrow"></span>More</a>
					</div>
					<?php endif; ?>
				<?php else : ?>
						<?php get_template_part( 'content', 'none' ); ?>
				<?php endif; ?>
				</section><!-- #blog-area -->
				<?php wp_reset_postdata(); ?>
			<?php endif; // if ( $tidy_home_blog_num > 0 ) ?>

			<?php
			$tidy_home_port_num = (int)tidy_of_get_option( 'home_port_num', 3 );

			if ( $tidy_home_port_num > 0 ) :
				$tidy_home_port_icon   = tidy_of_get_option( 'home_port_icon', 'notebook' );
				$tidy_home_port_title  = tidy_of_get_option( 'home_port_title',  __( 'Portfolio', 'tidy' ) );
				$tidy_homeport_cont_c   = tidy_of_get_option( 'homeport_cont_c', '3' );
				$tidy_port_d = 'normal';
				$tidy_gallery_posts_args = array(
					'posts_per_page' => $tidy_home_port_num,
					'tax_query'      => array(
							array(
								'taxonomy' => 'post_format',
								'field'    => 'slug',
								'terms'    => 'post-format-gallery'
							)
						)
					);
				$tidy_gallery_posts = get_posts( $tidy_gallery_posts_args );
			?>
				<?php if ( !empty( $tidy_gallery_posts ) ) : ?>
				<section id="gallery-area" class="front-section">
					<header class="section-header">
						<h1 class="section-title"><a href="<?php echo get_post_format_link( 'gallery' ); ?>"><span class="icon-<?php echo esc_attr( $tidy_home_port_icon ); ?>"></span> <?php echo esc_html( $tidy_home_port_title ); ?></a></h1>
					</header>
					<div class="front-section-content gallery-section-content gallery-<?php echo esc_attr( $tidy_homeport_cont_c ); ?> <?php echo esc_attr( $tidy_port_d ); ?>">
					<?php foreach ( $tidy_gallery_posts as $post ) : setup_postdata( $post ); ?>
						<?php get_template_part( 'content', get_post_format() ); ?>
					<?php endforeach; ?>
					</div>
					<div class="more-link archive-link">
						<a href="<?php echo get_post_format_link( 'gallery' ); ?>" class="read-more"><span class="genericon genericon-rightarrow"></span>More</a>
					</div>
				</section>
				<?php endif; ?>
			<?php wp_reset_postdata(); ?>
			<?php endif; // if ( $tidy_home_port_num > 0 ) ?>

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
