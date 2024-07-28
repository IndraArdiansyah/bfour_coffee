<?php
defined('BASEPATH') or exit('No direct sript allowed');
class ModelBooking extends CI_Model
{
  public function getData($table)
  {
    return $this->db->get($table)->row();
  }
  public function getDataWhere($table, $where)
  {
    $this->db->where($where);
    return $this->db->get($table);
  }
  public function getOrderByLimit($table, $order, $limit)
  {
    $this->db->order_by($order, 'desc');
    $this->db->$limit($limit);
    return $this->db->get($table);
  }
  // public function simpanDetail($where = null)
  // {
  //   $sql = "INSERT INTO booking_detail (id_booking, id_menu)
  //           SELECT booking.id_booking, temp.id_menu
  //           FROM booking, temp
  //           WHERE temp.nip = booking.nip
  //             AND booking.nip = '$where'";
  //   $this->db->query($sql);
  // }
  public function insertData($table, $data)
  {
    $this->db->insert($table, $data);
  }
  public function updateData($table, $data, $where)
  {
    $this->db->update($table, $data, $where);
  }
  public function deleteData($where, $table)
  {
    $this->db->where($where);
    $this->db->delete($table);
  }
  public function find($where)
  {
    //Query mencari record berdasarkan ID-nya
    $this->db->limit(1);
    return $this->db->get('menu', $where);
  }
  public function kosongkanData($table)
  {
    return $this->db->truncate($table);
  }
  public function createTemp()
  {
    $this->db->query('CREATE TABLE IF NOT EXISTS temp(
      id_booking varchar(12),
      tgl_booking DATETIME,
      nip int)');
  }

