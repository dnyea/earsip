<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Admin implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    // Do something here
    // Do something here
    if (session()->get('level') != 1) {
      session()->setFlashdata('Pesan', 'Anda Bukan Admin');
      return redirect()->to(base_url('home'));
    }
  }

  //--------------------------------------------------------------------

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    if (session()->get('level') == 1) {
      return redirect()->to(base_url('user'));
    }
  }
}
