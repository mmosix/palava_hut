<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InvoicePaymentSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'invoice_id' => 1, // Assuming the first invoice is related to Project Alpha
                'transaction_id' => 'txn_001',
                'payment_method' => 'bank_transfer',
                'amount_paid' => 50000.00,
                'payment_status' => 'completed',
            ],
            [
                'invoice_id' => 2, // Assuming the second invoice is related to Project Beta
                'transaction_id' => 'txn_002',
                'payment_method' => 'credit_card',
                'amount_paid' => 75000.00,
                'payment_status' => 'pending',
            ],
        ];

        // Using Query Builder
        $this->db->table('invoice_payments')->insertBatch($data);
    }
}
