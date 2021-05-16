<?php

namespace App\Controllers;

use App\Models\userModel;

class Register extends BaseController
{

	public function index()
	{
		$k = new Kota();
		$data = $k->getKota();
		return view('pages/register', $data);
	}
}
