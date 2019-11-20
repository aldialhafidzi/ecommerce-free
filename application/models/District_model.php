<?php

class District_model extends CI_model{

  function getllAllDistrict()
  {
    return $this->db->get('districts')->result();
  }

  function getAllDistrictWithKey()
  {
    $this->db->where('regency_id', $this->input->post('id_regency'));
    return $this->db->get('districts')->result();
  }

  function findDistrict()
  {
    $this->db->select();
    $this->db->select('districts.name d_name');
    $this->db->select('districts.id d_id');
    $this->db->select('regencies.name r_name');
    $this->db->select('provinces.name p_name');
    $this->db->like('districts.name', $this->input->get('q'));
    $this->db->join('regencies', 'regencies.id = districts.regency_id', 'inner');
    $this->db->join('provinces', 'provinces.id = regencies.province_id', 'inner');
    $this->db->limit(10);
    return $this->db->get('districts')->result_array();
  }

}
