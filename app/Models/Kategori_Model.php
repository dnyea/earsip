<?php

namespace App\Models;

use CodeIgniter\Model;

class Kategori_Model extends Model
{
  public function viewAllData()
  {
    return $this->db->table('tbl_kategori')->orderBy('id_kategori', 'DESC')->get()->getResultArray();
  }
  public function addData($data)
  {
    return $this->db->table('tbl_kategori')->insert($data);
  }
  public function editData($data)
  {
    return $this->db->table('tbl_kategori')->where('id_kategori', $data['id_kategori'])->update($data);
  }
  public function deleteData($data)
  {
    return $this->db->table('tbl_kategori')->where('id_kategori', $data['id_kategori'])->delete($data);
  }
}
