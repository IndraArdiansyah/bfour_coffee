<?php
defined('BASEPATH') or exit('No direct sript allowed');
class Modelmenu extends CI_Model
{
  public function getData($table)
  {
    return $this->db->get($table)->row();
  }

  public function cekData($where = null)
  {
    return $this->db->get_where('kategori', $where);
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

  public function joinOrder($where)
  {
    $this->db->select('*');
    $this->db->from('antrian_poli ap');
    $this->db->join('user u', 'u.id = ap.id_pasien');
    $this->db->join('antrian a', 'a.id_antrian = ap.id_antrian');
    $this->db->where($where);

    return $this->db->get();
  }

  public function simpanDetail($where = null)
  {
    $sql = "INSERT INTO antrian_poli (id_antrian, id_pasien)
            SELECT antrian.id_antrian, user.id
            FROM antrian, user
            WHERE antrian.id_antrian = antrian_poli.id_antrian
              AND user.id = '$where'";
    $this->db->query($sql);
  }
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

  public function getMenu()
  {
    return $this->db->get('menu');
  }

  public function getKategori()
  {
    return $this->db->get('kategori');
  }

  public function getWhere($where = null)
  {
    return $this->db->get_where('menu', $where);
  }

  public function getWherekategori($where = null)
  {
    return $this->db->get_where('kategori', $where);
  }

  public function kosongkanData($table)
  {
    return $this->db->truncate($table);
  }

  public function selectJoin()
  {
    $this->db->select('*');
    $this->db->from('antrian');
    $this->db->join('antrian_poli', 'antrian_poli.id_antrian = antrian.id_antrian');
    $this->db->join('user', 'antrian_poli.id_pasien=user.id');
    return $this->db->get();
  }

  public function joinKategoriMenu($id_menu)
  {
    $this->db->from('menu');
    $this->db->join('kategori', 'kategori.id = menu.id_kategori');
    $this->db->where('id_menu', $id_menu);
    return $this->db->get()->row();
  }

  public function join()
  {
    $this->db->from('menu');
    $this->db->join('kategori', 'kategori.id = menu.id_kategori');
    return $this->db->get();
  }

  public function joinKategori($where)
  {
    $this->db->from('kategori');
    $this->db->join('menu', 'menu.id_kategori = kategori.id');
    $this->db->where($where);
    return $this->db->get();
  }

  public function getAllMenu()
  {
    return $this->db->get('menu')->result_array();
  }

  public function getAllKategori()
  {
    return $this->db->get('kategori')->result_array();
  }

  public function countAllMenu()
  {
    return $this->db->get('menu')->num_rows();
  }

  public function countAllKategori()
  {
    return $this->db->get('kategori')->num_rows();
  }

  public function getdatamenu($limit, $start)
  {
    return $this->db->get('menu', $limit, $start)->result_array();
  }

  public function getdatakategori($limit, $start)
  {
    return $this->db->get('kategori', $limit, $start)->result_array();
  }

  public function updateMenu($data = null, $where = null)
  {
    $this->db->update('menu', $data, $where);
  }

  public function updateKategori($data = null, $where = null)
  {
    $this->db->update('kategori', $data, $where);
  }

  public function simpanData($data = null)
  {
    $this->db->insert('menu', $data);
  }

  public function simpanKategori($data = null)
  {
    $this->db->insert('kategori', $data);
  }

  public function hapusMenu($where = null)
  {
    $this->db->delete('menu', $where);
  }

  public function hapusKategori($where = null)
  {
    $this->db->delete('kategori', $where);
  }

  public function get_where($id_menu)
  {
    return $this->db->get_where('menu', ['id_menu' => $id_menu])->result_array();
  }

  public function get_where_kategori($id_kategori)
  {
    return $this->db->get_where('kategori', ['id' => $id_kategori])->result_array();
  }

  public function ubahData()
  {
    $data = [
      'id_menu' => $this->input->post('id_menu', true),
      'nama_menu' => $this->input->post('nama_menu', true),
    ];

    $this->db->where('id_menu', $this->input->post('id_menu'));
    $this->db->update('menu', $data);
  }

  public function get_poli()
  {
    $query = $this->db->query("SELECT nama_poli AS nama_poli FROM kategori_poli ORDER BY nama_poli ASC");
    return $query->result();
  }

  public function get_id_poli()
  {
    $query = $this->db->query("SELECT id_poli AS id_poli FROM kategori_poli ORDER BY id_poli ASC");
    return $query->result();
  }

  public function getidpoli()
  {
    $data = [
      'id_poli' => $this->input->post('id_poli', true),
    ];

    $this->db->where('id_poli', $this->input->post('id_poli'));
    $this->db->get_where('kategori_poli', $data);
  }

  public function getMenuByName($menu_name)
  {
    return $this->db->get_where('menu', ['nama_menu' => $menu_name])->row_array();
  }

  public function getMenuId($menu_id)
  {
    return $this->db->get_where('menu', ['id_menu' => $menu_id])->result_array();
  }

  public function getKategoriByName($kategori_name)
  {
    return $this->db->get_where('kategori', ['kategori' => $kategori_name])->row_array();
  }

  public function getKategoriById($kategori_id)
  {
    return $this->db->get_where('kategori', ['kategori' => $kategori_id])->result_array();
  }

  public function getMenuById($kategori_id)
  {
    return $this->db->get_where('menu', ['id_kategori' => $kategori_id])->result_array();
  }

  public function getKategoriBy($kategori_id)
  {
    return $this->db->get_where('kategori', ['id' => $kategori_id])->result_array();
  }

  public function search($keyword)
  {
    $this->db->like('nama_menu', $keyword);
    // $this->db->or_like('harga', $keyword);
    $data = $this->db->get('menu')->result_array();
    return $data;
  }

  public function get_addons($id_kategori)
  {
    $this->db->where('id_kategori', $id_kategori);
    $query = $this->db->get('menu'); // Pastikan nama tabel sesuai
    return $query->result_array();
  }
}
