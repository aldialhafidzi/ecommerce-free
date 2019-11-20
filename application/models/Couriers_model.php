<?php

class Couriers_model extends CI_model{

  function getAllCourier()
  {
    return $this->db->get('couriers')->result();
  }

  function getAllExpedition()
  {
    return $this->db->get('c_expedition')->result();
  }

  function getExpeditionById()
  {
    $this->db->where('courier_id', $this->input->post('courier_id'));
    return $this->db->get('c_expedition')->result();
  }

  function getPriceExpeditionById()
  {
    $this->db->select('price');
    $this->db->where('id', $this->input->post('exp_id'));
    return $this->db->get('c_expedition')->result();
  }


}
