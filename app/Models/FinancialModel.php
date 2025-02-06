<?php
namespace App\Models;

use CodeIgniter\Model;

class FinancialModel extends Model
{
    protected $table = 'invoices';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['project_id', 'client_id', 'contractor_id', 'amount', 'tax_percentage', 'discount', 'total_amount', 'status', 'due_date', 'paid_at'];

    public function createInvoice($data)
    {
        return $this->insert($data);
    }

    public function getInvoice($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }
        return $this->where('id', $id)->first();
    }

    public function updateInvoice($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteInvoice($id)
    {
        return $this->delete($id);
    }
}