<?php

namespace App\Models;

use CodeIgniter\Model;

class Home_Model extends Model
{
  public function totalUser()
  {
    return $this->db->table('tbl_user')->countAll();
  }
  public function totalArsip()
  {
    return $this->db->table('tbl_arsip')->countAll();
  }
  public function totalDepartemen()
  {
    return $this->db->table('tbl_departemen')->countAll();
  }
}
