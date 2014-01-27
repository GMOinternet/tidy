<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Tidy
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function tidy_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'tidy_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function tidy_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'tidy_body_classes' );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function tidy_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() ) {
		return $title;
	}

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 ) {
		$title .= " $sep " . sprintf( __( 'Page %s', 'tidy' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'tidy_wp_title', 10, 2 );


/**
 * Filters pre_get_posts.
 * @param string $query Default query.
 * @return Void.
*/
add_action( 'pre_get_posts', 'tidy_modify_main_query' );
function tidy_modify_main_query( $query ) {
	if ( is_admin() || ! $query->is_main_query() )
		return;

	$posts_per_page = get_option( 'posts_per_page' );

	// is_front_page
	$home_blog_num = of_get_option( 'home_blog_num', $posts_per_page );
	if ( $query->is_front_page() ) {
		$query->set( 'posts_per_page', $home_blog_num );
		$query->set( 'tax_query', array(
			array(
				'taxonomy' => 'post_format',
				'field'    => 'slug',
				'terms'    => 'post-format-gallery',
				'operator' => 'NOT IN'
			)
		) );
		return;
	}

	// post_type = post_format=gallery
	$port_num = of_get_option( 'port_num', $posts_per_page );
	if ( $query->is_tax( 'post_format' ) ) {
		if ( $query->is_tax( 'post_format', 'post-format-gallery' ) ) {
			$query->set( 'posts_per_page', $port_num );
		} else {
			$query->set( 'posts_per_page', $port_num );
		}
		return;
	}

	// is_archive or is_search
	$arc_num = of_get_option( 'arc_num', $posts_per_page );
	if ( $query->is_archive() or $query->is_search() ) {
		$query->set( 'posts_per_page', $arc_num );
		return;
	}


}
/**
 * add action showtime.
 * @param none.
 * @return Void.
*/
add_action( 'tidy_before_content', 'tidy_showtime' );
function tidy_showtime() {
	if ( function_exists( 'showtime' ) ) showtime();
}
