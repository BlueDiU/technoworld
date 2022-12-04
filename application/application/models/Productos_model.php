
<?php
class Productos_model extends CI_Model
{

  //Funcion para obtener todos los productos
  function get_productos($code = null)
  {
    $this->db->select('producto.*, categoria.id_categoria, categoria.nombre_categoria, sucursal.id_sucursal, sucursal.nombre_sucursal, marca.id_marca, marca.nombre_marca, proveedor.id_proveedor, proveedor.nombre_proveedor');

    $this->db->from('producto');
    $this->db->join('categoria', 'categoria.id_categoria=producto.id_categoria');
    $this->db->join('sucursal', 'sucursal.id_sucursal=producto.id_sucursal');
    $this->db->join('marca', 'marca.id_marca=producto.id_marca');
    $this->db->join('proveedor', 'proveedor.id_proveedor=producto.id_proveedor');

    $this->db->where('producto.estado = 1');

    if ($code != null) {
      $this->db->where('producto.id_producto', $code);
    }

    $query = $this->db->get();
    return $query->result();
  }

  //Funcion para obtener todas las sucursales activas
  function get_sucursal($code = null)
  {
    $this->db->select('*');
    $this->db->from('sucursal');

    $this->db->where('estado = 1');

    if ($code != null) {
      $this->db->where('id_sucursal', $code);
    }

    $query = $this->db->get();
    return $query->result();
  }

  //Funcion para obtener todas las marcas activas
  function get_marca($code = null)
  {
    $this->db->select('*');
    $this->db->from('marca');

    $this->db->where('estado = 1');

    if ($code != null) {
      $this->db->where('id_marca', $code);
    }

    $query = $this->db->get();
    return $query->result();
  }

  //Funcion para obtener todas las categorias activas
  function get_categoria($code = null)
  {
    $this->db->select('*');
    $this->db->from('categoria');

    $this->db->where('estado = 1');

    if ($code != null) {
      $this->db->where('id_categoria', $code);
    }

    $query = $this->db->get();
    return $query->result();
  }

  //Para obtener todos los proveedores activos
  function get_proveedor($code = null)
  {
    $this->db->select('*');
    $this->db->from('proveedor');

    $this->db->where('estado = 1');

    if ($code != null) {
      $this->db->where('id_proveedor', $code);
    }

    $query = $this->db->get();
    return $query->result();
  }

  //Funcion para guardar los productos a la tabla
  function save_producto($data)
  {
    $result = $this->db->insert('producto', $data);
    return $result;
  }

  function update_producto($code, $data)
  {
    $this->db->where('id_producto', $code);
    $this->db->update('producto', $data);
    return true;
  }

  function eliminar_producto($code, $data)
  {
    $this->db->where('id_producto', $code);
    $this->db->update('producto', $data);
    return true;
  }
}
