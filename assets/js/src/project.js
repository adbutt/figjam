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
		plx();
	} );//end document ready
} )( window, document, jQuery );
