$( document ).ready( function(){

	if( appData.correo == "" )
	{
		$( location ).attr( "href", appData.base_url + "frontend/loginadmi" );
	}
	else{

	$.ajax({
		"url"		: appData.url_ws + "articulo/getarticulos",
		"dataType"	: "json"
	})
	.done( function( json ){
		if( json.resultado )
		{
			$.each( json.articulos , function( i, articulo ){
				$( "#table-articulos" ).find( "tbody" ).append(
					'<tr>'
					+ '<td><img src="'+articulo.urlImagen+'" width="200"></td>'
					+ '<td width="150" >'+articulo.articulo+'</td>'
					+ '<td width="300">'+articulo.descripcion+'</td>'
					+ '<td width="30" style="font-size: 15pt; color: red;">$'+articulo.precio+'</td>'
					+ '<td width="50">'+articulo.categoria+'</td>'
					+ '<td width="30" style="font-size: 15pt;">'+articulo.stock+'</td>'
					+ '<td>'

					+ '<buttontype="button" class="btn btn-danger btn-borrar" data-toggle="modal"'
					+ ' data-target="#modal-borrar" onclick="borrar_click('+articulo.idArticulo+')">'
					+ '<i class="fas fa-trash"></i></button>'

					+ '</td>'
					+ '<td>'

					+ '<button type="button" class="btn btn-primary" onclick="editar_click('+articulo.idArticulo+')">'
					+ '<i class="fas fa-edit"></i></button>'

					+ '</td>'
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