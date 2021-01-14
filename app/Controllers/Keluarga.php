<?php

namespace App\Controllers;

use App\Models\KeluargaModel;

class Keluarga extends BaseController
{
    protected $keluargaModel;
    public function __construct()
    {
        $this->keluargaModel = new KeluargaModel();
    }

    public function index()
    {
        //     $keluarga = $this->keluargaModel->findAll();

        $data = [
            'title' => 'Data Keluarga',
            'keluarga' => $this->keluargaModel->getKeluarga()
        ];
        // Connect database dengan manual
        // $db = \Config\Database::connect();
        // $keluarga = $db->query("SELECT * FROM keluarga");
        // dd($keluarga);
        // foreach ($keluarga->getResultArray() as $row) {
        //     d($row); 
        // } 



        return view('data/keluarga', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Keluarga',
            'keluarga' =>  $this->keluargaModel->getKeluarga($slug)
        ];


        // jika keluarga tidak ada di tabel 
        if (empty($data['keluarga'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('nama_lengkap ' . $slug . ' tidak ditemukan');
        }

        return view('data/detail_keluarga', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Keluarga',
            'validation' => \config\Services::validation()
        ];

        return view('aksi/createKeluarga', $data);
    }

    public function save()

    {
        if (!$this->validate([
            'nama_lengkap' => [
                'rules' => 'required|is_unique[keluarga.nama_lengkap]',
                'errors' => [
                    'required' => '{field} harus di isi !',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'nik' => [
                'rules' => 'required|is_unique[keluarga.nik]',
                'errors' => [
                    'required' => '{field} harus di isi !',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required[keluarga.jenis_kelamin]',
                'errors' => [
                    'required' => '{field} harus dipilih !'
                ]
            ],
            'tempat_lahir' => [
                'rules' => 'required[keluarga.tempat_lahir]',
                'errors' => [
                    'required' => '{field} harus di isi !'
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required[keluarga.tanggal_lahir]',
                'errors' => [
                    'required' => '{field} harus di isi !'
                ]
            ],
            'agama' => [
                'rules' => 'required[keluarga.agama]',
                'errors' => [
                    'required' => '{field} harus di isi !'
                ]
            ],
            'pendidikan' => [
                'rules' => 'required[keluarga.pendidikan]',
                'errors' => [
                    'required' => '{field} harus di isi !'
                ]
            ],
            'jenis_pekerjaan' => [
                'rules' => 'required[keluarga.jenis_pekerjaan]',
                'errors' => [
                    'required' => '{field} harus di isi !'
                ]
            ],
            'foto_keluarga' => [
                'rules' => 'max_size[foto_keluarga,2048]|is_image[foto_keluarga]|mime_in[foto_keluarga,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran file {field} terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]

            // 'nama_lengkap' => 'required|is_unique[keluarga.nama_lengkap]',
            // 'nik' => 'required|is_unique[keluarga.nik]'
        ])) {

            // $validation = \Config\Services::validation();
            // return redirect()->to('/keluarga/create')->withInput()->with('validation', $validation);
            return redirect()->to('/keluarga/create')->withInput();
        }
        // // AMBL FILE 
        $fileFoto = $this->request->getFile('foto_keluarga');
        // apakah tidak ada gambar yang diupload
        if ($fileFoto->getError() == 4) {
            $namaFoto = 'default.png';
        } else {
            // // pindahkan file ke folder img
            $fileFoto->move('imgKeluarga');
            // // ambil nama file foto
            $namaFoto = $fileFoto->getName();
        }
        // dd($fileFoto);

        $slug = url_title($this->request->getVar('nama_lengkap'), '-', true);
        // $slug =url_title($this->request->getVar('nama_lengkap'), '-', true);
        // dd($this->request->getVar('nama_lengkap'));
        $this->keluargaModel->save([
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'nik' => $this->request->getVar('nik'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'agama' => $this->request->getVar('agama'),
            'pendidikan' => $this->request->getVar('pendidikan'),
            'jenis_pekerjaan' => $this->request->getVar('jenis_pekerjaan'),
            'slug' => $slug,
            'foto_keluarga' => $namaFoto
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/keluarga/index');
    }

    public function delete($id)
    {
        // cari gambar berdasarkan id
        $keluarga = $this->keluargaModel->find($id);

        if ($keluarga['foto_keluarga'] != 'default.png') {
            // hapus gambar
            unlink('imgKeluarga/' . $keluarga['foto_keluarga']);
        }
        $this->keluargaModel->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/keluarga');
        // return redirect()to->('/keluarga/index');
    }
    public function edit($slug)
    {
        $data = [
            'title' => 'Form Ubah Data Keluarga',
            'validation' => \config\Services::validation(),
            'keluarga' => $this->keluargaModel->getKeluarga($slug)
        ];
        return view('aksi/editKeluarga', $data);
    }
    public function update($id)
    {
        // cek judul
        $keluargaLama = $this->keluargaModel->getKeluarga($this->request->getVar('slug'));
        if ($keluargaLama['nama_lengkap'] == $this->request->getVar('nama_lengkap')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[keluarga.nama_lengkap]';
        }

        $keluargaLama = $this->keluargaModel->getKeluarga($this->request->getVar('slug'));
        if ($keluargaLama['nik'] == $this->request->getVar('nik')) {
            $rule_nik = 'required';
        } else {
            $rule_nik = 'required|is_unique[keluarga.nik]';
        }



        if (!$this->validate([
            'nama_lengkap' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '{field} harus di isi !',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'nik' => [
                'rules' => $rule_nik,
                'errors' => [
                    'required' => '{field} harus di isi !',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required[keluarga.jenis_kelamin]',
                'errors' => [
                    'required' => '{field} harus dipilih !'
                ]
            ],
            'tempat_lahir' => [
                'rules' => 'required[keluarga.tempat_lahir]',
                'errors' => [
                    'required' => '{field} harus di isi !'
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required[keluarga.tanggal_lahir]',
                'errors' => [
                    'required' => '{field} harus di isi !'
                ]
            ],
            'agama' => [
                'rules' => 'required[keluarga.agama]',
                'errors' => [
                    'required' => '{field} harus di isi !'
                ]
            ],
            'pendidikan' => [
                'rules' => 'required[keluarga.pendidikan]',
                'errors' => [
                    'required' => '{field} harus di isi !'
                ]
            ],
            'jenis_pekerjaan' => [
                'rules' => 'required[keluarga.jenis_pekerjaan]',
                'errors' => [
                    'required' => '{field} harus di isi !'
                ]
            ],
            'foto_keluarga' => [
                'rules' => 'max_size[foto_keluarga,2048]|is_image[foto_keluarga]|mime_in[foto_keluarga,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran file {field} terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/keluarga/edit/' . $this->request->getVar('slug'))->withInput();
        }
        $fileFoto = $this->request->getFile('foto_keluarga');
        // cek gambar apakah tetap gambar lama 
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
        } else {
            // generat name random
            $namaFoto = $fileFoto->getRandomName();
            // pindahkan gambar
            $fileFoto->move('imgKeluarga', $namaFoto);
            // hapus file yang lama
            unlink('imgKeluarga/' . $this->request->getVar('fotoLama'));
        }


        // bedd
        $slug = url_title($this->request->getVar('nama_lengkap'), '-', true);
        $this->keluargaModel->save([
            'id' => $id,
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'nik' => $this->request->getVar('nik'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'agama' => $this->request->getVar('agama'),
            'pendidikan' => $this->request->getVar('pendidikan'),
            'jenis_pekerjaan' => $this->request->getVar('jenis_pekerjaan'),
            'slug' => $slug,
            'foto_keluarga' => $namaFoto
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/keluarga');
    }
}
