<?php

namespace App\Controllers;

class Project_inquiry extends Security_Controller {

    function __construct() {
        parent::__construct();
        $this->init_permission_checker("inquiry");
        $this->Project_inquiry_model = model('App\Models\Project_inquiry_model');
        $this->Custom_fields_model = model('App\Models\Custom_fields_model');
    }

    function index() {
        $this->access_only_team_members();
        
        $view_data["custom_field_headers"] = $this->Custom_fields_model->get_custom_field_headers_for_table("project_inquiries", $this->login_user->is_admin, $this->login_user->user_type);
        
        return $this->template->rander("project_inquiries/index", $view_data);
    }

    function modal_form() {
        $this->access_only_team_members();
        
        $view_data['model_info'] = $this->Project_inquiry_model->get_one($this->request->getPost('id'));
        $view_data["custom_fields"] = $this->Custom_fields_model->get_combined_details("project_inquiries", $view_data['model_info']->id, $this->login_user->is_admin, $this->login_user->user_type)->getResult();
        
        return $this->template->view('project_inquiries/modal_form', $view_data);
    }

    function save() {
        $this->access_only_team_members();
        
        $this->validate_submitted_data(array(
            "inquiry_type" => "required"
        ));

        $id = $this->request->getPost('id');

        $inquiry_data = array(
            "inquiry_type" => $this->request->getPost('inquiry_type'),
            "created_by" => $this->login_user->id
        );

        if (!$id) {
            $inquiry_data["created_at"] = get_current_utc_time();
        }

        $inquiry_id = $this->Project_inquiry_model->ci_save($inquiry_data, $id);
        if ($inquiry_id) {
            echo json_encode(array("success" => true, "data" => $this->_row_data($inquiry_id), 'id' => $inquiry_id, 'message' => app_lang('record_saved')));
        } else {
            echo json_encode(array("success" => false, 'message' => app_lang('error_occurred')));
        }
    }

    function list_data() {
        $this->access_only_team_members();
        
        $list_data = $this->Project_inquiry_model->get_details()->getResult();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_row($data);
        }
        echo json_encode(array("data" => $result));
    }

    private function _row_data($id) {
        $options = array("id" => $id);
        $data = $this->Project_inquiry_model->get_details($options)->getRow();
        return $this->_make_row($data);
    }

    private function _make_row($data) {
        $row_data = array(
            get_team_member_profile_link($data->created_by, $data->created_by_name, array("avatar" => $data->created_by_avatar)),
            $data->inquiry_type,
            format_to_relative_time($data->created_at)
        );

        $row_data[] = modal_anchor(get_uri("project_inquiries/view/" . $data->id), "<i data-feather='eye' class='icon-16'></i>", array("class" => "edit", "title" => app_lang('view_inquiry'), "data-post-id" => $data->id));

        return $row_data;
    }

    function view($inquiry_id = 0) {
        $this->access_only_team_members();
        
        validate_numeric_value($inquiry_id);
        
        if (!$inquiry_id) {
            show_404();
        }

        $view_data['model_info'] = $this->Project_inquiry_model->get_one($inquiry_id);
        
        if (!$view_data['model_info']->id) {
            show_404();
        }

        $view_data['custom_fields'] = $this->Custom_fields_model->get_combined_details("project_inquiries", $inquiry_id, $this->login_user->is_admin, $this->login_user->user_type)->getResult();
        
        return $this->template->rander("project_inquiries/view", $view_data);
    }

    function delete() {
        $this->access_only_team_members();
        
        $id = $this->request->getPost('id');
        validate_numeric_value($id);
        
        if ($this->Project_inquiry_model->delete($id)) {
            echo json_encode(array("success" => true, 'message' => app_lang('record_deleted')));
        } else {
            echo json_encode(array("success" => false, 'message' => app_lang('record_cannot_be_deleted')));
        }
    }
}