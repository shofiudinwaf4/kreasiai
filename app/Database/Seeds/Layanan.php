<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Layanan extends Seeder
{
    public function run()
    {
        $data = [
            'nama_layanan' => 'Website',
            'deskripsi_layanan' => 'kami menerima pembuatan website'
        ];
        $this->db->table('layanan')->insert($data);
    }
}
