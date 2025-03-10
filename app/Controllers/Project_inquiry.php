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
        
        // Add client_id if user is logged in as client
        $client_id = ($this->login_user && $this->login_user->user_type == "client") ? $this->login_user->client_id : 0;
        
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
            "bedrooms" => $this->request->getPost('bedrooms') ? $this->request->getPost('bedrooms') : "",
            "additional_features" => $this->request->getPost('additional_features'),
            "plot_size" => $this->request->getPost('plot_size'),
            "property_style" => $this->request->getPost('property_style'),
            "bathrooms" => $this->request->getPost('bathrooms'),
            "specific_requirements" => $this->request->getPost('specific_requirements'),
            "budget_range" => $this->request->getPost('budget_range'),
            "expected_timeline" => $this->request->getPost('expected_timeline'),
            "financing_interest" => $this->request->getPost('financing_options'),
            "additional_notes" => $this->request->getPost('additional_notes'),
            "message" => $this->request->getPost('message'),
            "created_at" => get_current_utc_time(),            
            "created_by" => $this->login_user ? $this->login_user->id : 0,
            "client_id" => $client_id
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

    // Admin index
    function index() {
        $this->access_only_team_members();
        
        $view_data = array();
        
        return $this->template->rander("project_inquiry/index", $view_data);
    }

    function modal_form() {
        
        $view_data['model_info'] = $this->Project_inquiry_model->get_one($this->request->getPost('id'));
        
        return $this->template->view('project_inquiry/modal_form', $view_data);
    }

    function admin_save() {
        #$this->access_only_team_members();
        
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
    
    // Client access to their inquiries
    function client_inquiries() {
        $view_data['label_column'] = "col-md-3";
        $view_data['field_column'] = "col-md-9";
        return $this->template->rander("project_inquiry/client_index", $view_data);
    }
    
    // Added client_index method to fix 404 error
    function client_index() {
        return $this->client_inquiries();
    }
    
    function client_list_data() {
        $this->access_only_clients();
        
        $options = array("user_id" => $this->login_user->id, "email" => $this->login_user->email);
        $list_data = $this->Project_inquiry_model->get_details($options)->getResult();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_row($data);
        }
        echo json_encode(array("data" => $result));
    }
    
    // private function _make_client_row($data) {
    //     $status = "<span class='label label-default'>" . app_lang('pending') . "</span>";
    //     if (isset($data->status)) {
    //         if ($data->status === "in_progress") {
    //             $status = "<span class='label label-warning'>" . app_lang('in_progress') . "</span>";
    //         } else if ($data->status === "completed") {
    //             $status = "<span class='label label-success'>" . app_lang('completed') . "</span>";
    //         } else if ($data->status === "declined") {
    //             $status = "<span class='label label-danger'>" . app_lang('declined') . "</span>";
    //         }
    //     }
        
    //     return array(
    //         $data->id,
    //         format_to_date($data->created_at),
    //         $data->property_purpose ? $data->property_purpose : "",
    //         $data->preferred_location ? $data->preferred_location : "",
    //         $status,
    //         modal_anchor(get_uri("project_inquiry/client_view/" . $data->id), "<i class='fa fa-eye'></i>", array("class" => "edit", "title" => app_lang('view'), "data-post-id" => $data->id))
    //     );
    // }
    
    // Client form page
    function client_form() {
        $view_data = array();
        if ($this->login_user) {
            $view_data['login_user'] = $this->login_user;
        }
        return $this->template->rander("project_inquiry/client_form_page", $view_data);
    }
    
    // Client modal form
    function client_modal_form() {
        $view_data['model_info'] = $this->Project_inquiry_model->get_one($this->request->getPost('id'));
        return $this->template->view('project_inquiry/modal_form', $view_data);
    }
    
    // Client view inquiry
    function client_view($inquiry_id = 0) {
        $this->access_only_clients();
        
        if (!$inquiry_id) {
            show_404();
        }
        
        $options = array("id" => $inquiry_id, "client_id" => $this->login_user->client_id);
        $inquiry_info = $this->Project_inquiry_model->get_details($options)->getRow();
        
        if (!$inquiry_info || !$inquiry_info->id) {
            show_404();
        }
        
        $view_data['model_info'] = $inquiry_info;
        return $this->template->view('project_inquiry/view', $view_data);
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
       # $this->access_only_team_members();

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
