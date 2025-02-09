<?php

namespace App\Controllers;

class Includes extends Security_Controller {
    
    public function left_menu() {
        $view_data['login_user'] = $this->login_user;
        return view('includes/left_menu', $view_data);
    }
}