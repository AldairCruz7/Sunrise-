<?php
class Articulo_model extends CI_Model{

    public function get_lista_articulos(){
        /*Parámetros de la consulta*/ 
        $this->db->select( "*" );
        $this->db->from( "articulos"); 
        $this->db->where("stock >=",1);

        /*Ejecucion de la consulta*/ 
        $query = $this->db->get();

        /*Retorna NULL si es igual a 0, o si no el arreglo*/ 
        return $query->result();
    }

    public function get_lista_articulosxpalabra( $palabra ){
        /*Parámetros de la consulta*/ 
        $this->db->select( "articulos.idArticulo, articulos.nombre AS articulo, descripcion, costo, precio, urlImagen, categoria.nombre AS categoria, stock, idInventario" );
        $this->db->from( "articulos" ); 
        $this->db->join( "categoria", "categoria.idCategoria = articulos.idCategoria" ); 
        $this->db->join( "inventario", "inventario.idArticulo = articulos.idArticulo" ); 
        $this->db->where( "articulos.nombre LIKE '%$palabra%' " );


        /*$this->db->from( "articulos, categoria, inventario" ); 
        $this->db->where( "categoria.idCategoria = articulos.idCategoria AND inventario.idArticulo = articulos.idArticulo" );

        /*Ejecucion de la consulta*/ 
        $query = $this->db->get();

        /*Retorna NULL si es igual a 0, o si no el arreglo*/ 
        return $query->num_rows() == 0 ? NULL : $query->result();
    }

    public function get_articulo( $idarticulo ){
        /*Parámetros de la consulta*/ 
        $this->db->select( "*" );
        $this->db->from( "articulos" );
        $this->db->where( "idArticulo" ,$idarticulo ); 


        /*Ejecucion de la consulta*/ 
        $query = $this->db->get();

        /*Retorna NULL si es igual a 0, o si no el arreglo*/ 
        return $query->num_rows() == 0 ? NULL : $query->row();
    }

    public function get_historial_compras( $idCliente ){
        $this->db->select( "urlImagen as imagen, nombre as articulo, cantidad, subtotal, fecha_vta" );
        $this->db->from( "detalle_vta" );
        $this->db->join( "venta", "venta.no_vta = detalle_vta.no_vta" );
        $this->db->join( "inventario", "inventario.idInventario = detalle_vta.idInventario" );
        $this->db->join( "articulos", "inventario.idArticulo = articulos.idArticulo" );
        $this->db->where( "idCliente = '$idCliente' " );
        $this->db->order_by( "fecha_vta", "DESC" );

        /*Ejecucion de la consulta*/ 
        $query = $this->db->get();

        /*Retorna NULL si es igual a 0, o si no el arreglo*/ 
        return $query->num_rows() == 0 ? NULL : $query->result();
    }
}
?>