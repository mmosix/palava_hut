<?php echo get_page_layout("public"); ?>

<div id="page-content" class="page-wrapper clearfix public-page">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4><?php echo app_lang("project_inquiry"); ?></h4>
            </div>
            <div class="card-body">
                <?php echo form_open(get_uri("project_inquiry/save"), array("id" => "project-inquiry-form", "class" => "general-form", "role" => "form")); ?>
                <div class="form-group">
                    <label for="name" class="col-md-12"><?php echo app_lang('name'); ?></label>
                    <div class="col-md-12">
                        <?php
                        echo form_input(array(
                            "id" => "name",
                            "name" => "name",
                            "class" => "form-control",
                            "placeholder" => app_lang('name'),
                            "autofocus" => true,
                            "data-rule-required" => true,
                            "data-msg-required" => app_lang("field_required"),
                        ));
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-md-12"><?php echo app_lang('email'); ?></label>
                    <div class="col-md-12">
                        <?php
                        echo form_input(array(
                            "id" => "email",
                            "name" => "email",
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
                    <label for="phone" class="col-md-12"><?php echo app_lang('phone'); ?></label>
                    <div class="col-md-12">
                        <?php
                        echo form_input(array(
                            "id" => "phone",
                            "name" => "phone",
                            "class" => "form-control",
                            "placeholder" => app_lang('phone')
                        ));
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message" class="col-md-12"><?php echo app_lang('message'); ?></label>
                    <div class="col-md-12">
                        <?php
                        echo form_textarea(array(
                            "id" => "message",
                            "name" => "message",
                            "class" => "form-control",
                            "placeholder" => app_lang('message'),
                            "data-rule-required" => true,
                            "data-msg-required" => app_lang("field_required"),
                        ));
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary"><span class="fa fa-send"></span> <?php echo app_lang('send'); ?></button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
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
    });
</script>