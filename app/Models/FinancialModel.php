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

    public function getTotalRevenue()
    {
        return $this->where('status', 'paid')->selectSum('amount')->first(); // Fetch total revenue
    }

    public function getPendingPayments()
    {
        return $this->where('status', 'pending')->findAll(); // Fetch pending payments
    }

    public function getOverview()
    {
        return $this->select('SUM(amount) as totalRevenue, COUNT(id) as totalInvoices')->first(); // Fetch financial overview
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
