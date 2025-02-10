<?php

namespace App\Models;

class Form_submission_values_model extends Crud_model {
    protected $table = 'form_submission_values';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'submission_id',
        'field_key',
        'field_value'
    ];

    function __construct() {
        parent::__construct();
        $this->init($this->table);
    }

    function get_values($submission_id) {
        return $this->db->table($this->table)
            ->where('submission_id', $submission_id)
            ->get()
            ->getResult();
    }

    function get_value($submission_id, $field_key) {
        $result = $this->db->table($this->table)
            ->where('submission_id', $submission_id)
            ->where('field_key', $field_key)
            ->get()
            ->getRow();
            
        return $result ? $result->field_value : null;
    }
}