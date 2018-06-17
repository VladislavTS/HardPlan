$( document ).ready( function () {

	/**
	 * переключение форм (авторизация/регистрация)
	 */
	$( "[tab-button]" ).on( "click", function () {

		var tabForm = $( this ).attr( "tab-button" );

		$( "[tab]" ).removeClass( "active" );
		$( "[tab='" + tabForm + "']" ).addClass( "active" );

	} ); // click. [tab-button]

} );