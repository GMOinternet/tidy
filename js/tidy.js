/**
 * Tidy - v0.1.0
 *
 * http://www.gmo.jp/
 *
 * Copyright 2013, GMO (http://www.gmo.jp/)
 */

(function($){

	// site-header-widget-area
	var headerWidgetToggle = $.cookie( 'tidy-header-widget-toggle' );
	var headerWidgetClass  = '#site-header-widget';
	var headerWidgetBtn    = '.header-widget-toggle';

	if ( headerWidgetToggle ) {
		$( headerWidgetClass ).hide();
	}

	$( headerWidgetBtn ).click( function(){
		$( headerWidgetClass ).slideUp();
		$.cookie( 'tidy-header-widget-toggle' , 'hide', {
			path: "/"
		});
		return false;
	} );

	// site-header-social-area
	$( '.sns-toggle' ).click( function(){
		$( '.sns-icons' ).slideToggle();
		return false;
	} );
	
	// main-navigation
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			$( '.main-navigation' ).addClass("fixmenu");
		} else {
			$( '.main-navigation' ).removeClass("fixmenu");
		}
	});

	$( '.menu-toggle' ).click( function(){
		$( '.main-navigation-box' ).slideToggle( 'normal', function(){
			$( '.menu-toggle .genericon' ).toggleClass( 'genericon-menu' );
			$( '.menu-toggle .genericon' ).toggleClass( 'genericon-close-alt' );
		} );
		return false;
	} );

	// Search toggle.
	$( '.search-toggle' ).click( function(){
		$( '.search-box' ).slideToggle();
		return false;
	} );

	// Portfolio toggle.
	$( '.gallery-content-area .entry-box').hover(function(){
		var w = $(this).width();
		$(this).children( '.entry-conteiner' ).css({left:-w});
		$(this).children( '.entry-conteiner' ).animate({
			left: 0,
		}, 'slow');
		
	}, function(){
		var w = $(this).width();
		$(this).children( '.entry-conteiner' ).animate({
			left: w,
		}, 'slow');
		
	});

	// comment-form
	$( 'p[class^="comment-form"] input, p[class^="comment-form"] textarea' ).focus( function(){
		$(this).prev().fadeToggle();
	} ).blur(function(){
		$(this).prev().fadeToggle();
	});

	// submit btn
	$( '.form-submit' ).css('bottom', function(index) {
		var submitposi = $( '.form-allowed-tags' ).height() + 5;
		index = index + submitposi;
		return index;
	});

	// ellipsis
	var ellipsis = '<span class="ellipsis">...</span>';

	$('.archive-content .entry-title a').each( function() {
		var ath = $(this).height();
		if (ath > 45) {
			$(this).after( ellipsis );
		}
	});
	$('.archive-content .entry-summary p').each( function() {
		var ash = $(this).height();
		if (ash > 34) {
			$(this).after( ellipsis );
		}
	});
	$('.blog-section-content .entry-title a').each( function() {
		var ath = $(this).height();
		if (ath > 45) {
			$(this).after( ellipsis );
		}
	});


})(jQuery);
