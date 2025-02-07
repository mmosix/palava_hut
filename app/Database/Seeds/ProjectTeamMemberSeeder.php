<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProjectTeamMemberSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'project_id' => 1, // Assuming the first project is Project Alpha
                'user_id' => 1, // Assuming the first user is a client
                'role' => 'Project Manager',
            ],
            [
                'project_id' => 1,
                'user_id' => 2, // Assuming the second user is a project manager
                'role' => 'Contractor',
            ],
            [
                'project_id' => 2, // Assuming the second project is Project Beta
                'user_id' => 3, // Assuming the third user is an inspector
                'role' => 'Inspector',
            ],
        ];

        // Using Query Builder
        $this->db->table('project_team_members')->insertBatch($data);
    }
}
