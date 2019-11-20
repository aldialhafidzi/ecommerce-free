<?php

class About extends CI_Controller {

    public function __construct()
    {
      parent::__construct();
      $this->load->helper('url');
    }
  
    public function index()
    {
      $data['judul'] = "Beaute - Shop";
      $data['page'] = "about";
      $this->load->view('templates/header', $data);
      $this->load->view('about/index');
      $this->load->view('templates/footer');
    }
}
