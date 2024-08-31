<?php
     defined('BASEPATH') OR exit('No direct script access allowed');
     
     class Consultas extends CI_Model { 
          
          
          public function __construct(){
               parent::__construct();
          }

          public function insert_alumno($nombre, $apellido, $telefono, $correo, $direccion, $id){
               if(empty($nombre) && empty($apellido) && empty($telefono) && empty($correo) && isset($direccion)){
                    echo 'error no se vienen datos';
                    exit();
               }

               $data = array(
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'direccion' => $direccion,
                    'telefono' => $telefono,
                    'correo' => $correo
               );
               
               if ($id != 0) {
                    $this->db->where('id_alumno', $id);
                    $this->db->update('alumno', $data);
                    if (!$this->db->affected_rows()) {
                         echo 'error no se agregaron los registros update';
                         exit;
                    }
                    echo 1;
                    exit();
               }else {
                    if (!$this->db->insert('alumno', $data)) {
                         echo 'error no se agregaron los registros';
                         exit;
                    }
                    echo 1;
                    exit;
               }

              
          }

          public function select_alumno(){
               $consulta = $this->db->order_by('id_alumno','asc')->get('alumno');
               return $consulta->result();
          }

          public function delete_alumno($id){
               if (!$this->db->delete('alumno', array('id_alumno' => $id))) {
                    echo "Error, no se eliminoo el alumno";
                    exit;
               }
               echo 1;
          }
          
     
     }
?>