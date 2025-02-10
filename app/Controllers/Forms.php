<?php

namespace App\Controllers;

class Forms extends Security_Controller {
    function __construct() {
        parent::__construct();
        $this->Form_model = model('App\Models\Form_model');
    }

    function index() {
        return $this->template->rander("forms/index");
    }

    function save() {
        $form_data = array(
            "title" => $this->request->getPost('title'),
            "description" => $this->request->getPost('description'),
            "form_type" => $this->request->getPost('form_type'),
            "status" => $this->request->getPost('status'),
            "created_by" => $this->login_user->id,
            "created_at" => get_current_utc_time()
        );

        $save_id = $this->Form_model->ci_save($form_data);
        if ($save_id) {
            echo json_encode(array("success" => true, "data" => $this->_row_data($save_id), 'id' => $save_id, 'message' => app_lang('record_saved')));
        } else {
            echo json_encode(array("success" => false, 'message' => app_lang('error_occurred')));
        }
    }

    function list_data() {
        $list_data = $this->Form_model->get_details()->getResult();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_row($data);
        }
        echo json_encode(array("data" => $result));
    }

    private function _row_data($id) {
        $options = array("id" => $id);
        $data = $this->Form_model->get_details($options)->getRow();
        return $this->_make_row($data);
    }

    private function _make_row($data) {
        $status = "";
        if ($data->status === "active") {
            $status = "<span class='badge bg-success'>" . app_lang('active') . "</span> ";
        } else {
            $status = "<span class='badge bg-danger'>" . app_lang('inactive') . "</span> ";
        }

        return array(
            $data->form_id,
            $data->title,
            $data->description,
            $data->form_type,
            $status,
            format_to_datetime($data->created_at)
        );
    }
}