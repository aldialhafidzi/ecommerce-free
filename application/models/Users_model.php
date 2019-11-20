<?php

class Users_model extends CI_model{

  function changePasswordAdminById()
  {
    $password = password_hash($this->input->post('new_password'), PASSWORD_DEFAULT);
    $data = [
      "password" => $password
    ];
    $this->db->where('id', $this->input->post('user_id_cp'));
    $this->db->update('users', $data);
    return  $this->db->affected_rows();
  }


  function chekEmailNya($email, $id)
  {
    $this->db->where('email', $email);
    $this->db->where('id', $id);
    return $this->db->get('users')->result();
  }

  function changePasswordById()
  {
    $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
    $data = [
      "password" => $password
    ];
    $this->db->where('id', $this->session->userdata('ses_user_id'));
    $this->db->update('users', $data);
    return  $this->db->affected_rows();
  }

  function deleteUserById()
  {
    $this->db->where('id', $this->input->post('hapus_data_id'));
    $this->db->delete('users');
    return  $this->db->affected_rows();
  }

  function deleteUaddressesByUserId()
  {
    $this->db->where('user_id', $this->input->post('hapus_data_id'));
    $this->db->delete('u_addresses');
    return  $this->db->affected_rows();
  }

  function deleteAdminById()
  {
    $this->db->where('id', $this->input->post('hapus_data_id'));
    $this->db->delete('users');
    return  $this->db->affected_rows();
  }

  function updateAdminById()
  {
    $data = [
      "access_id" => $this->input->post('u_access', true),
      "username" => $this->input->post('u_uname', true),
      "name" => $this->input->post('u_name', true),
      "phone_number" => $this->input->post('u_phone', true),
      "email" => $this->input->post('u_email', true)
    ];

    $this->db->where('id', $this->input->post('u_id'));
    $this->db->update('users', $data);
    return  $this->db->affected_rows();
  }

  function getAllAdmin()
  {
    $this->db->where('access_id !=', '2');
    return $this->db->get('users')->result();
  }

  function getDetailAdminById()
  {
    $this->db->where('id', $this->input->post('user_id'));
    return $this->db->get('users')->result();
  }

  function getAllAccess(){
    return $this->db->get('access')->result();
  }

  function saveAccountAdmin()
  {
    $password = password_hash($this->input->post('u_password'), PASSWORD_DEFAULT);
    $data = [
      'access_id' => $this->input->post('u_access', true),
      'username' => $this->input->post('u_uname', true),
      'password' => $password,
      'name' => $this->input->post('u_name', true),
      'phone_number' => $this->input->post('u_phone', true),
      'email' => $this->input->post('u_email', true)
    ];

    $this->db->insert('users', $data);

  }

  function getDetailUserById()
  {
    $this->db->select();
    $this->db->select('users.name u_name');
    $this->db->select('users.phone_number u_phone');
    $this->db->select('provinces.name p_name');
    $this->db->select('regencies.name r_name');
    $this->db->select('districts.name d_name');
    $this->db->where('u_addresses.user_id', $this->input->post('user_id'));
    $this->db->join('users' ,'users.id = u_addresses.user_id', 'inner');
    $this->db->join('provinces', 'provinces.id = u_addresses.province_id', 'inner');
    $this->db->join('regencies', 'regencies.id = u_addresses.regency_id', 'inner');
    $this->db->join('districts', 'districts.id = u_addresses.district_id', 'inner');
    return $this->db->get('u_addresses')->result();
  }

  function getAllUser()
  {
    $this->db->select();
    $this->db->select('users.name u_name');
    $this->db->select('users.phone_number u_phone');
    $this->db->select('users.id u_id');
    $this->db->join('u_addresses', 'u_addresses.user_id = users.id', 'inner');
    $this->db->group_by('users.id');
    return $this->db->get('users')->result();
  }

