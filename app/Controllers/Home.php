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

        $data['user'] = $user->where('akses', 'mitra')->findAll();
        $data['usaha'] = $usaha->findAll();
        $data['produk'] = $produk->findAll();

        return view('dashboard/index', $data);
    }
}
