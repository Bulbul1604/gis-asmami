<?php

namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
    protected $table            = 'event';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = [
        'user_id', 'judul', 'deskripsi', 'gambar', 'tgl_buat'
    ];

    function tampilEvent($id)
    {
        return $this->db->table('event')
            ->join('user', 'event.user_id=user.id')
            ->where('event.id', $id)
            ->get()
            ->getResultArray();
    }
}
