<?php

namespace App\Controllers;

use App\Models\Kategori_Model;

class Kategori extends BaseController
{
  public function __construct()
  {
    $this->Kategori_Model = new Kategori_Model();
    helper('form');
  }

  public function index()
  {
    $data = array(
      'title' => 'Kategori',
      'kategori' => $this->Kategori_Model->viewAllData(),
      'isi' => 'kategori/index',
    );
    return view('layout/wrapper', $data);
  }
  public function add()
  {
    $data = array(
      'nama_kategori' => $this->request->getPost(),
    );
    $this->Kategori_Model->addData($data);
    session()->setFlashdata('pesan' . 'Berhasil Menambahkan Kategori');
    return redirect()->to(base_url('kategori'));
  }
  public function edit($id_kategori)
  {
    $data = array(
      'id_kategori' => $id_kategori,
      'nama_kategori' => $this->request->getPost(),
    );
    $this->Kategori_Model->editData($data);
    session()->setFlashdata('pesan', 'Data Berhasil diubah');
    return redirect()->to(base_url('kategori'));
  }
  public function delete($id_kategori)
  {
    $data = array(
      'id_kategori' => $id_kategori,

    );
    $this->Kategori_Model->deleteData($data);
    session()->setFlashdata('pesan', 'Data Berhasil dihapus');
    return redirect()->to(base_url('kategori'));
  }
}
