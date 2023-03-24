$( document ).ready( function(){

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
			/*Función AJAX para obtener el historial de compras*/
			$.ajax({
				"url"		: appData.url_ws + "articulo/gethistorial",
				"type"		: "post",
				"data"		: {
					"idCliente" : json.cliente.idCliente
				},
				"dataType"	: "json"
			})
			.done( function( json ){
				if( json.resultado )
				{
					$.each( json.historial, function( i, compra ){
						$( "#table-compras" ).find( "tbody" ).append(
							'<tr>'
							+ '<td><img src= "'+compra.imagen+'" width="100"></td>'
							+ '<td>'+compra.articulo+'</td>'
							+ '<td style="text-align: center;">'+compra.cantidad+'</td>'
							+ '<td style="color: #0482a4; font-size: 15pt; text-align: center;">$'+compra.subtotal+'</td>'
							+ '<td >'+compra.fecha_vta+'</td>'
							+ '</tr>'
						);
					});
				}
				else
				{
					muestra_mensaje( "info", "Aún no no has realizado ninguna compra" );
				}
			})
			.fail( function(){
				alert( "ERROR" );
			});
		}
		else
		{
			muestra_mensaje( "warning", "Debes iniciar sesión para acceder a tu historial" );
		}

	})
	.fail( function(){
		alert( "Error" );
	});
});