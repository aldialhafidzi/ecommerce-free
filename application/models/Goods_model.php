<?php

class Goods_model extends CI_model
{

  function getDetailGoodsById($id)
  {
    $this->db->where('id', $id);
    return $this->db->get('goods')->result();
  }

  function deleteProductById()
  {
    $this->db->where('id', $this->input->post('hapus_data_id'));
    $this->db->delete('goods');
    return  $this->db->affected_rows();
  }

  function addNewProduct($image_1, $image_2, $image_3)
  {
    if ($this->input->post('p_featured')) {
      $featured = 'Y';
    } else {
      $featured = 'N';
    }

    $data = [
      'categori_id' => $this->input->post('p_categori', true),
      'type_id' => $this->input->post('p_type', true),
      'code' => $this->input->post('p_code', true),
      'name' => $this->input->post('p_name', true),
      'color' => $this->input->post('p_color', true),
      'price' => $this->input->post('p_price', true),
      'stock' => $this->input->post('p_stock', true),
      'detail' => $this->input->post('p_description', true),
      'featured' => $featured
    ];

    $this->db->insert('goods', $data);
    $insert_id = $this->db->insert_id();

    if ($image_1 != "") {
      $data = array(
        'source' => $image_1
      );
      $this->db->where('id', $insert_id);
      $this->db->update('goods', $data);
    }

    if ($image_2 != "") {
      $data = array(
        'source_1' => $image_2
      );
      $this->db->where('id', $insert_id);
      $this->db->update('goods', $data);
    }

    if ($image_3 != "") {
      $data = array(
        'source_2' => $image_3
      );
      $this->db->where('id', $insert_id);
      $this->db->update('goods', $data);
    }

    return $this->db->affected_rows();
  }

  function updateProductById($image_1, $image_2, $image_3)
  {
    if ($image_1 != "") {
      $data = array(
        'source' => $image_1
      );
      $this->db->where('id', $this->input->post('p_id'));
      $this->db->update('goods', $data);
    }

    if ($image_2 != "") {
      $data = array(
        'source_1' => $image_2
      );
      $this->db->where('id', $this->input->post('p_id'));
      $this->db->update('goods', $data);
    }

    if ($image_3 != "") {
      $data = array(
        'source_2' => $image_3
      );
      $this->db->where('id', $this->input->post('p_id'));
      $this->db->update('goods', $data);
    }

    $featured = '';

    if ($this->input->post('p_featured')) {
      $featured = 'Y';
    } else {
      $featured = 'N';
    }


    $data = array(
      'categori_id' => $this->input->post('p_categori', true),
      'type_id' => $this->input->post('p_type', true),
      'code' => $this->input->post('p_code', true),
      'name' => $this->input->post('p_name', true),
      'color' => $this->input->post('p_color', true),
      'price' => $this->input->post('p_price', true),
      'stock' => $this->input->post('p_stock', true),
      'detail' => $this->input->post('p_description', true),
      'featured' => $featured,
      'discount' => $this->input->post('p_discount', true)
    );

    $this->db->where('id', $this->input->post('p_id'));
    $this->db->update('goods', $data);
  }

  function getAllTypes()
  {
    return $this->db->get('type')->result();
  }

  function getAllCategories()
  {
    return $this->db->get('categories')->result();
  }

  function getProductById()
  {
    $this->db->select();
    $this->db->select('goods.id p_id');
    $this->db->select('goods.name p_name');
    $this->db->select('type.name p_tname');
    $this->db->select('categories.name p_cname');
    $this->db->join('categories', 'categories.id = goods.categori_id', 'inner');
    $this->db->join('type', 'type.id = goods.type_id', 'inner');

    $this->db->where('goods.id', $this->input->post('good_id'));
    return $this->db->get('goods')->result();
  }

  function updateStokProduct($detail_transaction)
  {
    foreach ($detail_transaction as $dp) {
      $stock = (int) $dp->stock - (int) $dp->qty;
      $data = array(
        'stock' => $stock
      );
      $this->db->where('id', $dp->good_id);
      $this->db->update('goods', $data);
    }
  }

  function updateStok()
  {

    foreach ($this->session->userdata('carts') as $key => $value) {
      $stock = (int) $this->session->userdata('carts')[$key]['stock'] - (int) $this->session->userdata('carts')[$key]['qty'];
      $data = array(
        'stock' => $stock
      );
      $this->db->where('id', $this->session->userdata('carts')[$key]['good_id']);
      $this->db->update('goods', $data);
    }
  }

  public function getAllGoods()
  {

    $this->db->from('goods');
    $this->db->order_by("code", "ASC");
    return $this->db->get()->result();
  }

  function jumlah_data()
  {
    return $this->db->get('goods')->num_rows();
  }

  function jumlahDataWomen()
  {
    $this->db->from('goods');
    $this->db->where('categori_id', 1);
    $query = $this->db->get();
    return $query->num_rows();
  }

