<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function __construct(){
		parent::__construct();
		$this->load->model('Consultas');
	}
	

	public function index(){
		$listado_alumnos = $this->Consultas->select_alumno();
		$data = array('listado_alumnos' => $listado_alumnos);
		$this->load->view('listado', $data);
	}

	public function alumnos(){
		$id = $this->input->post('id');
		$nombre = $this->input->post('nombre');
		$apellido = $this->input->post('apellido');
		$telefono = $this->input->post('telefono');
		$correo = $this->input->post('correo');
		$direccion = $this->input->post('direccion');
		$this->Consultas->insert_alumno($nombre, $apellido, $telefono, $correo, $direccion, $id);
	}

	public function delete(){
		$id = $this->input->post('id');
		$this->Consultas->delete_alumno($id);
	}
}
