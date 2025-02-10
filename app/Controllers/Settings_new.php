<?php

namespace App\Controllers;

use App\Libraries\Imap;
use App\Libraries\Stripe;
use App\Controllers\App_Controller;

class Settings extends Security_Controller {

    function __construct() {
        parent::__construct();
        $this->access_only_admin_or_settings_admin();
    }

    function index() {
        app_redirect('settings/general');
    }

    function general() {
        return $this->template->rander("settings/general");
    }

    function web3() {
        return $this->template->rander("settings/web3");
    }

    function google_maps() {
        return $this->template->rander("settings/google_maps");
    }

    function save_web3_settings() {
        $settings = array("ethereum_node_url", "smart_contract_address", "wallet_address");

        foreach ($settings as $setting) {
            $value = $this->request->getPost($setting);
            if (!is_null($value)) {
                $this->Settings_model->save_setting($setting, $value);
            }
        }
        
        return app_redirect("settings/web3")->with("success", app_lang("settings_updated"));
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