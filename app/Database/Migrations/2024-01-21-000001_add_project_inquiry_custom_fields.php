<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddProjectInquiryCustomFields extends Migration {
    public function up() {
        $fields = [
            // General Information Fields
            ['custom_field_key' => 'full_name', 'title' => 'Full Name', 'placeholder' => 'Enter your full name', 'field_type' => 'text', 'required' => 1],
            ['custom_field_key' => 'email_address', 'title' => 'Email Address', 'placeholder' => 'Enter your email address', 'field_type' => 'text', 'required' => 1],
            ['custom_field_key' => 'phone_number', 'title' => 'Phone Number', 'placeholder' => 'Enter your phone number', 'field_type' => 'text', 'required' => 0],
            ['custom_field_key' => 'preferred_contact_method', 'title' => 'Preferred Contact Method', 'field_type' => 'select', 'options' => 'email,phone', 'required' => 1],
            ['custom_field_key' => 'country_of_residence', 'title' => 'Country of Residence', 'field_type' => 'select', 'options' => 'Nigeria,Ghana,Kenya,South Africa,Other', 'required' => 1],
            ['custom_field_key' => 'property_purpose', 'title' => 'Purpose of Property', 'field_type' => 'select', 'options' => 'Personal Use,Investment,Both', 'required' => 1],
            ['custom_field_key' => 'preferred_property_location', 'title' => 'Preferred Property Location', 'placeholder' => 'Enter preferred location', 'field_type' => 'text', 'required' => 1],
            
            // Planned Development Fields
            ['custom_field_key' => 'preferred_development', 'title' => 'Preferred Development', 'field_type' => 'select', 'options' => 'Development A,Development B,Development C', 'required' => 1],
            ['custom_field_key' => 'property_type', 'title' => 'Property Type', 'field_type' => 'select', 'options' => 'Single-Family Home,Townhouse,Apartment', 'required' => 1],
            ['custom_field_key' => 'preferred_size', 'title' => 'Preferred Size', 'field_type' => 'select', 'options' => '2 Bedrooms,3 Bedrooms,4+ Bedrooms', 'required' => 1],
            ['custom_field_key' => 'additional_features', 'title' => 'Additional Features', 'placeholder' => 'Enter desired features', 'field_type' => 'textarea', 'required' => 0],
            ['custom_field_key' => 'budget_range', 'title' => 'Budget Range', 'field_type' => 'select', 'options' => 'Under $100k,$100k-$200k,$200k-$300k,$300k-$500k,Above $500k', 'required' => 1],
            
            // Custom Build Fields
            ['custom_field_key' => 'property_location', 'title' => 'Property Location', 'placeholder' => 'Enter property location', 'field_type' => 'text', 'required' => 1],
            ['custom_field_key' => 'plot_size', 'title' => 'Plot Size (in square meters)', 'placeholder' => 'Enter plot size', 'field_type' => 'text', 'required' => 1],
            ['custom_field_key' => 'property_style', 'title' => 'Property Style', 'field_type' => 'select', 'options' => 'Modern,Traditional,Minimalist,Contemporary', 'required' => 1],
            ['custom_field_key' => 'bedrooms_bathrooms', 'title' => 'Number of Bedrooms/Bathrooms', 'placeholder' => 'e.g., 3 bed, 2 bath', 'field_type' => 'text', 'required' => 1],
            ['custom_field_key' => 'specific_features', 'title' => 'Specific Features', 'placeholder' => 'Enter specific requirements', 'field_type' => 'textarea', 'required' => 0],
            ['custom_field_key' => 'budget_range_custom', 'title' => 'Budget Range', 'field_type' => 'select', 'options' => 'Under $200k,$200k-$400k,$400k-$600k,$600k-$1M,Above $1M', 'required' => 1],
            ['custom_field_key' => 'expected_timeline', 'title' => 'Expected Timeline', 'field_type' => 'select', 'options' => '6 months,12 months,18 months,24+ months', 'required' => 1],
            
            // Optional Fields
            ['custom_field_key' => 'financing_interest', 'title' => 'Interested in Financing Options?', 'field_type' => 'select', 'options' => 'Yes,No', 'required' => 0],
            ['custom_field_key' => 'additional_notes', 'title' => 'Additional Notes', 'placeholder' => 'Any additional information', 'field_type' => 'textarea', 'required' => 0]
        ];

        foreach ($fields as $field) {
            $sql = "INSERT INTO custom_fields (related_to, title, placeholder, field_type, options, required, show_in_table, show_in_invoice, visible_to_admins_only, hide_from_clients, order_id, custom_field_key) 
                    VALUES ('project_inquiries', ?, ?, ?, ?, ?, 0, 0, 0, 0, 0, ?)";
            
            $this->db->query($sql, [
                $field['title'],
                $field['placeholder'] ?? '',
                $field['field_type'],
                $field['options'] ?? '',
                $field['required'],
                $field['custom_field_key']
            ]);
        }
    }

    public function down() {
        $this->db->query("DELETE FROM custom_fields WHERE related_to = 'project_inquiries'");
    }
}