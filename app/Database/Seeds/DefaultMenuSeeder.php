<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DefaultMenuSeeder extends Seeder {
    public function run() {
        $menu_items = array(
            array(
                "name" => "my_menu_item",
                "url" => "my_menu_item/list",
                "class" => "list",
                "position" => 45,
                "category" => "main",
                "is_sub_menu" => 0,
                "icon" => "layout",
                "custom_class" => "",
                "target" => "",
                "sort" => 6,
                "title" => "My Menu"
            ),
            array(
                "name" => "forms",
                "url" => "forms",
                "class" => "list",
                "position" => 55,
                "category" => "management",
                "is_sub_menu" => 0,
                "icon" => "file-text",
                "custom_class" => "",
                "target" => "",
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
                "custom_class" => "",
                "target" => "",
                "sort" => 8,
                "title" => "Updates"
            )
        );

        // Get existing menu
        $existing = $this->db->table('settings')
            ->where('setting_name', 'default_left_menu')
            ->get()->getRow();

        if ($existing) {
            $current_menu = json_decode($existing->value, true);
            if (!is_array($current_menu)) {
                $current_menu = array();
            }

            // Add new items if they don't exist
            foreach ($menu_items as $item) {
                $exists = false;
                foreach ($current_menu as $existing_item) {
                    if ($existing_item['name'] === $item['name']) {
                        $exists = true;
                        break;
                    }
                }
                if (!$exists) {
                    $current_menu[] = $item;
                }
            }

            // Update the setting
            $this->db->table('settings')
                ->where('setting_name', 'default_left_menu')
                ->update(['value' => json_encode($current_menu)]);
        } else {
            // Insert new setting
            $this->db->table('settings')->insert([
                'setting_name' => 'default_left_menu',
                'value' => json_encode($menu_items)
            ]);
        }
    }
}