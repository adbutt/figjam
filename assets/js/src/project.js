'use strict';
( function( window, document, $ ) {

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
	} );
} )( window, document, jQuery );
