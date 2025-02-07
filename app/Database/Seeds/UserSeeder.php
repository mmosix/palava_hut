<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'email' => 'admin@example.com',
                'password_hash' => password_hash('password', PASSWORD_DEFAULT),
                'name' => 'Admin User',
                'phone' => '1234567890',
                'role' => 'admin',
                'status' => 'active',
            ],
            [
                'email' => 'pm@example.com',
                'password_hash' => password_hash('password', PASSWORD_DEFAULT),
                'name' => 'Project Manager',
                'phone' => '0987654321',
                'role' => 'project_manager',
                'status' => 'active',
            ],
            [
                'email' => 'inspector@example.com',
                'password_hash' => password_hash('password', PASSWORD_DEFAULT),
                'name' => 'Inspector User',
                'phone' => '1122334455',
                'role' => 'inspector',
                'status' => 'active',
            ],
            [
                'email' => 'customer@example.com',
                'password_hash' => password_hash('password', PASSWORD_DEFAULT),
                'name' => 'Customer User',
                'phone' => '2233445566',
                'role' => 'customer',
                'status' => 'active',
            ],
        ];

        // Using Query Builder
        $this->db->table('users')->insertBatch($data);
    }
}
