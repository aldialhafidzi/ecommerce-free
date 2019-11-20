<?php

class Admin extends CI_Controller {

  public function __construct()
  {
    parent::__construct();

    if($this->session->userdata('masuk') != TRUE){
      $url=base_url().'login';
      redirect($url);
    }
    elseif($this->session->userdata('akses') == '1'){
      $this->load->helper('url');
      $this->load->model('Goods_model');
      $this->load->model('Users_model');
      $this->load->model('View_model');
      $this->load->library('pagination');
      $this->load->library('form_validation');
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
      redirect('shop');
    }

  }

  public function index()
  {
    $data['judul'] = "Dashboard Beaute";
    $data['goods'] = $this->Goods_model->getAllGoods();

    $this->load->view('templates/header_admin', $data);
    $this->load->view('dashboard/index', $data);
    $this->load->view('templates/footer_admin');
  }

  public function detailuser()
  {
    echo json_encode($this->Users_model->getDetailUserById());
  }
  public function detailadmin()
  {
    echo json_encode($this->Users_model->getDetailAdminById());
  }

  public function listuser()
  {
    $data['judul'] = "List User Beaute";
    $data['users'] = $this->Users_model->getAllUser();

    $this->load->view('templates/header_admin', $data);
    $this->load->view('admin/listuser', $data);
    $this->load->view('templates/footer_admin');
    $this->load->view('modals/modal_user');
    $this->load->view('modals/modal_hapus');
  }

  public function deleteadmin()
  {
    if ($this->Users_model->deleteAdminById() > 0) {
      $this->session->set_flashdata('delete_admin', 'Delete Admin');
      $url = base_url().'admin/listadmin';
      redirect($url);
    }
  }

  public function deleteuser()
  {
    $this->Users_model->deleteUaddressesByUserId();
    if($this->Users_model->deleteUserById() > 0){
      $this->session->set_flashdata('delete_user', 'Delete User');
      $url = base_url().'admin/listuser';
      redirect($url);
    }
  }

  public function updateadmin()
  {
    if($this->Users_model->updateAdminById() > 0){
      $this->session->set_flashdata('update_admin', 'Update Admin');
      $url = base_url().'admin/listadmin';
      redirect($url);
    }
  }

  public function changepasswordadmin()
  {
    if($this->Users_model->changePasswordAdminById() > 0){
      $this->session->set_flashdata('change_password', 'Change Password');
      $url = base_url().'admin/listadmin';
      redirect($url);
    }

  }

  public function listadmin()
  {
    $this->form_validation->set_error_delimiters('<small class="form-text text-danger">', '</small>');
    $this->form_validation->set_rules('u_name', 'Name', 'required');
    $this->form_validation->set_rules('u_phone', 'Phone Number', 'required');
    $this->form_validation->set_rules('u_uname', 'Username',
                                        'required|min_length[5]|max_length[15]|is_unique[users.username]',
                                        array(
                                                'required'      => 'You have not provided %s.',
                                                'is_unique'     => 'This %s already exists.'
                                        ));
    $this->form_validation->set_rules('u_email', 'Email', 'required|valid_email|is_unique[users.email]');
    $this->form_validation->set_rules('u_password', 'Password', 'required');
    $this->form_validation->set_rules('u_rpassword', 'Password Confirmation', 'required|matches[u_password]');

    if($this->form_validation->run() == FALSE){
      $data['judul'] = "List Admin Beaute";
      $data['admins'] = $this->Users_model->getAllAdmin();
      $data['access'] = $this->Users_model->getAllAccess();
      $this->load->view('templates/header_admin', $data);
      $this->load->view('admin/listadmin', $data);
      $this->load->view('templates/footer_admin');
      $this->load->view('modals/modal_admin');
      $this->load->view('modals/modal_change_password');
      $this->load->view('modals/modal_hapus');
    }
    else {
      $this->Users_model->saveAccountAdmin();
      $this->session->set_flashdata('create_admin', 'Create Account');
      $url = base_url().'admin/listadmin';
      redirect($url);
    }


  }

}
