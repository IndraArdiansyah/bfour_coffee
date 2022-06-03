<?php

class Home extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model(['ModelAdmin','ModelUser']);
  }
  public function index()
  {
    $data['pasien'] = $this->ModelUser->getUserLimit()->result_array();
    $data = [
      'judul' => 'Dashboard',
    ];
    if ($this->session->userdata('nama_admin')) {
      $user = $this->ModelAdmin->cekData(['nama_admin' => $this->session->userdata('nama_admin')])->row_array();
      $data['pasien'] = $this->ModelUser->getUserLimit()->result_array();
      $data['user'] = $user['nama_admin'];
      $this->load->view('dashboard/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/index', $data);
      $this->load->view('templates/footer', $data);
    } else {
      $data['user'] = 'nama_admin';
      $this->load->view('dashboard/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/index', $data);
      $this->load->view('templates/footer', $data);
      }
  }

  public function logout()
    {
        $this->session->unset_userdata('nama_admin');
        $this->session->unset_userdata('nip');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda telah logout!!</div>');
        redirect('admin');
    }
}