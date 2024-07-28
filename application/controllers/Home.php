<?php

class Home extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model(['ModelAdmin', 'ModelBooking', 'ModelMenu']);

    if ($this->session->userdata('is_active') === '1') {
    } else  if (!$this->session->userdata('nip')) {
      redirect('admin');
    } else if ($this->session->userdata('is_active') === '2') {
      redirect(base_url('customer'));
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
    $user         = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();

    $ambil    = $this->ModelAdmin->getWhere();
    $am     = $ambil->num_rows();

    $menu     = $this->ModelMenu->getWhere();
    $mn     = $menu->num_rows();

    $kategori = $this->ModelMenu->getWherekategori();
    $kg     = $kategori->num_rows();

    // $orders   = $this->ModelBooking->getWhereOrders();
    // $or     = $orders->num_rows();

    $ordersTodayCount = $this->ModelBooking->countOrdersForDate();

    $orders_count_by_date  = $this->ModelBooking->getOrdersCountByDate('paid');
    $orders_count_by_date0 = $this->ModelBooking->getOrdersWithAdminActive0('paid');
    $orders_count_by_date2 = $this->ModelBooking->getOrdersWithAdminActive2('paid');

    $data = array(
      'jml_admin'    => $am,
      'menu'         => $mn,
      'kategori'     => $kg,
      // 'orders'       => $or,
      'orders'       => $ordersTodayCount,
      'judul'        => 'Dashboaord',
      'user'         => $user['nama_admin'],
      'KT'           => $this->ModelMenu->getKategori()->result_array(),
      'orders_count_by_date'  => json_encode($orders_count_by_date),
      'orders_count_by_date2' => json_encode($orders_count_by_date2),
      'orders_count_by_date0' => json_encode($orders_count_by_date0),
    );

    // echo '<pre>';
    // print_r($orders2);
    // echo '</pre>';
    $this->load->view('dashboard/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/templates_user/modal', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('templates/footer', $data);
  }

  public function daftar_admin()
  {
    $data = [
      'judul' => 'Daftar Admin',
    ];
    $user          = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();
    $data['user']  = $user['nama_admin'];

    $data['admin'] = $this->ModelAdmin->getData()->result_array();
    $data['id']    = $this->ModelAdmin->getWhere('id');

    $this->load->library('pagination');
    $config['base_url']   = base_url() . 'home/daftar_admin';
    $config['total_rows']       = $this->ModelAdmin->countAllAdmin();
    // var_dump($config['total_rows']); die;
    $config['per_page']         = 10;

    $config['full_tag_open']    = '<nav><ul class="pagination justify-content-end">';
    $config['full_tag_close']   = '</ul></nav>';

    $config['first_link']       = 'First';
    $config['first_tag_open']   = '<li class="page-item">';
    $config['first_tag_close']  = '</li>';

    $config['last_link']        = 'Last';
    $config['last_tag_open']    = '<li class="page-item">';
    $config['last_tag_close']   = '</li>';

    $config['next_link']        = '&raquo';
    $config['next_tag_open']    = '<li class="page-item">';
    $config['next_tag_close']   = '</li>';

    $config['prev_link']        = '&laquo';
    $config['prev_tag_open']    = '<li class="page-item">';
    $config['prev_tag_close']   = '</li>';

    $config['cur_tag_open']     = '<li class="page-item active"><a class="page-link" href="#">';
    $config['cur_tag_close']    = '</a></li>';

    $config['num_tag_open']     = '<li class="page-item ">';
    $config['num_tag_close']    = '</li>';

    $config['attributes']       = array('class' => 'page-link');

    $this->pagination->initialize($config);
    $data['start']        = $this->uri->segment(3);
    $data['daftar_admin'] = $this->ModelAdmin->getdataadmin($config['per_page'], $data['start']);

    $this->load->view('dashboard/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/templates/daftar_admin', $data);
    $this->load->view('templates/templates_user/modal', $data);
    $this->load->view('templates/footer', $data);
  }

  public function ubahAdmin()
  {
    $data['judul']  = 'Ubah Admin';
    $data['user']   = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();
    $data['admin']  = $this->ModelAdmin->getWhere(['id' => $this->uri->segment(3)])->result_array();

    $this->form_validation->set_rules('nama_admin', 'Nama Admin', 'required|min_length[3]', [
      'required'   => 'Nama Admin harus diisi',
      'min_length' => 'Nama Admin terlalu pendek'
    ]);
    $this->form_validation->set_rules('is_active', 'Key Active Admin', 'required|max_length[1]|numeric', [
      'required'   => 'Key Active harus diisi',
      'max_length' => 'Kay Active terlalu panjang',
      'numeric'    => 'hanya boleh diisi angka'
    ]);
    $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
      'required'   => 'Alamat harus diisi',
    ]);


    // konfigurasi sebelum gambar diupload
    $config['upload_path']   = './assets/img/profile/';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size']      = '3000';
    $config['max_width']     = '1024';
    $config['max_height']    = '1000';
    $config['file_name']     = 'img' . time();
    $this->load->library('upload', $config);

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('dashboard/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/templates/ubah_admin', $data);
      $this->load->view('templates/templates_user/modal', $data);
      $this->load->view('templates/footer', $data);
    } else {
      if ($this->upload->do_upload('image')) {
        $image  = $this->upload->data();
        unlink('assets/img/profile/' . $this->input->post('old_pict', TRUE));
        $gambar = $image['file_name'];
      } else {
        $gambar = $this->input->post('old_pict', TRUE);
      }
      $data = [
        'nama_admin' => $this->input->post('nama_admin', true),
        'is_active'  => $this->input->post('is_active', true),
        'alamat'     => $this->input->post('alamat', true),
        'image'      => $gambar
      ];
      $this->ModelAdmin->updateAdmin($data, ['id' => $this->input->post('id')]);
      redirect('home/daftar_admin');
    }
  }


  public function detail_menu()
  {
    $data = [
      'judul' => 'Daftar Menu',
    ];
    $user         = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();
    $data['user'] = $user['nama_admin'];

    $menu                 = $this->ModelMenu->getMenu()->result_array();
    $data['row']          = $this->ModelMenu->getKategori()->result_array();
    $data['id_kategori']  = $this->ModelMenu->getWherekategori('id');
    $data['id_menu']      = $this->ModelMenu->getWhere('id_menu');

    $data = [
      'judul'       => 'Detail menu',
      'nama_admin'  => $user['nama_admin'],
      'id_menu'     => $menu['id_menu'],
      'nama_menu'   => $menu['nama_menu'],
      'id_kategori' => $menu['id_kategori'],
      'harga'       => $menu['harga'],
      'detail'      => $menu['detail'],
      'image'       => $menu['image'],
    ];

    $this->load->view('dashboard/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/templates/detail_menu', $data);
    $this->load->view('templates/templates_user/modal', $data);
    $this->load->view('templates/footer', $data);
  }

  public function daftar_menu()
  {
    $data = [
      'judul' => 'Daftar Menu',
    ];
    $user         = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();
    $data['user'] = $user['nama_admin'];

    $data['kategori']    = $this->ModelMenu->getKategori()->result_array();
    $data['menu']        = $this->ModelMenu->getMenu()->result_array();
    $data['row']         = $this->ModelMenu->getKategori()->result_array();
    $data['id_kategori'] = $this->ModelMenu->getWherekategori('id');
    $data['id_menu']     = $this->ModelMenu->getWhere('id_menu');

    $this->load->library('pagination');
    $config['base_url']   = base_url() . 'home/daftar_menu';
    $config['total_rows'] = $this->ModelMenu->countAllMenu();
    // var_dump($config['total_rows']); die;
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
    $data['daftar_menu'] = $this->ModelMenu->getdatamenu($config['per_page'], $data['start']);

    $this->load->view('dashboard/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/templates/daftar_menu', $data);
    $this->load->view('templates/templates_user/modal', $data);
    $this->load->view('templates/footer', $data);
  }


  public function menu()
  {
    $data['judul'] = 'Ubah Menu';
    $data['user']  = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();
    $data['menu']  = $this->ModelMenu->getMenu()->result_array();


    $this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required|trim', [
      'required' => 'Nama Menu tidak Boleh Kosong'
    ]);
    $this->form_validation->set_rules('harga', 'harga', 'required|trim', [
      'required' => 'Harga tidak Boleh Kosong'
    ]);
    $this->form_validation->set_rules('harga2', 'harga upsize', 'required|trim', [
      'required' => 'detail tidak Boleh Kosong'
    ]);
    $this->form_validation->set_rules('id_kategori', 'id_kategori', 'required|trim', [
      'required' => 'id_kategori tidak Boleh Kosong'
    ]);

    $config['upload_path']   = './assets/img/upload/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size']      = '3000';
    $config['max_width']     = '1024';
    $config['max_height']    = '1000';
    $config['file_name']     = 'img' . time();

    $this->load->library('upload', $config);

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('dashboard/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/templates/daftar_menu', $data);
      $this->load->view('templates/templates_user/modal', $data);
      $this->load->view('templates/footer', $data);
    } else {
      if ($this->upload->do_upload('image')) {
        $image  = $this->upload->data();
        $gambar = $image['file_nama'];
      } else {
        $gambar = '';

        $data = [
          'id_menu'     => $this->input->post('id_menu', true),
          'nama_menu'   => $this->input->post('nama_menu', true),
          'harga'       => $this->input->post('harga', true),
          'detail'      => $this->input->post('detail', true),
          'id_kategori' => $this->input->post('id_kategori', true),
          'image'       => $gambar
        ];

        $this->ModelMenu->simpanData($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message"role="alert">Menu Berhasil ditambah </div>');
        redirect('home/daftar_menu');
      }
    }
  }


  public function tambah_menu()
  {
    $data['judul']    = 'Tambah Menu';
    $data['user']     = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();
    $data['menu']     = $this->ModelMenu->getWhere(['id_menu' => $this->uri->segment(3)])->result_array();
    $data['kategori'] = $this->ModelMenu->getKategori()->result_array();

    $this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required|min_length[3]', [
      'required'   => 'Nama Menu harus diisi',
      'min_length' => 'Nama Menu terlalu pendek'
    ]);
    $this->form_validation->set_rules('id_kategori', 'Kategori', 'required', [
      'required'   => 'ID Kategori harus diisi',
    ]);
    $this->form_validation->set_rules('harga', 'Harga Produk', 'required|min_length[4]|numeric', [
      'required'   => 'Harga harus diisi',
      'min_length' => 'Harga terlalu pendek',
      'numeric'    => 'hanya boleh diisi angka'
    ]);
    $this->form_validation->set_rules('harga2', 'Harga Produk upsize', 'required|numeric', [
      'required'   => 'Harga upsize harus diisi',
      'numeric'    => 'hanya boleh diisi angka'
    ]);

    // konfigurasi sebelum gambar diupload
    $config['upload_path']   = './assets/img/upload/';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size']      = '3000';
    $config['max_width']     = '1024';
    $config['max_height']    = '1000';
    $config['file_name']     = 'img' . time();
    $this->load->library('upload', $config);

    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">' . validation_errors() . '</div>');
      redirect('home/daftar_menu');
    } else {
      if ($this->upload->do_upload('image')) {
        $image = $this->upload->data();
        $gambar = $image['file_name'];
      } else {
        $error = $this->upload->display_errors();
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Gagal upload gambar: ' . $error . '</div>');
        redirect('home/daftar_menu');
        return; // pastikan fungsi berhenti jika upload gambar gagal
      }

      $data = [
        'nama_menu'   => $this->input->post('nama_menu', true),
        'id_kategori' => $this->input->post('id_kategori', true),
        'harga'       => $this->input->post('harga', true),
        'harga2'      => $this->input->post('harga2', true),
        'image'       => $gambar
      ];
      $this->ModelMenu->simpanData($data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Menu Berhasil ditambah </div>');
      redirect('home/daftar_menu');
    }
  }


  public function daftar_kategori()
  {

    $data = array(
      'judul'     => 'Daftar kategori',
    );

    $user                = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();
    $data['user']        = $user['nama_admin'];
    $data['KT']          = $this->ModelMenu->getKategori()->result_array();
    $data['row']         = $this->ModelMenu->getKategori()->result_array();
    $data['id_kategori'] = $this->ModelMenu->getWherekategori('id');

    $this->load->view('dashboard/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/templates/daftar_kategori', $data);
    $this->load->view('templates/footer', $data);
  }

  public function edit_kategori()
  {
    $data = [
      'judul' => 'Edit Kategori',
    ];
    $user = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();
    $data['user'] = $user['nama_admin'];

    $data['KT'] = $this->ModelMenu->getKategori()->result_array();
    $data['id_kategori'] = $this->ModelMenu->getWherekategori('id');

    $this->load->library('pagination');
    $config['base_url']   = base_url() . 'home/edit_kategori';
    $config['total_rows'] = $this->ModelMenu->countAllKategori();
    // var_dump($config['total_rows']); die;
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
    $data['daftar_kategori'] = $this->ModelMenu->getdatakategori($config['per_page'], $data['start']);

    $this->load->view('dashboard/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/templates/edit_kategori', $data);
    $this->load->view('templates/templates_user/modal', $data);
    $this->load->view('templates/footer', $data);
  }


  public function ubahMenu()
  {
    $data['judul'] = 'Ubah Menu';
    $menu = $this->input->get('filter');
    $data['user'] = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();
    $data['menu'] = $this->ModelMenu->getWhere(['id_menu' => $this->uri->segment(3)])->result_array();
    $kategori = $this->ModelMenu->join($menu)->result_array();
    foreach ($kategori as $k) {
      $data['id'] = $k['id'];
      $data['k'] = $k['kategori'];
    }
    $data['kategori'] = $this->ModelMenu->getKategori()->result_array();
    $this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required|min_length[3]', [
      'required' => 'Nama Menu harus diisi',
      'min_length' => 'Nama Menu terlalu pendek'
    ]);
    $this->form_validation->set_rules('id_kategori', 'Kategori', 'required', [
      'required' => 'ID Kategori harus diisi',
    ]);
    $this->form_validation->set_rules('harga', 'Harga Produk', 'required|min_length[4]|numeric', [
      'required' => 'Harga harus diisi',
      'min_length' => 'Harga terlalu pendek',
      'numeric' => 'hanya boleh diisi angka'
    ]);
    $this->form_validation->set_rules('harga2', 'Harga Produk upsize', 'required|numeric', [
      'required' => 'Harga upsize harus diisi',
      'numeric' => 'hanya boleh diisi angka'
    ]);


    // konfigurasi sebelum gambar diupload
    $config['upload_path'] = './assets/img/upload/';
    $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
    $config['max_size'] = '3000';
    $config['max_width'] = '1024';
    $config['max_height'] = '1000';
    $config['file_name'] = 'img' . time();
    $this->load->library('upload', $config);
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('dashboard/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/templates/ubah_menu', $data);
      $this->load->view('templates/templates_user/modal', $data);
      $this->load->view('templates/footer', $data);
    } else {
      if ($this->upload->do_upload('image')) {
        $image = $this->upload->data();
        unlink('assets/img/upload/' . $this->input->post('old_pict', TRUE));
        $gambar = $image['file_name'];
      } else {
        $gambar = $this->input->post('old_pict', TRUE);
      }
      $data = [
        'nama_menu' => $this->input->post('nama_menu', true),
        'id_kategori' => $this->input->post('id_kategori', true),
        'harga' => $this->input->post('harga', true),
        'harga2' => $this->input->post('harga2', true),
        'image' => $gambar
      ];
      $this->ModelMenu->updateMenu($data, ['id_menu' => $this->input->post('id_menu')]);
      redirect('home/daftar_menu');
    }
  }

  public function ubahKategori()
  {
    $data['judul'] = 'Ubah Kategori';
    $data['user'] = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();
    $data['kategori'] = $this->ModelMenu->getWherekategori(['id' => $this->uri->segment(3)])->result_array();
    $data['kt'] = $this->ModelMenu->getKategori()->result_array();

    $this->form_validation->set_rules('kategori', 'Nama Kategori', 'required|min_length[3]', [
      'required' => 'Nama Kategori harus diisi',
      'min_length' => 'Nama Kategori terlalu pendek'
    ]);


    // konfigurasi sebelum gambar diupload
    $config['upload_path'] = './assets/img/upload/';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size'] = '3000';
    $config['max_width'] = '1024';
    $config['max_height'] = '1000';
    $config['file_name'] = 'img' . time();
    $this->load->library('upload', $config);
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('dashboard/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/templates/ubah_kategori', $data);
      $this->load->view('templates/templates_user/modal', $data);
      $this->load->view('templates/footer', $data);
    } else {
      if ($this->upload->do_upload('image')) {
        $image = $this->upload->data();
        unlink('assets/img/upload/' . $this->input->post('old_pict', TRUE));
        $gambar = $image['file_name'];
      } else {
        $gambar = $this->input->post('old_pict', TRUE);
      }
      $data = [
        'kategori' => $this->input->post('kategori', true),
        'image' => $gambar
      ];
      $this->ModelMenu->updateKategori($data, ['id' => $this->input->post('id')]);
      redirect('home/edit_kategori');
    }
  }


  public function TambahKategori()
  {
    $data['judul'] = 'Tambah Kategori';
    $user = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();
    $data['user'] = $user['nama_admin'];

    $data['KT'] = $this->ModelMenu->getKategori()->result_array();
    $data['id'] = $this->ModelMenu->getWherekategori(['id' => $this->uri->segment(3)])->result_array();

    $this->form_validation->set_rules('kategori', 'kategori', 'required|trim|is_unique[kategori.kategori]', [
      'required' => 'Nama Kategori harus diisi',
      'is_unique' => 'Nama Kategori sudah terdaftar..!!!'
    ]);

    $config['upload_path'] = './assets/img/upload/';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size'] = '3000';
    $config['max_width'] = '1024';
    $config['max_height'] = '1000';
    $config['file_name'] = 'img' . time();
    $this->load->library('upload', $config);

    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Gagal</div>');
      redirect('home/edit_kategori');
    } else {
      if ($this->upload->do_upload('image')) {
        $image = $this->upload->data();
        unlink('assets/img/upload/' . $this->input->post('old_pict', TRUE));
        $gambar = $image['file_name'];
      } else {
        $upload_error = $this->upload->display_errors();
        $gambar = $this->input->post('old_pict', TRUE);

        if (empty($gambar)) {
          $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Gagal mengunggah gambar. ' . $upload_error . '</div>');
          redirect('home/edit_kategori');
          return;
        }
      }

      $data = [
        'kategori' => $this->input->post('kategori', true),
        'image' => $gambar
      ];

      $this->ModelMenu->simpanKategori($data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! Kategori Baru sudah dibuat.</div>');
      redirect(base_url('home/daftar_kategori'));
    }
  }


  public function hapusAdmin()
  {
    $where = ['id' => $this->uri->segment(3)];
    $this->ModelAdmin->hapusAdmin($where);
    redirect(base_url('home/daftar_admin'));
  }

  public function hapusKategori()
  {
    $where = ['id' => $this->uri->segment(3)];
    $this->ModelMenu->hapusKategori($where);
    redirect(base_url('home/daftar_kategori'));
  }

  public function hapusmenu()
  {
    $where = ['id_menu' => $this->uri->segment(3)];
    $this->ModelMenu->hapusmenu($where);
    redirect(base_url('home/daftar_menu'));
  }

  public function hapuspengunjung()
  {
    $where = ['id_booking' => $this->uri->segment(3)];
    $this->ModelBooking->hapuspengunjung($where);
    redirect(base_url('home/pengunjung'));
  }

  public function pengunjung()
  {
    $data = [
      'judul' => 'Daftar Pengunjung',
    ];
    $user         = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();
    $data['user'] = $user['nama_admin'];

    $data['orders']        = $this->ModelBooking->getPengunjung()->result_array();;

    $this->load->library('pagination');
    $config['base_url']   = base_url() . 'home/pengunjung';
    $config['total_rows'] = $this->ModelBooking->countAllpengunjung();
    // var_dump($config['total_rows']); die;
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
    $data['daftar_pengunjung'] = $this->ModelBooking->getdatapengunjung($config['per_page'], $data['start']);

    $this->load->view('dashboard/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/templates/daftar_pengunjung', $data);
    $this->load->view('templates/templates_user/modal', $data);
    $this->load->view('templates/footer', $data);
  }


  public function logout()
  {
    $this->session->unset_userdata('nama_admin');
    $this->session->unset_userdata('nip');

    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda telah logout!!</div>');
    redirect('admin');
  }
}
