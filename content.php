<?php
/**
 * @package Tidy
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-conteiner">
		<header class="entry-header">
			<?php do_action( 'tidy_before_entry_header' ); ?>
	
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	
			<?php do_action( 'tidy_after_entry_header' ); ?>
		</header><!-- .entry-header -->
	
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	
		<footer class="entry-meta">
			<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
				<?php tidy_posted_on(); ?>
				<span class="entry_category"><span class="icon-folder-open"></span> <?php the_category( ', ' ); ?></span>
				<?php
					/* translators: used between list items, there is a space after the comma */
					$tag_list = get_the_tag_list( '', __( ', ', 'tidy' ) );
	
					if ( '' != $tag_list ) {
						echo '<span class="entry_tags"><span class="icon-tag"></span> ' . $tag_list . '</span>';
					}
				?>
				<?php edit_post_link( __( 'Edit', 'tidy' ), '<span class="edit-link">', '</span>' ); ?>
	
			<?php endif; // End if 'post' == get_post_type() ?>
	
			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'tidy' ), __( '1 Comment', 'tidy' ), __( '% Comments', 'tidy' ) ); ?></span>
			<?php endif; ?>
	
		</footer><!-- .entry-meta -->
	</div>

	<div class="tidy_post_thumbnail tidy-thumb-tiny entry-post_thumbnail"><a href="<?php the_permalink(); ?>" rel="bookmark">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'tidy-thumb-tiny' ); ?>
		<?php else: ?>
			<img src="<?php echo get_template_directory_uri(); ?>//images/tidy-thumb-tiny.png" alt="*">
		<?php endif; ?>
	</a></div>

</article><!-- #post-## -->
