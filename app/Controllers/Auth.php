<?php

namespace App\Controllers;

use App\Models\Auth_Model;

class Auth extends BaseController
{
  public function __construct()
  {
    $this->Auth_Model = new Auth_Model();
    helper('form');
    $this->session = session();
  }
  public function index()
  {
    $data = array(
      'title' => 'Login',
      'isi' => 'login',
    );
    return view('login', $data);
  }
  public function login()
  {
    if ($this->validate([
      'email' => [
        'label' => 'Email',
        'rules' => 'required|valid_email',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong',

          'valid_email' => 'Format {field} Salah',
        ],
        'password' => [
          'label' => 'Password',
          'rules' => 'required|min_length[5]',
          'errors' => [
            'required' => '{field} Tidak Boleh Kosong',
            'min_length' => '{field} Kurang Panjang',
          ]
        ]
      ]
    ])) {
      // Jika valid
      $email = $this->request->getPost('email');
      $password = $this->request->getPost('password');
      $cek = $this->Auth_Model->login($email, $password);
      if ($cek) {
        //Jika Cocok
        session()->set('log', true);
        session()->set('nama_user', $cek['nama_user']);
        session()->set('id_user', $cek['id_user']);
        session()->set('email', $cek['email']);
        session()->set('level', $cek['level']);
        session()->set('id_departemen', $cek['id_departemen']);
        session()->set('foto', $cek['foto']);
        return redirect()->to(base_url('home'));
      }
      //Jika Tidak Cocok
      session()->setFlashdata('pesan', 'Email atau Password Salah');
      return redirect()->to(base_url('auth'));
    } else {
      session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
      return redirect()->to(base_url('auth'));
    }
  }
  public function logout()
  {
    session()->destroy();
    return redirect()->to(base_url('auth'));
  }
}
