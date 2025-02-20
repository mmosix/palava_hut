<?php
$field_id = "custom_field_" . $field_info->id;
?>
<div class="form-group">
    <div class="row">
        <label for="<?php echo $field_id; ?>" class="<?php echo $field_info->label_class; ?>"><?php echo $field_info->title; ?><?php echo $field_info->required ? " *" : ""; ?></label>
        <div class="<?php echo $field_info->field_class; ?>">
            <?php
            echo form_input(array(
                "id" => $field_id,
                "name" => $field_id,
                "value" => isset($field_info->value) ? $field_info->value : "",
                "class" => "form-control",
                "placeholder" => $field_info->placeholder,
                "data-rule-required" => $field_info->required ? true : false,
                "data-msg-required" => app_lang("field_required")
            ));
            ?>
        </div>
    </div>
</div>