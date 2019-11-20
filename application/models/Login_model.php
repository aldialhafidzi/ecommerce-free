<?php

class Login_model extends CI_Model{

  function auth_login($username, $password)
  {
    $this->db->where('username', $username);
    $data_user = $this->db->get('users')->row();
    if(password_verify($password, $data_user->password)){
      return $this->db->query("SELECT * FROM users WHERE username = '$username' LIMIT 1");
    }
  }


}
