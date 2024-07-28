<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model(['ModelAdmin']);
    $this->load->library('session');

    
  }

    // menu login
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
      $password = $this->input->post('password', true);
      $admin = $this->ModelAdmin->cekData(['nip' => $nip, 'password' => $password])->row_array();
      if ($admin) {
        $this->session->set_userdata('nip', $admin['nip']);
        $this->session->set_userdata('is_active', $admin['is_active']);
        
        switch ($admin['is_active']) {
          case 1:
            redirect('home');
            break;
          case 2:
            redirect('customer');
            break;
          default:
            redirect('member');
            break;
        }
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">NIP atau Password salah!</div>');
        redirect('admin');
      }
    }
  public function registrasi()
  {
    if ($this->session->userdata('nip')) {
      redirect('admin');
    }
    $this->form_validation->set_rules('nama_admin', 'Nama Lengkap', 'required', [
      'required' => 'Nama Belum Diisi..!!'
    ]);
    $this->form_validation->set_rules('nip', 'Nomor Induk Pegawai', 'required|trim|is_unique[admin.nip]', [
      
      'required' => 'Nomor Induk Pegawai belum diisi..!!',
      'is_unique' => 'Nomor Induk Pegawai sudah terdaftar..!!!'
    ]);
    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
      'min_length' => 'password Terlalu Pendek..!!'
    ]);
    if ($this->form_validation->run() == false) {
      $data['judul'] = 'Registrasi Admin';
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/registrasi', $data);
      $this->load->view('templates/footer', $data);
    } else {
      $cek = $this->db->query("SELECT id FROM admin ORDER BY id DESC LIMIT 1");
      $jumlah = $cek->num_rows();
      foreach($cek->result() as $ck){
        $nomor = $ck->id;
      }

      if($jumlah <> 0){
        $kode = intval($nomor)+1;
      } else {
        $kode = 1;
      }

      $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);

      $id = $kodemax;
      $data = [
        'id' => $id,
        'nama_admin' => $this->input->post('nama_admin', true),
        'nip' => htmlspecialchars($this->input->post('nip')),
        'password' => $this->input->post('password'),
        'is_active' => 2,
        'image' => 'default.jpg',
        'tgl_input' => date('Y-m-d H:i:s')
      ];
      $this->db->set('id',$id);
      $this->ModelAdmin->simpanData($data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! akun member anda sudah dibuat. Silahkan Aktivasi Akun anda</div>');
      redirect('admin');
    }
  }


  public function profile() {
    if (!$this->session->userdata('nip')) {
      redirect('home');
    }
    $user = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();
      $data = [
        'judul' => 'halaman profile',
        'id' => $user['id'],
        'nama_admin' => $user['nama_admin'],
        'nip' => $user['nip'],
        'tgl_input' => $user['tgl_input'],
        'image' => $user['image'],
        'alamat' => $user['alamat']
      ];

	
	$this->load->view('dashboard/header', $data);
  $this->load->view('templates/sidebar', $data);
  $this->load->view('admin/templates/profile', $data);
  $this->load->view('templates/footer', $data);
  }

  public function ubahProfil()
    {
      $data['judul'] = 'Ubah Profil';
      $data['user'] = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();
      $this->form_validation->set_rules('nama_admin', 'Nama Lengkap', 'required|trim', [
        'required' => 'Nama tidak Boleh Kosong'
      ]);
      $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
        'required' => 'Alamat tidak Boleh Kosong'
      ]);
      if ($this->form_validation->run() == false) {
        $this->load->view('dashboard/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/templates/ubah_profile', $data);
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
        redirect('admin/profile');
      }
    }


  public function logout()
  {
    $this->session->unset_userdata('nip');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda telah logout!!</div>');
    redirect('admin');
  }
}