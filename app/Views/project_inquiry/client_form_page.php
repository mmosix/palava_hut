<div id="page-content" class="page-wrapper clearfix">
    <div class="card">
        <div class="page-title clearfix">
            <h1><?php echo app_lang('submit_project_inquiry'); ?></h1>
        </div>
        <div class="card-body">
            <?php echo form_open(get_uri("project_inquiry/save"), array("id" => "project-inquiry-form", "class" => "general-form", "role" => "form")); ?>
            <div class="form-group">
                <label for="name" class="col-md-3"><?php echo app_lang('full_name'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "full_name",
                        "name" => "full_name",
                        "value" => $login_user ? $login_user->first_name . " " . $login_user->last_name : "",
                        "class" => "form-control",
                        "placeholder" => app_lang('full_name'),
                        "autofocus" => true,
                        "data-rule-required" => true,
                        "data-msg-required" => app_lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-md-3"><?php echo app_lang('email'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "email",
                        "name" => "email",
                        "value" => $login_user ? $login_user->email : "",
                        "class" => "form-control",
                        "placeholder" => app_lang('email'),
                        "data-rule-email" => true,
                        "data-rule-required" => true,
                        "data-msg-required" => app_lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="phone" class="col-md-3"><?php echo app_lang('phone'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "phone",
                        "name" => "phone",
                        "class" => "form-control",
                        "placeholder" => app_lang('phone'),
                        "data-rule-required" => true,
                        "data-msg-required" => app_lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="preferred_contact" class="col-md-3"><?php echo app_lang('preferred_contact_method'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_dropdown(
                            "preferred_contact", array(
                        "email" => app_lang("email"),
                        "phone" => app_lang("phone"),
                            ), "", "class='select2 form-control' data-rule-required='true' data-msg-required='" . app_lang('field_required') . "'"
                    );
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="country" class="col-md-3"><?php echo app_lang('country'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "country",
                        "name" => "country",
                        "class" => "form-control",
                        "placeholder" => app_lang('country'),
                        "data-rule-required" => true,
                        "data-msg-required" => app_lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inquiry_type" class="col-md-3"><?php echo app_lang('inquiry_type'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_dropdown(
                            "inquiry_type", array(
                        "" => "--",
                        "planned" => app_lang("planned_development"),
                        "architectural" => app_lang("architectural_services"),
                        "renovation" => app_lang("renovation_project"),
                        "other" => app_lang("other"),
                            ), "", "class='select2 form-control' data-rule-required='true' data-msg-required='" . app_lang('field_required') . "'"
                    );
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="property_purpose" class="col-md-3"><?php echo app_lang('project_purpose'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_dropdown(
                            "property_purpose", array(
                        "development" => app_lang("development"),
                        "design" => app_lang("design"),
                        "consulting" => app_lang("consulting"),
                        "other" => app_lang("other"),
                            ), "", "class='select2 form-control' data-rule-required='true' data-msg-required='" . app_lang('field_required') . "'"
                    );
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="preferred_location" class="col-md-3"><?php echo app_lang('preferred_location'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "preferred_location",
                        "name" => "preferred_location",
                        "class" => "form-control",
                        "placeholder" => app_lang('preferred_location'),
                        "data-rule-required" => true,
                        "data-msg-required" => app_lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="preferred_development" class="col-md-3"><?php echo app_lang('preferred_development'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "preferred_development",
                        "name" => "preferred_development",
                        "class" => "form-control",
                        "placeholder" => app_lang('preferred_development')
                    ));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="property_type" class="col-md-3"><?php echo app_lang('property_type'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_dropdown(
                            "property_type", array(
                        "" => "--",
                        "residential" => app_lang("residential"),
                        "commercial" => app_lang("commercial"),
                        "industrial" => app_lang("industrial"),
                        "mixed_use" => app_lang("mixed_use"),
                        "other" => app_lang("other"),
                            ), "", "class='select2 form-control'"
                    );
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="bedrooms" class="col-md-3"><?php echo app_lang('bedrooms'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "bedrooms",
                        "name" => "bedrooms",
                        "class" => "form-control",
                        "placeholder" => app_lang('bedrooms')
                    ));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="bathrooms" class="col-md-3"><?php echo app_lang('bathrooms'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "bathrooms",
                        "name" => "bathrooms",
                        "class" => "form-control",
                        "placeholder" => app_lang('bathrooms')
                    ));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="additional_features" class="col-md-3"><?php echo app_lang('additional_features'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "additional_features",
                        "name" => "additional_features",
                        "class" => "form-control",
                        "placeholder" => app_lang('additional_features')
                    ));
                    ?>
                </div>
            </div>
            <div class="form-group">
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
            <div class="form-group">
                <label for="property_style" class="col-md-3"><?php echo app_lang('property_style'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "property_style",
                        "name" => "property_style",
                        "class" => "form-control",
                        "placeholder" => app_lang('property_style')
                    ));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="specific_requirements" class="col-md-3"><?php echo app_lang('specific_requirements'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_textarea(array(
                        "id" => "specific_requirements",
                        "name" => "specific_requirements",
                        "class" => "form-control",
                        "placeholder" => app_lang('specific_requirements')
                    ));
                    ?>
                </div>
            </div>
            <div class="form-group">
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
            <div class="form-group">
                <label for="expected_timeline" class="col-md-3"><?php echo app_lang('expected_timeline'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "expected_timeline",
                        "name" => "expected_timeline",
                        "class" => "form-control",
                        "placeholder" => app_lang('expected_timeline')
                    ));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="financing_interest" class="col-md-3"><?php echo app_lang('financing_interest'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_dropdown(
                            "financing_interest", array(
                        "" => "--",
                        "yes" => app_lang("yes"),
                        "no" => app_lang("no"),
                        "not_sure" => app_lang("not_sure"),
                            ), "", "class='select2 form-control'"
                    );
                    ?>
                </div>
            </div>
            <div class="form-group">
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
            <div class="form-group">
                <label for="preferred_location" class="col-md-3"><?php echo app_lang('preferred_location'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "preferred_location",
                        "name" => "preferred_location",
                        "class" => "form-control",
                        "placeholder" => app_lang('preferred_location'),
                        "data-rule-required" => true,
                        "data-msg-required" => app_lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="message" class="col-md-3"><?php echo app_lang('message'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_textarea(array(
                        "id" => "message",
                        "name" => "message",
                        "class" => "form-control",
                        "placeholder" => app_lang('message'),
                        "data-rule-required" => true,
                        "data-msg-required" => app_lang("field_required"),
                        "style" => "min-height: 150px;"
                    ));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-9 col-md-offset-3">
                    <button type="submit" class="btn btn-primary"><span class="fa fa-send"></span> <?php echo app_lang('submit'); ?></button>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#project-inquiry-form").appForm({
            isModal: false,
            onSuccess: function (result) {
                appAlert.success(result.message, {duration: 10000});
                $("#project-inquiry-form").trigger("reset");
            }
        });
        
        $("#project-inquiry-form .select2").select2();
    });
</script>