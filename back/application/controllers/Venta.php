<?php
class Venta extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model( "Venta_model" );
    }

    public function index (){
        echo "<h1>Acceso no permitido<h2>";
    }

    
    public function OrdenCompra(){
        $idUsuario = $this->input->post("idUsuario");
        $total        = $this->input->post("total");
        $Carrito      = $this->input->post("Array");
       

        $arrData = array(
            'idUsuario' => $idUsuario,
            'fecha' => date('Y-m-d H:i:s'),
            'total' => $total
        );
        
      
        $array = json_decode($Carrito);

        $idVenta = $this->Venta_model->Comprausuario($arrData);

        if ($idVenta != null) {
                    foreach ($array as $obj) {
                        $obj->idVenta = $idVenta;
                    }
                    // Crear un nuevo array solo con los valores deseados
                    $newArray = array();
                    foreach ($array as $obj) {
                        $newObj = array();
                        $newObj['idArticulo'] = $obj->id;
                        $newObj['cantidad'] = $obj->qty;
                        $newObj['precio'] = $obj->price;
                        $newObj['idVenta'] = $obj->idVenta;
                        $newArray[] = $newObj;
                    }
                    $newJson = json_encode($newArray);

                    $CarritoFinal = json_decode($newJson, true);
           
            $data["Registro"] = $this->Venta_model->ComprausuarioDetalle($CarritoFinal);

        }else{
            $data["resultado"]  = false;
            $data["mensaje"]    = "Error al registrar venta";
            $data["Registro"]   = null;
        }

        $data["resultado"]     = $data["Registro"]  != null ? true : false;
        $data["mensaje"]    = $data["resultado"] ? "Compra registrada" : "ERROR en realizar la compra";
            
        $data["respuesta"] = $Carrito;

        echo JSON_encode($data);
    }
   

}
?>