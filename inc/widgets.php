<?php
/**
 * Custom widgets for this theme.
 *
 * @package Tidy
 */

// register widget
add_action( 'widgets_init', 'register_tidy_widget' );
function register_tidy_widget() {
	register_widget( 'Tidy_Widget_About_Us' );
	register_widget( 'Tidy_Widget_Contact' );
	register_widget( 'Tidy_Widget_Recent_Posts' );
}

/**
 * Adds Tidy_Widget_About_Us widget.
 */
class Tidy_Widget_About_Us extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'tidy_about_us_widget', // Base ID
			__( 'About Us (Tidy)', 'tidy' ), // Name
			array(
				'description' => __( 'Arbitrary text or HTML.', 'tidy' ),
				'classname' => 'widget_tidy_about_us',
			)
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'About Us', 'tidy' ) : $instance['title'], $instance, $this->id_base );
		$text  = apply_filters( 'widget_text', empty( $instance['text'] ) ? __( 'Sample text.', 'tidy' ) : $instance['text'], $instance );

		echo $before_widget;
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; }
		echo '<div class="tidy_text_widget">' . "\n";
		echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text;
		echo '</div>' . "\n";
		echo $after_widget;

	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'text' => '' ) );
		$text = esc_textarea($instance['text']);

		?>
		<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
		<p><input id="<?php echo $this->get_field_id( 'filter' ); ?>" name="<?php echo $this->get_field_name( 'filter' ); ?>" type="checkbox" <?php checked(isset($instance['filter']) ? $instance['filter'] : 0); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e( 'Automatically add paragraphs', 'tidy' ); ?></label></p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		$instance['filter'] = isset($new_instance['filter']);
		return $instance;
		
	}

} // class Tidy_Widget_About_Us

/**
 * Adds Tidy_Widget_Contact widget.
 */
class Tidy_Widget_Contact extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'tidy_contact_widget', // Base ID
			__( 'Contact (Tidy)', 'tidy' ), // Name
			array(
				'description' => __( 'E-mail and SNS acounts.', 'tidy' ),
				'classname' => 'widget_tidy_contact',
			)
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Contact', 'tidy' ) : $instance['title'], $instance, $this->id_base );
		$email = apply_filters( 'widget_email', empty( $instance['email'] ) ? '' : $instance['email'], $instance );

		echo $before_widget;
		if ( !empty( $title ) ) {
			echo $before_title . $title . $after_title;
		}
		if ( !empty( $email ) && is_email( $email ) ) {
			echo '<div class="tidy_contact_email">' . "\n";
			echo 'E-mail : <a href="mailto:' . esc_attr( $email ) . '">' . $email .'</a>' . "\n";
			echo '</div>' . "\n";
		}
		echo '<div class="tidy_contact_sns_icons">' . "\n";
		?>
		<ul class="sns-icons">
			<li><a href="#"><span class="icon-facebook"></span></a></li>
			<li><a href="#"><span class="icon-twitter"></span></a></li>
			<li><a href="#"><span class="icon-pinterest"></span></a></li>
			<li><a href="#"><span class="icon-flickr"></span></a></li>
			<li><a href="#"><span class="icon-linkedin"></span></a></li>
			<li><a href="#"><span class="icon-google-plus"></span></a></li>
			<li><a href="#"><span class="icon-tumblr"></span></a></li>
			<li><a href="#"><span class="icon-instagram"></span></a></li>
			<li><a href="#"><span class="icon-youtube"></span></a></li>
			<li><a href="#"><span class="icon-vimeo"></span></a></li>
			<li><a href="#"><span class="icon-lanyrd"></span></a></li>
			<li><a href="#"><span class="icon-picassa"></span></a></li>
			<li><a href="#"><span class="icon-dribbble"></span></a></li>
			<li><a href="#"><span class="icon-forrst"></span></a></li>
			<li><a href="#"><span class="icon-deviantart"></span></a></li>
			<li><a href="#"><span class="icon-steam"></span></a></li>
			<li><a href="#"><span class="icon-github"></span></a></li>
			<li><a href="#"><span class="icon-wordpress"></span></a></li>
			<li><a href="#"><span class="icon-soundcloud"></span></a></li>
			<li><a href="#"><span class="icon-skype"></span></a></li>
			<li><a href="#"><span class="icon-reddit"></span></a></li>
			<li><a href="#"><span class="icon-lastfm"></span></a></li>
			<li><a href="#"><span class="icon-delicious"></span></a></li>
			<li><a href="#"><span class="icon-stumbleupon"></span></a></li>
			<li><a href="#"><span class="icon-stackoverflow"></span></a></li>
			<li><a href="#"><span class="icon-flattr"></span></a></li>
			<li><a href="#"><span class="icon-yelp"></span></a></li>
			<li><a href="#"><span class="icon-foursquare"></span></a></li>
			<li><?php the_feed_link( '<span class="icon-feed"></span>'); ?></li>
		</ul>
		<?php
		echo '</div>' . "\n";
		echo $after_widget;

	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'email' => '' ) );
		$title = strip_tags($instance['title']);
		$email = strip_tags($instance['email']);

		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'tidy' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e( 'E-mail:', 'tidy' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>" />
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['email'] = strip_tags($new_instance['email']);
		return $instance;
		
	}

} // class Tidy_Widget_About_Us


