<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Provider\Lorem;

class Paketlayanan extends Seeder
{
    public function run()
    {
        $data = [
            'layanan_id' => 1,
            'nama_paket' => 'Personal',
            'harga_paket' => 800000,
            'potongan_paket' => 100000,
            'detail_paket' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi modi repudiandae a dolore? Excepturi deleniti totam laborum facere, quod quas.'

        ];
        $this->db->table('paketlayanan')->insert($data);
    }
}
