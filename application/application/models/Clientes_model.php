<?php
class Clientes_model extends CI_Model
{

  //Funcion para obtener todos los productos
  function get_clientes($code = null)
  {
    $this->db->select('cliente.*, usuarios.usuario');

    $this->db->from('cliente');

    $this->db->join('usuarios', 'usuarios.id_usuario=cliente.id_usuario');

    $this->db->where('cliente.estado = 1');

    if ($code != null) {
      $this->db->where('cliente.id_cliente', $code);
    }

    $query = $this->db->get();
    return $query->result();
  }


  //Funcion para guardar los productos a la tabla
  function save_cliente($data)
  {
    $result = $this->db->insert('cliente', $data);
    return $result;
  }

  function save_usuario($data)
  {
    $result = $this->db->insert('usuarios', $data);
    return $result;
  }

  function update_cliente($code, $data)
  {
    $this->db->where('id_cliente', $code);
    $this->db->update('cliente', $data);
    return true;
  }

  function eliminar_cliente($code, $data)
  {
    $this->db->where('id_cliente', $code);
    $this->db->update('cliente', $data);
    return true;
  }
}
