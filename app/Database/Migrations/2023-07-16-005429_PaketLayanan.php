<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PaketLayanan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'paket_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'layanan_id' => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
            'nama_paket' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'harga_paket' => [
                'type'       => 'INT',
                'constraint' => '15',
            ],
            'potongan_paket' => [
                'type'       => 'INT',
                'constraint' => '15',
            ],
            'detail_paket' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ]
        ]);
        $this->forge->addKey('paket_id', true);
        $this->forge->createTable('paketLayanan');
    }

    public function down()
    {
        $this->forge->dropTable('paketLayanan');
    }
}
