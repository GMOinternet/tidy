/**
 * Tidy portfolio.js - v0.1.0
 *
 * http://www.gmo.jp/
 *
 * Copyright 2013, GMO (http://www.gmo.jp/)
 */

(function($){

	$('#portfolio_slider').bxSlider({
		infiniteLoop: false,
		hideControlOnEnd: true,
		adaptiveHeight: true,
		controls: false,
		pagerCustom: '#bx-pager'
	});

	$('#portfolio_posts_slider').bxSlider({
		infiniteLoop: false,
		slideWidth: 145,
		minSlides: 3,
		maxSlides: 5,
		slideMargin: 20,
		startSlide: 0,
		moveSlides: 1,
		prevText: '<span class="genericon genericon-leftarrow"></span>',
		nextText: '<span class="genericon genericon-rightarrow"></span>'
	});
})(jQuery);
