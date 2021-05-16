<?php

namespace App\Controllers;

use App\Models\kucingModel;
use App\Models\likesModel;
use App\Models\rasKucingModel;
use App\Models\userModel;

class Kucing extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->kucing = new kucingModel();
		// $this->likes = new likesModel();
		$this->ras_kucing = new rasKucingModel();
		$this->user = new userModel();
	}

	public function getKucing() {

		$data['kucing'] = $this->kucing->getKucing();
		return $data;
	}

	// public function getLikesByIdKucing($id) {

	// 	$data['likes'] = $this->likes->getLikesByIdKucing($id);
	// 	return $data;
	// }

	public function addKucing(){
		$ras = new RasKucing();
		$data = $ras->getRasKucing();
		return view('pages/user/r_addKucing', $data);
	}

	public function saveKucing(){
		$session = \Config\Services::session();
        $id_user = $session->get('id_user');

		$nama1 = $id_user . $this->request->getVar('nama_kucing');
		$file = $this->request->getFile('foto_upload');
        $ext_file = $file->getClientExtension();
		$nama = $nama1 . "." . $ext_file;
		$file->move(ROOTPATH . 'public/files', $nama);

		$this->kucing->save([
			'id_user' => $id_user,
			'nama_kucing' => $this->request->getVar('nama_kucing'),
			'id_ras' => $this->request->getVar('id_ras'),
			'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
			'umur' => $this->request->getVar('umur'),
			'tentang' => $this->request->getVar('tentang'),
			'status_adopsi' => "Belum Diadopsi",
			'foto' => $nama
		]);

		return redirect()->to(base_url('User/profile'));
	}

	public function editKucing($id){
		$data['kucing'] = $this->kucing->getKucingByIdKucing($id);
		$data['ras_kucing'] = $this->ras_kucing->getRasKucing();
		return view('pages/user/r_editKucing', $data);
	}

	public function updateKucing(){
		$session = \Config\Services::session();
        $id_user = $session->get('id_user');
		
		$nama1 = $id_user . $this->request->getVar('nama_kucing');
		$file = $this->request->getFile('foto_upload');
		if($file->isValid()){
			$ext_file = $file->getClientExtension();
			$nama = $nama1 . "." . $ext_file;
			$file->move(ROOTPATH . 'public/files', $nama);

			//hapus foto lama
			unlink(ROOTPATH. 'public/files/' . $this->request->getVar('foto_lama'));

			$this->kucing->save([
				'id_kucing' => $this->request->getVar('id_kucing'),
				'id_user' => $id_user,
				'nama_kucing' => $this->request->getVar('nama_kucing'),
				'id_ras' => $this->request->getVar('id_ras'),
				'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
				'umur' => $this->request->getVar('umur'),
				'tentang' => $this->request->getVar('tentang'),
				'status_adopsi' => $this->request->getVar('status_adopsi'),
				'foto' => $nama
			]);
		}
		else {
			$this->kucing->save([
				'id_kucing' => $this->request->getVar('id_kucing'),
				'id_user' => $id_user,
				'nama_kucing' => $this->request->getVar('nama_kucing'),
				'id_ras' => $this->request->getVar('id_ras'),
				'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
				'umur' => $this->request->getVar('umur'),
				'tentang' => $this->request->getVar('tentang'),
				'status_adopsi' => $this->request->getVar('status_adopsi')
			]);
		}
		return redirect()->to(base_url('User/profile'));
	}

	public function deleteKucing($id){
		$this->kucing->delete($id);
		return redirect()->to(base_url('User/profile'));
	}

	public function lihatKucing($id = NULL){
		$data['kucing'] = $this->kucing->getKucingByIdKucing($id);
		$id_user = $this->kucing->getIdUserByIdKucing($id);
		foreach ( $id_user as $row ){
            $id_user_str = $row['id_user'];
        }
		$data['user'] = $this->user->getUserById($id_user_str);
		return view('pages/user/r_lihatKucing', $data);
	}

	// public function like(){
	// 	$session = \Config\Services::session();
    //     $id_user = $session->get('id_user');
	// 	// d($id_user);
	// 	$likes = new Likes();
	// 	$id_kucing=$this->request->getPost('id_kucing');
	// 	// d($id_kucing);
	// 	$likes->setLikes($id_user, $id_kucing);
	// }
}
