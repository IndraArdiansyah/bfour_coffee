<?php
defined('BASEPATH') or exit('No Direct script access allowed');
class Laporan extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->library('pdf');
    $this->load->model(['ModelBooking', 'ModelAdmin', 'ModelMenu']);
  }


  public function print_kategori()
  {
    $data['judul']        = "Print Kategori";
    $data['row']          = $this->ModelMenu->getKategori()->result_array();
    $data['id_kategori']  = $this->ModelMenu->getWherekategori('id');

    $this->load->view('laporan/laporan_kategori/laporan_kategori_print.php', $data);
  }

  public function kategori_pdf()
  {
    $user           = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();
    $data['user']   = $user['nama_admin'];
    $data['judul']  = "PDF Kategori";
    $this->db->order_by('id', 'ASC');

    $data['row']         = $this->db->get('kategori')->result_array();
    $data['kategori']    = $this->ModelMenu->getKategori()->result_array();

    $this->load->library('pdf');
    $this->load->view('laporan/laporan_kategori/laporan_kategori_pdf.php', $data);

    $filename     = "cetak-kategori.pdf";
    $paper_size   = 'A4'; // ukuran kertas
    $orientation  = 'potrait'; //tipe format kertas potrait atau landscape
    $html         = $this->output->get_output();
    $this->pdf->load($html, $filename, $paper_size, $orientation);
  }

  public function kategori_excel()
  {
    $data = array('title' => 'Laporan Kategori Excel', 'kategori' => $this->ModelMenu->getKategori()->result_array());

    $this->load->view('laporan/laporan_kategori/laporan_kategori_excel.php', $data);
  }

  public function print_menu()
  {
    $data['judul']    = "Print Menu";
    $data['row']      = $this->ModelMenu->getMenu()->result_array();
    $data['id_menu']  = $this->ModelMenu->getWhere('id_menu');
    $data['kategori'] = $this->ModelMenu->getKategori()->result_array();

    $this->load->view('laporan/laporan_menu/laporan_menu_print.php', $data);
  }

  public function menu_pdf()
  {
    $user           = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();
    $data['user']   = $user['nama_admin'];
    $data['judul']  = "PDF Menu";
    $this->db->order_by('id_menu', 'ASC');

    $data['row']         = $this->db->get('menu')->result_array();
    $data['kategori']    = $this->ModelMenu->getKategori()->result_array();

    $this->load->library('pdf');
    $this->load->view('laporan/laporan_menu/laporan_menu_pdf.php', $data);

    $filename     = "cetak-menu.pdf";
    $paper_size   = 'A4'; // ukuran kertas
    $orientation  = 'potrait'; //tipe format kertas potrait atau landscape
    $html         = $this->output->get_output();
    $this->pdf->load($html, $filename, $paper_size, $orientation);
  }

  public function menu_excel()
  {
    $data = array('title' => 'Laporan Menu Excel', 'menu' => $this->ModelMenu->getMenu()->result_array());
    $data['kategori']     = $this->ModelMenu->getKategori()->result_array();
    $this->load->view('laporan/laporan_menu/laporan_menu_excel.php', $data);
  }

  public function print_admin()
  {
    $data['judul'] = "Print Admin";
    $data['row']   = $this->ModelAdmin->getadmin()->result_array();
    $data['id']    = $this->ModelAdmin->getWhere('id');

    $this->load->view('laporan/laporan_admin/laporan_admin_print.php', $data);
  }

  public function admin_pdf()
  {
    $user           = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();
    $data['user']   = $user['nama_admin'];
    $data['judul']  = "PDF Admin";
    $this->db->order_by('id', 'ASC');

    $data['row']    = $this->db->get('admin')->result_array();

    $this->load->library('pdf');
    $this->load->view('laporan/laporan_admin/laporan_admin_pdf.php', $data);

    $filename    = "cetak-admin.pdf";
    $paper_size  = 'A4'; // ukuran kertas
    $orientation = 'landscape'; //tipe format kertas potrait atau landscape
    $html        = $this->output->get_output();
    $this->pdf->load($html, $filename, $paper_size, $orientation);
  }

  public function admin_excel()
  {
    $data = array('title' => 'Laporan Admin Excel', 'admin' => $this->ModelAdmin->getData()->result_array());
    $this->load->view('laporan/laporan_admin/laporan_admin_excel.php', $data);
  }

  public function pengunjung_print()
  {
    $data['judul'] = "Print Pengunjung";
    $data['row']   = $this->ModelBooking->getPengunjungData()->result_array();
    // $data['id']    = $this->ModelBooking->getWhereOrders('id_booking');

    $this->load->view('laporan/laporan_pengunjung/laporan_pengunjung_print.php', $data);
  }

  public function pengunjung_print_by_date()
  {
    $data['judul'] = "Print Pengunjung";

    $startDate = $this->input->post('start_date');
    $endDate = $this->input->post('end_date');

    if ($startDate && $endDate) {;
      $data['row'] = $this->ModelBooking->getOrdersByDateRange($startDate, $endDate);
      $this->load->view('laporan/laporan_pengunjung/laporan_pengunjung_print.php', $data);
    } else {
      $data['error'] = 'Tanggal tidak valid.';
      $this->load->view('laporan/laporan_pengunjung/laporan_pengunjung_print.php', $data);
    }
  }
  public function pengunjung_pdf()
  {
    $user           = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();
    $data['user']   = $user['nama_admin'];
    $data['judul']  = "PDF Pengunjung";

    $data['row']   = $this->ModelBooking->getPengunjungData()->result_array();

    $this->load->library('pdf');
    $this->load->view('laporan/laporan_pengunjung/laporan_pengunjung_pdf.php', $data);

    $filename    = "cetak-pengunjung.pdf";
    $paper_size  = 'A4'; // ukuran kertas
    $orientation = 'potrait'; //tipe format kertas potrait atau landscape
    $html        = $this->output->get_output();
    $this->pdf->load($html, $filename, $paper_size, $orientation);
  }
  public function pengunjung_pdf_by_date()
  {
    $data['judul'] = "Print Pengunjung";

    $startDate = $this->input->post('start_date');
    $endDate = $this->input->post('end_date');

    if ($startDate && $endDate) {
      $this->load->library('pdf');
      $data['row'] = $this->ModelBooking->getOrdersByDateRange($startDate, $endDate);

      $this->load->view('laporan/laporan_pengunjung/laporan_pengunjung_pdf', $data);

      $filename    = "cetak-pengunjung-" . date('Ymd') . ".pdf";
      $paper_size  = 'A4'; // ukuran kertas
      $orientation = 'potrait'; //tipe format kertas potrait atau landscape
      $html        = $this->output->get_output();
      $this->pdf->load($html, $filename, $paper_size, $orientation);
    } else {
      $data['error'] = 'Tanggal tidak valid.';

      $this->load->library('pdf');
      $this->load->view('laporan/laporan_pengunjung/laporan_pengunjung_pdf', $data);

      $filename    = "cetak-pengunjung-" . date('Ymd') . ".pdf";
      $paper_size  = 'A4'; // ukuran kertas
      $orientation = 'potrait'; //tipe format kertas potrait atau landscape
      $html        = $this->output->get_output();
      $this->pdf->load($html, $filename, $paper_size, $orientation);
    }
  }


  public function pengunjung_excel()
  {
    $data = array('title' => 'Laporan Pengunjung Excel', 'pengunjung' => $this->ModelBooking->getPengunjungData()->result_array());
    $this->load->view('laporan/laporan_pengunjung/laporan_pengunjung_excel.php', $data);
  }

  public function pengunjung_excel_by_date()
  {
    $data['judul'] = "Excel Pengunjung";

    $startDate = $this->input->post('start_date');
    $endDate = $this->input->post('end_date');

    if ($startDate && $endDate) {;
      $data = array('title' => 'Laporan Pengunjung Excel', 'pengunjung' => $this->ModelBooking->getOrdersByDateRange($startDate, $endDate));
      // $data['pengunjung'] = $this->ModelBooking->getOrdersByDateRange($startDate, $endDate);
      $this->load->view('laporan/laporan_pengunjung/laporan_pengunjung_excel.php', $data);
    } else {
      $data['error'] = 'Tanggal tidak valid.';
      $data = array('title' => 'Laporan Pengunjung Excel', 'pengunjung' => $this->ModelBooking->getOrdersByDateRange($startDate, $endDate));
    }
  }





  public function print_antrian_poli()
  {
    $data['judul'] = "Print Antrian Poli";
    $data['row'] = $this->ModelAntrian->getAntrian()->result_array();
    $data['id_poli'] = $this->ModelPoli->getWhere('id_poli');

    $tanggalawal = $this->input->post('tanggalawal');
    $tanggalakhir = $this->input->post('tanggalakhir');
    $nilaifilter = $this->input->post('nilaifilter');

    if ($nilaifilter == 1) {

      $data['row'] = $this->ModelAntrian->filterbytanggal($tanggalawal, $tanggalakhir);
      $this->load->view('laporan/laporan_antrian/laporan_antrian_print.php', $data);
    } else {
      $this->db->order_by('id_poli', 'DESC');
      $data['row'] = $this->db->get('antrian_poli')->result_array();
      $this->load->view('laporan/laporan_antrian/laporan_antrian_print2.php', $data);
    }
  }


  public function export_antrian_pdf()
  {
    $data['user'] = $this->session->userdata('nama');
    $data['judul'] = "PDF Antrian Poli";
    $user = $this->ModelAntrian->getWhere(['id_pasien' => $this->session->userdata('id_pasien')])->row_array();

    $tanggalawal = $this->input->post('tanggalawal');
    $tanggalakhir = $this->input->post('tanggalakhir');
    $nilaifilter = $this->input->post('nilaifilter');

    if ($nilaifilter == 1) {

      $data['row'] = $this->ModelAntrian->filterbytanggal($tanggalawal, $tanggalakhir);
      $this->load->library('pdf');
      $this->load->view('laporan/laporan_antrian/laporan_antrian_pdf2.php', $data);
    } else {
      $this->db->order_by('id_poli', 'DESC');
      $data['row'] = $this->db->get('antrian_poli')->result_array();
      $this->load->library('pdf');
      $this->load->view('laporan/laporan_antrian/laporan_antrian.pdf.php', $data);
    }



    $filename = "cetak-kategori-poli.pdf";

    $paper_size = 'A4'; // ukuran kertas
    $orientation = 'landscape'; //tipe format kertas potrait atau landscape
    $html = $this->output->get_output();
    $this->pdf->load($html, $filename, $paper_size, $orientation);
  }

  public function export_antrian_excel()
  {
    $tanggalawal = $this->input->post('tanggalawal');
    $tanggalakhir = $this->input->post('tanggalakhir');
    $nilaifilter = $this->input->post('nilaifilter');

    if ($nilaifilter == 1) {

      $data = array('title' => 'Laporan Pasien Excel', 'antrian_poli' => $this->ModelAntrian->filterbytanggal($tanggalawal, $tanggalakhir));
      $this->load->view('laporan/laporan_antrian/laporan_antrian_excel2.php', $data);
    } else {
      $data = array('title' => 'Laporan Antrian Poli Excel', 'antrian_poli' => $this->ModelAntrian->getAntrian()->result_array());
      $this->load->view('laporan/laporan_antrian/laporan_antrian_excel.php', $data);
    }
  }

  public function export_pasien_pdf()
  {
    $id_antrian = $this->session->userdata('nik');
    $data['user'] = $this->session->userdata('nama');
    $data['judul'] = "PDF Nomor Antrian";
    $user = $this->ModelUser->cekData(['nik' => $this->session->userdata('nik')])->row_array();

    $tanggalawal = $this->input->post('tanggalawal');
    $tanggalakhir = $this->input->post('tanggalakhir');
    $nilaifilter = $this->input->post('nilaifilter');

    if ($nilaifilter == 1) {

      $data['row'] = $this->ModelUser->filterbytanggal($tanggalawal, $tanggalakhir);
      $this->load->library('pdf');
      $this->load->view('laporan/laporan_pasien/laporan_pasien_pdf2.php', $data);
    } else {
      $data['row'] = $this->db->get('user')->result_array();
      $this->load->library('pdf');
      $this->load->view('laporan/laporan_pasien/laporan_pasien_pdf.php', $data);
    }



    $filename = "cetak-nomor-$id_antrian.pdf";

    $paper_size = 'A4'; // ukuran kertas
    $orientation = 'landscape'; //tipe format kertas potrait atau landscape
    $html = $this->output->get_output();
    $this->pdf->load($html, $filename, $paper_size, $orientation);
  }

  public function print_pasien()
  {
    $id_antrian = $this->session->userdata('nik');
    $data['user'] = $this->session->userdata('nama');
    $data['judul'] = "Print Nomor Antrian";
    $user = $this->ModelUser->cekData(['nik' => $this->session->userdata('nik')])->row_array();

    $tanggalawal = $this->input->post('tanggalawal');
    $tanggalakhir = $this->input->post('tanggalakhir');
    $nilaifilter = $this->input->post('nilaifilter');

    if ($nilaifilter == 1) {

      $data['row'] = $this->ModelUser->filterbytanggal($tanggalawal, $tanggalakhir);
      $this->load->view('laporan/laporan_pasien/laporan_pasien_print2.php', $data);
    } else {

      $data['row'] = $this->db->get('user')->result_array();
      $this->load->view('laporan/laporan_pasien/laporan_pasien_print.php', $data);
    }
  }

  public function export_pasien_excel()
  {
    $tanggalawal = $this->input->post('tanggalawal');
    $tanggalakhir = $this->input->post('tanggalakhir');
    $nilaifilter = $this->input->post('nilaifilter');

    if ($nilaifilter == 1) {

      $data = array('title' => 'Laporan Pasien Excel', 'user' => $this->ModelUser->filterbytanggal($tanggalawal, $tanggalakhir));
      $this->load->view('laporan/laporan_pasien/laporan_pasien_excel2.php', $data);
    } else {
      $data = array('title' => 'Laporan Pasien Excel', 'user' => $this->ModelUser->getUser()->result_array());
      $this->load->view('laporan/laporan_pasien/laporan_pasien_excel.php', $data);
    }
  }
}
