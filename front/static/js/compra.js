$(  document ).ready( function(){

	$.ajax({
		"url"		: appData.base_url + "frontend/getcarrito",
		"dataType"	: "json"
	})
	.done( function( json ){
		if( json.resultado )
		{
			
			$.each( json.data, function( i, carrito ){
				$( "#table-compra" ).find( "tbody" ).append(
					'<tr>'
					+ ' <td>'+carrito.nombre+'</td>'
					+ ' <td>'
					+ ( parseInt(carrito.qty) > parseInt(carrito.stock) ? carrito.stock : carrito.qty )
					+ '</td>'
					+ ' <td>$'+carrito.price+'</td>'
					+ ' <td style="text-align: center;" >$'+(carrito.qty * carrito.price)+'</td>'
					+ ' </tr>'
				);
			})

			

			$("#Arr").val()
			
			$( "#generarfactura" ).click(function(){
				if( $(this).is(":checked") )
				{
					$( "#datos" ).append(
									'<div class="form-group col col-md-2" id="group-nombre">'
							+			'<label for="nombre"><strong>Nombre:</strong></label>'
							+			'<input type="text" class="form-control" name="nombre" id="nombre">'
							+		'</div>'
							+		'<div class="form-group col col-md-4" id="group-apellidos">'
							+			'<label for="apellidos"><strong>Apellidos:</strong></label>'
							+			'<input type="text" class="form-control" name="apellidos" id="apellidos">'
							+		'</div>'
							+		'<div class="form-group col col-md-2" id="group-rfc">'
							+			'<label for="rfc"><strong>RFC:</strong></label>'
							+			'<input type="text" class="form-control" name="rfc" id="rfc">'
							+		'</div>'
							+		'<div class="form-group col col-md-4" id="group-correo">'
							+			'<label for="correo"><strong>Correo:</strong></label>'
							+			'<input type="text" class="form-control" name="rfc" id="rfc"'
							+            'value="'+ appData.correo+'" readonly>'
							+		'</div>'

						);

					$( "#direccion" ).append(
									'<div class="form-group col col-md-4" id="group-domicilio">'
							+			'<label for="domicilio"><strong>Domicilio:</strong></label>'
							+			'<input type="text" class="form-control" name="domicilio" id="domicilio">'
							+		'</div>'
							+		'<div class="form-group col col-md-4" id="group-colonia">'
							+			'<label for="colonia"><strong>Colonia:</strong></label>'
							+			'<input type="text" class="form-control" name="colonia" id="colonia">'
							+		'</div>'
							+		'<div class="form-group col col-md-2" id="group-cp">'
							+			'<label for="cp"><strong>CP:</strong></label>'
							+			'<input type="text" class="form-control" name="cp" id="cp">'
							+		'</div>'	
							+		'<div class="form-group col col-md-2" id="group-telefono">'
							+			'<label for="telefono"><strong>Teléfono:</strong></label>'
							+			'<input type="text" class="form-control" name="telefono" id="telefono">'
							+		'</div>'					
						);
				}
				else
				{
					$( "#datos" ).hide();
					$( "#direccion" ).hide();
				}

			});

			$( "#opciones" ).append(
			  '<table class="table " id="table-opciones">'
	            + '    <thead>'
	            + '      <tr>'
	            + '        <th scope="col" style="font-size: 15pt; text-align: center; ">Tu compra</th>'
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
			$("#ArraTotal").val(total);

			$( "#table-opciones" ).find( "tbody" ).append(
			  '<tr>'
				+ ' <td width="50" style=" text-align: center; font-size: 15pt;" >'
				+ '   <b>Total:</b>&nbsp;&nbsp;&nbsp;&nbsp;<b style="color: #0482a4;">$'+total+'</b></td>'
				+ '</tr>'
				+ '<tr>'
	            + ' <td>'

	            + '  <button style="width: 250px;" type="button" class="btn btn-dark" onclick="pagar()">Pagar</button>'

	            + '	</td>'
	            + '</tr>'
			);
		
			$( "#table-compra" ).find( "tbody" ).append(
					'<tr>'
					+ ' <td style="color: black; font-size: 15pt; text-align: right;" colspan="3">TOTAL</td>'
					+ ' <td style="color: black; font-size: 15pt; text-align: center;" >$'+total+'</td>'
					+ ' </tr>'
				);

		

		}
		else
		{
			muestra_mensaje( "danger", "Lo sentimos :( algo salio mal" );
		}
	})
	.fail( function(){
		alert( "Error" );
	});

});




function pagar(){

	 
	

	$.ajax({
		"url"		: appData.base_url + "frontend/getcarrito",
		"dataType"	: "json"
	})
	.done( function( json ){
		if( json.resultado ){

			// console.log("carrito", JSON.stringify(json.data) ,typeof(json.data))
			const carrito = JSON.stringify(json.data);
			
			/*función AJAX para el objeto cliente*/
			$.ajax({
				"url"      : appData.url_ws + "autentificacion/getcliente",
				"type"     : "post",
				"data"     :{
					"correo"       : appData.correo
				},
				"dataType" : "json"
			})
			.done( function( reponseUser) {
	
			

				const idUsuario = reponseUser.cliente.idCliente;
				
				if( json.resultado )	//obtenmos la data del usuario
				{		

					console.log("soy el carrito de compras", carrito)
					const total = $("#ArraTotal").val();
					//mandamos todo al controlador venta

					$.ajax({
						"url"      : "http://dtai.uteq.edu.mx/~jorolv195/AWOS/project/back/Venta/OrdenCompra",
						"type"     : "post",
						"data"     :{
							"Array"       : carrito,
							"total"       : total,
							"idUsuario"   : idUsuario
						},
						"dataType" : "json"
					})
					.done( function( response) {
						
						console.log("response", response)
						if( json.resultado )	//obtenmos la data del usuario
						{		
							
							$.ajax({
								"url"		: appData.base_url + "frontend/borrarCarrtio",
								"dataType"	: "json"
							})
							.done( function( response) {
								muestra_mensaje( "success", "Compra realizada correctamente" );
									// Definimos la función que se ejecutará después de 5 segundos
									function miFuncion() {
										$( location ).attr( "href", appData.base_url + "frontend/index" );
									}
									
									// Llamamos a la función setTimeout() y le pasamos como argumentos la función a ejecutar y el tiempo de espera en milisegundos (5000 = 5 segundos)
									setTimeout(miFuncion, 3000);

							
								
							})
							.fail( function(){
								alert( "Error" );
								function miFuncion() {
									$( location ).attr( "href", appData.base_url + "frontend/index" );
								}
								
								// Llamamos a la función setTimeout() y le pasamos como argumentos la función a ejecutar y el tiempo de espera en milisegundos (5000 = 5 segundos)
								setTimeout(miFuncion, 3000);
							});
						}
						else
						{
							muestra_mensaje( "warning", "Debes iniciar sesión para realizar tu compra" );
						}
		
					})
					.fail( function(){
						alert( "Error" );
					});


				


					
					
				}
				else
				{
					muestra_mensaje( "warning", "Debes iniciar sesión para realizar tu compra" );
				}

			})
			.fail( function(){
				alert( "Error" );
			});
		}
	})	
	
	.fail( function(){
		alert( "Error" );
	});
				
}