$(  document ).ready( function(){
	/*Funcion AJAX para obtener el objeto de la sesión cart*/
	$.ajax({
		"url"		: appData.base_url + "frontend/getcarrito",
		"dataType"	: "json"
	})
	.done( function( json ){
		if( json.resultado )
		{

			


			/*Llenado de la tabla de carrito de compras*/
			$.each( json.data, function( i, carrito){
				$( "#table-carrito" ).find( "tbody" ).append(
					'<tr>'
					+ '<td width="100"><img src= "'+carrito.imagen+'" width="100"></td>'
					+ '<td width="350">'+carrito.nombre+'</td>'
					+ '<td width="50" style="color: #0482a4; font-size: 15pt; text-align: center;" >$'+carrito.price+'</td>'
					+ '<td width="20" style="text-align: center;" >'
					+  ( parseInt(carrito.qty) > parseInt(carrito.stock) ? carrito.stock : carrito.qty )
					+ '</td>'
					+ '<td width="50" style="color: #0482a4; font-size: 15pt; text-align: center;" >$'+(carrito.qty * carrito.price)+'</td>'
					+ '<td width="50">'
					/*Boton eliminar carrito*/
					+ ' <button type="button" class="btn btn-info btn-borrar" data-toggle="modal"'
					+ ' data-target="#modal-borrar" onclick="borra_click(\''
					+  carrito.nombre + '\',\'' + carrito.id + '\')">'
					+ ' <i class="fas fa-trash"></i></button>'
					/*Boton eliminar carrito*/
					+ '</td>'
					+ '</tr>'
				);
			});


			/*Generación de la tabla resumen de tu pedido*/
			$( "#resumen" ).append(
			'<table class="table " id="table-resumen">'
            + '    <thead>'
            + '      <tr>'
            + '        <th scope="col" style="font-size: 15pt; text-align: center; ">Tu pedido</th>'
            + '      </tr>'
            + '    </thead>'
            + '    <tbody>'
            + '    </tbody>'
            + '  </table>'

				);
				let total = 0;	
				console.log("json.resultado.data", json.data)
				//Iteramos sobre los objetos y acumulamos el precio de cada objeto
				for (let i = 0; i < json.data.length; i++) {
				let item = json.data[i];
				let price = parseInt(item.price); // Convertimos el precio a un número entero
				total += price * item.qty; // Acumulamos el precio total del objeto
				}
				
				
			/*Llenado de la tabla de resumen de tu pedido*/
			$( "#table-resumen" ).find( "tbody" ).append(
				  '<tr>'
				+ ' <td width="50" style=" text-align: center; font-size: 15pt;" >'
				+ '   <b>Total:</b>&nbsp;&nbsp;&nbsp;&nbsp;<b style="color: #0482a4;">$'+total+'</b></td>'
				+ '</tr>'
				+ '<tr>'
	            + ' <td width="50">'

	            + '  <button type="button" style="width: 250px;" class="btn btn-dark" onclick="procesar_compra()">'
            	+ '	 '+( appData.correo == "" ? 'Procesar compra <small>(iniciar sesión)</small>' : 'Procesar compra' )+''
	            + '  </button>'

	            + '	</td>'
	            + '</tr>'
			);
		}
		else
		{
			muestra_mensaje( "info", "Aún no has agregado productos" );
		}
	})
	.fail( function(){
		alert( "ERROR" );
	});

	/*Función click para borrar del carrito*/
	$( "#btn-borrar-confirmar" ).click( function() {
		/*función AJAX para eliminar*/
		$.ajax({
			"url"	   : appData.base_url + "frontend/borracarrito",
			"type"	   : "post",
			"data"	   :{
				"id"	: $( this ).attr( "data-rowid" )
			},
			"dataType" : "json"
		})
		.done( function( json ){

			if ( json.resultado )
			{

				$("#modal-borrar").modal( "hide" );
				$("#modal-borrar-articulo").modal( "hide" );
				muestra_mensaje( "info", "Articulo eliminado" );
				setTimeout( function() 
				{
					$( location ).attr( "href", appData.base_url + "frontend/carritocompras" );
				}, 
				1000 );

			
			}
			else 
			{
				console.log("noooo", json)
				muestra_mensaje( "danger", "Lo sentimos :( algo salio mal" );
			}
		})
		.fail( function(){
			alert( "ERROR" );
		});
	});

	$( "#btn-procesar-compra" ).click( function(){
		alert( "Procesa compra" );
	});

});

/*funcion para evento onclick borrar_click */
function borra_click( articulo, rowid ){
	$( "#modal-borrar-articulo" ).html( articulo );
	$( "#btn-borrar-confirmar" ).attr( "data-rowid", rowid );
}

function procesar_compra()
{
	if( appData.correo == "" )
	{
		$( location ).attr( "href", appData.base_url + "frontend/login" );
	}
	else
	{
		$( location ).attr( "href", appData.base_url + "frontend/procesocompra" );
	}
}


