$( document ).ready( function(){

	if( appData.correo == "" )
	{
		$( location ).attr( "href", appData.base_url + "frontend/loginadmi" );
	}
	else{

	$.ajax({
		"url"		: appData.url_ws + "autentificacion/getclientes",
		"dataType"	: "json"
	})
	.done( function( json ){
		if( json.resultado )
		{
			$.each( json.clientes, function( i, cliente ){
				$( "#table-clientes" ).find( "tbody" ).append(
					'<tr>'
					+ '<td>'+cliente.nombre+'</td>'
					+ '<td>'+cliente.telefono+'</td>'
					+ '<td>'+cliente.correo+'</td>'
					+ '<td>'+cliente.fecha_registro+'</td>'
					+ '<td>'+cliente.contrasenia+'</td>'
					+ '</tr>'
					);
			});
		}
		else
		{
			muestra_mensaje( "info", "No existen registro" );
		}
	})
	.fail( function(){
		alert( "ERROR" );
	});
}
});