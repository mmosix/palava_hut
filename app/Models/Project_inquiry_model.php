<?php

namespace App\Models;

class Project_inquiry_model extends Crud_model {
    protected $table = null;
    function __construct() {
        $this->table = 'project_inquiries';
        parent::__construct($this->table);
    }

    function get_details($options = array()) {
        $inquiries_table = $this->db->prefixTable('project_inquiries');
        $users_table = $this->db->prefixTable('users');

        $where = array();
        $id = get_array_value($options, "id");
        if ($id) {
            $where[] = " $inquiries_table.id=$id";
        }
        
        $user_id = get_array_value($options, "user_id");
        if ($user_id) {
            $where[] = " $inquiries_table.created_by = $user_id";
        }
        $email = get_array_value($options, "email");
        if ($email) {
            $where[] = " $inquiries_table.email LIKE '%$email%'";
        }
        $where_clause = "";
        if(count($where)){
            $where_clause = " AND ".implode(" OR ", $where);
        }

        $sql = "SELECT $inquiries_table.*, CONCAT($inquiries_table.created_at) AS created_at_formatted,
            CONCAT($users_table.first_name, ' ', $users_table.last_name) as created_by_name,
            $users_table.image as created_by_avatar,
            $users_table.user_type,
            $users_table.email
            FROM $inquiries_table
            LEFT JOIN $users_table ON $users_table.id = $inquiries_table.created_by WHERE 1 $where_clause";
        return $this->db->query($sql);
    }

    function ci_save(&$data = array(), $id = 0) {
        // Only check required fields when we have full form data
        if (isset($data["full_name"]) && isset($data["property_purpose"])) {
            $required = array("full_name", "email", "preferred_contact", "country", "property_purpose", "preferred_location");
            foreach ($required as $field) {
                if (!isset($data[$field]) || empty($data[$field])) {
                    throw new \Exception($field . " is required");
                }
            }
        }
        return parent::ci_save($data, $id);
    }
}
