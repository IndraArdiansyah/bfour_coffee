<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelAdmin extends CI_Model
{
  public function simpanData($data = null)
  {
    $this->db->insert('admin', $data);
  }
  public function cekData($where = null)
  {
    return $this->db->get_where('admin', $where);
  }
  public function getWhere($where = null)
  {
    return $this->db->get_where('admin', $where);
  }
  public function total($field, $where)
  {
    $this->db->select_sum($field);
    if (!empty($where) && count($where) > 0) {
      $this->db->where($where);
    }
    $this->db->from('admin');
    return $this->db->get()->row($field);
  }
  public function cekUserAccess($where = null)
  {
    $this->db->select('*');
    $this->db->from('access_menu');
    $this->db->where($where);
    return $this->db->get();
  }
  public function getUserLimit()
  {
    $this->db->select('*');
    $this->db->from('admin');
    $this->db->limit(50, 0);
    return $this->db->get();
  }
  public function admin()
  {
    $this->db->where('nip', $this->session->userdata('nip'));
    return $this->db->get('admin')->result();
  }

  public function getData()
  {
    return $this->db->get('admin');
  }

  public function getadmin()
  {
    $this->db->order_by('FIELD(is_active, 1, 0, 2)', '', FALSE);
    $this->db->order_by('id', 'ASC');
    return $this->db->get('admin');
  }

  public function selectData($nip)
  {
    $this->db->select('*');
    $this->db->where('nip', $nip);
    $this->db->from('admin');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function countAllAdmin()
  {
    return $this->db->get('admin')->num_rows();
  }

  public function getdataadmin($limit, $start)
  {
    // Mengatur urutan khusus berdasarkan nilai is_active: 1, 0, 2
    $this->db->order_by('FIELD(is_active, 1, 0, 2)', '', FALSE);
    $this->db->order_by('id', 'ASC');
    return $this->db->get('admin', $limit, $start)->result_array();
  }


  public function updateAdmin($data = null, $where = null)
  {
    $this->db->update('admin', $data, $where);
  }

  public function hapusAdmin($where = null)
  {
    $this->db->delete('admin', $where);
  }
}
