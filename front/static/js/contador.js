$( document ).ready( function(){

	$.ajax({
		"url"		: appData.base_url + "frontend/totalcarrito",
		"dataType"  : "json"
	})
	.done( function( json ){
		if( json.resultado )
		{
			$( "#carrito-contador" ).html( json.total_items);
		}
	})
	.fail( function(){
		alert( "ERROR" );
	});

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
				if( json.resultado )
				{
					$( "#lista-contador" ).html( json.total);	
				}
			})
			.fail( function(){
				alert( "ERROR" );
			});
		}
	})
	.fail( function(){
		alert( "Error" );
	});

});