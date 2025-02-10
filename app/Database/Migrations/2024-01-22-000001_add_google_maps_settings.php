<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddGoogleMapsSettings extends Migration
{
    public function up()
    {
        // Add Google Maps settings
        $data = array(
            array(
                'setting_name' => 'google_maps_api_key',
                'setting_value' => '',
                'type' => 'app'
            )
        );
        
        $table = $this->db->table('settings');
        $table->insertBatch($data);
    }

    public function down()
    {
        $table = $this->db->table('settings');
        $table->where('setting_name', 'google_maps_api_key')->delete();
    }
}