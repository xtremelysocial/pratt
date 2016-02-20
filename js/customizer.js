/**
 * Theme: Flat Bootstrap
 * 
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			/*$( '.site-title a' ).text( to );*/
			$( '.navbar-brand a' ).text( to );
		} );
	} );
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.navbar-brand, .navbar-brand a' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute',
					'display': 'none'
				} );
			} else {
				$( '.navbar-brand, .navbar-brand a' ).css( {
					/*'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute',
					'display': 'none'*/
					'clip': 'auto',
					'position': 'relative',
					'display': 'block'
				} );
			}
		} );
	} );
} )( jQuery );
