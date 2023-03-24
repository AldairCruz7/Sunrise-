<?php
class Venta_model extends CI_Model{

    public function Comprausuario($arrData){

        $this->db->insert('venta', $arrData);
        return $this->db->insert_id();
    }

    public function ComprausuarioDetalle($arrData){

      $query =   $this->db->insert_batch('detalleVenta', $arrData);
        return $query;
    }
    
}
?>