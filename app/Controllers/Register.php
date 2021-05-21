<?php

namespace App\Controllers;

class Register extends BaseController
{

	public function index()
	{
		$k = new Kota();
		$data = $k->getKota();
		return view('pages/register', $data);
	}
}
