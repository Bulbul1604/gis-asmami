<?php

namespace App\Models;

use CodeIgniter\Model;

class UsahaModel extends Model
{
    protected $table            = 'usaha';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['user_id', 'pemilik_usaha', 'no_wa', 'nama_usaha', 'alamat', 'kecamatan', 'kelurahan', 'lang_lat'];

    function TampilUsaha($id)
    {
        return $this->db->table('usaha')
            ->join('produk', 'produk.usaha_id=usaha.id')
            ->where('usaha.id', $id)
            ->get()
            ->getResultArray();
    }
}
