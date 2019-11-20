<?php

class Pendingpayment extends CI_Controller {

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
    $data['list_pending_transaction'] = $this->Transaction_model->getAllPendingTransaction();
    $this->load->view('templates/header_admin', $data);
    $this->load->view('admin/listrequest', $data);
    $this->load->view('templates/footer_admin');
    $this->load->view('modals/modal_acc_pending_payment');
  }

  public function detail_transaction()
  {
    echo json_encode($this->Transaction_model->getDetailPendingPayment($this->input->post('tp_id')));
  }

  public function saveTransaction()
  {

    function getRomawi($bln){
            switch ($bln){
                      case 1:
                          return "I";
                          break;
                      case 2:
                          return "II";
                          break;
                      case 3:
                          return "III";
                          break;
                      case 4:
                          return "IV";
                          break;
                      case 5:
                          return "V";
                          break;
                      case 6:
                          return "VI";
                          break;
                      case 7:
                          return "VII";
                          break;
                      case 8:
                          return "VIII";
                          break;
                      case 9:
                          return "IX";
                          break;
                      case 10:
                          return "X";
                          break;
                      case 11:
                          return "XI";
                          break;
                      case 12:
                          return "XII";
                          break;
                }
         }
    // Save Invoice
    $paymentFor = $this->Transaction_model->getTransactionPendingById($this->input->post('in_tp_id'));
    $lastInvoiceNo = $this->Transaction_model->getLastTransactionRow();
    $lastInvoiceNo += 1;
    $last_transaction = sprintf('%04d',$lastInvoiceNo);
    $bulan	= date('n');
    $romawi = getRomawi($bulan);
    $date = date('y');
    $ht = "HS";
    $invoice = $last_transaction.'/'.$ht.'/'.$romawi.'/'.$date;
    $transaction_id = $this->Transaction_model->savePayment($paymentFor, $invoice);

    // Save Detail Invoice
    $detail_transaction = $this->Transaction_model->getDetailPendingPayment($this->input->post('in_tp_id'));
    $this->Transaction_model->saveDetailPayment($detail_transaction, $transaction_id);

    // Delete Detail Pending Payment
    $this->Transaction_model->deleteDetailPendingPayment($this->input->post('in_tp_id'));

    // Delete Pending Payment
    $this->Transaction_model->deletePendingPayment($this->input->post('in_tp_id'));

    // Update Stok
    $this->Goods_model->updateStokProduct($detail_transaction);
    $this->session->set_flashdata('accept_transaction', "Transaction received ! ");

    $url = base_url().'pendingpayment';
    redirect($url);

  }


}
