<?php

namespace App\Controllers;

use App\Models\OrangModel;

class Orang extends BaseController
{
    protected $orangModel;
    public function __construct()
    {
        $this->orangModel = new OrangModel();
    }

    public function index()
    {
        // currentpage dibawah adalah method untuk membuat bar terpisah dalam pembuatan pagination
        $currentpage = $this->request->getVar('page_orang') ? $this->request->getVar('page_orang') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $orang = $this->orangModel->search($keyword);
        } else {
            $orang = $this->orangModel;
        }
        $data = [
            'title' => 'Daftar Orang',
            'orang' => $orang->paginate(5, 'orang'),
            'pager' => $this->orangModel->pager,
            'currentpage' => $currentpage
        ];
        return view('data/orang', $data);
    }
    // method tambah
    public function create()
    {
        $data = [
            'title' => 'Form Tambah Daftar Orang',
            'validation' => \config\Services::validation()
        ];
        return view('aksi/createOrang', $data);
    }
    /* fungction save dengan feature validasi */
    public function save()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[orang.nama]',
                'errors' => [
                    'required' => 'Nama lengkap harus di isi !',
                    'is_unique' => 'Nama lengkap sudah terdaftar'
                ]
            ],
            'alamat' => [
                'rules' => 'required[orang.alamat]',
                'errors' => [
                    'required' => 'Alamat harus di isi !'
                ]
            ]
        ])) {
            return redirect()->to('/orang/create')->withInput();
        }

        $this->orangModel->save([
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/orang');
    }
    /* dibawah ini adalah method delete */
    public function delete($id)
    {
        $this->orangModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/orang');
    }
    public function edit($id)
    {
        $data = [
            'title' => 'Form Ubah Daftar Orang',
            'validation' => \config\Services::validation(),
            'orang' => $this->orangModel->getOrang($id)
        ];
        return view('aksi/editOrang', $data);
    }
    public function update($id)
    {
        // if (!$this->validate([
        //     'nama' => [
        //         'rules' => 'required|is_unique[orang.nama]',
        //         'errors' => [
        //             'required' => 'Nama lengkap harus di isi !',
        //             'is_unique' => 'Nama lengkap sudah terdaftar'
        //         ]
        //     ],
        //     'alamat' => [
        //         'rules' => 'required[orang.alamat]',
        //         'errors' => [
        //             'required' => 'Alamat harus di isi !'
        //         ]
        //     ]
        // ])) {
        //     return redirect()->to('/orang/edit/' . $this->request->getVar('id'))->withInput();
        // }

        $this->orangModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/orang');
    }


    // public function update($id)
    // {
    //     // dd($this->request->getVar());
    //     $orangLama = $this->orangModel->getOrang($this->request->getVar('nama'));
    //     if ($orangLama['nama'] == $this->request->getVar('nama')) {
    //         $rule_nama = 'required';
    //     } else {
    //         $rule_nama = 'required|is_unique[orang.nama]';
    //     }

    //     if (!$this->validate([
    //         'nama' => [
    //             'rules' => $rule_nama,
    //             'errors' => [   
    //                 'required' => '{field} harus di isi !',
    //                 'is_unique' => '{field} sudah terdaftar'
    //             ]
    //         ],
    //         'alamat' => [
    //             'rules' => 'required[orang.alamat]',
    //             'errors' => [
    //                 'required' => '{field} harus di isi !'
    //             ]
    //         ]
    //     ])) {
    //         return redirect()->to('/orang/edit/' . $this->request->getVar('id'))->withInput();
    //     }
    //     $this->orangModel->save([
    //         'id' => $id,
    //         'nama' => $this->request->getVar('nama'),
    //         'alamat' => $this->request->getVar('alamat'),
    //     ]);
    //     session()->setFlashdata('pesan', 'Data berhasil diubah');
    //     return redirect()->to('/orang');
    // }
}
