<?php

class Master extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    if ($this->session->userdata('masuk') != TRUE) {
      $url = base_url() . 'login';
      redirect($url);
    } elseif ($this->session->userdata('akses') == '1') {
      $this->load->helper('url');
      $this->load->helper('file');
      $this->load->model('Goods_model');
      $this->load->model('View_model');
      $this->load->library('pagination');
    } else {
      echo "Anda tidak berhak mengakses halaman ini";
      redirect('shop');
    }
  }

  public function index()
  {

    $this->form_validation->set_error_delimiters('<small class="form-text text-danger">', '</small>');
    $this->form_validation->set_rules('p_code', 'Product Code', 'required');
    $this->form_validation->set_rules('p_name', 'Product Name', 'required');
    $this->form_validation->set_rules('p_type', 'Product Type', 'required');
    $this->form_validation->set_rules('p_categori', 'Product Categori', 'required');
    $this->form_validation->set_rules('p_color', 'Product Color', 'required');
    $this->form_validation->set_rules('p_description', 'Product Description', 'required');
    $this->form_validation->set_rules('p_price', 'Product Price', 'required');


    if ($this->form_validation->run() == TRUE) {
      $config['upload_path'] = 'public/images/products/';
      $config['allowed_types'] = 'gif|jpg|png|pdf';
      $config['max_size'] = '2048';
      $this->load->library('upload', $config);
      $this->load->library('upload');
      $this->upload->initialize($config);

      $image_1 = '';
      $image_2 = '';
      $image_3 = '';
      if ($this->upload->do_upload('p_image1')) {
        $uploadData = $this->upload->data();
        $image_1 = $uploadData['file_name'];
      } else {
        $error = array('error' => $this->upload->display_errors());
      }
      if ($this->upload->do_upload('p_image2')) {
        $uploadData = $this->upload->data();
        $image_2 = $uploadData['file_name'];
      }
      if ($this->upload->do_upload('p_image3')) {
        $uploadData = $this->upload->data();
        $image_3 = $uploadData['file_name'];
      }
      
      if ($image_1 != '' || $image_2 != '' || $image_3 != '') {
        $this->Goods_model->addNewProduct($image_1, $image_2, $image_3);
        $this->session->set_flashdata('add_success', 'Add Data');
        $url = base_url() . 'master';
        redirect($url);
      } else {
        $data['error_msg'] = $this->upload->display_errors();
      }
    } else {
      $data['judul'] = "Master Beaute";
      $data['goods'] = $this->Goods_model->getAllGoods();
      $data['categories'] = $this->Goods_model->getAllCategories();
      $data['types'] = $this->Goods_model->getAllTypes();

      $this->load->view('templates/header_admin', $data);
      $this->load->view('admin/master', $data);
      $this->load->view('templates/footer_admin');
      $this->load->view('modals/modal_master', $data);
      $this->load->view('modals/modal_hapus');
    }
  }

  public function delete_product()
  {
    if ($this->Goods_model->deleteProductById() > 0) {
      $this->session->set_flashdata('delete_data', 'Delete Data');
      $url = base_url() . 'master';
      redirect($url);
    }
  }

  public function updateProduct()
  {
    $config['upload_path'] = 'public/images/products/';
    $config['allowed_types'] = 'gif|jpg|png|pdf';
    $config['max_size'] = '2048';
    $this->load->library('upload', $config);
    $image_1 = '';
    $image_2 = '';
    $image_3 = '';


    if ($this->upload->do_upload('p_image1')) {
      $uploadData = $this->upload->data();
      $image_1 = $uploadData['file_name'];
    } else {
      $error = array('error' => $this->upload->display_errors());
      var_dump($error);
    }

    if ($this->upload->do_upload('p_image2')) {
      $uploadData = $this->upload->data();
      $image_2 = $uploadData['file_name'];
    }

    if ($this->upload->do_upload('p_image3')) {
      $uploadData = $this->upload->data();
      $image_3 = $uploadData['file_name'];
    }

    $this->Goods_model->updateProductById($image_1, $image_2, $image_3);
    $this->session->set_flashdata('edit_success', 'Edit Successfully !');

    $url = base_url() . 'master';
    redirect($url);
  }

  public function detailproduct()
  {
    echo json_encode($this->Goods_model->getProductById());
  }
}
