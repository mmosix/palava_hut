<?php echo view("includes/header", array("title" => "Project Inquiry")); ?>

<div id="page-content" class="page-wrapper clearfix">
    <div class="card">
        <div class="page-title clearfix">
            <h1><?php echo app_lang('project_inquiry_form'); ?></h1>
        </div>
        <div class="card-body">
            <?php echo form_open(get_uri("project_inquiry/save"), array("id" => "project-inquiry-form", "class" => "general-form", "role" => "form")); ?>

            <div class="form-group">
                <div class="row">
                    <label for="inquiry_type" class="col-md-3">Type of Project *</label>
                    <div class="col-md-9">
                        <?php
                        echo form_dropdown(
                            "inquiry_type",
                            array(
                                "planned" => "Planned Development",
                                "custom" => "Custom Build"
                            ),
                            "",
                            "class='select2 validate-hidden' id='inquiry_type' data-rule-required='true' data-msg-required='" . app_lang('field_required') . "'"
                        );
                        ?>
                    </div>
                </div>
            </div>

            <div class="general-info-section">
                <!-- General Information fields will be loaded here -->
            </div>

            <div class="planned-dev-section hide">
                <!-- Planned Development fields will be loaded here -->
            </div>

            <div class="custom-build-section hide">
                <!-- Custom Build fields will be loaded here -->
            </div>

            <div class="optional-section">
                <!-- Optional fields will be loaded here -->
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <div class="general-info-section">
                            <h4><?php echo app_lang('general_information'); ?></h4>
                            <?php
                            foreach ($field_groups['common'] as $field) {
                                echo view("custom_fields/form/input_" . $field->field_type, array("field_info" => $field));
                            }
                            ?>
                        </div>

                        <div class="planned-dev-section">
                            <h4><?php echo app_lang('planned_development_details'); ?></h4>
                            <?php
                            foreach ($field_groups['planned'] as $field) {
                                echo view("custom_fields/form/input_" . $field->field_type, array("field_info" => $field));
                            }
                            ?>
                        </div>

                        <div class="custom-build-section">
                            <h4><?php echo app_lang('custom_build_details'); ?></h4>
                            <?php
                            foreach ($field_groups['custom'] as $field) {
                                echo view("custom_fields/form/input_" . $field->field_type, array("field_info" => $field));
                            }
                            ?>
                        </div>

                        <div class="optional-section">
                            <h4><?php echo app_lang('optional_information'); ?></h4>
                            <?php
                            foreach ($field_groups['optional'] as $field) {
                                echo view("custom_fields/form/input_" . $field->field_type, array("field_info" => $field));
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary"><span class="fa fa-send"></span> <?php echo app_lang('submit'); ?></button>
                    </div>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#project-inquiry-form").appForm({
            onSuccess: function (result) {
                appAlert.success(result.message, {duration: 10000});
                setTimeout(function () {
                    window.location.href = "<?php echo get_uri('project_inquiry'); ?>";
                }, 2000);
            }
        });

        $("#inquiry_type").select2().on("change", function () {
            var type = $(this).val();
            // Hide all type-specific fields first
            $("[data-custom-field-name]").closest(".form-group").show();
            
            var hideFields = [];
            if (type === "planned") {
                hideFields = ["property_location", "plot_size", "property_style", "bedrooms_bathrooms", "specific_features", "budget_range_custom", "expected_timeline"];
            } else if (type === "custom") {
                hideFields = ["preferred_development", "property_type", "preferred_size", "additional_features", "budget_range"];
            }
            
            // Hide fields that shouldn't be visible for this type
            hideFields.forEach(function(field) {
                $("[data-custom-field-name='" + field + "']").closest(".form-group").hide();
            });
        });
    });
</script>

<?php echo view("includes/footer"); ?>