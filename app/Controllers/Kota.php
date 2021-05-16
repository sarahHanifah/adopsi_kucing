<?php

namespace App\Controllers;

use App\Models\kotaModel;

class Kota extends BaseController
{
	public function __construct()
	{
		$this->kota = new kotaModel();
	}

	public function getKota() {

		$data['kota'] = $this->kota->getKota();
		return $data;
	}
}