  public function updateTemp($data = null, $where = null)
  {
    $this->db->update('temp', $data, $where);
  }
  public function updateBooking($data = null, $where = null)
  {
    $this->db->update('booking', $data, $where);
  }
  public function getBooking($id_admin)
  {
    $this->db->select('temp.*, menu.image, menu.nama_menu'); // Pilih kolom yang diperlukan
    $this->db->from('temp');
    $this->db->join('menu', 'temp.id_menu = menu.id_menu');
    $this->db->where('temp.nip', $id_admin);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function showTemp($where)
  {
    return $this->db->get('temp', $where);
  }


  public function Data($where = null)
  {
    return $this->db->get_where('temp', $where);
  }

  public function getOrders($where = null)
  {
    return $this->db->get_where('orders', $where);
  }

  public function getOrdersWithMenu($id_booking)
  {
    $this->db->select('orders.*, menu.nama_menu');
    $this->db->from('orders');
    $this->db->join('menu', 'orders.id_menu = menu.id_menu');
    $this->db->where('orders.id_booking', $id_booking);
    return $this->db->get()->result_array();
  }

  public function kodeOtomatis($table, $key)
  {
    $this->db->select('right(' . $key . ', 3) as kode', false);
    $this->db->order_by($key, 'desc');
    $this->db->limit(1);
    $query = $this->db->get($table);
    if ($query->num_rows() <> 0) {
      $data = $query->row();
      $kode = intval($data->kode) + 1;
    } else {
      $kode = 1;
    }
    $kodeMax = str_pad($kode, 3, "0", STR_PAD_LEFT);
    $kodeJadi = date('dmY') . $kodeMax;
    return $kodeJadi;
  }

  public function get_sum()
  {
    $sql = "SELECT sum(total) as grandtotal from temp";
    $result = $this->db->query($sql);
    return $result->row()->grandtotal;
  }

  public function getWhereOrders($where = null)
  {
    return $this->db->get_where('orders', $where);
  }

  public function countOrdersForDate($date = null)
  {
    // Jika tidak ada tanggal yang diberikan, gunakan tanggal hari ini
    if ($date === null) {
      $date = date('Y-m-d'); // Format tanggal sesuai dengan format di database
    }

    // Tambahkan kondisi tanggal dan status ke query
    $this->db->where('tgl_booking', $date); // Ganti 'tanggal' dengan nama kolom tanggal di tabel Anda
    $this->db->where('status', 'paid'); // Ganti 'status' dengan nama kolom status di tabel Anda
    $this->db->from('orders');

    // Menghitung jumlah baris
    return $this->db->count_all_results();
  }

  public function getPengunjung()
  {
    return $this->db->get('orders');
  }

  public function getPengunjungData()
  {
    $this->db->select('orders.*, menu.nama_menu');
    $this->db->from('orders');
    $this->db->join('menu', 'orders.id_menu = menu.id_menu');
    $this->db->where('orders.status', 'paid');
    $this->db->order_by('orders.tgl_booking', 'DESC');
    return $this->db->get();
    // return $query->result_array();
  }


  public function getPengunjungOrders($nip = null)
  {
    $this->db->select('orders.*, admin.nama_admin');
    $this->db->from('orders');
    $this->db->join('admin', 'orders.nip = admin.nip');
    $this->db->where('orders.nip', $nip);

    return $this->db->get();
  }


  public function getOrdersByNip($nip)
  {
    $this->db->from('orders');
    $this->db->where('nip', $nip);
    $this->db->order_by('id_booking', 'DESC'); // Mengurutkan berdasarkan kolom id_booking secara descending
    return $this->db->get();
  }



  public function getOrdersByidbook($idbook)
  {
    $this->db->select('orders.*, menu.nama_menu'); // Pilih kolom yang diperlukan dari orders dan nama_menu dari menu
    $this->db->from('orders');
    $this->db->join('menu', 'orders.id_menu = menu.id_menu', 'left'); // Join tabel menu dengan orders
    $this->db->where('orders.id_booking', $idbook);
    return $this->db->get();
  }


  public function getBookingInfo($id_booking)
  {
    $this->db->select('id_booking, tgl_booking, nama_cust, total');
    $this->db->from('orders'); // Gantilah 'orders' dengan nama tabel sesuai aplikasi Anda
    $this->db->where('id_booking', $id_booking);
    $query = $this->db->get();

    return $query->row_array();
  }


  public function getInfo($isiBooking)
  {
    $this->db->select('*');
    $this->db->from('orders');
    $this->db->where('id_booking', $isiBooking);
    $query = $this->db->get();
    return $query->row_array();
  }

  public function getBookingItems($isiBooking)
  {
    $this->db->select('orders.*, menu.nama_menu');
    $this->db->from('orders');
    $this->db->join('menu', 'orders.id_menu = menu.id_menu', 'left');
    $this->db->where('orders.id_booking', $isiBooking);
    $query = $this->db->get();
    return $query->result_array();
  }





  public function countAllPengunjung()
  {
    return $this->db->get('orders')->num_rows();
  }

  public function getdatapengunjung($limit, $start)
  {
    $this->db->select('orders.*, menu.nama_menu');
    $this->db->from('orders');
    $this->db->join('menu', 'orders.id_menu = menu.id_menu');
    $this->db->order_by('orders.id_booking', 'DESC');
    $this->db->limit($limit, $start);
    return $this->db->get()->result_array();
  }



  public function getOrdersDataNip($nip)
  {
    $this->db->select('orders.*');
    $this->db->from('orders');
    $this->db->join('admin', 'admin.nip = orders.nip', 'inner');
    $this->db->where('admin.nip', $nip);
    $query = $this->db->get();
    return $query->num_rows();
  }


  public function getOrdersCountByDate($status)
  {
    $this->db->select('tgl_booking, COUNT(*) as total');
    $this->db->from('orders');
    $this->db->where('status', $status);
    $this->db->group_by('tgl_booking');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getPengunjungByDate($tanggal)
  {
    $this->db->select('*');
    $this->db->from('orders');
    $this->db->where('tgl_booking', $tanggal); // Sesuaikan dengan nama kolom tanggal di tabel orders
    $query = $this->db->get();
    return $query;
  }

  public function getOrdersByDateRange($startDate, $endDate)
  {
    $this->db->select('orders.*, menu.nama_menu');
    $this->db->from('orders');
    $this->db->join('menu', 'orders.id_menu = menu.id_menu');
    $this->db->where('tgl_booking >=', $startDate);
    $this->db->where('tgl_booking <=', $endDate);
    $this->db->where('status', 'paid');
    $this->db->order_by('tgl_booking', 'DESC');

    return $this->db->get()->result_array();
  }


  public function getOrdersWithAdminActive2($status)
  {
    $this->db->select('orders.tgl_booking, COUNT(orders.id_orders) as total');
    $this->db->from('orders');
    $this->db->where('status', $status);
    $this->db->join('admin', 'admin.nip = orders.nip');
    $this->db->where('admin.is_active', 2);
    $this->db->group_by('orders.tgl_booking');
    return $this->db->get()->result_array();
  }

  public function getOrdersWithAdminActive0($status)
  {
    $this->db->select('orders.tgl_booking, COUNT(orders.id_orders) as total');
    $this->db->from('orders');
    $this->db->where('status', $status);
    $this->db->join('admin', 'admin.nip = orders.nip');
    $this->db->where('admin.is_active', 0);
    $this->db->group_by('orders.tgl_booking');
    return $this->db->get()->result_array();
  }

  public function hapusPengunjung($where = null)
  {
    $this->db->delete('orders', $where);
    // return $this->db->get_where('orders', ['id_booking' => $id_booking])->result_array();
  }

  public function getdatapengunjungbynip($nip, $limit, $start)
  {
    $this->db->select('orders.*, admin.nama_admin, menu.nama_menu'); // Memilih semua kolom dari orders, kolom nama_admin dari admin, dan kolom nama_menu dari menu
    $this->db->from('orders');
    $this->db->join('admin', 'orders.nip = admin.nip'); // Menggabungkan tabel orders dengan tabel admin
    $this->db->join('menu', 'orders.id_menu = menu.id_menu'); // Menggabungkan tabel orders dengan tabel menu
    $this->db->where('orders.nip', $nip); // Memfilter berdasarkan nip
    $this->db->order_by('orders.id_booking', 'DESC'); // Urutkan berdasarkan id_booking secara descending
    $this->db->limit($limit, $start); // Membatasi jumlah hasil yang dikembalikan
    return $this->db->get()->result_array();
  }

  // Fungsi untuk mendapatkan jumlah total orders berdasarkan status aktif admin
  public function getOrdersCountByActiveNip($is_active)
  {
    $this->db->join('admin', 'orders.nip = admin.nip');
    $this->db->where('admin.is_active', $is_active);
    return $this->db->count_all_results('orders');
  }

  // Fungsi untuk mendapatkan data orders berdasarkan status aktif admin
  public function getOrdersDataByActiveNip($is_active, $limit, $start)
  {
    // Pilih kolom yang dibutuhkan dari tabel orders, admin, dan menu
    $this->db->select('orders.*, admin.nama_admin, menu.nama_menu');
    $this->db->from('orders');
    $this->db->join('admin', 'orders.nip = admin.nip');
    $this->db->join('menu', 'orders.id_menu = menu.id_menu'); // Join dengan tabel menu berdasarkan id_menu
    $this->db->where('admin.is_active', $is_active);
    $this->db->order_by('orders.id_booking', 'DESC'); // Urutkan data secara descending
    $this->db->limit($limit, $start);
    $query = $this->db->get();
    return $query->result_array();
  }


  public function getNewOrders()
  {

    $this->db->where('created_at >', date('Y-m-d H:i:s', strtotime('-10 seconds')));
    $query = $this->db->get('orders');

    return $query->num_rows() > 0;
  }

  public function get_menu_by_temp($id_admin)
  {
    $this->db->select('temp.*, menu.image, menu.nama_menu');
    $this->db->from('temp');
    $this->db->join('menu', 'temp.id_menu = menu.id_menu');
    $this->db->where('temp.nip', $id_admin);
    $query = $this->db->get();
    return $query->result_array();
  }
}
