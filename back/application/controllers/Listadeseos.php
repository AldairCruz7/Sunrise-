<?php
class Listadeseos extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model( "Lista_deseos_model" );
	}

	public function getlistadeseos(){
		/*Parámetro recibido por post para la restricción de la consulta*/
        $idCliente  = $this->input->post( "idCliente" );

		 /*Obtenemos el arreglo de la consulta en el modelo */
        $data = $this->Lista_deseos_model->get_lista_deseos( $idCliente );
		$obj[ "resultado" ] = $data != NULL;

		$obj[ "respuesta" ] = $data != NULL ?
			"200":
			"404";

		if ( $obj[ "resultado" ] )
		{
			$obj[ "total" ]			= count($data);
			$obj[ "listadeseos" ]   = $data;
		}
        /* Respondemos con el objeto EN FORMATO JSON */
		echo json_encode( $obj );
	}

	public function insertdeseo(){
			/*Parámetro recibido por post para la restricción de la consulta*/
            $idCliente       =  $this->input->post( "idCliente" );
            $idArticulo      =  $this->input->post( "idArticulo" );      

            /*Arreglo con los datos recibidos por post*/
            $data = array(
                "idCliente"      => $idCliente,
                "idArticulo"     => $idArticulo
            );

			/* Respondemos con el objeto EN FORMATO JSON */
            echo json_encode( $this->Lista_deseos_model->insert_deseo($data) ); 
	}

	public function deletedeseo(){
		/*Parámetro recibido por post para la restricción de la consulta*/
            $idCliente       =  $this->input->post( "idCliente" );
            $idArticulo      =  $this->input->post( "idArticulo" );      

			/* Respondemos con el objeto EN FORMATO JSON */
            echo json_encode( $this->Lista_deseos_model->delete_deseo( $idCliente, $idArticulo) ); 
	}

}
?>