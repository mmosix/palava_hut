<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddProjectInquiryDetails extends Migration {
    public function up() {
        $fields = [
            'property_purpose' => [
                'type' => 'ENUM',
                'constraint' => ['personal', 'investment', 'both'],
                'after' => 'inquiry_type'
            ],
            'preferred_location' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'property_purpose'
            ],
            'full_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
                'after' => 'preferred_location'
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
                'after' => 'full_name'
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
                'after' => 'email'
            ],
            'preferred_contact' => [
                'type' => 'ENUM',
                'constraint' => ['email', 'phone'],
                'null' => false,
                'after' => 'phone'
            ],
            'country' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
                'after' => 'preferred_contact'
            ],
            'preferred_development' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'country'
            ],
            'property_type' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
                'after' => 'preferred_development'
            ],
            'bedrooms' => [
                'type' => 'INT',
                'constraint' => 2,
                'null' => true,
                'after' => 'property_type'
            ],
            'additional_features' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'bedrooms'
            ],
            'plot_size' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
                'after' => 'additional_features'
            ],
            'property_style' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
                'after' => 'plot_size'
            ],
            'bathrooms' => [
                'type' => 'INT',
                'constraint' => 2,
                'null' => true,
                'after' => 'property_style'
            ],
            'budget_range' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
                'after' => 'bathrooms'
            ],
            'timeline' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
                'after' => 'budget_range'
            ],
            'financing_interest' => [
                'type' => 'ENUM',
                'constraint' => ['yes', 'no'],
                'null' => true,
                'after' => 'timeline'
            ],
            'additional_notes' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'financing_interest'
            ]
        ];

        $this->forge->addColumn('project_inquiries', $fields);
    }

    public function down() {
        $fields = [
            'property_purpose',
            'preferred_location',
            'full_name',
            'email',
            'phone',
            'preferred_contact',
            'country',
            'preferred_development',
            'property_type',
            'bedrooms',
            'additional_features',
            'plot_size',
            'property_style',
            'bathrooms',
            'budget_range',
            'timeline',
            'financing_interest',
            'additional_notes'
        ];

        $this->forge->dropColumn('project_inquiries', $fields);
    }
}