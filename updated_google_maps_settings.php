<?php

// Instructions:
// Replace the entire save_google_maps_settings() function in app/Controllers/Settings.php
// with this fixed implementation

function save_google_maps_settings() {
    $settings = array("enable_maps_settings", "maps_settings_api_key");
    $success = true;

    foreach ($settings as $setting) {
        $value = $this->request->getPost($setting);
        if (!is_null($value)) {
            $value = remove_quotations($value);
        } else {
            $value = "";
        }

        if (!$this->Settings_model->save_setting($setting, $value)) {
            $success = false;
        }
    }

    if ($this->request->isAJAX()) {
        echo json_encode(array("success" => $success, "message" => $success ? app_lang("settings_updated") : app_lang("error_occurred")));
    } else {
        $message = $success ? "success_message" : "error_message";
        return redirect()->to(base_url("settings/google_maps"))->with($message, $success ? app_lang("settings_updated") : app_lang("error_occurred"));
    }
}