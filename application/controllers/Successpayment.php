<?php

class Successpayment extends CI_Controller{

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
    elseif($this->session->userdata('akses') != '1'){
      echo "Anda tidak berhak mengakses halaman ini";
      redirect('shop');
    }
  }

  public function index()
  {
    $data['judul'] = 'Admin  - Beaute';
    $data['list_success_transaction'] = $this->Transaction_model->getAllSuccessTransaction();
    $this->load->view('templates/header_admin', $data);
    $this->load->view('admin/listtransaction', $data);
    $this->load->view('templates/footer_admin');
    $this->load->view('modals/modal_detail_transaction');
  }

  public function detail_transaction()
  {
    echo json_encode($this->Transaction_model->getDetailTransactionById($this->input->post('tr_id')));
  }

}
