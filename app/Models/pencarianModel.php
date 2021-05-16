<?php

namespace App\Models;

use CodeIgniter\Model;

class pencarianModel extends Model
{
    protected $table ='pencarian';
	protected $primaryKey ='id_pencarian';
    protected $allowedFields = ['id_user', 'p_id_ras', 'p_jenis_kelamin', 'p_umur'];

    public function getPencarianByIdUser($id)
    {
        return $this->db->table('pencarian')
            ->where('id_user',$id)
            ->get()
            ->getResultArray();
    }

    public function getRasTerbanyak($id_user){
        return $this->db->table('pencarian')
            ->selectCount('id_pencarian')
            ->select('p_id_ras')
            ->groupBy('p_id_ras')
            ->where('id_user', $id_user)
            ->orderBy('id_pencarian', 'DESC')
            ->limit(1)
            ->get()
            ->getResultArray();
    }

    public function getJKTerbanyak($id_user){
        return $this->db->table('pencarian')
            ->selectCount('id_pencarian')
            ->select('p_jenis_kelamin')
            ->groupBy('p_jenis_kelamin')
            ->where('id_user', $id_user)
            ->orderBy('id_pencarian', 'DESC')
            ->limit(1)
            ->get()
            ->getResultArray();
    }

    public function getUmurTerbanyak($id_user){
        return $this->db->table('pencarian')
            ->selectCount('id_pencarian')
            ->select('p_umur')
            ->groupBy('p_umur')
            ->where('id_user', $id_user)
            ->orderBy('id_pencarian', 'DESC')
            ->limit(1)
            ->get()
            ->getResultArray();
    }
}
