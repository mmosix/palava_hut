<?php

namespace App\Models;

class Settings_model extends Crud_model {

    protected $table = null;

    function __construct() {
        $this->table = 'settings';
        parent::__construct($this->table);
    }

    function get_setting($setting_name) {
        $setting_name = $this->_get_clean_value($setting_name);
        $result = $this->db_builder->getWhere(array('setting_name' => $setting_name), 1);
        if (count($result->getResult()) == 1) {
            return $result->getRow()->setting_value;
        }
    }

    function save_setting($setting_name, $setting_value, $type = "app") {
        $fields = array(
            'setting_name' => $setting_name,
            'setting_value' => $setting_value
        );

        $exists = $this->get_setting($setting_name);
        if ($exists === NULL) {
            $fields["type"] = $type;
            return $this->ci_save($fields);
        } else {
            $where = array("setting_name" => $setting_name);
            return $this->update_where($fields, $where);
        }
    }

    //find all app settings and login user's setting
    //user's settings are saved like this: user_[userId]_settings_name;
    function get_all_required_settings($user_id = 0) {
        $user_id = $this->_get_clean_value($user_id);

        $settings_table = $this->db->prefixTable('settings');
        $sql = "SELECT $settings_table.setting_name,  $settings_table.setting_value
        FROM $settings_table
        WHERE $settings_table.deleted=0 AND ($settings_table.type = 'app' OR ($settings_table.type ='user' AND $settings_table.setting_name LIKE 'user_" . $user_id . "_%'))";
        return $this->db->query($sql);
    }

}
