<?php

class Home extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('Goods_model');
  }

  public function index()
  {
    $data['judul'] = "Beaute - Home";
    $data['page'] = "home";
    $data['featured'] = $this->Goods_model->getAllGoodsWhereIsFeatured();

    $this->load->view('templates/header', $data);
    $this->load->view('home/index', $data);
    $this->load->view('templates/footer');
  }

}
