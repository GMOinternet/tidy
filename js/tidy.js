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


})(jQuery);
