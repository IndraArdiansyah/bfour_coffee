<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autentifikasi extends CI_Controller {


	function __construct(){
		parent::__construct();
    $this->load->model(['ModelUser', 'ModelAntrian']);
	}
  public function index()
  {
    $data = ['judul' => 'Dashboard'];
		
		$this->load->view('templates/header', $data);
		$this->load->view('dashboard/index', $data);
    $this->load->view('templates/templates_user/modal', $data);
		$this->load->view('templates/footer', $data);
    }
  
  // public function pilihPoli () {
  //   $data = ['judul' => 'Pilih Poli'];
  //   $nama = $this->input->post('nama', true);
  //   $user = $this->ModelUser->cekData(['nama' => $this->session->userdata('nama')])->row_array();
  //   $data['user'] = $user['nama'];
    
  //   $this->load->view('templates/header', $data);
	// 	$this->load->view('dashboard/pilih_poli', $data);
	// 	$this->load->view('templates/footer', $data);
  // }

  public function pilihPoli(){
    if ($this->session->userdata('nik')) {
      redirect('autentifikasi');
      }
      $this->form_validation->set_rules('nik', 'Nomor Induk Penduduk', 'required|trim', [
        'required' => 'NIK Harus Diisi..!!'
      ]);
      $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
        'required' => 'Nama Harus Diisi..!!'
      ]);
      $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
        'required' => 'Alamat Harus Diisi..!!'
      ]);
      $this->form_validation->set_rules('umur', 'Umur', 'required|trim', [
        'required' => 'Umur Harus Diisi..!!'
      ]);
      $this->form_validation->set_rules('no_telp', 'No Telepon', 'required|trim', [
        'required' => 'No Telepon Harus Diisi..!!'
      ]);
      if ($this->form_validation->run() == FALSE) {
        $user = $this->ModelUser->cekData(['nik' => $this->session->userdata('nik')])->row_array();
        $data['judul'] = 'Pilih Poli';
        $data['user'] = $user['nama'];
        
        $this->load->view('templates/header', $data);
		    $this->load->view('dashboard/pilih_poli', $data);
		    $this->load->view('templates/footer', $data);
      } else {
        $data['judul'] = 'Pilih Poli';
        $data['user'] = 'Pengunjung';
        
        $this->load->view('templates/header', $data);
		    $this->load->view('dashboard/pilih_poli', $data);
		    $this->load->view('templates/footer', $data);
        }
    }

  public function get_antri(){
		$id_loket = $this->input->post('id_loket');
		$antri = $this->M_crud->get_max_id('transaksi', 'no_antrian', array('id_loket' => $id_loket, 'tgl' => date('dmY')))->row('no_antrian');
		if($antri > 0){
			echo $antri;
		}
		else{
			echo "&nbsp;";
		}
	}

  public function antrian(){
    $user = $this->ModelUser->cekData(['nama' => $this->session->userdata('nama')])->row_array();
    $data = [
      'tgl_antrian' => date('Y-m-d H:i:s'),
      'poli' => $this->ModelAntrian->proses($this->input->post('poli'))
    ];
    $this->ModelAntrian->simpanData($data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! akun anggota anda sudah dibuat.</div>');
    redirect(base_url('autentifikasi/nomorAntrian'));
  }

  public function tambahAntrian()
  {
    $id_buku = $this->uri->segment(3);

    //memilih data buku yang untuk dimasukan ke tabel temp/keranjang melalui variabel $isi
    $d = $this->db->query("SELECT * FROM antrian WHERE id_antrian = '$id_antrian'")->row();

    //berupa data2 yang akan disimpan kedalam tabel temp/keranjang

    $isi = [
    'id_antrian' => $d->id_antrian,
    'tgl_antrian' =>  date('Y-m-d H:i:s'),
    'poli' => $d->Poli
    ];

    //cek apakah buku yang diklik booking sudah ada dikeranjang

    $temp = $this->ModelPoli->getDataWhere('temp', ['id_antrian' => $id_antrian])->num_rows();
    $userid = $this->session->userdata('id_user');

    //cek jika sudah memasukan 3 buku untuk dibooking dalam keranjang
    // $tempuser = $this->db->query("SELECT * FROM temp WHERE id_user='$userid'")->num_rows();

    //cek jika masih ada booking buku yang belum diambil
    // $databooking = $this->db->query("SELECT * FROM booking WHERE id_user = '$userid'")->num_rows();

    // if ($databooking > 0) {
    //   $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role"alert">Masih ada booking buku sebelumnya yang belum diambil.<br>Ambil buku yang dibooking atau tunggu 1x24 jam untuk bisa dibooking kembali </div>');
    //   redirect(base_url());
    // }

    // //jika buku yang diklik booking sudah ada di keranjang

    // if ($temp > 0) {
    //   $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Buku ini sudah ada booking.</div>');
    //   redirect(base_url() . 'home');
    // }

    // //jika buku yang akan dibooking sudah mencapai 3 item
    // if ($tempuser == 3) {
    //   $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Booking buku tidak boleh lebih dari 3 .</div>');
    //   redirect(base_url() . 'home');
    // }
    //membuat tabel temp jika belum ada
    $this->ModelPoli->createTemp();
    $this->ModelPoli->insertData('temp', $isi);

    //pesan ketika berhasil memasukkan buku ke keranjang
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Buku berhasil ditambahkan ke keranjang .</div>');
    redirect(base_url() . 'autentifikasi/antrian_poli');
  }

  public function nomorAntrian()
  {
    $where = $this->session->userdata('id_user');
    $data['user'] = $this->session->userdata('nama');
    $data['judul'] = 'Nomor Antrian';
    $data['useraktif'] = $this->ModelUser->cekData(['id' => $this->session->userdata('id_user')])->result();
    $data['items'] = $this->db->query("SELECT * FROM antrian a JOIN antrian_poli ap ON ap.id_antrian = a.id_antrian JOIN user u ON u.id = ap.id_pasien WHERE ap.id_pasien = '$where'")->result_array();

    $this->load->view('templates/header', $data);
		$this->load->view('dashboard/nomor_antrian', $data);
		$this->load->view('templates/footer');
    
  }
  public function logout()
  {
      $this->session->unset_userdata('nama');
      $this->session->unset_userdata('nik');

      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda telah logout!!</div>');
      redirect('autentifikasi');
  }


}