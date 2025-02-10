<?php echo form_open(get_uri("forms/save"), array("id" => "form-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
    <div class="container-fluid">
        <div class="form-group">
            <div class="row">
                <label for="title" class=" col-md-3"><?php echo app_lang('title'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "title",
                        "name" => "title",
                        "class" => "form-control",
                        "placeholder" => app_lang('title'),
                        "data-rule-required" => true,
                        "data-msg-required" => app_lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label for="description" class=" col-md-3"><?php echo app_lang('description'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_textarea(array(
                        "id" => "description",
                        "name" => "description",
                        "class" => "form-control",
                        "placeholder" => app_lang('description'),
                        "data-rich-text-editor" => true
                    ));
                    ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label for="form_type" class=" col-md-3"><?php echo app_lang('form_type'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "form_type",
                        "name" => "form_type",
                        "class" => "form-control",
                        "placeholder" => app_lang('form_type'),
                        "data-rule-required" => true,
                        "data-msg-required" => app_lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label for="status" class=" col-md-3"><?php echo app_lang('status'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_dropdown(
                        "status",
                        array(
                            "active" => app_lang("active"),
                            "inactive" => app_lang("inactive")
                        ),
                        "",
                        "class='select2 form-control'"
                    );
                    ?>
                </div>
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
        $("#form-form").appForm({
            onSuccess: function (result) {
                $("#forms-table").appTable({newData: result.data, dataId: result.id});
            }
        });
        $("#form-form .select2").select2();
    });
</script>