<?php

namespace App\Models;

use CodeIgniter\Model;

class kucingModel extends Model
{
    protected $table ='kucing';
	protected $primaryKey ='id_kucing';
    protected $allowedFields = ['id_user', 'nama_kucing', 'id_ras', 'jenis_kelamin', 'umur', 'tentang', 'status_adopsi', 'foto'];

    public function getKucing()
    {
        return $this->db->table('kucing')
            ->get()
            ->getResultArray();
    }

    public function getKucingByIdUser($id)
    {
        return $this->db->table('kucing')
            ->where('id_user', $id)
            ->get()
            ->getResultArray();
    }

    public function getKucingByIdKucing($id)
    {
        return $this->where('id_kucing', $id)
            ->join('ras_kucing', 'ras_kucing.id_ras=kucing.id_ras')
            ->first();
    }

    public function getIdUserByIdKucing($id)
    {
        return $this->db->table('kucing')
            ->select('id_user')
            ->where('id_kucing', $id)
            ->get()
            ->getResultArray();
    }
    
    public function getKucingByPencarian($ras, $jk, $umur){
        return $this->db->table('kucing')
            ->where('id_ras', $ras)
            ->where('umur', $umur)
            ->where('jenis_kelamin', $jk)
            ->get()
            ->getResultArray();
    }
    

