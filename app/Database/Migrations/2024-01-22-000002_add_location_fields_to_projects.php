<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddLocationFieldsToProjects extends Migration
{
    public function up()
    {
        $fields = array(
            'location' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),
            'latitude' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,8',
                'null' => true,
            ),
            'longitude' => array(
                'type' => 'DECIMAL',
                'constraint' => '11,8',
                'null' => true,
            )
        );
        
        $this->forge->addColumn('projects', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('projects', ['location', 'latitude', 'longitude']);
    }
}