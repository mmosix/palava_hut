<?php

if (!function_exists('get_setting')) {
    function get_setting($key) {
        $settings_model = model('App\Models\Settings_model');
        return $settings_model->get_setting($key);
    }
}
