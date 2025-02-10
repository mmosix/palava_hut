<?php

namespace Config;

class Permission {
    public static function get_staff_permissions() {
        $permissions = array();
        $permissions[] = array(
            "name" => "project_inquiry",
            "category" => "project_inquiry",
            "title" => "project_inquiries",
            "description" => "Can view project inquiry submissions",
            "type" => "admin_role_only"
        );
        return $permissions;
    }
}