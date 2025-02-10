<?php

namespace Config;

class ProjectInquiry {
    public static function get_settings_array() {
        return array(
            "enable_project_inquiry" => array(
                "type" => "yes_no",
                "label" => app_lang("enable_project_inquiry"),
                "value" => 1,
                "category" => "project_inquiry",
                "help_text" => app_lang("enable_project_inquiry_help_text")
            )
        );
    }
}