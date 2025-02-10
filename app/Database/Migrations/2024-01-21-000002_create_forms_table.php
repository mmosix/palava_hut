<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFormsTable extends Migration {
    public function up() {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'form_type' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['active', 'inactive'],
                'default' => 'active'
            ],
            'created_by' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'created_at' => [
                'type' => 'DATETIME'
            ],
            'deleted' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('forms');
    }

    public function down() {
        $this->forge->dropTable('forms');
    }
}