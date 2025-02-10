<?php

namespace App\Models;

class Form_submissions_model extends Crud_model {
    protected $table = 'form_submissions';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'form_id',
        'submission_type',
        'submitted_by',
        'submitted_at',
        'status',
        'deleted'
    ];

    function __construct() {
        parent::__construct();
        $this->init($this->table);
    }

    function get_details($options = array()) {
        $submissions_table = $this->table;
        $forms_table = 'forms';

        $where = "";
        $id = $this->_get_clean_value($options, "id");
        if ($id) {
            $where .= " AND $submissions_table.id=$id";
        }

        $form_id = $this->_get_clean_value($options, "form_id");
        if ($form_id) {
            $where .= " AND $submissions_table.form_id=$form_id";
        }

        $submission_type = $this->_get_clean_value($options, "submission_type");
        if ($submission_type) {
            $where .= " AND $submissions_table.submission_type='$submission_type'";
        }

        $sql = "SELECT $submissions_table.*, $forms_table.title as form_title, $forms_table.form_type
        FROM $submissions_table
        LEFT JOIN $forms_table ON $forms_table.id = $submissions_table.form_id
        WHERE $submissions_table.deleted=0 $where";
        return $this->db->query($sql);
    }

    function get_submission($id) {
        return $this->get_one_where(array("id" => $id, "deleted" => 0));
    }
}