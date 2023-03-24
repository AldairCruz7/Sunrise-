<?php
class Autentificacion extends CI_Controller{

    /***********************************************CLIENTE*******************************************************/
    
    public function __construct(){
        parent::__construct();
        $this->load->model( "Autentificacion_model" );
    }

    public function registro(){
            /*Parámetro recibidos por post*/
            $nombre          =  $this->input->post( "nombre" );
            $telefono        =  $this->input->post( "telefono" );
            $correo          =  $this->input->post( "correo" );
            $password        =  $this->input->post( "contrasenia" );

            /*Verificación de la encriptación de la contraseña*/
          
            /*Arreglo de los datos obtenidos*/
            $array = array(
                "nombre"         => $nombre,
                "telefono"       => $telefono, 
                "correo"         => $correo,
                "contrasenia"    => md5($password),
                "fecha_registro" => null
            );
            $rs=  $this->Autentificacion_model->registro($array);

            $data["response"] =  $rs != null ? "Registrado en el sistema" : "Hubo un error";
            $data["resultado"] = true;
            $data["Data"] =  $data["response"] != null ? $rs : false;
            
            echo json_encode($data); 
    }

    public function login (){
        $correo          =  $this->input->post( "correo" );
        $password        =  $this->input->post( "contrasenia" );


        /*Verificación de la encriptación*/
        if ( strlen( $password ) == 32 )
        {
            $contrasenia = $password;
        }
        else
        {
            $contrasenia = md5( $password );
        }        

        $data = $this->Autentificacion_model->login( $correo, $contrasenia );

        $obj[ "resultado" ] = $data != NULL;

        $obj[ "respuesta" ] = $data != NULL ?
            "200":
            "404";

        if ( $obj[ "resultado" ] )
        {
            $obj[ "cliente" ]   = $data;
        }
        /* Respondemos con el objeto EN FORMATO JSON */       
        echo json_encode( $obj );
    }

        public function getcliente (){
        /*Parámetro recibidos por post*/
        $correo          =  $this->input->post( "correo" );

        $data = $this->Autentificacion_model->get_cliente( $correo );

        $obj[ "resultado" ] = $data != NULL;

        $obj[ "respuesta" ] = $data != NULL ?
            "200":
            "404";

        if ( $obj[ "resultado" ] )
        {
            $obj[ "cliente" ]   = $data;
        }
        /* Respondemos con el objeto EN FORMATO JSON */       
        echo json_encode( $obj );
    }



    /********************************************ADMINISTRADOR*********************************************/

    public function loginadmi(){
        /*Parámetro recibidos por post*/
        $correo          =  $this->input->post( "correo" );
        $password        =  $this->input->post( "contrasenia" );

        /*Verificación de la encriptación*/
        if ( strlen( $password ) == 32 )
        {
            $contrasenia = $password;
        }
        else
        {
            $contrasenia = md5( $password );
        }

        $data = $this->Autentificacion_model->login_admi( $correo, $contrasenia );

        $obj[ "resultado" ] = $data != NULL;

        $obj[ "respuesta" ] = $data != NULL ?
            "200":
            "404";

        if ( $obj[ "resultado" ] )
        {
            $obj[ "cliente" ]   = $data;
        }
        /* Respondemos con el objeto EN FORMATO JSON */       
        echo json_encode( $obj );
    }

    public function getclientes(){
        /*Obtenemos el arreglo de la consulta en el modelo */
        $data = $this->Autentificacion_model->get_lista_clientes();
        $obj[ "resultado" ] = $data != NULL;

        $obj[ "respuesta" ] = $data != NULL ?
            "200":
            "404";

        if ( $obj[ "resultado" ] )
        {
            $obj[ "clientes" ]   = $data;
        }
        /* Respondemos con el objeto EN FORMATO JSON */
        echo json_encode( $obj );
    }

}
?>