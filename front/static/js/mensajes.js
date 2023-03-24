function muestra_mensaje( tipo, mensaje ) {
	$( "#mensaje" ).html( "" );

	switch( tipo ) {
		case "danger" : titulo = "ERROR"; break;
		case "info"   : titulo = "INFORMACIÓN"; break;
		case "warning": titulo = "ADVERTENCIA"; break;
		case "success": titulo = "ÉXITO"; break;
	}

	$( "#mensaje" ).append( '<div class="alert alert-' +
		tipo + ' alert-dismissible fade show" role="alert" style="position:absolute;bottom:20px;"><strong>¡' +
		titulo + '!</strong> ' +
		mensaje + '.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>		</div>' );

	setTimeout( function() {
		$( ".alert" ).remove();
	}, 5000 );

}
