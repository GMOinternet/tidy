<?php
/**
 * The Footer containing dor archive.
 *
 * @package Tidy
 */
?>
	<section id="footer-category-list" class="footer-category-list"><div class="inner">
		<header><h1 class="widget-title"><?php _e( 'All Categories', 'tidy' ) ?></h1></header>
		
		<ul class="footer-category-list-box">
			<?php wp_list_categories('title_li=&hierarchical=0'); ?>
		</ul>

	</div></section><!-- #footer-category-list -->
