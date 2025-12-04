<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Address extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'address'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id', 'personal_info', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('stud_address');
    }

    public function down()
    {
        $this->forge->dropTable('stud_address');
    }
}
