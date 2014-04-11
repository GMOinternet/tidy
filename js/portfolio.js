/**
 * Tidy portfolio.js - v1.0
 *
 * https://github.com/GMOinternet/tidy
 *
 * Copyright 2014, WP Shop byGMO (http://www.wpshop.com)
 */

(function($){

	var w = $(window).width();
	var ms = 5;
	var sw = 145;
	if ( w > 500 && w < 801 ) {
		sw = 100;
		ms = 4;
	}

	$('#portfolio_slider').bxSlider({
		infiniteLoop: false,
		hideControlOnEnd: true,
		adaptiveHeight: true,
		controls: false,
		pagerCustom: '#bx-pager'
	});

	$('#portfolio_posts_slider').bxSlider({
		infiniteLoop: false,
		slideWidth: sw,
		minSlides: 3,
		maxSlides: ms,
		slideMargin: 20,
		startSlide: 0,
		moveSlides: 1,
		prevText: '<span class="genericon genericon-leftarrow"></span>',
		nextText: '<span class="genericon genericon-rightarrow"></span>'
	});
})(jQuery);
