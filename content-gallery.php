<?php
/**
 * @package Tidy
 */
global $port_d;
$port_content = of_get_option( 'port_content', 'type1' );

$title_trm_home = apply_filters( 'tidy_portfolio_home_title_trm_word', 50);
$title_trm_archive = apply_filters( 'tidy_portfolio_archive_title_trm_word', 80);
$excerpt_trm = apply_filters( 'tidy_portfolio_excerpt_trm_word', 130);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $port_content ); ?>>

	<div class="entry-box">
		<div class="tidy_post_thumbnail tidy-thumb-portfolio"><a href="<?php the_permalink(); ?>" rel="bookmark"><span class="thumbnail_img">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'tidy-thumb-portfolio' ); ?>
			<?php else: ?>
				<img src="<?php echo get_template_directory_uri(); ?>/images/tidy-thumb-portfolio.png" alt="*">
			<?php endif; ?>
		</span></a></div>

		<div class="entry-conteiner"><div class="entry-conteiner-child">
			<?php if ( is_front_page() ) : ?>
				<div class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo tidy_ellipsis( the_title('', '', false), $title_trm_home ); ?></a></div>
				<div class="entry-summary"><?php the_excerpt(); ?></div>
				<div class="entry-meta"><?php do_action( 'tidy_after_entry_meta' ); ?></div>
			<?php else: ?>
				<a href="<?php the_permalink(); ?>" rel="bookmark" class="entry-conteiner-child-anker">
					<?php if ( $port_content == 'type1') : ?>
						<div class="entry-title"><?php echo tidy_ellipsis( the_title('', '', false), $title_trm_archive ); ?></div>
					<?php endif; ?>
				</a>
			<?php endif; ?>
		</div></div>
	</div>

	<?php if ( ! is_front_page() ) : ?>
		<?php if ( $port_content != "type1") : ?>
		<header class="entry-header show">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header><!-- .entry-header -->
		<?php endif; ?>
	
		<?php if ( $port_content == "type3") : ?>
		<div class="entry-summary show">
			<p><?php echo tidy_ellipsis( get_the_excerpt(), $excerpt_trm ); ?></p>
		</div><!-- .entry-summary -->
		<?php endif; ?>
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php tidy_posted_on(); ?>
			<div class="entry-ac">
			<?php tidy_posted_author(); ?>
			<?php tidy_posted_category(); ?>
			</div>
		<?php endif; // End if 'post' == get_post_type() ?>
		<?php edit_post_link( __( 'Edit', 'tidy' ), '<div class="edit-link"><span class="icon-pencil"></span> ', '</div>' ); ?>
		<?php if ( ! is_front_page() ) : ?>
			<?php do_action( 'tidy_after_entry_meta' ); ?>
		<?php endif; ?>
	</footer><!-- .entry-meta -->

</article><!-- #post-## -->
