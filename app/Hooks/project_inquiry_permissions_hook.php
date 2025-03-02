<?php

// Add project inquiry permission to client permissions
app_hooks()->add_filter('client_permissions', function($permissions) {
    $permissions["project_inquiry"] = array("title" => "project_inquiries");
    return $permissions;
});