<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'project_id' => 1, // Assuming the first project is Project Alpha
                'assigned_to' => 1, // Assuming the first user is assigned
                'description' => 'Task 1 for Project Alpha',
                'status' => 'pending',
                'due_date' => '2023-03-01',
            ],
            [
                'project_id' => 1,
                'assigned_to' => 2, // Assuming the second user is assigned
                'description' => 'Task 2 for Project Alpha',
                'status' => 'in_progress',
                'due_date' => '2023-04-01',
            ],
            [
                'project_id' => 2, // Assuming the second project is Project Beta
                'assigned_to' => 3, // Assuming the third user is assigned
                'description' => 'Task 1 for Project Beta',
                'status' => 'pending',
                'due_date' => '2023-05-01',
            ],
        ];

        // Using Query Builder
        $this->db->table('tasks')->insertBatch($data);
    }
}
