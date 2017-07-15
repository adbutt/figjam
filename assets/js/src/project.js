'use strict';
( function( window, document, $ ) {
	$( '.wrapper' ).imagesLoaded( function() {
		$( 'body' ).addClass( 'loaded' );
	} );

	// var plx = function() {
	// 	if ( $( '*[data-parallax-this]' ) .length ) {
	// 		var e = $( document ).scrollTop( ) / 2,
	// 			t = 0.1 * $( document ).scrollTop( );
	//
	// 		console.log( e );
	// 		$( '*[data-parallax-this]' ).each( function() {
	// 			var a = $( this );
	//
	// 			a.css( {
	// 				transform: 'translate3d(0, ' + e + 'px, 0)'
	// 			} ), a.find( '*[data-parallax-secondary]' ).css( {
	// 				transform: 'translate3d(0, ' + t + 'px, 0)'
	// 			} );
	// 		} );
	// 	}
	// };
	$.stellar( {
		// Set scrolling to be in either one or both directions
		horizontalScrolling: false,
		verticalScrolling: true,

		// Set the global alignment offsets
		horizontalOffset: 0,
		verticalOffset: 0,

		// Refreshes parallax content on window load and resize
		responsive: false,

		// Select which property is used to calculate scroll.
		// Choose 'scroll', 'position', 'margin' or 'transform',
		// or write your own 'scrollProperty' plugin.
		scrollProperty: 'scroll',

		// Select which property is used to position elements.
		// Choose between 'position' or 'transform',
		// or write your own 'positionProperty' plugin.
		positionProperty: 'position',

		// Enable or disable the two types of parallax
		parallaxBackgrounds: true,
		parallaxElements: true,

		// Hide parallax elements that move outside the viewport
		hideDistantElements: true,

		// Customise how elements are shown and hidden
		hideElement: function( $elem ) {
			$elem.hide();
		},
		showElement: function( $elem ) {
			$elem.show();
		}
	} );
	$( function() {
		// DOM ready, take it away
	} );
	$( document ).ready( function() {
		//Nav Toggle
		$( 'a.nav-toggle' ).click( function( e ) {
			e.preventDefault();
			$( 'body' ).toggleClass( 'nav--active' );
		} );

		$( 'a.search-toggle' ).click( function( e ) {
			e.preventDefault();
			$( '.search-wrapper' ).toggleClass( 'search--active' );
			$( '#s' ).focus();
		} );

		$( 'a.search-close' ).click( function( e ) {
			e.preventDefault();
			$( '.search-wrapper' ).removeClass( 'search--active' );
		} );
		// $( 'body:not(.nav_on) header' ).click( function() {
		// 	if ( $( 'body' ).hasClass( 'nav_on' ) === false ) {
		// 		$( 'body' ).addClass( 'nav_on' );
		// 	}
		// } );

		$( '.menu a' ).on( 'click', function( e ) {
			e.preventDefault();
			$( 'body' ).addClass( 'is-exiting' );
			var linkLocation = this.href;

			function redirectPage() {
				window.location = linkLocation;
			}

			setTimeout( function() {
				redirectPage();
			}, 1000 );
		} );
	} );//end document ready
	//Ensures back button works in FF
	$( window ).unload( function() {
		$( window ).unbind( 'unload' );
	} );

	//Stop back button cache in Safari
	$( window ).bind( 'pageshow', function( e ) {
		if ( e.originalEvent.persisted ) {
			window.location.reload();
		}
	} );
} )( window, document, jQuery );
