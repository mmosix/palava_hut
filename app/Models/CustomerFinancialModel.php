<?php
namespace App\Models;

use CodeIgniter\Model;

class CustomerFinancialModel extends Model
{
    protected $table = 'customer_financials';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['customer_id', 'total_budget', 'amount_spent', 'remaining_balance', 'payment_milestones'];

    public function createCustomerFinancial($data)
    {
        return $this->insert($data);
    }

    public function getCustomerFinancial($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }
        return $this->where('id', $id)->first();
    }

    public function updateCustomerFinancial($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteCustomerFinancial($id)
    {
        return $this->delete($id);
    }
}