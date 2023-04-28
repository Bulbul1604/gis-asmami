<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\UsahaModel;
use App\Controllers\BaseController;

class Produk extends BaseController
{
    protected $produk, $usaha;
    protected $helpers = ['form'];
    public function __construct()
    {
        $this->produk = new ProdukModel();
        $this->usaha = new UsahaModel();
    }
    public function index()
    {
        if (session()->get('akses') == "mitra") {
            $id = session()->get('usaha_id');
            $data['produk'] = $this->usaha->TampilProdukAllMitra($id);
        }
        if (session()->get('akses') == "admin" or session()->get('akses') == "pimpinan") {
            $data['produk'] = $this->usaha->TampilProdukAllAdm();
        }
        return view('produk/index', $data);
    }
    public function create()
    {
        $data['usaha'] = $this->usaha->findAll();
        // $data['usaha'] = $this->usaha->getUsaha();
        // dd($data['usaha']);
        return view('produk/create', $data);
    }
    public function save()
    {
        $dataFoto = $this->request->getFile('foto');
        $validation = $this->validate([
            'usaha_id' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama usaha harus diisi.'
                ]
            ],
            'nama_produk' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama produk harus diisi.'
                ]
            ],
            'deskripsi' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Deskripsi harus diisi.'
                ]
            ],
            'stock' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Stok harus diisi.'
                ]
            ],
            'harga' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Harga harus diisi.'
                ]
            ],
            'kategori' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kategori harus diisi.'
                ]
            ],
            'foto' => [
                'rules' => 'mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,2048]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 2 MB'
                ]
            ],
        ]);
        if (!$validation) {
            return redirect()->to('/produk/create')->withInput();
        }
        if ($dataFoto->getError() == 4) {
            $fileName = 'default.jpg';
        } else {
            $fileName = $dataFoto->getRandomName();
            $dataFoto->move('uploads/produk/', $fileName);
        }
        $harga = $this->request->getPost('harga') . '000';
        $this->produk->insert([
            'usaha_id'   => $this->request->getPost('usaha_id'),
            'nama_produk'   => $this->request->getPost('nama_produk'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'stock'   => $this->request->getPost('stock'),
            'harga'   => $harga,
            'kategori'   => $this->request->getPost('kategori'),
            'foto'   => $fileName,
        ]);
        session()->setFlashdata('message', 'Data produk berhasil ditambahkan.');
        return redirect()->to('/produk');
    }
    public function edit($id)
    {
        // $data['produk'] = $this->produk->where('id', $id)->first();
        $data['produk'] = $this->produk->TampilProduk($id);
        return view('produk/edit', $data);
    }
    public function update($id)
    {
        $validation = $this->validate([
            'usaha_id' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama usaha harus diisi.'
                ]
            ],
            'nama_produk' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama produk harus diisi.'
                ]
            ],
            'deskripsi' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Deskripsi harus diisi.'
                ]
            ],
            'stock' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Stok harus diisi.'
                ]
            ],
            'harga' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Harga harus diisi.'
                ]
            ],
            'kategori' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kategori harus diisi.'
                ]
            ],
            'foto' => [
                'rules' => 'mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,2048]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 2 MB'
                ]
            ],
        ]);
        if (!$validation) {
            return redirect()->to('/produk/edit/' . $id)->withInput();
        }
        $dataFoto = $this->request->getFile('foto');
        if ($dataFoto->getError() == 4) {
            $fileName = $this->request->getVar('fotoLama');
        } else {
            $fileName = $dataFoto->getRandomName();
            $dataFoto->move('uploads/produk/', $fileName);
            unlink('uploads/produk/' . $this->request->getVar('fotoLama'));
        }
        $this->produk->update($id, [
            'usaha_id'   => $this->request->getPost('usaha_id'),
            'nama_produk'   => $this->request->getPost('nama_produk'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'stock'   => $this->request->getPost('stock'),
            'harga'   => $this->request->getPost('harga'),
            'kategori'   => $this->request->getPost('kategori'),
            'foto'   => $fileName,
        ]);
        session()->setFlashdata('message', 'Data produk berhasil ditambahkan.');
        return redirect()->to('/produk');
    }
    public function delete($id)
    {
        $produk = $this->produk->find($id);
        if ($produk->foto != null) {
            unlink('uploads/produk/' . $produk->foto);
        }
        $this->produk->delete($id);
        session()->setFlashdata('message', 'Data produk berhasil dihapus.');
        return redirect()->to('/produk');
    }
}
