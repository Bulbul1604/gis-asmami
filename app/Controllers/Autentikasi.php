<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsahaModel;
use App\Models\UserModel;

class Autentikasi extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function loginVerif()
    {
        $user = new UserModel();
        $usaha = new UsahaModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $dataUser = $user->where([
            'email' => $email,
        ])->first();
        if ($dataUser) {
            if (password_verify($password, $dataUser->password)) {
                $dataUsaha = $usaha->where([
                    'user_id' => $dataUser->id,
                ])->first();
                if ($dataUser->akses === 'mitra') {
                    if ($dataUsaha == NULL) {
                        session()->set([
                            'user_id' => $dataUser->id,
                            'name' => $dataUser->name,
                            'akses' => $dataUser->akses,
                            'logged_in' => TRUE
                        ]);
                    } else {
                        session()->set([
                            'user_id' => $dataUser->id,
                            'usaha_id' => $dataUsaha->id,
                            'pemilik_usaha' => $dataUsaha->pemilik_usaha,
                            'nama_usaha' => $dataUsaha->nama_usaha,
                            'name' => $dataUser->name,
                            'akses' => $dataUser->akses,
                            'logged_in' => TRUE
                        ]);
                    }
                } else {
                    session()->set([
                        'user_id' => $dataUser->id,
                        'name' => $dataUser->name,
                        'akses' => $dataUser->akses,
                        'logged_in' => TRUE
                    ]);
                }
                return redirect()->to(base_url('home'));
            } else {
                session()->setFlashdata('error', 'Username & Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username & Password Salah');
            return redirect()->back();
        }
    }

    public function register()
    {
        return view('auth/register');
    }

    public function registerVerif()
    {
        if (!$this->validate([
            'email' => [
                'rules' => 'required|is_unique[user.email]|valid_email',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'is_unique' => 'Email sudah digunakan sebelumnya',
                    'valid_email' => 'Silahkan masukkan email yang benar.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                ]
            ],
            'pemilik_usaha' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'no_wa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'nama_usaha' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $user = new UserModel();
        $usaha = new UsahaModel();
        $user->insert([
            'email' => $this->request->getVar('email'),
            'name' => $this->request->getVar('pemilik_usaha'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'akses' => 'mitra',
        ]);
        $usaha->insert([
            'user_id' => $user->getInsertID(),
            'pemilik_usaha' => $this->request->getVar('pemilik_usaha'),
            'no_wa' => $this->request->getVar('no_wa'),
            'nama_usaha' => $this->request->getVar('nama_usaha'),
        ]);
        session()->setFlashdata('success', 'Sukses');
        return redirect()->to('/login');
    }

    public function profile()
    {
        $user = new UserModel();
        $id = session()->get('user_id');
        $data['user'] = $user->join('usaha', 'usaha.user_id=user.id')->where('user.id', $id)->first();
        return view('auth/profile', $data);
    }

    function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
