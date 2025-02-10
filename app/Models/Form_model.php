<?php

namespace App\Models;

class Form_model extends Crud_model {
    protected $table = 'forms';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title',
        'description',
        'form_type',
        'status',
        'created_by',
        'created_at',
        'deleted'
    ];

    function __construct() {
        parent::__construct();
        $this->init($this->table);
    }

    function get_details($options = array()) {
        $forms_table = $this->table;

        $where = "";
        $id = $this->_get_clean_value($options, "id");
        if ($id) {
            $where .= " AND $forms_table.id=$id";
        }

        $form_type = $this->_get_clean_value($options, "form_type");
        if ($form_type) {
            $where .= " AND $forms_table.form_type='$form_type'";
        }

        $sql = "SELECT $forms_table.*, CONCAT($forms_table.form_type, '-', $forms_table.id) as form_id
        FROM $forms_table
        WHERE $forms_table.deleted=0 $where";
        return $this->db->query($sql);
    }

    function get_form($id) {
        return $this->get_one_where(array("id" => $id, "deleted" => 0));
    }
}