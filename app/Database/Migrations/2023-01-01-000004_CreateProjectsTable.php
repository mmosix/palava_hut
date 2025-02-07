<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INTEGER',
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '191',
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'client_id' => [
                'type' => 'INTEGER',
                'constraint' => '11',
            ],
            'contractor_id' => [
                'type' => 'INTEGER',
                'constraint' => '11',
                'null' => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'in_progress', 'completed', 'cancelled'],
                'default' => 'pending',
            ],
            'start_date' => [
                'type' => 'DATE',
            ],
            'estimated_completion_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'actual_completion_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'budget' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true,
            ],
            'completion_percentage' => [
                'type' => 'INTEGER',
                'default' => 0,
            ],
            'blockchain_contract_id' => [
                'type' => 'VARCHAR',
                'constraint' => '191',
                'unique' => true,
            ],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'null'    => true,
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ],
            'updated_at' => [
                'type'    => 'TIMESTAMP',
                'null'    => true,
                'default' => new RawSql('CURRENT_TIMESTAMP'),
                'on update' => new RawSql('CURRENT_TIMESTAMP')
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('client_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('contractor_id', 'users', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('projects');
    }

    public function down()
    {
        $this->forge->dropTable('projects');
    }
}