/**
 * Adds Tidy_Widget_Recent_Posts widget.
 */
class Tidy_Widget_Recent_Posts extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'tidy_recent_posts_widget', // Base ID
			__( 'Recent Posts (Tidy)', 'tidy' ), // Name
			array(
				'description' => __( "Your site&#8217;s most recent Posts."),
				'classname' => 'widget_tidy_recent_posts',
			)
		);
		add_action( 'save_post', array($this, 'flush_widget_cache') );
		add_action( 'deleted_post', array($this, 'flush_widget_cache') );
		add_action( 'switch_theme', array($this, 'flush_widget_cache') );
	}


	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$cache = wp_cache_get('tidy_widget_recent_posts', 'widget');

		if ( !is_array($cache) )
			$cache = array();

		if ( ! isset( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();
		extract($args);
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 4;
		if ( ! $number )
			$number = 4;
		$show_title = isset( $instance['show_title'] ) ? $instance['show_title'] : false;
		$size = ( $show_title ) ? "tidy-thumb-tiny" : 'tidy-thumb-small';

		$r = new WP_Query( apply_filters( 'tidy_widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );

		if ( $r->have_posts() ) :
			?>
			<?php echo $before_widget; ?>
			<?php if ( $title ) echo $before_title . $title . $after_title; ?>
			<ul>
			<?php while ( $r->have_posts() ) : $r->the_post(); ?>
				<li class="<?php echo $size; ?>"><a href="<?php the_permalink(); ?>" rel="bookmark">
				<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail( $size );
					} else {
						echo '<img src="' . get_template_directory_uri() . '/images/' . $size . '.png" >';
					}
				?>
					</a>
					<?php if ( $show_title ) : ?>
						<div class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php get_the_title() ? the_title() : the_ID(); ?></a></div>
					<?php endif; ?>
				</li>
			<?php endwhile; ?>
			</ul>
			<?php echo $after_widget; ?>
			<?php
			// Reset the global $the_post as this query will have stomped on it
			wp_reset_postdata();

		endif;

			$cache[$args['widget_id']] = ob_get_flush();
			wp_cache_set('tidy_widget_recent_posts', $cache, 'widget');

	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title      = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number     = isset( $instance['number'] ) ? absint( $instance['number'] ) : 4;
		$show_title = isset( $instance['show_title'] ) ? (bool) $instance['show_title'] : false;

		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'tidy' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:', 'tidy' ); ?></label>
		<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" />
		</p>
		<p>
		<input class="checkbox" type="checkbox" <?php checked( $show_title ); ?> id="<?php echo $this->get_field_id( 'show_title' ); ?>" name="<?php echo $this->get_field_name( 'show_title' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_title' ); ?>"><?php _e( 'Show post title?', 'tidy' ); ?></label>
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$instance['email'] = strip_tags($new_instance['email']);
		$instance['show_title'] = isset( $new_instance['show_title'] ) ? (bool) $new_instance['show_title'] : false;
		$this->flush_widget_cache();
		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset( $alloptions['tidy_widget_recent_entries'] ) )
			delete_option( 'tidy_widget_recent_entries' );
		
		return $instance;
		
	}

	function flush_widget_cache() {
		wp_cache_delete( 'tidy_widget_recent_entries', 'widget' );
	}

} // class Tidy_Widget_Recent_Posts