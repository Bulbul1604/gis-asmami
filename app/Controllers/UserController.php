<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class UserController extends ResourceController
{
    protected $users;
    public function __construct()
    {
        $this->users = new UserModel();
    }

    public function index()
    {
        $data['users'] = $this->users->where('akses', 'mitra')->orWhere('akses', 'pimpinan')->findAll();
        return view('users/index', $data);
    }

    public function new()
    {
        return view('users/create');
    }

    public function create()
    {
        $validation = $this->validate([
            'name' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi.'
                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[user.email]|valid_email',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => 'Email sudah digunakan sebelumnya',
                    'valid_email' => 'Silahkan masukkan email yang benar.'
                ]
            ],
            'akses' => [
                'rules' => 'required|in_list[mitra,pimpinan]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'in_list' => 'Akses yang dipilih tidak sesuai.',
                ]
            ],
        ]);
        if (!$validation) {
            return view('users/create', [
                'validation' => $this->validator
            ]);
        }
        $this->users->insert([
            'name'   => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('akses') . '123', PASSWORD_DEFAULT),
            'akses' => $this->request->getPost('akses'),
        ]);
        session()->setFlashdata('message', 'User Berhasil Disimpan');
        return redirect()->to(base_url('users'));
    }

    public function edit($id = null)
    {
        $data['user'] = $this->users->where('id', $id)->first();
        return view('users/edit', $data);
    }

    public function update($id = null)
    {
        //load helper form and URL
        helper(['form', 'url']);

        //define validation
        $validation = $this->validate([
            'name' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi.'
                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[user.email]|valid_email',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => 'Email sudah digunakan sebelumnya',
                    'valid_email' => 'Silahkan masukkan email yang benar.'
                ]
            ],
            'akses' => [
                'rules' => 'required|in_list[mitra,pimpinan]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'in_list' => 'Akses yang dipilih tidak sesuai.',
                ]
            ],
        ]);

        if (!$validation) {
            $data = [
                'user' => $this->users->where('id', $id)->first(),
                'validation' => $this->validator
            ];
            //render view with error validation message
            return view('users/edit', $data);
        } else {
            //insert data into database
            $this->users->update($id, [
                'name'   => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'akses' => $this->request->getPost('akses'),
            ]);
            //flash message
            session()->setFlashdata('message', 'User Berhasil Dirubah.');
            return redirect()->to(base_url('users'));
        }
    }

    public function delete($id = null)
    {
        $this->users->delete($id);
        return redirect('users');
    }
}
