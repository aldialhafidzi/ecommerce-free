<?php

class Regency_model extends CI_model{


  function getAllRegency()
  {
    return $this->db->get('regencies')->result();
  }

  function getAllRegencyWithKey()
  {
    $this->db->where('province_id', $this->input->post('id_prov'));
    return $this->db->get('regencies')->result();
  }



}
