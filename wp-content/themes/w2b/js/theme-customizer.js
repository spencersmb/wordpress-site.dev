(function( $ ) {

    //get the value of the blogname setting - pass it the value and if it updates change to the updated value
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.navbar-brand').find('img').attr( "alt", to );
		} );
	} );

	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

    wp.customize( 'w2b_footer_text', function( value ) {
        value.bind( function( to ) {
            var footerH4 = $('.site-footer').find('h4');
            if( to == ""){
                footerH4.hide();
            } else{
                footerH4.show();
                footerH4.text( to );
            }
        } );
    } );

})( jQuery );