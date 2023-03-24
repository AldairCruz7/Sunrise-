<?php
class Autentificacion_model extends CI_Model{

    /***********************************************CLIENTE*******************************************************/

    public function registro( $data ) {
    
            $this->db->insert('cliente', $data);
            return $this->db->insert_id();
        }
    

    public function login( $correo, $contrasenia ) {
        $this->db->where("correo = '$correo' AND contrasenia LIKE BINARY '$contrasenia'");
        $query = $this->db->get('cliente');

        /*Si existe un registro, retornamos el objeto del usuario de lo contrario retornamos nulo*/
        return $query->num_rows() == 1 ? $query->row() : NULL;
    }


    public function get_cliente( $correo ) {
        $this->db->where("correo = '$correo'");
        $query = $this->db->get('cliente');

        /*Si existe un registro, retornamos el objeto del usuario de lo contrario retornamos nulo*/
        return $query->num_rows() == 1 ? $query->row() : NULL;
    }



    /********************************************ADMINISTRADOR*********************************************/

    public function login_admi( $correo, $contrasenia ) {
        $this->db->where("correo = '$correo' AND contrasenia LIKE BINARY '$contrasenia'");
        $query = $this->db->get('administrador');

        /*Si existe un registro, retornamos el objeto del usuario de lo contrario retornamos nulo*/
        return $query->num_rows() == 1 ? $query->row() : NULL;
    }

    public function get_lista_clientes(){
        /*Ejecucion de la consulta*/ 
        $query = $this->db->get( "cliente" );

        /*Retorna NULL si es igual a 0, o si no el arreglo*/ 
        return $query->num_rows() == 0 ? NULL : $query->result();
    }
}
?>