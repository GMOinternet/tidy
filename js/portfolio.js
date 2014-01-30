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

/*
	slider = $('#port_bxslider').bxSlider();
	var slideQty = slider.getSlideCount();
	alert('Slide count: ' + slideQty);
*/
	$('#port_bxslider').bxSlider({
		infiniteLoop: false,
		slideWidth: 200,
		minSlides: 1,
		maxSlides: 4,
		slideMargin: 20,
		startSlide:0
	});
})(jQuery);
