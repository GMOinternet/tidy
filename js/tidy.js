/**
 * Tidy - v0.1.0
 *
 * http://www.gmo.jp/
 *
 * Copyright 2013, GMO (http://www.gmo.jp/)
 */

(function($){

	// gmo-show-time
	if ($(window).width() > 600) {
		if ( ($("body").has("#gmo-show-time .right-photo-left").length) || ($("body").has("#gmo-show-time .left-photo-right").length)) {
			$("#masthead").css("padding-bottom","30px");
			$("#gmo-show-time").css("top","-30px");
		}
	}

	// site-header-widget-area
	var headerWidgetToggle = $.cookie( 'tidy-header-widget-toggle' );
	var headerWidgetOpen   = '#site-header-widget';
	var headerWidgetBtn    = '.header-widget-toggle-btn';

	if ( headerWidgetToggle ) {
		$( headerWidgetOpen ).hide();
		$('.header-widget-toggle-btn .genericon').removeClass('genericon-uparrow');
		$('.header-widget-toggle-btn .genericon').addClass('genericon-downarrow');
	} else {
		$( headerWidgetOpen ).show();
		$('.header-widget-toggle-btn .genericon').removeClass('genericon-downarrow');
		$('.header-widget-toggle-btn .genericon').addClass('genericon-uparrow');
	}

	$( headerWidgetBtn ).click( function(){
		headerWidgetToggle = $.cookie( 'tidy-header-widget-toggle' );
		if ( headerWidgetToggle ) {
			$( headerWidgetOpen ).slideDown();
			$.removeCookie("tidy-header-widget-toggle");
			$('.header-widget-toggle-btn .genericon').removeClass('genericon-downarrow');
			$('.header-widget-toggle-btn .genericon').addClass('genericon-uparrow');
		} else {
			$( headerWidgetOpen ).slideUp();
			$.cookie( 'tidy-header-widget-toggle' , 'hide', {
				path: "/"
			});
			$('.header-widget-toggle-btn .genericon').removeClass('genericon-uparrow');
			$('.header-widget-toggle-btn .genericon').addClass('genericon-downarrow');
		}
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

	// flatHeights and gallery grid
	// flatHeights
	var _UA = navigator.userAgent.toLowerCase();
	// gallery grid(masonry)
	var $container = $( '.gallery-section-content-inner' );
	function tidy_gallerycontent() {

		// Merit Box
		$("#merit-box-area .merit-box-thumbnail").flatHeights();
		// Home Blog
		$(".blog-section-content .tidy-thumb-blog").flatHeights();
		// Portfolio
		$(".gallery-section-content.normal .tidy-thumb-portfolio").flatHeights();
		$(".gallery-section-content .entry-box").each(function(i){
			var h = $(this).children('.tidy-thumb-portfolio').children('a').children('.thumbnail_img').height();
			var bh = $(this).children('.tidy-thumb-portfolio').height();
			$(this).children('.entry-conteiner').children('.entry-conteiner-child').height(h);
			$(this).children('.entry-conteiner').children('.entry-conteiner-child').css({'top':(bh-h)/2});

		});
		// masonry initialize
		$container.masonry({
			itemSelector: '.hentry'
		});
	}
	
	if(parseInt(_UA.indexOf('applewebkit')) > -1){
		$(window).load(function(){
			tidy_gallerycontent();
		});
	} else {
		tidy_gallerycontent();
	}

	// gallery hover
/*
	$( '.entry-box').hover(function(){
		var w = $(this).width();
		$(this).children( '.entry-conteiner' ).css({left:-w});
		$(this).children( '.entry-conteiner' ).animate({
			left: 0
		}, 'slow');
		
	}, function(){
		var w = $(this).width() + 40;
		$(this).children( '.entry-conteiner' ).animate({
			left: w
		}, 'slow');
		
	});
*/


	// comment-form
	$( 'p[class^="comment-form"] input, p[class^="comment-form"] textarea' ).focus( function(){
		$(this).prev().fadeToggle();
	} ).blur(function(){
		$(this).prev().fadeToggle();
	});

	// submit btn
	$( '.comment-form' ).css('margin-bottom', function(index) {
		var submitposi = $( '.form-allowed-tags' ).height() + 18;
		index = index + submitposi;
		return index;
	});

	// placeholder for IE 9
	if(ie() <= 9) {
		var searchText = $(".search-field").attr("placeholder");
		$(".search-field").val(searchText);
		$(".search-field").css("color", "#75A5CA");
		$(".search-field").focus(function() {
			if($(this).val() == searchText) {
				$(this).val("");
				$(this).css("color", "#0058AE");
			}
		}).blur(function() {
			if($(this).val() == "") {
				$(this).val(searchText);
				$(".search-field").css("color", "#75A5CA");
			}
		});
	}

})(jQuery);

// IE ver
function ie() {
	var undef, v = 3, div = document.createElement('div');
	while (
		div.innerHTML = '<!--[if gt IE '+(++v)+']><i></i><![endif]-->',
		div.getElementsByTagName('i')[0]
	);
	return v > 4 ? v : undef;
}
