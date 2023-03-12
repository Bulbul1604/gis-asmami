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
}
