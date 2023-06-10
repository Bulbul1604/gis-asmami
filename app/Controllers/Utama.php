<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EventModel;
use App\Models\ProdukModel;
use App\Models\UsahaModel;

class Utama extends BaseController
{
    protected $produk, $usaha, $event;
    public function __construct()
    {
        $this->produk = new ProdukModel();
        $this->usaha = new UsahaModel();
        $this->event = new EventModel();
    }
    public function index()
    {
        $data['produk'] = $this->produk->findAll(6);
        $data['usaha'] = $this->usaha->where('lang_lat !=', NULL)->findAll();
        // $data['usaha'] = $this->produk->TampilProdukAllLangLat();
        return view('index', $data);
    }
    public function detail($id)
    {
        $data['usaha'] = $this->usaha->where('id', $id)->first();
        $idUsaha = $data['usaha']->id;
        $data['produk'] = $this->produk->where('usaha_id', $idUsaha)->findAll();
        // dd($this->produk->TampilProdukAll($idUsaha));
        return view('detail', $data);
    }
    public function listProduk()
    {
        // $data['produk'] = $this->produk->findAll();
        $data['produk'] = $this->usaha->TampilProdukAllAdm();
        return view('list-produk', $data);
    }
    public function listEvent()
    {
        $data['events'] = $this->event->findAll();
        return view('list-event', $data);
    }
    public function listEventDetail($id)
    {
        $data['event'] = $this->event->tampilEvent($id);
        return view('list-event-show', $data);
    }
}
