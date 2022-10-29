<?php
class Clientes_model extends CI_Model
{

  //Funcion para obtener todos los productos
  function get_clientes($code = null)
  {
    $this->db->select('*');

    $this->db->from('cliente');

    $this->db->where('estado = 1');

    if ($code != null) {
      $this->db->where('id_cliente', $code);
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
