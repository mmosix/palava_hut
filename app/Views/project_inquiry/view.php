<?php echo view("includes/header", array("title" => "View Project Inquiry")); ?>

<div id="page-content" class="page-wrapper clearfix">
    <div class="card">
        <div class="page-title clearfix">
            <h1><?php echo app_lang('project_inquiry_details'); ?></h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label><?php echo app_lang('inquiry_type'); ?></label>
                        <div><?php echo $model_info->inquiry_type; ?></div>
                    </div>
                </div>
                
                <?php foreach ($custom_fields as $field) { ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo $field->title; ?></label>
                            <div><?php echo $this->Custom_fields_model->get_field_value_for_datatable($field->id, $field->field_type, $field->value); ?></div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php echo view("includes/footer"); ?>