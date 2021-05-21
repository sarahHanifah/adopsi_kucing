<?php

namespace App\Controllers;

use App\Models\kucingModel;
use App\Models\pencarianModel;
use App\Models\userModel;

class Pencarian extends BaseController
{
	public function __construct()
	{
        $this->pencarian = new pencarianModel();
        $this->kucing = new kucingModel();
        $this->user = new userModel();
	}

    public function pencarian(){
        $rk = new RasKucing();
		$data = $rk->getRasKucing();
        $session = \Config\Services::session();
        $data['id_user'] = $session->get('id_user');
        $data['kucing'] = $this->kucing->getKucing();
        return view('pages/user/pencarian', $data);
    }

    public function hasilPencarian(){
		$this->pencarian->save([
			'id_user' => $this->request->getVar('id_user'),
			'p_id_ras' => $this->request->getVar('p_id_ras'),
			'p_jenis_kelamin' => $this->request->getVar('p_jenis_kelamin'),
			'p_umur' => $this->request->getVar('p_umur')
		]);
        $ras = $this->request->getVar('p_id_ras');
        $jk = $this->request->getVar('p_jenis_kelamin');
        $umur = $this->request->getVar('p_umur');
        $rk = new RasKucing();
		$data = $rk->getRasKucing();
        $session = \Config\Services::session();
        $data['id_user'] = $session->get('id_user');

		$data['kucing'] = $this->kucing->getKucingByPencarian($ras, $jk, $umur);
        return view('pages/user/pencarian', $data);
    }

    public function getRekomendasi(){
        $session = \Config\Services::session();
		$id = $session->get('id_user');
        $ras_max = $this->pencarian->getRasTerbanyak($id);
        $jk_max = $this->pencarian->getJKTerbanyak($id);
        $umur_max = $this->pencarian->getUmurTerbanyak($id);
        $user = $this->user->getUserById($id);
        $ras_max_str = NULL;
        $jk_max_str = NULL;
        $umur_max_str = NULL;
        foreach ( $ras_max as $row ){
            $ras_max_str = $row['p_id_ras'];
        }
        foreach ( $jk_max as $row ){
            $jk_max_str = $row['p_jenis_kelamin'];
        }
        foreach ( $umur_max as $row ){
            $umur_max_str = $row['p_umur'];
        }
        $kota_str = $user['id_kota'];
        $data = $this->kucing->getRekomendasi($ras_max_str, $jk_max_str, $umur_max_str, $kota_str, $id);
        // d($ras_max_str);
        // d($umur_max_str);
        // d($jk_max_str);
        // d($data);
        return $data;
    }
}
