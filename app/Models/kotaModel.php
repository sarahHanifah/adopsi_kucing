<?php

namespace App\Models;

use CodeIgniter\Model;

class kotaModel extends Model
{
    protected $table ='kota';
	protected $primaryKey ='id_kota';
    protected $allowedFields = ['nama_kota'];

    public function getKota()
    {
        return $this->db->table('kota')
            ->get()
            ->getResultArray();
    }
}
