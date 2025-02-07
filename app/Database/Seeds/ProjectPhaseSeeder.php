<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProjectPhaseSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'project_id' => 1, // Assuming the first project is Project Alpha
                'name' => 'Phase 1',
                'description' => 'Initial phase of Project Alpha',
                'start_date' => '2023-01-01',
                'end_date' => '2023-02-01',
                'status' => 'completed',
            ],
            [
                'project_id' => 1,
                'name' => 'Phase 2',
                'description' => 'Second phase of Project Alpha',
                'start_date' => '2023-02-02',
                'end_date' => '2023-03-01',
                'status' => 'in_progress',
            ],
            [
                'project_id' => 2, // Assuming the second project is Project Beta
                'name' => 'Phase 1',
                'description' => 'Initial phase of Project Beta',
                'start_date' => '2023-02-01',
                'end_date' => '2023-03-01',
                'status' => 'pending',
            ],
        ];

        // Using Query Builder
        $this->db->table('project_phases')->insertBatch($data);
    }
}
