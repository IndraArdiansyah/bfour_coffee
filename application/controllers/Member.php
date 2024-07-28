<?php
defined('BASEPATH') or exit('No Direct script access allowed');

class Member extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation', 'session');
    $this->load->helper('form');
    $this->load->model(['ModelAdmin', 'ModelMenu', 'ModelBooking']);

    if ($this->session->userdata('is_active') === '0') {
    } else  if (!$this->session->userdata('nip')) {
      redirect('admin');
    } else if ($this->session->userdata('is_active') === '1') {
      redirect(base_url('admin'));
    } else if ($this->session->userdata('is_active') === '2') {
      redirect(base_url('customer'));
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
      'judul' => 'Dashboard Member',
    );

    $data['kategori'] = $this->ModelMenu->getKategori()->result_array();
    $data['menu'] = $this->ModelMenu->getMenu()->result_array();

    $this->load->view('dashboard/header_member', $data);
    $this->load->view('dashboard/beranda_member', $data);
    $this->load->view('templates/templates_user/sidebar_member', $data);
    $this->load->view('templates/templates_user/modal', $data);
    $this->load->view('templates/footer', $data);
  }

  public function kategori()
  {
    $this->session->userdata('nama_admin');
    $user = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();

    $data = array(
      'user' => $user['nama_admin'],
      'judul' => 'Dashboard Member',
    );

    $kategori = $this->input->get('filter');
    $kategoriName = $this->ModelMenu->getKategoriByName($kategori);
    $data['menu']  = $this->ModelMenu->getmenuById($kategoriName['id']);
    $data['kategori'] = $this->ModelMenu->getKategori()->result_array();

    $this->load->view('dashboard/header_member', $data);
    $this->load->view('dashboard/beranda_member', $data);
    $this->load->view('templates/templates_user/sidebar_member', $data);
    $this->load->view('templates/templates_user/modal', $data);
    $this->load->view('templates/footer', $data);
  }

  public function cari()
  {
    $this->session->userdata('nama_admin');
    $user = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();

    $data = array(
      'user' => $user['nama_admin'],
      'judul' => 'Dashboard Member',
    );

    $keyword = $this->input->get('keyword');
    $data['menu'] = $this->ModelMenu->search($keyword);
    $data['kategori'] = $this->ModelMenu->getKategori()->result_array();

    $this->load->view('dashboard/header_member', $data);
    $this->load->view('dashboard/beranda_member', $data);
    $this->load->view('templates/templates_user/sidebar_member', $data);
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
    $this->load->view('dashboard/detail_menu', $data);
    $this->load->view('templates/templates_user/sidebar_member', $data);
    $this->load->view('templates/templates_user/modal', $data);
    $this->load->view('templates/footer', $data);
  }

  public function profile()
  {
    if (!$this->session->userdata('nip')) {
      redirect('member');
    }
    $user = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();
    // $data['kategori'] = $this->ModelMenu->getKategori()->result_array();
    $data = [
      'judul' => 'halaman profile',
      'id' => $user['id'],
      'nama_admin' => $user['nama_admin'],
      'nip' => $user['nip'],
      'tgl_input' => $user['tgl_input'],
      'image' => $user['image'],
      'alamat' => $user['alamat'],
      'kategori' => $this->ModelMenu->getKategori()->result_array(),
    ];


    $this->load->view('dashboard/header', $data);
    $this->load->view('templates/templates_user/sidebar_member', $data);
    $this->load->view('templates/templates_user/profile', $data);
    $this->load->view('templates/footer', $data);
  }

  public function ubahProfil()
  {
    $data['judul'] = 'Ubah Profil';
    $data['user'] = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();
    $data['kategori'] = $this->ModelMenu->getKategori()->result_array();
    $this->form_validation->set_rules('nama_admin', 'Nama Lengkap', 'required|trim', [
      'required' => 'Nama tidak Boleh Kosong'
    ]);
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
      'required' => 'Alamat tidak Boleh Kosong'
    ]);
    if ($this->form_validation->run() == false) {
      $this->load->view('dashboard/header', $data);
      $this->load->view('templates/templates_user/sidebar_member', $data);
      $this->load->view('templates/templates_user/ubah_profile', $data);
      $this->load->view('templates/footer', $data);
    } else {
      $nama_admin = $this->input->post('nama_admin', true);
      $nip = $this->input->post('nip', true);
      $alamat = $this->input->post('alamat', true);

      //jika ada gambar yang akan diupload
      $upload_image = $_FILES['image']['name'];
      if ($upload_image) {
        $config['upload_path'] = './assets/img/profile/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'pro' . time();
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image')) {
          $gambar_lama = $data['admin']['image'];
          if ($gambar_lama != 'default.jpg') {
            unlink(FCPATH . 'assets/img/profile/' . $gambar_lama);
          }
          $gambar_baru = $this->upload->data('file_name');
          $this->db->set('image', $gambar_baru);
        } else {
        }
      }
      $this->db->set('nama_admin', $nama_admin);
      $this->db->set('alamat', $alamat);
      $this->db->where('nip', $nip);
      $this->db->update('admin');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message"role="alert">ProfilBerhasil diubah </div>');
      redirect('member/profile');
    }
  }

  public function orders()
  {
    $data = [
      'judul' => 'Daftar Orders',
    ];
    $user         = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();
    $nip = $user['nip'];
    $data['user'] = $user['nama_admin'];

    $data['orders']        = $this->ModelBooking->getOrdersByNip($nip)->result_array();


    $data['kategori']      = $this->ModelMenu->getKategori()->result_array();

    $this->load->library('pagination');
    $config['base_url']   = base_url() . 'member/orders';
    $config['total_rows'] = $this->ModelBooking->getOrdersDataNip($nip);
    $config['per_page']         = 10;

    $config['full_tag_open']   = '<nav><ul class="pagination justify-content-end">';
    $config['full_tag_close']  = '</ul></nav>';

    $config['first_link']      = 'First';
    $config['first_tag_open']  = '<li class="page-item">';
    $config['first_tag_close'] = '</li>';

    $config['last_link']       = 'Last';
    $config['last_tag_open']   = '<li class="page-item">';
    $config['last_tag_close']  = '</li>';

    $config['next_link']       = '&raquo';
    $config['next_tag_open']   = '<li class="page-item">';
    $config['next_tag_close']  = '</li>';

    $config['prev_link']       = '&laquo';
    $config['prev_tag_open']   = '<li class="page-item">';
    $config['prev_tag_close']  = '</li>';

    $config['cur_tag_open']    = '<li class="page-item active"><a class="page-link" href="#">';
    $config['cur_tag_close']   = '</a></li>';

    $config['num_tag_open']    = '<li class="page-item ">';
    $config['num_tag_close']   = '</li>';

    $config['attributes']      = array('class' => 'page-link');

    $this->pagination->initialize($config);
    $data['start']       = $this->uri->segment(3);
    $data['daftar_pengunjung'] = $this->ModelBooking->getdatapengunjungbynip($nip, $config['per_page'], $data['start']);

    $this->load->view('dashboard/header_member', $data);
    $this->load->view('dashboard/detail_orders', $data);
    $this->load->view('templates/templates_user/sidebar_member', $data);
    $this->load->view('templates/templates_user/modal', $data);
    $this->load->view('templates/footer', $data);
  }


  public function ordersCustomer()
  {
    $data = [
      'judul' => 'Daftar Orders',
    ];
    $user = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();
    $nip = $user['nip'];
    $data['user'] = $user['nama_admin'];

    $this->load->library('pagination');

    $is_active = 2;

    $config['base_url'] = base_url() . 'member/ordersCustomer';
    $config['total_rows'] = $this->ModelBooking->getOrdersCountByActiveNip($is_active);
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
    $data['daftar_pengunjung'] = $this->ModelBooking->getOrdersDataByActiveNip($is_active, $config['per_page'], $data['start']);

    $data['kategori'] = $this->ModelMenu->getKategori()->result_array();

    $this->load->view('dashboard/header_member', $data);
    $this->load->view('dashboard/detail_orders', $data);
    $this->load->view('templates/templates_user/sidebar_member', $data);
    $this->load->view('templates/templates_user/modal', $data);
    $this->load->view('templates/footer', $data);
  }

  public function checkNewOrders()
  {
    // $this->load->model('ModelBooking');
    $newData = $this->ModelBooking->getNewOrders(); // Ganti dengan logika Anda untuk memeriksa data baru

    echo json_encode(['newOrders' => $newOrders]);
  }
}
