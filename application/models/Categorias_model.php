<?php
class Categorias_model extends CI_Model{

  //Funcion para obtener todos las categorias
  function get_categorias($code=null){
    $this->db->select('*');

    $this->db->from('categoria');

    $this->db->where('estado = 1');

    if($code != null){
    $this->db->where('id_categoria', $code);
    }
 
    $query = $this->db->get();
    return $query->result();
  }

  //Funcion para guardar las categorias a la tabla
   function save_categoria($data){
    $result=$this->db->insert('categoria',$data);
    return $result;
  }

   function update_categoria($code,$data){
    $this->db->where('id_categoria', $code);
    $this->db->update('categoria',$data);
    return true;
  }

  function eliminar_categoria($code,$data){
    $this->db->where('id_categoria', $code);
    $this->db->update('categoria',$data);
    return true;
  }

}