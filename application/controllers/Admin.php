<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


	function __construct(){
		parent::__construct();
    $this->load->model(['ModelAdmin']);
    // if (!$this->session->userdata('nip')){
    //   redirect('admin');
    // }

	}
  public function index()
  {
    if ($this->session->userdata('nip')) {
    redirect('home');
    }
    $this->form_validation->set_rules('nip', 'Nomor Induk Pegawai', 'required|trim', [
      'required' => 'NIP Harus Diisi..!!'
    ]);
    $this->form_validation->set_rules('password', 'Password', 'required|trim', [
      'required' => 'Password Harus Diisi..!!'
    ]);
    if ($this->form_validation->run() == FALSE) {
    $data['judul'] = 'Login Admin';
    $data['user'] = '';
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/login', $data);
    $this->load->view('templates/footer', $data);
    } else {
    $this->_login();
    }
  }

  private function _login()
  {
    $nip = htmlspecialchars($this->input->post('nip', true));
    // $nama_admin = $this->input->post('nama_admin', true);
    $password = $this->input->post('password', true);
    // $admin = $this->ModelAdmin->cekData(['nip' => $nip])->row_array();
    $admin = $this->ModelAdmin->cekData(['password' => $password])->row_array();
    // $password_data = $this->ModelAdmin->selectData($nip);
    // $nip = $this->ModelAdmin->selectData($nip);
    // $admin = $this->db->get_where('admin', ['nip' => $nip])->row_array();
    // $cekPassword = $password_data[0]->password;
    //jika usernya ada
    if ($admin) {
      
      if ($admin['is_active'] == 1){
        $admin = $this->db->get_where('admin', ['password' => $password])->row_array();
        $password = $this->input->post('password', true);
        // $admin = $this->ModelAdmin->cekData(['nip' => $nip])->row_array();
        
        // if (password_verify($password == $admin)) {
        //   $this->session->set_userdata($admin);
        //   $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda Berhasil Login!</div>');
        //   redirect('home');
        // } else {
        //   $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password Salah!!!</div>');
        //   redirect('admin');
        // }
          $this->session->set_userdata($admin);
          $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda Berhasil Login!</div>');
          redirect('home');
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert_message" role="alert">User belum diaktifasi!!</div>');
          redirect('admin');
      }
    } else {
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email tidak terdaftar</div>');
    redirect('admin');
    }
  }

  public function registrasi()
  {
    if ($this->session->userdata('nip')) {
      redirect('admin');
    }
    //membuat rule untuk inputan nama agar tidak boleh kosong dengan membuat pesan error dengan 
    //bahasa sendiri yaitu "nama belum diisi"
    $this->form_validation->set_rules('nama_admin', 'Nama Lengkap', 'required', [
      'required' => 'Nama Belum Diisi..!!'
    ]);
    //membuat rule untuk inputan email agar tidak boleh kosong, tidak ada spasi, format email harus valid
    //dan email belum pernah dipakai sama user lain dengan membuat pesan error dengan bahasa sendiri
    //yaitu jika format email tidak benar maka pesannya 'Email Tidak Benar!!'. jika email belum diisi,
    //maka pesannya adalah 'Email Belum diisi', dan jika email yang diinput sudah dipakai user lain,
    //maka pesannya 'Email Sudah dipakai'
    $this->form_validation->set_rules('nip', 'Nomor Induk Pegawai', 'required|trim|is_unique[admin.nip]', [
      
      'required' => 'Nomor Induk Pegawai belum diisi..!!',
      'is_unique' => 'Nomor Induk Pegawai sudah terdaftar..!!!'
    ]);
    //membuat rule untuk inputan password agar tidak boleh kosong, tidak ada spasi, tidak boleh kurang dari
    //dari 3 digit, dan password harus sama dengan repeat password dengan membuat pesan error dengan
    //bahasa sendiri yaitu jika password dan repeat password tidak diinput sama, maka pesannya
    //'Password Tidak Sama'. jika password diisi kurang dari 3 digit, maka pesannya adalah
    //'Password Terlalu Pendek'.
    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
      'min_length' => 'password Terlalu Pendek..!!'
    ]);
    //jika jida disubmit kemudian validasi form diatas tidak berjalan, maka akan tetap berada di
    //tampilan registrasi. tapi jika disubmit kemudian validasiform diatas berjalan, maka data yang
    //diinput akan disimpan ke dalam tabel user
    if ($this->form_validation->run() == false) {
      $data['judul'] = 'Registrasi Admin';
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/registrasi', $data);
      $this->load->view('templates/footer', $data);
    } else {
      // $nip = $this->input->post('nip', true);
      $data = [
        'nama_admin' => $this->input->post('nama_admin', true),
        'nip' => htmlspecialchars($this->input->post('nip')),
        'password' => $this->input->post('password'),
        'is_active' => 1,
        'image' => 'default.jpg',
        'tgl_input' => date('Y-m-d H:i:s')
      ];
      $this->ModelAdmin->simpanData($data); //menggunakan model
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! akun member anda sudah dibuat. Silahkan Aktivasi Akun anda</div>');
      redirect('admin');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('nip');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda telah logout!!</div>');
    redirect('autentifikasi');
  }
  // public function home() {
  //   $data = ['judul' => 'Dashboard'];
  // //jika sudah login dan jika belum login
	
	// $this->load->view('admin/index', $data);
	// $this->load->view('dashboard/index', $data);
  // $this->load->view('templates/templates_user/modal', $data);
	// $this->load->view('templates/footer', $data);
}