<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProjectInquiries extends Migration {
    public function up() {
        // Add project inquiries table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'inquiry_type' => [
                'type' => 'ENUM',
                'constraint' => ['planned', 'custom'],
                'null' => false
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false
            ],
            'created_by' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('created_by');
        $this->forge->createTable('project_inquiries', true);

        // Add notification setting
        $sql = "INSERT INTO notification_settings (notification_type, enable_email, enable_web, enable_slack, notify_to_admins, notify_to_team_members, sort) 
                VALUES ('new_project_inquiry', 1, 1, 0, 1, 0, 1)";
        $this->db->query($sql);
    }

    public function down() {
        // Remove notification setting
        $this->db->query("DELETE FROM notification_settings WHERE notification_type = 'new_project_inquiry'");
        
        // Remove table
        $this->forge->dropTable('project_inquiries', true);
    }
}
