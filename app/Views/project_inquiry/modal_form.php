<?php echo form_open(get_uri("project_inquiry/admin_save"), array("id" => "project-inquiry-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
    <input type="hidden" name="id" value="<?php echo $model_info->id; ?>" />

    <div class="form-group">
        <div class="row">
            <label for="inquiry_type" class="col-md-3"><?php echo app_lang('inquiry_type'); ?></label>
            <div class="col-md-9">
                <?php
                echo form_dropdown("inquiry_type", array("" => "--","planned" => "Planned Development", "custom" => "Custom Build"), $model_info->inquiry_type, "class='select2 validate-hidden' id='inquiry_type' data-rule-required='true' data-msg-required='" . app_lang('field_required') . "'");
                ?>
            </div>
        </div>
    </div>

    <!-- General Information -->
    <div class="form-group">
        <div class="row">
            <label for="full_name" class="col-md-3"><?php echo app_lang('full_name'); ?></label>
            <div class="col-md-9">
                <?php
                echo form_input(array(
                    "id" => "full_name",
                    "name" => "full_name",
                    "value" => $model_info->full_name,
                    "class" => "form-control",
                    "placeholder" => app_lang('full_name'),
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
                    "value" => $model_info->email,
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
                    "value" => $model_info->phone,
                    "class" => "form-control",
                    "placeholder" => app_lang('phone')
                ));
                ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label for="preferred_contact" class="col-md-3"><?php echo app_lang('preferred_contact'); ?></label>
            <div class="col-md-9">
                <?php
                echo form_dropdown(
                    "preferred_contact",
                    array("email" => "Email", "phone" => "Phone"),
                    $model_info->preferred_contact,
                    "class='select2 validate-hidden' data-rule-required='true' data-msg-required='" . app_lang('field_required') . "'"
                );
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
                    "value" => $model_info->country,
                    "class" => "form-control",
                    "placeholder" => app_lang('country'),
                    "data-rule-required" => true,
                    "data-msg-required" => app_lang("field_required"),
                ));
                ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label for="property_purpose" class="col-md-3"><?php echo app_lang('property_purpose'); ?></label>
            <div class="col-md-9">
                <?php
                echo form_dropdown(
                    "property_purpose",
                    array("Personal Use" => "Personal Use", "Investment" => "Investment", "Both" => "Both"),
                    $model_info->property_purpose,
                    "class='select2 validate-hidden' data-rule-required='true' data-msg-required='" . app_lang('field_required') . "'"
                );
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
                    "value" => $model_info->preferred_location,
                    "class" => "form-control",
                    "placeholder" => app_lang('preferred_location'),
                    "data-rule-required" => true,
                    "data-msg-required" => app_lang("field_required"),
                ));
                ?>
            </div>
        </div>
    </div>

    <!-- Planned Development Fields -->
    <div id="planned-fields" class="<?php echo $model_info->inquiry_type === 'planned' ? '' : 'hide'; ?>">
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
                    echo form_input(array(
                        "id" => "property_type",
                        "name" => "property_type",
                        "value" => $model_info->property_type,
                        "class" => "form-control",
                        "placeholder" => app_lang('property_type')
                    ));
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
                        $model_info->bedrooms,
                        "class='select2'"
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
                        "name" => "additional_features",
                        "value" => $model_info->additional_features,
                        "class" => "form-control",
                        "placeholder" => app_lang('additional_features')
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Build Fields -->
    <div id="custom-fields" class="<?php echo $model_info->inquiry_type === 'custom' ? '' : 'hide'; ?>">
        <div class="form-group">
            <div class="row">
                <label for="plot_size" class="col-md-3"><?php echo app_lang('plot_size'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "plot_size",
                        "name" => "plot_size",
                        "value" => $model_info->plot_size,
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
                        array("Modern" => "Modern", "Traditional" => "Traditional", "Minimalist" => "Minimalist"),
                        $model_info->property_style,
                        "class='select2'"
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
                        $model_info->bathrooms,
                        "class='select2'"
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
                        "name" => "specific_requirements",
                        "value" => $model_info->specific_requirements,
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
                            "6 months" => "6 months",
                            "12 months" => "12 months",
                            "18 months" => "18 months",
                            "24+ months" => "24+ months"
                        ),
                        $model_info->expected_timeline,
                        "class='select2'"
                    );
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Common Fields -->
    <div class="form-group">
        <div class="row">
            <label for="budget_range" class="col-md-3"><?php echo app_lang('budget_range'); ?></label>
            <div class="col-md-9">
                <?php
                echo form_input(array(
                    "id" => "budget_range",
                    "name" => "budget_range",
                    "value" => $model_info->budget_range,
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
                echo form_dropdown(
                    "financing_interest",
                    array("Yes" => "Yes", "No" => "No"),
                    $model_info->financing_interest,
                    "class='select2'"
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
                    "value" => $model_info->additional_notes,
                    "class" => "form-control",
                    "placeholder" => app_lang('additional_notes')
                ));
                ?>
            </div>
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-bs-dismiss="modal"><span class="fa fa-close"></span> <?php echo app_lang('close'); ?></button>
    <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle"></span> <?php echo app_lang('save'); ?></button>
</div>
<?php echo form_close(); ?>

<script type="text/javascript">
    $(document).ready(function () {
        $("#project-inquiry-form").appForm({
            onSuccess: function (result) {
                $("#project-inquiry-table").appTable({newData: result.data, dataId: result.id});
            }
        });
        
        $("#project-inquiry-form .select2").select2();
        
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