<?php

class Invoice extends CI_Controller {

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

    if($this->session->userdata('ses_invoice') != TRUE){
      $url=base_url().'shop';
      redirect($url);
    }

  }

  public function index()
  {
    $data['judul'] = 'Invoice - Beaute';
    $this->load->view('templates/header', $data);
    $this->load->view('invoice/index', $data);
    $this->load->view('templates/footer');
  }

  public function check($tr_id = '')
  {
    $this->session->unset_userdata('ses_invoice');
    $data['judul'] = 'Invoice - Beaute';
    $data['payment'] = $this->Transaction_model->getTransactionById($tr_id);
    $data['list_shop'] = $this->Transaction_model->getDetailTransactionById($tr_id);

    $this->load->view('templates/header', $data);
    $this->load->view('invoice/index', $data);
    $this->load->view('templates/footer');

  }


}
