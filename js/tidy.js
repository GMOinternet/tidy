/**
 * Tidy - v0.1.0
 *
 * http://www.gmo.jp/
 *
 * Copyright 2013, GMO (http://www.gmo.jp/)
 */

(function($){

	// gmo-show-time
	function showtimehead() {
		if ($(window).width() > 600) {
			if ( ($("body").has("#gmo-show-time .right-photo-left").length) || ($("body").has("#gmo-show-time .left-photo-right").length)) {
				$("#masthead").css("padding-bottom","30px");
				$("#gmo-show-time").css("top","-30px");
			}
		}
	}

	// flatHeights and gallery grid
	// gallery grid(masonry)
	var $container = $( '.grid .gallery-section-content-inner' );
	// home(not front page) masonry
	var $blogcontainer = $( '.all-blog' );
	function tidy_content_fix() {

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
		$blogcontainer.masonry({
			itemSelector: '.hentry'
		});
	}

	$(window).load(function() {
		showtimehead();
		tidy_content_fix();
	});

	var timer = false;
	$(window).resize(function() {
		if (timer !== false) {
			clearTimeout(timer);
		}
		timer = setTimeout(function() {
			showtimehead();
		}, 200);
	});


	// site-header-widget-area
	var headerWidgetToggle   = $.cookie( 'tidy-header-widget-toggle' );
	var headerWidgetOpen     = '#site-header-widget';
	var headerWidgetBtn      = '.header-widget-toggle-btn';
	var headerWidgetDuration = '400';

	if ( headerWidgetToggle ) {
		$( headerWidgetOpen ).hide();
		$('.header-widget-toggle-btn .genericon').removeClass('genericon-close');
		$('.header-widget-toggle-btn .genericon').addClass('genericon-downarrow');
		$('.header-widget-toggle').removeClass('open_header_widget');
	} else {
		$( headerWidgetOpen ).show();
		$('.header-widget-toggle-btn .genericon').removeClass('genericon-downarrow');
		$('.header-widget-toggle-btn .genericon').addClass('genericon-close');
		$('.header-widget-toggle').addClass('open_header_widget');
	}

	$( headerWidgetBtn ).click( function(){
		headerWidgetToggle = $.cookie( 'tidy-header-widget-toggle' );
		if ( headerWidgetToggle ) {
			$.removeCookie("tidy-header-widget-toggle");
			$( headerWidgetOpen ).slideDown(headerWidgetDuration);
			$('.header-widget-toggle-btn .genericon').removeClass('genericon-downarrow');
			$('.header-widget-toggle-btn .genericon').addClass('genericon-close');
			$('.header-widget-toggle').addClass('open_header_widget');
		} else {
			$.cookie( 'tidy-header-widget-toggle' , 'hide' );
			$( headerWidgetOpen ).slideUp(headerWidgetDuration);
			$('.header-widget-toggle-btn .genericon').removeClass('genericon-close');
			$('.header-widget-toggle-btn .genericon').addClass('genericon-downarrow');
			$('.header-widget-toggle').removeClass('open_header_widget');
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
