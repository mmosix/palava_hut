<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFormSubmissionValuesTable extends Migration {
    public function up() {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'submission_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'field_key' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'field_value' => [
                'type' => 'TEXT'
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('submission_id', 'form_submissions', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('form_submission_values');
    }

    public function down() {
        $this->forge->dropTable('form_submission_values');
    }
}