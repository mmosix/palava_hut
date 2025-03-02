<?php

namespace App\Controllers;

class Project_inquiry extends Security_Controller {

    private function init() {
        $this->Project_inquiry_model = model('App\Models\Project_inquiry_model');
    }

    //this method will call by public url
    function form() {
        $this->init();
        return $this->template->render("project_inquiry/form_page");
    }

    //this method will call by public url
    function save() {
        $this->init();
        $inquiry_data = array(
            "name" => $this->request->getPost('name'),
            "email" => $this->request->getPost('email'),
            "phone" => $this->request->getPost('phone'),
            "message" => $this->request->getPost('message'),
            "created_at" => get_current_utc_time()
        );

        $inquiry_id = $this->Project_inquiry_model->ci_save($inquiry_data);
        if ($inquiry_id) {
            echo json_encode(array("success" => true, "message" => app_lang("record_saved")));
        } else {
            echo json_encode(array("success" => false, "message" => app_lang("error_occurred")));
        }
    }

    protected $Project_inquiry_model;
    function __construct() {
        parent::__construct();
        $this->init_permission_checker("inquiry");
        $this->Project_inquiry_model = model('App\Models\Project_inquiry_model');
    }

    function index() {
        $this->access_only_team_members();
        
        $view_data = array();
        
        return $this->template->rander("project_inquiry/index", $view_data);
    }

    function modal_form() {
        $this->access_only_team_members();
        
        $view_data['model_info'] = $this->Project_inquiry_model->get_one($this->request->getPost('id'));
        
        return $this->template->view('project_inquiry/modal_form', $view_data);
    }

    function admin_save() {
        $this->access_only_team_members();
        
        $this->validate_submitted_data(array(
            "full_name" => "required",
            "email" => "required|valid_email",
            "preferred_contact" => "required",
            "country" => "required",
            "property_purpose" => "required", 
            "preferred_location" => "required",
            "inquiry_type" => "required"
        ));

        $id = $this->request->getPost('id');

        $inquiry_data = array(
            "inquiry_type" => $this->request->getPost('inquiry_type'),
            "full_name" => $this->request->getPost('full_name'),
            "email" => $this->request->getPost('email'),
            "phone" => $this->request->getPost('phone'),
            "preferred_contact" => $this->request->getPost('preferred_contact'),
            "country" => $this->request->getPost('country'),
            "property_purpose" => $this->request->getPost('property_purpose'),
            "preferred_location" => $this->request->getPost('preferred_location'),
            "preferred_development" => $this->request->getPost('preferred_development'),
            "property_type" => $this->request->getPost('property_type'),
            "bedrooms" => $this->request->getPost('bedrooms'),
            "additional_features" => $this->request->getPost('additional_features'),
            "plot_size" => $this->request->getPost('plot_size'),
            "property_style" => $this->request->getPost('property_style'),
            "bathrooms" => $this->request->getPost('bathrooms'),
            "specific_requirements" => $this->request->getPost('specific_requirements'),
            "budget_range" => $this->request->getPost('budget_range'),
            "expected_timeline" => $this->request->getPost('expected_timeline'),
            "financing_interest" => $this->request->getPost('financing_interest'),
            "additional_notes" => $this->request->getPost('additional_notes'),
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
        $inquiry_type = $data->inquiry_type === 'planned' ? 'Planned Development' : 'Custom Build';
        $row_data = array(
            $data->id,
            $data->full_name,
            $data->email,
            $data->phone ? $data->phone : "-",
            $inquiry_type,
            $data->country, 
            $data->preferred_location,
            format_to_relative_time($data->created_at)
        );

        $row_data[] = modal_anchor(get_uri("project_inquiry/modal_form"), "<i data-feather='edit' class='icon-16'></i>", array("class" => "edit", "title" => app_lang('edit_project_inquiry'), "data-post-id" => $data->id))
                . js_anchor("<i data-feather='x' class='icon-16'></i>", array('title' => app_lang('delete_project_inquiry'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("project_inquiry/delete"), "data-action" => "delete"));

        return $row_data;
    }

    function delete() {
        $this->access_only_team_members();
        
        $id = $this->request->getPost('id');
        validate_submitted_data(array("id" => "required|numeric"));

        if ($this->Project_inquiry_model->delete($id)) {
            echo json_encode(array("success" => true, 'message' => app_lang('record_deleted')));
        } else {
            echo json_encode(array("success" => false, 'message' => app_lang('record_cannot_be_deleted')));
        }
    }

    function view($inquiry_id = 0) {
        $this->access_only_team_members();

        if (!$inquiry_id) {
            show_404();
        }

        $options = array("id" => $inquiry_id);
        $view_data['model_info'] = $this->Project_inquiry_model->get_details($options)->getRow();
        if (!$view_data['model_info']->id) {
            show_404();
        }
        
        $view_data["custom_fields"] = $this->Custom_fields_model->get_combined_details("project_inquiries", $inquiry_id, $this->login_user->is_admin, $this->login_user->user_type)->getResult();

        return $this->template->rander("project_inquiry/view", $view_data);
    }
}