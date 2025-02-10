<?php echo view("includes/header", array("title" => app_lang("project_inquiry"))); ?>

<div id="page-content" class="page-wrapper clearfix">
    <div class="card">
        <div class="page-title clearfix">
            <h1><?php echo app_lang('project_inquiry'); ?></h1>
        </div>
        <div class="card-body">
            <?php echo form_open(get_uri("project_inquiry/save"), array("id" => "project-inquiry-form", "class" => "general-form", "role" => "form")); ?>
            <div class="row">
                <div class="col-md-12">
                    <!-- Inquiry Type Selection -->
                    <div class="form-group">
                        <label for="inquiry_type"><?php echo app_lang('inquiry_type'); ?></label>
                        <select name="inquiry_type" id="inquiry_type" class="form-control" required>
                            <option value=""><?php echo app_lang('select_type'); ?></option>
                            <option value="planned"><?php echo app_lang('planned_development'); ?></option>
                            <option value="custom"><?php echo app_lang('custom_build'); ?></option>
                        </select>
                    </div>

                    <!-- General Information Section -->
                    <div class="general-info-section">
                        <?php
                        $general_fields = array('full_name', 'email_address', 'phone_number', 
                            'preferred_contact_method', 'country_of_residence', 'property_purpose', 
                            'preferred_property_location');
                        
                        foreach ($general_fields as $field) {
                            echo get_custom_field_input("project_inquiries", 0, $field);
                        }
                        ?>
                    </div>

                    <!-- Planned Development Section -->
                    <div class="planned-dev-section hide">
                        <?php
                        $planned_fields = array('preferred_development', 'property_type', 
                            'preferred_size', 'additional_features', 'budget_range');
                        
                        foreach ($planned_fields as $field) {
                            echo get_custom_field_input("project_inquiries", 0, $field);
                        }
                        ?>
                    </div>

                    <!-- Custom Build Section -->
                    <div class="custom-build-section hide">
                        <?php
                        $custom_fields = array('property_location', 'plot_size', 'property_style',
                            'bedrooms_bathrooms', 'specific_features', 'budget_range_custom', 
                            'expected_timeline');
                        
                        foreach ($custom_fields as $field) {
                            echo get_custom_field_input("project_inquiries", 0, $field);
                        }
                        ?>
                    </div>

                    <!-- Optional Fields Section -->
                    <div class="optional-section">
                        <?php
                        $optional_fields = array('financing_interest', 'additional_notes');
                        
                        foreach ($optional_fields as $field) {
                            echo get_custom_field_input("project_inquiries", 0, $field);
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary"><span data-feather="check-circle" class="icon-16"></span> <?php echo app_lang('submit'); ?></button>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $("#inquiry_type").on("change", function() {
        var type = $(this).val();
        
        // Hide all sections first
        $(".planned-dev-section, .custom-build-section").addClass("hide");
        
        // Show relevant section based on selection
        if (type === "planned") {
            $(".planned-dev-section").removeClass("hide");
        } else if (type === "custom") {
            $(".custom-build-section").removeClass("hide");
        }
        
        // Adjust form validation based on visible fields
        if (type === "planned") {
            $(".custom-build-section .validate-hidden").removeAttr("data-rule-required");
            $(".planned-dev-section .validate-hidden").attr("data-rule-required", "true");
        } else if (type === "custom") {
            $(".planned-dev-section .validate-hidden").removeAttr("data-rule-required");
            $(".custom-build-section .validate-hidden").attr("data-rule-required", "true");
        }
    });

    $("#project-inquiry-form").appForm({
        onSuccess: function(result) {
            appAlert.success(result.message, {duration: 10000});
            setTimeout(function() {
                window.location.href = "<?php echo get_uri('project_inquiry/list_submissions'); ?>";
            }, 2000);
        }
    });
});