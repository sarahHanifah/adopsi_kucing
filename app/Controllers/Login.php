<?php

namespace App\Controllers;

use App\Models\userModel;

class Login extends BaseController
{
	public function __construct()
	{
		$this->user = new userModel();
	}

	public function index()
	{
		$session = \Config\Services::session();
		
		if($session->get('id_user')){
			return view('pages/user/home');
	  	}else{
			return view('pages/login');
		}
	}

	public function login()
	{
		return view('pages/login');
	}
	
    public function proses_login(){
        $username = $this->request->getVar('username');
		$password = $this->request->getVar('password');
	
		$ceklogin = $this->user->login($username,$password);
	
		if($ceklogin){
			foreach($ceklogin as $row){
				$session = \Config\Services::session();
				$session->set('id_user',$row['id_user']);
				$session->set('username',$row['username']);
			}
			return redirect()->to(base_url('User/index'));
	  	}else{
			$data['data'] = "Username dan Password tidak sesuai!";
			return view('pages/login', $data);
		}
    }
}
