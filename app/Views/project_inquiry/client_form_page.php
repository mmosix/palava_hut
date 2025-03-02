<?php echo get_page_layout("public"); ?>

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