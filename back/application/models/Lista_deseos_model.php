<?php

class Lista_deseos_model extends CI_Model{
	
	public function get_lista_deseos( $idCliente ){
		$this->db->select( "articulos.idArticulo, idCliente, articulos.nombre AS articulo, urlImagen, descripcion, precio, categoria.nombre as categoria" );
		$this->db->from( "articulos, categoria, lista_deseos" );
		$this->db->where( "lista_deseos.idCliente = '$idCliente' AND articulos.idArticulo = lista_deseos.idArticulo AND articulos.idCategoria = categoria.idCategoria" );
        $query = $this->db->get();

        /*Retorna NULL si es igual a 0, o si no el arreglo*/ 
        return $query->num_rows() == 0 ? NULL : $query->result();
	}

	public function insert_deseo( $data ){
		/*Obtenemos loa valores del objeto*/
		$idCliente  = $data[ "idCliente" ];
		$idArticulo = $data[ "idArticulo" ];

		/*Validar que no exista el mismo producto*/
		$this->db->where( "idCliente = '$idCliente' AND idArticulo = '$idArticulo '" );
		$query = $this->db->get( "lista_deseos");
		$obj[ "resultado" ] = $query->num_rows() == 0;
        /*En caso que la consulta sea igual a 0, es decir ningun registro del mismo producto */

		if ( $obj[ "resultado" ] )
		{
			$this->db->insert( "lista_deseos", $data );
			$obj[ "resultado" ] = $this->db->affected_rows() == 1; //Si ha sido insertado el registro
			$obj[ "respuesta" ] = $obj[ "resultado" ] ?
				"200"  :  //si no 
				"404";
		}
		else
		{
			$obj[ "respuesta" ] = "400";
		}

		return $obj;

	}

	public function delete_deseo ( $idCliente, $idArticulo ){
		/*Validar la existencia del producto*/
		$this->db->where( "idCliente = '$idCliente' AND idArticulo = '$idArticulo '");
		$query = $this->db->get( "lista_deseos");
        $obj[ "resultado" ] = $query->num_rows() > 0;
        
        if( $obj[ "resultado" ] )
        {
            $this->db->where( "idCliente = '$idCliente' AND idArticulo = '$idArticulo '" );
            $this->db->delete( "lista_deseos" );
            $obj[ "resultado" ] = $this->db->affected_rows() > 0;
            $obj[ "respuesta" ]   = $obj[ "resultado" ] ?
                  "200" :
                  "404";
        }
        else
        {
            $obj[ "respuesta" ] = "400";
        }

        return $obj;
	}
}
?>