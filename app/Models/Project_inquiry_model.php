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
        $project_inquiries_table = $this->db->prefixTable('project_inquiries');
        $users_table = $this->db->prefixTable('users');
        
        $where = "";
        
        $sql = "SELECT $project_inquiries_table.*, CONCAT($users_table.first_name, ' ', $users_table.last_name) AS created_by_name
        FROM $project_inquiries_table
        LEFT JOIN $users_table ON $users_table.id = $project_inquiries_table.created_by
        $where
        ORDER BY $project_inquiries_table.id DESC";
        
        return $this->db->query($sql);
    }

    function save_inquiry($data) {
        return $this->ci_save($data);
    }
}