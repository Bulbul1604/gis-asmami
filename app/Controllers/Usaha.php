<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\UsahaModel;
use App\Models\UserModel;

class Usaha extends BaseController
{
    protected $usaha, $user, $produk;
    protected $helpers = ['form'];
    protected $kelurahan = [
        'Belimbing', 'Kanaan', 'Telihan', 'Berbas Pantai', 'Berbas Tengah', 'Bontang Lestari', 'Satimpo', 'Tanjung Laut', 'Tanjung Laut Indah', 'Api-Api', 'Bontang Baru', 'Bontang Kuala', 'Guntung', 'Gunung Elai', 'Lok Tuan',
    ];
    protected $kecamatan = ['bontang selatan', 'bontang barat', 'bontang utara'];
    public function __construct()
    {
        $this->usaha = new UsahaModel();
        $this->user = new UserModel();
        $this->produk = new ProdukModel();
    }
    public function index()
    {
        if (session()->get('akses') == "mitra") {
            $id = session()->get('usaha_id');
            $data['usaha'] = $this->usaha->where('id', $id)->find();
        }
        if (session()->get('akses') == "admin" or session()->get('akses') == "pimpinan") {
            $data['usaha'] = $this->usaha->findAll();
        }
        return view('usaha/index', $data);
    }
    public function show($id)
    {
        $data['usaha'] = $this->usaha->where('id', $id)->first();
        $idUsaha = $data['usaha']->id;
        $data['produk'] = $this->produk->where('usaha_id', $idUsaha)->findAll();
        // dd($this->produk->TampilProdukAll($idUsaha));
        return view('usaha/show', $data);
    }
    public function create()
    {
        $data['kelurahan'] = $this->kelurahan;
        $data['kecamatan'] = $this->kecamatan;
        $data['user'] = $this->user->where('akses', 'mitra')->findAll();
        return view('usaha/create', $data);
    }
    public function save()
    {
        $validation = $this->validate([
            'user_id' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Pemilik Usaha harus diisi.'
                ]
            ],
            'pemilik_usaha' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama Lengkap harus diisi.'
                ]
            ],
            'no_wa' => [
                'rules'  => 'required|numeric',
                'errors' => [
                    'required' => 'Nomor WhatsApp harus diisi.',
                    'numeric' => 'Nomor WhatsApp wajib diisi dengan angka.'
                ]
            ],
            'nama_usaha' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama Usaha harus diisi.',
                ]
            ],
            'alamat' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi.',
                ]
            ],
            'kelurahan' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kelurahan harus diisi.',
                ]
            ],
            'kecamatan' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kecamatan harus diisi.',
                ]
            ],
            'lang_lat' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Koordinat lokasi harus diisi.',
                ]
            ],
        ]);
        if (!$validation) {
            return redirect()->to('/usaha/create')->withInput();
        }
        $this->usaha->insert([
            'user_id'   => $this->request->getPost('user_id'),
            'pemilik_usaha'   => $this->request->getPost('pemilik_usaha'),
            'no_wa'   => $this->request->getPost('no_wa'),
            'nama_usaha'   => $this->request->getPost('nama_usaha'),
            'alamat'   => $this->request->getPost('alamat'),
            'kelurahan'   => $this->request->getPost('kelurahan'),
            'kecamatan'   => $this->request->getPost('kecamatan'),
            'lang_lat'   => $this->request->getPost('lang_lat'),
        ]);
        session()->setFlashdata('message', 'Data usaha berhasil disimpan');
        return redirect()->to('/usaha');
    }
    public function edit($id)
    {
        $data['kelurahan'] = $this->kelurahan;
        $data['kecamatan'] = $this->kecamatan;
        $data['usaha'] = $this->usaha->where('id', $id)->first();
        $data['lokasi'] = $data['usaha']->lang_lat;
        if ($data['lokasi'] == NULL) {
            $data['lokasi'] = "0.1372358, 117.4548496";
        }
        return view('usaha/edit', $data);
    }
    public function update($id)
    {
        $validation = $this->validate([
            'user_id' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Pemilik Usaha harus diisi.'
                ]
            ],
            'pemilik_usaha' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama Lengkap harus diisi.'
                ]
            ],
            'no_wa' => [
                'rules'  => 'required|numeric',
                'errors' => [
                    'required' => 'Nomor WhatsApp harus diisi.',
                    'numeric' => 'Nomor WhatsApp wajib diisi dengan angka.'
                ]
            ],
            'nama_usaha' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama Usaha harus diisi.',
                ]
            ],
            'alamat' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi.',
                ]
            ],
            'kelurahan' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kelurahan harus diisi.',
                ]
            ],
            'kecamatan' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kecamatan harus diisi.',
                ]
            ],
            'lang_lat' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Koordinat lokasi harus diisi.',
                ]
            ],
        ]);

        if (!$validation) {
            return redirect()->to('/usaha/edit/' . $id)->withInput();
        }
        $this->usaha->update($id, [
            'user_id'   => $this->request->getPost('user_id'),
            'pemilik_usaha'   => $this->request->getPost('pemilik_usaha'),
            'no_wa'   => $this->request->getPost('no_wa'),
            'nama_usaha'   => $this->request->getPost('nama_usaha'),
            'alamat'   => $this->request->getPost('alamat'),
            'kelurahan'   => $this->request->getPost('kelurahan'),
            'kecamatan'   => $this->request->getPost('kecamatan'),
            'lang_lat'   => $this->request->getPost('lang_lat'),
        ]);
        session()->setFlashdata('message', 'Data usaha berhasil dirubah.');
        return redirect()->to('/usaha');
    }
    public function delete($id)
    {
        $this->usaha->delete($id);
        return redirect()->to('/usaha');
    }
}
