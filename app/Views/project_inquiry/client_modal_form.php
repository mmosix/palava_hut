<?php echo form_open(get_uri("project_inquiry/save"), array("id" => "project-inquiry-form", "class" => "general-form", "role" => "form")); ?>

<div class="modal-body clearfix">
    <!-- Inquiry Type Selection -->
    <div class="form-group">
        <div class="row">
            <label for="inquiry_type" class="col-md-3"><?php echo app_lang('inquiry_type'); ?></label>
            <div class="col-md-9">
                <?php
                echo form_dropdown(
                        "inquiry_type", array(
                    "" => "--",
                    "planned" => app_lang("planned_development"),
                    "custom" => app_lang("custom_build"),
                        ), "", "class='select2 form-control' data-rule-required='true' data-msg-required='" . app_lang('field_required') . "'"
                );
                ?>
            </div>
        </div>
    </div>

    <!-- General Information Section -->
    <div class="section-title"><?php echo app_lang('general_information'); ?></div>
    
    <div class="form-group">
        <div class="row">
            <label for="full_name" class="col-md-3"><?php echo app_lang('full_name'); ?></label>
            <div class="col-md-9">
                <?php
                echo form_input(array(
                    "id" => "full_name",
                    "name" => "full_name",
                    "value" => isset($login_user) ? $login_user->first_name . " " . $login_user->last_name : "",
                    "class" => "form-control",
                    "placeholder" => app_lang('full_name'),
                    "autofocus" => true,
                    "data-rule-required" => true,
                    "data-msg-required" => app_lang("field_required"),
                ));
                ?>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <div class="row">
            <label for="email" class="col-md-3"><?php echo app_lang('email'); ?></label>
            <div class="col-md-9">
                <?php
                echo form_input(array(
                    "id" => "email",
                    "name" => "email",
                    "value" => isset($login_user) ? $login_user->email : "",
                    "class" => "form-control",
                    "placeholder" => app_lang('email'),
                    "data-rule-required" => true,
                    "data-rule-email" => true,
                    "data-msg-required" => app_lang("field_required"),
                    "data-msg-email" => app_lang("enter_valid_email")
                ));
                ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label for="phone" class="col-md-3"><?php echo app_lang('phone'); ?></label>
            <div class="col-md-9">
                <?php
                echo form_input(array(
                    "id" => "phone",
                    "name" => "phone",
                    "value" => "",
                    "class" => "form-control",
                    "placeholder" => app_lang('phone')
                ));
                ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label for="country" class="col-md-3"><?php echo app_lang('country'); ?></label>
            <div class="col-md-9">
                <?php
                echo form_input(array(
                    "id" => "country",
                    "name" => "country",
                    "value" => "",
                    "class" => "form-control",
                    "placeholder" => app_lang('country')
                ));
                ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label for="preferred_location" class="col-md-3"><?php echo app_lang('preferred_location'); ?></label>
            <div class="col-md-9">
                <?php
                echo form_input(array(
                    "id" => "preferred_location",
                    "name" => "preferred_location",
                    "value" => "",
                    "class" => "form-control",
                    "placeholder" => app_lang('preferred_location')
                ));
                ?>
            </div>
        </div>
    </div>

    <!-- Planned Development Fields -->
    <div id="planned-fields" class="hide">
        <div class="section-title"><?php echo app_lang('planned_development_details'); ?></div>

        <div class="form-group">
            <div class="row">
                <label for="preferred_development" class="col-md-3"><?php echo app_lang('preferred_development'); ?></label>
                <div class="col-md-9">
                   <?php
                    echo form_input(array(
                        "id" => "preferred_development",
                        "name" => "preferred_development",
                        "value" => $model_info->preferred_development,
                        "class" => "form-control",
                        "placeholder" => app_lang('preferred_development')
                    ));
                    ?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label for="property_type" class="col-md-3"><?php echo app_lang('property_type'); ?></label>
                <div class="col-md-9">
                   <?php
                    echo form_dropdown(
                            "property_type", array(
                        "" => "--",
                        "single_family" => app_lang("single_family_home"),
                        "townhouse" => app_lang("townhouse"),
                        "apartment" => app_lang("apartment"),
                        "other" => app_lang("other"),
                            ), "", "class='select2 form-control'"
                    );
                    ?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label for="bedrooms" class="col-md-3"><?php echo app_lang('bedrooms'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_dropdown(
                            "bedrooms",
                            array("2" => "2", "3" => "3", "4" => "4", "5+" => "5+"),
                            "",
                            "class='select2 form-control'"
                    );
                    ?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label for="additional_features" class="col-md-3"><?php echo app_lang('additional_features'); ?></label>
                <div class="col-md-9">
                   <?php
                    echo form_textarea(array(
                        "id" => "additional_features",
                        "value" => $model_info->additional_features,
                        "class" => "form-control",
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Build Fields -->
    <div id="custom-fields" class="hide">
        <div class="section-title"><?php echo app_lang('custom_build_details'); ?></div>

        <div class="form-group">
            <div class="row">
                <label for="plot_size" class="col-md-3"><?php echo app_lang('plot_size'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_input(array(
                       "id" => "plot_size",
                        "name" => "plot_size",
                        "class" => "form-control",
                        "placeholder" => app_lang('plot_size')
                    ));
                    ?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label for="property_style" class="col-md-3"><?php echo app_lang('property_style'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_dropdown(
                            "property_style",
                            array(
                                "modern" => app_lang("modern"),
                                "traditional" => app_lang("traditional"),
                                "minimalist" => app_lang("minimalist"),
                                "other" => app_lang("other")
                            ),
                            "",
                            "class='select2 form-control'"
                        );
                    ?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label for="bathrooms" class="col-md-3"><?php echo app_lang('bathrooms'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_dropdown(
                            "bathrooms",
                            array("1" => "1", "2" => "2", "3" => "3", "4+" => "4+"),
                            "",
                            "class='select2 form-control'"
                    );
                    ?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label for="specific_requirements" class="col-md-3"><?php echo app_lang('specific_requirements'); ?></label>
                <div class="col-md-9">
                   <?php
                    echo form_textarea(array(
                        "id" => "specific_requirements",
                        "class" => "form-control",
                        "placeholder" => app_lang('specific_requirements')
                    ));
                    ?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label for="expected_timeline" class="col-md-3"><?php echo app_lang('expected_timeline'); ?></label>
                <div class="col-md-9">
                   <?php
                    echo form_dropdown(
                            "expected_timeline",
                            array(
                                "6_months" => "6 " . app_lang("months"),
                                "12_months" => "12 " . app_lang("months"),
                                "18_months" => "18 " . app_lang("months"),
                                "24_months" => "24 " . app_lang("months")
                            ),
                        "class='select2'"
                    );
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Common Fields -->
    <div class="section-title"><?php echo app_lang('optional_questions'); ?></div>

    <div class="form-group">
        <div class="row">
            <label for="budget_range" class="col-md-3"><?php echo app_lang('budget_range'); ?></label>
            <div class="col-md-9">
                <?php
                echo form_input(array(
                    "id" => "budget_range",
                    "name" => "budget_range",
                    "class" => "form-control",
                    "placeholder" => app_lang('budget_range')
                ));
                ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label for="financing_interest" class="col-md-3"><?php echo app_lang('financing_interest'); ?></label>
            <div class="col-md-9">
                <?php
                echo form_dropdown("financing_interest",
                        array(
                            "yes" => app_lang("yes"),
                            "no" => app_lang("no"),
                        ), "", "class='select2 form-control'"
                );
                ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label for="additional_notes" class="col-md-3"><?php echo app_lang('additional_notes'); ?></label>
            <div class="col-md-9">
                <?php
                echo form_textarea(array(
                    "id" => "additional_notes",
                    "name" => "additional_notes",
                    "class" => "form-control",
                    "placeholder" => app_lang('additional_notes')
                ));
                ?>
            </div>
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-bs-dismiss="modal"><span data-feather="x" class="icon-16"></span> <?php echo app_lang('close'); ?></button>
    <button type="submit" class="btn btn-primary"><span data-feather="check-circle" class="icon-16"></span> <?php echo app_lang('save'); ?></button>
</div>

<?php echo form_close(); ?>

<script type="text/javascript">
    $(document).ready(function () {
        $("#project-inquiry-form").appForm({
            isModal: true,
            closeModalOnSuccess: true,
            onModalClose: function () {
                $("#inquiry-table").appTable({reload: true});
            },
            
            onSuccess: function (result) {
                if (result.success) {
                    appAlert.success(result.message, {duration: 10000});
                    setTimeout(function() {
                        window.location.href = "<?php echo get_uri('project_inquiry/client_view/'); ?>" + result.id;
                    }, 1000);
                } else {
                    appAlert.error(result.message);
                }
            }
        });

        $(".select2").select2();
        
        // Hide both sections by default
        $("#planned-fields").addClass("hide");
        $("#custom-fields").addClass("hide");


        // Show/hide appropriate fields based on inquiry type
        $("#inquiry_type").on("change", function () {
            var value = $(this).val();
            
            if (value === "planned") {
                $("#planned-fields").removeClass("hide");
                $("#custom-fields").addClass("hide");
            } else if (value === "custom") {
                $("#custom-fields").removeClass("hide");
                $("#planned-fields").addClass("hide");
            } else {
                $("#planned-fields").addClass("hide");
                $("#custom-fields").addClass("hide");
            }
            
            // Initialize the form on page load
            // Only show relevant section if a type is already selected
            var selectedType = $("#inquiry_type").val();
            if (selectedType === "planned") {
                $("#planned-fields").removeClass("hide");
            } else if (selectedType === "custom") {
                $("#custom-fields").removeClass("hide");
            }
            
        });
    });
</script>
