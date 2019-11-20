<?php

class User extends CI_Controller {

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

  public function index()
  {
    $data['judul'] = 'List Transaction  - Beaute';
    $data['page'] = 'listtransaction';
    $data['list_tr'] = $this->Transaction_model->getTransactionByUserId($this->session->userdata('ses_user_id'));
    $data['list_detail_tr'] = $this->Transaction_model->getDetailTransactionByUserId($this->session->userdata('ses_user_id'));
    $this->load->view('templates/header', $data);
    $this->load->view('user/listtransaction', $data);
    $this->load->view('templates/footer');
  }
}
