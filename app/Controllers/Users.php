<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class Users extends BaseController
{
    protected $user;
    protected $helpers = ['form'];
    public function __construct()
    {
        $this->user = new UserModel();
    }
    public function index()
    {
        $data['users'] = $this->user->where('akses', 'mitra')->orWhere('akses', 'pimpinan')->findAll();
        return view('users/index', $data);
    }
    public function create()
    {
        $data['validation'] = \Config\Services::validation();
        return view('users/create', $data);
    }
    public function save()
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
                    'required' => 'Email harus diisi',
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
            return redirect()->to('/users/create')->withInput();
        }
        $this->user->insert([
            'name'   => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('akses') . '123', PASSWORD_DEFAULT),
            'akses' => $this->request->getPost('akses'),
        ]);
        session()->setFlashdata('message', 'User Berhasil Disimpan');
        return redirect()->to('/users');
    }
    public function edit($id)
    {
        $data['user'] = $this->user->where('id', $id)->first();
        return view('users/edit', $data);
    }
    public function update($id)
    {
        $usersOld = $this->user->where('id', $id)->first();
        if ($usersOld->email == $this->request->getVar('email')) {
            $rule_email = 'required|valid_email';
        } else {
            $rule_email = 'required|is_unique[user.email]|valid_email';
        }
        $validation = $this->validate([
            'name' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi.'
                ]
            ],
            'email' => [
                'rules' => $rule_email,
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
            return redirect()->to('/users/edit/' . $id)->withInput();
        }
        $this->user->update($id, [
            'name'   => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'akses' => $this->request->getPost('akses'),
        ]);
        session()->setFlashdata('message', 'User Berhasil Dirubah.');
        return redirect()->to(base_url('users'));
    }
    public function delete($id)
    {
        $this->user->delete($id);
        return redirect()->to('/users');
    }
}
