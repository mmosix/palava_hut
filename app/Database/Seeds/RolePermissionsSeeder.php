<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RolePermissionsSeeder extends Seeder {
    public function run() {
        // Get admin role
        $admin_role = $this->db->table('roles')
                             ->where('title', 'admin')
                             ->get()
                             ->getRow();

        if ($admin_role) {
            // Get existing permissions
            $permissions = $this->db->table('role_permissions')
                                  ->where('role_id', $admin_role->id)
                                  ->get()
                                  ->getRow();

            $existing_permissions = $permissions ? json_decode($permissions->permissions, true) : [];
            $existing_permissions['project_inquiry'] = "all";

            // Update permissions
            $data = [
                'permissions' => json_encode($existing_permissions)
            ];

            $this->db->table('role_permissions')
                     ->where('role_id', $admin_role->id)
                     ->update($data);
        }
    }
}