<?php

namespace App\Models;

use CodeIgniter\Model;

class userModel extends Model
{
    protected $table ='user';
	protected $primaryKey ='id_user';
    protected $allowedFields = ['username','password','email', 'nama', 'id_kota', 'no_telfon', 'alamat'];

    public function getUserById($id)
    {
        return $this->where('id_user',$id)
            ->join('kota', 'kota.id_kota=user.id_kota')
            ->first();
    }

    public function login($username, $password){
        return $this->db->table('user')
            ->where('username',$username)
            ->where('password',$password)
            ->get()
            ->getResultArray();
    }
}
