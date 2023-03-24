<?php
class Proceso_compra_model extends CI_Model{

	public function insert_venta( $data ){

		$this->db->insert( "venta", $data );
		$obj[ "resultado" ] = $this->db->affected_rows() == 1; //Si ha sido insertado el registro
		$obj[ "respuesta" ] = $obj[ "resultado" ] ?
			"200"  :  //si no 
			"404";

		if( $obj[ "resultado" ] )
		{
			$obj[ "no_vta" ] = $this->db->insert_id();
		}

		return $obj;

	}

	public function insert_detalle_venta( $data ){

		$this->db->insert( "detalle_vta", $data );
		$obj[ "resultado" ] = $this->db->affected_rows() == 1; //Si ha sido insertado el registro
		$obj[ "respuesta" ] = $obj[ "resultado" ] ?
			"200"  :  //si no 
			"404";

		return $obj;
	}

	public function update_inventario( $data ){
		$this->db->where( "idInventario", $data[ "idInventario" ] );
		$this->db->update( "inventario", $data );
		$obj[ "resultado" ] = $this->db->affected_rows() == 1;
		$obj[ "respuesta" ]   = $obj[ "resultado" ] ?
			"200" :
			"404";

		return $obj;
	}

}
?>