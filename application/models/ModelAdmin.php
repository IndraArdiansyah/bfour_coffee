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
    $this->db->limit(10, 0);
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

  public function selectData($nip)
  {
    $this->db->select('*');
    $this->db->where('nip', $nip);
    $this->db->from('admin');
    $query = $this->db->get();
    return $query->result_array();
  }
}