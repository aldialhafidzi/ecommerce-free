<?php

class Shop extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('Goods_model');
    $this->load->model('View_model');
    $this->load->library('pagination');
  }

  public function index()
  {
    $data['judul'] = "Beaute - Shop";
    $data['page'] = "shop";
    $data['jml_per_page'] = 9;
    $data['jumlah_data'] = $this->Goods_model->jumlah_data();
    $config['total_rows'] = $data['jumlah_data'];
    $config['per_page'] = $data['jml_per_page'];
    $config['base_url'] = base_url().'index.php/shop/index/';
    $from = $this->uri->segment(9);
    $this->pagination->initialize($config);
    $data['goods'] = $this->Goods_model->getAllGoodsWithLimit($config['per_page'], $from);

    if( $this->input->post('search-product') ){
      $data['jumlah_data'] = $this->Goods_model->jumlahfindGoods();
      $config['total_rows'] = $data['jumlah_data'];
      $this->pagination->initialize($config);
      $data['goods'] = $this->Goods_model->findGoods($config['per_page'], $from);
    }
    
    $this->load->view('templates/header', $data);
    $this->load->view('shop/index', $data);
    $this->load->view('templates/footer');
  }

  public function lowtohigh()
  {
    $data['judul'] = "Beaute - Shop";
    $data['page'] = 'shop';
    $data['sort'] = 'lowtohigh';
    $data['jumlah_data'] = $this->Goods_model->jumlah_data();
    $data['jml_per_page'] = 3;
    $config['base_url'] = base_url().'index.php/shop/lowtohigh/';
    $config['total_rows'] = $data['jumlah_data'];
    $config['per_page'] = $data['jml_per_page'];
    $from = $this->uri->segment(3);
    $this->pagination->initialize($config);
    $data['goods'] = $this->Goods_model->getAllGoodsASC($config['per_page'], $from);
    $this->load->view('templates/header', $data);
    $this->load->view('shop/index', $data);
    $this->load->view('templates/footer');
  }

  public function hightolow()
  {
    $data['judul'] = "Beaute - Shop";
    $data['page'] = 'shop';
    $data['sort'] = 'hightolow';
    $data['jumlah_data'] = $this->Goods_model->jumlah_data();
    $data['jml_per_page'] = 3;
    $config['base_url'] = base_url().'index.php/shop/hightolow/';
    $config['total_rows'] = $data['jumlah_data'];
    $config['per_page'] = $data['jml_per_page'];
    $from = $this->uri->segment(3);
    $this->pagination->initialize($config);
    $data['goods'] = $this->Goods_model->getAllGoodsDSC($config['per_page'], $from);
    $this->load->view('templates/header', $data);
    $this->load->view('shop/index', $data);
    $this->load->view('templates/footer');
  }

  public function makeover()
  {
    $data['judul'] = "Beaute - Shop";
    $data['page'] = 'shop';
    $data['jumlah_data'] = $this->Goods_model->jumlahDataWomen();
    $data['jml_per_page'] = 3;
    $config['base_url'] = base_url().'index.php/shop/makeover/';
    $config['total_rows'] = $data['jumlah_data'];
    $config['per_page'] = $data['jml_per_page'];
    $from = $this->uri->segment(3);
    $this->pagination->initialize($config);
    $data['goods'] = $this->Goods_model->getAllGoodsWhereMakeOver($config['per_page'], $from);
    $this->load->view('templates/header', $data);
    $this->load->view('shop/index', $data);
    $this->load->view('templates/footer');
  }

  public function discount()
  {
    $data['judul'] = "Beaute - Shop";
    $data['page'] = 'shop';
    $data['jumlah_data'] = $this->Goods_model->jumlahDataDiscount();
    $data['jml_per_page'] = 3;
    $config['base_url'] = base_url().'index.php/shop/makeover/';
    $config['total_rows'] = $data['jumlah_data'];
    $config['per_page'] = $data['jml_per_page'];
    $from = $this->uri->segment(3);
    $this->pagination->initialize($config);
    $data['goods'] = $this->Goods_model->getAllDiscount($config['per_page'], $from);
    $this->load->view('templates/header', $data);
    $this->load->view('shop/index', $data);
    $this->load->view('templates/footer');
  }

  public function emina()
  {
    $data['judul'] = "Beaute - Shop";
    $data['page'] = 'shop';
    $data['jumlah_data'] = $this->Goods_model->jumlahDataMen();
    $data['jml_per_page'] = 3;
    $config['base_url'] = base_url().'index.php/shop/emina/';
    $config['total_rows'] = $data['jumlah_data'];
    $config['per_page'] = $data['jml_per_page'];
    $from = $this->uri->segment(3);
    $this->pagination->initialize($config);
    $data['goods'] = $this->Goods_model->getAllGoodsWhereEmina($config['per_page'], $from);
    $this->load->view('templates/header', $data);
    $this->load->view('shop/index', $data);
    $this->load->view('templates/footer');
  }

  public function pixy()
  {
    $data['judul'] = "Beaute - Shop";
    $data['page'] = 'shop';
    $data['jumlah_data'] = $this->Goods_model->jumlahDataKIDS();
    $data['jml_per_page'] = 3;
    $config['base_url'] = base_url().'index.php/shop/pixy/';
    $config['total_rows'] = $data['jumlah_data'];
    $config['per_page'] = $data['jml_per_page'];
    $from = $this->uri->segment(3);
    $this->pagination->initialize($config);
    $data['goods'] = $this->Goods_model->getAllGoodsWherePixy($config['per_page'], $from);
    $this->load->view('templates/header', $data);
    $this->load->view('shop/index', $data);
    $this->load->view('templates/footer');
  }

  public function wardah()
  {
    $data['judul'] = "Beaute - Shop";
    $data['page'] = 'shop';
    $data['jumlah_data'] = $this->Goods_model->jumlahDataADULT();
    $data['jml_per_page'] = 3;
    $config['base_url'] = base_url().'index.php/shop/wardah/';
    $config['total_rows'] = $data['jumlah_data'];
    $config['per_page'] = $data['jml_per_page'];
    $from = $this->uri->segment(3);
    $this->pagination->initialize($config);
    $data['goods'] = $this->Goods_model->getAllGoodsWhereWardah($config['per_page'], $from);
    $this->load->view('templates/header', $data);
    $this->load->view('shop/index', $data);
    $this->load->view('templates/footer');
  }

  public function harga($harga = '')
  {
    $data['judul'] = "Beaute - Shop";
    $data['page'] = 'shop';
    $data['sort'] = $harga;
    $data['jumlah_data'] = $this->Goods_model->jumlahDataHarga($harga);
    $data['jml_per_page'] = 3;
    $config['base_url'] = base_url().'index.php/shop/harga/';
    $config['total_rows'] = $data['jumlah_data'];
    $config['per_page'] = $data['jml_per_page'];
    $from = $this->uri->segment(4);
    $this->pagination->initialize($config);
    $data['goods'] = $this->Goods_model->getAllGoodsWhereHARGA($harga, $config['per_page'], $from);
    $this->load->view('templates/header', $data);
    $this->load->view('shop/index', $data);
    $this->load->view('templates/footer');
  }


  public function filter($harga = '', $color = '')
  {
    $colors = explode("-", $color);
    $data['judul'] = "Beaute - Shop";
    $data['page'] = 'shop';
    $data['jumlah_data'] = $this->Goods_model->jumlahDataFilter($harga, $colors);
    $data['jml_per_page'] = 3;
    $config['base_url'] = base_url().'index.php/shop/filter/'.$harga.'/'.$color;
    $config['total_rows'] = $data['jumlah_data'];
    $config['per_page'] = $data['jml_per_page'];
    $from = $this->uri->segment(5);
    $this->pagination->initialize($config);
    $data['goods'] = $this->Goods_model->getAllGoodsWithFilter($harga, $colors, $config['per_page'], $from);
    $this->load->view('templates/header', $data);
    $this->load->view('shop/index', $data);
    $this->load->view('templates/footer');
  }

  public function cari($cari = ''){
    $data['judul'] = "Beaute - Shop";
    $data['page'] = 'shop';
    $data['jumlah_data'] = $this->Goods_model->jumlahDataCari($cari);
    $data['jml_per_page'] = 3;
    $config['base_url'] = base_url().'index.php/shop/cari/';
    $config['total_rows'] = $data['jumlah_data'];
    $config['per_page'] = $data['jml_per_page'];
    $from = $this->uri->segment(3);
    $this->pagination->initialize($config);
    $data['goods'] = $this->Goods_model->getAllGoodsWhereCari($cari, $config['per_page'], $from);
    $this->load->view('templates/header', $data);
    $this->load->view('shop/index', $data);
    $this->load->view('templates/footer');
  }



}
