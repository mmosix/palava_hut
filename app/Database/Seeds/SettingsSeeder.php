<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SettingsSeeder extends Seeder {
    public function run() {
        $default_menu = array(
            array(
                "name" => "forms",
                "url" => "forms",
                "class" => "list",
                "position" => 55,
                "category" => "management",
                "is_sub_menu" => 0,
                "icon" => "file-text",
                "sort" => 7,
                "title" => "Forms"
            ),
            array(
                "name" => "updates",
                "url" => "updates",
                "class" => "refresh-cw",
                "position" => 65,
                "category" => "management", 
                "is_sub_menu" => 0,
                "icon" => "refresh-cw",
                "sort" => 8,
                "title" => "Updates"
            )
        );

        // Insert or update settings
        // Delete existing menu setting first
        $this->db->table('settings')
            ->where('setting_name', 'default_left_menu')
            ->delete();
            
        // Insert new menu setting
        $this->db->table('settings')->insert([
            'setting_name' => 'default_left_menu',
            'value' => json_encode($default_menu)
        ]);
    }
}