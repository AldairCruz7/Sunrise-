$(  document ).ready( function(){

	/*función AJAX para el objeto cliente*/
	$.ajax({
	    "url"      : appData.url_ws + "autentificacion/getcliente",
	    "type"     : "post",
	    "data"     :{
	        "correo"       : appData.correo
	    },
	    "dataType" : "json"
	})
	.done( function( json) {

		if( json.resultado )
		{
			$.ajax({
			    "url"      : appData.url_ws + "listadeseos/getlistadeseos",
			    "type"     : "post",
			    "data"     :{
			        "idCliente"       : json.cliente.idCliente
			    },
			    "dataType" : "json"
			})
			.done( function( json ){
				if( json.resultado ){
					/* Llenado de tabla lista deseos */
					$.each( json.listadeseos, function( i, deseo ){
						$( "#table-deseos" ).find( "tbody" ).append(
							'<tr>'
							+ ' <td><img src= "'+ deseo.urlImagen +'" width="150"></td>'
							+ ' <td>'+ deseo.articulo +'</td>'
							+ ' <td>$'+ deseo.precio +'</td>'
							+ ' <td>'+ deseo.categoria +'</td>'
							+ ' <td>'
							/*Boton eliminar lista deseos*/
							+ ' <button type="button" class="btn btn-info btn-borrar" data-toggle="modal"'
							+ ' data-target="#modal-borrar" onclick="borrar_click('
							+ deseo.idCliente + ','  + deseo.idArticulo + ',\'' + deseo.articulo + '\')">'
							+ ' <i class="fas fa-trash"></i></button>'

							+ ' </td>'
							+ ' </tr>'
						);
					});
				}
				else
				{
					muestra_mensaje( "info", "Aún no tienes productos" );
				}
			})
			.fail( function(){
				alert( "ERROR" );
			});
		}
		else
		{
			muestra_mensaje( "warning", "Debes iniciar sesión para acceder a tu lista" );
		}

	})
	.fail( function(){
		alert( "Error" );
	});

	/*Función click para un DELETE */
	$( "#btn-borrar-confirmar" ).click( function() {
		/*función AJAX para un DELETE*/
		$.ajax({
			"url"      : appData.url_ws + "listadeseos/deletedeseo",
			"type"     : "post",
			"data"     : {
				"idCliente"  : $( this ).attr( "data-idCliente" ),
				"idArticulo" : $( this ).attr( "data-idArticulo" )
			},
			"dataType" : "json"
		})
		.done( function( json ) {
			if ( json.resultado ) 
			{
				setTimeout( function() 
				{
					$( location ).attr( "href", appData.base_url + "frontend/listadeseos" );
				}, 
				50 );

				muestra_mensaje( "info", "Articulo eliminado" );
			}
			else 
			{
				muestra_mensaje( "danger", "Lo sentimos :( algo salio mal" );
			}
		})
		.fail( function() {
			alert( "Error" );
		});
	});

});


/*funcion para evento onclick borrar_click */
function borrar_click( idCliente, idArticulo, articulo ){
	$( "#modal-borrar-articulo" ).html( articulo );
	$( "#btn-borrar-confirmar" ).attr( "data-idCliente", idCliente ).attr( "data-idArticulo", idArticulo );
}