  function saveNewAddress()
  {
    $data = [
      "user_id" => $this->session->userdata('ses_user_id'),
      "receipt_name" => $this->input->post('n_user', true),
      "province_id" => $this->input->post('prov_id', true),
      "regency_id" => $this->input->post('reg_id', true),
      "district_id" => $this->input->post('dist_id', true),
      "postcode" => $this->input->post('postcode', true),
      "phone" => $this->input->post('phone', true),
      "detail_address" => $this->input->post('detail_address', true)
    ];

    $this->db->insert('u_addresses', $data);
    $insert_id = $this->db->insert_id();
    return  $insert_id;
  }

  function createNewAccount()
  {
    $name = $this->input->post('firstname') .' '. $this->input->post('lastname');
    $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
    $data = [
      "access_id" => '2',
      "username" => $this->input->post('username', true),
      "password" => $password,
      "name" => $name,
      "phone_number" => $this->input->post('phone', true),
      "email" => $this->input->post('email', true)
    ];

    $this->db->insert('users', $data);

    $insert_id = $this->db->insert_id();
    return  $insert_id;
  }

  function saveNewAccountAddress($user_id)
  {
    $data = [
      "user_id" => $user_id,
      "province_id" => $this->input->post('province', true),
      "regency_id" => $this->input->post('regency', true),
      "district_id" => $this->input->post('district', true),
      "phone" => $this->input->post('phone', true),
      "detail_address" => $this->input->post('detail_address', true),
      "postcode" => $this->input->post('postcode', true)
    ];

    $this->db->insert('u_addresses', $data);
  }



  function check_cart($user_id)
  {
    $this->db->from('carts');
    $this->db->where("user_id", $user_id);
    $this->db->join('goods', 'goods.id = carts.good_id', 'inner');
    $query = $this->db->get();
    return $query->result_array();
  }

  function getListAddress($user_id)
  {
    $this->db->select();
    $this->db->select('u_addresses.id id_u_address');
    $this->db->select('users.name n_user');
    $this->db->select('provinces.name n_prov');
    $this->db->select('districts.name n_dist');
    $this->db->select('regencies.name n_rege');
    $this->db->where('u_addresses.user_id', $user_id);
    $this->db->join('users', 'users.id = u_addresses.user_id', 'inner');
    $this->db->join('provinces', 'provinces.id = u_addresses.province_id', 'inner');
    $this->db->join('regencies', 'regencies.id = u_addresses.regency_id', 'inner');
    $this->db->join('districts', 'districts.id = u_addresses.district_id', 'inner');
    return $this->db->get('u_addresses')->result_array();
  }

  function getAddrById($id_u_addr)
  {
    $this->db->select();
    $this->db->select('u_addresses.id id_u_address');
    $this->db->select('users.name n_user');
    $this->db->select('provinces.name n_prov');
    $this->db->select('districts.name n_dist');
    $this->db->select('regencies.name n_rege');
    $this->db->where('u_addresses.id', $id_u_addr);
    $this->db->join('users', 'users.id = u_addresses.user_id', 'inner');
    $this->db->join('provinces', 'provinces.id = u_addresses.province_id', 'inner');
    $this->db->join('regencies', 'regencies.id = u_addresses.regency_id', 'inner');
    $this->db->join('districts', 'districts.id = u_addresses.district_id', 'inner');
    return $this->db->get('u_addresses')->result();
  }

  function getPhoneNumber()
  {
    $this->db->select('phone_number');
    $this->db->where('id', $this->session->userdata('ses_user_id'));
    return $this->db->get('users')->row()->phone_number;
  }

  function getAddressWithKey()
  {
    $this->db->select();
    $this->db->select('u_addresses.id id_u_address');
    $this->db->select('users.name n_user');
    $this->db->select('provinces.name n_prov');
    $this->db->select('districts.name n_dist');
    $this->db->select('regencies.name n_rege');
    $this->db->where('u_addresses.user_id', $this->session->userdata('ses_user_id'));
    $this->db->join('users', 'users.id = u_addresses.user_id', 'inner');
    $this->db->join('provinces', 'provinces.id = u_addresses.province_id', 'inner');
    $this->db->join('regencies', 'regencies.id = u_addresses.regency_id', 'inner');
    $this->db->join('districts', 'districts.id = u_addresses.district_id', 'inner');
    return $this->db->get('u_addresses')->result();
  }

}
