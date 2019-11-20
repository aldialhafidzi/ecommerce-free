<?php

class Province_model extends CI_model{

  function getAllProvince(){
    return $this->db->get('provinces')->result();
  }

}
