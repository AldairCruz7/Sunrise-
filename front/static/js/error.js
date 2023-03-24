function error_formulario( campo, mensaje ) {
	$( ".invalid-feedback" ).remove();
	$( ".is-invalid" ).removeClass( "is-invalid" );

	$( "#" + campo ).addClass( "is-invalid" );
	$( "#group-" + campo ).append( $( "<div>", {
		text  : mensaje,
		class : "invalid-feedback"
	}));
}