<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddLocationFieldsToProjects extends Migration
{
    public function up()
    {
        $fields = [
            'location' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'price'
            ],
            'latitude' => [
                'type' => 'DECIMAL',
                'constraint' => '10,8',
                'null' => true,
                'after' => 'location'
            ],
            'longitude' => [
                'type' => 'DECIMAL',
                'constraint' => '11,8',
                'null' => true,
                'after' => 'latitude'
            ]
        ];
        
        $this->forge->addColumn('projects', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('projects', ['location', 'latitude', 'longitude']);
    }
}