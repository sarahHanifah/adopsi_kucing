<?php

namespace App\Controllers;

use App\Models\rasKucingModel;

class RasKucing extends BaseController
{
	public function __construct()
	{
		$this->ras_kucing = new rasKucingModel();
	}

	public function getRasKucing() {

		$data['ras_kucing'] = $this->ras_kucing->getRasKucing();
		return $data;
	}
}
