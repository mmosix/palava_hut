<?php

namespace Config;

class LeftMenu {
    public static function get_admin_left_menu() {
        $menu = array();
        
        // Other menu items...
        
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
        
        return $menu;
    }

    public static function get_client_left_menu() {
        $menu = array();
        
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
        
        return $menu;
    }
}