<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StudContact extends Migration
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
            'contact'       => [
                'type'       => 'VARCHAR',
                'constraint' => '15',
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id', 'personal_info', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('stud_contact');
    }

    public function down()
    {
        $this->forge->dropTable('stud_contact');
    }
}
