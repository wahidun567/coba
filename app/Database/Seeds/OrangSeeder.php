<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class OrangSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        // $data = [
        //     'nama_lengkap' => 'Muhammad Nur Wahid',
        //     'jenis_kelamin'    => 'Laki-Laki',
        //     'tempat_lahir'    => 'Tuban',
        //     'tanggal_lahir'    => '160403',
        //     'agama'    => 'Islam',
        //     'alamat'    => 'balaablabsdl',
        //     'foto_teman'    => 'wahid.jpg',
        //     'created_at' => Time::now(),
        //     'updated_at' => Time::now()
        // ];
        $faker = \Faker\Factory::create();
        $data = [
            // $agama = $this->request->autorandom('islam'|'kristen'|'budha'|'hindu'),
            // $jenis = $this->request->autorandom('Laki-Laki'|'perempuan'),
            'nama_lengkap' =>$faker->name,
            'jenis_kelamin'=>'laki-laki',
            'tempat_lahir' =>$faker->city,
            'tanggal_lahir'=>$faker->dateTime,
            'agama'=> 'islam',
            'alamat' => $faker->address,
            'foto_teman' => 'wahid.jpg',
            'created_at' => Time::now(),
            'updated_at' => Time::now()
            



        ];
        // Simple Queries
        // $this->db->query(
        //     "INSERT INTO orang (nama_lengkap, jenis_kelamin, tempat_lahir, tanggal_lahir, agama, alamat, foto_teman,created_at,updated_at) 
        //     VALUES(:nama_lengkap:, :jenis_kelamin:, :tempat_lahir:, :tanggal_lahir:, :agama:, :alamat:, :foto_teman:,:created_at:,:updated_at:)",
        //     $data
        // );

        // Using Query Builder
        $this->db->table('orang')->insert($data);
        // $this->db->table('orang')->insertBatch($data);
    }
}
