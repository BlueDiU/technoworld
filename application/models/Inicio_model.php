<?php
class Inicio_model extends CI_Model{

	public function login($usuario, $password){
		$this->db->where('usuario', $usuario);
		$this->db->where('contrasenia', $password);
		$usu = $this->db->get('usuarios');

		if($usu->num_rows()>0){
			return true;
		}else{
			return false;
		}


	}

}