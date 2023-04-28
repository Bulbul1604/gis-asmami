<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\UsahaModel;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        $user = new UserModel();
        $usaha = new UsahaModel();
        $produk = new ProdukModel();

        if (session()->get('akses') == "admin" or session()->get('akses') == "pimpinan") {
            $data['user'] = $user->where('akses', 'mitra')->findAll();
            $data['usaha'] = $usaha->findAll();
            $data['produk'] = $produk->findAll();
            $data['usahaa'] = count($data['usaha']);

            return view('dashboard/index', $data);
        }
        if (session()->get('akses') == "mitra") {
            $id = session()->get('usaha_id');
            $data['usaha'] = $usaha->TampilUsaha($id);
            $data['makanan'] = $produk->TampilKategori($id, 'makanan');
            $data['minuman'] = $produk->TampilKategori($id, 'minuman');
            return view('dashboard/index', $data);
        }
    }
}
