<?php 
defined('BASEPATH') or exit('No direct sript allowed');
class ModelPoli extends CI_Model {
public function getData ($table) {
    return $this->db->get($table)->row();
  }
  public function getDataWhere($table, $where) {
    $this->db->where($where);
    return $this->db->get($table);
  }
  public function getOrderByLimit($table, $order, $limit) {
    $this->db->order_by($order, 'desc');
    $this->db->$limit($limit);
    return $this->db->get($table);
  }
  // public function joinOrder($where) {
  //   $this->db->select('*');
  //   $this->db->from('booking bo');
  //   $this->db->join('booking_detail d', 'd.id_booking = bo.id_booking');
  //   $this->db->join('buku bu', 'bu.id = d.id_buku');
  //   $this->db->where($where);

  //   return $this->db->get();
  // }
  public function joinOrder($where) {
    $this->db->select('*');
    $this->db->from('antrian_poli ap');
    $this->db->join('user u', 'u.id = ap.id_pasien');
    $this->db->join('antrian a', 'a.id_antrian = ap.id_antrian');
    $this->db->where($where);

    return $this->db->get();
  }
  // public function simpanDetail($where = null) {
  //   $sql = "INSERT INTO booking_detail (id_booking, id_buku)
  //           SELECT booking.id_booking, temp.id_buku
  //           FROM booking, temp
  //           WHERE temp.id_user = booking.id_user
  //             AND booking.id_user = '$where'";
  //   $this->db->query($sql);
  // }
  public function simpanDetail($where = null) {
    $sql = "INSERT INTO antrian_poli (id_antrian, id_pasien)
            SELECT antrian.id_antrian, user.id
            FROM antrian, user
            WHERE antrian.id_antrian = antrian_poli.id_antrian
              AND user.id = '$where'";
    $this->db->query($sql);
  }
  public function insertData($table, $data) {
    $this->db->insert($table, $data);
  }
  public function updateData($table, $data, $where) {
    $this->db->update($table, $data, $where);
  }
  public function deleteData($where, $table) {
    $this->db->where($where);
    $this->db->delete($table);
  }
  // public function find($where) {
  //   //Query mencari record berdasarkan ID-nya
  //   $this->db->limit(1);
  //   return $this->db->get('buku', $where);
  // }
  public function kosongkanData($table) {
    return $this->db->truncate($table);
  }
  // public function selectJoin() {
  //   $this->db->select('*');
  //   $this->db->from('booking');
  //   $this->db->join('booking_detail', 'booking_detail.id_booking = booking.id_booking');
  //   $this->db->join('buku', 'booking_detail.id_buku=buku.id');
  //   return $this->db->get();
  // }
  public function selectJoin() {
    $this->db->select('*');
    $this->db->from('antrian');
    $this->db->join('antrian_poli', 'antrian_poli.id_antrian = antrian.id_antrian');
    $this->db->join('user', 'antrian_poli.id_pasien=user.id');
    return $this->db->get();
  }

  public function createTemp() {
    $this->db->query('CREATE TABLE IF NOT EXISTS temp(
      id_antrian varchar(12),
      tgl_antrian DATETIME,
      poli varchar(128),
      id_user int)');
  }
  public function showTemp($where) {
    return $this->db->get('temp', $where);
  }
}