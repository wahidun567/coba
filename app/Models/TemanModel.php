<?php

namespace App\Models;

use CodeIgniter\Model;

class TemanModel extends Model
{
    protected $table = 'teman';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_lengkap', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'agama', 'alamat', 'slug', 'foto_teman'];

    public function getTeman($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
