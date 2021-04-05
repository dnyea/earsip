<?php

namespace App\Controllers;

use App\Models\Arsip_Model;
use App\Models\Kategori_Model;

class Arsip extends BaseController
{
  public function __construct()
  {
    $this->Arsip_Model = new Arsip_Model();
    $this->Kategori_Model = new Kategori_Model();
    helper('form');
  }

  public function index()
  {
    $data = array(
      'title' => 'Arsip',
      'arsip' => $this->Arsip_Model->viewAllData(),
      'isi' => 'arsip/index',
    );
    return view('layout/wrapper', $data);
  }

  public function add()
  {
    $data = array(
      'title' => ' Tambah Arsip',
      'kategori' => $this->Kategori_Model->viewAllData(),
      'isi' => 'arsip/add',
    );

    return view('layout/wrapper', $data);
  }

  public function insert()
  {
    if ($this->validate([
      'nama_arsip' => [
        'label' => 'Nama Arsip',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus diisi',
        ],
      ],
      'id_kategori' => [
        'label'  => 'Kategori',
        'rules'  => 'required',
        'errors' => [
          'required' => '{field} Harus Diisi!',
        ]
      ],
      'deskrepsi' => [
        'label'  => 'Deskripsi',
        'rules'  => 'required',
        'errors' => [
          'required' => '{field} Harus Diisi!',
        ]
      ],
      'file_arsip' => [
        'label'  => 'File Arsip',
        'rules'  => 'uploaded[file_arsip]|max_size[file_arsip,2048]|ext_in[file_arsip,pdf]',
        'errors' => [
          'uploaded' => '{field} Harus Diupload!',
          'max_size' => 'Ukuran {field} Terlalu Besar, Maksimal 2Mb',
          'ext_in' => 'Format {field} Salah',
        ]
      ]
    ])) {
      // Megambil File Arsip
      $file_arsip = $this->request->getFile('file_arsip');

      // Random nama File Arsip
      $nama_file = $file_arsip->getRandomName();

      //Melihat Ukuran File Arsip
      $ukuran_file = $file_arsip->getSizeByUnit('kb');

      // Jika Data yang dimasukan valid
      $data = array(
        'nama_arsip' => $this->request->getPost('nama_arsip'),
        'no_arsip' => $this->request->getPost('no_arsip'),
        'id_kategori' => $this->request->getPost('id_kategori'),
        'deskrepsi' => $this->request->getPost('deskrepsi'),
        'tgl_upload' => date('Y-m-d'),
        'tgl_update' => date('Y-m-d'),
        'id_user' => session()->get('id_user'),
        'id_departemen' => session()->get('id_departemen'),
        'file_arsip' => $nama_file,
        'ukuran_file' => $ukuran_file,
      );

      // Pindahkan file arsip
      $file_arsip->move('file_arsip', $nama_file);

      // Panngil Model Arsip

      $this->Arsip_Model->addData($data);

      // Set Session
      session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan');
      return redirect()->to(base_url('arsip'));
    } else {
      // Jika Datanya Tidak Valid
      session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
      return redirect()->to(base_url('arsip/add'));
    }
  }

  public function edit($id_arsip)
  {
    $data = array(
      'title' => ' Edit Arsip',
      'kategori' => $this->Kategori_Model->viewAllData(),
      'arsip' => $this->Arsip_Model->detailData($id_arsip),
      'isi' => 'arsip/edit',
    );
    return view('layout/wrapper', $data);
  }

  public function update($id_arsip)
  {
    if ($this->validate([
      'nama_arsip' => [
        'label' => 'Nama Arsip',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus diisi',
        ],
      ],
      'id_kategori' => [
        'label'  => 'Kategori',
        'rules'  => 'required',
        'errors' => [
          'required' => '{field} Harus Diisi!',
        ]
      ],
      'deskrepsi' => [
        'label'  => 'Deskripsi',
        'rules'  => 'required',
        'errors' => [
          'required' => '{field} Harus Diisi!',
        ]
      ],
      'file_arsip' => [
        'label'  => 'File Arsip',
        'rules'  => 'max_size[file_arsip,2048]|ext_in[file_arsip,pdf]',
        'errors' => [

          'max_size' => 'Ukuran {field} Terlalu Besar, Maksimal 2Mb',
          'ext_in' => 'Format {field} Salah',
        ]
      ]
    ])) {
      // Mengambil File Yang akan di upload di form
      $file_arsip = $this->request->getFile('file_arsip');

      // jika tidak ada file yang diupload
      if ($file_arsip->getError() == 4) {
        $data = array(
          'id_arsip' => $id_arsip,
          'id_kategori' => $this->request->getPost('id_kategori'),
          'no_arsip' => $this->request->getPost('no_arsip'),
          'nama_arsip' => $this->request->getPost('nama_arsip'),
          'deskrepsi' => $this->request->getPost('deskrepsi'),
          'tgl_update' => date('Y-m-d'),
          'id_departemen' => session()->get('id_departemen'),
          'id_user' => session()->get('id_user'),
          // 'ukuran_file' => $ukuran_file,
          // 'file_arsip' => $nama_file,
        );
        $this->Arsip_Model->editData($data);
      } else {
        //Jika File Diupload
        // Menghapus File Lama
        $arsip = $this->Arsip_Model->detailData($id_arsip);
        if ($arsip['file_arsip'] != "") {
          unlink('file_arsip/' . $arsip['file_arsip']);
        }
        // Random Nama File Foto
        $nama_file = $file_arsip->getRandomName();
        // Melihat Ukuran File
        $ukuran_file = $file_arsip->getSizeByUnit('kb');
        // jiKA vALID
        $data = array(
          'id_arsip' => $id_arsip,
          'id_kategori' => $this->request->getPost('id_kategori'),
          'no_arsip' => $this->request->getPost('no_arsip'),
          'nama_arsip' => $this->request->getPost('nama_arsip'),
          'deskrepsi' => $this->request->getPost('deskrepsi'),
          'tgl_update' => date('Y-m-d'),
          'id_departemen' => session()->get('id_departemen'),
          'id_user' => session()->get('id_user'),
          'ukuran_file' => $ukuran_file,
          'file_arsip' => $nama_file,
        );
        // Pindahkan File Arsip
        $file_arsip->move('file_arsip', $nama_file);

        $this->Arsip_Model->editData($data);
      }
      session()->setFlashdata('pesan', 'Data Berhasil Di Ubah');
      return redirect()->to(base_url('arsip'));
    } else {
      // Jika Datanya Tidak Valid
      session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
      return redirect()->to(base_url('arsip/edit/' . $id_arsip));
    }
  }

  public function delete($id_arsip)
  {
    // Menghapus File Arsip di Database
    $arsip = $this->Arsip_Model->detailData($id_arsip);
    if ($arsip['file_arsip'] != "") {
      unlink('file_arsip/' . $arsip['file_arsip']);
    }
    $data = array(
      'id_arsip' => $id_arsip
    );
    $this->Arsip_Model->deleteData($data);
    session()->setFlashdata('pesan', 'Data Berhasil dihapus');
    return redirect()->to(base_url('arsip'));
  }

  public function viewpdf($id_arsip)
  {
    $data = array(
      'title' => 'View PDF',
      'arsip' => $this->Arsip_Model->detailData($id_arsip),
      'isi' => 'arsip/viewpdf',
    );
    return view('layout/wrapper', $data);
  }
}
