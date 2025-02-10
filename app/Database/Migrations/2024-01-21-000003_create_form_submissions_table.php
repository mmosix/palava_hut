<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFormSubmissionsTable extends Migration {
    public function up() {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'form_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'submission_type' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'submitted_by' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'submitted_at' => [
                'type' => 'DATETIME'
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'reviewed', 'approved', 'rejected'],
                'default' => 'pending'
            ],
            'deleted' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('form_id', 'forms', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('form_submissions');
    }

    public function down() {
        $this->forge->dropTable('form_submissions');
    }
}