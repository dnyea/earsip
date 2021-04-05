<?php

namespace App\Controllers;

use App\Models\Home_Model;

class Home extends BaseController
{
	public function __construct()
	{
		$this->Home_Model = new Home_Model();
	}
	public function index()
	{
		$data = array(
			'title' => 'Home',
			'totalArsip' => $this->Home_Model->totalArsip(),
			'totalUser' => $this->Home_Model->totalUser(),
			'totalDepartemen' => $this->Home_Model->totalDepartemen(),
			'isi' => 'home',
		);
		return view('layout/wrapper', $data);
	}
}
