## Adding Google Maps Settings Methods

The following changes are needed in `app/Controllers/Settings.php`:

```php
function google_maps() {
    return $this->template->rander("settings/google_maps");
}

function save_google_maps_settings() {
    $settings = array("google_maps_api_key");

    foreach ($settings as $setting) {
        $value = $this->request->getPost($setting);
        if (!is_null($value)) {
            $this->Settings_model->save_setting($setting, $value);
        }
    }
    
    return app_redirect("settings/google_maps")->with("success", app_lang("settings_updated"));
}
```

These methods need to be added after the `web3()` and `save_web3_settings()` functions.