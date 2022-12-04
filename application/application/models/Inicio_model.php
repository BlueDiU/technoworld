<?php
class Inicio_model extends CI_Model
{

	public function login($usuario)
	{
		$this->db->select('*');
		$this->db->from('usuarios');

		$this->db->where('usuario', $usuario);

		$query = $this->db->get();
		return $query->result();
	}
}
