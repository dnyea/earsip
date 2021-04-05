<?php

namespace App\Controllers;

use App\Models\Departemen_Model;

class Departemen extends BaseController
{
  public function __construct()
  {
    $this->Departemen_Model =  new Departemen_Model;
    helper('form');
  }
  public function index()
  {
    $data = array(
      'title' => 'Departemen',
      'departemen' => $this->Departemen_Model->viewAllData(),
      'isi' => 'departemen/index',
    );
    return view('layout/wrapper', $data);
  }
  public function add()
  {
    if (!$this->validate([
      'nama_departemen' => [
        'label' => 'Nama Departemen',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong',
        ],
      ]
    ])) {
      session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
      return redirect()->to(base_url('departemen'));
    } else {
      // Jika Valid Lakukan Ini
      $data = array('nama_departemen' => $this->request->getPost());
      $this->Departemen_Model->addData($data);
      session()->setFlashdata('pesan', 'Data departemen berhasil ditambah');
      return redirect()->to(base_url('departemen'));
    }
  }
  public function edit($id_departemen)
  {
    $data = array(
      'id_departemen' => $id_departemen,
      'nama_departemen' => $this->request->getPost()
    );
    $this->Departemen_Model->editData($data);
    session()->setFlashdata('pesan', 'Data Berhasil Diubah');
    return redirect()->to(base_url('departemen'));
  }
  public function delete($id_departemen)
  {
    $data = array(
      'id_departemen' => $id_departemen,
    );
    $this->Departemen_Model->deleteData($data);
    session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
    return redirect()->to(base_url('departemen'));
  }
}
