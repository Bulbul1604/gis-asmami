<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\UsahaModel;
use App\Models\UserModel;

class UsahaController extends BaseController
{
    protected $usaha, $user, $produk;
    public function __construct()
    {
        $this->usaha = new UsahaModel();
        $this->user = new UserModel();
        $this->produk = new ProdukModel();
    }

    public function index()
    {
        $data['usaha'] = $this->usaha->findAll();
        return view('usaha/index', $data);
    }

    public function preview($id = null)
    {
        $data['usaha'] = $this->usaha->where('id', $id)->first();
        $idUsaha = $data['usaha']->id;
        $data['produk'] = $this->produk->where('usaha_id', $idUsaha)->findAll();
        return view('usaha/preview', $data);
    }

    public function new()
    {
        $data['kelurahan'] = [
            'Belimbing', 'Kanaan', 'Telihan', 'Berbas Pantai', 'Berbas Tengah', 'Bontang Lestari', 'Satimpo', 'Tanjung Laut', 'Tanjung Laut Indah', 'Api-Api', 'Bontang Baru', 'Bontang Kuala', 'Guntung', 'Gunung Elai', 'Lok Tuan',
        ];
        $data['kecamatan'] = ['bontang selatan', 'bontang barat', 'bontang utara'];
        $data['user'] = $this->user->where('akses', 'mitra')->findAll();
        return view('usaha/create', $data);
    }

    public function create()
    {
        helper(['form', 'url']);
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
            $data = [
                'kelurahan' => [
                    'Belimbing', 'Kanaan', 'Telihan', 'Berbas Pantai', 'Berbas Tengah', 'Bontang Lestari', 'Satimpo', 'Tanjung Laut', 'Tanjung Laut Indah', 'Api-Api', 'Bontang Baru', 'Bontang Kuala', 'Guntung', 'Gunung Elai', 'Lok Tuan',
                ],
                'kecamatan' => ['bontang selatan', 'bontang barat', 'bontang utara'],
                'user' => $this->user->where('akses', 'mitra')->findAll(),
                'validation' => $this->validator
            ];
            return view('usaha/create', $data);
        } else {
            //insert data into database
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
            //flash message
            session()->setFlashdata('message', 'Data Usaha Berhasil Disimpan');
            return redirect()->to(base_url('usaha'));
        }
    }

    public function edit($id = null)
    {
        $data['kelurahan'] = [
            'Belimbing', 'Kanaan', 'Telihan', 'Berbas Pantai', 'Berbas Tengah', 'Bontang Lestari', 'Satimpo', 'Tanjung Laut', 'Tanjung Laut Indah', 'Api-Api', 'Bontang Baru', 'Bontang Kuala', 'Guntung', 'Gunung Elai', 'Lok Tuan',
        ];
        $data['kecamatan'] = ['bontang selatan', 'bontang barat', 'bontang utara'];
        $data['usaha'] = $this->usaha->where('id', $id)->first();
        $data['lokasi'] = $data['usaha']->lang_lat;
        if ($data['lokasi'] == NULL) {
            $data['lokasi'] = "0.1372358, 117.4548496";
        }
        return view('usaha/edit', $data);
    }

    public function update($id = null)
    {
        helper(['form', 'url']);
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
            $data = [
                'kelurahan' => [
                    'Belimbing', 'Kanaan', 'Telihan', 'Berbas Pantai', 'Berbas Tengah', 'Bontang Lestari', 'Satimpo', 'Tanjung Laut', 'Tanjung Laut Indah', 'Api-Api', 'Bontang Baru', 'Bontang Kuala', 'Guntung', 'Gunung Elai', 'Lok Tuan',
                ],
                'kecamatan' => ['bontang selatan', 'bontang barat', 'bontang utara'],
                'user' => $this->user->where('akses', 'mitra')->findAll(),
                'validation' => $this->validator
            ];
            $data['lokasi'] = $data['usaha']->lang_lat;
            if ($data['lokasi'] == NULL) {
                $data['lokasi'] = "0.1372358, 117.4548496";
            }
            return view('usaha/edit', $data);
        } else {
            //insert data into database
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
            //flash message
            session()->setFlashdata('message', 'Usaha Berhasil Dirubah.');
            return redirect()->to(base_url('usaha'));
        }
    }

    public function delete($id = null)
    {
        $this->usaha->delete($id);
        return redirect('usaha');
    }
}
