<?php

namespace App\Models;

use CodeIgniter\Model;

class rasKucingModel extends Model
{
    protected $table ='ras_kucing';
	protected $primaryKey ='id_ras';
    protected $allowedFields = ['nama_ras'];

    public function getRasKucing()
    {
        return $this->db->table('ras_kucing')
            ->get()
            ->getResultArray();
    }
}