  function jumlahDataDiscount(){
    $this->db->from('goods');
    $this->db->where('discount != ', 0);
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function getAllDiscount($number, $offset)
  {
    $this->db->from('goods');
    $this->db->where("discount != ", 0);
    $this->db->limit($number, $offset);
    $query = $this->db->get();
    return $query->result();
  }

  function jumlahDataKIDS()
  {
    $this->db->from('goods');
    $this->db->where('categori_id', 3);
    $query = $this->db->get();
    return $query->num_rows();
  }

  function jumlahDataADULT()
  {
    $this->db->from('goods');
    $this->db->where('categori_id = 1 OR categori_id = 2');
    $query = $this->db->get();
    return $query->num_rows();
  }

  function jumlahDataMen()
  {
    $this->db->from('goods');
    $this->db->where('categori_id', 2);
    $query = $this->db->get();
    return $query->num_rows();
  }

  function jumlahDataHarga($harga)
  {
    $this->db->from('goods');
    $compare = explode("-", $harga);

    if (count($compare) > 1) {
      $this->db->where("price >= ", $compare[0]);
      $this->db->where("price <= ", $compare[1]);
    } else {
      $this->db->where("price >= ", $compare[0]);
    }

    $query = $this->db->get();
    return $query->num_rows();
  }

  public function getAllGoodsWithLimit($number, $offset)
  {
    return $this->db->get('goods', $number, $offset)->result();
  }

  public function getAllGoodsASC($number, $offset)
  {
    $this->db->from('goods');
    $this->db->order_by("price", "ASC");
    $this->db->limit($number, $offset);
    $query = $this->db->get();
    return $query->result();
  }

  public function getAllGoodsDSC($number, $offset)
  {
    $this->db->from('goods');
    $this->db->order_by("price", "DESC");
    $this->db->limit($number, $offset);
    $query = $this->db->get();
    return $query->result();
  }

  public function getAllGoodsWhereMakeOver($number, $offset)
  {
    $this->db->from('goods');
    $this->db->where("categori_id", 2);
    $this->db->limit($number, $offset);
    $query = $this->db->get();
    return $query->result();
  }

  public function getAllGoodsWhereEmina($number, $offset)
  {
    $this->db->from('goods');
    $this->db->where("categori_id", 5);
    $this->db->limit($number, $offset);
    $query = $this->db->get();
    return $query->result();
  }

  public function getAllGoodsWhereWardah($number, $offset)
  {
    $this->db->from('goods');
    $this->db->where('categori_id = 1');
    $this->db->limit($number, $offset);
    $query = $this->db->get();
    return $query->result();
  }

  public function getAllGoodsWherePixy($number, $offset)
  {
    $this->db->from('goods');
    $this->db->where("categori_id", 3);
    $this->db->limit($number, $offset);
    $query = $this->db->get();
    return $query->result();
  }

  public function getAllGoodsWhereHARGA($harga, $number, $offset)
  {
    $this->db->from('goods');
    $compare = explode("-", $harga);

    if (count($compare) > 1) {
      $this->db->where("price >= ", $compare[0]);
      $this->db->where("price <= ", $compare[1]);
    } else {
      $this->db->where("price >= ", $compare[0]);
    }

    $this->db->limit($number, $offset);
    $query = $this->db->get();
    return $query->result();
  }

  public function getAllGoodsWhereIsFeatured()
  {
    return $this->db->get_where('goods', array('featured' => 'Y'))->result_array();
  }

  public function findGoods($number, $offset)
  {
    $keyword = $this->input->post('search-product', true);
    $this->db->like('name', $keyword);
    $this->db->or_like('price', $keyword);
    $this->db->or_like('detail', $keyword);
    $this->db->or_like('color', $keyword);
    return $this->db->get('goods')->result();
  }
  function jumlahfindGoods()
  {
    $keyword = $this->input->post('search-product', true);
    $this->db->like('name', $keyword);
    $this->db->or_like('price', $keyword);
    $this->db->or_like('detail', $keyword);
    $this->db->or_like('color', $keyword);
    return $this->db->get('goods')->num_rows();
  }

  public function getAllGoodsWithFilter($harga, $colors, $number, $offset)
  {
    $value = explode("-", $harga);
    $value1 = $value[0];
    $value2 = $value[1];
    $this->db->from('goods');
    $where = '';
    foreach ($colors as $color) {
      $where .= "color LIKE '%$color%' OR ";
    }
    $where .= "price > $value1 AND price <= $value2 ";
    $this->db->where($where);
    $this->db->limit($number, $offset);
    $query = $this->db->get();
    return $query->result();
  }

  function jumlahDataFilter($harga, $colors)
  {
    $value = explode("-", $harga);
    $value1 = $value[0];
    $value2 = $value[1];
    $this->db->from('goods');
    $where = '';
    foreach ($colors as $color) {
      $where .= "color LIKE '%$color%' OR ";
    }
    $where .= "price > $value1 AND price <= $value2 ";
    $this->db->where($where);
    $query = $this->db->get();
    return $query->num_rows();
  }
}
