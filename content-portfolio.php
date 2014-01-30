<?php
/**
 * @package Tidy
 */

$galleryicon   = of_get_option( 'home_port_icon', 'notebook' );
$gallerytitle  = of_get_option( 'home_port_title',  __( 'Portfolio', 'tidy' ) );
?>

<div class="section-header">
	<h1 class="section-title"><a href="<?php echo get_post_format_link( 'gallery' ); ?>"><span class="icon-<?php echo esc_attr( $galleryicon ); ?>"></span><?php echo esc_html( $gallerytitle ); ?></a></h1>
</div>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php do_action( 'tidy_before_entry_header' ); ?>

	<div class="portfolio">
	<?php // attachment_gallery
		$args = array( 'post_type' => 'attachment', 'posts_per_page' => -1, 'post_status' =>'any', 'post_parent' => $post->ID ); 
		$attachments = get_posts( $args );
		if ( $attachments ) {
			echo '<ul id="portfolio_slider"" class="bxslider">' . "\n";
			foreach ( $attachments as $attachment ) {
				echo "<li>";
				the_attachment_link( $attachment->ID , true, false, false );
				echo "</li>\n";
			}
			echo '</ul>' . "\n";;
			echo '<div id="bx-pager">' . "\n";
			$cnt = 0;
			foreach ( $attachments as $attachment ) {
				$image_attributes = wp_get_attachment_image_src( $attachment->ID, array(50, 50) );
				echo'<a data-slide-index="' . $cnt . '" href="#">' . '<img src="' . $image_attributes[0] . '" alt="*">' . '</a>';
				$cnt ++;
			}
			echo '</div>' . "\n";;
		} else {
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'tidy-thumb-full' );
			}
		}
	?>
	</div>

	<header class="entry-header">
		<h2 class="entry-title"><?php the_title(); ?></h2>

		<div class="entry-meta">
			<div class="tidy_posted_on">
				<?php tidy_posted_on(); ?>
				<span class="entry_category"><span class="icon-folder-open"></span> <?php the_category( ', ' ); ?></span>
				<?php
					/* translators: used between list items, there is a space after the comma */
					$tag_list = get_the_tag_list( '', __( ', ', 'tidy' ) );

					if ( '' != $tag_list ) {
						echo '<span class="entry_tags"><span class="icon-tag"></span> ' . $tag_list . '</span>';
					}
				?>
				<?php edit_post_link( __( 'Edit', 'tidy' ), '<span class="edit-link"><span class="icon-pencil"></span> ', '</span>' ); ?>
			</div>
		</div><!-- .entry-meta -->
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
	</div><!-- .entry-content -->

</article><!-- #post-## -->
