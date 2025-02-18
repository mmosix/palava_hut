<div class="card no-border clearfix mb0">

<?php echo form_open(get_uri("settings/save_google_maps_settings"), array("id" => "google-maps-settings-form", "class" => "general-form dashed-row", "role" => "form")); ?>

<div class="card-body">
    <div class="form-group">
        <div class="row">
            <label for="maps_settings_api_key" class="col-md-2">Google Maps API Key</label>
            <div class="col-md-10">
                <?php
                echo form_input(array(
                    "id" => "maps_settings_api_key",
                    "name" => "maps_settings_api_key",
                    "value" => get_setting("google_maps_api_key"),
                    "class" => "form-control",
                    "placeholder" => "Enter your Google Maps API Key",
                    "data-rule-required" => true,
                    "data-msg-required" => app_lang("field_required")
                ));
                ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label for="enable_maps_settings" class="col-md-2">Enable Google Maps</label>
            <div class="col-md-10">
                <?php
                echo form_checkbox("enable_maps_settings", "1", get_setting("enable_maps_settings") ? true : false, "id='enable_maps_settings' class='form-check-input'");
                ?>
            </div>
        </div>
    </div>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary"><span data-feather="check-circle" class="icon-16"></span> <?php echo app_lang('save'); ?></button>
</div>

<?php echo form_close(); ?>

</div>

<script type="text/javascript">
$(document).ready(function () {
    $("#google-maps-settings-form").appForm({
        isModal: false,
        onSuccess: function (result) {
            appAlert.success(result.message, {duration: 10000});
        },
        onError: function (result) {
            appAlert.error(result.message, {duration: 10000});
        }
    });
});
                                
                                    "value" => get_setting('google_maps_api_key'),
                                    "class" => "form-control",
                                    "placeholder" => "Enter your Google Maps API Key",
                                    "data-rule-required" => true,
                                    "data-msg-required" => "This field is required",
                                ));
                                ?>
                            </div>
                        </div>
                    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary"><span data-feather="check-circle" class="icon-16"></span> <?php echo app_lang('save'); ?></button>
    </div>
    <?php echo form_close(); ?>
</div>
