<?php

namespace App\Controllers;

class Project_inquiry extends BaseController {

    function __construct() {
        parent::__construct();
        $this->Project_inquiry_model = model('App\Models\Project_inquiry_model');
        $this->Custom_fields_model = model('App\Models\Custom_fields_model');
    }

    function index() {
        $common_fields = ['full_name', 'email_address', 'phone_number', 'preferred_contact_method', 'country_of_residence', 'property_purpose', 'preferred_property_location'];
        $planned_fields = ['preferred_development', 'property_type', 'preferred_size', 'additional_features', 'budget_range'];
        $custom_fields = ['property_location', 'plot_size', 'property_style', 'bedrooms_bathrooms', 'specific_features', 'budget_range_custom', 'expected_timeline'];
        $optional_fields = ['financing_interest', 'additional_notes'];

        // Get all custom fields
        $view_data['custom_fields'] = $this->Custom_fields_model->get_combined_details("project_inquiries", 0, 1)->getResult();
        
        // Group fields by section
        $view_data['field_groups'] = [
            'common' => array_filter($view_data['custom_fields'], function($field) use ($common_fields) {
                return in_array($field->custom_field_key, $common_fields);
            }),
            'planned' => array_filter($view_data['custom_fields'], function($field) use ($planned_fields) {
                return in_array($field->custom_field_key, $planned_fields);
            }),
            'custom' => array_filter($view_data['custom_fields'], function($field) use ($custom_fields) {
                return in_array($field->custom_field_key, $custom_fields);
            }),
            'optional' => array_filter($view_data['custom_fields'], function($field) use ($optional_fields) {
                return in_array($field->custom_field_key, $optional_fields);
            })
        ];
        
        return $this->template->rander("project_inquiry/index", $view_data);
    }

    function save() {
        $inquiry_data = array(
            "inquiry_type" => $this->request->getPost('inquiry_type'),
            "created_at" => get_current_utc_time(),
            "created_by" => $this->login_user->id
        );

        $inquiry_id = $this->Project_inquiry_model->ci_save($inquiry_data);
        
        if ($inquiry_id) {
            // Get all custom fields based on inquiry type
            $custom_fields = [];
            $type = $this->request->getPost('inquiry_type');
            
            // Save custom fields with handling visibility based on inquiry type
            if ($type === 'planned') {
                $fields_to_exclude = ['property_location', 'plot_size', 'property_style', 'bedrooms_bathrooms', 'specific_features', 'budget_range_custom', 'expected_timeline'];
            } else {
                $fields_to_exclude = ['preferred_development', 'property_type', 'preferred_size', 'additional_features', 'budget_range'];
            }
            
            save_custom_fields("project_inquiries", $inquiry_id, $this->login_user->is_admin, $this->login_user->user_type, $fields_to_exclude);
            
            log_notification("new_project_inquiry", array("inquiry_id" => $inquiry_id));
            
            echo json_encode(array("success" => true, "message" => app_lang('record_saved')));
        } else {
            echo json_encode(array("success" => false, 'message' => app_lang('error_occurred')));
        }
    }

    function list_submissions() {
        return $this->template->rander("project_inquiry/list", [
            'page_title' => app_lang("project_inquiries")
        ]);
    }

    function list_data() {
        $list_data = $this->Project_inquiry_model->get_details()->getResult();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_row($data);
        }
        echo json_encode(array("data" => $result));
    }

    private function _make_row($data) {
        $inquiry_type = $data->inquiry_type == "planned" ? "Planned Development" : "Custom Build";
        
        $row_data = array(
            $data->id,
            $inquiry_type,
            format_to_datetime($data->created_at),
            $data->created_by_name,
        );

        $row_data[] = modal_anchor(get_uri("project_inquiry/view/" . $data->id), "<i class='fa fa-eye'></i>", array("class" => "edit", "title" => app_lang('view_details'), "data-post-id" => $data->id));

        return $row_data;
    }

    function view($submission_id) {
        validate_numeric_value($submission_id);
        $view_data['model_info'] = $this->Project_inquiry_model->get_one($submission_id);
        $view_data['custom_fields'] = $this->Custom_fields_model->get_combined_details("project_inquiries", $submission_id, 1)->getResult();
        return $this->template->rander("project_inquiry/view", $view_data);
    }

}