<?php

namespace App\Database\Seeds;

use App\Models\Mahasiswa as ModelsMahasiswa;
use CodeIgniter\Database\Seeder;

class Mahasiswa extends Seeder
{
    public function run()
    {
        $this->mahasiswa = new ModelsMahasiswa();


        for ($i = 0; $i <= 3; $i++) {
            $data = [
                'npm' => '5183031101' . $i,
                'nama'    => 'fahmi ichwanurrohman',
                'gender'    => 'laki-laki',
                'jurusan'    => 'S1-Sistem Informasi',
                'asal'    => 'madiun',
                'umur'    => '23',
            ];
            $this->mahasiswa->insert($data);
        }


        // Using Query Builder
        // $this->d->table('mahasiswa')->insert($data);
    }
}
