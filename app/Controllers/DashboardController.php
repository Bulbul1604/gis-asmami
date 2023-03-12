<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ProdukModel;
use App\Models\UsahaModel;
use App\Models\UserModel;

class DashboardController extends ResourceController
{
    public function index()
    {
        $user = new UserModel();
        $usaha = new UsahaModel();
        $produk = new ProdukModel();

        $data['user'] = $user->where('akses', 'mitra')->findAll();
        $data['usaha'] = $usaha->findAll();
        $data['produk'] = $produk->findAll();
        $data['usahaa'] = count($data['usaha']);

        return view('dashboard/index', $data);
    }
}
