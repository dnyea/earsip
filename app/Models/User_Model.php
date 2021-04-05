<?php

namespace App\Models;

use CodeIgniter\Model;

class User_Model extends Model
{
  public function viewAllData()
  {
    return $this->db->table('tbl_user')
      ->join('tbl_departemen', 'tbl_departemen.id_departemen = tbl_user.id_departemen', 'left')
      ->orderBy('id_user', 'DESC')->get()->getResultArray();
  }
  public function addData($data)
  {
    return $this->db->table('tbl_user')->insert($data);
  }
  public function detailData($id_user)
  {
    return $this->db->table('tbl_user')
      ->join('tbl_departemen', 'tbl_departemen.id_departemen = tbl_user.id_departemen', 'left')
      ->where('id_user', $id_user)->get()->getRowArray();
  }
  public function editData($data)
  {
    return $this->db->table('tbl_user')->where('id_user', $data['id_user'])->update($data);
  }
  public function deleteData($data)
  {
    return $this->db->table('tbl_user')->where('id_user', $data['id_user'])->delete($data);
  }
}
