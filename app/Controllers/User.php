<?php

namespace App\Controllers;

use App\Models\Departemen_Model;
use App\Models\User_Model;

class User extends BaseController
{
  public function __construct()
  {
    helper('form');
    $this->User_Model = new User_Model();
    $this->Departemen_Model = new Departemen_Model();
  }
  public function index()
  {
    $data = array(
      'title' => 'Data User',
      'user' => $this->User_Model->viewAllData(),
      'isi' => 'user/index',
    );
    return view('layout/wrapper', $data);
  }
  public function add()
  {
    $data = array(
      'title' => 'Tambah User',
      'departemen' => $this->Departemen_Model->viewAllData(),
      'isi' => 'user/add',
    );
    return view('layout/wrapper', $data);
  }

  public function insert()
  {
    // Melakukan Validasi
    if ($this->validate([
      'nama_user' => [
        'label' => 'Nama User',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Wajib Diisi',
        ]
      ],
      'email' => [
        'label' => 'Email',
        'rules' => 'required|is_unique[tbl_user.email]|valid_email',
        'errors' => [
          'required' => '{field} Wajib Diisi',
          'is_unique' => '{field} sudah ada, gunakan yang lain',
          'valid_email' => 'Format salah'
        ]
      ],
      'password' => [
        'label' => 'Password',
        'rules' => 'required|min_length[5]',
        'errors' => [
          'required' => '{field} Wajib Diisi',
          'min_length' => '{field} kurang panjang',
        ]
      ],
      'level' => [
        'label' => 'Level',
        'rules' => 'required',
        'errors' => [
          'required ' => '{field} Wajib Diisi',
        ]
      ],
      'id_departemen' => [
        'label' => 'Departemen',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Wajib Diisi',
        ]
      ],
      'foto' => [
        'label' => 'Foto',
        'rules' => 'uploaded[foto]|max_size[foto,2048]|is_image[foto,image/png,image/jpg,image/jpeg]',
        'errors' => [
          'uploaded' => '{field} Wajib diupload',
          'max_size' => ' Ukuran {field} terlalu besar, maksimal 2 mb',
          'is_image' => 'Harus Berupa Foto',
        ]
      ],
    ])) {
      // Mengambil File Foto
      $foto = $this->request->getFile('foto');
      // Random Nama file foto
      $nama_acak = $foto->getRandomName();

      // Jika Data Valid
      $data = array(
        'nama_user' => $this->request->getPost('nama_user'),
        'email' => $this->request->getPost('email'),
        'password' => $this->request->getPost('password'),
        'level' => $this->request->getPost('level'),
        'id_departemen' => $this->request->getPost('id_departemen'),
        'foto' => $nama_acak,
      );
      // Pindahkan foto
      $foto->move('foto', $nama_acak);

      $this->User_Model->addData($data);
      session()->setFlashdata('pesan', 'Data User Berhasil Ditambahkan!');
      return redirect()->to(base_url('user'));
    } else {
      session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
      return redirect()->to(base_url('user/add'))->withInput();
    }
  }
  public function edit($id_user)
  {
    $data = array(
      'title' => 'Edit User',
      'departemen' => $this->Departemen_Model->viewAllData(),
      'user' => $this->User_Model->detailData($id_user),
      'isi' => 'user/edit',
    );
    return view('layout/wrapper', $data);
  }

  public function update($id_user)
  {
    if ($this->validate([
      'nama_user' => [
        'label' => 'Nama User',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Wajib Diisi',
        ]
      ],
      'email' => [
        'label' => 'Email',
        'rules' => 'required|valid_email',
        'errors' => [
          'required' => '{field} Wajib Diisi',
          // 'is_unique' => '{field} sudah ada, gunakan yang lain',
          'valid_email' => 'Format salah'
        ]
      ],
      'password' => [
        'label' => 'Password',
        'rules' => 'required|min_length[5]',
        'errors' => [
          'required' => '{field} Wajib Diisi',
          'min_length' => '{field} kurang panjang',
        ]
      ],
      'level' => [
        'label' => 'Level',
        'rules' => 'required',
        'errors' => [
          'required ' => '{field} Wajib Diisi',
        ]
      ],
      'id_departemen' => [
        'label' => 'Departemen',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Wajib Diisi',
        ]
      ],
      'foto' => [
        'label' => 'Foto',
        'rules' => 'max_size[foto,2048]|is_image[foto,image/png,image/jpg,image/jpeg]',
        'errors' => [

          'max_size' => ' Ukuran {field} terlalu besar, maksimal 2 mb',
          'is_image' => 'Harus Berupa Foto',
        ]
      ],
    ])) {
      $foto = $this->request->getFile('foto');
      // Jika Tidak Ada Foto Yang diganti
      if ($foto->getError() == 4) {
        $data = array(
          'id_user' => $id_user,
          'nama_user' => $this->request->getPost('nama_user'),
          'password' => $this->request->getPost('password'),
          'level' => $this->request->getPost('level'),
          'id_departemen' => $this->request->getPost('id_departemen'),
        );
        $this->User_Model->editData($data);
      } else {
        // Jika Ada Foto Yang diganti

        // 1. Menghapus Foto Lama
        $user = $this->User_Model->detailData($id_user);
        if ($user['foto'] != "") {
          unlink('foto/' . $user['foto']);
        }
        $foto = $this->request->getFile('foto');
        // 2. Random Nama Foto
        $nama_acak = $foto->getRandomName();
        $data = array(
          'id_user' => $id_user,
          'nama_user' => $this->request->getPost('nama_user'),
          // 'email' => $this->request->getPost('email'),
          'password' => $this->request->getPost('password'),
          'level' => $this->request->getPost('level'),
          'id_departemen' => $this->request->getPost('id_departemen'),
          'foto' => $nama_acak,
        );
        // Pindahkan foto
        $foto->move('foto', $nama_acak);
        $this->User_Model->editData($data);
      }
      session()->setFlashdata('pesan', 'Data User Berhasil Diubah');
      return redirect()->to(base_url('user'));
    } else {
      session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
      return redirect()->to(base_url('user/edit/' . $id_user));
    }
  }
  public function delete($id_user)
  {
    // Mengapus Foto Didatabase
    $user = $this->User_Model->detailData($id_user);
    if ($user['foto'] != "") {
      unlink('foto/' . $user['foto']);
    }
    $data = array(
      'id_user' => $id_user,
    );
    $this->User_Model->deleteData($data);
    session()->setFlashdata('pesan', 'Data User Berhasil Dihapus');
    return redirect()->to(base_url('user'));
  }
}
