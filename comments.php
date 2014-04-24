<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to tidy_comment() which is
 * located in the inc/template-tags.php file.
 *
 * @package Tidy
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<?php do_action( 'tidy_before_comments' ); ?>

	<?php if ( have_comments() ) : ?>
	<h2 class="comments-title">
		<?php
			printf( _nx( 'Comment', 'Comments', get_comments_number(), 'comments title', 'tidy' ),
				number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
		?>
	</h2>
	<?php endif; ?>

	<?php 
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'tidy' ); ?></p>
	<?php endif; ?>

	<?php
		$tidy_comments_args = array(
			// change the title of send button 
			'label_submit' => __( 'Send', 'tidy' ),
		);
		comment_form($tidy_comments_args);
	?>

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>

		<ol class="comment-list">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use tidy_comment() to format the comments.
				 * If you want to override this in a child theme, then you can
				 * define tidy_comment() and that will be used instead.
				 * See tidy_comment() in inc/template-tags.php for more.
				 */
				wp_list_comments( array( 'avatar_size' => 60, 'callback' => 'tidy_comment' ) );
			?>
		</ol><!-- .comment-list -->

		<?php tidy_comment_nav(); ?>

	<?php endif; // have_comments() ?>

	<?php do_action( 'tidy_after_comments' ); ?>
</div><!-- #comments -->
