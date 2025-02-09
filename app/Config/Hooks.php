<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Hooks extends BaseConfig
{
    public function __construct()
    {
        parent::__construct();
        
        // Initialize menu on application start
        $events = \Config\Services::events();
        $events->on('pre_system', function () {
            helper('menu');
            initialize_left_menu();
        });
    }
}