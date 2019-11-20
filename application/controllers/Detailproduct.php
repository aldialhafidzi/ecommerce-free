<?php

class Detailproduct extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('file');
    $this->load->model('Users_model');
    $this->load->model('Carts_model');
    $this->load->model('Transaction_model');
    $this->load->model('Couriers_model');
    $this->load->model('Goods_model');
    $this->load->model('District_model');
    $this->load->library('pagination');
    $this->load->library('form_validation');
    if($this->session->userdata('masuk') != TRUE){
      $url=base_url().'login';
      redirect($url);
    }
  }

  public function index($id = '')
  {
    $data['judul'] = 'Detail Product Beaute';
    $data['page'] = "Detail Product";
    $data['detail'] = $this->Goods_model->getDetailGoodsById($id);
    $data['featured'] = $this->Goods_model->getAllGoodsWhereIsFeatured();
    $this->load->view('templates/header', $data);
    $this->load->view('detailproduct/index', $data);
    $this->load->view('templates/footer');
  }

}
