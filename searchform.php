<?php
/**
 * The template for displaying search forms in Tidy
 *
 * @package Tidy
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'tidy' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Type and hit enter &hellip;', 'placeholder', 'tidy' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	</label>
	<button type="submit" name="submit" class="search-submit"><span class="screen-reader-text"><?php _e( 'Search', 'tidy' ); ?></span><span class="icon-search"></span></button>
</form>
