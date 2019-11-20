<?php

class Contact extends CI_Controller {

    public function __construct()
    {
      parent::__construct();
      $this->load->helper('url');
    }
  
    public function index()
    {
      $data['judul'] = "Beaute - Shop";
      $data['page'] = "contact";
      $this->load->view('templates/header', $data);
      $this->load->view('contact/index');
      $this->load->view('templates/footer');
    }
}
