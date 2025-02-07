<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class CreateInvoicePaymentsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INTEGER',
                'auto_increment' => true,
            ],
            'invoice_id' => [
                'type' => 'INTEGER',
                'constraint' => '11',
            ],
            'transaction_id' => [
                'type' => 'VARCHAR',
                'constraint' => '191', // Reduced length to fit within key limits
                'unique' => true,
            ],
            'payment_method' => [
                'type' => 'ENUM',
                'constraint' => ['bank_transfer', 'credit_card', 'crypto', 'cash'],
            ],
            'amount_paid' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'payment_status' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'completed', 'failed', 'refunded'],
                'default' => 'pending',
            ],
            'paid_at' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'blockchain_payment_hash' => [
                'type' => 'VARCHAR',
                'constraint' => '191', // Reduced length to fit within key limits
                'unique' => true,
                'null' => true,
            ],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'null'    => true,
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ],
            'updated_at' => [
                'type'    => 'TIMESTAMP',
                'null'    => true,
                'default' => new RawSql('CURRENT_TIMESTAMP'),
                'on update' => new RawSql('CURRENT_TIMESTAMP')
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('invoice_id', 'invoices', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('invoice_payments');
    }

    public function down()
    {
        $this->forge->dropTable('invoice_payments');
    }
}
