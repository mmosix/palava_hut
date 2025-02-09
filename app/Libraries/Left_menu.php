<?php

namespace App\Libraries;

use App\Models\Left_menu_model;

class Left_menu {
    private $Left_menu_model;

    public function __construct() {
        $this->Left_menu_model = model('App\Models\Left_menu_model');
    }

    public function rander_left_menu() {
        $left_menu = $this->getMenu();
        return view('includes/left_menu', ['left_menu' => $left_menu], ['saveData' => true])->render();
    }

    private function getMenu() {
        // Logic to get the menu content
        return '<ul><li>Menu Item 1</li><li>Menu Item 2</li></ul>';
    }
}