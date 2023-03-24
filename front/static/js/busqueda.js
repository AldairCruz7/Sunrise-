$( document ).ready( function(){

	$( "#btn-busqueda" ).click( function(){
		/*Función AJAX para busqueda*/
		$.ajax({
			"url"		: appData.url_ws + "articulo/getarticulosxpalabra",
			"type"		: "post",
			"data"		: {
				"palabra" : $( "#buscar" ).val()
			},
			"dataType"	: "json"

		})
		.done( function( json ){
			if( json.resultado )
			{
                $( "#lista-articulos" ).hide();
				$( "#imagen-header" ).hide();
				$( "#lista-articulosxpalabra" ).html( "" );

		        /*Generador de CARDS de articulos*/
		        $.each( json.articulos, function( i, articulo ) {
		            $( "#lista-articulosxpalabra" ).append(
		                '<div class="col-md-4 mb-5"> ' 
		                    + ' <div class="card h-100">'  
		                    + '  <img class="card-img-top" src="'+ articulo.urlImagen +'">'  
		                    + '   <div class="card-body">' 
		                    + '    <h4 class="card-title">'+ articulo.articulo +'</h4>' 
		                    + '    <p class="card-text">'+ articulo.descripcion +'</p>'  
		                    + '    <p class="card-text" style="color: red; font-size: 1.5em; ">$ '+ articulo.precio +'</p>'  
		                    + '    </div>'  
		                    + '    <div class="card-footer">'
		                    + '    <p class="card-text" id="stock">'+ "Cantidad disponible: " + articulo.stock + " unidades" +'</p>'

		                        /*Input cantidad*/
							+ '		<div class="input-group mb-3" style="max-width: 150px; margin: auto;">'
							+ '		   <div class="input-group-prepend">'
							+ '		     <button class="btn btn-outline-dark" onclick="minus_click' 
							+ '          ( '+ articulo.idArticulo +' )" type="button">&minus;</button>'
							+ '		   </div>'
							+ '		   <input type="text" id="cantidad-'+ articulo.idArticulo +'" class="form-control text-center"'
							+ '        value="1" aria-describedby="button-addon1" readonly>'
							+ '		   <div class="input-group-append">'
							+ '		     <button class="btn btn-outline-dark" onclick="plus_click' 
							+ '          ( '+ articulo.stock + ',' + articulo.idArticulo +' )" type="button">&plus;</button>'
							+ '		   </div>'
							+ '		</div>'
		                        /*Input cantidad*/

		                        /*Button lista deseos*/
		                    + '    <button type="button" class="btn btn-dark form-control"'
		                    + '    onclick="lista_click('+ articulo.idArticulo +')">'
		                    + '    Agregar a mi lista de deseos</button>&nbsp;' 
		                        /*Button lista deseos*/

		                        /*Button carrito compras*/
		                    + '    <button type="button" class="btn btn-dark form-control"'
		                    + '    onclick="carrito_click('+ articulo.idArticulo +','+ articulo.stock +')">'
		                    + '    Agregar al carrito</button>' 
		                        /*Button carrito compras*/
		                    + '  </div>' 
		                    + ' </div>'
		                    + ' </div>'
		                );
		        });

			}
			else
			{
                muestra_mensaje( "info", "No se obtuvo ningún resultado, intente con otra palabra" );
			}
		})
		.fail( function(){
			alert( "ERROR" );
		});
	});
});


/*Función para el evento onclick lista_click*/
function lista_click( idArticulo ){

    /*Verificación de sesión activa */
    if ( appData.correo == "" )
    {
        muestra_mensaje( "warning", "Debes iniciar sesión para agregar a tu lista");
        return false;
    }

    /*Función AJAX para un INSERT */
    $.ajax({
            "url"      : appData.url_ws + "listadeseos/insertdeseo",
            "type"     : "post",
            "data"     :{
                "idCliente"       : appData.idCliente,
                "idArticulo"      : idArticulo
            },
            "dataType" : "json"
        })
        .done( function( json ){
            if ( json.resultado ) 
            {
                muestra_mensaje( "success", "Producto agregado a tu lista");
                listacontador();
            }
            else
            {
                if( json.respuesta == "400" )
                {
                    muestra_mensaje( "info", "Ya tienes agregado este producto");
                }
                else if ( json.respuesta == "404" )
                {
                    muestra_mensaje( "danger", "¡Lo sentimos! :( ocurrió un error" );
                }
            }
        })
        .fail( function(){
            alert( "ERROR" );
    });

    return true;
}

