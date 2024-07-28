<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Autentifikasi extends CI_Controller
{


  function __construct()
  {
    parent::__construct();
    $this->load->library('session');
    $this->load->model(['ModelAdmin', 'ModelBooking', 'ModelMenu']);
  }

  public function index()
  {
    $data['judul'] = 'Beranda';

    $this->load->view('templates/header', $data);
    $this->load->view('dashboard/index', $data);
    $this->load->view('templates/templates_user/modal', $data);
    $this->load->view('templates/footer', $data);
  }
}
