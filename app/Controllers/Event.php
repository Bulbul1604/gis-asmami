<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EventModel;

class Event extends BaseController
{

    protected $event;
    protected $helpers = ['form'];
    public function __construct()
    {
        $this->event = new EventModel();
    }
    public function index()
    {
        $data['events'] = $this->event->findAll();
        return view('event/index', $data);
    }
    public function show($id)
    {
        $data['event'] = $this->event->tampilEvent($id);
        return view('event/show', $data);
    }
    public function create()
    {
        $data['validation'] = \Config\Services::validation();
        return view('event/create', $data);
    }
    public function save()
    {
        $datagambar = $this->request->getFile('gambar');
        $validation = $this->validate([
            'judul' => [
                'rules'  => 'required',
            ],
            'deskripsi' => [
                'rules'  => 'required',
            ],
            'gambar' => [
                'rules' => 'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,2048]',
            ],
            'tgl_buat' => [
                'rules'  => 'required|date',
            ],
        ]);
        if (!$validation) {
            return redirect()->to('/event/create')->withInput();
        }
        $fileName = $datagambar->getRandomName();
        $datagambar->move('uploads/event/', $fileName);
        $this->event->insert([
            'user_id'   => $this->request->getPost('user_id'),
            'judul'   => $this->request->getPost('judul'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'gambar'   => $fileName,
            'tgl_buat'   => $this->request->getPost('tgl_buat'),
        ]);
        session()->setFlashdata('message', 'Event Berhasil Disimpan');
        return redirect()->to('/event');
    }
    public function edit($id)
    {
        $data['event'] = $this->event->where('id', $id)->first();
        return view('event/edit', $data);
    }
    public function update($id)
    {
        $validation = $this->validate([
            'judul' => [
                'rules'  => 'required',
            ],
            'deskripsi' => [
                'rules'  => 'required',
            ],
            'gambar' => [
                'rules' => 'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,2048]',
            ],
            'tgl_buat' => [
                'rules'  => 'required|date',
            ],
        ]);

        if (!$validation) {
            return redirect()->to('/event/edit/' . $id)->withInput();
        }
        $dataFoto = $this->request->getFile('gambar');
        if ($dataFoto->getError() == 4) {
            $fileName = $this->request->getVar('gambarLama');
        } else {
            unlink('uploads/event/' . $this->request->getVar('gambarLama'));
            $fileName = $dataFoto->getRandomName();
            $dataFoto->move('uploads/event/', $fileName);
        }
        $this->event->update($id, [
            'user_id'   => $this->request->getPost('user_id'),
            'judul'   => $this->request->getPost('judul'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'gambar'   => $fileName,
            'tgl_buat'   => $this->request->getPost('tgl_buat'),
        ]);
        session()->setFlashdata('message', 'Event Berhasil Dirubah.');
        return redirect()->to(base_url('event'));
    }
    public function delete($id)
    {
        $this->event->delete($id);
        session()->setFlashdata('message', 'Event Berhasil Dihapus.');
        return redirect()->to('/event');
    }
}
