<?php

namespace App\Models;

class Project_inquiry_model extends Crud_model {
    protected $table = null;
    private $custom_fields_model;

    function __construct() {
        $this->table = 'project_inquiries';
        parent::__construct($this->table);
        $this->custom_fields_model = model("App\Models\Custom_fields_model");
    }

    function get_details($options = array()) {
        $inquiries_table = $this->db->prefixTable('project_inquiries');
        $users_table = $this->db->prefixTable('users');

        $where = "";
        $id = get_array_value($options, "id");
        if ($id) {
            $where .= " AND $inquiries_table.id=$id";
        }

        $sql = "SELECT $inquiries_table.*, CONCAT($inquiries_table.created_at) AS created_at_formatted,
            CONCAT($users_table.first_name, ' ', $users_table.last_name) as created_by_name,
            $users_table.image as created_by_avatar,
            $users_table.user_type,
            $users_table.email
            FROM $inquiries_table
            LEFT JOIN $users_table ON $users_table.id = $inquiries_table.created_by
            WHERE 1 $where";
        return $this->db->query($sql);
    }

    function ci_save(&$data = array(), $id = 0) {
        $inquiry_id = parent::ci_save($data, $id);
        
        if ($inquiry_id) {
            $custom_fields = $this->custom_fields_model->get_combined_details("project_inquiries", $inquiry_id, true)->getResult();
            foreach ($custom_fields as $field) {
                $field_name = "custom_field_" . $field->id;
                if (isset($data[$field_name])) {
                    $value = $data[$field_name];
                    $this->custom_fields_model->save_value($inquiry_id, $field->id, $value, "project_inquiries");
                }
            }
        }
        return $inquiry_id;
    }
}