    public function getRekomendasi($ras, $jk, $umur, $kota, $id_user){
        $id_userr[] = $id_user;
        $select = array(
            'kucing.id_kucing',
            'user.id_user', 
            'nama_kucing', 
            'id_ras', 
            'jenis_kelamin', 
            'umur', 
            'tentang', 
            'status_adopsi', 
            'foto', 
            'user.id_kota'
        );
        if($ras == NULL || $jk == NULL || $umur == NULL){ // jika belum melakukan pencarian
            $array1 = $this->db->table('kucing')
                        ->join('user', 'user.id_user = kucing.id_user', 'LEFT')
                        ->select($select)
                        ->where('status_adopsi', "Belum Diadopsi")
                        ->where('id_kota', $kota)
                        ->whereNotIn('kucing.id_user', $id_userr)
                        ->limit(6)
                        ->get()->getResultArray();
            $jumlah_rekomendasi = sizeof($array1);

            $data = $array1;

            if($jumlah_rekomendasi < 6){ //jika tidak ada hasilnya, tampilkan yg tidak sekota

                if($jumlah_rekomendasi != 0){
                    // mendapatkan id dari query pertama
                    foreach($array1 as $row){
                        $id_kucinggg[] = $row['id_kucing'];
                    }
                    $kucing = implode(",",$id_kucinggg);
                    $ids = explode(",", $kucing);

                    $array2 = $this->db->table('kucing')
                            ->join('user', 'user.id_user = kucing.id_user', 'LEFT')
                            ->select($select)
                            ->where('status_adopsi', "Belum Diadopsi")
                            ->whereNotIn('kucing.id_user', $id_userr)
                            ->whereNotIn('kucing.id_kucing', $ids)
                            ->limit(6-$jumlah_rekomendasi)
                            ->get()->getResultArray();
                }
                else{
                    $array2 = $this->db->table('kucing')
                    ->join('user', 'user.id_user = kucing.id_user', 'LEFT')
                    ->select($select)
                    ->where('status_adopsi', "Belum Diadopsi")
                    ->whereNotIn('kucing.id_user', $id_userr)
                    ->limit(6-$jumlah_rekomendasi)
                    ->get()->getResultArray();
                }
                // merge data kucing dari query pertama dan kedua
                $data = array_merge($array1, $array2);
            }
            return $data;
        }
        else{
            $jumlah_rekomendasi = 0;
            $array1 = $this->db->table('kucing')
            ->where('id_ras', $ras)
            ->where('jenis_kelamin', $jk)
            ->where('umur', $umur)
            ->join('user', 'user.id_user=kucing.id_user', 'LEFT')
            ->select($select)
            ->where('id_kota', $kota)
            ->where('status_adopsi', "Belum Diadopsi")
            ->whereNotIn('kucing.id_user', $id_userr)
            ->limit(6)
            ->get()->getResultArray();
            $jumlah_rekomendasi = sizeof($array1);
            // print_r($jumlah_rekomendasi);
            if($jumlah_rekomendasi < 6){
                if($jumlah_rekomendasi != 0){
                    // mendapatkan id dari query pertama
                    foreach($array1 as $row){
                        $id_kucinggg[] = $row['id_kucing'];
                    }
                    $kucing = implode(",",$id_kucinggg);
                    $ids = explode(",", $kucing);

                    $array2 = $this->db->table('kucing')
                    ->groupStart()
                        ->where('id_ras', $ras)
                        ->where('jenis_kelamin', $jk)
                        ->orGroupStart()
                            ->where('id_ras', $ras)
                            ->where('umur', $umur)
                            ->orGroupStart()
                                ->where('jenis_kelamin', $jk)
                                ->where('umur', $umur)
                                ->orGroupStart()
                                    ->where('jenis_kelamin', $jk)
                                    ->where('id_ras', $ras)
                                    ->orGroupStart()
                                        ->where('jenis_kelamin', $jk)
                                        ->where('umur', $umur)
                                        ->orGroupStart()
                                            ->where('jenis_kelamin', $jk)
                                            ->where('umur', $umur)
                                        ->groupEnd()
                                    ->groupEnd()
                                ->groupEnd()
                            ->groupEnd()
                        ->groupEnd()
                    ->groupEnd()
                    ->join('user', 'user.id_user = kucing.id_user', 'LEFT')
                    ->select($select)
                    ->where('id_kota', $kota)
                    ->where('status_adopsi', "Belum Diadopsi")
                    ->whereNotIn('kucing.id_kucing', $ids)
                    ->whereNotIn('kucing.id_user', $id_userr)
                    ->limit(6-$jumlah_rekomendasi)
                    ->get()->getResultArray();
                }
                else{
                    $array2 = $this->db->table('kucing')
                    ->groupStart()
                        ->where('id_ras', $ras)
                        ->where('jenis_kelamin', $jk)
                        ->orGroupStart()
                            ->where('id_ras', $ras)
                            ->where('umur', $umur)
                            ->orGroupStart()
                                ->where('jenis_kelamin', $jk)
                                ->where('umur', $umur)
                                ->orGroupStart()
                                    ->where('jenis_kelamin', $jk)
                                    ->where('id_ras', $ras)
                                    ->orGroupStart()
                                        ->where('jenis_kelamin', $jk)
                                        ->where('umur', $umur)
                                        ->orGroupStart()
                                            ->where('jenis_kelamin', $jk)
                                            ->where('umur', $umur)
                                        ->groupEnd()
                                    ->groupEnd()
                                ->groupEnd()
                            ->groupEnd()
                        ->groupEnd()
                    ->groupEnd()
                    ->join('user', 'user.id_user = kucing.id_user', 'LEFT')
                    ->select($select)
                    ->where('id_kota', $kota)
                    ->where('status_adopsi', "Belum Diadopsi")
                    ->whereNotIn('kucing.id_user', $id_userr)
                    ->limit(6-$jumlah_rekomendasi)
                    ->get()->getResultArray();
                }
                
                $jumlah_rekomendasi += sizeof($array2);//perbaharui jumlah
    
                if($jumlah_rekomendasi < 6){
                    if(sizeof($array2) != 0){
                        // mendapatkan id dari query kedua
                        foreach($array2 as $row){
                            $id_kucinggg[] = $row['id_kucing'];
                        }
                        $kucing = implode(",",$id_kucinggg);
                        $ids = explode(",", $kucing);
                        $array3 = $this->db->table('kucing')
                            ->groupStart()
                                ->where('id_ras', $ras)
                                ->orGroupStart()
                                    ->where('umur', $umur)
                                    ->orGroupStart()
                                        ->where('jenis_kelamin', $jk)
                                    ->groupEnd()
                                ->groupEnd()
                            ->groupEnd()
                            ->join('user', 'user.id_user = kucing.id_user', 'LEFT')
                            ->select($select)
                            ->where('id_kota', $kota)
                            ->where('status_adopsi', "Belum Diadopsi")
                            ->whereNotIn('kucing.id_kucing', $ids)
                            ->whereNotIn('kucing.id_user', $id_userr)
                            ->limit(6-$jumlah_rekomendasi)
                            ->get()->getResultArray();
                    }
                    else{
                        $array3 = $this->db->table('kucing')
                            ->groupStart()
                                ->where('id_ras', $ras)
                                ->orGroupStart()
                                    ->where('umur', $umur)
                                    ->orGroupStart()
                                        ->where('jenis_kelamin', $jk)
                                    ->groupEnd()
                                ->groupEnd()
                            ->groupEnd()
                            ->join('user', 'user.id_user = kucing.id_user', 'LEFT')
                            ->select($select)
                            ->where('id_kota', $kota)
                            ->where('status_adopsi', "Belum Diadopsi")
                            ->whereNotIn('kucing.id_user', $id_userr)
                            ->limit(6-$jumlah_rekomendasi)
                            ->get()->getResultArray();
                    }
    
                    $jumlah_rekomendasi += sizeof($array3); //perbaharui jumlah
    
                    if($jumlah_rekomendasi < 6){
                        if(sizeof($array3) != 0){
                            // mendapatkan id dari query ketiga
                            foreach($array3 as $row){
                                $id_kucinggg[] = $row['id_kucing'];
                            }
                            $kucing = implode(",",$id_kucinggg);
                            $ids = explode(",", $kucing);
                            
                            $array4 = $this->db->table('kucing')
                            ->join('user', 'user.id_user = kucing.id_user', 'LEFT')
                            ->select($select)
                            ->where('status_adopsi', "Belum Diadopsi")
                            ->whereNotIn('kucing.id_kucing', $ids)
                            ->whereNotIn('kucing.id_user', $id_userr)
                            ->limit(6-$jumlah_rekomendasi)
                            ->get()->getResultArray();
                        }
                        else{
                            $array4 = $this->db->table('kucing')
                            ->join('user', 'user.id_user = kucing.id_user', 'LEFT')
                            ->select($select)
                            ->where('status_adopsi', "Belum Diadopsi")
                            ->whereNotIn('kucing.id_user', $id_userr)
                            ->limit(6-$jumlah_rekomendasi)
                            ->get()->getResultArray();
                        }
                        $data = array_merge($array1, $array2, $array3, $array4);
                    }
                    else{
                        $data = array_merge($array1, $array2, $array3);
                    }
                }
                else {
                    // merge data kucing dari query pertama dan kedua
                    $data = array_merge($array1, $array2);
                }
            }
            else{
                $data = $array1;
            }
            return $data;
        }
    }

