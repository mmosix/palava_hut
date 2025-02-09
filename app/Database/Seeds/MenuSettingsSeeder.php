<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MenuSettingsSeeder extends Seeder {
    public function run() {
        $menu_items = [
            array(
                "name" => "project_inquiry",
                "url" => "project_inquiry/list_submissions",
                "class" => "project-inquiry-list",
                "icon" => "file-text",
                "custom_class" => "",
                "target" => "",
                "is_sub_menu" => 0,
                "sort" => 7,
                "title" => "project_inquiries"
            )
        ];

        // Update settings table
        $data = [
            'setting_name' => 'default_left_menu',
            'setting_value' => json_encode($menu_items),
            'type' => 'app',
            'deleted' => 0
        ];

        // Check if setting exists
        $exists = $this->db->table('settings')
                          ->where('setting_name', 'default_left_menu')
                          ->get()
                          ->getRow();

        if (!$exists) {
            $this->db->table('settings')->insert($data);
        } else {
            // Merge with existing menu items
            $existing = json_decode($exists->setting_value, true) ?: [];
            $found = false;
            foreach ($existing as $item) {
                if ($item['name'] === 'project_inquiry') {
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $existing = array_merge($existing, $menu_items);
                $this->db->table('settings')
                         ->where('setting_name', 'default_left_menu')
                         ->update(['setting_value' => json_encode($existing)]);
            }
        }
    }
}