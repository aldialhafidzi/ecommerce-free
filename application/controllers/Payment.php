<?php

class Payment extends CI_Controller {

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
    $data['judul'] = 'List Pending  - Beaute';
    $data['page'] = 'Payment';
    $data['list_pending'] = $this->Transaction_model->getPendingPaymentByUserId($this->session->userdata('ses_user_id'));
    $this->load->view('templates/header', $data);
    $this->load->view('payment/listpayment', $data);
    $this->load->view('templates/footer');
  }

  public function redirectToConfirmPayment($tp_id = '')
  {
    $this->session->set_userdata('ses_payment',TRUE);
    $this->session->set_userdata('ses_t_pending_id', $tp_id);
    $url = base_url().'cart/payment/'.$tp_id;
    redirect($url);
  }




}
