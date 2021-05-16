<?php

namespace App\Models;

use CodeIgniter\Model;

class likesModel extends Model
{
    protected $table ='likes';
	protected $primaryKey ='id_likes';
    protected $allowedFields = ['id_user', 'id_kucing'];

    public function getLikes()
    {
        return $this->db->table('likes')
            ->get()
            ->getResultArray();
    }
    public function getLikesByIdKucing($id)
    {
        return $this->db->table('likes')
            ->where('id_kucing', $id)
            ->get()
            ->getResultArray();
    }
    public function getLikesByIdUser($id)
    {
        return $this->db->table('likes')
            ->where('id_user', $id)
            ->get()
            ->getResultArray();
    }
}
