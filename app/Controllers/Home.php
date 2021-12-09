<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('main/home');
	}

	public function tentang()
	{
		return view('main/tentang');
	}
	
	public function registrasi()
	{
		return view('main/registrasi');
	}

	public function login()
	{
		return view('main/login');
	}

	public function admin()
	{
		return view('main/admin');
	}
}