    // public function getRekomendasi_draft($ras, $jk, $umur, $kota){
    //     $select = array(
    //         'kucing.id_kucing',
    //         'user.id_user', 
    //         'nama_kucing', 
    //         'id_ras', 
    //         'jenis_kelamin', 
    //         'umur', 
    //         'tentang', 
    //         'status_adopsi', 
    //         'foto', 
    //         'user.id_kota',
    //         'count(id_likes) as jumlah_likes'
    //     );
    //     $jumlah_rekomendasi = 0;
    //     $array1 = $this->db->table('kucing')
    //     ->where('id_ras', $ras)
    //     ->where('jenis_kelamin', $jk)
    //     ->where('umur', $umur)
    //     ->join('likes', 'kucing.id_kucing=likes.id_kucing', 'LEFT')
    //     ->join('user', 'user.id_user=kucing.id_user', 'LEFT')
    //     ->groupBy('likes.id_kucing')
    //     ->select($select)
    //     ->where('id_kota', $kota)
    //     ->where('status_adopsi', "Belum Diadopsi")
    //     ->limit(6)
    //     ->orderBy('jumlah_likes', 'DESC')
    //     ->get()->getResultArray();
    //     $jumlah_rekomendasi = sizeof($array1);
    //     print_r($jumlah_rekomendasi);
    //     if($jumlah_rekomendasi < 6){
    //         // mendapatkan id dari query pertama
    //         foreach($array1 as $row){
    //             $id_kucinggg[] = $row['id_kucing'];
    //         }
    //         $kucing = implode(",",$id_kucinggg);
    //         $ids = explode(",", $kucing);

