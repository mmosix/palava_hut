# Google Maps Settings Fix

## Current Issues Identified

1. The code is not checking if settings were actually saved successfully
2. Mixing AJAX and redirect responses inappropriately
3. Always showing success message regardless of save status

## Analysis

Current problematic code in `app/Controllers/Settings.php`:
```php
function save_google_maps_settings() {
    $settings = array("enable_maps_settings", "maps_settings_api_key");

    foreach ($settings as $setting) {
        $value = $this->request->getPost($setting);

        if (!is_null($value)) {
            $value = remove_quotations($value); 
        } else {
            $value = "";
        }

        // Not checking return value
        $this->Settings_model->save_setting($setting, $value);
    }

    // Always showing success
    echo json_encode(array("success" => true, "message" => app_lang("settings_updated")));
}
```

## Recommended Fix

The code should be updated to:

1. Track success of all setting saves
2. Handle AJAX and non-AJAX responses appropriately
3. Return proper success/error messages

```php
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
```

## Implementation Notes

1. The form in `app/Views/settings/integration/google_maps.php` uses AJAX submission
2. Settings_model->save_setting() returns boolean indicating success/failure
3. Need proper error handling for both AJAX and non-AJAX requests
4. Success message should only be shown if all settings are saved successfully