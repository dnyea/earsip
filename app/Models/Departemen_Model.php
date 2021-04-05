<?php

namespace App\Models;

use CodeIgniter\Model;

class Departemen_Model extends Model
{
  public function viewAllData()
  {
    return $this->db->table('tbl_departemen')->orderBy('id_departemen', 'DESC')->get()->getResultArray();
  }
  public function addData($data)
  {
    return $this->db->table('tbl_departemen')->insert($data);
  }
  public function editData($data)
  {
    return $this->db->table('tbl_departemen')->where('id_departemen', $data['id_departemen'])->update($data);
  }
  public function deleteData($data)
  {
    return $this->db->table('tbl_departemen')->where('id_departemen', $data['id_departemen'])->delete($data);
  }
}
