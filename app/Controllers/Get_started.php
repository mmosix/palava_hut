<?php

namespace App\Controllers;

class Get_started extends App_Controller {

    private $Get_started_model;

    function __construct() {
        parent::__construct();
        $this->Get_started_model = model('App\Models\Get_started_model');
    }

    function index() {
        return $this->template->view("get_started/index");
    }

    function save() {
        $this->validate_submitted_data(array(
            "first_name" => "required",
            "last_name" => "required",
            "email" => "required|valid_email",
            "preferred_contact" => "required",
            "country" => "required",
            "property_purpose" => "required", 
            "preferred_location" => "required",
            "inquiry_type" => "required"
        ));

        $data = array(
            "inquiry_type" => $this->request->getPost('inquiry_type'),
            "full_name" => $this->request->getPost('first_name') . " " . $this->request->getPost('last_name'),
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
        );

        $save_id = $this->Get_started_model->ci_save($data);
        
        if ($save_id) {
            echo json_encode(array("success" => true, 'message' => app_lang('record_saved')));
        } else {
            echo json_encode(array("success" => false, 'message' => app_lang('error_occurred')));
        }
    }
}