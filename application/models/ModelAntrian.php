<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelAntrian extends CI_Model
{
    public function simpanData($data = null)
    {
        $this->db->insert('antrian', $data);
    }
    public function cekData($where = null)
    {
        return $this->db->get_where('antrian', $where);
    }
    public function getUserWhere($where = null)
    {
        return $this->db->get_where('antrian', $where);
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
        $this->db->from('antrian');
        $this->db->limit(10, 0);
        return $this->db->get();
    }

  public $poli;
  public function proses($data)
  {
    if($data == '1') {
      $this->poli = "Poli Umum";
    }elseif ($data == '2') {
      $this->poli = "Poli Gigi";
    }elseif ($data == '3') {
      $this->poli = "Poli Anak";
    }else {
      $this->poli = "Poli Kesehatan Ibu dan Anak";
    }
    return $this->poli;
  }
}