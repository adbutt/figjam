'use strict';
( function( $ ) {
	$.fn.FigjamDropdownMenu = function( options ) {
		// Set the default settings
		var settings = $.extend( {
			transition: 'fadeIn',
			transitionSpeed: 150,
			openDelay: 150,
			closeDelay: 300
		}, options );

		var $dropdowns, mobile, click = true;

		$dropdowns = $( this );
		mobile = $( '.menu-toggle' );

		$dropdowns.attr( 'aria-haspopup', 'true' );
		$dropdowns.children( 'ul' ).css( {
			'display': 'none',
			'opacity': 0
		} );

		var over = function() {
			var $this = $( this );

			mobile = $this.closest( '.main-nav' ).prevAll( '.menu-toggle' );

			if ( mobile.is( ':visible' ) ) {
				return;
			}

			if ( $this.prop( 'hoverTimeout' ) ) {
				$this.prop( 'hoverTimeout', clearTimeout( $this.prop( 'hoverTimeout' ) ) );
			}

			$this.prop( 'hoverIntent', setTimeout( function() {
				if ( settings.transition === 'slide' ) {
					$this.children( 'ul' ).slideDown( settings.transitionSpeed ).animate(
							{opacity: 1},
							{queue: false, duration: 'fast'}
						).css( 'display', 'block' );
				} else {
					$this.children( 'ul' ).fadeIn( settings.transitionSpeed ).animate(
						{opacity: 1},
						{queue: false, duration: 'fast'}
					).css( 'display', 'block' );
				}
				$this.addClass( 'sfHover' );
			}, settings.openDelay ) );
		};

		var out = function() {
			var $this = $( this );

			mobile = $this.closest( '.main-nav' ).prevAll( '.menu-toggle' );

			if ( mobile.is( ':visible' ) ) {
				return;
			}

			if ( $this.prop( 'hoverIntent' ) ) {
				$this.prop( 'hoverIntent', clearTimeout( $this.prop( 'hoverIntent' ) ) );
			}

			$this.prop( 'hoverTimeout', setTimeout( function() {
				$this.children( 'ul' ).fadeTo( 10, 0, function() {
					$this.children( 'ul' ).css( 'display', 'none' );
				} );
				$this.removeClass( 'sfHover' );
			}, settings.closeDelay ) );
		};

		$dropdowns.on( 'mouseenter', over ).on( 'mouseleave', out );
		$dropdowns.on( 'focusin', over ).on( 'focusout', out );

		if ( document.addEventListener ) {
			if ( 'ontouchstart' in document.documentElement ) {
				$dropdowns.each( function() {
					var $this = $( this );

					mobile = $this.closest( '.main-nav' ).prevAll( '.menu-toggle' );

					if ( mobile.is( ':visible' ) ) {
						return;
					}

					if ( $this.parent().closest( '.menu-item-has-children' ).hasClass( 'mega-menu' ) ) {
						return;
					}

					this.addEventListener( 'touchstart', function( e ) {
						if ( e.touches.length === 1 ) {
							// Prevent touch events within dropdown bubbling down to document
							e.stopPropagation();

							// Toggle hover
							if ( !$this.hasClass( 'sfHover' ) ) {
								// Prevent link on first touch
								if ( e.target === this || e.target.parentNode === this ) {
									e.preventDefault();
								}

								click = false;

								// Hide other open dropdowns
								$this.siblings().removeClass( 'sfHover' );
								$this.siblings().children( 'ul' ).css( {
									'display': 'none',
									'opacity': 0
								} );

								// Show this dropdown
								$this.addClass( 'sfHover' );
								$this.children( 'ul' ).css( {
									'display': 'block',
									'opacity': 1
								} );

								// Hide dropdown on touch outside
								document.addEventListener( 'touchstart', closeDropdown );
								var closeDropdown = function( n ) {
									n.stopPropagation();

									$this.removeClass( 'sfHover' );
									$this.children( 'ul' ).css( {
										'display': 'none',
										'opacity': 0
									} );
									document.removeEventListener( 'touchstart', closeDropdown );
								};
							}
						}
					}, false );
				} );
			}
		}

		$( '.dropdown-menu-toggle' ).on( 'click', function() {
			mobile = $( this ).closest( '.main-nav' ).prevAll( '.menu-toggle' );
			if ( mobile.is( ':visible' ) ) {
				return;
			}
			var url = $( this ).parent().attr( 'href' );

			if ( typeof url !== 'undefined' && click ) {
				window.location.href = $( this ).parent().attr( 'href' );
			}
		} );

		$.fn.FigjamDropdownMenu.destroy = function() {
			$dropdowns.children( 'ul' ).css( 'display', '' );
			$dropdowns.unbind( 'mouseenter mouseleave focusin focusout' );
		};
	};
}( jQuery ) );

jQuery( document ).ready( function( $ ) {
	// Initiate our dropdown menu
	$( '.sf-menu .menu-item-has-children' ).FigjamDropdownMenu();
} );
