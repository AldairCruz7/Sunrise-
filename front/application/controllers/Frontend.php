<?php
class Frontend extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->library( 'cart' );
		$cart_products = $this->session->userdata('cart_products');
	} 


	/**** Vistas ***/
	public function index()
	{
		$this->load->view( "inicio_view" );
	}

	public function login()
	{
		$this->load->view( "login_view" );
	}

	public function listadeseos()
	{
		$this->load->view( "lista_deseos_view" );
	}

	public function catalogo()
	{
		$this->load->view( "catalogo_view" );
	}

	public function totalcarrito()
	{
		$this->load->view( "carrito_compras_view" );
	}
	
	public function procesocompra()
	{
		$this->load->view( "proceso_compra_view" );
	}

	public function carritocompras()
	{
		$this->load->view( "carrito_compras_view" );
	}

	public function loginadmi()
	{
		$this->load->view( "login_admi_view" );
	}

	public function listaarticulos()
	{
		$this->load->view( "lista_articulos_view" );
	}

	public function listaclientes()
	{
		$this->load->view( "lista_clientes_view" );
	}

	public function listaadmi()
	{
		$this->load->view( "lista_admi_view" );
	}

	public function registro()
	{
		$this->load->view( "formulario_registro_view" );
	}

	/**** Control de sesiones ***/

	 	/*Sesión de cliente*/
		public function inicio( $correo )
		{
			$this->creasesion( $correo );

			$verificación = $this->cart->total_items();
			
			if ( $verificación >= 1 )
			{
				redirect( base_url()."frontend/procesocompra");
			}
			else
			{
				redirect( base_url());
			}
		}

		private function creasesion( $correo ) 
		{
			$this->session->set_userdata( "correo", $correo );
		}

		public function cierrasesion() 
		{
			$this->session->unset_userdata( "correo" );
			redirect( base_url());
		}
		
		public function historial()
		{
		$this->load->view( "historial_compras_view" );
		}



		/*Sesión carrito*/
		public function agregacarrito()
		{
			$cart_products = $this->session->userdata('cart_products');

			$idArticulo   = $this->input->post( "idArticulo" );
			$nombreProducto = $this->input->post( "nombre" );
			$cantidad	  = $this->input->post( "cantidad" );
			$precio		  = $this->input->post( "precio" );
			$articulo	  = $this->input->post( "articulo" );
			$imagen		  = $this->input->post( "imagen" );
			$idInventario = $this->input->post( "idInventario" );
			$stock		  = $this->input->post( "stock" );
			
			
			$data = array(
				"id"     		=> $idArticulo,
				"qty"	 		=> $cantidad,
				"price"	  		=> $precio,
				"imagen"  		=> $imagen,
				"idInventario"  => $idInventario,
				"stock"			=> $stock,
				"nombre" 		=> $nombreProducto,

			);
			

			if (($data != null)) {
			
			/*Parámetro recibidos por post*/
		
			


			/*Generación de arreglo $data*/
		


			$tamaño = count($data);
			$producto_existe = false;

			if($tamaño != null){
				foreach ($cart_products as &$producto) {
					if ($producto["id"] == $idArticulo) {
						// El producto ya existe en el carrito, sumar la cantidad
						$producto["qty"] += $cantidad;
						$producto_existe = true;
						break;
					}
				}
	
				unset($producto); // Liberar la referencia al último elemento del arreglo
				// Si el producto no existe en el carrito, agregarlo al final del arreglo
				if (!$producto_existe) {
					$cart_products[] = $data;
				}
			}
			

			// Guardar el arreglo actualizado en la sesión
			$this->session->set_userdata('cart_products', $cart_products);

			// Devolver el arreglo como respuesta en formato JSON
	
			$datra["resultado"] = $cart_products != NULL ? true: false;
			$datra['cart_products'] = $cart_products;
			
		
			} else {
				$datra["resultado"] = false;
				$datra["mensaje"] = "Error: el valor de no es un array válido";
			}
			
			echo json_encode( $datra );
		}

		public function borracarrito()
		{
			
			$cart_products = $this->session->userdata('cart_products');
			$idArticulo = $this->input->post('id');

			// Recorrer los productos del carrito para buscar el producto que deseas eliminar por su ID
			foreach ($cart_products as $key => $producto) {
				if ($producto['id'] == $idArticulo) {
					// Eliminar el producto del carrito
					unset($cart_products[$key]);
					break;
				}
			}

			// Actualizar los productos del carrito en la sesión
			$newCarrito = $this->session->set_userdata('cart_products', $cart_products);

			
			/*Devolver TRUE o FALSE en un objeto JSON*/
			$obj[ "resultado" ] = $newCarrito == NULL ? true: false;
			echo json_encode( $obj );
		}

		public function getcarrito()
		{

			$cart_products = $this->session->userdata('cart_products');
			/*Obtenemos el contenido y el total de la sesión cart*/
		
			
	
			/*Devolver TRUE o FALSE en un objeto*/
			$obj[ "resultado" ] = $cart_products != NULL ? true: false;

			$obj["data"]= $obj[ "resultado" ] != false ? $cart_products : null;

	        /* Respondemos con el objeto EN FORMATO JSON */
			echo json_encode( $obj );
		}	
		
		public function borrarCarrtio(){
			$ojb = $this->session->unset_userdata('cart_products');
			
			$obj[ "resultado" ] = $ojb != NULL ? true: false;
			$obj["mesanje"]		= $obj[ "resultado" ] != false ? "Se borro el carrito" : "No se borro el carrito";
			echo json_encode( $obj );
		}
}
?>