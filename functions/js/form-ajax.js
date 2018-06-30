$( document ).ready( function () {

	/**
	 * Обработка форм методом ajax.
	 */
	$( "form.ajax" ).on( "submit", function ( e ) {

		e.preventDefault();


		var $thisForm     = $( this );
		var formName      = $( $thisForm ).attr( "name" );
		var serializeForm = $( $thisForm ).serialize();

		var pathToFormController = "/form_controllers/" + formName + ".php";


		/**
		 * Формируем и отправляем запрос соответствующему контроллеру.
		 */
		$.ajax( {

			type   : "POST",
			url    : pathToFormController,
			data   : serializeForm,
			success: function ( data ) {

				$( $thisForm ).find( ".form-answer" ).text( data );

				$( $thisForm ).find( ".form-answer" ).removeClass( "form-answer__error" );
				$( $thisForm ).find( ".form-answer" ).addClass( "form-answer__success active" );


				/**
				 * Если указано перенаправление - то перенаправляем в указанное место.
				 */
				if ( $( $thisForm ).is( "[redirect]" ) ) {

					var redirect         = $( $thisForm ).attr( "redirect" );
					window.location.href = redirect;

				}

			},
			error  : function ( xhr ) {

				$( $thisForm ).find( ".form-answer" ).text( xhr.responseText );

				$( $thisForm ).find( ".form-answer" ).removeClass( "form-answer__success" );
				$( $thisForm ).find( ".form-answer" ).addClass( "form-answer__error active" );

			}

		} ); // ajax


		/**
		 * Скрываем ответ формы.
		 */
		setTimeout( function () {
			$( $thisForm ).find( ".form-answer" ).removeClass( "active" );
		}, 1000 );

	} ); // submit. $( "form.ajax" )

} );