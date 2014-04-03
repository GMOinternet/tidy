<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Tidy
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php do_action( 'tidy_before_entry_header' ); ?>
		<?php if ( is_page_template( 'contact.php' ) ) : ?>
		<?php 
			$ctitle = of_get_option( 'cont_a_title', 'About' );
			$icon = of_get_option( 'cont_a_icon', 'quill' );
		?>
			<h1 class="entry-title"><span class="icon-<?php echo esc_attr( $icon ); ?>"></span> <?php echo esc_html( $ctitle ); ?></h1>
		<?php else : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php endif; ?>
		<?php do_action( 'tidy_after_entry_header' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php do_action( 'tidy_before_entry_content' ); ?>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'tidy' ),
				'after'  => '</div>',
			) );
		?>
		<?php do_action( 'tidy_after_entry_content' ); ?>
	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', 'tidy' ), '<footer class="entry-meta"><span class="edit-link"><span class="icon-pencil"></span> ', '</span></footer>' ); ?>
</article><!-- #post-## -->
