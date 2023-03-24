<?php
class Articulo extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model( "Articulo_model" );
    }

    public function index (){
        echo "<h1>Acceso no permitido<h2>";
    }

    public function getarticulos(){
        /*Obtenemos el arreglo de la consulta en el modelo */
        $data = $this->Articulo_model->get_lista_articulos();
		$obj[ "resultado" ] = $data != NULL;

		$obj[ "respuesta" ] = $data != NULL ?
			"200":
			"404";

		if ( $obj[ "resultado" ] )
		{
			$obj[ "articulos" ]   = $data;
		}
        /* Respondemos con el objeto EN FORMATO JSON */
		echo json_encode( $obj );
    }

    public function getarticulosxpalabra(){
    	/*Parámetro recibido por post para la restricción de la consulta*/
        $palabra  = $this->input->post( "palabra" );

        /*Obtenemos el arreglo de la consulta en el modelo */
        $data = $this->Articulo_model->get_lista_articulosxpalabra( $palabra );
		$obj[ "resultado" ] = $data != NULL;

		$obj[ "respuesta" ] = $data != NULL ?
			"200":
			"404";

		if ( $obj[ "resultado" ] )
		{
			$obj[ "articulos" ]   = $data;
		}
        /* Respondemos con el objeto EN FORMATO JSON */
		echo json_encode( $obj );
    }

    public function getarticulo(){
        /*Parámetro recibido por post para la restricción de la consulta*/
        $idarticulo  = $this->input->post( "idarticulo" );

		$data = $this->Articulo_model->get_articulo( $idarticulo );
		$obj[ "resultado" ] = $data != NULL;

		$obj[ "respuesta" ] = $data != NULL ?
			"200":
			"404";

		if ( $obj[ "resultado" ] )
		{
			$obj[ "articulo" ]   = $data;
		}
        /* Respondemos con el objeto EN FORMATO JSON */       
		echo json_encode( $obj );
    }

    public function gethistorial(){
    	/*Parámetro recibido por post para la restricción de la consulta*/
        $idCliente  = $this->input->post( "idCliente" );

        $data = $this->Articulo_model->get_historial_compras( $idCliente );
		$obj[ "resultado" ] = $data != NULL;

		$obj[ "respuesta" ] = $data != NULL ?
			"200":
			"404";

		if ( $obj[ "resultado" ] )
		{
			$obj[ "historial" ]   = $data;
		}
        /* Respondemos con el objeto EN FORMATO JSON */       
		echo json_encode( $obj );
    }

	

}
?>