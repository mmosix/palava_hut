<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class NotificationSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'user_id' => 1, // Assuming the first user is a client
                'type' => 'info',
                'title' => 'Welcome to the Project Management Portal',
                'message' => 'Thank you for joining our platform!',
            ],
            [
                'user_id' => 2, // Assuming the second user is a project manager
                'type' => 'alert',
                'title' => 'New Project Assigned',
                'message' => 'You have been assigned to Project Alpha.',
            ],
            [
                'user_id' => 3, // Assuming the third user is an inspector
                'type' => 'reminder',
                'title' => 'Inspection Due',
                'message' => 'An inspection is due for Project Beta.',
            ],
        ];

        // Using Query Builder
        $this->db->table('notifications')->insertBatch($data);
    }
}
