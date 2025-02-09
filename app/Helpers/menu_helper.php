<?php

if (!function_exists('get_uri')) {
    function get_uri($uri = '') {
        return base_url($uri);
    }
}

function get_left_menu_items() {
    $menu_model = model('App\Models\Left_menu_model');
    return json_encode($menu_model->get_default_menu());
}

function initialize_left_menu() {
    $menu_model = model('App\Models\Left_menu_model');
    $menu_model->get_default_menu();
}