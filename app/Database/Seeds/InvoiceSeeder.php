<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'project_id' => 1, // Assuming the first project is Project Alpha
                'client_id' => 1, // Assuming the first user is a client
                'contractor_id' => 2, // Assuming the second user is a contractor
                'amount' => 50000.00,
                'tax_percentage' => 5.00,
                'discount' => 0.00,
                'due_date' => '2023-03-15',
            ],
            [
                'project_id' => 2, // Assuming the second project is Project Beta
                'client_id' => 1,
                'contractor_id' => 3, // Assuming the third user is a contractor
                'amount' => 75000.00,
                'tax_percentage' => 5.00,
                'discount' => 500.00,
                'due_date' => '2023-06-15',
            ],
        ];

        // Using Query Builder
        $this->db->table('invoices')->insertBatch($data);
    }
}
