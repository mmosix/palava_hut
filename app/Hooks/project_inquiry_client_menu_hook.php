<?php

// Add project inquiry to client menu
app_hooks()->add_filter('app_filter_client_left_menu', function($sidebar_menu) {
    $ci = new App\Controllers\Security_Controller(false);
    
    // Insert project inquiry menu item before the last item
    $sidebar_menu[] = array(
        "name" => "project_inquiries",
        "url" => "project_inquiry/client_inquiries",
        "class" => "file-alt"
    );
    
    return $sidebar_menu;
});