    //         $array2 = $this->db->table('kucing')
    //         ->groupStart()
    //             ->where('id_ras', $ras)
    //             ->where('jenis_kelamin', $jk)
    //             ->orGroupStart()
    //                 ->where('id_ras', $ras)
    //                 ->where('umur', $umur)
    //                 ->orGroupStart()
    //                     ->where('jenis_kelamin', $jk)
    //                     ->where('umur', $umur)
    //                     ->orGroupStart()
    //                         ->where('jenis_kelamin', $jk)
    //                         ->where('id_ras', $ras)
    //                         ->orGroupStart()
    //                             ->where('jenis_kelamin', $jk)
    //                             ->where('umur', $umur)
    //                             ->orGroupStart()
    //                                 ->where('jenis_kelamin', $jk)
    //                                 ->where('umur', $umur)
    //                             ->groupEnd()
    //                         ->groupEnd()
    //                     ->groupEnd()
    //                 ->groupEnd()
    //             ->groupEnd()
    //         ->groupEnd()
    //         ->join('likes', 'likes.id_kucing=kucing.id_kucing', 'LEFT')
    //         ->join('user', 'user.id_user = kucing.id_user', 'LEFT')
    //         ->groupBy('likes.id_kucing')
    //         ->select($select)
    //         ->where('id_kota', $kota)
    //         ->where('status_adopsi', "Belum Diadopsi")
    //         ->whereNotIn('kucing.id_kucing', $ids)
    //         ->groupBy('likes.id_kucing')
    //         ->limit(6-$jumlah_rekomendasi)
    //         ->orderBy('jumlah_likes', 'DESC')->get()->getResultArray();
            
    //         $jumlah_rekomendasi += sizeof($array2);//perbaharui jumlah

    //         if($jumlah_rekomendasi < 6){
    //             // mendapatkan id dari query kedua
    //             foreach($array2 as $row){
    //                 $id_kucinggg[] = $row['id_kucing'];
    //             }
    //             $kucing = implode(",",$id_kucinggg);
    //             $ids = explode(",", $kucing);
    //             $array3 = $this->db->table('kucing')
    //                 ->groupStart()
    //                     ->where('id_ras', $ras)
    //                     ->orGroupStart()
    //                         ->where('umur', $umur)
    //                         ->orGroupStart()
    //                             ->where('jenis_kelamin', $jk)
    //                         ->groupEnd()
    //                     ->groupEnd()
    //                 ->groupEnd()
    //                 ->join('likes', 'likes.id_kucing=kucing.id_kucing', 'LEFT')
    //                 ->join('user', 'user.id_user = kucing.id_user', 'LEFT')
    //                 ->groupBy('likes.id_kucing')
    //                 ->select($select)
    //                 ->where('id_kota', $kota)
    //                 ->where('status_adopsi', "Belum Diadopsi")
    //                 ->whereNotIn('kucing.id_kucing', $ids)
    //                 ->groupBy('likes.id_kucing')
    //                 ->limit(6-$jumlah_rekomendasi)
    //                 ->orderBy('jumlah_likes', 'DESC')->get()->getResultArray();

    //                 $jumlah_rekomendasi += sizeof($array3); //perbaharui jumlah

    //                 if($jumlah_rekomendasi < 6){
    //                     // mendapatkan id dari query ketiga
    //                     foreach($array3 as $row){
    //                         $id_kucinggg[] = $row['id_kucing'];
    //                     }
    //                     $kucing = implode(",",$id_kucinggg);
    //                     $ids = explode(",", $kucing);
                        
    //                     $array4 = $this->db->table('kucing')
    //                     ->join('likes', 'likes.id_kucing=kucing.id_kucing', 'LEFT')
    //                     ->join('user', 'user.id_user = kucing.id_user', 'LEFT')
    //                     ->groupBy('likes.id_kucing')
    //                     ->select($select)
    //                     ->where('status_adopsi', "Belum Diadopsi")
    //                     ->whereNotIn('kucing.id_kucing', $ids)
    //                     ->groupBy('likes.id_kucing')
    //                     ->limit(6-$jumlah_rekomendasi)
    //                     ->orderBy('jumlah_likes', 'DESC')->get()->getResultArray();
                        
    //                     $data = array_merge($array1, $array2, $array3, $array4);
    //                 }
    //                 else{
    //                     $data = array_merge($array1, $array2, $array3);
    //                 }
    //         }
    //         else {
    //             // merge data kucing dari query pertama dan kedua
    //             $data = array_merge($array1, $array2);
    //         }
    //     }
    //     else{
    //         $data = $array1;
    //     }
    //     return $data;
    // }
}
