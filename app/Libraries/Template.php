<?php

namespace App\Libraries;

use App\Libraries\Left_menu; // Keep this line
// Removed the duplicate use statement
use App\Controllers\Security_Controller;

class Template {

    //render with predefined contents
    public function rander($view, $data = array()) {
        $view_data = array(
            'content_view' => $view,
            'topbar' => "includes/topbar",
            'left_menu' => true  // Default value for showing menu
        );

        // Handle left menu visibility first - ensure it's always boolean
        if (isset($data['left_menu'])) {
            $view_data['left_menu'] = is_array($data['left_menu']) ? true : (bool)$data['left_menu'];
            unset($data['left_menu']);  // Remove to prevent override
        }
        
        // Merge remaining data but protect left_menu
        $original_left_menu = $view_data['left_menu'];
        $view_data = array_merge($view_data, $data);
        $view_data['left_menu'] = $original_left_menu;

        // Set up login user info
        $users_model = model("App\Models\Users_model", false);
        if ($users_model->login_user_id()) {
            $Security_Controller = new Security_Controller(false);
            $view_data["login_user"] = $Security_Controller->login_user;

            // Initialize menu only after login user is available
            if (!session()->get('left_menu')) {
                $left_menu = new Left_menu();
                $rendered_menu = $left_menu->rander_left_menu();
                session()->set('left_menu', $rendered_menu);
            }
        }

        $left_menu = new Left_menu();
        $view_data['left_menu'] = $left_menu->rander_left_menu();

        return $this->view('layout/index', $view_data);
    }

    //use this method instead of default view() to pass necessary variables
    public function view($view, $data = array()) {
        $view_data = array();

        $users_model = model("App\Models\Users_model", false);
        if ($users_model->login_user_id()) {
            //user logged in, prepare login user data
            $Security_Controller = new Security_Controller(false);
            $view_data["login_user"] = $Security_Controller->login_user;
        }

        $view_data = array_merge($view_data, $data);

        return view($view, $view_data);
    }
}
