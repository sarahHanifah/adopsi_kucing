<?php

namespace App\Controllers;

use App\Models\kotaModel;
use App\Models\kucingModel;
use App\Models\likesModel;
use App\Models\rasKucingModel;
use App\Models\userModel;

class User extends BaseController
{
    public function __construct()
	{
        $this->user = new userModel();
		$this->likes = new likesModel();
		$this->kota = new kotaModel();
		$this->kucing = new kucingModel();
		$this->ras_kucing = new rasKucingModel();
	}
	public function index()
	{
		$pencarian = new Pencarian();
		$data['rekomendasi'] = $pencarian->getRekomendasi();
		$data['ras_kucing'] = $this->ras_kucing->getRasKucing();
		return view('pages/user/home', $data);
	}
	
	public function saveUser() {
		$this->user->save([
			'username' => $this->request->getVar('username'),
			'password' => $this->request->getVar('password'),
			'email' => $this->request->getVar('email'),
			'nama' => $this->request->getVar('nama'),
			'id_kota' => $this->request->getVar('id_kota'),
			'no_telfon' => $this->request->getVar('no_telfon'),
			'alamat' => $this->request->getVar('alamat')
		]);
		return redirect()->to(base_url('Login/index'));
	}

	public function profile() {
		$session = \Config\Services::session();
		$id = $session->get('id_user');
		$data['user'] = $this->user->getUserById($id);
		$data['kota'] = $this->kota->getKota();
		$data['kucing'] = $this->kucing->getKucingByIdUser($id);
		$data['ras_kucing'] = $this->ras_kucing->getRasKucing();
		return view('pages/user/r_profile', $data);
	}

	public function editUser() {
		$session = \Config\Services::session();
		$id = $session->get('id_user');
		$data['user'] = $this->user->getUserById($id);
		$data['kota'] = $this->kota->getKota();
		return view('pages/user/editUser', $data);
	}

	public function updateUser(){
		$this->user->save([
			'id_user' => $this->request->getVar('id_user'),
			'username' => $this->request->getVar('username'),
			'password' => $this->request->getVar('password'),
			'email' => $this->request->getVar('email'),
			'nama' => $this->request->getVar('nama'),
			'id_kota' => $this->request->getVar('id_kota'),
			'no_telfon' => $this->request->getVar('no_telfon'),
			'alamat' => $this->request->getVar('alamat')
		]);
		return redirect()->to(base_url('User/profile'));
	}
    
	public function logout()
	{
		//Menghapus semua session (sesi)
		$session = \Config\Services::session();
		$session->destroy();
		return redirect()->to(base_url('Login/index'));
	}
	
	// public function keranjang() {
	// 	$session = \Config\Services::session();
	// 	$id = $session->get('id_user');
	// 	$data['likes'] = $this->likes->getLikesByIdUser($id);
	// 	return view('pages/user/r_keranjang', $data);
	// }
}
