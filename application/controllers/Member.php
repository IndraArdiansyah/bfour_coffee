<?php
defined('BASEPATH') or exit('No Direct script access allowed');

class Member extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->helper('form');
  }

  public function index()
  {
    $this->_login();
  }
  private function _login()
  {
    $nik = htmlspecialchars($this->input->post('nik', true));
    $password = $this->input->post('password', true);

    $user = $this->ModelUser->cekData(['nik' => $nik])->row_array();

    //jika usernya ada
    if ($user) {
      // jika user sudah aktif
      if (password_verify($password, $user['password'])) {
        $data = [
          'nik' => $user['nik'],
          'nama' => $user['nama'],
          'umur' => $user['umur']
        ];
        $this->session->set_userdata($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda Berhasil Login!</div>');
        redirect('autentifikasi/pilihPoli');
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password Salah!!!</div>');
        redirect('member');
      }
    } else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email tidak terdaftar</div>');
      redirect('member');
    }
  }
  public function daftar()
  {
    // Form Validation NIK
    $this->form_validation->set_rules('nik', 'Nomor Identitas Penduduk', 'required', [
      'required' => 'NIK Belum diisi!'
    ]);
        // Form Validation Nama
    $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', [
      'required' => 'Nama Belum diisi!'
    ]);
    // Form Validation Alamat
    $this->form_validation->set_rules('alamat', 'Alamat Lengkap', 'required', [
      'required' => 'Alamat Belum diisi!'
    ]);
    $this->form_validation->set_rules('umur', 'Umur', 'required', [
      'required' => 'Umur Belum diisi!'
    ]);
    $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required', [
      'required' => 'Nomor Telepon Belum diisi!'
    ]);
    if (!$this->form_validation->run() == false) {
      $data = [
        'nik' => htmlspecialchars($this->input->post('nik', true)),
        'nama' => $this->input->post('nama', true),
        'alamat' => $this->input->post('alamat', true),
        'umur' => $this->input->post('umur', true),
        'no_telp' => $this->input->post('no_telp', true),
      ];
    }
    $this->ModelUser->simpanData($data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! akun pasien anda sudah dibuat.</div>');
    redirect(base_url('autentifikasi/pilihPoli'));
  }

}