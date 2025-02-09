<?php

if (!function_exists('get_active_menu')) {
    function get_active_menu($router) {
        $controller = $router->controllerName();
        $method = $router->methodName();
        
        // Project inquiry patterns
        if ($controller == 'Project_inquiry') {
            return 'project_inquiry';
        }
        
        // Handle other menu patterns...
        
        return strtolower($controller);
    }
}