
<?php
class Proveedores_model extends CI_Model{

  //Funcion para obtener todos los productos
  function get_proveedores($code=null){
    $this->db->select('*');

    $this->db->from('proveedor');

    $this->db->where('estado = 1');

    if($code != null){
    $this->db->where('id_proveedor', $code);
    }
 
    $query = $this->db->get();
    return $query->result();
  }

  
  //Funcion para guardar los productos a la tabla
   function save_proveedor($data){
    $result=$this->db->insert('proveedor',$data);
    return $result;
  }

   function update_proveedor($code,$data){
    $this->db->where('id_proveedor', $code);
    $this->db->update('proveedor',$data);
    return true;
  }

  function eliminar_proveedor($code,$data){
    $this->db->where('id_proveedor', $code);
    $this->db->update('proveedor',$data);
    return true;
  }

}