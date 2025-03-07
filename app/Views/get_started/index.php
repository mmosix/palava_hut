<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo view('includes/head'); ?>
</head>
<body class="public-view signup-page">
    <?php if (get_setting("show_background_image_in_signin_page") === "yes") {
        $background_url = get_file_from_setting("signin_page_background"); ?>
        <style type="text/css">
            html, body {
                background-image: url('<?php echo $background_url; ?>');
                background-size: cover;
            }
        </style>
    <?php } ?>
    <div id="page-content" class="clearfix">
        <div class="scrollable-page">
            <div class="form-signin" style="max-width: 650px;">
                <div class="card bg-white clearfix">
                    <div class="card-header text-center">
                        <h2 class="form-signin-heading"><?php echo app_lang('get_started'); ?></h2>
                        <p><?php echo app_lang('tell_us_about_your_project'); ?></p>
                    </div>
                    <div class="card-body p30 rounded-bottom">
                        <?php echo form_open(get_uri("get_started/save"), array("id" => "get-started-form", "class" => "general-form", "role" => "form")); ?>
                        
                        <div class="form-group">
                            <div class="row">
                                <label for="inquiry_type" class="col-md-12"><?php echo app_lang('inquiry_type'); ?></label>
                                <div class="col-md-12">
                                    <?php echo form_dropdown("inquiry_type", array("" => "--", "planned" => "Planned Development", "custom" => "Custom Build"), "", "class='select2 validate-hidden' id='inquiry_type' data-rule-required='true' data-msg-required='" . app_lang('field_required') . "'"); ?>
                                </div>
                            </div>
                        </div>

                        <!-- General Information -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="first_name" class="col-md-12"><?php echo app_lang('first_name'); ?></label>
                                    <?php echo form_input(array(
                                        "id" => "first_name",
                                        "name" => "first_name",
                                        "value" => "",
                                        "class" => "form-control p10",
                                        "placeholder" => app_lang('first_name'),
                                        "data-rule-required" => true,
                                        "data-msg-required" => app_lang("field_required"),
                                    )); ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="last_name" class="col-md-12"><?php echo app_lang('last_name'); ?></label>
                                    <?php echo form_input(array(
                                        "id" => "last_name",
                                        "name" => "last_name",
                                        "value" => "",
                                        "class" => "form-control p10",
                                        "placeholder" => app_lang('last_name'),
                                        "data-rule-required" => true,
                                        "data-msg-required" => app_lang("field_required"),
                                    )); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="email" class="col-md-12"><?php echo app_lang('email'); ?></label>
                                    <?php echo form_input(array(
                                        "id" => "email",
                                        "name" => "email",
                                        "value" => "",
                                        "class" => "form-control p10",
                                        "placeholder" => app_lang('email'),
                                        "data-rule-required" => true,
                                        "data-rule-email" => true,
                                        "data-msg-required" => app_lang("field_required"),
                                        "data-msg-email" => app_lang("enter_valid_email")
                                    )); ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="col-md-12"><?php echo app_lang('phone'); ?></label>
                                    <?php echo form_input(array(
                                        "id" => "phone",
                                        "name" => "phone",
                                        "value" => "",
                                        "class" => "form-control p10",
                                        "placeholder" => app_lang('phone')
                                    )); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="preferred_contact" class="col-md-12"><?php echo app_lang('preferred_contact'); ?></label>
                                <div class="col-md-12">
                                    <?php echo form_dropdown(
                                        "preferred_contact",
                                        array("email" => "Email", "phone" => "Phone"),
                                        "",
                                        "class='select2 validate-hidden' data-rule-required='true' data-msg-required='" . app_lang('field_required') . "'"
                                    ); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="country" class="col-md-12"><?php echo app_lang('country'); ?></label>
                                <div class="col-md-12">
                                    <?php echo form_input(array(
                                        "id" => "country",
                                        "name" => "country",
                                        "value" => "",
                                        "class" => "form-control p10",
                                        "placeholder" => app_lang('country'),
                                        "data-rule-required" => true,
                                        "data-msg-required" => app_lang("field_required"),
                                    )); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="property_purpose" class="col-md-12"><?php echo app_lang('property_purpose'); ?></label>
                                <div class="col-md-12">
                                    <?php echo form_dropdown(
                                        "property_purpose",
                                        array("Personal Use" => "Personal Use", "Investment" => "Investment", "Both" => "Both"),
                                        "",
                                        "class='select2 validate-hidden' data-rule-required='true' data-msg-required='" . app_lang('field_required') . "'"
                                    ); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="preferred_location" class="col-md-12"><?php echo app_lang('preferred_location'); ?></label>
                                <div class="col-md-12">
                                    <?php echo form_input(array(
                                        "id" => "preferred_location",
                                        "name" => "preferred_location",
                                        "value" => "",
                                        "class" => "form-control p10",
                                        "placeholder" => app_lang('preferred_location'),
                                        "data-rule-required" => true,
                                        "data-msg-required" => app_lang("field_required"),
                                    )); ?>
                                </div>
                            </div>
                        </div>

                        <!-- Planned Development Fields -->
                        <div id="planned-fields" class="hide">
                            <div class="form-group">
                                <div class="row">
                                    <label for="preferred_development" class="col-md-12"><?php echo app_lang('preferred_development'); ?></label>
                                    <div class="col-md-12">
                                        <?php echo form_input(array(
                                            "id" => "preferred_development",
                                            "name" => "preferred_development",
                                            "value" => "",
                                            "class" => "form-control p10",
                                            "placeholder" => app_lang('preferred_development')
                                        )); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label for="property_type" class="col-md-12"><?php echo app_lang('property_type'); ?></label>
                                    <div class="col-md-12">
                                        <?php echo form_input(array(
                                            "id" => "property_type",
                                            "name" => "property_type",
                                            "value" => "",
                                            "class" => "form-control p10",
                                            "placeholder" => app_lang('property_type')
                                        )); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label for="bedrooms" class="col-md-12"><?php echo app_lang('bedrooms'); ?></label>
                                    <div class="col-md-12">
                                        <?php echo form_dropdown(
                                            "bedrooms",
                                            array("2" => "2", "3" => "3", "4" => "4", "5+" => "5+"),
                                            "",
                                            "class='select2'"
                                        ); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label for="additional_features" class="col-md-12"><?php echo app_lang('additional_features'); ?></label>
                                    <div class="col-md-12">
                                        <?php echo form_textarea(array(
                                            "id" => "additional_features",
                                            "name" => "additional_features",
                                            "value" => "",
                                            "class" => "form-control p10",
                                            "placeholder" => app_lang('additional_features')
                                        )); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Custom Build Fields -->
                        <div id="custom-fields" class="hide">
                            <div class="form-group">
                                <div class="row">
                                    <label for="plot_size" class="col-md-12"><?php echo app_lang('plot_size'); ?></label>
                                    <div class="col-md-12">
                                        <?php echo form_input(array(
                                            "id" => "plot_size",
                                            "name" => "plot_size",
                                            "value" => "",
                                            "class" => "form-control p10",
                                            "placeholder" => app_lang('plot_size')
                                        )); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label for="property_style" class="col-md-12"><?php echo app_lang('property_style'); ?></label>
                                    <div class="col-md-12">
                                        <?php echo form_dropdown(
                                            "property_style",
                                            array("Modern" => "Modern", "Traditional" => "Traditional", "Minimalist" => "Minimalist"),
                                            "",
                                            "class='select2'"
                                        ); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label for="bathrooms" class="col-md-12"><?php echo app_lang('bathrooms'); ?></label>
                                    <div class="col-md-12">
                                        <?php echo form_dropdown(
                                            "bathrooms",
                                            array("1" => "1", "2" => "2", "3" => "3", "4+" => "4+"),
                                            "",
                                            "class='select2'"
                                        ); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label for="specific_requirements" class="col-md-12"><?php echo app_lang('specific_requirements'); ?></label>
                                    <div class="col-md-12">
                                        <?php echo form_textarea(array(
                                            "id" => "specific_requirements",
                                            "name" => "specific_requirements",
                                            "value" => "",
                                            "class" => "form-control p10",
                                            "placeholder" => app_lang('specific_requirements')
                                        )); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label for="expected_timeline" class="col-md-12"><?php echo app_lang('expected_timeline'); ?></label>
                                    <div class="col-md-12">
                                        <?php echo form_dropdown(
                                            "expected_timeline",
                                            array(
                                                "6 months" => "6 months",
                                                "12 months" => "12 months",
                                                "18 months" => "18 months",
                                                "24+ months" => "24+ months"
                                            ),
                                            "",
                                            "class='select2'"
                                        ); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Common Fields -->
                        <div class="form-group">
                            <div class="row">
                                <label for="budget_range" class="col-md-12"><?php echo app_lang('budget_range'); ?></label>
                                <div class="col-md-12">
                                    <?php echo form_input(array(
                                        "id" => "budget_range",
                                        "name" => "budget_range",
                                        "value" => "",
                                        "class" => "form-control p10",
                                        "placeholder" => app_lang('budget_range')
                                    )); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="financing_interest" class="col-md-12"><?php echo app_lang('financing_interest'); ?></label>
                                <div class="col-md-12">
                                    <?php echo form_dropdown(
                                        "financing_interest",
                                        array("Yes" => "Yes", "No" => "No"),
                                        "",
                                        "class='select2'"
                                    ); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="additional_notes" class="col-md-12"><?php echo app_lang('additional_notes'); ?></label>
                                <div class="col-md-12">
                                    <?php echo form_textarea(array(
                                        "id" => "additional_notes",
                                        "name" => "additional_notes",
                                        "value" => "",
                                        "class" => "form-control p10",
                                        "placeholder" => app_lang('additional_notes')
                                    )); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button class="w-100 btn btn-lg btn-primary" type="submit"><?php echo app_lang('get_started'); ?></button>
                            </div>
                        </div>

                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">
        $(document).ready(function () {
            // $("#project-inquiry-form").appForm({
            //     onSuccess: function (result) {
            //         $("#project-inquiry-table").appTable({newData: result.data, dataId: result.id});
            //     }
            // });
            
        $("#get-started-form").appForm({
            onSuccess: function (result) {
                if (result.success) {
                    appAlert.success(result.message, {duration: 2000});
                    setTimeout(function() {
                        window.location = "<?php echo get_uri('signup'); ?>?email=" + encodeURIComponent($("#email").val()) + "&first_name=" + encodeURIComponent($("#first_name").val()) + "&last_name=" + encodeURIComponent($("#last_name").val());
                    }, 2000);
                }
            }
        });
            
            $("#get-started-form .select2").select2(); 
            
            // Show/hide fields based on inquiry type
            $("#inquiry_type").change(function() {
                if ($(this).val() === "planned") {
                    $("#planned-fields").removeClass("hide");
                    $("#custom-fields").addClass("hide");
                } else {
                    $("#planned-fields").addClass("hide");
                    $("#custom-fields").removeClass("hide");
                }
            });
        });
    </script>
    <?php echo view("includes/footer"); ?>
</body>
</html>
