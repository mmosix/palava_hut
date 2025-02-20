<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddProjectInquiryFields extends Migration {
    public function up() {
        $this->forge->addColumn('project_inquiries', [
            'full_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'preferred_contact' => [
                'type' => 'ENUM',
                'constraint' => ['email', 'phone'],
                'default' => 'email',
                'null' => false,
            ],
            'country' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'property_purpose' => [
                'type' => 'ENUM',
                'constraint' => ['Personal Use', 'Investment', 'Both'],
                'null' => false,
            ],
            'preferred_location' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            // Planned Development Fields
            'preferred_development' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'property_type' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'bedrooms' => [
                'type' => 'INT',
                'constraint' => 2,
                'null' => true,
            ],
            'additional_features' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            // Custom Build Fields
            'plot_size' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'property_style' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'bathrooms' => [
                'type' => 'INT',
                'constraint' => 2,
                'null' => true,
            ],
            'specific_requirements' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'budget_range' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'expected_timeline' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            // Optional Fields
            'financing_interest' => [
                'type' => 'ENUM',
                'constraint' => ['Yes', 'No'],
                'null' => true,
            ],
            'additional_notes' => [
                'type' => 'TEXT',
                'null' => true,
            ]
        ]);
    }

    public function down() {
        $fields = [
            'full_name', 'email', 'phone', 'preferred_contact', 'country',
            'property_purpose', 'preferred_location', 'preferred_development',
            'property_type', 'bedrooms', 'additional_features', 'plot_size',
            'property_style', 'bathrooms', 'specific_requirements', 'budget_range',
            'expected_timeline', 'financing_interest', 'additional_notes'
        ];
        
        $this->forge->dropColumn('project_inquiries', $fields);
    }
}