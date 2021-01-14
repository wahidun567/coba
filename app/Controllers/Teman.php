<?php

namespace App\Controllers;

use App\Models\TemanModel;

class Teman extends BaseController
{
    protected $temanModel;
    public function __construct()
    {
        $this->temanModel = new TemanModel();
    }
    public function index()
    {
        // $teman = $this->temanModel->findAll();
        $data = [
            'title' => 'Data Pertemanan',
            'teman' => $this->temanModel->getTeman()
        ];


        // cara mengecek connect ke data base

        // $temanModel = new TemanModel();
        // $teman = $temanModel->findAll();
        // dd($teman);

        return view('data/teman', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Teman',
            'teman' => $this->temanModel->getTeman($slug)
        ];

        if (empty($data['teman'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('nama_lengkap ' . $slug . ' tidak ditemukan.');
        }
        return view('data/detail_teman', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Teman',
            'validation' => \config\Services::validation()
        ];
        return view('aksi/createTeman', $data);
    }

    public function save()
    {

        if (!$this->validate([
            'nama_lengkap' => [
                'rules' => 'required|is_unique[teman.nama_lengkap]',
                'errors' => [
                    'required' => '{field} harus di isi !',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required[teman.jenis_kelamin]',
                'errors' => [
                    'required' => '{field} harus di pilih !'
                ]
            ],
            'tempat_lahir' => [
                'rules' => 'required[teman.tempat_lahir]',
                'errors' => [
                    'required' => '{field} harus di isi !'
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required[teman.tanggal_lahir]',
                'errors' => [
                    'required' => '{field} harus di isi !'
                ]
            ],
            'agama' => [
                'rules' => 'required[teman.agama]',
                'errors' => [
                    'required' => '{field} harus di isi !'
                ]
            ],
            'alamat' => [
                'rules' => 'required[teman.alamat]',
                'errors' => [
                    'required' => '{field} harus di isi !'
                ]
            ],
            'foto_teman' => [
                'rules' => 'max_size[foto_teman,2048]|is_image[foto_teman]|mime_in[foto_teman,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran file {field} terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
            // 'nama_lengkap' => 'required|is_unique[teman.nama_lengkap]'
        ])) {
            // $validation = \config\Services::validation();
            return redirect()->to('/teman/create')->withInput();
        }

        // // AMBL FILE 
        $fileFoto = $this->request->getFile('foto_teman');
        if ($fileFoto->getError() == 4) {
            $namaFoto = 'default.png';
        } else {
            // // pindahkan file ke folder img
            $fileFoto->move('imgTeman');
            // // ambil nama file foto
            $namaFoto = $fileFoto->getName();
        }
        // dd($fileFoto);



        $slug = url_title($this->request->getVar('nama_lengkap'), '-', true);
        // dd($this->request->getVar('nama_lengkap'));
        $this->temanModel->save([
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'agama' => $this->request->getVar('agama'),
            'alamat' => $this->request->getVar('alamat'),
            'slug' => $slug,
            'foto_teman' => $namaFoto
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/teman/index');
    }

    public function delete($id)
    {
        // cari gambar berdasarkan id
        $teman = $this->temanModel->find($id);
        if ($teman['foto_teman'] != 'default.png') {
            // hapus gambar
            unlink('imgTeman/' . $teman['foto_teman']);
        }

        $this->temanModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/teman');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form Ubah Data Teman',
            'validation' => \config\Services::validation(),
            'teman' => $this->temanModel->getTeman($slug)
        ];
        return view('aksi/editTeman', $data);
    }

    public function update($id)
    {
        // $temanLama = $this->temanModel->getTeman($this->request->getVar('slug'));
        // if ($temanLama['nama_lengkap'] == $this->request->getVar('nama_lengkap')) {
        //     $rules_nama = 'required';
        // } else {
        //     $rules_nama = 'required|is_unique[keluarga.nama_lengkap]';
        // }
        $temanLama = $this->temanModel->getTeman($this->request->getVar('slug'));
        if ($temanLama['nama_lengkap'] == $this->request->getVar('nama_lengkap')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[teman.nama_lengkap]';
        }

        if (!$this->validate([
            'nama_lengkap' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '{field} harus di isi !',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required[teman.jenis_kelamin]',
                'errors' => [
                    'required' => '{field} harus di pilih !'
                ]
            ],
            'tempat_lahir' => [
                'rules' => 'required[teman.tempat_lahir]',
                'errors' => [
                    'required' => '{field} harus di isi !'
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required[teman.tanggal_lahir]',
                'errors' => [
                    'required' => '{field} harus di isi !'
                ]
            ],
            'agama' => [
                'rules' => 'required[teman.agama]',
                'errors' => [
                    'required' => '{field} harus di isi !'
                ]
            ],
            'alamat' => [
                'rules' => 'required[teman.alamat]',
                'errors' => [
                    'required' => '{field} harus di isi !'
                ]
            ],
            'foto_teman' => [
                'rules' => 'max_size[foto_teman,2048]|is_image[foto_teman]|mime_in[foto_teman,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran file {field} terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
            // 'nama_lengkap' => 'required|is_unique[teman.nama_lengkap]'
        ])) {
            // $validation = \config\Services::validation();
            return redirect()->to('/teman/edit/' . $this->request->getVar('slug'))->withInput();
        }
        $fileFoto = $this->request->getFile('foto_teman');
        // cek gambar apakah tetap gambar lama 
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
        } else {
            // generat name random
            $namaFoto = $fileFoto->getRandomName();
            // pindahkan gambar
            $fileFoto->move('imgTeman', $namaFoto);
            // hapus file yang lama
            unlink('imgTeman/' . $this->request->getVar('fotoLama'));
        }

        $slug = url_title($this->request->getVar('nama_lengkap'), '-', true);
        $this->temanModel->save([
            'id' => $id,
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'agama' => $this->request->getVar('agama'),
            'alamat' => $this->request->getVar('alamat'),
            'slug' => $slug,
            'foto_teman' => $namaFoto
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/teman');
    }
}
