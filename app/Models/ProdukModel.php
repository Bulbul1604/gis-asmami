<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table            = 'produk';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['usaha_id', 'nama_produk', 'deskripsi', 'stock', 'harga', 'kategori', 'foto'];

    function TampilProduk($id)
    {
        return $this->db->table('usaha')
            ->join('produk', 'produk.usaha_id=usaha.id')
            ->where('produk.id', $id)
            ->get()
            ->getFirstRow();
    }
    function TampilProdukAll($id)
    {
        return $this->db->table('produk')
            ->join('usaha', 'usaha.id=produk.usaha_id')
            ->where('produk.id', $id)
            ->get()
            ->getResultArray();
    }
    function TampilKategori($id, $kat)
    {
        return $this->db->table('produk')
            ->join('usaha', 'usaha.id=produk.usaha_id')
            ->where('usaha.id', $id)
            ->where('produk.kategori', $kat)
            ->get()
            ->getResultArray();
    }
    function TampilProdukAllAdm()
    {
        return $this->db->table('produk')
            ->join('usaha', 'usaha.id=produk.usaha_id')
            ->get()
            // ->getResultObject();
            ->getResultArray();
    }
    function TampilProdukAllLangLat()
    {
        return $this->db->table('produk')
            ->join('usaha', 'usaha.id=produk.usaha_id')
            ->where('lang_lat !=', NULL)
            ->get()
            ->getResultObject();
    }
}
