<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Tidy
 */


if ( ! function_exists( 'tidy_paging_nav' ) ) :
/**
 * Display numberic pagination when applicable
 *
 * @return void
 */
function tidy_paging_nav( $range = 2, $omission = "&#x02026;" ) {

	if( is_singular() )
		return;

	global $wp_query;

	// Stop execution if there's only 1 page
	if( $wp_query->max_num_pages < 2 )
		return;

	$paged     = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max       = intval( $wp_query->max_num_pages );
	$showitems = ($range * 2)+1;
	$omission  = '<li class="pagination-omission pagination-icon">' . $omission . "</li>\n";

	?>

	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'tidy' ); ?></h1>
		<ul class="page-numbers">
	<?php

	// Link to first page
	if( $paged > 1 && $paged > $range+1 && $showitems < $max )
		echo '<li class="pagination-first pagination-icon"><a href="' . get_pagenum_link(1) . '"><span class="genericon genericon-skip-back"></span></a></li>' . "\n";

	// Previous Post Link
	if ( get_previous_posts_link() )
		printf( '<li class="pagination-previous pagination-icon">%s</li>' . "\n", get_previous_posts_link( '<span class="genericon genericon-leftarrow"></span><span class="screen-reader-text">' . __( 'Previous Page', 'tidy' ) . '</span>' ) );

	// Link to current page, plus 2 pages in either direction if necessary
	if ( $paged > $range ) echo $omission;

	for ( $i = 1; $i <= $max; $i++ ) {
		if ( 1 != $max && ( !( $i >= $paged+$range+1 || $i <= $paged-$range-1 ) || $max <= $showitems ) ) {
			if ( $paged == $i ) {
				echo '<li class="pagination-current"><span>' . $i ."</span></li>\n";
			} else {
				echo '<li class="pagination-inactive"><a href="' . get_pagenum_link( $i ) . '">' . $i . "</a></li>\n";
			}
		}
	}

	if ( ( $max - $paged ) > $range ) echo $omission;

	// Next Post Link
	if ( get_next_posts_link() )
		printf( '<li class="pagination-next pagination-icon">%s</li>' . "\n", get_next_posts_link( '<span class="screen-reader-text">' . __( 'Next Page', 'tidy' ) . '</span><span class="genericon genericon-rightarrow"></span>' ) );

	// Link to last page
	if ( $paged < $max-1 && $paged+$range-1 < $max && $showitems < $max )
		echo '<li class="pagination-last pagination-icon"><a href="' . get_pagenum_link($max) . '"><span class="genericon genericon-skip-ahead"></span></a></li>' . "\n";

	?>
		</ul><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php 
}
endif; // textdomain_content_query_nav


if ( ! function_exists( 'tidy_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @return void
 */
function tidy_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'tidy' ); ?></h1>
		<div class="nav-links">

			<?php previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="genericon genericon-leftarrow"></span> %title',  'Previous post link', 'tidy' ) ); ?>
			<?php next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title <span class="genericon genericon-rightarrow"></span>', 'Next post link',     'tidy' ) ); ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;


if ( ! function_exists( 'tidy_comment_nav' ) ) :
/**
 * Display navigation to next/previous comment when applicable.
 *
 * @return void
 */
function tidy_comment_nav() {

	if( ! is_singular() )
		return;

	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { // are there comments to navigate through
	?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'tidy' ); ?></h1>
			<?php
				paginate_comments_links(
					array(
						'prev_text' => '<span class="genericon genericon-leftarrow"></span><span class="screen-reader-text">' . __( 'Older Comments', 'tidy' ) . '</span>',
						'next_text' => '<span class="screen-reader-text">' . __( 'Newer Comments', 'tidy' ) . '</span><span class="genericon genericon-rightarrow"></span>',
						'type' => 'list'
					)
				);
			?>
		</nav><!-- #comment-nav-below -->
	<?php
	} // check for comment navigation

}
endif;


if ( ! function_exists( 'tidy_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function tidy_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php _e( 'Pingback:', 'tidy' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'tidy' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<footer class="comment-meta">
				<?php if ( 0 != $args['avatar_size'] ) : ?>
				<div class="comment-author-image">
					<?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
				</div><!-- .comment-author-image -->
				<?php endif; ?>

				<div class="comment-metadata">
					<div class="comment-author-name"><?php printf( '<cite class="fn">%s</cite>', get_comment_author_link() ); ?></div>

					<div class="comment-date"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'tidy' ), get_comment_date(), get_comment_time() ); ?>
						</time>
					</a>
					<?php edit_comment_link( __( 'Edit', 'tidy' ), '<span class="edit-link">', '</span>' ); ?>
					</div>
				</div><!-- .comment-metadata -->
			</footer><!-- .comment-meta -->

			<div class="comment-content">
				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'tidy' ); ?></p>
				<?php endif; ?>

				<?php comment_text(); ?>
			</div><!-- .comment-content -->

			<?php
				comment_reply_link( array_merge( $args, array(
					'add_below'  => 'div-comment',
					'depth'      => $depth,
					'max_depth'  => $args['max_depth'],
					'reply_text' => '<span class="genericon genericon-rightarrow"></span>' . __( 'Reply', 'tidy' ),
					'before'     => '<div class="reply">',
					'after'      => '</div>',
				) ) );
			?>
		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for tidy_comment()


if ( ! function_exists( 'tidy_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function tidy_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	printf( '<span class="posted-on"><span class="icon-calendar"></span> %1$s</span> <span class="byline"><span class="icon-happy"></span> %2$s</span>',
		sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url( get_permalink() ),
			$time_string
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		)
	);
}
endif;


/**
 * Returns true if a blog has more than 1 category.
 */
function tidy_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so tidy_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so tidy_categorized_blog should return false.
		return false;
	}
}


/**
 * Flush out the transients used in tidy_categorized_blog
 */
function tidy_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'tidy_category_transient_flusher' );
add_action( 'save_post',     'tidy_category_transient_flusher' );
