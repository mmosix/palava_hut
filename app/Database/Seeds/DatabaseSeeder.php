<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Call individual seeders
        $this->call('UserSeeder');
        $this->call('InvoiceSeeder');
        $this->call('InvoicePaymentSeeder');
        $this->call('NotificationSeeder');
        $this->call('ProjectSeeder');
        $this->call('ProjectPhaseSeeder');
        $this->call('ProjectTeamMemberSeeder');
        $this->call('TaskSeeder');
    }
}
