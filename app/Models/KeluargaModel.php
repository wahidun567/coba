<?php

namespace App\Models;

use CodeIgniter\Model;

class KeluargaModel extends Model
{
    protected $table = 'keluarga';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_lengkap', 'nik', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'agama', 'pendidikan', 'jenis_pekerjaan', 'slug', 'foto_keluarga'];

    public function getKeluarga($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
    public function Search($keyword)
    {
        // $builder = $this->table('keluarga');
        // $builder->like('nama_lengkap', $keyword);
        // return $builder;

        // return $this->table('keluarga')->like('nama_lengkap', $keyword_keluarga)->orlike('nik', $keyword_keluarga);
        return $this->table('keluarga')->like('nama_lengkap', $keyword)->orLike('nik',$keyword);
    }
}
