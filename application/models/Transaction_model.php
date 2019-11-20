<?php

class Transaction_model extends CI_model{

  function getAllSuccessTransaction()
  {
    $this->db->select();
    $this->db->select('users.name u_name');
    $this->db->select('banks.name b_name');
    $this->db->select('transactions.id t_id');
    $this->db->join('banks', 'banks.id = transactions.bank_id', 'inner');
    $this->db->join('users', 'users.id = transactions.user_id', 'inner');
    return $this->db->get('transactions')->result();
  }

  function savePaymentProof($tp_id, $uploadedFile)
  {
    $data = array(
      'source_proof' => $uploadedFile
    );
    $this->db->where('id', $tp_id);
    $this->db->update('transaction_pending', $data);
  }

  function getAllPendingTransaction()
  {
    $this->db->select();
    $this->db->select('users.name u_name');
    $this->db->select('banks.name b_name');
    $this->db->select('transaction_pending.id tp_id');
    $this->db->join('banks', 'banks.id = transaction_pending.bank_id', 'inner');
    $this->db->join('users', 'users.id = transaction_pending.user_id', 'inner');
    return $this->db->get('transaction_pending')->result();
  }

  function getPendingPaymentByUserId($user_id)
  {
    $this->db->select();
    $this->db->select('transaction_pending.id tp_id');
    $this->db->join('banks', 'banks.id = transaction_pending.bank_id', 'inner');
    $this->db->where('user_id', $user_id);
    return $this->db->get('transaction_pending')->result();
  }

  function getListTransactionByUserId($user_id)
  {
    $this->db->where('user_id', $user_id);
    return $this->db->get('transactions')->result();
  }

  function getDetailTransactionByUserId($user_id)
  {
    $this->db->join('transactions', 'transactions.id = detail_transaction.transaction_id', 'inner');
    $this->db->join('goods', 'goods.id = detail_transaction.good_id', 'inner');
    $this->db->where('transactions.user_id', $user_id);
    return $this->db->get('detail_transaction')->result();
  }

  function getTransactionByUserId($user_id)
  {
    $this->db->select();
    $this->db->select('couriers.name c_name');
    $this->db->select('c_expedition.name cex_name');
    $this->db->select('c_expedition.exp_day cex_day');

    $this->db->select('provinces.name n_prov');
    $this->db->select('districts.name n_dist');
    $this->db->select('regencies.name n_rege');

    $this->db->join('couriers', 'couriers.id = transactions.courier_id', 'inner');
    $this->db->join('c_expedition', 'c_expedition.id = transactions.courier_service', 'inner');
    $this->db->join('u_addresses', 'u_addresses.id = transactions.shipping_id', 'inner');

    $this->db->join('provinces', 'provinces.id = u_addresses.province_id', 'inner');
    $this->db->join('regencies', 'regencies.id = u_addresses.regency_id', 'inner');
    $this->db->join('districts', 'districts.id = u_addresses.district_id', 'inner');

    $this->db->where('transactions.user_id', $user_id);
    return $this->db->get('transactions')->result();
  }

  function getTransactionById($id)
  {
    $this->db->select();
    $this->db->select('couriers.name c_name');
    $this->db->select('c_expedition.name cex_name');
    $this->db->select('c_expedition.exp_day cex_day');

    $this->db->select('provinces.name n_prov');
    $this->db->select('districts.name n_dist');
    $this->db->select('regencies.name n_rege');

    $this->db->join('couriers', 'couriers.id = transactions.courier_id', 'inner');
    $this->db->join('c_expedition', 'c_expedition.id = transactions.courier_service', 'inner');
    $this->db->join('u_addresses', 'u_addresses.id = transactions.shipping_id', 'inner');

    $this->db->join('provinces', 'provinces.id = u_addresses.province_id', 'inner');
    $this->db->join('regencies', 'regencies.id = u_addresses.regency_id', 'inner');
    $this->db->join('districts', 'districts.id = u_addresses.district_id', 'inner');

    $this->db->where('transactions.id', $id);
    return $this->db->get('transactions')->result();
  }

  function getDetailTransactionById($id)
  {
    $this->db->join('goods', 'goods.id = detail_transaction.good_id', 'inner');
    $this->db->join('transactions', 'transactions.id = detail_transaction.transaction_id', 'inner');
    $this->db->join('u_addresses', 'u_addresses.id = transactions.shipping_id', 'inner');
    $this->db->where('transaction_id', $id);
    return $this->db->get('detail_transaction')->result();
  }

