<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\UsahaModel;
use CodeIgniter\RESTful\ResourceController;

class ProdukController extends ResourceController
{
    protected $produk, $usaha;
    public function __construct()
    {
        $this->produk = new ProdukModel();
        $this->usaha = new UsahaModel();
    }

    public function index()
    {
        $data['produk'] = $this->produk->findAll();
        return view('produk/index', $data);
    }

    public function new()
    {
        $data['usaha'] = $this->usaha->findAll();
        return view('produk/create', $data);
    }

    public function create()
    {
        helper(['form', 'url']);
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
                'rules' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,2048]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 2 MB'
                ]
            ],
        ]);
        if (!$validation) {
            $data = [
                'usaha' => $this->usaha->findAll(),
                'validation' => $this->validator
            ];
            return view('produk/create', $data);
        } else {
            $dataFoto = $this->request->getFile('foto');
            $fileName = $dataFoto->getRandomName();
            $this->produk->insert([
                'usaha_id'   => $this->request->getPost('usaha_id'),
                'nama_produk'   => $this->request->getPost('nama_produk'),
                'deskripsi'   => $this->request->getPost('deskripsi'),
                'stock'   => $this->request->getPost('stock'),
                'harga'   => $this->request->getPost('harga'),
                'kategori'   => $this->request->getPost('kategori'),
                'foto'   => $fileName,
            ]);
            $dataFoto->move('uploads/produk/', $fileName);
            session()->setFlashdata('message', 'Produk Berhasil Disimpan');
            return redirect()->to(base_url('produk'));
        }
    }

    public function edit($id = null)
    {
        $data['produk'] = $this->produk->where('id', $id)->first();
        return view('produk/edit', $data);
    }

    public function update($id = null)
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
                'rules' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,2048]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 2 MB'
                ]
            ],
        ]);
        if (!$validation) {
            $data = [
                'produk' => $this->produk->where('id', $id)->first(),
                'validation' => $this->validator
            ];
            return view('produk/edit', $data);
            // return redirect()->to('produk/edit/' . $this->request->getPost('id'))->withInput()->with('validation', $validation);
        } else {
            return "a";
        }
    }

    public function delete($id = null)
    {
        //
    }
}
