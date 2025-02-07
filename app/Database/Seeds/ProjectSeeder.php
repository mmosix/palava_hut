<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Project Alpha',
                'description' => 'Description for Project Alpha',
                'client_id' => 1, // Assuming the first user is a client
                'contractor_id' => 2, // Assuming the second user is a contractor
                'status' => 'pending',
                'start_date' => '2023-01-01',
                'estimated_completion_date' => '2023-06-01',
                'budget' => 100000.00,
                'completion_percentage' => 0,
                'blockchain_contract_id' => 'blockchain_id_1',
            ],
            [
                'name' => 'Project Beta',
                'description' => 'Description for Project Beta',
                'client_id' => 1,
                'contractor_id' => 3, // Assuming the third user is a contractor
                'status' => 'in_progress',
                'start_date' => '2023-02-01',
                'estimated_completion_date' => '2023-07-01',
                'budget' => 150000.00,
                'completion_percentage' => 50,
                'blockchain_contract_id' => 'blockchain_id_2',
            ],
        ];

        // Using Query Builder
        $this->db->table('projects')->insertBatch($data);
    }
}
