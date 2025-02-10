<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FormsSeeder extends Seeder {
    public function run() {
        // Add the Project Inquiry form
        $data = [
            'title' => 'Project Inquiry Form',
            'description' => 'Form for gathering project preferences and requirements from potential clients',
            'form_type' => 'project_inquiry',
            'status' => 'active',
            'created_by' => 1, // Assuming admin user has ID 1
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->db->table('forms')->insert($data);
    }
}