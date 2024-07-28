<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->helper('form');
    $this->load->model(['ModelAdmin', 'ModelMenu', 'ModelBooking']);

    if ($this->session->userdata('is_active') === '2') {
    } else  if (!$this->session->userdata('nip')) {
      redirect('admin'); // Jika tidak ada session 'nip', redirect ke halaman login
    } else if ($this->session->userdata('is_active') === '1') {
      redirect(base_url('admin'));
    } else if ($this->session->userdata('is_active') === '0') {
      redirect(base_url('member'));
    }
  }

  private function _is_logged_in()
  {
    if (!$this->session->userdata('nip')) {
      redirect('admin');
    }
  }

  public function index()
  {
    $this->_is_logged_in();

    $this->session->userdata('nama_admin');
    $user = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();

    $data = array(
      'user' => $user['nama_admin'],
      'judul' => 'Dashboard Customer',
    );

    $data['kategori'] = $this->ModelMenu->getKategori()->result_array();
    $data['menu'] = $this->ModelMenu->getMenu()->result_array();

    $this->load->view('dashboard/header_member', $data);
    $this->load->view('customer/beranda_customer', $data);
    $this->load->view('customer/sidebar_customer', $data);
    $this->load->view('templates/templates_user/modal', $data);
    $this->load->view('templates/footer', $data);
  }


  public function kategori()
  {
    $this->session->userdata('nama_admin');
    $user = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();

    $data = array(
      'user' => $user['nama_admin'],
      'judul' => 'Dashboard Customer',
    );

    $kategori = $this->input->get('filter');
    $kategoriName = $this->ModelMenu->getKategoriByName($kategori);
    $data['menu']  = $this->ModelMenu->getmenuById($kategoriName['id']);
    $data['kategori'] = $this->ModelMenu->getKategori()->result_array();

    $this->load->view('dashboard/header_member', $data);
    $this->load->view('customer/beranda_customer', $data);
    $this->load->view('customer/sidebar_customer', $data);
    $this->load->view('templates/templates_user/modal', $data);
    $this->load->view('templates/footer', $data);
  }

  public function cari()
  {
    $this->session->userdata('nama_admin');
    $user = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();

    $data = array(
      'user' => $user['nama_admin'],
      'judul' => 'Dashboard Customer',
    );

    $keyword = $this->input->get('keyword');
    $data['menu'] = $this->ModelMenu->search($keyword);
    $data['kategori'] = $this->ModelMenu->getKategori()->result_array();

    $this->load->view('dashboard/header_member', $data);
    $this->load->view('customer/beranda_customer', $data);
    $this->load->view('customer/sidebar_customer', $data);
    $this->load->view('templates/templates_user/modal', $data);
    $this->load->view('templates/footer', $data);
  }

  public function detailMenu()
  {
    $this->session->userdata('nama_admin');
    $user = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();

    $data = array(
      'user' => $user['nama_admin'],
      'judul' => 'Detail Menu',
    );

    $menu = $this->input->get('filter');
    $data['menu']  = $this->ModelMenu->get_where($menu);
    $data['kategori'] = $this->ModelMenu->getKategori()->result_array();

    $this->load->view('dashboard/header_member', $data);
    $this->load->view('customer/detail_menu', $data);
    $this->load->view('customer/sidebar_customer', $data);
    $this->load->view('templates/templates_user/modal', $data);
    $this->load->view('templates/footer', $data);
  }

  public function orders()
  {
    $data = [
      'judul' => 'Daftar Orders',
    ];
    $user = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();
    $nip = $user['nip'];
    $data['user'] = $user['nama_admin'];

    // Panggil metode yang diubah dari model
    $data['orders'] = $this->ModelBooking->getOrdersByNip($nip)->result_array();

    $data['kategori'] = $this->ModelMenu->getKategori()->result_array();

    $this->load->library('pagination');
    $config['base_url'] = base_url() . 'customer/orders';
    $config['total_rows'] = $this->ModelBooking->getOrdersDataNip($nip);
    $config['per_page'] = 10;

    $config['full_tag_open'] = '<nav><ul class="pagination justify-content-end">';
    $config['full_tag_close'] = '</ul></nav>';

    $config['first_link'] = 'First';
    $config['first_tag_open'] = '<li class="page-item">';
    $config['first_tag_close'] = '</li>';

    $config['last_link'] = 'Last';
    $config['last_tag_open'] = '<li class="page-item">';
    $config['last_tag_close'] = '</li>';

    $config['next_link'] = '&raquo';
    $config['next_tag_open'] = '<li class="page-item">';
    $config['next_tag_close'] = '</li>';

    $config['prev_link'] = '&laquo';
    $config['prev_tag_open'] = '<li class="page-item">';
    $config['prev_tag_close'] = '</li>';

    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
    $config['cur_tag_close'] = '</a></li>';

    $config['num_tag_open'] = '<li class="page-item ">';
    $config['num_tag_close'] = '</li>';

    $config['attributes'] = array('class' => 'page-link');

    $this->pagination->initialize($config);
    $data['start'] = $this->uri->segment(3);
    $data['daftar_pengunjung'] = $this->ModelBooking->getdatapengunjungbynip($nip, $config['per_page'], $data['start']);

    $this->load->view('dashboard/header_member', $data);
    $this->load->view('customer/detail_orders', $data);
    $this->load->view('customer/sidebar_customer', $data);
    $this->load->view('templates/templates_user/modal', $data);
    $this->load->view('templates/footer', $data);
  }
}
