# Google Maps Settings Implementation

## The Issue
The current save_google_maps_settings() function in Settings.php has issues:
1. Not checking if settings were actually saved
2. Always showing success message
3. Not handling AJAX vs non-AJAX properly

## Implementation Instructions

Replace the current save_google_maps_settings() function in app/Controllers/Settings.php with this fixed version:

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

## Key Changes
1. Added $success flag to track if all settings saved successfully
2. Check return value of Settings_model->save_setting()
3. Handle both AJAX and non-AJAX responses
4. Show error message if save fails
5. Properly redirect with message for non-AJAX requests

## Notes
- This matches the pattern used in save_re_captcha_settings()
- Settings_model->save_setting() returns boolean indicating success/failure
- Uses app_lang() for localized messages
- Handles form submission via both AJAX and regular POST