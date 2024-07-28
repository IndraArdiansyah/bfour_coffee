<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');
date_default_timezone_set('Asia/Jakarta');

class user extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->library('TripayPayment');
    $this->load->helper('form');
    $this->load->model(['ModelAdmin', 'ModelMenu', 'ModelBooking']);
  }
  public function index()
  {
    $id = ['bo.nip' => $this->uri->segment(3)];
    $id_admin = $this->session->userdata('nip');
    $user = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();
    $kategori = $this->ModelMenu->getKategori()->result_array();
    $data['sum_total'] = $this->ModelBooking->get_sum();
    $data['addons'] = $this->ModelMenu->get_addons(7);

    foreach ($user as $a) {
      $data = [
        'image' => $user['image'],
        'user' => $user['nama_admin'],
        'nip' => $user['nip'],
        'tanggal_input' => $user['tgl_input'],
        'kategori' => $kategori,
        'addons' => $this->ModelMenu->get_addons(7),
      ];
    }

    $dtb = $this->ModelBooking->showtemp(['nip' => $id_admin])->num_rows();
    if ($dtb < 1) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-massage alert-danger" role="alert"> Tidak Ada Menu dikeranjang</div>');
      redirect(base_url('customer'));
    } else {
      $data['sum_total'] = $this->ModelBooking->get_sum();
      $data['temp'] = $this->ModelBooking->get_menu_by_temp($id_admin);
      // $data['temp'] = $this->db->query("select image, nama_menu, harga, jumlah, total, id_menu from temp where nip='$id_admin'")->result_array();
    }
    $data['judul'] = "Data Booking";

    $this->load->view('dashboard/header_member', $data);
    $this->load->view('customer/data_booking', $data);
    $this->load->view('customer/sidebar_customer', $data);
    $this->load->view('templates/templates_user/modal', $data);
    $this->load->view('templates/footer', $data);
  }

  public function add()
  {
    $this->session->userdata('nama_admin');
    $user = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();
    $id_menu = $this->input->get('filter');

    $data = [
      'nip' => $this->session->userdata('nip'),
      'id_menu' => $this->input->post('id_menu', true),
      // 'nama_menu' => $this->input->post('nama_menu', true),
      // 'image' => $this->input->post('image', true),
      'harga' => $this->input->post('harga', true),
      'jumlah' => $this->input->post('jumlah', true),
      'total' => $this->input->post('Total', true),
      // 'tgl_pesan' => date('Y-m-d H:i:s'),
    ];

    $temp = $this->ModelBooking->getDataWhere('temp', ['id_menu' => $id_menu])->num_rows();

    if ($temp > 0) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Menu ini sudah ada booking.</div>');
      redirect(base_url('customer'));
    }
    $this->ModelBooking->createTemp();
    $this->ModelBooking->insertData('temp', $data);

    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Menu berhasil ditambahkan ke keranjang .</div>');
    redirect(base_url('customer'));
  }

  public function tambahBooking()
  {
    $this->session->userdata('nama_admin');
    $user = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();
    $id_menu = $this->input->get('filter');

    $d = $this->db->query("SELECT * FROM menu WHERE id_menu = '$id_menu'")->row();


    $isi = [
      'tgl_pesan' => date('Y-m-d H:i:s'),
      'nip' => $this->session->userdata('nip'),
      'nama_admin' => $user['nama_admin'],
      'id_menu' => $id_menu,
      'nama_menu' => $d->nama_menu,
      'image' => $d->image,
      'harga' => $d->harga,
    ];

    $temp = $this->ModelBooking->getDataWhere('temp', ['id_menu' => $id_menu])->num_rows();
    $nip = $this->session->userdata('nip');

    if ($temp > 0) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Menu ini sudah ada booking.</div>');
      redirect(base_url('customer'));
    }

    $this->ModelBooking->createTemp();
    $this->ModelBooking->insertData('temp', $isi);

    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Menu berhasil ditambahkan ke keranjang .</div>');
    redirect(base_url('customer'));
  }



  public function keranjang()
  {
    $this->session->userdata('nama_admin');
    $user = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();

    $data = array(
      'user' => $user['nama_admin'],
      'judul' => 'Keranjang',
    );

    $menu = $this->input->get('filter');
    $data['menu']  = $this->ModelMenu->get_where($menu);
    $data['kategori'] = $this->ModelMenu->getKategori()->result_array();

    $this->load->view('dashboard/header_member', $data);
    $this->load->view('customer/keranjang', $data);
    $this->load->view('customer/sidebar_customer', $data);
    $this->load->view('templates/templates_user/modal', $data);
    $this->load->view('templates/footer', $data);
  }

  public function hapusBooking()
  {
    $id_menu = $this->uri->segment(3);
    $nip = $this->session->userdata('nip');

    $this->ModelBooking->deleteData(['id_menu' => $id_menu], 'temp');
    $kosong = $this->db->query("SELECT * FROM temp WHERE nip = '$nip'")->num_rows();

    if ($kosong < 1) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-message alert-danger" role="alert">Tidak ada menu dikeranjang</div>');
      redirect(base_url('customer'));
    } else {
      redirect(base_url('user'));
    }
  }

  public function detailbooking()
  {
    $this->session->userdata('nama_admin');
    $user = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();

    $data = array(
      'user' => $user['nama_admin'],
      'judul' => 'Detail Booking',
    );

    $menu = $this->input->get('filter');
    $data['menu']  = $this->ModelMenu->get_where($menu);
    $data['kategori'] = $this->ModelMenu->getKategori()->result_array();

    $this->load->view('dashboard/header_member', $data);
    $this->load->view('customer/detail_booking', $data);
    $this->load->view('customer/sidebar_customer', $data);
    $this->load->view('templates/templates_user/modal', $data);
    $this->load->view('templates/footer', $data);
  }

  public function selesai()
  {
    $id_admin = $this->session->userdata('nip');
    $id_menu = $this->input->post('id_menu');
    $user = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();


    $data = array(
      'user'  => $user['nama_admin'],
      'judul' => 'Pembayaran',
    );
    $data['kategori'] = $this->ModelMenu->getKategori()->result_array();
    $data['sum_total'] = $this->ModelBooking->get_sum();
    $data['temp'] = $this->ModelBooking->getBooking($id_admin);

    $this->load->view('dashboard/header_member', $data);
    $this->load->view('customer/bayar', $data);
    $this->load->view('customer/sidebar_customer', $data);
    $this->load->view('templates/templates_user/modal', $data);
    $this->load->view('templates/footer', $data);
  }

  public function bayar()
  {
    $data['sum_total'] = $this->ModelBooking->get_sum();
    echo json_encode($data);
  }

  public function exportToPdf()
  {
    $id_admin = $this->session->userdata('nip');
    $user = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();
    $data['user'] = $user['nama_admin'];
    $data['judul'] = "Struk Booking";

    $this->form_validation->set_rules('nama_cust', 'Nama Customer', 'required', [
      'required' => 'Nama Belum diisi!'
    ]);
    $this->form_validation->set_rules('phone', 'Phone Customer', 'required', [
      'required' => 'Phone Belum diisi!'
    ]);

    if ($this->form_validation->run() == FALSE) {
      // Handling jika validasi gagal
      $this->session->set_flashdata('message_err', 'Validasi Gagal!');
      redirect(base_url('member'));
    } else {
      // Mendapatkan semua menu yang dipesan
      $menu = $this->ModelBooking->getBooking($id_admin);
      $idbooking = $this->ModelBooking->kodeOtomatis('orders', 'id_booking');

      // Array untuk menyimpan order_items
      $data['order_items'] = [];

      foreach ($menu as $datamenu) {
        // Menyiapkan data untuk order_items
        $order_item = [
          'name' => $datamenu['nama_menu'],
          'price' => $datamenu['harga'], // Harga per item
          'quantity' => $datamenu['jumlah'],
          'subtotal' => $this->ModelBooking->get_sum(), // Subtotal per item
        ];

        // Menambahkan order_item ke dalam array order_items
        $data['order_items'][] = $order_item;

        // Menyiapkan data untuk tabel 'orders'
        $dataOrder = [
          'id_booking' => $idbooking,
          'nip' => $this->session->userdata('nip'),
          'id_menu' => $datamenu['id_menu'],
          'harga' => $datamenu['harga'],
          'jumlah' => $datamenu['jumlah'],
          'total' => $this->ModelBooking->get_sum(),
          'tgl_booking' => date('Y-m-d H:i:s'),
          'metode_pembayaran' => 'Qris',
          'status' => 'unpaid',
          'nama_cust' => $this->input->post('nama_cust'),
        ];

        // Memasukkan data ke dalam tabel 'orders'
        $this->ModelBooking->insertData('orders', $dataOrder);
      }

      // Set parameter untuk pembayaran Tripay (QRIS)
      $callback = '1';
      $code = 'T33079';
      $api = 'https://tripay.co.id/api-sandbox/';
      $key = 'DEV-cVvZ6C9VhbUzvUrREzXSrokVD2qWkZnP5enPU383';
      $private = 'NhM8Q-NkAVO-QvrRk-hMtkP-PfG06';
      $tripay = new TripayPayment($api, $code, $key, $private, $callback);
      $signature = hash_hmac('sha256', $code . $dataOrder['id_booking'] . $dataOrder['total'], $private);

      // Menyiapkan parameter untuk Tripay
      $tripay->set_params([
        'method' => 'QRIS',
        'merchant_ref' => $idbooking,
        'amount' => $dataOrder['total'],
        'customer_name' => $dataOrder['nama_cust'],
        'customer_email' => 'random' . '@gmail.com',
        'customer_phone' => '00000000000',
        'order_items' => $data['order_items'], // Menggunakan order_items yang sudah disiapkan
        'expired_time' => (time() + (24 * 60 * 60)), // 24 jam
        'signature' => $signature,
      ]);

      // Membuat transaksi di Tripay
      $result = $tripay->createTransaction();
      $result = json_decode($result);

      // Handling hasil dari Tripay
      if ($result->success === true) {
        $paymentUrl = null;
        $qr_url = null;
        if (!empty($result->data->pay_code)) {
          $note = $result->data->pay_code;
        } elseif (!empty($result->data->pay_url)) {
          $paymentUrl = $result->data->pay_url;
        } elseif (!empty($result->data->qr_url)) {
          $qr_url = $result->data->qr_url;
        }
        $getdata = $tripay->getChannels($result->data->payment_method);
        $ress = json_decode($getdata);
        $mix['data'] = $data['order_items']; // Memasukkan order_items ke dalam view
        $mix['tripay'] = $result;
        $mix['payment'] = $ress;
        $mix['total_amount'] = $dataOrder['total'];
        $update = $this->ModelBooking->kosongkanData('temp');

        if ($update == true) {
          if (!empty($qr_url)) {
            $this->load->view('booking/payment', $mix);
          } else {
            $this->load->view('booking/payment', $mix);
          }
        } else {
          $this->session->set_flashdata('message_err', 'Error System');
          redirect(base_url('member'));
        }
      } else {
        var_dump($result->message, true);
      }
    }
  }


  public function struk($isiBooking)
  {
    $user = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();
    if (!$user) {
      $this->session->set_flashdata('message_err', 'Data user tidak ditemukan');
      redirect(base_url('customer'));
      return;
    }

    $data['user'] = $user['nama_admin'];
    $data['judul'] = "Struk Pengunjung";

    $orders = $this->ModelBooking->getOrdersByidbook($isiBooking)->result_array();
    if (!$orders) {
      $this->session->set_flashdata('message_err', 'Data orders tidak ditemukan');
      redirect(base_url('customer'));
      return;
    }
    $data['orders'] = $orders;

    $booking_info = $this->ModelBooking->getBookingInfo($isiBooking);
    if (!$booking_info) {

      $this->session->set_flashdata('message_err', 'Data booking tidak ditemukan');
      redirect(base_url('customer'));
      return;
    }
    $data['tgl_booking'] = $booking_info['tgl_booking'];
    $data['nama_cust'] = $booking_info['nama_cust'];
    $data['grand_total'] = $booking_info['total'];
    $data['id_booking'] = $booking_info['id_booking'];


    $this->load->library('pdf');
    $this->load->view('customer/struk', $data);

    $filename = "struk-booking.pdf";
    $paper_size = 'A4';
    $orientation = 'portrait';
    $html = $this->output->get_output();

    $this->pdf->load($html, $filename, $paper_size, $orientation);
  }

  public function Qris($isiBooking)
  {
    $user = $this->ModelAdmin->cekData(['nip' => $this->session->userdata('nip')])->row_array();
    $data['user'] = $user['nama_admin'];
    $data['judul'] = "Struk Booking";


    $booking_info = $this->ModelBooking->getInfo($isiBooking);

    if (!$booking_info) {

      $this->session->set_flashdata('message_err', 'Data booking tidak ditemukan');
      redirect(base_url('customer'));
      return;
    }

    $data['tgl_booking'] = $booking_info['tgl_booking'];
    $data['nama_cust'] = $booking_info['nama_cust'];
    $data['grand_total'] = $booking_info['total'];

    $items = $this->ModelBooking->getBookingItems($isiBooking);


    $data['order_items'] = [];

    foreach ($items as $datamenu) {

      $order_item = [
        'name' => $datamenu['nama_menu'],
        'price' => $datamenu['harga'],
        'quantity' => $datamenu['jumlah'],
        'amount' => $datamenu['total'],
      ];

      $data['order_items'][] = $order_item;
    }

    $callback = '1';
    $code = 'T33079';
    $api = 'https://tripay.co.id/api-sandbox/';
    $key = 'DEV-cVvZ6C9VhbUzvUrREzXSrokVD2qWkZnP5enPU383';
    $private = 'NhM8Q-NkAVO-QvrRk-hMtkP-PfG06';
    $tripay = new TripayPayment($api, $code, $key, $private, $callback);
    $signature = hash_hmac('sha256', $code . $booking_info['id_booking'] . $booking_info['total'], $private);

    $tripay->set_params([
      'method' => 'QRIS',
      'merchant_ref' => $booking_info['id_booking'],
      'amount' => $booking_info['total'],
      'customer_name' => $booking_info['nama_cust'],
      'customer_email' => 'random' . '@gmail.com',
      'customer_phone' => '00000000000',
      'order_items' => $data['order_items'],
      'expired_time' => (time() + (24 * 60 * 60)),
      'signature' => $signature,
    ]);


    $result = $tripay->createTransaction();
    $result = json_decode($result);

    if ($result->success === true) {
      $paymentUrl = null;
      $qr_url = null;
      if (!empty($result->data->pay_code)) {
        $note = $result->data->pay_code;
      } elseif (!empty($result->data->pay_url)) {
        $paymentUrl = $result->data->pay_url;
      } elseif (!empty($result->data->qr_url)) {
        $qr_url = $result->data->qr_url;
      }
      $getdata = $tripay->getChannels($result->data->payment_method);
      $ress = json_decode($getdata);
      $mix['data'] = $data['order_items'];
      $mix['tripay'] = $result;
      $mix['payment'] = $ress;
      $mix['total_amount'] = $booking_info['total'];

      if (!empty($qr_url)) {
        $this->load->view('booking/payment', $mix);
      } else {
        $this->load->view('booking/payment', $mix);
      }
    } else {
      var_dump($result->message, true);
    }
  }
}
