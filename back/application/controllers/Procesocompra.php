<?php
class Procesocompra extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model( "Proceso_compra_model" );
    }

    public function insertventa(){
    	$idCliente =  $this->input->post( "idCliente" );

        $data = array(
            "fecha_vta" => date('Y-m-d'),
            "idCliente" => $idCliente
        );

        echo json_encode( $this->Proceso_compra_model->insert_venta($data) );
    }

    public function insertdetallevta(){
    	$cantidad		= $this->input->post( "cantidad" );
    	$no_vta			= $this->input->post( "no_vta" );
    	$idInventario	= $this->input->post( "idInventario" );
    	$subtotal		= $this->input->post( "subtotal" );

    	$data = array(
    		"cantidad"		=> $cantidad,
    		"no_vta"		=> $no_vta,
    		"idInventario"	=> $idInventario,
    		"subtotal"		=> $subtotal
    	);

    	echo json_encode( $this->Proceso_compra_model->insert_detalle_venta($data) );
    }

    public function updateinventario(){
    	$idInventario	    = $this->input->post( "idInventario" );
    	$newstock		    = $this->input->post( "newstock" );

    	$data = array(
    		"idInventario" => $idInventario,
    		"stock"        => $newstock
    	);

    	echo json_encode( $this->Proceso_compra_model->update_inventario($data) );
    }



}
?>