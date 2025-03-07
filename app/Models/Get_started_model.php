<?php

namespace App\Models;

class Get_started_model extends Crud_model {
    protected $table = null;
    function __construct() {
        $this->table = 'project_inquiries';
        parent::__construct($this->table);
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