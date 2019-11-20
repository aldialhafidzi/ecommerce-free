<?php
class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->model('Users_model');
        $this->load->model('Province_model');
        $this->load->model('Transaction_model');
        $this->load->model('Regency_model');
        $this->load->model('District_model');
        $this->load->library('form_validation');
    }

    function index(){
      if($this->session->userdata('akses') == '1'){
        redirect('admin');
      }
      elseif($this->session->userdata('akses') == '2') {
        redirect('shop');
      }

        $data['judul'] = 'Login Beaute';
        $data['page'] = 'Login';
        $this->load->view('templates/header', $data);
        $this->load->view('login/index');
        $this->load->view('templates/footer');
    }

    function auth(){
        $username = htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

        $cek_login = $this->Login_model->auth_login($username,$password);
        // var_dump(count($cek_login));
        // die;
        if(count($cek_login) > 0){
          $data = $cek_login->row_array();
          $this->session->set_userdata('masuk',TRUE);
          $data['carts'] = $this->Users_model->check_cart($data['id']);
          $data['u_listaddr'] = $this->Users_model->getListAddress($data['id']);

          $data['list_pending_payment'] = $this->Transaction_model->getPendingPaymentByUserId($data['id']);
          $count_lps = count($data['list_pending_payment']);
          $this->session->set_userdata('ses_count_pp', $count_lps);

          $data['list_transactions'] = $this->Transaction_model->getListTransactionByUserId($data['id']);
          $count_lt = count($data['list_transactions']);
          $this->session->set_userdata('ses_count_lt', $count_lt);

          $this->session->set_userdata('carts', $data['carts']);
          if(count($data['carts']) > 0){
            $this->session->set_userdata('checkout', TRUE);
          }
          $this->session->set_userdata('u_listaddr', $data['u_listaddr']);
           if($data['access_id'] == '1'){
              $this->session->set_userdata('akses','1');
              $this->session->set_userdata('ses_id',$data['username']);
              $this->session->set_userdata('ses_user_id',$data['id']);
              $this->session->set_userdata('ses_nama',$data['name']);
              redirect('admin');

           } elseif($data['access_id'] == '2'){
              $this->session->set_userdata('akses','2');
              $this->session->set_userdata('ses_id',$data['username']);
              $this->session->set_userdata('ses_user_id',$data['id']);
              $this->session->set_userdata('ses_nama',$data['name']);
              redirect('shop');
           }


        } else {
          $url=base_url().'login';
          echo $this->session->set_flashdata('msg','Username Atau Password Salah !');
          redirect($url);
        }

    }


    public function input_password($str){
      if($_POST['passwordconfirm'] == $_POST['password']){
        return true;
      }
      else {
        $this->form_validation->set_message('input_password', 'Your confirm password is not match.');
        return false;
      }
    }

    public function check_old_password($str){
      if($_POST['old_password'] != $_POST['password']){
        return true;
      }
      else {
        $this->form_validation->set_message('check_old_password', 'Your old password is the same as the new password.');
        return false;
      }
    }

    public function check_email($str){
      if(count($this->Users_model->chekEmailNya($_POST['email'], $this->session->userdata('ses_user_id'))) > 0){
        return true;
      }
      else {
        $this->form_validation->set_message('check_email', 'Your email is not the same as existing data!');
        return false;
      }
    }


    function changepassword()
    {
      $this->form_validation->set_error_delimiters('<small class="form-text text-danger">', '</small>');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_email');
      $this->form_validation->set_rules('old_password', 'Old Password', 'required|callback_check_old_password');
      $this->form_validation->set_rules('password', 'Password', 'required|callback_input_password');
      $this->form_validation->set_rules('passwordconfirm', 'Password Confirmation', 'required|callback_input_password');

      if($this->form_validation->run() == FALSE){
        $data['judul'] = 'Beaute Change Password';
        $this->load->view('templates/header', $data);
        $this->load->view('user/changepassword');
        $this->load->view('templates/footer');
      } else {
        if($this->Users_model->changePasswordById() > 0){
          $this->session->set_flashdata('change_password', 'Change Password');
          $url = base_url().'shop';
          redirect($url);
        }

      }
    }

    function register(){
      $this->form_validation->set_error_delimiters('<small class="form-text text-danger">', '</small>');
      $this->form_validation->set_rules('firstname', 'First Name', 'required');
      $this->form_validation->set_rules('phone', 'Phone Number', 'required');
      $this->form_validation->set_rules('username', 'Username',
                                          'required|min_length[5]|max_length[15]|is_unique[users.username]',
                                          array(
                                                  'required'      => 'You have not provided %s.',
                                                  'is_unique'     => 'This %s already exists.'
                                          ));
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
      $this->form_validation->set_rules('province', 'Province', 'required');
      $this->form_validation->set_rules('regency', 'Regency', 'required');
      $this->form_validation->set_rules('district', 'District', 'required');
      $this->form_validation->set_rules('postcode', 'Post Code', 'required');
      $this->form_validation->set_rules('detail_address', 'Detail Address', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');
      $this->form_validation->set_rules('passwordconfirm', 'Password Confirmation', 'required|matches[password]');


      if($this->form_validation->run() == FALSE){
        $data['judul'] = 'Register Beaute';
        $data['page'] = 'register';
        $data['provinces'] = $this->Province_model->getAllProvince();
        $data['regencies'] = $this->Regency_model->getAllRegency();
        $this->load->view('templates/header', $data);
        $this->load->view('register/index', $data);
        $this->load->view('templates/footer');
      }
      else {
        $user_id = $this->Users_model->createNewAccount();
        $this->Users_model->saveNewAccountAddress($user_id);
        $this->session->set_flashdata('flash', 'registered');
        redirect('login');
      }
    }

    function getAllDistrict()
    {
      echo json_encode($this->District_model->getAllDistrictWithKey());
    }

    function getAllRegency()
    {
      echo json_encode($this->Regency_model->getAllRegencyWithKey());
    }

    function createAccount(){


    }


    function logout(){
        $this->session->sess_destroy();
        $url=base_url('');
        redirect($url);
    }

}
