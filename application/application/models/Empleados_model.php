<?php
class Empleados_model extends CI_Model
{

  //Funcion para obtener todos los empleados
  function get_empleados($code = null)
  {
    $this->db->select('empleado.*, cargo.id_cargo, cargo.tipo_cargo, usuarios.usuario');

    $this->db->from('empleado');
    $this->db->join('cargo', 'cargo.id_cargo=empleado.id_cargo');
    $this->db->join('usuarios', 'usuarios.id_usuario=empleado.id_usuario');


    $this->db->where('empleado.estado = 1');

    if ($code != null) {
      $this->db->where('empleado.id_empleado', $code);
    }

    $query = $this->db->get();
    return $query->result();
  }


  //Funcion para obtener todos las cargos activos de empleado
  function get_cargo($code = null)
  {
    $this->db->select('*');
    $this->db->from('cargo');

    $this->db->where('estado = 1');

    if ($code != null) {
      $this->db->where('id_cargo', $code);
    }

    $query = $this->db->get();
    return $query->result();
  }



  //Funcion para guardar los empleados a la tabla
  function save_empleado($data)
  {
    $result = $this->db->insert('empleado', $data);
    return $result;
  }

  function update_empleado($code, $data)
  {
    $this->db->where('id_empleado', $code);
    $this->db->update('empleado', $data);
    return true;
  }

  function eliminar_empleado($code, $data)
  {
    $this->db->where('id_empleado', $code);
    $this->db->update('empleado', $data);
    return true;
  }

  //Guarda el usuario del empleado
  function save_usuario($data)
  {
    $result = $this->db->insert('usuarios', $data);
    return $result;
  }
}
