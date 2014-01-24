/**
 * Custom scripts needed for the colorpicker, image button selectors,
 * and navigation tabs.
 */

jQuery(document).ready(function($) {

	// Loads the color pickers
	$('.of-color').wpColorPicker();
	$('.customcolor .of-color').each(function(){
		var c = $(this).attr( 'data-set-color' );
		$(this).iris('color', c );
	}); 

	// Image Options
	$('.of-radio-img-img').click(function(){
		$(this).parent().parent().find('.of-radio-img-img').removeClass('of-radio-img-selected');
		$(this).addClass('of-radio-img-selected');
	});

	$('.of-radio-img-label').hide();
	$('.of-radio-img-img').show();
	$('.of-radio-img-radio').hide();

	// Toggle
	$(".toggle label input[checked='checked']").parent().addClass( 'selected' );
	$(".toggle label").click(function(){
		$(this).next().removeClass( 'selected' );
		$(this).prev().removeClass( 'selected' );
		$(this).addClass( 'selected' );
	});

	// Merit box
	function options_merit_box( str ) {

		// Hides all the .merit-box sections to start
		$( '.meritboxsettings .merit-box-2' ).hide();
		$( '.meritboxsettings .merit-box-3' ).hide();
		$( '.meritboxsettings .merit-box-4' ).hide();

		// Find if a selected tab is saved in localStorage
		if ( str == 1 ) {
			$( '.meritboxsettings .merit-box-2' ).hide();
			$( '.meritboxsettings .merit-box-3' ).hide();
			$( '.meritboxsettings .merit-box-4' ).hide();
		} else if ( str == 2 ) {
			$( '.meritboxsettings .merit-box-2' ).show();
			$( '.meritboxsettings .merit-box-3' ).hide();
			$( '.meritboxsettings .merit-box-4' ).hide();
		} else if ( str == 3 ) {
			$( '.meritboxsettings .merit-box-2' ).show();
			$( '.meritboxsettings .merit-box-3' ).show();
			$( '.meritboxsettings .merit-box-4' ).hide();
		} else if ( str == 4 ) {
			$( '.meritboxsettings .merit-box-2' ).show();
			$( '.meritboxsettings .merit-box-3' ).show();
			$( '.meritboxsettings .merit-box-4' ).show();
		}
	}
	var boxcnt = $("#section-merit-box-num select option:selected").val();
	options_merit_box(boxcnt);
	
	$( "#section-merit-box-num select" ).change(function() {
		var cnt = $(this).val();
		options_merit_box(cnt);
	});

	$( '.mnicon .controls' ).each(function(index) {
		var icond = $(this).children().children( "option:selected" ).val();
		$(this).append('<div class="type-icon"><a href="#"><span class="icon-' + icond + '"></span></a></div>') ;
	});

	$( ".mnicon select" ).change(function () {
		var icon = $(this).val();
		icon = 'icon-' + icon;
		$(this).next().children().children().toggleClass(icon);
	});

	// Loads tabbed sections if they exist
	function options_framework_tabs() {

		// Hides all the .group sections to start
		$('.group').hide();

		// Find if a selected tab is saved in localStorage
		var active_tab = '';
		if ( typeof(localStorage) !== 'undefined' ) {
			active_tab = localStorage.getItem("active_tab");
		}

		// If active tab is saved and exists, load it's .group
		if (active_tab !== '' && $(active_tab).length ) {
			$(active_tab).show();
			$(active_tab + '-tab').addClass('nav-tab-active');
		} else {
			$('.group:first').show();
			$('.nav-tab-wrapper a:first').addClass('nav-tab-active');
		}

		// Bind tabs clicks
		$('.nav-tab-wrapper a').click(function(evt) {

			evt.preventDefault();

			// Remove active class from all tabs
			$('.nav-tab-wrapper a').removeClass('nav-tab-active');

			$(this).addClass('nav-tab-active').blur();

			var group = $(this).attr('href');

			if (typeof(localStorage) !== 'undefined' ) {
				localStorage.setItem("active_tab", $(this).attr('href') );
			}

			$('.group').hide();
			$(group).show();

			// Editor height sometimes needs adjustment when unhidden
			$('.wp-editor-wrap').each(function() {
				var editor_iframe = $(this).find('iframe');
				if ( editor_iframe.height() < 30 ) {
					editor_iframe.css({'height':'auto'});
				}
			});

		});
	}

	if ( $('.nav-tab-wrapper').length > 0 ) {
		options_framework_tabs();
	}

	// Loads tabbed sections if they exist
	function options_framework_content_tabs() {

		// Hides all the .group sections to start
		$('.tabcontent').hide();

		// Find if a selected tab is saved in localStorage
		var active_content_tab = '';
		if ( typeof(localStorage) !== 'undefined' ) {
			active_content_tab = localStorage.getItem("active_content_tab");
		}

		// If active tab is saved and exists, load it's .group
		if (active_content_tab !== '' && $(active_content_tab).length ) {
			$(active_content_tab).show();
			$(active_content_tab + '-tab').addClass('nav-tab-active');
		} else {
			$('.tabcontent:first').show();
			$('.content-tab-wrapper a:first').addClass('nav-tab-active');
		}

		// Bind tabs clicks
		$('.content-tab-wrapper a').click(function(evt) {

			evt.preventDefault();

			// Remove active class from all tabs
			$('.content-tab-wrapper a').removeClass('nav-tab-active');

			$(this).addClass('nav-tab-active').blur();

			var group = $(this).attr('href');

			if (typeof(localStorage) !== 'undefined' ) {
				localStorage.setItem("active_content_tab", $(this).attr('href') );
			}

			$('.tabcontent').hide();
			$(group).show();

			// Editor height sometimes needs adjustment when unhidden
			$('.wp-editor-wrap').each(function() {
				var editor_iframe = $(this).find('iframe');
				if ( editor_iframe.height() < 30 ) {
					editor_iframe.css({'height':'auto'});
				}
			});

		});
	}

	if ( $('.content-tab-wrapper').length > 0 ) {
		options_framework_content_tabs();
	}
});