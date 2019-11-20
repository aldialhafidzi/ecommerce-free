<?php

class Cart extends CI_Controller
{

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
    if ($this->session->userdata('masuk') != TRUE) {
      $url = base_url() . 'login';
      redirect($url);
    }
  }

  public function index()
  {
    $this->form_validation->set_error_delimiters('<small class="form-text text-danger">', '</small>');
    $this->form_validation->set_rules('regency', 'Country', 'required');
    $this->form_validation->set_rules('district', 'District', 'required');
    $this->form_validation->set_rules('postcode', 'Post Code', 'required');
    $this->form_validation->set_rules('address_detail', 'Detail Address', 'required');

    if ($this->form_validation->run() == FALSE) {
      $data['judul'] = 'Beaute Cart';
      $data['page'] = "cart";
      $data['product'] = $this->Carts_model->checkAllCartWithUserId();
      $data['provinces'] = $this->Carts_model->getAllProvince();
      $data['address'] = $this->Users_model->getAddressWithKey();
      $this->load->view('templates/header', $data);
      $this->load->view('cart/index', $data);
      $this->load->view('templates/footer');
    } else {
      $payment_initial = date("Y-m-d");
      $payment_limit = date('Y-m-d', strtotime('+3 days', strtotime($payment_initial)));
      $this->session->set_userdata('ses_payment_limit', $payment_limit);
      $last_transaction = $this->Carts_model->lastTransaction();
      $transaction_id = $this->Carts_model->simpanCheckOut($last_transaction);
      $this->Carts_model->simpanDetailCheckOut($transaction_id);
      $this->Carts_model->hapusCart($transaction_id);
      $data['carts'] = $this->Users_model->check_cart($this->input->post('user_id'));
      $this->session->set_userdata('carts', $data['carts']);

      $this->session->set_userdata('ses_checkout', $transaction_id);
      $this->session->set_flashdata('checkout', 'success checkout');
      $url = base_url() . 'cart/checkout';
      redirect($url);
    }
  }

  public function checkout()
  {
    $data['page'] = "checkout";
    if ($this->session->userdata('checkout') == TRUE) {
      $this->form_validation->set_error_delimiters('<small class="form-text text-danger">', '</small>');
      $this->form_validation->set_rules('courier', 'Courier', 'required');
      $this->form_validation->set_rules('courier_exp', 'Courier Expedition', 'required');
      $this->form_validation->set_rules('account_number', 'Account Number', 'required');
      $this->form_validation->set_rules('account_name', 'Account Name', 'required');

      if ($this->form_validation->run() == FALSE) {
        $data['judul'] = 'Checkout Beaute';
        $data['product'] = $this->Carts_model->checkAllCartWithUserId();
        $data['courier'] = $this->Couriers_model->getAllCourier();
        $data['expedition'] = $this->Couriers_model->getAllExpedition();
        $data['banks'] = $this->Carts_model->getAllBank();
        $data['user'] = '';
        if ($this->session->userdata('id_new_address')) {
          $data['user'] = $this->Users_model->getAddrById($this->session->userdata('id_new_address'));
        } else {
          $data['user'] = $this->Users_model->getAddressWithKey();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('checkout/index', $data);
        $this->load->view('modals/modal_address');
        $this->load->view('modals/modal_select_address');
        $this->load->view('modals/modal_payment');
        $this->load->view('templates/footer');
      } else {

        $phone_number = $this->Users_model->getPhoneNumber();
        $tp_id = $this->Transaction_model->savePendingCheckout($phone_number);
        $this->Transaction_model->saveDetailPendingTransaction($tp_id);
        // $this->Goods_model->updateStok();
        $this->Carts_model->hapusCart();
        $data['carts'] = $this->Users_model->check_cart($this->session->userdata('ses_user_id'));
        $this->session->set_userdata('carts', $data['carts']);
        $this->session->set_userdata('ses_t_pending_id', $tp_id);
        $this->session->set_userdata('ses_payment', TRUE);
        $this->session->set_flashdata('checkout', 'Checkout Status ...');

        $data['list_pending_payment'] = $this->Transaction_model->getPendingPaymentByUserId($this->session->userdata('ses_user_id'));
        $count_lps = count($data['list_pending_payment']);
        $this->session->set_userdata('ses_count_pp', $count_lps);

        $data['list_transactions'] = $this->Transaction_model->getListTransactionByUserId($this->session->userdata('ses_user_id'));
        $count_lt = count($data['list_transactions']);
        $this->session->set_userdata('ses_count_lt', $count_lt);

        $url = base_url() . 'cart/payment/' . $this->session->userdata('ses_t_pending_id');
        redirect($url);
      }
    } else {
      $url = base_url() . 'shop';
      redirect($url);
    }
  }

  public function payment($tp_id = '')
  {
    if ($this->session->userdata('ses_payment') != TRUE) {
      $url = base_url() . 'shop';
      redirect($url);
    } elseif ($this->session->userdata('ses_t_pending_id') == NULL) {

      $url = base_url() . 'shop';
      redirect($url);
    } else {
      $data['judul'] = 'Payment Beaute';
      $data['page'] = 'payment';
      $data['t_pending'] = $this->Transaction_model->getTransactionPendingById($tp_id);
      $this->load->view('templates/header', $data);
      $this->load->view('payment/index', $data);
      $this->load->view('templates/footer');
      $this->session->unset_userdata('ses_t_pending_id');
    }
  }





  public function confirmpay($tp_id)
  {
    if ($this->session->userdata('ses_payment') != TRUE) {
      $url = base_url() . 'shop';
      redirect($url);
    } else {
      $data = array();
      $data['page'] = 'payment';
      $this->form_validation->set_error_delimiters('<small class="form-text text-danger">', '</small>');
      $this->form_validation->set_rules('input_file_proof', '', 'callback_file_check');
      if ($this->form_validation->run() == TRUE) {
        $new_name = time() . $tp_id;
        $config['file_name'] = $new_name;
        $config['upload_path'] = 'uploads/bukti-transaksi-user/';
        $config['allowed_types'] = 'gif|jpg|png|pdf';
        $config['max_size'] = '2048';
        $this->load->library('upload', $config);



        if ($this->upload->do_upload('input_file_proof')) {
          $uploadData = $this->upload->data();
          $uploadedFile = $uploadData['file_name'];

          $this->Transaction_model->savePaymentProof($tp_id, $uploadedFile);

          // $paymentFor = $this->Transaction_model->getTransactionPendingById($tp_id);
          // $lastInvoiceNo = $this->Transaction_model->getLastTransactionRow();
          // $lastInvoiceNo += 1;
          // $last_transaction = sprintf('%04d',$lastInvoiceNo);
          // $bulan	= date('n');
          // $romawi = getRomawi($bulan);
          // $date = date('y');
          // $ht = "HS";
          // $invoice = $last_transaction.'/'.$ht.'/'.$romawi.'/'.$date;
          // $transaction_id = $this->Transaction_model->savePayment($paymentFor, $uploadedFile, $invoice);

          // $detail_transaction = $this->Transaction_model->getDetailPendingPayment($tp_id);
          // $this->Transaction_model->saveDetailPayment($detail_transaction, $transaction_id);
          //
          // $this->Transaction_model->deleteDetailPendingPayment($tp_id);
          // $this->Transaction_model->deletePendingPayment($tp_id);

          // $this->session->set_userdata('ses_invoice', TRUE);
          // $this->session->unset_userdata('ses_t_pending_id');
          // $this->session->set_flashdata('confirm_payment', "Success Confirm Payment");
          // $url = base_url().'invoice/check/'.$transaction_id;
          // redirect($url);

          $this->session->set_flashdata('confirm_payment', "Success Confirm Payment");
          $url = base_url() . 'shop';
          redirect($url);
        } else {
          $data['error_msg'] = $this->upload->display_errors();
        }
      } else {
        $data['judul'] = 'Payment Beaute';
        $data['tp_id'] = $tp_id;
        $this->load->view('templates/header', $data);
        $this->load->view('payment/confirmpayment', $data);
        $this->load->view('templates/footer');
      }

      // }
    }
  }

  public function file_check($str)
  {
    $allowed_mime_type_arr = array('application/pdf', 'image/gif', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png');
    $mime = get_mime_by_extension($_FILES['input_file_proof']['name']);
    if (isset($_FILES['input_file_proof']['name']) && $_FILES['input_file_proof']['name'] != "") {
      if (in_array($mime, $allowed_mime_type_arr)) {
        return true;
      } else {
        $this->form_validation->set_message('file_check', 'Please select only pdf/gif/jpg/png file.');
        return false;
      }
    } else {
      $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
      return false;
    }
  }

  public function getAddres()
  {
    echo json_encode($this->Users_model->getAddrById($this->input->post('id_u_addr')));
  }

  public function getExpedition()
  {
    echo json_encode($this->Couriers_model->getExpeditionById());
  }

  public function getPriceExpedition()
  {
    echo json_encode($this->Couriers_model->getPriceExpeditionById());
  }

  public function getAllRegency()
  {
    echo json_encode($this->Carts_model->getAllRegencyWithKey());
  }

  public function getShipping()
  {
    echo json_encode($this->Carts_model->getPriceShipping());
  }

  public function getAllDistrict()
  {
    echo json_encode($this->Carts_model->getAllDistrictWithKey());
  }

  public function getFindDistrict()
  {
    $json = $this->District_model->findDistrict();
    echo json_encode($json);
  }

  function saveAddress()
  {
    $id_u_addr = $this->Users_model->saveNewAddress();
    if ($id_u_addr != "") {
      $this->session->set_userdata('id_new_address', $id_u_addr);
      $this->session->set_flashdata('address', "New Address");
      $url = base_url() . 'cart/checkout';
      redirect($url);
    }
  }

  function selectAddress()
  {
    $this->session->set_userdata('id_new_address', $this->input->post('addr_'));
    $this->session->set_flashdata('address', "Address Has Been Changed ...");
    $url = base_url() . 'cart/checkout';
    redirect($url);
  }

  function updateCart()
  {
    if ($this->Carts_model->updateCartGue($this->input->post()) > 0) {
      $data['carts'] = $this->Users_model->check_cart($this->session->userdata('ses_user_id'));
      $this->session->set_userdata('carts', $data['carts']);
      $this->session->set_flashdata('update_cart','Cart berhasil di update!');
      $url = base_url() . 'cart';
      redirect($url);
    }
  }

  function removeCart($item)
  {
    if ($this->Carts_model->removeCartGue($item) > 0) {
      $data['carts'] = $this->Users_model->check_cart($this->session->userdata('ses_user_id'));
      $this->session->set_userdata('carts', $data['carts']);
      $this->session->set_flashdata('update_cart', 'Cart berhasil di update!');
      $url = base_url() . 'cart';
      redirect($url);
    }
  }

  function addtoCart()
  {
    if ($this->Carts_model->checkGoodId() > 0) {
      $data = $this->Carts_model->checkGoodQty();
      $this->session->set_userdata('checkout', TRUE);
      if ($data[0]->qty > 0) {
        if ($this->Carts_model->updateCart($data[0]->qty) > 0) {
          $data['carts'] = $this->Users_model->check_cart($this->input->post('user_id'));
          $this->session->set_userdata('carts', $data['carts']);
          $this->session->set_flashdata('cart', $this->input->post('good_name'));
          echo json_encode('200OK');
        }
      }
    } else {
      if ($this->Carts_model->saveCart() > 0) {
        $this->session->set_userdata('checkout', TRUE);
        $data['carts'] = $this->Users_model->check_cart($this->input->post('user_id'));
        $this->session->set_userdata('carts', $data['carts']);
        $this->session->set_flashdata('cart', $this->input->post('good_name'));
        echo json_encode('200OK');
      }
    }
  }
}
