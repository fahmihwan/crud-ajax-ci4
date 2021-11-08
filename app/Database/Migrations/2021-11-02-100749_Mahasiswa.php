<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'npm'       => [
                'type'       => 'VARCHAR',
                'constraint' => '15',
            ],
            'nama'       => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'gender'       => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'jurusan'       => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'asal'       => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'umur'       => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('mahasiswa');
    }

    public function down()
    {
        $this->forge->dropTable('mahasiswa');
    }
}
