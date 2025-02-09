<?php

namespace App\Models;

use CodeIgniter\Model;

class Left_menu_model extends Model {
    protected $Settings_model;

    public function __construct() {
        parent::__construct();
        $this->Settings_model = model('App\Models\Settings_model');
    }

    public function get_default_menu() {
        $this->run_seeds();
        
        $menu = array();
        
        // Get existing menu items
        $existing_items = $this->Settings_model->get_setting('default_left_menu');
        if ($existing_items) {
            $menu = json_decode($existing_items, true);
        }
        
        // Add project inquiry menu item if not exists
        $found = false;
        foreach ($menu as $item) {
            if ($item['name'] === 'project_inquiry') {
                $found = true;
                break;
            }
        }
        
        if (!$found) {
            $menu[] = array(
                "name" => "project_inquiry",
                "url" => "project_inquiry/list_submissions",
                "class" => "project-inquiry-list",
                "icon" => "file-text",
                "custom_class" => "",
                "target" => "",
                "is_sub_menu" => 0,
                "sort" => 7,
                "title" => app_lang("project_inquiries")
            );
            
            // Save updated menu
            $this->Settings_model->save_setting('default_left_menu', json_encode($menu));
        }
        
        return $menu;
    }

    public function get_details() {
        try {
            $menu = $this->get_default_menu();
            return is_array($menu) ? $menu : array();
        } catch (\Exception $e) {
            log_message('error', 'Left menu error: ' . $e->getMessage());
            return array();
            return array();
        }
    }
    
    private function run_seeds() {
        $config = config('Database');
        $menuSeeder = new \App\Database\Seeds\MenuSettingsSeeder($config);
        $menuSeeder->run();
        
        $permissionsSeeder = new \App\Database\Seeds\RolePermissionsSeeder($config);
        $permissionsSeeder->run();
    }
}