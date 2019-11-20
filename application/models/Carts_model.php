<?php

class Carts_model extends CI_model
{

  function lastTransaction()
  {
    return $this->db->get('transactions')->num_rows();
  }

  function simpanDetailCheckOut($last_transaction)
  {
    $i = 0;
    foreach ($this->input->post('product_id') as $pr) {
      $data = [
        "transaction_id" => $last_transaction,
        "good_id" => $this->input->post('product_id')[$i],
        "qty" => $this->input->post('qty_product')[$i],
      ];
      $this->db->insert('detail_transaction', $data);
      $i++;
    }
  }

  function getAllBank()
  {
    return $this->db->get('banks')->result();
  }

  function hapusCart()
  {
    $this->db->where('user_id', $this->session->userdata('ses_user_id'));
    $this->db->delete('carts');
    return  $this->db->affected_rows();
  }

  // function simpanCheckOut($last_transaction)
  // {
  //   $payment_initial = date("Y-m-d");
  //   $payment_limit = date('Y-m-d', strtotime('+3 days', strtotime($payment_initial)));
  //   $bulan = date('m');
  //   $tahun = date('Y');
  //   $tahun = substr( $tahun, -2);
  //   $last_transaction = $last_transaction + 1;
  //   $last_transaction = sprintf('%04d',$last_transaction);
  //   $invoice = "$last_transaction/HATSTORE/$bulan/$tahun";
  //   $data = [
  //     "invoice" => $invoice,
  //     "user_id" => $this->session->userdata('ses_user_id'),
  //     "payment_initial" => $payment_initial,
  //     "payment_limit" => $payment_limit,
  //     "discount" => '0',
  //     "grandtotal" => $this->input->post('in_grandtotal'),
  //     "status" => 'BELUM BAYAR',
  //   ];
  //   $this->db->insert('transactions', $data);
  //   $insert_id = $this->db->insert_id();
  //   return  $insert_id;
  // }



  function getAllProvince()
  {
    return $this->db->get('provinces')->result();
  }

  function getAllRegencyWithKey()
  {
    $this->db->where('province_id', $this->input->post('id_prov'));
    return $this->db->get('regencies')->result();
  }

  function getAllDistrictWithKey()
  {
    var_dump($this->input->post('id_regency'));
    die;
    $this->db->where('regency_id', $this->input->post('id_regency'));
    return $this->db->get('districts')->result();
  }

  function getPriceShipping()
  {
    $this->db->select('shipping');
    $this->db->where('id', $this->input->post('country'));
    return $this->db->get('provinces')->result();
  }

  function checkAllCartWithUserId()
  {
    $this->db->from('carts');
    $this->db->join('goods', 'goods.id = carts.good_id', 'inner');
    $this->db->where('user_id', $this->session->userdata('ses_user_id'));
    return $this->db->get()->result();
  }
  function checkGoodId()
  {
    $this->db->from('carts');
    $this->db->where('good_id', $this->input->post('good_id'));
    $this->db->where('user_id', $this->input->post('user_id'));
    return $this->db->get()->num_rows();
  }

  function checkGoodQty()
  {
    $this->db->select('qty');
    $this->db->from('carts');
    $this->db->where('good_id', $this->input->post('good_id'));
    $this->db->where('user_id', $this->input->post('user_id'));
    return $this->db->get()->result();
  }

  function saveCart()
  {
    $qty = 1;
    if ($this->input->post('qty')) {
      $qty = $this->input->post('qty');
    }
    $date = date("Y-m-d");
    $data = [
      "user_id" => $this->input->post('user_id', true),
      "good_id" => $this->input->post('good_id', true),
      "qty" => $qty,
      "date" => $date,
    ];

    $this->db->insert('carts', $data);
    return  $this->db->affected_rows();
  }

  function updateCartGue($data)
  {
    $user_id = $this->session->userdata('ses_user_id');
    $date = date("Y-m-d");
    foreach ($data['product_id'] as $key => $good_id) {
      $qty = $data['qty_product'][$key];
      $data_gue = [
        "user_id" => $user_id,
        "good_id" => $good_id,
        "qty" => $qty,
        "date" => $date,
      ];
      $this->db->where('user_id', $this->session->userdata('ses_user_id'));
      $this->db->where('good_id', $good_id);
      $this->db->update('carts', $data_gue);
    }
    return  $this->db->affected_rows();
  }

  function removeCartGue($id)
  {
    $this->db->where('user_id', $this->session->userdata('ses_user_id'));
    $this->db->where('good_id', $id);
    $this->db->delete('carts');
    return  $this->db->affected_rows();
  }

  function updateCart($qty)
  {
    $date = date("Y-m-d");
    if ($this->input->post('qty')) {
      $qty = $qty + (int) $this->input->post('qty');
    } else {
      $qty = $qty + 1;
    }
    $data = [
      "user_id" => $this->input->post('user_id', true),
      "good_id" => $this->input->post('good_id', true),
      "qty" => $qty,
      "date" => $date,
    ];

    $this->db->where('user_id', $this->input->post('user_id', true));
    $this->db->where('good_id', $this->input->post('good_id', true));
    $this->db->update('carts', $data);
    return  $this->db->affected_rows();
  }
}