  function deleteDetailPendingPayment($tp_id)
  {

    $this->db->where('tp_id', $tp_id);
    $this->db->delete('detail_transaction_pending');
    return  $this->db->affected_rows();
  }

  function deletePendingPayment($tp_id)
  {
    $this->db->where('id', $tp_id);
    $this->db->delete('transaction_pending');
    return  $this->db->affected_rows();
  }

  function saveDetailPayment($detail_transaction, $transaction_id)
  {
    foreach ($detail_transaction as $dp) {
      $data = [
        "transaction_id" => $transaction_id,
        "good_id" => $dp->good_id,
        "qty" => $dp->qty
      ];
      $this->db->insert('detail_transaction', $data);
    }
  }

  function getDetailPendingPayment($tp_id)
  {
    $this->db->join('goods', 'goods.id = detail_transaction_pending.good_id', 'inner');
    $this->db->join('transaction_pending', 'transaction_pending.id = detail_transaction_pending.tp_id', 'inner');
    $this->db->join('u_addresses', 'u_addresses.id = transaction_pending.shipping_id', 'inner');
    $this->db->where('tp_id', $tp_id);
    return $this->db->get('detail_transaction_pending')->result();
  }

  function savePayment($paymentFor, $invoice)
  {
    $confirm_pay = date('Y-m-d H:i:s');
    foreach ($paymentFor as $pay) {
      $data = [
        "user_id" => $pay->user_id,
        "shipping_id" => $pay->shipping_id,
        "courier_id" => $pay->courier_id,
        "courier_service" => $pay->courier_service,
        "bank_id" => $pay->bank_id,
        "account_bank" => $pay->account_bank,
        "name_account_bank" => $pay->name_account_bank,
        "src_proof" =>  $pay->source_proof,
        "payment_code" => $pay->payment_code,
        "invoice" => $invoice,
        "payment_initial" => $pay->payment_initial,
        "payment_limit" => $pay->payment_limit,
        "confirm_payment_date" => $confirm_pay,
        "discount" => '0',
        "grandtotal" => $pay->grandtotal,
      ];
      $this->db->insert('transactions', $data);
      $insert_id = $this->db->insert_id();
      return  $insert_id;
    }
  }

  function getLastTransactionRow()
  {
    $query = $this->db->query("SELECT * FROM transactions ORDER BY id DESC LIMIT 1");
    return $query->num_rows();
  }


  function getDetailTransaction()
  {
    $this->db->join('goods', 'goods.id = detail_transaction.good_id', 'inner');
    $this->db->join('transactions', 'transactions.id = detail_transaction.transaction_id', 'inner');
    $this->db->where('transaction_id', $this->session->userdata('ses_checkout'));
    return $this->db->get('detail_transaction')->result();
  }


  function getTransactionPendingById($tp_id)
  {
    $this->db->select();
    $this->db->select('transaction_pending.id tp_id');
    $this->db->join('banks', 'banks.id = transaction_pending.bank_id', 'inner');
    $this->db->where('transaction_pending.id', $tp_id);
    return $this->db->get('transaction_pending')->result();
  }

  function savePendingCheckout($phone_number)
  {
    function generateRandomString($length = 2) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
    }

    $payment_initial = date('Y-m-d H:i:s');
    $start = time();
    $payment_limit = date('Y-m-d H:i:s', strtotime('+3 day', $start));
    $payment_code = generateRandomString() . $phone_number;

    $data = [
      "user_id" => $this->session->userdata('ses_user_id'),
      "bank_id" => $this->input->post('bank_transfer', true),
      "account_bank" => $this->input->post('account_number', true),
      "name_account_bank" => $this->input->post('account_name', true),
      "shipping_id" => $this->input->post('shipping_id', true),
      "courier_id" => $this->input->post('courier'),
      "courier_service" => $this->input->post('courier_exp'),
      "payment_code" => $payment_code,
      "payment_initial" => $payment_initial,
      "payment_limit" => $payment_limit,
      "discount" => '0',
      "grandtotal" => $this->input->post('in_grandtotal'),
    ];
    $this->db->insert('transaction_pending', $data);
    $insert_id = $this->db->insert_id();
    return  $insert_id;
  }

  function saveDetailPendingTransaction($tp_id)
  {
    foreach ($this->session->userdata('carts') as $key => $value) {
      $data = [
        "tp_id" => $tp_id,
        "good_id" => $this->session->userdata('carts')[$key]['good_id'],
        "qty" => $this->session->userdata('carts')[$key]['qty'],
      ];

      $this->db->insert('detail_transaction_pending', $data);

    }

  }



}