/*Función para el evento onclick carrito_click*/
function carrito_click( idArticulo, stock ){
    console.log("id", idArticulo);
    /*Función AJAX para obtener el objeto articulo */
    $.ajax({
        "url"      : appData.url_ws + "articulo/getarticulo",
        "type"     : "post",
        "data"     : {
            "idarticulo" : idArticulo
        },
        "dataType" : "json"
    })
    .done( function( json ){

        console.log( "JSONN",json );

        if( json.respuesta && parseInt( stock ) > 0 )
        {
            /*Función AJAX para envío de datos al controlador FRONTEND */
            $.ajax({
                "url"       : appData.base_url + "frontend/agregacarrito",
                "type"      : "post",
                "data"      : {
                    "idArticulo"    : json.articulo.idArticulo, 
                    "cantidad"      : $( "#cantidad-" + json.articulo.idArticulo ).val(),
                    "precio"        : json.articulo.precio,
                    "articulo"      : json.articulo.articulo,
                    "imagen"        : json.articulo.urlImagen,
                    "idInventario"  : json.articulo.idInventario,
                    "stock"         : json.articulo.stock,
                    "nombre"        : json.articulo.nombre,
                },
                "dataType"  : "json"
            })
            .done( function( json ){
                if ( json.resultado )
                {
                    console.log("agregado correctamente")
                    muestra_mensaje( "success", "Producto agregado" );
                    carritocontador();
                }
                else
                {
                    muestra_mensaje( "danger", "Algo salio mal :(" );
                }
            })
            .fail( function(){
                console.log("fallooooooooo")
            });
        }
        else
        {
            muestra_mensaje( "danger", "Lo sentimo :( producto esta agotado" );
        }
    })
    .fail( function(){
        alert( "ERRORrrrr" );
    });
}

/*Función para el evento onclick minus_click para controlar la cantidad a agregar al carrito*/
function minus_click( articulo ){

    var cantidadminus = parseInt( $( "#cantidad-" + articulo ).val() );

    if( cantidadminus > 1 )
    {
    	cantidadminus = cantidadminus - 1 ;
    	$( "#cantidad-" + articulo ).val( cantidadminus );
    }
    else
    {
    	muestra_mensaje( "danger", "Mínimo de productos" );
    	$( "#cantidad-" + articulo ).val( cantidadminus );
    }
}

/*Función para el evento onclick plus_click para controlar la cantidad a agregar al carrito*/
function plus_click( stock, articulo ){

    var cantidadplus = parseInt( $( "#cantidad-" + articulo ).val() );
    var stockactual  = parseInt (stock); 

    if( cantidadplus < stockactual )
    {
    	cantidadplus = cantidadplus + 1 ;
    	$( "#cantidad-" + articulo ).val( cantidadplus );
    }
    else
    {
    	muestra_mensaje( "danger", "Máximo de productos" );
    	$( "#cantidad-" + articulo ).val( stockactual );
    }
}

function carritocontador(){

   if ( $( "#carrito-contador" ).text() == "" )
    {
        $( "#carrito-contador" ).html( 1 );
    }
    else
    {
        var contador = parseInt( $( "#carrito-contador" ).text() );
        contador = contador + 1;
        $( "#carrito-contador" ).html( contador );
    }
}

function listacontador(){

   if ( $( "#lista-contador" ).text() == "" )
    {
        $( "#lista-contador" ).html( 1 );
    }
    else
    {
        var contador = parseInt( $( "#lista-contador" ).text() );
        contador = contador + 1;
        $( "#lista-contador" ).html( contador );
    }
}